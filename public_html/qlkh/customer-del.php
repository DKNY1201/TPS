<?
	require_once 'check-login.php';
	require_once 'classDB.php';
	if(isset($_GET['idUser']))
		$idUser=$_GET['idUser'];
	$u=new db;
	if(isset($_GET['idKH']))
	{
		$idKH=$_GET['idKH'];
		$u->customer_del($idKH);
		header("location:index.php?p=customer-list&idUser=$idUser");
	}

	if (isset($_GET['listid'])) {
		$listid=$_GET['listid'];
		$array_id=explode(",", $listid);
		for ($i=0; $i < count($array_id) ; $i++) { 
			$u->customer_del($array_id[$i]);
		}
		if(isset($_GET['idUser']))
			header("location:index.php?p=customer-list&idUser=$idUser");
		else
			header("location:index.php?p=customer-list-by");
	}
?>