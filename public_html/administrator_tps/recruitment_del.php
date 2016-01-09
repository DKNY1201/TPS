<?

	require_once "checklogin.php";

	require_once "classBack.php";

	$i=new back;

	if(isset($_GET['idRe']))

		$idRe=$_GET['idRe'];

	$i->delRecruitment($idRe);

	header("location:index.php?p=recruitment_list");

?>