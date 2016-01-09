<? 
	session_start();
	if (isset($_SESSION['id'])== false){
		$_SESSION['error_admin']='Bạn chưa đăng nhập';
		$_SESSION['back']=$_SERVER['REQUEST_URI'];
		header('location:login.php'); 
		exit();
	}
	else if ($_SESSION['level']!=1 && $_SESSION['level']!=2){
		$_SESSION['error_admin']='Bạn không có quyền xem trang này';
		$_SESSION['back']=$_SERVER['REQUEST_URI'];
		header('location:login.php');
		exit();
	}
?>