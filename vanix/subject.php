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
$sql_select = "SELECT * from usersubject";
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
	<style>
	.form-signin {
	  max-width: 450px;
	  padding: 15px;
	  margin: 0 auto;
	}
	</style>
  </head>

  <body>
	<?php include("include/navbar_manager.php") ?>
    <div class="container">
	      <form class="form-signin" method="POST" action="#">
	        <h2 class="form-signin-heading">請選擇年級</h2>
			<select class="form-control" id="inputYear" name="inputYear" required autofocus>
			  <option>1</option>
			  <option>2</option>
			  <option>3</option>
			</select>
	        <h2 class="form-signin-heading">請選擇科別</h2>
			<select class="form-control" id="inputDept" name="inputDept">
			  <option>普通科</option>
			  <option>國貿科</option>
			  <option>廣設科</option>
			  <option>應外科</option>
			  <option>體育科</option>
			</select>			
			
	        <h2 class="form-signin-heading">請輸入科目</h2>
	        <label for="inputName" class="sr-only">科目</label>
			<textarea class="form-control" rows="3" id="inputName" name="inputSubject" placeholder="國文/英文/數學/計概/經濟"></textarea>
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
			<br>
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
			<br>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject8" value="歷史"> 歷史
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox5" name="inputSubject9" value="地理"> 地理
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox6" name="inputSubject10" value="公民"> 公民
			</label>
			<br>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject8" value="歷史"> 歷史
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox5" name="inputSubject9" value="地理"> 地理
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox6" name="inputSubject10" value="公民"> 公民
			</label>
			<br>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject11" value="會計"> 會計
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject12" value="會計實做"> 會實
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox5" name="inputSubject13" value="經濟"> 經濟
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox6" name="inputSubject14" value="國貿"> 國貿
			</label>
			<br>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject15" value="計概"> 計概
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject16" value="計應"> 計應
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox5" name="inputSubject17" value="商概"> 商概
			</label>
			<br>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject15" value="色彩原理"> 色彩
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject16" value="基本設計"> 基設
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox5" name="inputSubject17" value="文字造型"> 文字
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox5" name="inputSubject18" value="設計概論"> 設概
			</label>
			<br>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject19" value="包裝設計"> 包裝
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject20" value="視覺傳達"> 視傳
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox5" name="inputSubject21" value="色彩與設計理論"> 彩設
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox5" name="inputSubject22" value="設計概論"> 設概
			</label>
			<br>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject23" value="國防"> 國防
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox4" name="inputSubject24" value="健護"> 健護
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox5" name="inputSubject25" value="資概"> 資概
			</label>
			<label class="checkbox-inline">
				<input type="checkbox" id="inlineCheckbox5" name="inputSubject26" value="日文"> 日文
			</label>
	        <button class="btn btn-lg btn-primary btn-block" style="margin-top:50px;" type="submit">送出</button>
	      </form>

	  <table class="table table-striped">
		  <tr class="success"><td>#</td><td>年級</td><td>科別</td><td>科目</td><td>修改</td><td>刪除</td></tr>
		  <?php
		  	// while($row = mysql_fetch_row($result))
			for($i=1;$i<=mysql_num_rows($result);$i++)
			{
				$row = mysql_fetch_row($result)
		  ?>
 
		  <tr><td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2]; ?></td><td><?php echo $row[3]; ?></td>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>
