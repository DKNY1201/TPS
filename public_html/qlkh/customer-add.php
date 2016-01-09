<?
	require_once 'check-login.php';
	$cv=$i->duty_list();
	$lkh=$i->customer_type_list();
	$tt=$i->status_list();
	$error=array();
	$c_last=$i->customer_last();
	
	//echo $row_c_last['MaKH']; exit();
	if (isset($_POST['submit'])) {
		$success=$i->customer_add($error);
		if($success==true)
			header("location:index.php?p=customer-list");
	}
?>
<div id="customer-add">
	
		<div class="module-title">
			<img src="images/customer-add-img.png" alt="customer add">
			<h1>Thêm khách hàng <span class="small">(*) Bắt buộc nhập</span></h1>
		</div>
		<div class="clear"></div>
		<div id="customer-add-inner">
			<form id="customer-add-f" method="POST" action="" name="customer-add-f">
				<p class="makh"><span class="left-text">Mã KH</span>
                <? 
					$j=mysql_num_rows($c_last);
					if($j==0)
					{
						$MaKH="TPS2013-0001";
					}
					else
					{
						// Xữ lí mã kh theo dạng TPS2013-xxxx
						$row_c_last=mysql_fetch_assoc($c_last);
						$c_last_arr=explode("-",$row_c_last['MaKH']);
						$c_f=$c_last_arr[0];
						$n_arr=str_split($c_last_arr[1]);// tách chuổi thành mãng
						$n1=$n_arr[0];
						$n2=$n_arr[1];
						$n3=$n_arr[2];
						$n4=$n_arr[3];
						$n4=$n4+1;
						if($n4==10)
						{
							$n4=0;
							$n3=$n3+1;
							if($n3==10)
							{
								$n3=0;
								$n2=$n2+1;	
								if($n2==10)
								{
									$n2=0;
									$n1=$n1+1;
								}
							}
						
						}
					
					$c_l=$n1.$n2.$n3.$n4;
					$MaKH=$c_f."-".$c_l;
					}
				?>
                <span class="val"><?=$MaKH?><span class="error_makh"><?=$error['makh']?></span></span>
                <input type="hidden" name="makh" value="<?=$MaKH?>" />
                </p>
                <div class="clear"></div>
				<p><span class="left-text">Họ Tên</span><input class="validate[required] text-input" type="text" name="hoten" id="hoten" value="<?=$_POST['hoten']?>"><span class="error"><?=$error['hoten']?></span><? if(!isset($error['hoten'])) {?><span class="right-text">*</span><? }?></p>
				<p><span class="left-text">Công Ty</span><input class="validate[required] text-input" type="text" name="congty" id="congty" value="<?=$_POST['congty']?>"><span class="error"><?=$error['congty']?></span><? if(!isset($error['congty'])) {?><span class="right-text">*</span><? }?></p>
				<p>
					<span class="left-text">Chức vụ</span>
					<select name="chucvu" class="validate[required]">
						<option value="">Chọn chức vụ</option>
						<? while($row_cv=mysql_fetch_assoc($cv)) {?>
							<option value="<?=$row_cv['idCV']?>"><?=$row_cv['MoTa']?></option>
						<? }?>
					</select>
					<span class="error"><?=$error['chucvu']?></span><? if(!isset($error['chucvu'])) {?><span class="right-text">*</span><? }?>
				</p>
				<p><span class="left-text">Điện thoại 1</span><input class="validate[required,custom[phone],minSize[10]] text-input" type="text" name="dienthoai" id="dienthoai" value="<?=$_POST['dienthoai']?>"><span class="error"><?=$error['sodt']?></span><? if(!isset($error['sodt'])) {?><span class="right-text">*</span><? }?></p>
                <p><span class="left-text">Điện thoại 2</span><input class="validate[custom[phone],minSize[10]] text-input" type="text" name="dienthoai1" id="dienthoai1" value="<?=$_POST['dienthoai1']?>"><span class="error"><?=$error['sodt1']?></span></p>
				<p><span class="left-text">Email 1</span><input class="validate[custom[email]] text-input" type="text" name="email" id="email" value="<?=$_POST['email']?>"><span class="error"><?=$error['email']?></span>
                <p><span class="left-text">Email 2</span><input class="validate[custom[email]] text-input" type="text" name="email1" id="email1" value="<?=$_POST['email1']?>"><span class="error"><?=$error['email1']?></span></p>
                <p><span class="left-text">Địa chỉ</span><input type="text" name="diachi" id="diachi" value="<?=$_POST['diachi']?>"></p>
				<p>
					<span class="left-text">Loại khách hàng</span>
					<select name="loaikh" class="validate[required]">
						<option value="">Chọn loại khách hàng</option>
						<? while($row_lkh=mysql_fetch_assoc($lkh)) {?>
							<option value="<?=$row_lkh['idLKH']?>"><?=$row_lkh['MoTa']?></option>
						<? }?>
					</select>
					<span class="error"><?=$error['loaikh']?></span><? if(!isset($error['loaikh'])) {?><span class="right-text">*</span><? }?>
				</p>
				<p><span class="left-text">Dự án</span><input class="validate[required] text-input" type="text" name="duan" id="duan" value="<?=$_POST['duan']?>"><span class="error"><?=$error['duan']?></span><? if(!isset($error['duan'])) {?><span class="right-text">*</span><? }?></p>
				<p>
					<span class="left-text">Tình trạng</span>
					<select name="tinhtrang" class="validate[required]">
						<option value="">Chọn tình trạng</option>
						<? while($row_tt=mysql_fetch_assoc($tt)) {?>
							<option value="<?=$row_tt['idTT']?>"><?=$row_tt['MoTa']?></option>
						<? }?>
					</select>
					<span class="error"><?=$error['tinhtrang']?></span><? if(!isset($error['tinhtrang'])) {?><span class="right-text">*</span><? }?>
				</p>
				<div class="clear"></div>
				<input type="hidden" value="<?=$_SESSION['id']?>" name="nv">
				<input type="submit" value="Thêm" name="submit">
			</form>
	</div>
</div>