<?php
	require_once "checklogin.php";
	require_once "classBack.php";
	$i=new back;
	if(isset($_GET['idSlider'])){
		$idSlider=$_GET['idSlider'];
		$i->DelSlider($idSlider);
		header("location:index.php?p=slider_list");
	}else{
		header("location:index.php?p=slider_list");
	}
	
?>