<?
	require_once "checklogin.php";
	require_once "classBack.php";
	$i=new back;
	if(isset($_GET['idpt']))
		$idpt=$_GET['idpt'];
	$i->delProjectType($idpt);
	header("location:index.php?p=project_type_list");
?>