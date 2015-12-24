<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <title>補考報名系統</title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/signin.css">

  </head>

  <body>

    <div class="container">
      <form class="form-signin" method="POST" action="info.php">
        <h2 class="form-signin-heading">請輸入學號</h2>
        <label for="inputID" class="sr-only">學號</label>
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


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- // <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
  </body>
</html>
