<?

	require_once "checklogin.php";

	if(isset($_GET['idRe']))

		$idRe=$_GET['idRe'];

	$it=$i->detailRecruitment($idRe);

	$row_it=mysql_fetch_assoc($it);

	if(isset($_POST['btn-sub']))

	{

		$success=$i->editRecruitment($idRe,&$error);

		if($success==true)

			header("location:index.php?p=recruitment_list");

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

            <th colspan="2" class="header-table">Sửa bài viết Nhân sự</th>

        </thead>

        <tbody>

        	<? if(isset($error['date'])) {?>

        	<tr>

            	<td></td>

                <td><code><? echo $error['date'];?></code></td>

            </tr>

            <? }?>

            <tr>

                <td>Tên VN</td>

                <td><input type="text" placeholder="Tên VN" name="namevn" value="<? echo (isset($_POST['namevn']))?$_POST['namevn']:$row_it['name_vn'];?>"></td>

            </tr>

            <tr>

                <td>Tên EN</td>

                <td><input type="text" placeholder="Tên EN" name="nameen" value="<? echo (isset($_POST['nameen']))?$_POST['nameen']:$row_it['name_en'];?>"></td>

            </tr>

            <tr>

                <td>Nội dung VN</td>

                <td>

                <textarea name="content_vn" id="content_vn" placeholder="Nội dung VN"><? echo (isset($_POST['content_vn']))?$_POST['content_vn']:$row_it['content_vn'];?></textarea>

                <script type="text/javascript">

				var editor = CKEDITOR.replace( 'content_vn',{

					filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',

					filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',

					filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

					filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

				});		

				</script>

            </tr>

            <tr>

                <td>Nội dung EN</td>

                <td>

                	<textarea name="content_en" id="content_en" placeholder="Nội dung EN"><? echo (isset($_POST['content_en']))?$_POST['content_en']:$row_it['content_en'];?></textarea>

	                <script type="text/javascript">

				var editor = CKEDITOR.replace( 'content_en',{

					filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',

					filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',

					filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

					filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

				});		

				</script>

                </td>

            </tr>

            <tr>

                <td>Ngày đăng</td>

                <td><input id="dp1" type="text" placeholder="20/04/2014" name="date" value="<? echo (isset($_POST['date']))?$_POST['date']:date("d/m/Y",strtotime($row_it['date']));?>"></td>

            </tr>

            <tr>

                <td>Thứ tự</td>

                <td><input type="text" placeholder="Thứ tự" name="thutu" value="<? echo (isset($_POST['thutu']))?$_POST['thutu']:$row_it['thutu'];?>"></td>

            </tr>

            <tr>

                <td>Ẩn hiện</td>

                <td>

                    <input type="radio" name="anhien" value="0" <? echo ($row_it['anhien']==0)?"checked":""; ?>> Ẩn

                    <input type="radio" name="anhien" value="1" <? echo ($row_it['anhien']==1)?"checked":""; ?>> Hiện

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