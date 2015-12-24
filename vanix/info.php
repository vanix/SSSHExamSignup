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
	<link rel="stylesheet" href="css/chart_style.css">
	<link rel="stylesheet" href="css/animate.min.css">

    <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">		
  </head>

  <body>
	<?php include("include/navbar.php") ?>
    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>資訊頁面</h1>
        <p>往下拉有圖表動畫及文字動畫</p>
        <p>To see the difference between static and fixed top navbars, just scroll.</p>
        <p>
          <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
        </p>
      </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<h1 id="anitext" class="animated shake" style="background-color:yellow;">block display的標籤才有動畫</h1>
	<span class="chart" data-percent="86">
		<span class="percent"></span>
	</span>
	<span class="chart" data-percent="50">
		<span class="percent"></span>
	</span>
	<span class="chart" data-percent="30">
		<span class="percent"></span>
	</span>





    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="js/jquery.easypiechart.min.js"></script>

	<script>
	$(window).scroll(function() {
	    if ($(this).scrollTop() > 500) {			
			$(function() {
				$('.chart').easyPieChart({
		            animate:{
		                duration:5000,
		                enabled:true
		            },
					barColor: '#69c',
					trackColor: '#ace',
					scaleColor: false,
					lineWidth: 20,
					trackWidth: 20,
					lineCap: 'butt',			
					easing: 'line',
					onStep: function(from, to, percent) {
						$(this.el).find('.percent').text(Math.round(percent));
					}
				});
			});
			$('#anitext').addClass('swing');
	    }
	});
	</script>
  </body>
</html>
