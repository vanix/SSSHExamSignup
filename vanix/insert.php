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
    <title>補考報名系統</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">
	
	<style>
	.form-signin {
	  max-width: 450px;
	  padding: 15px;
	  margin: 0 auto;
	}
	</style>
  </head>
  
  <body>
	<?php include("include/navbar.php") ?>
    <div class="container">	  
	      <form class="form-signin" method="POST" action="./result.php">
	        <h2 class="form-signin-heading">請輸入姓名</h2>
	        <label for="inputName" class="sr-only">姓名</label>
	        <input type="text" id="inputName" name="inputName" class="form-control" placeholder="請輸入姓名" required autofocus>
			
			<h2 class="form-signin-heading">請勾選科目</h2>
			<label class="checkbox-inline">
					<input type="checkbox" id="inlineCheckbox1" name="inputSubject1" value="國文"> 國文
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox2" name="inputSubject2" value="英文"> 英文
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox3" name="inputSubject3" value="數學"> 數學
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject4" value="物理"> 物理
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox5" name="inputSubject5" value="化學"> 化學
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox6" name="inputSubject6" value="生物"> 生物
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox7" name="inputSubject7" value="地科"> 地科
			</label>
	        <button class="btn btn-lg btn-primary btn-block" style="margin-top:50px;" type="submit">送出</button>
	      </form>



    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="js/jquery.easypiechart.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- // <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
	<script>
  </body>
</html>
