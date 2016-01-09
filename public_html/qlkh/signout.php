<?
	session_start();
	unset($_SESSION['id']);
	unset($_SESSION['email']);
	unset($_SESSION['hoten']);
	unset($_SESSION['group']);
	header("location:index.php");
?>