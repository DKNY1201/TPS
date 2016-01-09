<?
	if(isset($_GET['url']))
		$url=$_GET['url'];
	$idDe=$i->getidDesignFromUrl($url);
	$i->increaseDesignHits($idDe);
	
	$de=$i->detailDesign($idDe);
	$row_de=mysql_fetch_assoc($de);
	$idDT=$row_de['idDT'];
	$dt=$i->detailDesignType($idDT);
	$row_dt=mysql_fetch_assoc($dt);
	
	$de_d=$i->detailDesign($idDe);
	$row_de_d=mysql_fetch_assoc($de_d);
	
	$od=$i->relateDesign($idDT,$idDe);
	
	$it_l=$i->listIntroduction();
	$hr_l=$i->listHR();
	$dt_l=$i->listDesignType();
	$img=$i->listImagesType();
?>

<section class="header-section">

    <div class="container">

        <div class="row">

            <div class="bread col-xs-12 col-sm-6 col-lg-push-6 col-md-push-6 col-sm-push-6">

                <ol class="breadcrumb pull-right">

                  <li><a href="index.php">{Home}</a></li>
                  <li><a href="Gioi-Thieu/Ve-Truong-Phu/">{Intro}</a></li>
                  <li><a href="Gioi-Thieu/Thiet-Ke-San-Xuat-Lap-Dung/">{Design}</a></li>
                  <li><a href="Gioi-Thieu/Thiet-Ke-San-Xuat-Lap-Dung/<?=$row_dt['url']?>/"><?=$row_dt['name_'.$lang]?></a></li>
                  <li class="active"><?=$row_de_d['name_'.$lang]?></li>

                </ol>

            </div>

            <div class="col-xs-12 col-sm-6 col-lg-pull-6 col-md-pull-6 col-sm-pull-6 hidden-xs">

                <h2 class="imp-f"><?=$row_dt['name_'.$lang]?></h2>

            </div> 

        </div>

    </div>

</section><!-- end header-section -->

<section class="detail-project">
	<div class="container">
    	<div class="row">
        	<div class="col-md-9">
            	<div class="blog">
                	<h2 class="imp-f title"><?=$row_de_d['name_'.$lang]?></h2>

                    <div class="blog-tags">

                        <ul class="list-inline blog-info">

                            <li><i class="fa fa-calendar"></i> <? if($lang=="vn") echo date("d/m/Y",strtotime($row_de_d['date'])); else echo date("m/d/Y",strtotime($row_de_d['date']));?></li>

                            <li><i class="fa fa-heart"></i> <?=$row_de_d['hits']?></li> 

                        </ul>

                    </div><!-- end blog-tags -->

                    <div class="blog-content">
						<?=$row_de_d['content_'.$lang]?>    
                    </div><!--end blog content -->

                </div><!-- end blog -->
                
                <div class="col-sx-12">

                    <h2 class="headline imp-f headline-orther relate-news">{Relate_Article}</h2>

                </div>

                <ul class="more-post">

                    <? while($row_od=mysql_fetch_assoc($od)){?>

                    	<li><i class="fa fa-caret-right"></i> <a href="Gioi-Thieu/Thiet-Ke-San-Xuat-Lap-Dung/Detail/<?=$row_od['url']?>/"><?=$row_od['name_'.$lang]?></a></li>

                    <? }?>

                </ul>

            </div><!-- end col-md-9 -->

            <div class="col-md-3 col-sm-3 side-menu">

            	<ul class="nav-in-page">

                    <h2 class="imp-f">{Article}</h2>

                    <? 

						while($row_it_l=mysql_fetch_assoc($it_l)){

							$a="";

							if($url==$row_it_l['url'])

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

                        	<a href="Gioi-Thieu/Hinh-Anh/" class="imp-f <? if($p=="images_list") echo "active";?>">{Image}</a>

                            <ul>

                            <?

                            	mysql_data_seek($img,0);

								while($row_img=mysql_fetch_assoc($img)){

							?>

                        		<li><a href="Gioi-Thieu/Hinh-Anh/<?=$row_img['url']?>/"><?=$row_img['name_'.$lang]?></a></li>

                            <? }?>

                            </ul>

                        </li>

                </ul><!-- end nav-in-page -->

            </div><!-- end col-md-3 -->

        </div><!-- end row -->

    </div><!-- end container -->

</section><!-- end detail-project-->