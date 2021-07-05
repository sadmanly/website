#pragma once
#include<mysql/mysql.h>
#include<stdlib.h>
#include<stdio.h>
#include<string.h>
#define MAX_INNER_STRING_SIZE 30

class connect
{
private:
	MYSQL* mysqlConnect;  //数据源指针
	MYSQL_RES *res;  //查询结果集
	MYSQL_FIELD *field;  //包含字段信息的结构指针
	MYSQL_ROW nextRow;  //存放查询sql语句字符串数组

    char   dbuser[MAX_INNER_STRING_SIZE];
    char   dbhost[MAX_INNER_STRING_SIZE];
    char   dbpassword[MAX_INNER_STRING_SIZE];
    char   dbname[MAX_INNER_STRING_SIZE];
    int    dbport;
public:
    int    field_count;
    int    row_count;
    int    column_count;
    int    errorcode;
    /*
        100    链接错误
        200    语句执行错误
        300    获取结果集错误
    */
    char   errormess[100];
    /* data */
public:
    connect(/* args */);
    bool connect_to_db();
    bool query_to_db(const char* sql);
    MYSQL_ROW get_next_row();
    MYSQL_RES* get_result(); 
    ~connect();
};

