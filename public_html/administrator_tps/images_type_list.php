<?

	require_once "checklogin.php";

	$pt=$i->listImagesType();

?>

<div class="title"><h3>Danh sách loại hình ảnh</h3></div>

<a href="index.php?p=images_type_add" class="btn btn-danger btn-add" title="Thêm loại hình ảnh">Thêm loại hình ảnh</a>

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

        <td><img class="img-responsive" width="150px" src="{Hinh}" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" title="{TenVN}" /></td>

        <td>{ThuTu}</td>

        <td>{AnHien}</td>

        <td><a class="icon-edit" title="Chỉnh sửa" href="index.php?p=images_type_edit&idImgType={ID}"></a> <? if($_SESSION['level']==1){?> <a onclick="return confirm('Bạn muốn xóa loại hình ảnh {TenVN}?')" class="icon-remove" title="Xóa" href="images_type_del.php?idImgType={ID}"></a><? }?></td>

      </tr>

      <?

        $str=ob_get_clean();

        $str=str_replace("{ID}",$row_pt['idImgType'],$str);

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