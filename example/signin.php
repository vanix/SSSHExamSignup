<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Signin</title>
  </head>

  <body>
    <div>

      <form method="POST" action="select.php">
        <h2>請輸入學號</h2>
        <input type="text" id="inputName" name="inputName" placeholder="請輸入帳號" required autofocus>
		<h2 class="form-signin-heading">請輸入密碼</h2>
        <input type="password" id="inputPassword" name="inputPassword" placeholder="Password" required>
        <!-- <div>
          <label>
            <input type="checkbox" value="remember-me"> 記得我
          </label>
        </div> -->
        <button type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>
