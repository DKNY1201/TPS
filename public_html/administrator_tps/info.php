<?
	require_once "checklogin.php";
	$info=$i->detailInfo();
	$row_info=mysql_fetch_assoc($info);
	if(isset($_POST['btn-sub']))
	{
		$i->editInfo();
		header("location:index.php");
	}
?>

<form method="post" action="">
    <table class="table table-bordered dTableR">
        <thead>
            <th colspan="2" class="header-table">Sửa thông tin chung</th>
        </thead>
        <tbody>
            <tr>
                <td>Holine</td>
                <td><input type="text" placeholder="Hotline" name="hotline" value="<?=$row_info['hotline']?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" placeholder="Email" name="email" value="<?=$row_info['email']?>"></td>
            </tr>
            <tr>
                <td>Email chi nhánh Đồng Nai</td>
                <td><input type="text" placeholder="Email chi nhánh Đồng Nai" name="email_dn" value="<?=$row_info['email_dn']?>"></td>
            </tr>
            <tr>
                <td>Link Facebook</td>
                <td><input type="text" placeholder="Link Facebook" name="link_fb" value="<?=$row_info['link_fb']?>"></td>
            </tr>
            <tr>
                <td>Link Google Plus</td>
                <td><input type="text" placeholder="Link Google Plus" name="link_gg" value="<?=$row_info['link_gg']?>"></td>
            </tr>
            <tr>
                <td>Link Youtube</td>
                <td><input type="text" placeholder="Link Youtube" name="link_yt" value="<?=$row_info['link_yt']?>"></td>
            </tr>
            <tr>
                <td>Link Skype</td>
                <td><input type="text" placeholder="Link Skype" name="link_sky" value="<?=$row_info['link_sky']?>"></td>
            </tr>
            <tr>
                <td>Link Twitter</td>
                <td><input type="text" placeholder="Link Twitter" name="link_tw" value="<?=$row_info['link_tw']?>"></td>
            </tr>
            <tr>
                <td>Địa chỉ Văn phòng VN</td>
                <td><input type="text" placeholder="Địa chỉ Văn phòng VN" name="diachi_vp_vn" value="<?=$row_info['diachi_vp_vn']?>"></td>
            </tr>
            
            <tr>
                <td>Địa chỉ Văn phòng EN</td>
                <td><input type="text" placeholder="Địa chỉ Văn phòng EN" name="diachi_vp_en" value="<?=$row_info['diachi_vp_en']?>"></td>
            </tr>
            <tr>
                <td>Địa chỉ Nhà máy VN</td>
                <td><input type="text" placeholder="Địa chỉ Nhà máy VN" name="diachi_nm_vn" value="<?=$row_info['diachi_nm_vn']?>"></td>
            </tr>
            
            <tr>
                <td>Địa chỉ Nhà máy EN</td>
                <td><input type="text" placeholder="Địa chỉ Nhà máy EN" name="diachi_nm_en" value="<?=$row_info['diachi_nm_en']?>"></td>
            </tr>
            
            <tr>
                <td>Địa chỉ chi nhánh Đồng Nai VN</td>
                <td><input type="text" placeholder="Địa chỉ chi nhánh Đồng Nai VN" name="diachi_dn_vn" value="<?=$row_info['diachi_dn_vn']?>"></td>
            </tr>
            
            <tr>
                <td>Địa chỉ chi nhánh Đồng Nai EN</td>
                <td><input type="text" placeholder="Địa chỉ chi nhánh Đồng Nai EN" name="diachi_dn_en" value="<?=$row_info['diachi_dn_en']?>"></td>
            </tr>
            
            <tr>
                <td>Điện thoại Văn phòng</td>
                <td><input type="text" placeholder="Điện thoại Văn phòng" name="tel_vp" value="<?=$row_info['tel_vp']?>"></td>
            </tr>
            <tr>
                <td>Điện thoại Nhà máy</td>
                <td><input type="text" placeholder="Điện thoại Nhà máy" name="tel_nm" value="<?=$row_info['tel_nm']?>"></td>
            </tr>
            <tr>
                <td>Điện thoại chi nhánh Đồng Nai</td>
                <td><input type="text" placeholder="Điện thoại chi nhánh Đồng Nai" name="tel_dn" value="<?=$row_info['tel_dn']?>"></td>
            </tr>
            <tr>
                <td>Fax Văn phòng</td>
                <td><input type="text" placeholder="Fax Văn phòng" name="fax_vp" value="<?=$row_info['fax_vp']?>"></td>
            </tr>
            <tr>
                <td>Fax Nhà máy</td>
                <td><input type="text" placeholder="Fax Nhà máy" name="fax_nm" value="<?=$row_info['fax_nm']?>"></td>
            </tr>
            <tr>
                <td>Fax chi nhánh Đồng Nai</td>
                <td><input type="text" placeholder="Fax chi nhánh Đồng Nai" name="fax_dn" value="<?=$row_info['fax_dn']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-danger" name="btn-sub" value="Sửa" >
                </td>
            </tr>
        </tbody>
    </table>
</form>