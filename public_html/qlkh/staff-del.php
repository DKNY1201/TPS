<?
	require_once "check-login.php";
	require_once "classDB.php";
	$d=new db;
	if(isset($_GET['idNV']))
		$idNV=$_GET['idNV'];
	$d->move_customer($idNV,1);
	$d->staff_del($idNV);
	header("location:index.php?p=staff-list");
?>