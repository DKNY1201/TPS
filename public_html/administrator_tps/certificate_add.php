<?
	require_once "checklogin.php";
	if(isset($_POST['btn-sub']))
	{
		$i->addCertificate();
		header("location:index.php?p=certificate_list");
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
            <th colspan="2" class="header-table">Thêm thư đánh giá</th>
        </thead>
      <tbody>
            <tr>
                <td>Tên VN</td>
                <td><input type="text" placeholder="Tên VN" name="namevn" value="<? if(isset($_POST['name_vn'])) echo $_POST['name_vn'];?>"></td>
            </tr>
            <tr>
                <td>Tên EN</td>
                <td><input type="text" placeholder="Tên EN" name="nameen" value="<? if(isset($_POST['name_en'])) echo $_POST['name_en'];?>"></td>
            </tr>
            <tr>
                <td>Hình</td>
                <td>
                    <input type="text" placeholder="Hình" name="img" id="img">
                    <input onclick="BrowseServer('Images:/','img')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn hình" class="btn btn-success btn-choose-img" />
                </td>  
            </tr>
            <tr>
                <td>Thứ tự</td>
                <td><input type="text" placeholder="Thứ tự" name="thutu"></td>
            </tr>
            <tr>
                <td>Ẩn hiện</td>
                <td>
                    <input type="radio" name="anhien" value="0"> Ẩn
                    <input type="radio" name="anhien" value="1" checked> Hiện
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="btn btn-danger" name="btn-sub" value="Thêm" >
                </td>
            </tr>
        </tbody>
    </table>
</form>