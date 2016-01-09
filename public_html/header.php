<header>
    <section class="top imp-f">
        <div class="container">
            <ul class="top-bar pull-right">
                <? if($lang=="vn"){ ?>
                    <li onclick="chuyenngonngu('en')" class="lang"><span class="glyphicon glyphicon-globe"></span> {English}</li>
                <? }else{?>
                    <li onclick="chuyenngonngu('vn')" class="lang"><span class="glyphicon glyphicon-globe"></span> {Vietnamese}</li>
                <? } ?>
                <li class="devider"></li>
                <li>{Hotline}: <span class="imp-f hotline"><?=$row_info['hotline']?></span></li>
            </ul> <!-- top bar -->
            
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="search">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-7 hidden-xs">
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                <form method="get" action="http://www.google.com/search" class="pull-right form-inline">
                    <input type="text" name="q" value="" placeholder="{Search_Keyword}" /> 
                    <input type="submit" class="btn-search hidden-xs" value="{Search}" /> 
                    <input type="hidden" name="sitesearch" value="truongphusteel.vn" />
                </form>
                </div>
            </div>
        </div>
    </section>
    <section class="nav-top">
        <div class="container">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav-top-body">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="pull-left">{Cat}</span>
                            <i class="fa fa-angle-down pull-right"></i>
                        </button>
                        <a href="index.php" class="navbar-brand"><img id="logo" src="img/logo.png" class="img-responsive" alt="Logo Truong Phu Steel"></a>
                    </div> <!-- navbar-header -->
                    <div id="nav-top-body" class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li <? if($p=="") echo "class='active'";?>><a href="index.php">{Home}</a></li>
                            <li class="dropdown <? if($p=="introduce") echo "active";?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{Intro} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                <? 
                                $it=$i->listIntroduction();
                                while($row_it=mysql_fetch_assoc($it)) {?>
                                    <li><a href="Gioi-Thieu/<?=$row_it['url']?>/"><?=$row_it['name_'.$lang]?></a></li> 
                                <? }?>
                                    <li><a href="Gioi-Thieu/Thiet-Ke-San-Xuat-Lap-Dung/">{Design}</a></li>
                                    <li><a href="Gioi-Thieu/Nhan-Su/Chinh-Sach/">{HR}</a></li>
                                    <li><a href="Gioi-Thieu/Gia-Tri/">{Values}</a></li>
                                    <li><a href="Gioi-Thieu/Hinh-Anh/">{Image}</a></li>
                                </ul>             
                            </li>
                            <li class="dropdown <? if($p=="capacity") echo "active";?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{Capacity} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="Nang-Luc/Ho-So-Nang-Luc/">{Capacity_Profile}</a></li>
                                    <li><a href="Nang-Luc/Catalogue/">Catalogue</a></li>
                                    <li><a href="Nang-Luc/Uu-Diem/">{Advantage}</a></li>
                                    <li><a href="Nang-Luc/Linh-Vuc-Hoat-Dong/">{Scope_Work}</a></li>
                                </ul>
                            </li>
                            <li class="dropdown <? if($p=="project") echo "active";?>">
                                <a href="Du-An/Du-An-Da-Thuc-Hien/" class="dropdown-toggle disabled" data-toggle="dropdown">{Project} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="Du-An/Du-An-Da-Thuc-Hien/">{Completed_Project}</a></li>
                                    <li><a href="Du-An/Du-An-Dang-Thuc-Hien/">{Ongoing_Project}</a></li>
                                </ul>
                            </li>
                            <li class="dropdown <? if($p=="news") echo "active";?>">
                                <a href="Tin-Tuc/" class="dropdown-toggle disabled" data-toggle="dropdown">{News} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                <?
                                    $nt_i=$i->listNewsTypeF();
                                    while($row_nt_i=mysql_fetch_assoc($nt_i)){
                                ?>
                                    <li><a href="Tin-Tuc/Cat/<?=$row_nt_i['url']?>/"><?=$row_nt_i['name_'.$lang]?></a></li>
                                <? }?>
                                </ul>
                            </li>
                            <li class="dropdown <? if($p=="achievement") echo "active";?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{Achievement} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="Chung-Nhan-Giai-Thuong/">{Certification_Award}</a></li>
                                    <li><a href="Khach-Hang-Danh-Gia/">{Client_Review}</a></li>
                                </ul>
                            </li>
                            <li <? if($p=="contact") echo "class='active'";?>><a href="Lien-He/">{Contact}</a></li>
                        </ul>
                    </div> <!-- nav top body -->
                </nav> <!-- nav bar -->
        </div> <!-- container -->
    </section> <!-- nav top -->
</header>