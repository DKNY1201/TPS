<?
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

                      <li class="active">{Quality_Policy}</li>

                    </ol>

                </div>

                <div class="col-xs-12 col-sm-6 col-lg-pull-6 col-md-pull-6 col-sm-pull-6">

                    <h2 class="imp-f">{Intro}</h2>

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

                	<h2 class="imp-f title">{Quality_Policy}</h2>

                    <div class="blog-tags">

                        <ul class="list-inline blog-info">

                            <li><i class="fa fa-calendar"></i> <? if($lang=="vn") echo date("d/m/Y",strtotime("02/06/2014")); else echo date("m/d/Y",strtotime("02/06/2014"));?></li>

                            <li><i class="fa fa-heart"></i> 25</li> 

                        </ul>
						<div class="addthis_native_toolbox"></div>
                    </div><!-- end blog-tags -->

                    <div class="blog-content">

                    	<div class="row">

                        	<div class="values-item">

                                <div class="col-xs-12">

                                    <div class="text-center thumbnail"><img src="img/upload/images/Gioi-Thieu/chinh-sach-chat-luong.jpg" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" /></div>

                                    <ul>

                                    	<li>Xây dựng, duy trì và phát triển đội ngũ cán bộ làm việc chuyên nghiệp, chủ động, sáng tạo, giỏi nghiệp vụ chuyên môn, có phẩm chất đạo đức nghề nghiệp trong sáng, đủ năng lực để tiếp thu và áp dụng một cách sáng tạo các công nghệ tiên tiến, không ngừng phấn đấu vì mục tiêu chất lượng công trình.</li>

                                        <li>Đảm bảo cung cấp đầy đủ nguồn lực cần thiết để xây dựng, áp dụng, duy trì và cải tiến liên tục Hệ thống Quản lý chất lượng ISO 9001:2008 một cách hiệu quả và có hiệu lực trong Tổng Công ty.</li>

                                        <li>Thường xuyên phổ biến và giáo dục ý thức đảm bảo chất lượng cho từng cán bộ công nhân viên.</li>

                                        <li>Chỉ cung cấp cho Khách hàng những sản phẩm  có chất lượng phù hợp với những yêu cầu đã đặt ra, đảm bảo tính hiệu quả, tính bền vững, yếu tố cảnh quan và thân thiện với môi trường.</li>

                                        <li>Không ngừng nâng cao chất lượng sản phẩm mãn yêu cầu ngày càng cao của Khách hàng.</li>

                                    </ul>

                                    <p>

                                    	Chúng tôi hiểu giá trị của sự tin cậy và thông hiểu vì vậy chúng tôi đang nỗ lực để thực hiện các cam kết chất lượng với mục tiêu kiến tạo nên những công trình bền vững.

                                    </p>

                                </div>

                            </div>

                        </div><!--end row -->

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