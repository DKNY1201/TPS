<?
	require_once "checklogin.php";
	require_once "classBack.php";
	$i=new back;
	if(isset($_GET['idNT']))
		$idNT=$_GET['idNT'];
	$i->delNewsType($idNT);
	header("location:index.php?p=news_type_list");
?>