<!DOCTYPE html>
<html>
<head>
<script src="main.js"></script>
</head>
<body onload="myFunction2()">
<?php
include_once "src.php";
$sql = "INSERT INTO Message_board (user,info) VALUES ('". $_POST["key1"] . "','" . $_POST["key2"] . "')";
do_sql($sql);
?>
</body>
</html>


