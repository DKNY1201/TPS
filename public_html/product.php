<?
	if(isset($_GET['url']))
		$url=$_GET['url'];
	$idPr=$i->getidProductFromUrl($url);
	$i->increaseProductsHits($idPr);
	$pr_d=$i->detailProduct($idPr);
	$row_pr_d=mysql_fetch_assoc($pr_d);
	$pr_l=$i->listProductF();
?>

<section class="header-section">

    <div class="container">

        <div class="row">

            <div class="bread col-xs-12 col-sm-6 col-lg-push-6 col-md-push-6 col-sm-push-6">

                <ol class="breadcrumb pull-right">

                  <li><a href="index.php">{Home}</a></li>

                  <li><a href="San-Pham/">{Product}</a></li>

                  <li class="active"><?=$row_pr_d['name_'.$lang]?></li>

                </ol>

            </div>

            <div class="col-xs-12 col-sm-6 col-lg-pull-6 col-md-pull-6 col-sm-pull-6 hidden-xs">

                <h2 class="imp-f">{Product}</h2>

            </div> 

        </div>

    </div>

</section><!-- end header-section -->

<section class="detail-project">
	<div class="container">
    	<div class="row">
        	<div class="col-md-9">
            	<div class="blog">
                	<h2 class="imp-f title"><?=$row_pr_d['name_'.$lang]?></h2>

                    <div class="blog-tags">

                        <ul class="list-inline blog-info">

                            <li><i class="fa fa-calendar"></i> <? if($lang=="vn") echo date("d/m/Y",strtotime($row_pr_d['date'])); else echo date("m/d/Y",strtotime($row_pr_d['date']));?></li>

                            <li><i class="fa fa-heart"></i> <?=$row_pr_d['hits']?></li> 

                        </ul>

                    </div><!-- end blog-tags -->

                    <div class="blog-content">
						<?=$row_pr_d['content_'.$lang]?>    
                    </div><!--end blog content -->

                </div><!-- end blog -->

            </div><!-- end col-md-9 -->

            <div class="col-md-3 side-menu">

            	<ul class="nav-in-page">

                    <h2 class="imp-f">{Article}</h2>

                    <? 

						while($row_pr_l=mysql_fetch_assoc($pr_l)){

							$a="";

							if($idPr==$row_pr_l['idPr'])

								$a="active";

                    ?>

                        <li>

                            <a href="San-Pham/<?=$row_pr_l['url']?>/" class="imp-f <?=$a?>"><?=$row_pr_l['name_'.$lang]?></a>

                        </li>

                     <? }?>
                </ul><!-- end nav-in-page -->

            </div><!-- end col-md-3 -->

        </div><!-- end row -->

    </div><!-- end container -->

</section><!-- end detail-project-->