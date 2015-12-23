<?
session_start(); 
include("mysql_conn.php");
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
	      <form method=POST action=./delete.php>
			  <h2>報名資料如下</h2>
    	        <?	
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
	        <input type="hidden" id="inputName" name="inputName" value=<?echo $name;?>>
	        <button type="submit">刪除</button>
	      </form>
    </div> <!-- /container -->
  </body>
</html>
