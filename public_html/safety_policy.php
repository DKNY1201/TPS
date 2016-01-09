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

                      <li class="active">{Safety_Policy}</li>

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

                	<h2 class="imp-f title">{Safety_Policy}</h2>

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

                                    <div class="text-center thumbnail"><img src="img/upload/images/Gioi-Thieu/an-toan-lao-dong.jpg" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" /></div>

                                    <ul>

                                    	<li>An toàn tại nơi làm việc là ưu tiên hàng đầu của chúng tôi. Trách nhiệm của chúng tôi là luôn quan tâm đến việc tạo ra một môi trường làm việc an toàn, không gây hại đến sức khỏe và tính mạng của tất cả nhân viên cũng như tất cả các khách hàng của chúng tôi.</li>

                                        <li>Tại TRƯỜNG PHÚ, việc quản lý an toàn, sức khỏe và môi trường là yếu tố bắt buộc ngang bằng với xây dựng sản xuất và lợi ích công ty; trong bất kỳ tình huống bất cập nào, an toàn luôn được ưu tiên hàng đầu.</li>

                                        <li>Tất cả các sự cố, tai nạn và thương tật đều có thể phòng tránh được bằng các biện pháp điều tra, kiểm tra, thanh tra, huấn luyện, cam kết, chuẩn bị và phối hợp một cách hiệu quả của tất cả các bên có liên quan.</li>

                                        <li>Luôn tìm cách cải thiện việc thực hiện công tác đảm bảo an toàn, sức khỏe và môi trường bao gồm việc xem xét lại các hoạt động đã thực hiện và đặt mục tiêu cho các công việc sắp tới.</li>

                                        <li>Yêu cầu trong quy định an toàn của công ty là mỗi nhân viên phải nhận thức được trách nhiệm cá nhân và nghĩa vụ của họ, phải luôn tuân theo các nội quy và thường xuyên tham dự các khóa huấn luyện định kỳ để đảm bảo một môi trường làm việc an toàn được xây dựng và duy trì trên mỗi công trường.</li>

                                        <li>Bất kỳ khi nào và nơi đâu, khuyến khích những người tham gia thực hiện công việc tích cực đóng góp ý kiến xây dựng nhằm phát huy quan điểm chung và hoàn thiện hệ thống, thông báo về các nguy cơ, các dấu hiệu cảnh báo sớm, hệ thống đảm bảo sức khỏe nghề nghiệp và hỗ trợ lẫn nhau để mang lại lợi ích chung cho mọi người.</li>

                                        <li>Tất cả nhân viên phải thực hiện mọi công việc thích hợp và cần thiết nhằm thỏa mãn yêu cầu của chính sách này. Lưu ý: Không có công việc nào quá khẩn cấp và quan trọng để không thể thực hiện một cách an toàn.</li>

                                    </ul>

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