<!DOCTYPE html>
<html>
<head>
<script src="main.js"></script>
</head>
<body onload="myFunction2()">
<?php
include_once "src.php";
$sql = "TRUNCATE TABLE Message_board";
do_sql($sql);
?>
</body>
</html>