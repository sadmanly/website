/*
    
*/
#include"format_main.h"
#define INSERT_SQL "update src_file set format_name = "

int format_str(char** str_d,int size) 
{
    char* str = (*str_d);
    int offset = 0;
    if(str == NULL)
    {
        return 0;
    }
    char*   out_str = (char*)malloc(size);
    memset(out_str,0,size);
    for(int i = 0;i < size;i++)
    {
        if(*(str + i) == ' '|| *(str + i) == '(' || *(str + i) == ')')
            continue;
        *(out_str + offset) = *(str + i);
        offset++;
    }
    free(str);
    (*str_d) = out_str;
    return 1;
}

int main(int argc,char* argv[])
{
    class connect DBCter;
    char sql[1024];
    char inser_sql[1024];
    char* name = NULL;
    inser_sql[0] = '\0';
    DBCter.connect_to_db();
    if(DBCter.errorcode != 0)
    {
        printf("ERROR INFO %s\n",DBCter.errormess);
        return -1;
    }
    if(argv[1] == NULL)
        return -1;
    sprintf(sql,"select name from src_file where id = %s",argv[1]);
    //printf("%s",sql);
    DBCter.query_to_db(sql);
    if(DBCter.errorcode != 0)
    {
        printf("ERROR INFO %s\n",DBCter.errormess);
        return -1;
    }

    DBCter.get_result();
    if(DBCter.errorcode != 0)
    {
        printf("ERROR INFO %s\n",DBCter.errormess);
        return -1;
    }

    MYSQL_ROW row;
    for(row = DBCter.get_next_row();row != NULL;row = DBCter.get_next_row())
    {
        for(int i = 0;i < DBCter.column_count;i++)
        {
            name = (char*)malloc(strlen(row[i])+1);
            memcpy(name,row[i],strlen(row[i]));
            name[strlen(row[i])] = '\0';
        }
    }
    if(name == NULL)
        return -1;
    format_str(&name,strlen(name));
    sprintf(inser_sql,"%s \'%s\' where id = %s",INSERT_SQL,name,argv[1]);
    if(name)
        free(name);
    //printf("%s",inser_sql);
    DBCter.query_to_db(inser_sql);
    if(DBCter.errorcode != 0)
    {
        printf("ERROR INFO %s\n",DBCter.errormess);
        return -1;
    }
}