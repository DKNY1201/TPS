<?

	require_once "checklogin.php";

	require_once "classBack.php";

	$i=new back;

	if(isset($_GET['idDT']))

		$idDT=$_GET['idDT'];

	$i->delDesignType($idDT);

	header("location:index.php?p=design_type_list");

?>