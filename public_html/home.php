<?
	session_start();
	require_once "classFront.php";
	$i=new front;
	$info=$i->detailInfo();
	$row_info=mysql_fetch_assoc($info);
	if(isset($_GET['p']))
		$p=$_GET['p'];
?>
<!doctype html>
<html><head>
	<base href="http://<?=$_SERVER['SERVER_NAME'];?>/" />
    <meta http-equiv="content-language" content="vi, en" />
    <meta name="keywords" content="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<?
		if(isset($_GET['url'])){
			$url=$_GET['url'];
		//echo $url;	
	    $idNews=$i->getIDNews($url);
    	$meta=$i->GetMetaFB($idNews);
		$row_meta=mysql_fetch_assoc($meta);
	?>
    <meta property="og:type" content="article">
    <meta content="https://www.facebook.com/truongphusteel2002" property="article:publisher">
    <meta property="og:title" content="<?=$row_meta['name_vn']?>" />
    <meta property="og:description" content="<?=$row_meta['sum_vn']?>" />
    <meta property="og:image" content="<?="http://".$_SERVER['HTTP_HOST'].$row_meta['img']?>" />
    <meta property="og:url" content="<?="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']?>" />
    <? }else{?>
    <meta name="description" property="og:description" content="TRƯỜNG PHÚ là đơn vị chuyên nghiệp: Thiết kế, thi công xây dựng, sản xuất lắp đặt các loại nhà khung thép tiền chế khẩu độ từ 10-180mm với thiết kế, tư vấn, hổ trợ kỹ thuật miển phí.... " />
    <meta property="og:type" content="website">
    <meta content="http://truongphusteel.vn" property="og:url">
    <meta content="http://truongphusteel.vn/img/logo_tps_medium.png" property="og:image">
    <meta content="Truong Phu Steel" property="og:title">
    <meta name="p:domain_verify" content="a08776fa2da67c428b62a0bac239df21"/>
    <? }?>
	<title>{Site_Title}</title>
	<link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<script src="js/jQuery.js"></script>
	<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js"></script>
    <script>
    $.noConflict();
		jQuery( document ).ready(function( $ ) {
			//show lang list
			$( ".top-bar li:first-child" ).bind({
				hover: function() {
					$(this).children("ul").stop().fadeIn(300);
				},
				mouseleave: function() {
					$(this).children("ul").stop().fadeOut(300);
				}
			});
		
			$('ul.nav li.dropdown').hover(function() {
			  $(this).find('.dropdown-menu').stop(true, true).show();
			}, function() {
			  $(this).find('.dropdown-menu').stop(true, true).fadeOut(200);
			});
			
			//Cho hinh anh trong content responsive
			$('.blog-content img').addClass('img-responsive');

			//TO TOP
			$("#to-top").hide();
			$(function (){
				$(window).scroll(function(){
					if($(this).scrollTop()>100)
					{
						$('#to-top').fadeIn(300);
					}
					else
					{
						$('#to-top').fadeOut(300);
					}
				});
				
				$("#to-top").click(function(e) {
					$("body,html").animate({ scrollTop:0},800);
					return false;
				});
			}); // END TO TOP

	        $(".khdg").colorbox({rel:'khdg'});
			
			//Dang ki nhan ban tin
			$("#newletter-btn-sub").click(function(){
				$("body,html").animate({ scrollTop:0},300);
				$("#cover").show();
				$("#cover").fadeTo(0,0.8);
				$("#quotation-popup").load("quotation.php").fadeIn();		
			});
			
			//Show notification
        	$("#notification").delay(5000).fadeOut(500);
			
	});// end noConflict

	//Chuyen ngon ngu
	function chuyenngonngu(lang){
		jQuery.cookie("lang",lang,{ expires: 7,path:'/'});
		window.location.reload();
	}
	
	//dong form bao gia
	function closeQuotation(){
		jQuery("#cover").hide();
		jQuery("#quotation-popup").fadeOut(500);	
	}
    </script> 
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53aaa2bb72fbc20d"></script>

