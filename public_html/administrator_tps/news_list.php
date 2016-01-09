<?
	require_once "checklogin.php";
	$pr=$i->listNews();
?>
<div class="title"><h3>Danh sách Tin tức</h3></div>
<a href="index.php?p=news_add" class="btn btn-danger btn-add" title="Thêm tin tức">Thêm tin tức</a>
<table class="table table-striped table-bordered dTableR" id="dt_a">
    <thead>
      <tr>
      	<th>Thứ tự</th>
        <th>Tiêu đề VN</th>
        <th>Tiêu đề EN</th>
        <th>Loại tin</th>
        <th>Tóm tắt VN</th>
        <th>Tóm tắt EN</th>
        <th>Số lần xem</th>
        <th>Ngày đăng tin</th>
        <th>Nổi bật</th>
        <th>Ẩn hiện</th>
        <th>Hành động</th>
      </tr>
    </thead>
    <tbody>
     <? while($row_pr=mysql_fetch_assoc($pr)){
		 $idNT=$row_pr['idNT'];
		 $pt=$i->detailNewsType($idNT);
		 $row_pt=mysql_fetch_assoc($pt);
         ob_start();  
      ?>
      <tr>
      	<td>{ThuTu}</td>
        <td>{TenVN}</td>
        <td>{TenEN}</td>
        <td>{LoaiTin}</td>
        <td>{SumVN}</td>
        <td>{SumEN}</td>
        <td>{SLX}</td>
        <td>{Date}</td>
        <td>{NoiBat}</td>
        <td>{AnHien}</td>
        <td><a class="icon-edit" title="Chỉnh sửa" href="index.php?p=news_edit&idNews={ID}"></a> <a onclick="return confirm('Bạn muốn xóa tin tức {TenVN}?')" class="icon-remove" title="Xóa" href="news_del.php?idNews={ID}"></a></td>
      </tr>
      <?
        $str=ob_get_clean();
        $str=str_replace("{ID}",$row_pr['idNews'],$str);
        $str=str_replace("{TenVN}",$row_pr['name_vn'],$str);
        $str=str_replace("{TenEN}",$row_pr['name_en'],$str);
		$str=str_replace("{LoaiTin}",$row_pt['name_vn'],$str);
		$str=str_replace("{SumVN}",$i->rutgonchuoi($row_pr['sum_vn'],20),$str);
		$str=str_replace("{SumEN}",$i->rutgonchuoi($row_pr['sum_vn'],20),$str);
		$str=str_replace("{SLX}",$row_pr['hits'],$str);
		$str=str_replace("{Date}",date("d/m/Y",strtotime($row_pr['date'])),$str);
        $str=str_replace("{ThuTu}",$row_pr['thutu'],$str);
		$str=str_replace("{NoiBat}",($row_pr['feature']==1)?"Có":"Không",$str);	
        $str=str_replace("{AnHien}",($row_pr['anhien']==1)?"Đang hiện":"Đang ẩn",$str);	
        echo $str;
      }
      ?>
    </tbody>
</table>