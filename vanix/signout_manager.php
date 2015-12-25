<?php session_start();?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
	//將session清空
	unset($_SESSION['manager_id']);
	unset($_SESSION['manager_pw']);
	echo '登出中......';
	echo '<meta http-equiv=REFRESH CONTENT=1;url=signin_manager.php>';
?>