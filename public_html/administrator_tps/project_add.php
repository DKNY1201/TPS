<?

	$pt=$i->listProjectType();

	$tag=$i->listProjectTag();

	if(isset($_POST['btn-sub']))

	{

		$success=$i->addProject($error);

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

            <th colspan="2" class="header-table">Thêm dự án</th>

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

                    <? while($row_pt=mysql_fetch_assoc($pt)) {?>

                    	<option value="<?=$row_pt['idPT']?>"><?=$row_pt['name_vn']?></option>

                    <? }?>

                    </select>

                </td>

            </tr>

            <tr>

            	<td>Tag</td>

                <td>

                	<select name="tag">

                    <? while($row_tag=mysql_fetch_assoc($tag)) {?>

                    	<option value="<?=$row_tag['idTag']?>"><?=$row_tag['name_vn']?></option>

                    <? }?>

                    </select>

                </td>

            </tr>

            <tr>

                <td>Tên VN</td>

                <td><input type="text" placeholder="Tên VN" name="namevn" value="<? if(isset($_POST['namevn'])) echo $_POST['namevn'];?>"></td>

            </tr>

            <tr>

                <td>Tên EN</td>

                <td><input type="text" placeholder="Tên EN" name="nameen" value="<? if(isset($_POST['nameen'])) echo $_POST['nameen'];?>"></td>

            </tr>

            <tr>

                <td>Hình</td>

                <td>

                	<input type="text" placeholder="Hình" name="img" id="img" value="<? if(isset($_POST['img'])) echo $_POST['img'];?>">

                    <input onclick="BrowseServer('Images:/','img')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn hình" class="btn btn-success btn-choose-img" />

                </td>

            </tr>

            <tr>

                <td>Quốc gia VN</td>

                <td><input type="text" placeholder="Quốc gia VN" name="national_vn" value="<? if(isset($_POST['national_vn'])) echo $_POST['national_vn'];?>"></td>

            </tr>

            <tr>

                <td>Quốc gia EN</td>

                <td><input type="text" placeholder="Quốc gia EN" name="national_en" value="<? if(isset($_POST['national_en'])) echo $_POST['national_en'];?>"></td>

            </tr>

            <tr>

                <td>Địa điểm VN</td>

                <td><input type="text" placeholder="Địa điểm VN" name="location_vn" value="<? if(isset($_POST['location_vn'])) echo $_POST['location_vn'];?>"></td>

            </tr>

            <tr>

                <td>Địa điểm EN</td>

                <td><input type="text" placeholder="Địa điểm EN" name="location_en" value="<? if(isset($_POST['location_en'])) echo $_POST['location_en'];?>"></td>

            </tr>

            <tr>

                <td>Chủ đầu tư VN</td>

                <td><input type="text" placeholder="Chủ đầu tư VN" name="investor_vn" value="<? if(isset($_POST['investor_vn'])) echo $_POST['investor_vn'];?>"></td>

            </tr>

            <tr>

                <td>Chủ đầu tư EN</td>

                <td><input type="text" placeholder="Chủ đầu tư EN" name="investor_en" value="<? if(isset($_POST['investor_en'])) echo $_POST['investor_en'];?>"></td>

            </tr>

            <tr>

                <td>Quy mô</td>

                <td><input type="text" placeholder="Quy mô" name="scale" value="<? if(isset($_POST['scale'])) echo $_POST['scale'];?>"></td>

            </tr>
            <tr>

                <td>Ngày hoàn thành</td>

                <td><input id="dp1" type="text" placeholder="20/04/2014" name="year" value="<? if(isset($_POST['year'])) echo $_POST['year'];?>"></td>

            </tr>

            <tr>

                <td>Thứ tự</td>

                <td><input type="text" placeholder="Thứ tự" name="thutu" value="<? if(isset($_POST['thutu'])) echo $_POST['thutu'];?>"></td>

            </tr>

            <tr>

                <td>Nổi bật</td>

                <td>

                    <input type="radio" name="feature" value="0"> Không

                    <input type="radio" name="feature" value="1" checked> Có

                </td>

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