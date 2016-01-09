<?

	require_once "checklogin.php";

	require_once "classBack.php";

	$i=new back;

	if(isset($_GET['idDe']))

		$idDe=$_GET['idDe'];

	$i->delDesign($idDe);

	header("location:index.php?p=design_list");

?>