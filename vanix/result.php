<?php
session_start(); 
if($_SESSION['status']==0) {
	$_SESSION['id'] = $_POST['inputName'];
	$_SESSION['pw'] = $_POST['inputPassword'];
	include("include/mysql_conn.php");
	include("include/account_check.php");
} else {
	include("include/mysql_conn.php");
	include("include/account_check.php");
	echo "<a href=signout.php>登出</a>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>補考報名系統</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/chart_style.css">
    <link rel="stylesheet" href="css/navbar-fixed-top.css">

  </head>

  <body>
	<?php include("include/navbar.php") ?>
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="js/jquery.easypiechart.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- // <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->

  </body>
</html>
