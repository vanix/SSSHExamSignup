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

	      <form class="form-signin" method=POST action=./delete.php>
			  <h2 class="form-signin-heading">報名資料如下</h2>
    	        <?php 	
				if($_POST['inputName'] != "") {				
		  			$sql_delete = "DELETE from test where name ='$_POST[inputName]'";
					echo $sql_delete;
					$result = mysql_query($sql_delete);
					if (!$result) die('Invalid query: ' . mysql_error());
				}	
											
    			$sql_select = "SELECT * from test where name ='bin'";
    			$result = mysql_query($sql_select);
    			if (!$result) die('Invalid query: ' . mysql_error());
				if(mysql_num_rows($result)==0) echo "查無資料";
				
    	        while($row = mysql_fetch_row($result))
    	        {
    	                 echo "<p>" . $row[0] ." " . $row[1] . "</p>";
  					 $name=$row[0];
  					 $subject=$row[1]; 
    	        }
    	        ?>
	        <input type="hidden" id="inputName" name="inputName" class="form-control" value=<?php echo $name;?>>
	        <button class="btn btn-lg btn-primary btn-block" style="margin-top:50px;" type="submit">刪除</button>
	      </form>



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
