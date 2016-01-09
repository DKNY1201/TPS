<?
	require_once 'check-login.php';
	$idKH=$_GET['idKH'];
	$idUser=$_GET['idUser'];
	//echo $idUser; exit();
	$detail_kh=$i->customer_detail($idKH);
	$row_detail_kh=mysql_fetch_assoc($detail_kh);

	$cv_edit=$i->duty_list();
	$lkh_edit=$i->customer_type_list();
	$tt_edit=$i->status_list();
	$error=array();
	if (isset($_POST['edit'])) {
		$success=$i->customer_edit($idKH,$error);
		if ($success==true) {
			header("location:index.php?p=customer-list&idUser=$idUser");
		}
	}
?>

<script>
	$(document).ready(function(e) {
        $("#chuyenkh").change(function(e) {
			//alert(1);
			from="From: "+$("input[name='tennv']").val();
            $("#ghichu").val(from);
        });
    });
</script>
<div id="customer-edit">
	
		<div class="module-title">
			<img src="images/customer-edit-img.png" alt="customer edit">
			<h1>Chỉnh sữa khách hàng <span class="small">(*) Bắt buộc nhập</span></h1>
		</div>
		<div class="clear"></div>
		<div id="customer-add-inner">
			<form id="customer-add-f" method="POST" action="" name="customer-add-f">
				<p><span class="left-text">Họ Tên</span><input class="validate[required] text-input" type="text" name="hoten" id="hoten" value="<?=$row_detail_kh['HoTen']?>"><span class="error"><?=$error['hoten']?></span><? if(!isset($error['hoten'])) {?><span class="right-text">*</span><? }?></p>
				<p><span class="left-text">Công Ty</span><input class="validate[required] text-input" type="text" name="congty" id="congty" value="<?=$row_detail_kh['CongTy']?>"></p><span class="error"><?=$error['congty']?></span><? if(!isset($error['congty'])) {?><span class="right-text">*</span><? }?>
				<p>
					<span class="left-text">Chức vụ</span>
					<select name="chucvu" class="validate[required]">
						<option value="">Chọn chức vụ</option>
						<? 
						$idCV=$row_detail_kh['idCV'];
						while($row_cv=mysql_fetch_assoc($cv_edit)) {
							$s="";
							if($idCV==$row_cv['idCV'])
								$s="selected=selected";
						?>
							<option value="<?=$row_cv['idCV']?>" <?=$s?>><?=$row_cv['MoTa']?></option>
						<? }?>
					</select>
					<span class="error"><?=$error['chucvu']?></span><? if(!isset($error['chucvu'])) {?><span class="right-text">*</span><? }?>
				</p>
				
				<p><span class="left-text">Email 1</span><input class="validate[custom[email]] text-input" type="text" name="email" id="email" value="<?=$row_detail_kh['Email']?>"><span class="error"><?=$error['email']?></span></p>
                <p><span class="left-text">Email 2</span><input class="validate[custom[email]] text-input" type="text" name="email1" id="email1" value="<?=$row_detail_kh['Email1']?>"><span class="error"><?=$error['email1']?></span></p>
                <p><span class="left-text">Địa chỉ</span><input type="text" name="diachi" id="diachi" value="<?=$row_detail_kh['DiaChi']?>"></p>
				<p>
					<span class="left-text">Loại khách hàng</span>
					<select name="loaikh" class="validate[required]">
						<option value="">Chọn loại khách hàng</option>
						<? 
						$idLKH=$row_detail_kh['idLKH'];
						while($row_lkh=mysql_fetch_assoc($lkh_edit)) {
							$s="";
							if($row_lkh['idLKH']==$idLKH)
								$s="selected=selected";
						?>
							<option value="<?=$row_lkh['idLKH']?>" <?=$s?>><?=$row_lkh['MoTa']?></option>
						<? }?>
					</select>
					<span class="error"><?=$error['loaikh']?></span><? if(!isset($error['loaikh'])) {?><span class="right-text">*</span><? }?>
				</p>
				<p><span class="left-text">Dự án</span><input class="validate[required] text-input" type="text" name="duan" id="duan" value="<?=$row_detail_kh['TenDuAn']?>"><span class="error"><?=$error['duan']?></span><? if(!isset($error['duan'])) {?><span class="right-text">*</span><? }?></p>
				<p>
					<span class="left-text">Tình trạng</span>
					<select name="tinhtrang" class="validate[required]">
						<option value="">Chọn tình trạng</option>
						<? 
						$idTT=$row_detail_kh['idTT'];
						while($row_tt=mysql_fetch_assoc($tt_edit)) {
							$s="";
							if($idTT==$row_tt['idTT'])
								$s="selected=selected";
						?>
							<option value="<?=$row_tt['idTT']?>" <?=$s?>><?=$row_tt['MoTa']?></option>
						<? }?>
					</select>
					<span class="error"><?=$error['tinhtrang']?></span><? if(!isset($error['tinhtrang'])) {?><span class="right-text">*</span><? }?>
				</p>
                <? if(($_SESSION['group']==1)||($_SESSION['group']==2)) {?>
                <p><span class="left-text">Ghi chú</span><input type="text" name="ghichu" id="ghichu" value="<?=$row_detail_kh['GhiChu']?>"></p>
                <p>
					<span class="left-text">Chuyển KH cho nhân viên</span>
					<select name="chuyenkh" id="chuyenkh">
						<option value="<?=$row_detail_kh['idNV']?>">Không chuyển</option>
						<? 
						$nv=$i->staff_list_all($idUser);
						while($row_nv=mysql_fetch_assoc($nv)) {
						?>
							<option value="<?=$row_nv['idNV']?>"><?=$row_nv['HoTen']?></option>
						<? }?>
					</select>
				</p>
                <? }
					else
					{
				?>
						<input type="hidden" name="ghichu" id="ghichu" value="<?=$row_detail_kh['GhiChu']?>">
				<?	}
				?>
				<div class="clear"></div>
				<input type="hidden" value="<?=$row_detail_kh['idNV']?>" name="nv">
                <? 
					$idNV=$row_detail_kh['idNV'];
					$nv1=$i->user_detail($idNV);
					$row_nv1=mysql_fetch_assoc($nv1);
				?>
                <input type="hidden" value="<?=$row_nv1['HoTen']?>" name="tennv">
				<input type="submit" value="Sửa" name="edit">
			</form>
	</div>
</div>