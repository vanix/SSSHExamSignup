<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	session_start();
	echo $_SESSION['id'];
	$sql_select = "SELECT * from account where name='$_SESSION[id]'";
	echo "<br>" . $sql_select ."<br>";
	$result = mysql_query($sql_select);
	if (!$result) die('Invalid query: ' . mysql_error());
	if (mysql_num_rows($result)==1) {
		$row = mysql_fetch_row($result);
		if ($row[0]==$_SESSION['id'] && $row[1]==$_SESSION['pw']) {
			echo "登入成功";
			$_SESSION['status']=1;
		} 
	} else {
		$_SESSION['status']=0;
		echo "帳號密碼有誤";
		echo "<meta http-equiv=REFRESH CONTENT=2;url=signin.php>";
	}
?>