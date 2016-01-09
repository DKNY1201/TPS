<?

	if(isset($_GET['idpr']))

		$idpr=$_GET['idpr'];

	$pt=$i->listProjectType();

	$tag=$i->listProjectTag();

	$pr=$i->detailProject($idpr);

	$row_pr=mysql_fetch_assoc($pr);

	if(isset($_POST['btn-sub']))

	{

		$success=$i->editProject($idpr,$error);

		if($success==true)

			header("location:index.php?p=project_list");

	}

?>

<!-- masked inputs -->

<script src="js/forms/jquery.inputmask.min.js"></script>

<!-- datepicker -->

<script src="lib/datepicker/bootstrap-datepicker.min.js"></script>

<!-- form functions -->

<script src="js/gebo_forms.js"></script>

<script src="js/gebo_dashboard.js"></script>

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

function ShowThumbnails( fileUrl, data ){	

	var sFileName = this.getSelectedFile().name; // this = CKFinderAPI

	document.getElementById( 'thumbnails' ).innerHTML +=

	'<div class="thumb">' +

	'<img src="' + fileUrl + '" />' +

	'<div class="caption">' +

	'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +

	'</div>' +

	'</div>';

	document.getElementById('preview').style.display = "";

	return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn

}

</script>

<form method="post" action="">

    <table class="table table-bordered dTableR">

        <thead>

            <th colspan="2" class="header-table">Sửa dự án</th>

        </thead>

        <tbody>

        	<? if(isset($error['year'])) {?>

        	<tr>

            	<td></td>

                <td><code><? echo $error['year'];?></code></td>

            </tr>

            <? }?>

        	<tr>

            	<td>Loại dự án</td>

                <td>

                	<select name="project_type">

                    <? 

						while($row_pt=mysql_fetch_assoc($pt)) {

							$idpt=$row_pr['idPT'];

							$s="";

							if($idpt==$row_pt['idPT'])

								$s="selected=selected";

					?>

                    	<option value="<?=$row_pt['idPT']?>" <?=$s?>><?=$row_pt['name_vn']?></option>

                    <? }?>

                    </select>

                </td>

            </tr>

            <tr>

            	<td>Ngành nghề</td>

                <td>

                	<select name="tag">

                    <? 

						while($row_tag=mysql_fetch_assoc($tag)) {

							$idtag=$row_pr['idTag'];

							$s="";

							if($idtag==$row_tag['idTag'])

								$s="selected=selected";

					?>

                    	<option value="<?=$row_tag['idTag']?>" <?=$s?>><?=$row_tag['name_vn']?></option>

                    <? }?>

                    </select>

                </td>

            </tr>

            <tr>

                <td>Tên VN</td>

                <td><input type="text" placeholder="Tên VN" name="namevn" value="<? echo (isset($_POST['namevn']))?$_POST['namevn']:$row_pr['name_vn'];?>"></td>

            </tr>

            <tr>

                <td>Tên EN</td>

                <td><input type="text" placeholder="Tên EN" name="nameen" value="<? echo (isset($_POST['nameen']))?$_POST['nameen']:$row_pr['name_en'];?>"></td>

            </tr>

            <tr>

                <td>Hình</td>

                <td>

                	<input type="text" placeholder="Hình" name="img" id="img" value="<? echo (isset($_POST['img']))?$_POST['img']:$row_pr['img'];?>">

                    <input onclick="BrowseServer('Images:/','img')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn hình" class="btn btn-success btn-choose-img" />

                </td>

            </tr>

            <tr>

                <td>Quốc gia VN</td>

                <td><input type="text" placeholder="Quốc gia VN" name="national_vn" value="<? echo (isset($_POST['national_vn']))?$_POST['national_vn']:$row_pr['national_vn'];?>"></td>

            </tr>

            <tr>

                <td>Quốc gia EN</td>

                <td><input type="text" placeholder="Quốc gia EN" name="national_en" value="<? echo (isset($_POST['national_en']))?$_POST['national_en']:$row_pr['national_en'];?>"></td>

            </tr>

            <tr>

                <td>Địa điểm VN</td>

                <td><input type="text" placeholder="Địa điểm VN" name="location_vn" value="<? echo (isset($_POST['location_vn']))?$_POST['location_vn']:$row_pr['location_vn'];?>"></td>

            </tr>

            <tr>

                <td>Địa điểm EN</td>

                <td><input type="text" placeholder="Địa điểm EN" name="location_en" value="<? echo (isset($_POST['location_en']))?$_POST['location_en']:$row_pr['location_en'];?>"></td>

            </tr>

            <tr>

                <td>Chủ đầu tư VN</td>

                <td><input type="text" placeholder="Chủ đầu tư VN" name="investor_vn" value="<? echo (isset($_POST['investor_vn']))?$_POST['investor_vn']:$row_pr['investor_vn'];?>"></td>

            </tr>

            <tr>

                <td>Chủ đầu tư EN</td>

                <td><input type="text" placeholder="Chủ đầu tư EN" name="investor_en" value="<? echo (isset($_POST['investor_en']))?$_POST['investor_en']:$row_pr['investor_en'];?>"></td>

            </tr>

            <tr>

                <td>Quy mô</td>

                <td><input type="text" placeholder="Quy mô" name="scale" value="<? echo (isset($_POST['scale']))?$_POST['scale']:$row_pr['scale'];?>"></td>

            </tr>
            <tr>

                <td>Ngày hoàn thành</td>

                <td><input id="dp1" type="text" placeholder="20/04/2014" name="year" value="<? echo (isset($_POST['year']))?$_POST['year']:date("d/m/Y",strtotime($row_pr['year']));?>"></td>

            </tr>

            <tr>

                <td>Thứ tự</td>

                <td><input type="text" placeholder="Thứ tự" name="thutu" value="<? echo (isset($_POST['thutu']))?$_POST['thutu']:$row_pr['thutu'];?>"></td>

            </tr>

            <tr>

                <td>Nổi bật</td>

                <td>

                    <input type="radio" name="feature" value="0" <? echo ($row_pr['feature']==0)?"checked":""; ?>> Không

                    <input type="radio" name="feature" value="1" <? echo ($row_pr['feature']==1)?"checked":""; ?>> Có

                </td>

            </tr>

            <tr>

                <td>Ẩn hiện</td>

                <td>

                    <input type="radio" name="anhien" value="0" <? echo ($row_pr['anhien']==0)?"checked":""; ?>> Ẩn

                    <input type="radio" name="anhien" value="1" <? echo ($row_pr['anhien']==1)?"checked":""; ?>> Hiện

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