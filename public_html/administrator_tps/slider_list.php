<?php
	require_once "checklogin.php";
	$re=$i->ListSlider();
?>
<div class="title"><h3>Quản lí slider</h3></div>

<a href="index.php?p=slider_add" class="btn btn-danger btn-add" title="Thêm slider">Thêm slider</a>
<table class="table table-striped table-bordered dTableR" id="dt_a">
    <thead>
      <tr>
        <th>Background / Link dự án</th>
        <th>Tiêu đề 1 VN</th>
        <th>Tiêu đề 1 EN</th>
		    <th>Tiêu đề 2 VN</th>
        <th>Tiêu đề 2 EN</th>
        <th>Chủ đầu tư VN</th>
        <th>Chủ đầu tư EN</th>
        <th>Quy mô (m2)</th>
        <th>Năm hoàn thành</th>
        <th>Thứ tự</th>
		    <th>Ẩn hiện</th>
        <th>Hành động</th>
      </tr>
    </thead>

    <tbody>
     <?php while($row_re=mysql_fetch_assoc($re)){
        ob_start();
      ?>
      <tr>
        <td>
            <a href="{background}" title="{caption1vn}" target="_blank">
                <img width="150px" src="{background}" alt="" />
            </a>
            <a href="{link}" target="_blank" />{link}</a>
        </td>
        <td>{caption1vn}</td>
		    <td>{caption1en}</td>
        <td>{caption2vn}</td>
        <td>{caption2en}</td>
        <td>{investorvn}</td>
		    <td>{investoren}</td>
        <td>{scale}</td>
		    <td>{year}</td>
        <td>{order}</td>
        <td>{isshow}</td>
        <td><a class="icon-edit" title="Chỉnh sửa" href="index.php?p=slider_edit&idSlider={ID}"></a> <a onclick="return confirm('Bạn muốn xóa slider {caption1vn}?')" class="icon-remove" title="Xóa" href="slider_del.php?idSlider={ID}"></a></td>
      </tr>
      <?php
			$str=ob_get_clean();
	
			$str=str_replace("{ID}",$row_re['idSlider'],$str);
			$str=str_replace("{background}",'../' . $row_re['background'],$str);
			$str=str_replace("{link}",$row_re['link'],$str);
			$str=str_replace("{caption1vn}",$row_re['caption1_vn'],$str);
			$str=str_replace("{caption1en}",$row_re['caption1_en'],$str);
			$str=str_replace("{caption2vn}",$row_re['caption2_vn'],$str);
			$str=str_replace("{caption2en}",$row_re['caption2_en'],$str);
			$str=str_replace("{investorvn}",$row_re['investor_vn'],$str);
			$str=str_replace("{investoren}",$row_re['investor_en'],$str);
			$str=str_replace("{scale}",$row_re['scale'],$str);
			$str=str_replace("{year}",$row_re['year'],$str);
			$str=str_replace("{order}",$row_re['nOrder'],$str);
			$str=str_replace("{isshow}",($row_re['isShow']==1)?"Đang hiện":"Đang ẩn",$str);	
			echo $str;
		  }

      ?>

    </tbody>
</table>