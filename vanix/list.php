<?php
session_start(); 
if($_SESSION['management']==0) {
	$_SESSION['manager_id'] = $_POST['inputName'];
	$_SESSION['manager_pw'] = $_POST['inputPassword'];
	include("include/mysql_conn_manage.php");
	include("include/manager_check.php");
} else {
	include("include/mysql_conn_manage.php");
	include("include/manager_check.php");
	echo "<a href=signout_manager.php>登出</a>";
}
?>

<?php 
$sql_select = "SELECT * from test";
echo "<br>" . $sql_select ."<br>";
$result = mysql_query($sql_select);
if (!$result) die('Invalid query: ' . mysql_error());
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>補考報名系統 管理介面</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/chart_style.css">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/navbar-fixed-top.css">

  </head>

  <body>
	<?php include("include/navbar_manager.php") ?>
    <div class="container">

	  <table class="table table-striped">
		  <tr class="success"><td>#</td><td>姓名</td><td>科目</td><td>修改</td><td>刪除</td></tr>
		  <?php
		  	// while($row = mysql_fetch_row($result))
			for($i=1;$i<=mysql_num_rows($result);$i++)
			{
				$row = mysql_fetch_row($result)
		  ?>
 
		  <tr><td><?php echo $i ?></td><td><?php echo $row[0] ?></td><td><?php echo $row[1] ?></td>
			  <td><button type="button" class="btn btn-primary btn-xs">修改</button></td>
			  <td><button type="button" class="btn btn-danger btn-xs">刪除</button></td>
		  </tr>

		  <?php } ?>
	    
	  </table>

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
