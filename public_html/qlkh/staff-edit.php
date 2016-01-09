<?
	require_once 'check-login.php';
	$idUser=$_SESSION['id'];
	$ud=$i->staff_detail($idUser);
	$row_ud=mysql_fetch_assoc($ud);
	
	$cv=$i->duty_list();
	$tq=$i->belong_to();
	$pq=$i->group_list();
	$error=array();
	if (isset($_POST['submit'])) {
		$success=$i->staff_edit($idUser,$error);
		if($success==true)
			header("location:index.php?p=staff-list");
	}
?>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script>
	$(document).ready(function() {
		$("#ngaysinh").datepicker({
		minDate: '-60Y',   maxDate: '-18Y', 
		numberOfMonths: 1,  dateFormat: 'dd/mm/yy',
		monthNames: ['Một','Hai','Ba','Tư','Năm','Sáu','Bảy','Tám','Chín', 
		'Mười','Mười một','Mười hai'] ,
		monthNamesShort: ['Tháng 1','Tháng 2','Tháng 3','Tháng 4','Tháng 5',
		'Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12'] ,
		dayNames: ['Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm',
		 'Thứ sáu', 'Thứ bảy'],
		dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'] ,
		showWeek: true , 
		changeMonth: true , changeYear: true,
		currentText: 'Hôm nay', weekHeader: 'Tuần'
		});
	});

</script>
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.2.custom.css"/>
<div id="staff-add">
	
		<div class="module-title">
			<img src="images/customer-edit-img.png" alt="staff add">
			<h1>Thông tin cá nhân</h1>
		</div>
		<div class="clear"></div>
		<div id="customer-add-inner">
			<form id="customer-add-f" method="POST" action="" name="staff-add-f">
            	<p><span class="left-text">Họ Tên</span><input type="text" name="hoten" id="hoten" value="<?=$row_ud['HoTen']?>"><span class="error"><?=$error['hoten']?></span></p>
				<p><span class="left-text">Ngày Sinh</span><input type="text" name="ngaysinh" id="ngaysinh" value="<? echo date("d/m/Y",strtotime($row_ud['NgaySinh']));?>"><span class="error"><?=$error['ngaysinh']?></span></p>
				
			
                
		
				<p><span class="left-text">Điện thoại</span><input type="text" name="dienthoai" id="dienthoai" value="<?=$row_ud['SoDT']?>"><span class="error"><?=$error['dienthoai']?></span></p>
				
				
				<div class="clear"></div>
				<input type="hidden" value="<?=$_SESSION['id']?>" name="nv">
				<input type="submit" value="Sửa" name="submit">
			</form>
	</div>
</div>