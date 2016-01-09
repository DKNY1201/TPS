<?
	require_once "classDB.php";
	$so=new db;
	$idCV=(isset($_GET['idCV']))?$_GET['idCV']:0;
	$idLKH=(isset($_GET['idLKH']))?$_GET['idLKH']:0;
	$idTT=(isset($_GET['idTT']))?$_GET['idTT']:0;
	if(isset($_GET['idUser']))
	{
		$idUser=$_GET['idUser'];
		$cl=$so->filter($idCV,$idLKH,$idTT,$idUser);
	}
	
	if(isset($_GET['idGroup']))
	{
		$idGroup=$_GET['idGroup'];
		if($idGroup==1)
			$cl=$so->filter_group_1($idCV,$idLKH,$idTT);
		if($idGroup==2)
			$cl=$so->filter_group_2($idCV,$idLKH,$idTT);
	}
	
	$cv=$so->duty_list();
	$lkh=$so->customer_type_list();
	$tt=$so->status_list();

?> 
<form id="customer-f-f" name="customer-f" action="" method="POST" >
    <table width="100%" border="0" cellpadding="3" id="customer-table">
        <tr class="title">
            <td class="check-box"><input type="checkbox" name="customer-c-a" id="customer-c-a"></td>
            <td class="customer-code">Mã KH</td>
            <td class="name">Họ Tên</td>
            <td class="company">Công ty</td>
            <td class="duty">Chức vụ</td>
            <td class="mobile">Điện thoại</td>
            <td class="email">Email</td>
            <td class="mobile">Địa chỉ</td>
            <td class="category">Phân loại KH</td>
            <td class="project">Dự án</td>
            <td class="stt">Tình trạng</td>
            <td class="stt">Ghi chú</td> 
            <td class="action">Hành động</td>
        </tr>
        
        <? 
        while($row_cl=mysql_fetch_assoc($cl)){
			$idCV=$row_cl['idCV'];
			$cv=$so->duty_detail($idCV);
			$row_cv=mysql_fetch_assoc($cv);
			
			$idLKH=$row_cl['idLKH'];
			$lkh=$so->customer_type_detail($idLKH);
			$row_lkh=mysql_fetch_assoc($lkh);
			
			$idTT=$row_cl['idTT'];
			$tt=$so->status_detail($idTT);
			$row_tt=mysql_fetch_assoc($tt);
        ?>
        <tr>
            <td><input type="checkbox" name="customer-c" id="customer-c" value="<?=$row_cl['idKH']?>"></td>
            <td><?=$row_cl['MaKH']?></td>
            <td><?=$row_cl['HoTen']?></td>
            <td><?=$row_cl['CongTy']?></td>
            <td><?=$row_cv['MoTa']?></td>
            <td><?=$row_cl['SoDT']?><? if(strlen($row_cl['SoDT1'])>=1) {echo ", "; } echo $row_cl['SoDT1']; ?></td>
            <td><?=$row_cl['Email']?><? if(strlen($row_cl['Email1'])>=1) {echo ", "; } echo $row_cl['Email1'];?></td>
            <td><?=$row_cl['DiaChi']?>
            <td><?=$row_lkh['MoTa']?></td>
            <td><?=$row_cl['TenDuAn']?></td>
            <td><?=$row_tt['MoTa']?></td>
            <td><?=$row_cl['GhiChu']?></td>
            <td>
           
            <a href="customer-del.php?idKH=<?=$row_cl['idKH']?>" onclick="return confirm('Xóa khách hàng này?')"><img src="images/delete-ico.png" alt="Delete" title="Delete"></a>
            <a href="index.php?p=customer-edit&idKH=<?=$row_cl['idKH']?>&idUser=<?=$idUser?>" ><img src="images/edit-ico.png" alt="Edit" title="Edit"></a>
           
            </td>
        </tr>
        <? }?>
        
        <tr>
        	<td colspan="13" align="left"><input class="input list" id="delete-all" type="submit" value="Xóa hết"></td>
        </tr>
    </table>
</form>