
#include"connect.h"

connect::connect(/* args */)
{
    mysqlConnect = (MYSQL*)malloc(sizeof(MYSQL));
    memcpy(dbuser,"root",strlen("root"));
    memcpy(dbhost,"localhost",strlen("localhost"));
    memcpy(dbpassword,"qq694970521",strlen("qq694970521"));
    memcpy(dbname,"liuyu",strlen("liuyu"));
    dbport = 7777;
    errorcode = 0;
    field_count = 0;
}
bool connect::connect_to_db(/* args */)
{
    mysql_init(mysqlConnect);
    if (!(mysql_real_connect(mysqlConnect, dbhost, dbuser, dbpassword, dbname, dbport, NULL, 0))) 
    {
        memcpy(errormess,mysql_error(mysqlConnect),100);
		errorcode = 100;
        return -1;
    }
    return 0;
}
bool connect::query_to_db(const char* sql)
{
    if(mysql_query(mysqlConnect, sql)!=0)  //执行
    {
        memcpy(errormess,mysql_error(mysqlConnect),100);
		errorcode = 200;
        return -1;
    }	
    return 0;
}
MYSQL_RES* connect::get_result()
{
    if(!(res = mysql_store_result(mysqlConnect)))
    {
        memcpy(errormess,mysql_error(mysqlConnect),100);
		errorcode = 300;
        return res;
    }
    field_count = mysql_field_count(mysqlConnect);
    column_count = mysql_num_fields(res);
	row_count = mysql_num_rows(res);
    return res;
}

MYSQL_ROW connect::get_next_row()
{
    if(res)
    {
        nextRow = mysql_fetch_row(res);
    }
    return nextRow;
}



connect::~connect()
{
    if(mysqlConnect)
        mysql_close(mysqlConnect);
    free(mysqlConnect);
}
