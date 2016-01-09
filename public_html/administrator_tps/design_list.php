<?

	require_once "checklogin.php";

	$pt=$i->listDesign();

?>

<div class="title"><h3>Danh sách các bài viết Thiết kế - Sản xuất - Lắp dựng</h3></div>

<a href="index.php?p=design_add" class="btn btn-danger btn-add" title="Thêm bài viết Thiết kế - Sản xuất - Lắp dựng">Thêm bài viết</a>

<table class="table table-striped table-bordered dTableR" id="dt_a">

    <thead>

      <tr>

        <th>ID</th>

        <th>Tên VN</th>

        <th>Tên EN</th>
        
        <th>Loại TK-SX-LD</th>

        <th>Ngày đăng</th>

        <th>Số lần xem</th>

        <th>Thứ tự</th>

        <th>Ẩn hiện</th>

        <th>Hành động</th>

      </tr>

    </thead>

    <tbody>

     <? while($row_pt=mysql_fetch_assoc($pt)){
		 $idDT=$row_pt['idDT'];
		 $dt=$i->detailDesignType($idDT);
		 $row_dt=mysql_fetch_assoc($dt);
         ob_start();

      ?>

      <tr>

        <td>{ID}</td>

        <td>{TenVN}</td>

        <td>{TenEN}</td>
        
        <td>{Loai}</td>

        <td>{Date}</td>

        <td>{SLX}</td>

        <td>{ThuTu}</td>

        <td>{AnHien}</td>

        <td><a class="icon-edit" title="Chỉnh sửa" href="index.php?p=design_edit&idDe={ID}"></a> <a onclick="return confirm('Bạn muốn xóa bài viết {TenVN}?')" class="icon-remove" title="Xóa" href="design_del.php?idDe={ID}"></a></td>

      </tr>

      <?

        $str=ob_get_clean();

        $str=str_replace("{ID}",$row_pt['idDe'],$str);

        $str=str_replace("{TenVN}",$row_pt['name_vn'],$str);

        $str=str_replace("{TenEN}",$row_pt['name_en'],$str);
		
		$str=str_replace("{Loai}",$row_dt['name_vn'],$str);

		$str=str_replace("{Date}",date("d/m/Y",strtotime($row_pt['date'])),$str);

		$str=str_replace("{SLX}",$row_pt['hits'],$str);

        $str=str_replace("{ThuTu}",$row_pt['thutu'],$str);

        $str=str_replace("{AnHien}",($row_pt['anhien']==1)?"Đang hiện":"Đang ẩn",$str);	

        echo $str;

      }

      ?>

    </tbody>

</table>