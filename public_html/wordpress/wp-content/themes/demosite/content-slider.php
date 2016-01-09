<div class="slider-container">
    <div class="slider" id="revolutionSlider">
        <ul>
        	<?php
            	$page = get_page_by_path('home-slider');
				$page_id = ($page) ? $page->ID : null;
				if($items = get_field('items',$page_id)):
					foreach($items as $item):
						$slider_bg = $item['slider_background'];
						$slider_bg_url = $slider_bg['url'];
						$slider_bg_alt = $slider_bg['alt'];
						$slider_bg_title = $slider_bg['title'];
						$header_top = $item['header_top'];
						$header_main = $item['header_main'];
						$header_bottom = $item['header_bottom'];
						$slogan1 = $item['slogan1'];
						$slogan2 = $item['slogan2'];
						$slogan3 = $item['slogan3'];
			?>
            <li data-transition="fade" data-slotamount="10" data-masterspeed="300">
                <img src="<?php echo $slider_bg_url; ?>" data-fullwidthcentering="on" alt="<?php echo $slider_bg_alt; ?>" title="<?php echo $slider_bg_title; ?>">

                    <div class="caption sft stb visible-desktop"
                         data-x="42"
                         data-y="180"
                         data-speed="300"
                         data-start="1000"
                         data-easing="easeOutExpo"><img src="<?php echo get_template_directory_uri(); ?>/img/slides/slide-title-border.png" alt=""></div>

                    <div class="caption top-label lfl stl"
                         data-x="92"
                         data-y="180"
                         data-speed="300"
                         data-start="500"
                         data-easing="easeOutExpo"><?php echo $header_top; ?></div>

                    <div class="caption sft stb visible-desktop"
                         data-x="342"
                         data-y="180"
                         data-speed="300"
                         data-start="1000"
                         data-easing="easeOutExpo"><img src="<?php echo get_template_directory_uri(); ?>/img/slides/slide-title-border.png" alt=""></div>

                    <div class="caption main-label sft stb"
                         data-x="0"
                         data-y="230"
                         data-speed="300"
                         data-start="1500"
                         data-easing="easeOutExpo"><?php echo $header_main; ?></div>

                    <div class="caption bottom-label sft stb"
                         data-x="50"
                         data-y="280"
                         data-speed="500"
                         data-start="2000"
                         data-easing="easeOutExpo"><?php echo $header_bottom; ?></div>

                    <div class="caption randomrotate"
                         data-x="800"
                         data-y="250"
                         data-speed="500"
                         data-start="2500"
                         data-easing="easeOutBack"><img src="<?php echo get_template_directory_uri(); ?>/img/slides/slide-concept-2-1.png" alt=""></div>

                    <div class="caption sfb"
                         data-x="850"
                         data-y="200"
                         data-speed="400"
                         data-start="3000"
                         data-easing="easeOutBack"><img src="<?php echo get_template_directory_uri(); ?>/img/slides/slide-concept-2-2.png" alt=""></div>

                    <div class="caption sfb"
                         data-x="820"
                         data-y="170"
                         data-speed="700"
                         data-start="3150"
                         data-easing="easeOutBack"><img src="<?php echo get_template_directory_uri(); ?>/img/slides/slide-concept-2-3.png" alt=""></div>

                    <div class="caption sfb"
                         data-x="770"
                         data-y="130"
                         data-speed="1000"
                         data-start="3250"
                         data-easing="easeOutBack"><img src="<?php echo get_template_directory_uri(); ?>/img/slides/slide-concept-2-4.png" alt=""></div>

                    <div class="caption sfb"
                         data-x="500"
                         data-y="80"
                         data-speed="600"
                         data-start="3450"
                         data-easing="easeOutExpo"><img src="<?php echo get_template_directory_uri(); ?>/img/slides/slide-concept-2-5.png" alt=""></div>

                    <div class="caption blackboard-text lfb "
                         data-x="530"
                         data-y="300"
                         data-speed="500"
                         data-start="3450"
                         data-easing="easeOutExpo" style="font-size: 37px;"><?php echo $slogan1; ?></div>

                    <div class="caption blackboard-text lfb "
                         data-x="555"
                         data-y="350"
                         data-speed="500"
                         data-start="3650"
                         data-easing="easeOutExpo" style="font-size: 47px;"><?php echo $slogan2; ?></div>

                    <div class="caption blackboard-text lfb "
                         data-x="580"
                         data-y="400"
                         data-speed="500"
                         data-start="3850"
                         data-easing="easeOutExpo" style="font-size: 32px;"><?php echo $slogan3; ?></div>
            </li>
            <?php
            		endforeach;
				endif;
			?>
        </ul>
    </div>
</div>