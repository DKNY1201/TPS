<?
	session_start();
	$_SESSION['error']="Incorrect email or password";
	header("location:login.php");
?>