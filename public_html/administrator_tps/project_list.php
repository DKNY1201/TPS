<?
	require_once "checklogin.php";
	$pr=$i->listProject();
?>
<div class="title"><h3>Danh sách Dự án</h3></div>
<a href="index.php?p=project_add" class="btn btn-danger btn-add" title="Thêm dự án">Thêm dự án</a>
<table class="table table-striped table-bordered dTableR" id="dt_a">
    <thead>
      <tr>
      	<th>Thứ tự</th>
        <th>Tên VN</th>
        <th>Tên EN</th>
        <th>Loại dự án</th>
        <th>Quốc gia</th>
        <th>Địa điểm</th>
        <th>Chủ đầu tư</th>
        <th>Quy mô</th>
        <th>Lĩnh vực</th>
        <th>Ngày hoàn thành</th>
        <th>Nổi bật</th>
        <th>Ẩn hiện</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
     <? while($row_pr=mysql_fetch_assoc($pr)){
		 $idPT=$row_pr['idPT'];
		 $pt=$i->detailProjectType($idPT);
		 $row_pt=mysql_fetch_assoc($pt);
         ob_start();  
      ?>
      <tr>
      	<td>{ThuTu}</td>
        <td>{TenVN}</td>
        <td>{TenEN}</td>
        <td>{LoaiDA}</td>
        <td>{QuocGia}</td>
        <td>{DiaDiem}</td>
        <td>{CDT}</td>
        <td>{QuyMo} m<sup>2</sup></td>
        <td>{LinhVuc}</td>
        <td>{Nam}</td>
        <td>{NoiBat}</td>
        <td>{AnHien}</td>
        <td><a class="icon-edit" title="Chỉnh sửa" href="index.php?p=project_edit&idpr={ID}"></a> <a onclick="return confirm('Bạn muốn xóa dự án {TenVN}?')" class="icon-remove" title="Xóa" href="project_del.php?idpr={ID}"></a></td>
      </tr>
      <?
        $str=ob_get_clean();
        $str=str_replace("{ID}",$row_pr['idPro'],$str);
        $str=str_replace("{TenVN}",$row_pr['name_vn'],$str);
        $str=str_replace("{TenEN}",$row_pr['name_en'],$str);
		$str=str_replace("{LoaiDA}",$row_pt['name_vn'],$str);
		$str=str_replace("{DiaDiem}",$row_pr['location_vn'],$str);
		$str=str_replace("{QuocGia}",$row_pr['national_vn'],$str);
		$str=str_replace("{CDT}",$row_pr['investor_vn'],$str);
		$str=str_replace("{QuyMo}",number_format($row_pr['scale'],0,".",","),$str);
		$str=str_replace("{LinhVuc}",$row_pr['scope_vn'],$str);
		$str=str_replace("{Nam}",date("d/m/Y",strtotime($row_pr['year'])),$str);
        $str=str_replace("{ThuTu}",$row_pr['thutu'],$str);
		$str=str_replace("{NoiBat}",($row_pr['feature']==1)?"Có":"Không",$str);	
        $str=str_replace("{AnHien}",($row_pr['anhien']==1)?"Đang hiện":"Đang ẩn",$str);	
        echo $str;
      }
      ?>
    </tbody>
</table>