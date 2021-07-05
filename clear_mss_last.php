<!DOCTYPE html>
<html>
<head>
<script src="main.js"></script>
</head>
<body onload="myFunction2()">
<?php
include_once "src.php";
$sql = "DELETE FROM Message_board WHERE 1 ORDER BY id DESC LIMIT 1";
do_sql($sql);
?>
</body>
</html>