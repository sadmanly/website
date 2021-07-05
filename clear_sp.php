<!DOCTYPE html>
<html>
<head>
<script src="main.js"></script>
</head>
<body onload="myFunction2()">
<?php
include_once "src.php";

$sql = "SELECT name FROM src_file WHERE id =". $_POST["key1"];
$name = get_file_name($sql);
$sql = "DELETE from src_file WHERE id =" . $_POST["key1"];
do_sql($sql);
$cmd = "rm -rf /var/www/html/upload/" . $name;
echo $cmd;
do_cmd($cmd);
?>
</body>
</html>