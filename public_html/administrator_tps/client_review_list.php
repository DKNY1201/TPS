<?

	require_once "checklogin.php";

	$pt=$i->listClientReview();

?>

<div class="title"><h3>Danh sách thư đánh giá</h3></div>

<a href="index.php?p=client_add" class="btn btn-danger btn-add" title="Thêm thư đánh giá">Thêm thư đánh giá</a>

<table class="table table-striped table-bordered dTableR" id="dt_a">

    <thead>

      <tr>

        <th>ID</th>

        <th>Tên VN</th>

        <th>Tên EN</th>

        <th>Hình</th>

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

        <td><a href="{Hinh}"><img src="{Hinh}" width="120px"></a></td>

        <td>{ThuTu}</td>

        <td>{AnHien}</td>

        <td><a class="icon-edit" title="Chỉnh sửa" href="index.php?p=client_edit&idCR={ID}"></a> <? if($_SESSION['level']==1){?> <a onclick="return confirm('Bạn muốn xóa thư đánh giá {TenVN}?')" class="icon-remove" title="Xóa" href="client_del.php?idCR={ID}"></a><? }?></td>

      </tr>

      <?

        $str=ob_get_clean();

        $str=str_replace("{ID}",$row_pt['idCR'],$str);

        $str=str_replace("{TenVN}",$row_pt['name_vn'],$str);

        $str=str_replace("{TenEN}",$row_pt['name_en'],$str);

        $str=str_replace("{Hinh}",$row_pt['img'],$str);

        $str=str_replace("{ThuTu}",$row_pt['thutu'],$str);

        $str=str_replace("{AnHien}",($row_pt['anhien']==1)?"Đang hiện":"Đang ẩn",$str);	

        echo $str;

      }

      ?>

    </tbody>

</table>