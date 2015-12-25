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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>補考報名系統</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
	<?php include("include/navbar.php") ?>
    <div class="container">	  
	      <form class="form-signin" method=POST action="./update.php">
  	        <?php  
			
			if($_POST['inputName'] != "") {
				if($_POST['inputSubject1'] != "" ) $subject = $subject ."/". $_POST['inputSubject1'];
				if($_POST['inputSubject2'] != "" ) $subject = $subject ."/". $_POST['inputSubject2'];
				if($_POST['inputSubject3'] != "" ) $subject = $subject ."/". $_POST['inputSubject3'];
				if($_POST['inputSubject4'] != "" ) $subject = $subject ."/". $_POST['inputSubject4'];
				if($_POST['inputSubject5'] != "" ) $subject = $subject ."/". $_POST['inputSubject5'];
				if($_POST['inputSubject6'] != "" ) $subject = $subject ."/". $_POST['inputSubject6'];
				if($_POST['inputSubject7'] != "" ) $subject = $subject ."/". $_POST['inputSubject7'];
				if($_POST['inputSubject8'] != "" ) $subject = $subject ."/". $_POST['inputSubject8'];
				$subject = substr($subject,1);
				
	  			$sql_update = "UPDATE test set subject='$subject' where name ='$_POST[inputName]'";
				echo $sql_update;
				$result = mysql_query($sql_update);
				if (!$result) die('Invalid query: ' . mysql_error());
			}
			
			
  			$sql_select = "SELECT * from test where name ='$_SESSION[id]'";
  			echo "<br>" . $sql_select ."<br>";
  			$result = mysql_query($sql_select);
  			if (!$result) die('Invalid query: ' . mysql_error());
			if(mysql_num_rows($result)==0) echo "查無資料";
			
  	        while($row = mysql_fetch_row($result))
  	        {
  	                 echo "<p>" . $row[0] ." " . $row[1] . "</p>";
					 $name=$row[0];
					 $subject=$row[1]; 
  	        }
			$output = explode("/", $subject);
			echo count($output);
			for($i=0;$i<count($output);$i++){
				// echo $output[$i] ."<br>";
				echo "<input type=text id=sub".$i." value=".$output[$i].">";
			}
			echo "<input type=text name=total value=".count($output).">";
  	        ?>
	        <h2 class="form-signin-heading">姓名: <?php echo $name;?></h2>
	        <input type="hidden" id="inputName" name="inputName" class="form-control" value=<?php echo $name;?>>
			
	        <label for="inputName" class="sr-only">姓名</label>
			
			<h2 class="form-signin-heading">請修改科目</h2>
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
	<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script> -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="js/jquery.easypiechart.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- // <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->

	<script>
		for(i=0;i<$('input[name="total"]').val();i++) {
			for(j=1;j<=7;j++) {
				if($("#inlineCheckbox"+j).val()==$("#sub"+i).val()) $("#inlineCheckbox"+j).attr("checked",true);
			}
		}
	</script>
		
  </body>
</html>
