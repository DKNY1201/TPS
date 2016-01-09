<?

	session_start();

	require_once("db-connect.php");

	if (isset($_POST['login-s'])) {

		$email=$_POST['login-email'];

		$password=sha1($_POST['login-p']);

		$sql="SELECT * FROM nhanvien WHERE Email='$email' AND Password='$password'";

		//echo $sql; exit();

		$user=mysql_query($sql);

		if (mysql_num_rows($user)==1) {

			$row_user=mysql_fetch_assoc($user);

			$_SESSION['id']=$row_user['idNV'];

			$_SESSION['email']=$row_user['Email'];

			$_SESSION['hoten']=$row_user['HoTen'];

			$_SESSION['group']=$row_user['idNhom'];



			if (isset($_POST['login-re'])) {

				setcookie("email",$email,time()+60*60*24*7);

				setcookie("password",$_POST['login-p'],time()+60*60*24*7);

			}

			else

			{

				setcookie("email",$email,-1);

				setcookie("password",$_POST['login-p'],-1);

			}

			if (isset($_SESSION['back'])) {

				$back=$_SESSION['back'];

				unset($_SESSION['back']);

				header("location:$back");

			}

			else

				header("location:index.php");

		}

		else

			header("location:login-error.php");

	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Sign In</title>

<link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>



<body>

<div id="login">

	<form id="login-f" name="login-f" method="POST" action="">

		<h1 class="signin" title="Sign in">Sign in</h1>

		<div id="warning">

			<?

				if (isset($_SESSION['error'])) {

					echo "Warning: ".$_SESSION['error'];

				}

			?>

		</div>

		<input type="text" name="login-email" id="login-email" value="<?=$_COOKIE['email']?>" /><br />

        <input type="password" name="login-p" id="login-p" value="<?=$_COOKIE['password']?>" /><br />

        <input type="submit" value="Login to Your Account" name="login-s" id="login-s" />&nbsp;

        <div id="login-bot">


        </div>

        

	</form>

</div>



</body>

</html>