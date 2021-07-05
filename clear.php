<!DOCTYPE html>
<html>
<head>
<script src="main.js"></script>
</head>
<body onload="myFunction2()">
<?php
include_once "src.php";
$sql = "TRUNCATE TABLE src_file";
do_sql($sql);
$cmd = "rm -rf /var/www/html/upload/*";
do_cmd($cmd);
?>
</body>
</html>