<?
	ob_start();
	session_start();
	require_once("check-login.php");
	require_once 'classDB.php';
	$i=new db;

	$idUser=$_SESSION['id'];
	$u=$i->user_detail($idUser);
	$row_u=mysql_fetch_assoc($u);
	$p=$_GET['p'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Quản lý khách hàng - Trường Phú Steel</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
<link rel="stylesheet" href="css/template.css" type="text/css"/> 

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
<script src="js/jquery.validationEngine-vi.js" type="text/javascript" charset="utf-8"></script>
<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>  
<script>
$(document).ready(function(){
			//alert(1);
            $("#customer-add-f").validationEngine();
        });
</script>  
</head>

<body>

	<div id="wrapper">
		<div id="top">
			<div id="logo">
            <a href="index.php">
				<img src="images/Logo TPSC small.png" />
            </a>
			</div>
			<div id="menu">
				<ul>
					<li class="customer-add"><a href="index.php?p=customer-add"><img src="images/customer-add.png">Thêm khách hàng</a></li>
					<li class="customer-list"><a href="index.php?p=customer-list"><img src="images/user-ico.png">Khách hàng</a></li>
                    <? if($_SESSION['group']==1||$_SESSION['group']==2) {?>
					<li class="staff-list"><a href="index.php?p=customer-list-by"><img src="images/user-ico.png">Khách hàng (Tất cả)</a></li>
                    <? }?>
                    <? if($_SESSION['group']==1||$_SESSION['group']==2) {?>
					<li class="staff-list"><a href="index.php?p=staff-list"><img src="images/staff-list.png">Nhân viên</a></li>
                    <? }?>
                     
                    <? if($_SESSION['group']==1) {?>
                    <li class="staff-add"><a href="index.php?p=staff-add"><img src="images/staff-add.png">Thêm nhân viên</a></li>
                    <? }?>
                   
				</ul>				
			</div>		
			<div id="profile">
            	<div id="info">
					<h1><?=$_SESSION['hoten']?></h1>
					<p><a href="index.php?p=staff-edit&idUser=<?=$_SESSION['id']?>">Chỉnh sửa thông tin cá nhân</a></p>
					<p><a href="index.php?p=change-password">Đổi mật khẩu</a></p>	
					<p><a href="signout.php">Đăng xuất</a></p>
				</div>
                <div id="img-profile">
					<img src="images/avatar.png">
                </div>
			
			</div>	
		</div>
		<div class="clear"></div>
		<div id="content">
       
			<?
				if($p=='customer-add') 
					require_once 'customer-add.php';
				elseif ($p=='customer-list') {
					require_once 'customer-list.php';
				}
				elseif ($p=='customer-edit') {
					require_once 'customer-edit.php';
				}
				elseif ($p=='staff-list') {
					require_once 'staff-list.php';
				}
				elseif ($p=='staff-add') {
					require_once 'staff-add.php';
				}
				elseif ($p=='staff-edit') {
					require_once 'staff-edit.php';
				}
				elseif ($p=='change-password') {
					require_once 'change-password.php';
				}
				elseif ($p=='change-pass-success') {
					require_once 'change-pass-success.php';
				}
				elseif ($p=='customer-list-by') {
					require_once 'customer-list-by.php';
				}
				else
					require_once("customer-list.php");
			?>
        </div>
        <div class="clear"></div>
		<div id="bot"></div>
	</div>		
</body>
</html>