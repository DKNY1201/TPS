<?
	$pr=$i->listProductF();
?>

<section class="header-section">

    <div class="container">

        <div class="row">

            <div class="bread col-xs-12 col-sm-6 col-lg-push-6 col-md-push-6 col-sm-push-6">

                <ol class="breadcrumb pull-right">

                  <li><a href="index.php">{Home}</a></li>
                  <li class="active">{Product}</li>

                </ol>

            </div>

            <div class="col-xs-12 col-sm-6 col-lg-pull-6 col-md-pull-6 col-sm-pull-6 hidden-xs">

                <h2 class="imp-f">{Product}</h2>

            </div> 

        </div>

    </div>

</section><!-- end header-section -->

<div class="images">

	<div class="container">

    	<div class="row">

        	<div class="col-md-12 col-sm-12">

            	<? while($row_pr=mysql_fetch_assoc($pr)){ ?>

            	<div class="col-lg-3 col-md-3">

                	<div class="images-item">

                    	<a href="San-Pham/<?=$row_pr['url']?>/"><img class="img-responsive" src="<?=$row_pr['img']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" title="<?=$row_pr['name_'.$lang]?>" ></a>

                        <h2 class="imp-f img-title"><?=$row_pr['name_'.$lang]?></h2>

                    </div>

                </div>

                <? }?>

            </div>

        </div>

    </div>

</div>