<?
	if(isset($_GET['idpt']))
		$idPT=$_GET['idpt'];
	$pt=$i->detailProjectType($idPT);
	$row_pt=mysql_fetch_assoc($pt);
	if(isset($_POST['btn-sub']))
	{
		$i->editProjectType($idPT);
		header("location:index.php?p=project_type_list");
	}
?>
<form method="post" action="">
    <table class="table table-bordered dTableR">
        <thead>
            <th colspan="2" class="header-table">Sửa loại dự án</th>
        </thead>
        <tr>
            <td>Tên VN</td>
            <td><input type="text" placeholder="Tên VN" name="namevn" value="<?=$row_pt['name_vn']?>"></td>
        </tr>
        <tr>
            <td>Tên EN</td>
            <td><input type="text" placeholder="Tên EN" name="nameen" value="<?=$row_pt['name_en']?>"></td>
        </tr>
        <tr>
            <td>Thứ tự</td>
            <td><input type="text" placeholder="Thứ tự" name="thutu" value="<?=$row_pt['thutu']?>"></td>
        </tr>
        <tr>
            <td>Ẩn hiện</td>
            <td>
                <input type="radio" name="anhien" value="0" <? echo ($row_pt['anhien']==0)?"checked":""?>> Ẩn
                <input type="radio" name="anhien" value="1" <? echo ($row_pt['anhien']==1)?"checked":""?>> Hiện
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