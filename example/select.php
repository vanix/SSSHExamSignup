<?
	session_start(); 
	echo $_POST['inputName'];
	echo $_POST['inputPassword'];
	
	include("mysql_conn.php");
	include("account_check.php");
	echo "<a href=signout.php>登出</a>";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>補考報名系統</title>
  </head>

  <body>
    <div id="navbar">
      <ul>
		  <li class="active"><a href="./select.php">查詢</a></li>
          <li><a href="./insert.php">新增</a></li>
          <li><a href="./update.php">修改</a></li>
		  <li><a href="./delete.php">刪除</a></li>
      </ul>
    </div>
    <div>
		<h1>報名結果如下</h1>
		<? 		
			if ($_SESSION['status']==1) {
			
				$sql_select = "SELECT * from test";
				echo "<br>" . $sql_select ."<br>";
				$result = mysql_query($sql_select);
				if (!$result) die('Invalid query: ' . mysql_error());
   			 	while($row = mysql_fetch_row($result))
   			 	{
				 	echo "<p>" . $row[0] ." " . $row[1] . "</p>"; 
			 	}
		 	}
		?>
          <a href="./update.php" role="button">修改資料</a>
        </p>
    </div> <!-- /container -->

  </body>
</html>
