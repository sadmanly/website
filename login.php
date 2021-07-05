<!DOCTYPE html>
<html>
<body>

<?php  
include_once "src.php";

function login_check()
{
    if($_POST["fname"] == "" || $_POST["fpassword"] == "")
    {
        $GLOBALS['login_ret'] = 0;
        echo "无效的登陆";
        return -1;
    }
    if(db_user_check($_POST["fname"],$_POST["fpassword"]) == 0) //登陆失败
    {
        echo "登陆失败";
    }
    else 
    {
        main_connect();
    }
}

login_check();

?>

</body>
</html>