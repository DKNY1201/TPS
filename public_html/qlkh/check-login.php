<?
	session_start();
	if(isset($_SESSION['email'])==false)
	{
		
		$_SESSION['error']="Enter your email and password";
		$_SESSION['back']=$_SERVER['REQUEST_URI'];
		header("location:login.php");
		exit();
	}

?>