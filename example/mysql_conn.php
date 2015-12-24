<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$dbhost = 'localhost';   
	$dbuser = 'root';   
	$dbpass = '1024vs8884';   
	$dbname = 'test';
 
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');;
	mysql_query("SET NAMES utf8");
	if(!mysql_select_db($dbname))
	        die("無法使用資料庫");
?>