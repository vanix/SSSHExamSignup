<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>補考報名系統</title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/signin.css">
	<link rel="stylesheet" href="css/navbar-fixed-top.css" >
	
  </head>

  <body>
	<?php include("include/navbar_signin.php") ?>
    <div class="container">
      <form class="form-signin" method="POST" action="management.php">
        <h2 class="form-signin-heading">請輸入帳號</h2>
        <label for="inputID" class="sr-only">帳號</label>
        <input type="text" id="inputName" name="inputName" class="form-control" placeholder="請輸入學號" required autofocus>
		<h2 class="form-signin-heading">請輸入密碼</h2>
        <label for="inputPassword" class="sr-only">密碼</label>
        <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> 記得我
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>
