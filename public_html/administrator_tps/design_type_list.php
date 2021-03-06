<?

	require_once "checklogin.php";

	$pt=$i->listDesignType();

?>

<div class="title"><h3>Danh sách loại Thiết kế - Sản xuất - Lắp dựng</h3></div>

<a href="index.php?p=design_type_add" class="btn btn-danger btn-add" title="Thêm loại Thiết kế - Sản xuất - Lắp dựng">Thêm loại Thiết kế - Sản xuất - Lắp dựng</a>

<table class="table table-striped table-bordered dTableR" id="dt_a">

    <thead>

      <tr>

        <th>ID</th>

        <th>Tên VN</th>

        <th>Tên EN</th>

        <th>Thứ tự</th>

        <th>Ẩn hiện</th>

        <th>Hành động</th>

      </tr>

    </thead>

    <tbody>

     <? while($row_pt=mysql_fetch_assoc($pt)){

        ob_start();

      ?>

      <tr>

        <td>{ID}</td>

        <td>{TenVN}</td>

        <td>{TenEN}</td>

        <td>{ThuTu}</td>

        <td>{AnHien}</td>

        <td><? if($_SESSION['level']==1) {?><a class="icon-edit" title="Chỉnh sửa" href="index.php?p=design_type_edit&idDT={ID}"></a> <a onclick="return confirm('Bạn muốn xóa loại dự án {TenVN}?')" class="icon-remove" title="Xóa" href="design_type_del.php?idDT={ID}"></a> <? }?></td>

      </tr>

      <?

        $str=ob_get_clean();

        $str=str_replace("{ID}",$row_pt['idDT'],$str);

        $str=str_replace("{TenVN}",$row_pt['name_vn'],$str);

        $str=str_replace("{TenEN}",$row_pt['name_en'],$str);

        $str=str_replace("{ThuTu}",$row_pt['thutu'],$str);

        $str=str_replace("{AnHien}",($row_pt['anhien']==1)?"Đang hiện":"Đang ẩn",$str);	

        echo $str;

      }

      ?>

    </tbody>

</table>