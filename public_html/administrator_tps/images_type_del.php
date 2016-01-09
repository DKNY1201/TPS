<?
	require_once "checklogin.php";
	require_once "classBack.php";
	$i=new back;
	if(isset($_GET['idImgType']))
		$idImgType=$_GET['idImgType'];
	$i->delImagesType($idImgType);
	header("location:index.php?p=images_type_list");
?>