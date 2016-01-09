<?

	require_once "checklogin.php";

	$pt=$i->listRecruitment();

?>

<div class="title"><h3>Danh sách các bài viết Nhân sự</h3></div>

<a href="index.php?p=recruitment_add" class="btn btn-danger btn-add" title="Thêm bài viết Nhân sự">Thêm bài viết</a>

<table class="table table-striped table-bordered dTableR" id="dt_a">

    <thead>

      <tr>

        <th>ID</th>

        <th>Tên VN</th>

        <th>Tên EN</th>

        <th>Ngày đăng</th>

        <th>Số lần xem</th>

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

        <td>{Date}</td>

        <td>{SLX}</td>

        <td>{ThuTu}</td>

        <td>{AnHien}</td>

        <td><a class="icon-edit" title="Chỉnh sửa" href="index.php?p=recruitment_edit&idRe={ID}"></a> <a onclick="return confirm('Bạn muốn xóa bài viết {TenVN}?')" class="icon-remove" title="Xóa" href="recruitment_del.php?idRe={ID}"></a></td>

      </tr>

      <?

        $str=ob_get_clean();

        $str=str_replace("{ID}",$row_pt['idRe'],$str);

        $str=str_replace("{TenVN}",$row_pt['name_vn'],$str);

        $str=str_replace("{TenEN}",$row_pt['name_en'],$str);

		$str=str_replace("{Date}",date("d/m/Y",strtotime($row_pt['date'])),$str);

		$str=str_replace("{SLX}",$row_pt['hits'],$str);

        $str=str_replace("{ThuTu}",$row_pt['thutu'],$str);

        $str=str_replace("{AnHien}",($row_pt['anhien']==1)?"Đang hiện":"Đang ẩn",$str);	

        echo $str;

      }

      ?>

    </tbody>

</table>