<?
	require_once "checklogin.php";
	require_once "classBack.php";
	$i=new back;
	if(isset($_GET['idImg']))
		$idImg=$_GET['idImg'];
	$i->delImages($idImg);
	header("location:index.php?p=images_list");
?>