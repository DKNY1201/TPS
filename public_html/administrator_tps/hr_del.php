<?

	require_once "checklogin.php";

	require_once "classBack.php";

	$i=new back;

	if(isset($_GET['idHR']))

		$idHR=$_GET['idHR'];

	$i->delHR($idHR);

	header("location:index.php?p=hr_list");

?>