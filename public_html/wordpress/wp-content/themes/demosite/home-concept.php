<?php
	$page = get_page_by_path('home-concept');
	$page_id = ($page) ? $page -> ID : null;
	$concept_header = get_field('header',$page_id);
	$concept_intro = get_field('intro',$page_id);
	$concept_text1 = get_field('text1',$page_id);
	$concept_text2 = get_field('text2',$page_id);
	$concept_text3 = get_field('text3',$page_id);
	$concept_text4 = get_field('text4',$page_id);
	$concept_image1 = get_field('image1',$page_id);
	$concept_image2 = get_field('image2',$page_id);
	$concept_image3 = get_field('image3',$page_id);
	$concept_image_project1 = get_field('imageproject1',$page_id);
	$concept_image_project2 = get_field('imageproject2',$page_id);
	$concept_image_project3 = get_field('imageproject3',$page_id);
?>
<div class="container">
    <div class="row center">
        <div class="span12">
            <h2 class="short"><?php echo $concept_header; ?></h2>
            <p class="featured lead">
                <?php echo $concept_intro; ?>
            </p>
        </div>
    </div>

</div>

<div class="home-concept">
    <div class="container">

        <div class="row center">
            <span class="sun"></span>
            <span class="cloud"></span>
            <div class="span2 offset1">
                <div class="process-image" data-appear-animation="bounceIn">
                    <img src="<?php echo $concept_image1['url']; ?>" alt="" />
                    <strong><?php echo $concept_text1; ?></strong>
                </div>
            </div>
            <div class="span2">
                <div class="process-image" data-appear-animation="bounceIn" data-appear-animation-delay="200">
                    <img src="<?php echo $concept_image2['url']; ?>" alt="" />
                    <strong><?php echo $concept_text2; ?></strong>
                </div>
            </div>
            <div class="span2">
                <div class="process-image" data-appear-animation="bounceIn" data-appear-animation-delay="400">
                    <img src="<?php echo $concept_image3['url']; ?>" alt="" />
                    <strong><?php echo $concept_text3; ?></strong>
                </div>
            </div>
            <div class="span4 offset1">
                <div class="project-image">
                    <div id="fcSlideshow" class="fc-slideshow">
                        <ul class="fc-slides">
                            <li><a href="portfolio-single-project.html"><img src="<?php echo $concept_image_project1['url']; ?>" /></a></li>
                            <li><a href="portfolio-single-project.html"><img src="<?php echo $concept_image_project2['url']; ?>" /></a></li>
                            <li><a href="portfolio-single-project.html"><img src="<?php echo $concept_image_project3['url']; ?>" /></a></li>
                        </ul>
                    </div>
                    <strong class="our-work"><?php echo $concept_text4; ?></strong>
                </div>
            </div>
        </div>

        <hr class="tall" />

    </div>
</div>