<?php
	$page = get_page_by_path('home-intro');
	$page_id = ($page) ? $page->ID : null;
	$text1 = get_field('text1',$page_id);
	$text2 = get_field('text2',$page_id);
	$text3 = get_field('text3',$page_id);
	$text4 = get_field('text4',$page_id);
	$link4 = get_field('link4',$page_id);
	$text5 = get_field('text5',$page_id);
?>
<div class="home-intro">
    <div class="container">
        <div class="row">
            <div class="span8">
                <p>
                    <?php echo $text1; ?> <em><?php echo $text2; ?></em>
                    <span><?php echo $text3; ?></span>
                </p>
            </div>
            <div class="span4">
                <div class="get-started">
                    <a href="<?php echo $link4; ?>" class="btn btn-large btn-primary"><?php echo $text4; ?></a>
                    <div class="learn-more"><?php echo $text5; ?></div>
                </div>
            </div>
        </div>

    </div>
</div>