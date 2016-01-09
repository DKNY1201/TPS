<?
	if(isset($_GET['idCR']))
		$idCR=$_GET['idCR'];
	$cr=$i->detailClientReview($idCR);
	$row_cr=mysql_fetch_assoc($cr);
	if(isset($_POST['btn-sub']))
	{
		$i->editClientReview($idCR);
		header("location:index.php?p=client_list");
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
            <th colspan="2" class="header-table">Chỉnh sửa loại dự án</th>
        </thead>
        <tr>
            <td>Tên VN</td>
            <td><input type="text" placeholder="Tên VN" name="namevn" value="<?=$row_cr['name_vn']?>"></td>
        </tr>
        <tr>
            <td>Tên EN</td>
            <td><input type="text" placeholder="Tên EN" name="nameen" value="<?=$row_cr['name_en']?>"></td>
        </tr>
        <tr>
            <td>Hình</td>
            <td>
                <input type="text" placeholder="Hình" name="img" id="img" value="<?=$row_cr['img']?>">
                <input onclick="BrowseServer('Images:/','img')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn hình" class="btn btn-success btn-choose-img" />
            </td>  
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td><input type="text" placeholder="Thứ tự" name="thutu" value="<?=$row_cr['thutu']?>"></td>
        </tr>
        <tr>
            <td>Ẩn hiện</td>
            <td>
                <input type="radio" name="anhien" value="0" <? echo ($row_cr['anhien']==0)?"checked":""?>> Ẩn
                <input type="radio" name="anhien" value="1" <? echo ($row_cr['anhien']==1)?"checked":""?>> Hiện
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" class="btn btn-danger" name="btn-sub" value="Sửa" >
            </td>
        </tr>
    </table>
</form>