<!DOCTYPE html>
<html>
<head>
<script src="main.js"></script>
</head>
<body onload="myFunction2()">
<?php 
    include_once "src.php";
    if($_POST["key1"] == NULL)
    {
        die("downfile is NULL");
    }
    $sql = "SELECT name FROM src_file WHERE id =" . $_POST["key1"];
    $name = get_file_name($sql);
    echo $sql;
    $url="./upload/" . $name;
    downfile($url,$name);
?> 
</body>
</html>


