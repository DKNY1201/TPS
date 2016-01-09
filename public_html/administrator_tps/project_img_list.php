<?
	require_once "checklogin.php";
	$pr=$i->listProject();
?>
<!-- colorbox -->
<script src="lib/colorbox/jquery.colorbox.min.js"></script>
<!-- multi-column layout -->
<script src="js/jquery.imagesloaded.min.js"></script>
<script src="js/jquery.wookmark.js"></script>
<!-- gallery functions -->
<script src="js/gebo_gallery.js"></script>
<? 
	while($row_pr=mysql_fetch_assoc($pr)){
		$idPro=$row_pr['idPro'];
?>        
<div class="wmk_grid image-gallery" style="max-height:500px">
		<h3 class="heading"><?=$row_pr['name_vn']?><a class="btn btn-danger pull-right" title="Thêm ảnh" href="index.php?p=project_img_add_num&idpr=<?=$idPro?>">Thêm ảnh</a></h3>
      <ul>
      	<? 
			$img=$i->listProjectImg($idPro);
			while($row_img=mysql_fetch_assoc($img))
			{
		?>
        <li class="thumbnail" style="float:left;">
            <a href="<?=$row_img['url_large']?>" title="<?=$row_pr['name_vn']?>">
                <img src="<?=$row_img['url_small']?>" alt="" />
            </a>
            <p>
                <a onclick="return confirm('Bạn muốn xóa hình <?=$row_img['url_large']?>')" href="project_img_del.php?idImg=<?=$row_img['idImg']?>" title="Xóa"><i class="icon-trash"></i></a>
                <a href="" title="Sửa"><i class="icon-pencil"></i></a>
                <span><?=$row_pr['name_vn']?></span>
            </p>
        </li>
        <?
			}
		?>
  	</ul>
</div>
 <? }?>