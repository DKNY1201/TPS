<?
	require_once "checklogin.php";
	require_once "classBack.php";
	$i=new back;
	if(isset($_GET['idImg']))
		$idImg=$_GET['idImg'];
	$i->delProjectImg($idImg);
	header("location:index.php?p=project_img_list");

?>