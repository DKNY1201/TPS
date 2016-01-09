<?
	require_once "checklogin.php";
	require_once "classBack.php";
	$i=new back;
	if(isset($_GET['idpr']))
		$idpr=$_GET['idpr'];
	$i->delProject($idpr);
	header("location:index.php?p=project_list");
?>