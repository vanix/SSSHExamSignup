<?php
session_start(); 
if($_SESSION['status']==0) {
	$_SESSION['id'] = $_POST['inputName'];
	$_SESSION['pw'] = $_POST['inputPassword'];
	include("mysql_conn.php");
	include("account_check.php");
} else {
	include("mysql_conn.php");
	include("account_check.php");
	echo "<a href=signout.php>登出</a>";
}
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
    <div class="container">

<?php
	echo $_POST['inputName'] . "<br>";
	if($_POST['inputSubject1'] != "" ) $subject = $subject ."/". $_POST['inputSubject1'];
	if($_POST['inputSubject2'] != "" ) $subject = $subject ."/". $_POST['inputSubject2'];
	if($_POST['inputSubject3'] != "" ) $subject = $subject ."/". $_POST['inputSubject3'];
	if($_POST['inputSubject4'] != "" ) $subject = $subject ."/". $_POST['inputSubject4'];
	if($_POST['inputSubject5'] != "" ) $subject = $subject ."/". $_POST['inputSubject5'];
	if($_POST['inputSubject6'] != "" ) $subject = $subject ."/". $_POST['inputSubject6'];
	if($_POST['inputSubject7'] != "" ) $subject = $subject ."/". $_POST['inputSubject7'];
	if($_POST['inputSubject8'] != "" ) $subject = $subject ."/". $_POST['inputSubject8'];

	$subject = substr($subject,1);
	echo $subject."<br>"; 
	
	$sql_select = "SELECT * from test where name='$_POST[inputName]'";
	$result = mysql_query($sql_select);
	if (!$result) die('Invalid query: ' . mysql_error());
	
	if(mysql_num_rows($result)==0) {
		$sql_insert = "INSERT INTO test(name, subject) VALUES ('$_POST[inputName]','$subject')";
		echo "<br>" . $sql_insert ."<br>";
		$result = mysql_query($sql_insert);
		if (!$result) die('Invalid query: ' . mysql_error());
	} else {
		echo "已有資料";
	}
?>

    </div> <!-- /container -->

  </body>
</html>
