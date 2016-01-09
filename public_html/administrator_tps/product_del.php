<?

	require_once "checklogin.php";

	require_once "classBack.php";

	$i=new back;

	if(isset($_GET['idPr']))

		$idPr=$_GET['idPr'];

	$i->delProduct($idPr);

	header("location:index.php?p=product_list");

?>