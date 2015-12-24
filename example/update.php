<?php
session_start(); 
if($_SESSION['status']==0) {
	$_SESSION['id'] = $_POST['inputName'];
	$_SESSION['pw'] = $_POST['inputPassword'];
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
		<form method=POST action="./update.php">
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
			
			
  			$sql_select = "SELECT * from test where name ='bin'";
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
			<hr>
	        <h2>姓名: <?echo $name;?></h2>
	        <input type="hidden" id="inputName" name="inputName" value=<?echo $name;?>>
			
			
			<h2>請修改科目</h2>
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
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script>
		for(i=0;i<$('input[name="total"]').val();i++) {
			for(j=1;j<=7;j++) {
				if($("#inlineCheckbox"+j).val()==$("#sub"+i).val()) $("#inlineCheckbox"+j).attr("checked",true);
				// console.log("inlineCheckbox");
			}
		}
	</script>
    

  </body>
</html>
