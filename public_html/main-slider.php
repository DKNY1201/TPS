<?php
	$slider = $i->ListSlider();
?>
    <!-- CSS STYLE -->
    <link rel="stylesheet" type="text/css" href="revolution-slider/css/style.css" media="screen" />		
     <!-- jQuery KenBurn Slider  -->	
	<script type="text/javascript" src="revolution-slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>			
    <script type="text/javascript" src="revolution-slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>			
		<!-- REVOLUTION BANNER CSS SETTINGS -->
	<link rel="stylesheet" type="text/css" href="revolution-slider/rs-plugin/css/settings.css" media="screen" />	
			<div class="fullwidthbanner-container">					
					<div class="fullwidthbanner">
						<ul>	
							<?php while($row_slider = mysql_fetch_assoc($slider)){?>
								<li data-transition="fade" data-slotamount="15" data-thumb="images/thumbs/thumb1.jpg">
									<img src="<?php echo $row_slider['background']; ?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" />								
	                                <div class="caption lft" data-x="0" data-y="10" data-speed="900" data-start="900" data-easing="easeOutExpo"><img src="revolution-slider/images/slides/glare.png" /></div>
	                                <div class="caption lfl" data-x="170" data-y="160" data-speed="900" data-start="1300" data-easing="easeOutBack"><img src="revolution-slider/images/slides/logo.png" /></div>
									<a href="<?php echo $row_slider['link']; ?>">
									<div class="caption lft big_white" data-x="400" data-y="100" data-speed="400" data-start="900" data-easing="easeOutExpo"><?php echo $lang=='vn' ? $row_slider['caption1_vn'] : $row_slider['caption1_en']; ?></div>
									<div class="caption lft big_orange" data-x="400" data-y="137" data-speed="400" data-start="1100" data-easing="easeOutExpo"><?php echo $lang=='vn' ? $row_slider['caption2_vn'] : $row_slider['caption2_en']; ?></div>
									</a>
									<div class="caption lfr medium_grey big_orange" data-x="510" data-y="210" data-speed="300" data-start="1900" data-easing="easeOutExpo">{Project_Info}</div>
	                                <div class="caption sfl" data-x="510" data-y="250" data-speed="300" data-start="2000" data-easing="easeOutExpo"><img src="revolution-slider/images/tiles/check.png" /></div>
	                                <div class="caption lfr small_text" data-x="560" data-y="258" data-speed="300" data-start="2000" data-easing="easeOutExpo"><span style="color: #FFF; padding:5px 10px; background:rgba(0,0,0,.7)">{Investor}: <?php echo $lang=='vn' ? $row_slider['investor_vn'] : $row_slider['investor_en']; ?></span></div>
									<div class="caption sfl" data-x="510" data-y="300" data-speed="300" data-start="2300" data-easing="easeOutExpo"><img src="revolution-slider/images/tiles/check.png" /></div>
	                                <div class="caption lfr small_text" data-x="560" data-y="310" data-speed="300" data-start="2300" data-easing="easeOutExpo"><span style="color: #FFF; padding:5px 10px; background:rgba(0,0,0,.7)">{Scale}: <?php echo $row_slider['scale'] ?> <sup>m2</sup></span></div>
	                                <div class="caption sfl" data-x="510" data-y="350" data-speed="300" data-start="2600" data-easing="easeOutExpo"><img src="revolution-slider/images/tiles/check.png" /></div>
	                                <div class="caption lfr small_text" data-x="560" data-y="360" data-speed="300" data-start="2600" data-easing="easeOutExpo"><span style="color: #FFF; padding:5px 10px; background:rgba(0,0,0,.7)">{Finish_Year}: <?php echo $row_slider['year'] ?></span></div>
								</li>
							<?php } ?>
						</ul>		
						<div class="tp-bannertimer"></div>												
					</div>					
				</div>
			<!--
			##############################
			 - ACTIVATE THE BANNER HERE -
			##############################
			-->
			<script type="text/javascript">
				var tpj=jQuery;
				tpj.noConflict();
				tpj(document).ready(function() {
				if (tpj.fn.cssOriginal!=undefined)
					tpj.fn.css = tpj.fn.cssOriginal;
					tpj('.fullwidthbanner').revolution(
						{	
							delay:7000,												
							startwidth:890,
							startheight:450,
							onHoverStop:"off",						// Stop Banner Timet at Hover on Slide on/off
							thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
							thumbHeight:50,
							thumbAmount:4,
							hideThumbs:200,
							navigationType:"both",					//bullet, thumb, none, both	 (No Shadow in Fullwidth Version !)
							navigationArrows:"verticalcentered",		//nexttobullets, verticalcentered, none
							navigationStyle:"round",				//round,square,navbar
							touchenabled:"on",						// Enable Swipe Function : on/off
							navOffsetHorizontal:0,
							navOffsetVertical:20,
							fullWidth:"on",
							shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)
						});				
			});
			</script>