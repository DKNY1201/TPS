<?
	session_start();
	unset($_SESSION['id']);
	unset($_SESSION['email']);
	unset($_SESSION['level']);
	unset($_SESSION['name']);
	header("location:index.php");
?>