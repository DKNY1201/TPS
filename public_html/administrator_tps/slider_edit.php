<?php
	require_once "checklogin.php";

    if(isset($_GET['idSlider'])){
        $idSlider = $_GET['idSlider'];
        $slider = $i-> DetailSlider($idSlider);
        $row_slider = mysql_fetch_assoc($slider);
    }else{
        header("location:index.php?p=slider_list");
    }

	if(isset($_POST['btn-sub']))
	{
		$success=$i->EditSlider($idSlider,&$error);
		if($success==true)
			header("location:index.php?p=slider_list");
	}
?>
<!-- masked inputs -->
<script src="js/forms/jquery.inputmask.min.js"></script>
<!-- datepicker -->
<script src="lib/datepicker/bootstrap-datepicker.min.js"></script>
<!-- form functions -->
<script src="js/gebo_forms.js"></script>
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
            <th colspan="2" class="header-table">Thêm slider</th>
        </thead>
        <tbody>
        	<tr>
                <td>Background</td>
                <td>
                	<input type="text" placeholder="Background" name="background" id="background" value="<? echo $_POST['background'] ? $_POST['background'] : $row_slider['background'];?>">
                    <input onclick="BrowseServer('Images:/','background')" type="button" name="btnChonFile" value="Chọn hình" class="btn btn-success btn-choose-img" />
                </td>
            </tr>
            <tr>
                <td>Link</td>
                <td><input type="text" placeholder="Link" name="link" value="<? echo $_POST['link'] ? $_POST['link'] : $row_slider['link'];?>"></td>
            </tr>
            <tr>
                <td>Tiêu đề 1 VN</td>
                <td><input type="text" placeholder="Tiêu đề 1 VN" name="caption1vn" value="<? echo $_POST['caption1vn'] ? $_POST['caption1vn'] : $row_slider['caption1_vn'];?>"></td>
            </tr>
            <tr>
                <td>Tiêu đề 1 EN</td>
                <td><input type="text" placeholder="Tiêu đề 1 EN" name="caption1en" value="<? echo $_POST['caption1en'] ? $_POST['caption1en'] : $row_slider['caption1_en'];?>"></td>
            </tr>
            <tr>
                <td>Tiêu đề 2 VN</td>
                <td><input type="text" placeholder="Tiêu đề 2 VN" name="caption2vn" value="<? echo $_POST['caption2vn'] ? $_POST['caption2vn'] : $row_slider['caption2_vn'];?>"></td>
            </tr>
            <tr>
                <td>Tiêu đề 2 EN</td>
                <td><input type="text" placeholder="Tiêu đề 2 EN" name="caption2en" value="<? echo $_POST['caption2en'] ? $_POST['caption2en'] : $row_slider['caption2_en'];?>"></td>
            </tr>
            <tr>
                <td>Chủ đầu tư VN</td>
                <td><input type="text" placeholder="Chủ đầu tư VN" name="investorvn" value="<? echo $_POST['investorvn'] ? $_POST['investorvn'] : $row_slider['investor_vn'];?>"></td>
            </tr>
            <tr>
                <td>Chủ đầu tư EN</td>
                <td><input type="text" placeholder="Chủ đầu tư EN" name="investoren" value="<? echo $_POST['investoren'] ? $_POST['investoren'] : $row_slider['investor_en'];?>"></td>
            </tr>
            <tr>
                <td>Quy mô</td>
                <td><input type="text" placeholder="Quy mô" name="scale" value="<? echo $_POST['scale'] ? $_POST['scale'] : $row_slider['scale'];?>"></td>
            </tr>
            <tr>
                <td>Năm hoàn thành</td>
                <td><input type="text" placeholder="Năm hoàn thành" name="year" maxlength="4" value="<? echo $_POST['year'] ? $_POST['year'] : $row_slider['year'];?>"></td>
            </tr>
            <tr>
                <td>Thứ tự</td>
                <td><input type="text" placeholder="Thứ tự" name="nOrder" value="<? echo $_POST['nOrder'] ? $_POST['nOrder'] : $row_slider['nOrder'];?>"></td>
            </tr>
            <tr>
                <td>Ẩn hiện</td>
                <td>
                    <input type="radio" name="isShow" value="0" <?php echo $row_slider['isShow']==0?"checked":""; ?>> Ẩn
                    <input type="radio" name="isShow" value="1" <?php echo $row_slider['isShow']==1?"checked":""; ?>> Hiện
                </td>
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