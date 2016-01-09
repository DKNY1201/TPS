<?php
	require_once "checklogin.php";
	if(isset($_POST['btn-sub']))

	{

		$success=$i->addSlider(&$error);

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
                	<input type="text" placeholder="Background" name="background" id="background">
                    <input onclick="BrowseServer('Images:/','background')" type="button" name="btnChonFile" value="Chọn hình" class="btn btn-success btn-choose-img" />
                </td>
            </tr>

            <tr>

                <td>Link</td>

                <td><input type="text" placeholder="Link" name="link" value="<? if(isset($_POST['link'])) echo $_POST['link'];?>"></td>

            </tr>

            <tr>
                <td>Tiêu đề 1 VN</td>
                <td><input type="text" placeholder="Tiêu đề 1 VN" name="caption1vn" value="<? if(isset($_POST['caption1vn'])) echo $_POST['caption1vn'];?>"></td>
            </tr>

            <tr>
                <td>Tiêu đề 1 EN</td>
                <td><input type="text" placeholder="Tiêu đề 1 EN" name="caption1en" value="<? if(isset($_POST['caption1en'])) echo $_POST['caption1en'];?>"></td>
            </tr>
            
            <tr>
                <td>Tiêu đề 2 VN</td>
                <td><input type="text" placeholder="Tiêu đề 2 VN" name="caption2vn" value="<? if(isset($_POST['caption2vn'])) echo $_POST['caption2vn'];?>"></td>
            </tr>

            <tr>
                <td>Tiêu đề 2 EN</td>
                <td><input type="text" placeholder="Tiêu đề 2 EN" name="caption2en" value="<? if(isset($_POST['caption2en'])) echo $_POST['caption2en'];?>"></td>
            </tr>
            
            <tr>
                <td>Chủ đầu tư VN</td>
                <td><input type="text" placeholder="Chủ đầu tư VN" name="investorvn" value="<? if(isset($_POST['investorvn'])) echo $_POST['investorvn'];?>"></td>
            </tr>
            
            <tr>
                <td>Chủ đầu tư EN</td>
                <td><input type="text" placeholder="Chủ đầu tư EN" name="investoren" value="<? if(isset($_POST['investoren'])) echo $_POST['investoren'];?>"></td>
            </tr>
            
            <tr>
                <td>Quy mô</td>
                <td><input type="text" placeholder="Quy mô" name="scale" value="<? if(isset($_POST['scale'])) echo $_POST['scale'];?>"></td>
            </tr>
            
            <tr>
                <td>Năm hoàn thành</td>
                <td><input type="text" placeholder="Năm hoàn thành" name="year" maxlength="4" value="<? if(isset($_POST['year'])) echo $_POST['year'];?>"></td>
            </tr>

            <tr>
                <td>Thứ tự</td>
                <td><input type="text" placeholder="Thứ tự" name="nOrder" value="<? if(isset($_POST['nOrder'])) echo $_POST['nOrder'];?>"></td>
            </tr>

            <tr>
                <td>Ẩn hiện</td>
                <td>
                    <input type="radio" name="isShow" value="0" <?php if(isset($_POST['isShow']) && $_POST['isShow'] == 0){?> checked="checked" <?php }?>> Ẩn
                    <input type="radio" name="isShow" value="1" checked> Hiện
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