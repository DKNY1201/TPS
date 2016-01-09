<section class="header-section">
	<div class="container">
        <div class="row">
        	<div class="bread col-xs-12 col-sm-6 col-lg-push-6 col-md-push-6 col-sm-push-6">
                <ol class="breadcrumb pull-right">
                  <li><a href="index.php">{Home}</a></li>
                  <li class="active">{Capacity_Profile}</li>
                </ol>
            </div>
        	<div class="col-xs-12 col-sm-6 col-lg-pull-6 col-md-pull-6 col-sm-pull-6 hidden-xs">
            	<h2 class="imp-f">{Capacity_Profile}</h2>
            </div> 
        </div>
    </div>
</section><!-- end header-section -->
<div class="profile">
	<div class="container">
		<div class="row">
        	<div class="col-md-9">
                <div class="col-md-4 col-sm-6">
                    <div class="profile-box">
                        <a href="Nang-Luc/Ho-So-Nang-Luc/View/VN/" target="_blank"><img class="img-responsive" src="img/upload/images/Gioi-Thieu/hsnl-cover-vn.jpg" ></a>
                        <a href="Nang-Luc/Ho-So-Nang-Luc/View/VN/" target="_blank"><h1 class="imp-f">{Capacity_Profile} - VN</h1></a>
                    </div><!-- end profile-box -->
                </div><!-- end col-md-4 -->
                <div class="col-md-4 col-sm-6">
                    <div class="profile-box">
                        <a href="Nang-Luc/Ho-So-Nang-Luc/View/ENG/" target="_blank"><img class="img-responsive" src="img/upload/images/Gioi-Thieu/hsnl-cover-eng.jpg" ></a>
                        <a href="Nang-Luc/Ho-So-Nang-Luc/View/ENG/" target="_blank"><h1 class="imp-f">{Capacity_Profile} - ENG</h1></a>
                    </div><!-- end profile-box -->
                </div><!-- end col-md-4 -->
            </div><!-- end col-md-9 -->
            <div class="col-md-3 side-menu">
            	<ul class="nav-in-page">
                    <h2 class="imp-f">{Article}</h2>
                        <li>
                            <a href="Nang-Luc/Ho-So-Nang-Luc/" class="imp-f <? if($p=="capacity_profile") echo "active";?>">{Capacity_Profile}</a>
                             <ul>
                                <li><a target="_blank" href="Nang-Luc/Ho-So-Nang-Luc/View/VN/">{Capacity_Profile} - VN</a></li>
                                <li><a target="_blank" href="Nang-Luc/Ho-So-Nang-Luc/View/ENG/">{Capacity_Profile} - ENG</a></li>
                            </ul>
                        </li>
                        <li><a href="Nang-Luc/Catalogue/" class="imp-f <? if($p=="catalogue") echo "active";?>">Catalogue</a></li>
                     	<li><a href="Nang-Luc/Uu-Diem/" class="imp-f <? if($p=="advantage") echo "active";?>">{Advantage}</a></li>
                        <li><a href="Nang-Luc/Linh-Vuc-Hoat-Dong/" class="imp-f <? if($p=="scope_work") echo "active";?>">{Scope_Work}</a></li>
                </ul><!-- end nav-in-page -->
            </div><!-- end col-md-3 -->
		</div><!-- end row -->
	</div><!-- end container -->
</div><!-- end profile -->