<?php

function echo_mess($con)
{
    if(!$con)
    {
        die("链接不存在");
    }
    $result = mysql_query("SELECT * FROM Message_board",$con);
    $count = 0;
    while($row = mysql_fetch_array($result))
    {
        if($count == 0)
        {
            echo "<table border=\"1\">";
            echo "<tr>";
            echo "<td>用户</td>";
            echo "<td>留言</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td>" . $row['user'] . "</td>";
        echo "<td>" . $row['info'] . "</td>";
        echo "</tr>";
        $count ++;
    }
    if($count != 0)
        echo "</table>";    
}

function echo_button($act,$mess)
{
    echo "<form action=" . $act . " method=\"post\"";
    echo "enctype=\"multipart/form-data\">";
    echo "<button type=\"submit\">";
    echo $mess;
    echo "</button>";
    echo "</form>";
}

function echo_button_mss1($act,$key,$mess)
{
    echo "<form action=" . $act . " method=\"post\"";
    echo "enctype=\"multipart/form-data\">";
    echo $key ." <input type=\"text\" name=\"key1\"><br>";
    echo "<button type=\"submit\">";
    echo $mess;
    echo "</button>";
    echo "</form>";
}

function echo_button_mss2($act,$key1,$key2,$mess)
{
    echo "<form action=" . $act . " method=\"post\"";
    echo "enctype=\"multipart/form-data\">";
    echo $key1 . " <input type=\"text\" name=\"key1\"><br>";
    echo $key2 . " <input type=\"text\" name=\"key2\"><br>";
    echo "<button type=\"submit\">";
    echo $mess;
    echo "</button>";
    echo "</form>";
}

function echo_time()
{
    header('content-type:text/html;charset=utf-8');
    date_default_timezone_set('PRC');
    $n=chr(13);
    echo "<SCRIPT LANGUAGE=\"JavaScript\">".$n; 
    echo "document.write('<div id=\"TimeShow\" align=\"right\" style=\"MARGIN-right:0px;font-size:9pt;font-family:宋体\">?</div>');".$n; 
    echo "var y=".date("Y")."; //年 ".$n; 
    echo "var m=".date("n")."; //月 ".$n;
    echo "var d=".date("j")."; //日 ".$n;
    echo "var w=".date("w")."; //星 ".$n;
    echo "var h=".date("H")."; //时 ".$n;
    echo "var i=".date("i")."; //分 ".$n;
    echo "var s=".date("s")."; //秒 ".$n;
    echo "var hstr=istr=sstr=a='';".$n;
    echo "var ww = Array('日','一','二','三','四','五','六');".$n; 
    echo "function clock(){".$n; 
    echo " s++;".$n;
    echo " if (s==60) {i+=1;s=0;}//秒进位".$n; 
    echo " if (i==60) {h+=1;i=0;}//分进位".$n; 
    echo " if (h==24) {w+=1;d+=1;h=0;}//时进位".$n; 
    echo " if (w==7) {w=0;}//星期进位".$n; 
    echo " if (m==2) { //是否是二月份？".$n; 
    echo " if (!y%4>0) { //不是闰月（二月有28天）".$n; 
    echo " if (d==30){".$n; 
    echo " m+=1;".$n; 
    echo " d=1;}".$n; 
    echo " }".$n; 
    echo " else { //是闰月（二月有29天）".$n; 
    echo " if (d==29){".$n; 
    echo " m+=1;".$n; 
    echo " d=1;}".$n; 
    echo " }".$n; 
    echo " }".$n; 
    echo " else { //非2月份的月份".$n; 
    echo " if (m==4 || m==6 || m==9 || m==11) { //只有30天的月份".$n; 
    echo " if (d==31) {".$n; 
    echo " m+=1;".$n; 
    echo " d=1;}".$n; 
    echo " }".$n; 
    echo " else { //有31天的月份".$n; 
    echo " if (d==32){".$n; 
    echo " m+=1;".$n; 
    echo " d=1;}".$n; 
    echo " }".$n; 
    echo " }".$n; 
    echo " if (m==13) {y+=1;m=1;}//月进位".$n; 
    echo " if (h < 10) {hstr=' 0'+h} else {hstr=' '+h};".$n; 
    echo " if (i < 10) {istr=':0'+i} else {istr=':'+i};".$n; 
    echo " if (s < 10) {sstr=':0'+s} else {sstr=':'+s};".$n; 
    echo " if (h < 13) {astr=' am';} else {astr=' pm';};".$n;
    echo " TimeShow.innerHTML=y+'年'+m+'月'+d+'日 '+'星期'+ww[w]+'</font>'+hstr+istr+sstr+astr;".$n;
    echo " setTimeout('clock()',1000);".$n; 
    echo "}".$n; 
    echo "clock();".$n; 
    echo "</SCRIPT>".$n; 
}

function init_db($con)
{
    $con = mysql_connect("localhost","root","qq694970521");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db(liuyu, $con);
    return $con;
}

function db_user_check($user,$pass)
{
    $ret = 0;
    $con = init_db($con);
    $result = mysql_query("SELECT * FROM login",$con);
    while($row = mysql_fetch_array($result))
    {
        if($row['name'] == $user)
        {
            if($row['pass'] == $pass)
            {
                $ret = 1;
                break;
            }
        }
    }
    mysql_close($con);
    return $ret;
}

function echo_button_up($act)
{
    echo "<form action=" . $act ." method=\"post\"";
    echo "enctype=\"multipart/form-data\">";
    echo "<label for=\"file\">上传:</label>";
    echo "<input type=\"file\" name=\"file\" id=\"file\" /> ";
    echo "<input type=\"submit\" name=\"submit\" value=\"Submit\" />";
    echo "</form>";
}

function echo_file_info($con)
{
    $result = mysql_query("SELECT * FROM src_file",$con);
    $count = 0;
    while($row = mysql_fetch_array($result))
    {
        if($count == 0)
        {
            echo "<table border=\"1\">";
            echo "<tr>";
            echo "<td>文件编号</td>";
            echo "<td>文件名字</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "</tr>";
        $count ++;
    }
    if($count != 0)
        echo "</table>";
    else
        echo "没有任何文件";
}

function echo_button_down($act)
{    
    echo "<form action=".$act." method=\"post\"";
    echo "enctype=\"multipart/form-data\">";
    echo "<input type=\"text\" name=\"downfile\" id=\"downfile\" /> ";
    echo "<button type=\"submit\" id = \"clear\">";
    echo "下载";
    echo "</button>";
    echo "</form>";
}

function get_max_id()
{
    $sql = "SELECT max(id) as test from src_file";
    $id = 0;
    $con = mysql_connect("localhost","root","qq694970521");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("liuyu", $con);

    $result = mysql_query($sql,$con);
    while($row = mysql_fetch_array($result))
    {
        if($row['test'])
        {
            $id = $row['test'];
        }
    }
    mysql_close($con);
    return $id;
}

function do_sql($sql)
{
    //echo $sql;
    $con = mysql_connect("localhost","root","qq694970521");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("liuyu", $con);
    if (!mysql_query($sql,$con))
    {
        echo "<br />";
        die('Error: ' . mysql_error());
    }
    mysql_close($con);
}

function do_cmd($cmd)
{
    $shell = $cmd;
    echo "<pre>";
    system($shell, $status);
    echo "</pre>";
    //注意shell命令的执行结果和执行返回的状态值的对应关系
    if( $status ){
     echo "执行失败";
    } else {
     echo "成功执行";
    }
}

function get_file_name($sql)
{
    $con = mysql_connect("localhost","root","qq694970521");
    if (!$con)
    {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db("liuyu", $con);
    $result = mysql_query($sql,$con);
    if($row = mysql_fetch_array($result))
    {
        if($row['name'])
        {
            return $row['name'];
        }
    }
    mysql_close($con);
}

function downfile($fileurl,$name)
{
    ob_start(); 
    $filename=$fileurl;
    $date=date("Ymd-H:i:m");
    $size=readfile($filename);
    header( "Content-type:  application/octet-stream "); 
    header( "Accept-Ranges:  bytes "); 
    header( "Content-Disposition:  attachment;  filename= " .$name); 
    header( "Accept-Length: " .$size);
}

function main_connect()
{
    $con = init_db($con);
    echo_time();     //时间
    echo_button_up("upload_file.php");    //上传
    echo_file_info($con);
    echo_button("clear.php","删除所有文件");
    echo_button_mss1("clear_sp.php","文件编号","删除指定文件");
    echo_button_mss1("download_file.php","文件编号","下载指定文件");
    echo_mess($con);
    echo_button_mss2("add_mess.php","user","info","上传留言");
    echo_button("clear_mss.php","删除所有留言");
    echo_button("login_s.php","刷新留言");
    echo_button("clear_mss_last.php","删除最近一条留言");
    mysql_close($con);
}

?>