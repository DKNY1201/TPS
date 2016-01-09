<?

    $pageSize = 9;

    $pageNum = 1;

    if (isset($_GET['pageNum'])==true) $pageNum = $_GET['pageNum'];

    settype($pageNum,"int");

    if($pageNum<=0) $pageNum=1;

    $totalRows=0;



	if(isset($_GET['url']))

	{

		$url=$_GET['url'];

		$nt=$i->detailNewsTypeF($url);

		$row_nt=mysql_fetch_assoc($nt);

	}

    $idNT=$i->getIDNewsType($url);

	$n=$i->listNewsByNT($idNT,$pageNum,$pageSize,$totalRows);

	$nt_l=$i->listNewsType();

?>

<section class="header-section">

	<div class="container">

        <div class="row">

        	<div class="bread col-xs-12 col-sm-6 col-lg-push-6 col-md-push-6 col-sm-push-6">

                <ol class="breadcrumb pull-right">

                  <li><a href="index.php">{Home}</a></li>

                  <li <? if(!isset($_GET['url'])) echo "class='active'";?>><? if(isset($_GET['url'])){ ?><a href="Tin-Tuc/" >{News}</a><? } else echo "{News}";?></li>

                  <? if(isset($row_nt)){?><li class="active"><?=$row_nt['name_'.$lang]?></li><? }?>

                </ol>

            </div>

        	<div class="col-xs-12 col-sm-6 col-lg-pull-6 col-md-pull-6 col-sm-pull-6 hidden-xs">

            	<h2 class="imp-f"><? if(isset($row_nt)) echo $row_nt['name_'.$lang]; else echo "{News}";?></h2>

            </div> 

        </div>

    </div>

</section><!-- end header-section -->



<section class="project-showcase">

	<div class="container">

        <div class="row">

            <div class="col-md-9 col-sm-9">

            <? 

				$counter=1;

				while($row_n=mysql_fetch_assoc($n)){

					if($counter%3==0) echo "<div class='row'>";

			?>

                <div class="col-lg-4 col-md-4 col-sm-6 box">

                	<div class="n-box">

                        <div class="lastest-project-element">

                            <div class="figure">

                                <img class="img-responsive" src="<?=$row_n['img']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" title="<?=$row_n['title_'.$lang]?>">

                                <div class="date-over"><?=$row_n['news_type_'.$lang]?></div>

                                <div class="figure-bg"></div>

                                <div class="figure-btn"><a href="Tin-Tuc/Detail/<?=$row_n['url']?>/" class="btn btn-see-more"><i class="fa fa-link"></i> {See_More}</a></div>	

                            </div><!-- end figure-->

                                <h2 class="title-news"><a href="Tin-Tuc/Detail/<?=$row_n['url']?>/"><?=$row_n['title_'.$lang]?></a></h2>

                                <p><?=$i->rutgonchuoi($row_n['sum_'.$lang],20);?></p>

                                <div class="n-footer">

                                    <div class="pull-left">

                                        <small>{Post_Date}: <?=date("d/m/Y",strtotime($row_n['date']))?></small>

                                    </div>

                                    <a href="Tin-Tuc/Detail/<?=$row_n['url']?>/" class="pull-right btn btn-see-more">{See_More}</a>

                                </div>

                        </div><!-- end lastest-project-element -->

                    </div><!-- end n-box -->

                </div> <!-- col-md-4 -->

            <? 

			if($counter%3==0) echo "</div>";

			$counter++;

			

			}?>

            <div class="clearfix"></div>

            <div class="text-center">

                <ul class="pagination">

                    <?php 

                        $tags="";

                        if (isset($url)) {

                            $tags="/Cat/$url";

                        }

                        echo $i->pagesList("Tin-Tuc".$tags,$totalRows,$pageNum,$pageSize,5); 

                    ?>

                </ul>

            </div>

            </div><!-- end col-md-9 -->

            <div class="col-md-3 col-sm-3">

            	<ul class="nav-in-page">

                <? while($row_nt_l=mysql_fetch_assoc($nt_l)){
					$a="";
					if($row_nt_l['idNT']==$row_nt['idNT'])
						$a="active";
				?>

                	<li>

                    	<a href="Tin-Tuc/Cat/<?=$row_nt_l['url']?>/" class="imp-f <?=$a?>"><?=$row_nt_l['name_'.$lang]?></a>

                    </li>

                 <? }?>

                </ul>

            </div><!-- end col-md-3 -->

        </div><!-- end row -->

    </div>

</section><!-- end project-showcase -->