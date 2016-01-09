<!doctype html>
<html>
<head>
	<base href="http://<?=$_SERVER['SERVER_NAME'];?>/" />
    <meta http-equiv="content-language" content="vi, en" />
    <meta name="description" content="TRƯỜNG PHÚ là đơn vị chuyên nghiệp: Thiết kế, thi công xây dựng, sản xuất lắp đặt các loại nhà khung thép tiền chế khẩu độ từ 10-180mm với thiết kế, tư vấn, hổ trợ kỹ thuật miển phí.... " />
    <meta name="keywords" content="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" />
    <meta name="robots" content="noodp,index,follow" />
    <meta name='revisit-after' content='1 days' />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
	<title>Truong Phu Steel - 404 Error</title>
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

<section class="error-404">
	<div class="container">
		<div class="row">
        	<div class="col-xs-12">
            	<div class="text-center">
                    <h2 class="imp-f">
                        Trang bạn yêu cầu không tìm thấy!!!
                    </h2>
                    <img class="error-404-img" src="img/404.png" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps">
                    <h2 class="imp-f">Vui lòng nhấn vào <a href="index.php">đây</a> để trở về Trang Chủ</h2>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>