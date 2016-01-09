<?

    $pageSize = 9;

    $pageNum = 1;

    if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];

    settype($pageNum,"int");

    if($pageNum<=0) $pageNum=1;

    $totalRows=0;



	if(isset($_GET['url_type'])&&isset($_GET['url_tag'])){

        $url_type=$_GET['url_type'];

        $url_tag=$_GET['url_tag'];

		$idPT=$i->getIDProjectType($url_type);

		$idTag=$i->getIDTag($url_tag);

		$pr=$i->listProjectByPTAndTag($idPT,$idTag,$pageNum,$pageSize,$totalRows);

	}

	if(isset($_GET['url_type'])&&!isset($_GET['url_tag']))

	{

		$url_type=$_GET['url_type'];

        $idPT=$i->getIDProjectType($url_type);

		$pr=$i->listProjectByPT($idPT,$pageNum,$pageSize,$totalRows);

	}



	$pt=$i->detailProjectTypeF($url_type);

	$row_pt=mysql_fetch_assoc($pt);

	

	$tag=$i->listProjectTag();

?>

<section class="header-section">

	<div class="container">

        <div class="row">

        	<div class="bread col-xs-12 col-sm-6 col-lg-push-6 col-md-push-6 col-sm-push-6">

                <ol class="breadcrumb pull-right">

                  <li><a href="index.php">{Home}</a></li>

                  <li class="active"><?=$row_pt['name_'.$lang]?></li>

                </ol>

            </div>

        	<div class="col-xs-12 col-sm-6 col-lg-pull-6 col-md-pull-6 col-sm-pull-6 hidden-xs">

            	<h2 class="imp-f"><?=$row_pt['name_'.$lang]?></h2>

            </div> 

        </div>

    </div>

</section><!-- end header-section -->

<section class="header-intro">

	<div class="container">

        <div class="row">

        	<div class="col-md-12">

            	<div class="text-center">
                	<h2>{Some_Our_Work}</h2>
                    <p class="some_work">{Some_Our_Work1}</p>
                    <p class="some_work">{Some_Our_Work2}</p>
                </div>

            </div>

        </div>

    </div>

</section><!-- end header-intro -->

<section class="project-showcase">

	<div class="container">

        <div class="row">

            <div class="col-md-9 col-sm-9">

            <? while($row_pr=mysql_fetch_assoc($pr)){?>

                <div class="col-lg-4 col-md-4 col-sm-6 box">

                	<div class="resize">

                        <div class="lastest-project-element">

                            <div class="figure">

                                <img class="img-responsive" src="<?=$row_pr['img']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" title="<?=$row_pr['pro_name_'.$lang]?>">

                                <div class="date-over"><?=date("Y",strtotime($row_pr['year']))?></div>

                                <div class="figure-bg"></div>

                                <div class="figure-btn"><a href="Du-An/Detail/<?=$row_pr['url_pro']?>/" class="btn btn-see-more"><i class="fa fa-link"></i> {See_More}</a></div>	

                            </div><!-- end figure-->

                                <h2 class="title"><a href="Du-An/Detail/<?=$row_pr['url_pro']?>/"><?=$row_pr['pro_name_'.$lang]?></a></h2>

                                <h6><i class="fa fa-globe"></i> <?=$row_pr['national_'.$lang]?></a></h6>

                                <h6><i class="fa fa-crosshairs"></i> {Scale}: <?=number_format($row_pr['scale'],0,'.',',')?> m<sup>2</sup></h6>

                        </div><!-- end lastest-project-element -->

                    </div><!-- end resize -->

                </div> <!-- col-md-4 -->

            <? }?>

            <div class="clearfix"></div>

            <div class="text-center">

                <ul class="pagination">

                    <?php 

                        $tags="";

                        if (isset($url_tag)) {

                            $tags="/Tags/$url_tag";

                        }

                        echo $i->pagesList("Du-An/Du-An-Da-Thuc-Hien".$tags,$totalRows,$pageNum,$pageSize,5); 

                    ?>

                </ul>

            </div>

            </div><!-- end col-md-9 -->

            <div class="col-md-3 col-sm-3">

            	<ul class="nav-in-page">

                	<li>

                    	<a href="Du-An/Du-An-Dang-Thuc-Hien/" class="imp-f <? if($idPT==2) echo "active";?>">{Ongoing_Project}</a>

                    </li>

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

            </div><!-- end col-md-3 -->

        </div><!-- end row -->

    </div>

</section><!-- end project-showcase -->