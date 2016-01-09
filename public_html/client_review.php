<?
	$cr=$i->listClientReview_F();
?>
<link rel="stylesheet" type="text/css" href="css/colorbox.css"/>
<section class="header-section">
	<div class="container">
        <div class="row">
        	<div class="bread col-xs-12 col-sm-6 col-lg-push-6 col-md-push-6 col-sm-push-6">
                <ol class="breadcrumb pull-right">
                  <li><a href="index.php">{Home}</a></li>
                  <li class="active">{Client_Review}</li>
                </ol>
            </div>
        	<div class="col-xs-12 col-sm-6 col-lg-pull-6 col-md-pull-6 col-sm-pull-6 hidden-xs">
            	<h2 class="imp-f">{Client_Review}</h2>
            </div> 
        </div>
    </div>
</section><!-- end header-section -->
<div class="achievement">
	<div class="container">
		<div class="row">
        <? 
			$counter=1;
			while($row_cr=mysql_fetch_assoc($cr)){
				if($counter%4==0) echo "<div class='row'>";
		?>
			<div class="col-md-3 achievement-item">
            	<div class="border-bot">
                    <a class="khdg" href="<?=$row_cr['img']?>"><img class="img-thumbnail img-responsive" src="<?=$row_cr['img']?>" title="<?=$row_cr['name_'.$lang]?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps"></a>
                    <p class="imp-f"><?=$row_cr['name_'.$lang]?></p>
                </div>
			</div>
            
        <? 
		if($counter%4==0) echo "</div>";
		$counter++;
		}?>
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end client review -->