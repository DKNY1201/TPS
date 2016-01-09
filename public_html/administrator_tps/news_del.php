<?
	require_once "checklogin.php";
	require_once "classBack.php";
	$i=new back;
	if(isset($_GET['idNews']))
		$idNews=$_GET['idNews'];
	$i->delNews($idNews);
	header("location:index.php?p=news_list");
?>