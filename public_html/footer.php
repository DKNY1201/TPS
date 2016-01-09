<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="imp-f com_name">{TPS}</h2>	
            </div>	
            <div class="col-sm-6 col-md-4">
                <h3 class="imp-f headline_footer"><a href="https://www.google.com/maps/place/115+%C4%90%C6%B0%E1%BB%9Dng+S%E1%BB%91+100+B%C3%ACnh+Th%E1%BB%9Bi,+14,+Qu%E1%BA%ADn+11,+H%E1%BB%93+Ch%C3%AD+Minh,+Vietnam/@10.7690354,106.6465884,17z/data=!4m2!3m1!1s0x31752e95e11fcf2d:0xb6e2e4fe1fc3fb49" target="_blank" style="color:#ccc">{Office}</a></h3>
                <ul>
                    <li><span><i class="fa fa-location-arrow"></i> {Address}:</span> <?=$row_info['diachi_vp_'.$lang]?></li>
                    <li><span><i class="fa fa-star"></i> Hotline:</span> <?=$row_info['hotline']?></li>
                    <li><span><i class="fa fa-phone"></i> Tel:</span> <?=$row_info['tel_vp']?></li>
                    <li><span><i class="fa fa-phone-square"></i> Fax:</span> <?=$row_info['fax_vp']?></li>
                    <li><span><i class="fa fa-envelope"></i> Email:</span> <a title="{Send_Email_Us}" href="mailto:<?=$row_info['email']?>"><?=$row_info['email']?></a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-4">
                <h3 class="imp-f headline_footer"><a href="https://www.google.com/maps/place/11%C2%B005'15.4%22N+106%C2%B047'01.7%22E/@11.0876182,106.783816,17z/data=!3m1!4b1!4m2!3m1!1s0x0:0x0" target="_blank" style="color:#ccc">{Factory}</a></h3>
                <ul>
                    <li><span><i class="fa fa-location-arrow"></i> {Address}:</span> <?=$row_info['diachi_nm_'.$lang]?></li>
                    <li><span><i class="fa fa-phone"></i> Tel:</span> <?=$row_info['tel_nm']?></li>
                    <li><span><i class="fa fa-phone-square"></i> Fax:</span> <?=$row_info['fax_nm']?></li>
                </ul>

            </div>
            <div class="col-sm-12 col-md-4">
                <h3 class="imp-f headline_footer">{DN}</h3>
                <ul>
                    <li><span><i class="fa fa-location-arrow"></i> {Address}:</span> <?=$row_info['diachi_dn_'.$lang]?></li>
                    <li><span><i class="fa fa-phone"></i> Tel:</span> <?=$row_info['tel_dn']?></li>
                    <li><span><i class="fa fa-phone-square"></i> Fax:</span> <?=$row_info['fax_dn']?></li>
                    <li><span><i class="fa fa-envelope"></i> Email:</span> <a title="{Send_Email_Us}" href="mailto:<?=$row_info['email_dn']?>"><?=$row_info['email_dn']?></a></li>
                </ul>
                <hr></hr>
                <div class="connect">
                    <h3 class="imp-f headline_footer">{Contact_Us}</h3>
                    <a href="<?=$row_info['link_fb']?>" target="_blank" class="social-icon"><i class="fa fa-facebook"></i></a>
                    <a href="<?=$row_info['link_gg']?>" target="_blank" class="social-icon"><i class="fa fa-google-plus"></i></a>
                    <a href="<?=$row_info['link_sky']?>" target="_blank" class="social-icon"><i class="fa fa-skype"></i></a>
                    <a href="<?=$row_info['link_yt']?>" target="_blank" class="social-icon"><i class="fa fa-youtube"></i></a>
                    <a href="<?=$row_info['link_tw']?>" target="_blank" class="social-icon"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
        </div><!-- end row -->
        <hr></hr>
        <div class="row">
            <div class="col-sm-6">
                2014 &copy; Truong Phu Steel. All rights reserverd.
            </div>
            <div class="col-sm-6">
                <ul class="nav-bottom pull-right">
                    <li><a href="index.php">{Home}</a></li>
                    <li><a href="Du-An/Du-An-Da-Thuc-Hien/">{Project}</a></li>
                    <li><a href="Tin-Tuc/">{News}</a></li>
                    <li><a href="/qlkh" target="_blank">{Customer_Manage}</a></li>
                    <li><a href="#">Site map</a></li>
                </ul>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</footer>