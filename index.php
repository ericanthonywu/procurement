<?
	session_start();
	require_once ("class/connection.php");
	if(isset($_SESSION['token_procurement'])){
		header("location:".$url."dashboard");
	}else{
		header("location:".$url."auth");
	}
	exit;
?>