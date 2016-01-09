<?
	require_once "checklogin.php";
	require_once "classBack.php";
	$i=new back;
	if(isset($_GET['idIT']))
		$idIT=$_GET['idIT'];
	$i->delIntroduction($idIT);
	header("location:index.php?p=introduction_list");
?>