<?

	if(isset($_GET['url']))

		$url=$_GET['url'];

	$pr=$i->detailProjectF($url);

	$row_pr=mysql_fetch_assoc($pr);

    $idPro=$row_pr['idPro'];

	$img=$i->listProjectImg($idPro);

	$tag=$i->listProjectTag();

	

	$idPT=$row_pr['idPT'];

	$idTag=$row_pr['idTag'];

	

	$pt=$i->detailProjectType($idPT);

	$row_pt=mysql_fetch_assoc($pt);

	

	//$opr=$i->listOrtherProject($idPro);

    $opr=$i->listSameCatProject($idPro,$idPT,$idTag);

    $rcp=$i->recentProject();

?>
<script>

	jQuery( document ).ready(function( $ ){

			$('#carousel').flexslider({

				animation: "slide",

				controlNav: false,

				animationLoop: false,

				slideshow: false,

				itemWidth: 150,

				itemMargin: 4,

				asNavFor: '#slider'

			  });

		

			  $('#slider').flexslider({

				animation: "fade",

				controlNav: false,

				animationLoop: false,

				slideshow: false,

				sync: "#carousel"

			  });

	});

</script>

<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<section class="header-section">

	<div class="container">

        <div class="row">

        	<div class="bread col-xs-12 col-sm-6 col-lg-push-6 col-md-push-6 col-sm-push-6">

                <ol class="breadcrumb pull-right">

                  <li><a href="index.php">{Home}</a></li>

                  <li><a href="Du-An/<?=$row_pt['url']?>/"><?=$row_pt['name_'.$lang]?></a></li>

                  <li class="active"><?=$row_pr['name_'.$lang]?></li>

                </ol>

            </div>

        	<div class="col-xs-12 col-sm-6 col-lg-pull-6 col-md-pull-6 col-sm-pull-6 hidden-xs">

            	<h2 class="imp-f title"><?=$row_pr['name_'.$lang]?></h2>

            </div> 

        </div>

    </div>

</section><!-- end header-section -->

<section class="detail-project">

	<div class="container">

    	<div class="row">
        	<div class="col-md-9 col-sm-9 border-bot">
                <div class="col-md-1 hidden-sm hidden-xs">
                </div>
                <div class="col-md-10 col-sm-12">
                    <section class="slider">
                        <div id="slider" class="flexslider">
                          <ul class="slides">
                            <? while($row_img=mysql_fetch_assoc($img)){?>
                            <li>
                                <img class="img-responsive" src="<?=$row_img['url_large']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" />
                            </li>
                            <? }?>
                          </ul>
                        </div>
                        <?
							mysql_data_seek($img,0);
							if(mysql_num_rows($img)>1){
						?>
                        <div id="carousel" class="flexslider">
                          <ul class="slides">
                            <? 
                                while($row_img=mysql_fetch_assoc($img)){
                            ?>
                            <li>
                                <img src="<?=$row_img['url_small']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" />
                            </li>
                            <? }?>
                          </ul>
                        </div>
                        <? }?>
                   </section> <!-- end slider -->
               </div>
               <div class="col-md-1 hidden-sm hidden-xs">
            	</div>
                <div class="clearfix"></div>
                <h2 class="headline-detail">{Detail_Project}</h2>

                <div class="table-responsive">

                    <table class="table table-striped">

                        <tbody>

                            <tr>

                                <td><strong>{Name_Project}</strong></td>

                                <td><?=$row_pr['name_'.$lang]?></td>

                            </tr>

                            <tr>

                                <td><strong>{National}</strong></td>

                                <td><?=$row_pr['national_'.$lang]?></td>

                            </tr>

                            <tr>

                                <td><strong>{Location}</strong></td>

                                <td><?=$row_pr['location_'.$lang]?></td>

                            </tr>

                            <tr>

                                <td><strong>{Investor}</strong></td>

                                <td><?=$row_pr['investor_'.$lang]?></td>

                            </tr>

                            <tr>

                                <td><strong>{Scale}</strong></td>

                                <td><?=number_format($row_pr['scale'],0,'.',',')?> m<sup>2</sup></td>

                            </tr>
                            <tr>

                                <td><strong>{Finish_Year}</strong></td>

                                <td><?=date("Y",strtotime($row_pr['year']))?></td>

                            </tr>

                        </tbody>

                    </table>

                </div><!-- end table-responsive -->

            </div><!-- end col-md-9 -->

        	<div class="col-md-3 col-sm-3 side-menu">

            	<ul class="nav-in-page">

                    <h2 class="imp-f">{Project}</h2>

                	<li><a href="Du-An/Du-An-Dang-Thuc-Hien/" class="imp-f <? if($idPT==2) echo "active";?>">{Ongoing_Project}</a></li>

                    <li>

                    	<a href="Du-An/Du-An-Da-Thuc-Hien/" class="imp-f <? if($idPT==1) echo "active";?>">{Completed_Project}</a>

                        <ul>

                        	<? while($row_tag=mysql_fetch_assoc($tag)){

								$a="";

								if($idTag==$row_tag['idTag'])

									$a="active";

							?>

                        	<li><a href="Du-An/Du-An-Da-Thuc-Hien/Tags/<?=$row_tag['url']?>/" class="<?=$a?>"><?=$row_tag['name_'.$lang]?></a></li>

                            <? }?>

                        </ul>

                    </li>

                </ul>

                <div class="recent-post">

                    <h2 class="imp-f">{New_Project}</h2>

                    <? while($row_rcp=mysql_fetch_assoc($rcp)){?>

                        <dl class="clearfix">

                            <dt>

                                <a href="Du-An/Detail/<?=$row_rcp['url']?>/"><img src="<?=$row_rcp['img']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" title="<?=$row_rcn['name_'.$lang]?>"></a>

                            </dt>

                            <dd>

                                <a href="Du-An/Detail/<?=$row_rcp['url']?>/"><?=$row_rcp['name_'.$lang]?></a>

                            </dd>

                        </dl>

                    <? }?>

                </div>

            </div><!-- end col-md-3 -->        	

        </div><!-- end row -->

        <div class="row">

        	<div class="orther-project">

                <div class="col-sx-12">

                    <h2 class="headline imp-f headline-orther">{Same_Cat_Project}</h2>

                </div>

                <? while($row_opr=mysql_fetch_assoc($opr)){?>

                <div class="col-md-3 col-sm-6 box">

                	<div class="resize">

                        <div class="lastest-project-element">

                            <div class="figure">

                                <img class="img-responsive" src="<?=$row_opr['img']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" title="<?=$row_opr['name_'.$lang]?>">

                                <div class="date-over"><?=date("d/m/Y",strtotime($row_opr['year']))?></div>

                                <div class="figure-bg"></div>

                                <div class="figure-btn"><a href="Du-An/Detail/<?=$row_opr['url']?>/" class="btn btn-see-more"><i class="fa fa-link"></i> {See_More}</a></div>	

                            </div><!-- end figure-->

                                <h2 class="more-project-title"><a href="Du-An/Detail/<?=$row_opr['url']?>/"><?=$row_opr['name_'.$lang]?></a></h2>

                                <h6><i class="fa fa-globe"></i> <?=$row_opr['national_'.$lang]?></a></h6>

                                <h6><i class="fa fa-crosshairs"></i> {Scale}: <?=number_format($row_opr['scale'],0,'.',',')?> m<sup>2</sup></h6>

                            </div>

                        </div>

                    </div>

                <? }?>

            </div><!-- end orther-project -->

        </div><!-- end row -->

    </div><!-- end container -->

</section><!-- end detail-project -->
<script defer src="js/jquery.flexslider-min.js"></script>