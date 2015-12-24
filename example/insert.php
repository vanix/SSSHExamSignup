<?php
	session_start(); 
	if($_SESSION['status']==0) {
		$_SESSION['id'] == $_POST['inputName'];
		$_SESSION['pw'] == $_POST['inputPassword'];
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
    <div>
	      <form method="POST" action="./result.php">
	        <h2>請輸入姓名</h2>
	        <input type="text" id="inputName" name="inputName" placeholder="請輸入姓名" autofocus>
			
			<h2>請勾選科目</h2>
			<input type="checkbox" id="inlineCheckbox1" name="inputSubject1" value="國文"> 國文
			<input type="checkbox" id="inlineCheckbox2" name="inputSubject2" value="英文"> 英文
			<input type="checkbox" id="inlineCheckbox3" name="inputSubject3" value="數學"> 數學
			<input type="checkbox" id="inlineCheckbox4" name="inputSubject4" value="物理"> 物理
			<input type="checkbox" id="inlineCheckbox5" name="inputSubject5" value="化學"> 化學
			<input type="checkbox" id="inlineCheckbox6" name="inputSubject6" value="生物"> 生物
			<input type="checkbox" id="inlineCheckbox7" name="inputSubject7" value="地科"> 地科
	        <button type="submit">送出</button>
	      </form>	
    </div> <!-- /container -->
  </body>
</html>
