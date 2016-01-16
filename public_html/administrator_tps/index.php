<?
	ob_start();
	require_once "checklogin.php";
	require_once "classBack.php";
	$i=new back;
	if(isset($_GET['p'])==true)
		$p=$_GET['p'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>TPS Admin Panel</title>
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
        <!-- jQuery UI theme-->
            <link rel="stylesheet" href="lib/jquery-ui/css/Aristo/Aristo.css" />
        <!-- gebo blue theme-->
            <link rel="stylesheet" href="css/blue.css" id="link_theme" />
        <!-- datepicker -->
            <link rel="stylesheet" href="lib/datepicker/datepicker.css" />
		<!-- colorbox -->
            <link rel="stylesheet" href="lib/colorbox/colorbox.css" />
		<!-- video player -->
			<link rel="stylesheet" href="http://vjs.zencdn.net/c/video-js.css" />
		<!-- calendar -->
            <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.2.custom.css">
        <!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/custome.css" />
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
        <!-- Favicon -->
            <link rel="shortcut icon" href="favicon.ico" />
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
			<script src="lib/flot/excanvas.min.js"></script>
        <![endif]-->
            <script src="js/jquery.min.js"></script>
			<!-- smart resize event -->
			<script src="js/jquery.debouncedresize.min.js"></script>
			<!-- hidden elements width/height -->
			<script src="js/jquery.actual.min.js"></script>
			<!-- js cookie plugin -->
			<script src="js/jquery.cookie.min.js"></script>
			<!-- main bootstrap js -->
			<script src="bootstrap/js/bootstrap.min.js"></script>
            <!-- bootstrap plugins -->
			<script src="js/bootstrap.plugins.min.js"></script>
			<!-- tooltips -->
			<script src="lib/qtip2/jquery.qtip.min.js"></script>
			<!-- scrollbar -->
			<script src="lib/antiscroll/antiscroll.js"></script>
			<script src="lib/antiscroll/jquery-mousewheel.js"></script>
			<!-- common functions -->
			<script src="js/gebo_common.js"></script>
            <!-- datatable -->
            <script src="lib/datatables/jquery.dataTables.min.js"></script>
            <script src="lib/datatables/extras/Scroller/media/js/Scroller.min.js"></script>
            <!-- datatable functions -->
            <script src="js/gebo_datatables.js"></script>
			<script src="lib/jquery-ui/jquery-ui-1.8.20.custom.min.js"></script>
    </head>
    <body>
		<div class="style_switcher">
			<div class="sepH_c">
				<p>Colors:</p>
				<div class="clearfix">
					<a href="javascript:void(0)" class="style_item jQclr blue_theme style_active" title="blue">blue</a>
					<a href="javascript:void(0)" class="style_item jQclr dark_theme" title="dark">dark</a>
					<a href="javascript:void(0)" class="style_item jQclr green_theme" title="green">green</a>
					<a href="javascript:void(0)" class="style_item jQclr brown_theme" title="brown">brown</a>
					<a href="javascript:void(0)" class="style_item jQclr eastern_blue_theme" title="eastern_blue">eastern blue</a>
					<a href="javascript:void(0)" class="style_item jQclr tamarillo_theme" title="tamarillo">tamarillo</a>
				</div>
			</div>
			<div class="sepH_c">
				<p>Backgrounds:</p>
				<div class="clearfix">
					<span class="style_item jQptrn style_active ptrn_def" title=""></span>
					<span class="ssw_ptrn_a style_item jQptrn" title="ptrn_a"></span>
					<span class="ssw_ptrn_b style_item jQptrn" title="ptrn_b"></span>
					<span class="ssw_ptrn_c style_item jQptrn" title="ptrn_c"></span>
					<span class="ssw_ptrn_d style_item jQptrn" title="ptrn_d"></span>
					<span class="ssw_ptrn_e style_item jQptrn" title="ptrn_e"></span>
				</div>
			</div>
			<div class="sepH_c">
				<p>Layout:</p>
				<div class="clearfix">
					<label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fluid" value="" checked /> Fluid</label>
					<label class="radio inline"><input type="radio" name="ssw_layout" id="ssw_layout_fixed" value="gebo-fixed" /> Fixed</label>
				</div>
			</div>
			<div class="sepH_c">
				<p>Sidebar position:</p>
				<div class="clearfix">
					<label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_left" value="" checked /> Left</label>
					<label class="radio inline"><input type="radio" name="ssw_sidebar" id="ssw_sidebar_right" value="sidebar_right" /> Right</label>
				</div>
			</div>
			<div class="sepH_c">
				<p>Show top menu on:</p>
				<div class="clearfix">
					<label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_click" value="" checked /> Click</label>
					<label class="radio inline"><input type="radio" name="ssw_menu" id="ssw_menu_hover" value="menu_hover" /> Hover</label>
				</div>
			</div>
			<div class="gh_button-group">
				<a href="#" id="showCss" class="btn btn-primary btn-mini">Show CSS</a>
				<a href="#" id="resetDefault" class="btn btn-mini">Reset</a>
			</div>
			<div class="hide">
				<ul id="ssw_styles">
					<li class="small ssw_mbColor sepH_a" style="display:none">body {<span class="ssw_mColor sepH_a" style="display:none"> color: #<span></span>;</span> <span class="ssw_bColor" style="display:none">background-color: #<span></span> </span>}</li>
					<li class="small ssw_lColor sepH_a" style="display:none">a { color: #<span></span> }</li>
				</ul>
			</div>
		</div>
		<div id="maincontainer" class="clearfix">
			<!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="index.php"><i class="icon-home icon-white"></i> TPS Admin</a>
                            <ul class="nav user_menu pull-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$_SESSION['hoten']?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
										<li><a href="logout.php">Log Out</a></li>
                                    </ul>
                                </li>
                            </ul>
							<a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
								<span class="icon-align-justify icon-white"></span>
							</a>
                            <nav>
                                <div class="nav-collapse">
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                	<div class="row-fluid">
                        <div class="span12">
                <? 
					if($p=="project_type_list") 
						require_once "project_type_list.php";
					elseif($p=="project_type_add") 
						require_once "project_type_add.php";
					elseif($p=="project_type_edit") 
						require_once "project_type_edit.php";
					elseif($p=="project_list")
						require_once "project_list.php";
					elseif($p=="project_add") 
						require_once "project_add.php";
					elseif($p=="project_edit") 
						require_once "project_edit.php";
					elseif($p=="project_img_list") 
						require_once "project_img_list.php";
					elseif($p=="project_img_add") 
						require_once "project_img_add.php";
					elseif($p=="project_img_add_num") 
						require_once "project_img_add_num.php";
					elseif($p=="news_type_list") 
						require_once "news_type_list.php";
					elseif($p=="news_type_add") 
						require_once "news_type_add.php";
					elseif($p=="news_type_edit") 
						require_once "news_type_edit.php";
					elseif($p=="news_list") 
						require_once "news_list.php";
					elseif($p=="news_add") 
						require_once "news_add.php";
					elseif($p=="news_edit") 
						require_once "news_edit.php";
					elseif($p=="introduction_list")
						require_once "introduction_list.php";
					elseif($p=="introduction_add")
						require_once "introduction_add.php";
					elseif($p=="introduction_edit")
						require_once "introduction_edit.php";
					elseif($p=="hr_list")
						require_once "hr_list.php";
					elseif($p=="hr_add") 
						require_once "hr_add.php";
					elseif($p=="hr_edit")
						require_once "hr_edit.php";
					elseif($p=="product_list")
						require_once "product_list.php";
					elseif($p=="product_add") 
						require_once "product_add.php";
					elseif($p=="product_edit")
						require_once "product_edit.php";
					elseif($p=="design_type_list")
						require_once "design_type_list.php";
					elseif($p=="design_type_add") 
						require_once "design_type_add.php";
					elseif($p=="design_type_edit") 
						require_once "design_type_edit.php";
					elseif($p=="design_list")
						require_once "design_list.php";
					elseif($p=="design_add") 
						require_once "design_add.php";
					elseif($p=="design_edit") 
						require_once "design_edit.php";
					elseif($p=="info") 
						require_once "info.php";
					elseif($p=="certificate_list") 
						require_once "certificate_list.php";
					elseif($p=="certificate_add") 
						require_once "certificate_add.php";
					elseif($p=="certificate_edit") 
						require_once "certificate_edit.php";
					elseif($p=="client_list") 
						require_once "client_review_list.php";
					elseif($p=="client_add")
						require_once "client_review_add.php";
					elseif($p=="client_edit") 
						require_once "client_review_edit.php";
					elseif($p=="images_type_list") 
						require_once "images_type_list.php";
					elseif($p=="images_type_add") 
						require_once "images_type_add.php";
					elseif($p=="images_type_edit") 
						require_once "images_type_edit.php";
					elseif($p=="images_list") 
						require_once "images_list.php";
					elseif($p=="images_add")
						require_once "images_add.php";
					elseif($p=="images_edit")
						require_once "images_edit.php";
					elseif($p=="slider_list") 
						require_once "slider_list.php";
					elseif($p=="slider_add") 
						require_once "slider_add.php";
					elseif($p=="slider_edit") 
						require_once "slider_edit.php";
					else require_once "main.php";
				?>
                		</div>
                	</div>
                </div>
            </div>
			<!-- sidebar -->
            <a href="javascript:void(0)" class="sidebar_switch on_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <div class="sidebar">
				<div class="antiScroll">
					<div class="antiscroll-inner">
						<div class="antiscroll-content">
							<div class="sidebar_inner">
								<form action="index.php?uid=1&amp;page=search_page" class="input-append" method="post" >
									<input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn"><i class="icon-search"></i></button>
								</form>
								<div id="side_accordion" class="accordion">
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse1" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-info-sign"></i> Giới thiệu
											</a>
										</div>
										<div class="accordion-body collapse" id="collapse1">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="index.php?p=introduction_list">Bài viết</a></li>
                                                    <li><a href="index.php?p=hr_list">Nhân sự</a></li>
												</ul>
											</div>
										</div>
									</div>
                                    <div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseDe" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-fullscreen"></i> Thiết kế - Sản xuất - Lắp dựng
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseDe">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="index.php?p=design_type_list">Loại Thiết kế - Sản xuất - Lắp dựng</a></li>
                                                    <li><a href="index.php?p=design_list">Bài viết</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-th"></i> Tin tức
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseTwo">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="index.php?p=news_type_list">Loại tin tức</a></li>
													<li><a href="index.php?p=news_list">Bài viết</a></li>
													<li><a href="index.php?p=project_type_list">Ý kiến khách hàng</a></li>
												</ul>
											</div>
										</div>
									</div>
                                    <div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-folder-close"></i> Dự án
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseOne">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="index.php?p=project_type_list">Loại dự án</a></li>
													<li><a href="index.php?p=project_list">Bài viết</a></li>
                                                    <li><a href="index.php?p=project_img_list">Hình ảnh</a></li>
												</ul>
											</div>
										</div>
									</div>
                                    <div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseSlider" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-align-center"></i> Slider
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseSlider">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="index.php?p=slider_add">Thêm slider</a></li>
													<li><a href="index.php?p=slider_list">Danh sách slider</a></li>
												</ul>
											</div>
										</div>
									</div>
                                    <div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapsePro" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-tasks"></i> Sản phẩm
											</a>
										</div>
										<div class="accordion-body collapse" id="collapsePro">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="index.php?p=product_list">Bài viết</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-star"></i> Thành tích
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseThree">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="index.php?p=certificate_list">Chứng nhận - Giải thưởng</a></li>
													<li><a href="index.php?p=client_list">Khách hàng đánh giá</a></li>
												</ul>
											</div>
										</div>
									</div>
                                    <div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseImages" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-picture"></i> Hình ảnh
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseImages">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="index.php?p=images_type_list">Loại hình ảnh</a></li>
                                                    <li><a href="index.php?p=images_list">Hình ảnh</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseAccount" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-user"></i> Tài khoản
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseAccount">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="#">Thành viên</a></li>
													<li><a href="#">Nhóm thành viên</a></li>
												</ul>
											</div>
										</div>
									</div>
                                    <div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseInfo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-globe"></i> Thông tin chung
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseInfo">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="index.php?p=info">Thông tin chung</a></li>
												</ul>											
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-cog"></i> Cấu hình
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseFour">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li class="nav-header">People</li>
													<li class="active"><a href="javascript:void(0)">Account Settings</a></li>
													<li><a href="javascript:void(0)">IP Adress Blocking</a></li>
													<li class="nav-header">System</li>
													<li><a href="javascript:void(0)">Site information</a></li>
													<li><a href="javascript:void(0)">Actions</a></li>
													<li><a href="javascript:void(0)">Cron</a></li>
													<li class="divider"></li>
													<li><a href="javascript:void(0)">Help</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse7" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
											   <i class="icon-th"></i> Máy tính
											</a>
										</div>
										<div class="accordion-body collapse in" id="collapse7">
											<div class="accordion-inner">
												<form name="Calc" id="calc">
													<div class="formSep control-group input-append">
														<input type="text" style="width:142px" name="Input" /><button type="button" class="btn" name="clear" value="c" onclick="Calc.Input.value = ''"><i class="icon-remove"></i></button>
													</div>
													<div class="control-group">
														<input type="button" class="btn btn-large" name="seven" value="7" onclick="Calc.Input.value += '7'" />
														<input type="button" class="btn btn-large" name="eight" value="8" onclick="Calc.Input.value += '8'" />
														<input type="button" class="btn btn-large" name="nine" value="9" onclick="Calc.Input.value += '9'" />
														<input type="button" class="btn btn-large" name="div" value="/" onclick="Calc.Input.value += ' / '">
													</div>
													<div class="control-group">
														<input type="button" class="btn btn-large" name="four" value="4" onclick="Calc.Input.value += '4'" />
														<input type="button" class="btn btn-large" name="five" value="5" onclick="Calc.Input.value += '5'" />
														<input type="button" class="btn btn-large" name="six" value="6" onclick="Calc.Input.value += '6'" />
														<input type="button" class="btn btn-large" name="times" value="x" onclick="Calc.Input.value += ' * '" />
													</div>
													<div class="control-group">
														<input type="button" class="btn btn-large" name="one" value="1" onclick="Calc.Input.value += '1'" />
														<input type="button" class="btn btn-large" name="two" value="2" onclick="Calc.Input.value += '2'" />
														<input type="button" class="btn btn-large" name="three" value="3" onclick="Calc.Input.value += '3'" />
														<input type="button" class="btn btn-large" name="minus" value="-" onclick="Calc.Input.value += ' - '" />
													</div>
													<div class="formSep control-group">
														<input type="button" class="btn btn-large" name="dot" value="." onclick="Calc.Input.value += '.'" />
														<input type="button" class="btn btn-large" name="zero" value="0" onclick="Calc.Input.value += '0'" />
														<input type="button" class="btn btn-large" name="DoIt" value="=" onclick="Calc.Input.value = Math.round( eval(Calc.Input.value) * 1000)/1000" />
														<input type="button" class="btn btn-large" name="plus" value="+" onclick="Calc.Input.value += ' + '" />
													</div>
												</form>
											</div>
										 </div>
									</div>
								</div>
								<div class="push"></div>
							</div>
							<div class="sidebar_info">
								<ul class="unstyled">
									<li>
										<span class="act act-warning">65</span>
										<strong>New comments</strong>
									</li>
									<li>
										<span class="act act-success">10</span>
										<strong>New articles</strong>
									</li>
									<li>
										<span class="act act-danger">85</span>
										<strong>New registrations</strong>
									</li>
								</ul>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</div>   
	</body>
</html>