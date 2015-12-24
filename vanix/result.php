<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>補考報名系統</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/chart_style.css">


    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">

  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./index.html">Index</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
			<li><a href="./select.php">查詢</a></li>
            <li class="active"><a href="./insert.php">新增</a></li>
            <li><a href="./update.php">修改</a></li>
			<li><a href="./delete.php">刪除</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

<?
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
	
	$dbhost = 'localhost';   
	$dbuser = 'root';   
	$dbpass = '0000';   
	$dbname = 'test';
 
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');;
	mysql_query("SET NAMES utf8");	
	mysql_select_db($dbname);   
	
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