</head>
<body>
    <div id="cover"></div>
    <div class="container">
    	<div class="row">
        	<div class="col-md-4 hidden-xs"></div>
        	<div class="col-md-4 col-xs-12">
	    		<div id="quotation-popup"></div>
            </div>
            <div class="col-md-4 hidden-xs"></div>
        </div>
    </div>
    <?php require_once "header.php" ?>
	<?php
		if($p=="contact") require_once "contact.php";
		elseif($p=="project") require_once "project.php";
		elseif($p=="project_detail") require_once "project_detail.php";
		elseif($p=="news") require_once "news.php";
		elseif($p=="news_detail") require_once "news_detail.php";
		elseif($p=="introduction_detail") require_once "introduction_detail.php";
		elseif($p=="values") require_once "values.php";
		elseif($p=="operation_policy") require_once "operation_policy.php";
		elseif($p=="safety_policy") require_once "safety_policy.php";
		elseif($p=="quality_policy") require_once "quality_policy.php";
		elseif($p=="khachhangdanhgia") require_once "client_review.php";
		elseif($p=="certificate") require_once "certificate.php";
		elseif($p=="images") require_once "images.php";
		elseif($p=="images_list") require_once "images_list.php";
		elseif($p=="capacity_profile") require_once "capacity_profile.php";
		elseif($p=="catalogue") require_once "catalogue.php";
		elseif($p=="advantage") require_once "advantage.php";
		elseif($p=="scope_work") require_once "scope_work.php";
		elseif($p=="hr_detail") require_once "hr_detail.php";
		elseif($p=="product") require_once "product.php";
		elseif($p=="product_list") require_once "product_list.php";
		elseif($p=="design") require_once "design.php";
		elseif($p=="design_list") require_once "design_list.php";
		elseif($p=="tk_sx_ld") require_once "tk_sx_ld.php";
		else
		{
	?>
    <? 
        if(isset($_SESSION['email-sent-success'])){
    ?>
    <div class="container">
    	<div class="row">
        	<div class="col-xs-12">
            	<div id="notification">
                	<i class="fa fa-star-o"></i>
                    <div class="info">
                    	<h2>{Notice}</h2>
                    	<p><? echo $_SESSION['email-sent-success']; unset($_SESSION['email-sent-success']);?></p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end notification -->
    <? }?>
    <div class="clearfix"></div>
	<section id="main-slider">
		<? require_once "main-slider.php";?>
	</section>
	<div id="main-contain">
		<div class="container">
			<div class="row" id="services">
				<div class="col-lg-3 col-md-6">
					<div class="services">
						<div class="desc">
							<h1><span class="fa fa-file-o"></span> {Capacity_Profile}</h1>
							<p>{Capacity_Profile1}</p>
							<a href="Nang-Luc/Ho-So-Nang-Luc/">{See_More} +</a>
						</div>

					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="services">
						<div class="desc">
							<h1><i class="fa fa-cog fa-spin"></i> {Intro}</h1>
							<p>{Intro1}</p>
							<a href="Gioi-Thieu/Ve-Truong-Phu/">{See_More} +</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="services">
						<div class="desc">
							<h1><i class="fa fa-paper-plane-o"></i> {Product}</h1>
							<p>{Product1}</p>
							<a href="San-Pham/">{See_More} +</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="services">
						<div class="desc">
							<h1 class="small"><i class="fa fa-thumbs-o-up"></i> {Advantage}</h1>
							<p>{Why_Choose_Us1}</p>
							<a href="Nang-Luc/Uu-Diem/">{See_More}+</a>
						</div>
					</div>
				</div>
			</div> <!-- service-->
			<div id="lastest-project" class="main-ele">
				<h2 class="headline imp-f">{Newest_Project}</h2>
				<div id="carousel-lastest-project" class="carousel slide" data-ride="carousel" data-interval="5000">
                    <div class="carousel-inner">
    					<div class="item active">
    						<div class="row">
                            <? 
								$pr_i=$i->listNewProject();
								$k=0;
								while($row_pr_i=mysql_fetch_assoc($pr_i)){
									$idPT_i=$row_pr_i['idPT'];
									$pt_i=$i->detailProjectType($idPT_i);
									$row_pt_i=mysql_fetch_assoc($pt_i);
							?>
                                <div class="col-md-3">
                                	<div class="resize">
                                        <div class="lastest-project-element">
                                            <div class="figure">
                                                <img class="img-responsive" src="<?=$row_pr_i['img']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" title="<?=$row_pr_i['name_'.$lang]?>">
                                                <div class="date-over"><? echo date("Y",strtotime($row_pr_i['year']));?></div>
                                                <div class="figure-bg"></div>
                                                <div class="figure-btn"><a href="Du-An/Detail/<?=$row_pr_i['url']?>/" class="btn btn-see-more"><i class="fa fa-link"></i> {See_More}</a></div>	
                                            </div><!-- end figure-->
                                            <h2 class="title-news"><a href="Du-An/Detail/<?=$row_pr_i['url']?>/"><?=$row_pr_i['name_'.$lang]?></a></h2>
                                            <h6><i class="fa fa-folder"></i> <?=$row_pt_i['name_'.$lang]?></h6>
                                            <h6><i class="fa fa-crosshairs"></i> Quy mô: <?=number_format($row_pr_i['scale'],0,'.',',')?> m<sup>2</sup></h6>
                                        </div><!-- end lastest-project-element -->
                                    </div><!-- end resize -->
                                </div> <!-- col-md-3 -->
                                <? 
									$k++;
									if($k==4)
										break;
								}?>
                            </div> <!-- row -->
    					</div> <!-- item active -->

    					<div class="item">
    						<div class="row">
                            <? 
								while($row_pr_i=mysql_fetch_assoc($pr_i)){
									$idPT_i=$row_pr_i['idPT'];
									$pt_i=$i->detailProjectType($idPT_i);
									$row_pt_i=mysql_fetch_assoc($pt_i);
							?>
                                <div class="col-md-3">
                                	<div class="resize">
                                        <div class="lastest-project-element">
                                            <div class="figure">
                                                <img class="img-responsive" src="<?=$row_pr_i['img']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" title="<?=$row_pr_i['name_'.$lang]?>">
                                                <div class="date-over"><? echo date("Y",strtotime($row_pr_i['year'])); ?></div>
                                                <div class="figure-bg"></div>
                                                <div class="figure-btn"><a href="Du-An/Detail/<?=$row_pr_i['url']?>/" class="btn btn-see-more"><i class="fa fa-link"></i> {See_More}</a></div>	
                                            </div><!-- end figure-->
                                            <h2 class="title-news"><a href="Du-An/Detail/<?=$row_pr_i['url']?>/"><?=$row_pr_i['name_'.$lang]?></a></h2>
                                            <h6><i class="fa fa-folder"></i> <?=$row_pt_i['name_'.$lang]?></h6>
                                            <h6><i class="fa fa-crosshairs"></i> Quy mô: <?=number_format($row_pr_i['scale'],0,'.',',')?> m<sup>2</sup></h6>
                                        </div><!-- end lastest-project-element -->
                                     </div><!-- end resize-->
                                </div> <!-- col-md-3 -->
                                <? ;}?>
                            </div> <!-- row -->
    					</div> <!-- item -->
    				</div> <!-- carousel-inner -->
    				<div class="carousel-nav">
	    				<a class="left" href="#carousel-lastest-project" data-slide="prev">
	    					<i class="fa fa-angle-left"></i>
					  	</a>
					  	<a class="right" href="#carousel-lastest-project" data-slide="next">
					  		<i class="fa fa-angle-right"></i>
					  	</a>
					</div> <!-- carousel-nav -->
			</div> <!-- carousel-lastest-project -->
			</div> <!-- lastest-project -->
            
            <div class="row" id="newletter">
				<div class="newletter">
					<div class="col-md-1 hidden-sm hidden-xs">
						<div class="newletter-icon">
							<span class="glyphicon glyphicon-list-alt"></span>
						</div>
					</div>
					<div class="col-md-8 col-xs-12">
						<div class="info">
							<h4 class="imp-f"><span class="blue">{Request_For}</span> <span class="red">{Quotation}</span></h4>
							<p>{Quotation_1} {Quotation_2} <span class="red">{Site_Title}</span></p>
						</div>
					</div>
					<div class="col-md-3 col-xs-12">
						<div class="subsribe">
						    <div class="input-group">
						        <button class="btn-u" id="newletter-btn-sub">{Request}</button>
						    </div>
						</div>
			      	</div> <!-- form -->
				</div> <!-- .newletter -->
			</div> <!-- #newletter -->
			<div id="lastest-news" class="main-ele">
				<h2 class="headline imp-f">{Newest_News}</h2>
				<div id="carousel-lastest-news" class="carousel slide" data-ride="carousel" data-interval="60000">
                    <div class="carousel-inner">
    					<div class="item active">
    						<div class="row">
                             <? 
								$n_i=$i->listNewNews();
								$k=0;
								while($row_n_i=mysql_fetch_assoc($n_i)){
									$idNT_i=$row_n_i['idNT'];
									$nt_i=$i->detailNewsType($idNT_i);
									$row_nt_i=mysql_fetch_assoc($nt_i);
							?>
                                <div class="col-md-3">
                                	<div class="n-box">
                                        <div class="lastest-project-element">
                                            <div class="figure">
                                                <img class="img-responsive" src="<?=$row_n_i['img']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" title="<?=$row_n_i['name_'.$lang]?>">
                                                <div class="date-over"><?=$row_nt_i['name_'.$lang]?></div>
                                                <div class="figure-bg"></div>
                                                <div class="figure-btn"><a href="Tin-Tuc/Detail/<?=$row_n_i['url']?>/" class="btn btn-see-more"><i class="fa fa-link"></i> {See_More}</a></div>
                                            </div><!-- end figure-->
                                                <h2 class="title-news"><a href="Tin-Tuc/Detail/<?=$row_n_i['url']?>/"><?=$row_n_i['name_'.$lang]?></a></h2>
                                                <p><?=$i->rutgonchuoi($row_n_i['sum_'.$lang],20);?></p>
                                                <div class="n-footer">
                                                    <div class="pull-left">
                                                        <small>{Post_Date}: <? if($lang=="vn") echo date("d/m/Y",strtotime($row_n_i['date'])); else echo date("m/d/Y",strtotime($row_n_i['date']));?></small>
                                                    </div>
                                                    <a href="Tin-Tuc/Detail/<?=$row_n_i['url']?>/?>" class="pull-right btn btn-see-more">{See_More}</a>
                                            </div>
                                        </div><!-- end lastest-project-element -->
                                     </div><!-- end n-box -->
                                </div> <!-- col-md-3 -->
                                <? 
									$k++;
									if($k==4)
										break;
								}?>
                            </div> <!-- row -->
    					</div> <!-- item active -->

    					<div class="item">
    						<div class="row">
                                <? 
								while($row_n_i=mysql_fetch_assoc($n_i)){
									$idNT_i=$row_n_i['idNT'];
									$nt_i=$i->detailNewsType($idNT_i);
									$row_nt_i=mysql_fetch_assoc($nt_i);
							?>
                                <div class="col-md-3">
                                	<div class="n-box">
                                        <div class="lastest-project-element">
                                            <div class="figure">
                                                <img class="img-responsive" src="<?=$row_n_i['img']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" title="<?=$row_n_i['name_'.$lang]?>">
                                                <div class="date-over"><?=$row_nt_i['name_'.$lang]?></div>
                                                <div class="figure-bg"></div>
                                                <div class="figure-btn"><a href="Tin-Tuc/Detail/<?=$row_n_i['url']?>/" class="btn btn-see-more"><i class="fa fa-link"></i> {See_More}</a></div>	
                                            </div><!-- end figure-->
                                                <h2 class="title-news"><a href="Tin-Tuc/Detail/<?=$row_n_i['url']?>/"><?=$row_n_i['name_'.$lang]?></a></h2>
                                                <p><?=$i->rutgonchuoi($row_n_i['sum_'.$lang],20);?></p>
                                                <div class="n-footer">
                                                    <div class="pull-left">
                                                        <small>{Post_Date}: <? if($lang=="vn") echo date("d/m/Y",strtotime($row_n_i['date'])); else echo date("m/d/Y",strtotime($row_n_i['date']));?></small>
                                                    </div>
                                                    <a href="Tin-Tuc/Detail/<?=$row_n_i['url']?>/" class="pull-right btn btn-see-more">{See_More}</a>
                                            </div>
                                        </div><!-- end lastest-project-element -->
                                     </div><!-- end n-box -->
                                </div> <!-- col-md-3 -->
                                <? }?>
                            </div> <!-- row -->
    					</div> <!-- item -->
    				</div> <!-- carousel-inner -->
			</div> <!-- carousel-lastest-news -->
			</div> <!-- lastest-news -->
            <div id="customer" class="main-ele">
				<h2 class="headline imp-f">{Customer}</h2>
				<div class="customer">
					<div class="row">
						<div class="col-md-2 col-sm-4 col-xs-6">
							<div class="customer-item">
								<a href="#">
									<img class="img-responsive" src="img/customer/icd-tan-cang-gray.png" alt="">
									<img class="img-responsive img-color" src="img/customer/icd-tan-cang-color.png" alt="">
								</a>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-6">
							<div class="customer-item">
								<a href="#">
									<img class="img-responsive" src="img/customer/seah-gray.png" alt="">
									<img class="img-responsive img-color" src="img/customer/seah-color.png" alt="">
								</a>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-6">
							<div class="customer-item">
								<a href="#">
									<img class="img-responsive" src="img/customer/tn-steel-gray.png" alt="">
									<img class="img-responsive img-color" src="img/customer/tn-steel-color.png" alt="">
								</a>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-6">
							<div class="customer-item">
								<a href="#">
									<img class="img-responsive" src="img/customer/posco-gray.png" alt="">
									<img class="img-responsive img-color" src="img/customer/posco-color.png" alt="">
								</a>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-6">
							<div class="customer-item">
								<a href="#">
									<img class="img-responsive" src="img/customer/scg-gray.png" alt="">
									<img class="img-responsive img-color" src="img/customer/scg-color.png" alt="">
								</a>
							</div>
						</div>
						<div class="col-md-2 col-sm-4 col-xs-6">
							<div class="customer-item">
								<a href="#">
									<img class="img-responsive" src="img/customer/royal-gray.png" alt="">
									<img class="img-responsive img-color" src="img/customer/royal-color.png" alt="">
								</a>
							</div>
						</div>
					</div><!--end row -->
				</div><!--end .customer -->
			</div><!-- end #customer -->
		</div> <!-- container -->
	</div> <!-- main contain -->
    <?php }?>	
	<?php require_once "footer.php"; ?>
<div id="to-top"><i class="fa fa-chevron-up"></i></div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>