<?

	if(isset($_GET['url']))

		$url=$_GET['url'];

    $idNews=$i->getIDNews($url);

	$i->increaseNewsHits($idNews);

	$n=$i->detailNews($idNews);

	$row_n=mysql_fetch_assoc($n);

	$nt=$i->detailNewsType($row_n['idNT']);

	$row_nt=mysql_fetch_assoc($nt);

	$u=$i->detailUser($row_n['idUser']);

	$row_u=mysql_fetch_assoc($u);

	$nt_l=$i->listNewsType();

	$rcn=$i->recentNews();

	$on=$i->listOrtherNews($idNews);

?>

<section class="header-section">

	<div class="container">

        <div class="row">

        	<div class="bread col-xs-12 col-sm-6 col-lg-push-6 col-md-push-6 col-sm-push-6">

                <ol class="breadcrumb pull-right">

                  <li><a href="index.php">{Home}</a></li>

                  <li><a href="index.php?p=news">{News}</a></li>

                  <li><a href="index.php?p=news&amp;idNT=<?=$row_nt['idNT']?>"><?=$row_nt['name_'.$lang]?></a></li>

				  <li class="active"><?=$i->rutgonchuoi($row_n['name_'.$lang],4);?></li>

                </ol>

            </div>

        	<div class="col-xs-12 col-sm-6 col-lg-pull-6 col-md-pull-6 col-sm-pull-6 hidden-xs">

            	<h2 class="imp-f"><?=$row_nt['name_'.$lang]?></h2>

            </div> 

        </div>

    </div>

</section><!-- end header-section -->

<section class="detail-project">

	<div class="container">

    	<div class="row">

        	<div class="col-md-9">

            	<div class="blog">

                	<h2 class="imp-f title"><?=$row_n['name_'.$lang]?></h2>

                    <div class="blog-tags">

                        <ul class="list-inline blog-info">

                            <li><i class="fa fa-calendar"></i> <? if($lang=="vn") echo date("d/m/Y",strtotime($row_n['date'])); else echo date("m/d/Y",strtotime($row_n['date']));?></li>

                            <li><i class="fa fa-heart"></i> <?=$row_n['hits']?></li> 

                        </ul>

						<div class="addthis_native_toolbox"></div>

                    </div><!-- end blog-tags -->

                    <div class="blog-content">

                    	<h5 class="blog-sumary"><?=$row_n['sum_'.$lang]?></h5>
						<? if($row_nt['idNT']!=10){?>
                    	<img class="img-responsive" src="<?=$row_n['img']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" title="<?=$row_n['name_'.$lang]?>">
						<? }?>
                        <p><?=$row_n['content_'.$lang]?></p>

                    </div>

                </div><!-- end blog -->

                <div class="col-sx-12">

                    <h2 class="headline imp-f headline-orther relate-news">{Relate_News}</h2>

                </div>

                <ul class="more-post">

                    <? while($row_on=mysql_fetch_assoc($on)){?>

                    	<li><i class="fa fa-caret-right"></i> <a href="Tin-Tuc/Detail/<?=$row_on['url']?>/"><?=$row_on['name_'.$lang]?></a></li>

                    <? }?>

                </ul>

            </div><!-- end col-md-9 -->

            <div class="col-md-3 side-menu">

            	<ul class="nav-in-page">

                    <h2 class="imp-f">{News_Type}</h2>

                    <? while($row_nt_l=mysql_fetch_assoc($nt_l)){
						$a="";
						if($row_nt_l['idNT']==$row_nt['idNT'])
							$a="active";
                    ?>

                        <li>

                            <a href="Tin-Tuc/Cat/<?=$row_nt_l['url']?>/" class="imp-f <?=$a?>"><?=$row_nt_l['name_'.$lang]?></a>

                        </li>

                     <? }?>

                </ul><!-- end nav-in-page -->

                <div class="recent-post">

                	<h2 class="imp-f">{New_News}</h2>

                    <? while($row_rcn=mysql_fetch_assoc($rcn)){?>

                    	<dl class="clearfix">

                        	<dt>

                        		<a href="Tin-Tuc/Detail/<?=$row_rcn['url']?>/"><img src="<?=$row_rcn['img']?>" alt="nha thep tien che, xay dung nha xuong, ket cau thep, pre engineered steel buildings, steel building, tps" title="<?=$row_rcn['name_'.$lang]?>"></a>

                            </dt>

                            <dd>

                            	<a href="Tin-Tuc/Detail/<?=$row_rcn['url']?>/"><?=$row_rcn['name_'.$lang]?></a>

                            </dd>

                        </dl>

                    <? }?>

                </div><!-- end recent-post -->

            </div><!-- end col-md-3 -->

        </div><!-- end row -->

    </div><!-- end container -->

</section><!-- end detail-project-->