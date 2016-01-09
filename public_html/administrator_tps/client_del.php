<?
	require_once "checklogin.php";
	require_once "classBack.php";
	$i=new back;
	if(isset($_GET['idCR']))
		$idCR=$_GET['idCR'];
	$i->delCLientReview($idCR);
	header("location:index.php?p=client_list");
?>