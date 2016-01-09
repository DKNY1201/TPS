<?
	require_once "checklogin.php";
	if(isset($_GET['idNews']))
		$idNews=$_GET['idNews'];
	$pt=$i->listNewsType();
	$pr=$i->detailNews($idNews);
	$row_pr=mysql_fetch_assoc($pr);
	if(isset($_POST['btn-sub']))
	{
		$success=$i->editNews($idNews,$error);
		if($success==true)
			header("location:index.php?p=news_list");
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
            <th colspan="2" class="header-table">Sửa tin tức</th>
        </thead>
        <tbody>
        	<? if(isset($error['date'])) {?>
        	<tr>
            	<td></td>
                <td><code><? echo $error['date'];?></code></td>
            </tr>
            <? }?>
        	<tr>
            	<td>Loại tin</td>
                <td>
                	<select name="news_type">
                    <? 
						while($row_pt=mysql_fetch_assoc($pt)) {
							$idpt=$row_pr['idNT'];
							$s="";
							if($idpt==$row_pt['idNT'])
								$s="selected=selected";
					?>
                    	<option value="<?=$row_pt['idNT']?>" <?=$s?>><?=$row_pt['name_vn']?></option>
                    <? }?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tiêu đề VN</td>
                <td><input type="text" placeholder="Tên VN" name="namevn" value="<? echo (isset($_POST['namevn']))?$_POST['namevn']:$row_pr['name_vn'];?>"></td>
            </tr>
            <tr>
                <td>Tiêu đề EN</td>
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
                <td>Tóm tắt VN</td>
                <td><textarea name="sum_vn" style="width:60%" placeholder="Tóm tắt VN"><? echo (isset($_POST['sum_vn']))?$_POST['sum_vn']:$row_pr['sum_vn'];?></textarea></td>
            </tr>
            <tr>
                <td>Tóm tắt EN</td>
                <td><textarea name="sum_en" style="width:60%" placeholder="Tóm tắt EN"><? echo (isset($_POST['sum_en']))?$_POST['sum_en']:$row_pr['sum_en'];?></textarea></td>
            </tr>
            <tr>
                <td>Nội dung VN</td>
                <td>
                <textarea name="content_vn" id="content_vn" placeholder="Nội dung VN"><? echo (isset($_POST['content_vn']))?$_POST['content_vn']:$row_pr['content_vn'];?></textarea>
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
                	<textarea name="content_en" id="content_en" placeholder="Nội dung EN"><? echo (isset($_POST['content_en']))?$_POST['content_en']:$row_pr['content_en'];?></textarea>
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
                <td><input id="dp1" type="text" placeholder="20/04/2014" name="date" value="<? echo (isset($_POST['date']))?$_POST['date']:date("d/m/Y",strtotime($row_pr['date']));?>"></td>
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