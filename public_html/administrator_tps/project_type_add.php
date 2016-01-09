<?
	require_once "checklogin.php";
	if(isset($_POST['btn-sub']))
	{
		$i->addProjectType();
		header("location:index.php?p=project_type_list");
	}
?>
<form method="post" action="">
    <table class="table table-bordered dTableR">
        <thead>
            <th colspan="2" class="header-table">Thêm loại dự án</th>
        </thead>
        <tbody>
            <tr>
                <td>Tên VN</td>
                <td><input type="text" placeholder="Tên VN" name="namevn"></td>
            </tr>
            <tr>
                <td>Tên EN</td>
                <td><input type="text" placeholder="Tên EN" name="nameen"></td>
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