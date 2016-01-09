<?	
	if(isset($_GET['url']))
		$url=$_GET['url'];
	$idHR=$i->getidHRFromUrl($url);
	$i->increaseHRHits($idHR);
	$hr=$i->detailHR($idHR);
	$row_hr=mysql_fetch_assoc($hr);	
	$it_l=$i->listIntroduction();
	$hr_l=$i->listHR();
	$dt_l=$i->listDesignType();
?>

<div class="values">
	<section class="header-section">
        <div class="container">
            <div class="row">
                <div class="bread col-xs-12 col-sm-6 col-lg-push-6 col-md-push-6 col-sm-push-6">
                    <ol class="breadcrumb pull-right">
                      <li><a href="index.php">{Home}</a></li>
                      <li><a href="Gioi-Thieu/Ve-Truong-Phu/">{Intro}</a></li>
                      <li class="active">{HR}</li>
                    </ol>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-pull-6 col-md-pull-6 col-sm-pull-6">
                    <h2 class="imp-f">{HR}</h2>
                </div> 
            </div>
        </div>
    </section><!-- end header-section -->
</div>

<section class="detail-project">
	<div class="container">
    	<div class="row">
        	<div class="col-md-9">
            	<div class="blog">
                	<h2 class="imp-f title"><?=$row_hr['name_'.$lang]?></h2>

                    <div class="blog-tags">

                        <ul class="list-inline blog-info">

                            <li><i class="fa fa-calendar"></i> <? if($lang=="vn") echo date("d/m/Y",strtotime($row_hr['date'])); else echo date("m/d/Y",strtotime($row_hr['date']));?></li>

                            <li><i class="fa fa-heart"></i> <?=$row_hr['hits']?></li> 

                        </ul>
						
                        <div class="addthis_native_toolbox"></div>
                    </div><!-- end blog-tags -->

                    <div class="blog-content">
						<?=$row_hr['content_'.$lang]?>    
                    </div><!--end blog content -->

                </div><!-- end blog -->

            </div><!-- end col-md-9 -->

            <div class="col-md-3 side-menu">

            	<ul class="nav-in-page">

                    <h2 class="imp-f">{Article}</h2>

                    <? 

						while($row_it_l=mysql_fetch_assoc($it_l)){

							$a="";

							if($idIT==$row_it_l['idIT'])

								$a="active";

                    ?>

                        <li>

                            <a href="Gioi-Thieu/<?=$row_it_l['url']?>/" class="imp-f <?=$a?>"><?=$row_it_l['name_'.$lang]?></a>

                        </li>

                     <? }?>
                     	<li><a href="Gioi-Thieu/Thiet-Ke-San-Xuat-Lap-Dung/" class="imp-f">{Design}</a>
                            <ul> 
                            	<? while($row_dt_l=mysql_fetch_assoc($dt_l)){
									$a="";
									if($idDT==$row_dt_l['idDT'])
										$a="active";	
								?>
                                <li><a class="<?=$a?>" href="Gioi-Thieu/Thiet-Ke-San-Xuat-Lap-Dung/<?=$row_dt_l['url']?>/"><?=$row_dt_l['name_'.$lang]?></a></li>    
                                <? }?>
                            </ul>
                        </li>
						
                        <li><a href="Gioi-Thieu/Nhan-Su/Chinh-Sach/" class="imp-f">{HR}</a>
                            <ul> 
                            	<? while($row_hr_l=mysql_fetch_assoc($hr_l)){
									$a="";
									if($idHR==$row_hr_l['idHR'])
										$a="active";	
								?>
                                <li><a class="<?=$a?>" href="Gioi-Thieu/Nhan-Su/<?=$row_hr_l['url']?>/"><?=$row_hr_l['name_'.$lang]?></a></li>    
                                <? }?>
                            </ul>
                        </li>
                        
                     	<li><a href="Gioi-Thieu/Gia-Tri/" class="imp-f <? if($p=="values") echo "active";?>">{Values}</a>

                            <ul>
    
                                <li><a class="<? if($p=="operation_policy") echo "active";?>" href="Gioi-Thieu/Gia-Tri/Chinh-Sach-Hoat-Dong/">{Operation_Policy}</a></li>
    
                                <li><a class="<? if($p=="safety_policy") echo "active";?>" href="Gioi-Thieu/Gia-Tri/Chinh-Sach-An-Toan-Lao-Dong/">{Safety_Policy}</a></li>
    
                                <li><a class="<? if($p=="quality_policy") echo "active";?>" href="Gioi-Thieu/Gia-Tri/Chinh-Sach-Chat-Luong/">{Quality_Policy}</a></li>
    
                            </ul>

                        </li>

                     	<li>

                        	<a href="Gioi-Thieu/Hinh-Anh/" class="imp-f <? if($p=="images_list" || $p=="images") echo "active";?>">{Image}</a>

                            <ul>

                            <?

                            	$img=$i->listImagesType();

								while($row_img=mysql_fetch_assoc($img)){

							?>

                        		<li><a class="<? if($idImgType==$row_img['idImgType']) echo "active";?>" href="Gioi-Thieu/Hinh-Anh/<?=$row_img['url']?>/"><?=$row_img['name_'.$lang]?></a></li>

                            <? }?>

                            </ul>

                        </li>

                </ul><!-- end nav-in-page -->

            </div><!-- end col-md-3 -->

        </div><!-- end row -->

    </div><!-- end container -->

</section><!-- end detail-project-->