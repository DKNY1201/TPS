<?
	require_once "checklogin.php";
	if(isset($_GET['idpr']))
		$idPro=$_GET['idpr'];
	if(isset($_GET['img_amount']))
		$amount=$_GET['img_amount'];
	settype($amount,"int");
	if($amount<=0) $amount=1;
	
	if(isset($_POST['sub-btn']))
	{
		$i->addProjectImg($idPro,$amount);
		header("location:index.php?p=project_img_list");
	}
?>
<script src="ckeditor/ckeditor.js"></script>
<script src="ckfinder/ckfinder.js"></script>
<script type="text/javascript">
function BrowseServer( startupPath, functionData ){
	var finder = new CKFinder();
	finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
	finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
	finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
	finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
	//finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
	finder.popup(); // Bật cửa sổ CKFinder
} //BrowseServer

function SetFileField( fileUrl, data ){
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}
</script>
<form method="post" action="">
    <table class="table table-bordered dTableR">
        <thead>
            <th colspan="3" class="header-table">Thêm hình ảnh dự án</th>
        </thead>
        <tbody>
        <? for($j=1;$j<=$amount;$j++) {?>
            <tr>
                <td>Hình thứ <?=$j?></td>
                <td>
                	<input type="text" placeholder="Hình lớn thứ <?=$j?>" name="imgLarge_<?=$j?>" id="imgLarge_<?=$j?>">
                    <input onclick="BrowseServer('Images:/','imgLarge_<?=$j?>')" type="button" name="btnChonFile" value="Chọn hình" class="btn btn-success btn-choose-img" />
                </td>
                <td>
                	<input type="text" placeholder="Hình nhỏ thứ <?=$j?>" name="imgSmall_<?=$j?>" id="imgSmall_<?=$j?>">
                	<input onclick="BrowseServer('Images:/','imgSmall_<?=$j?>')" type="button" name="btnChonFile" value="Chọn hình" class="btn btn-success btn-choose-img" />
                </td>
            </tr>
        <? }?>
        	<tr>
            	<td></td>
                <td colspan="2"><input type="submit" name="sub-btn" class="btn btn-danger" value="Thêm"></td>
            </tr>
        </tbody>
    </table>
</form>