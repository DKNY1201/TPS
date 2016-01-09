<style>

  #map_canvas {

    width: 100%;

    height: 300px;

	margin-bottom:30px;

  }

</style>

<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>

  function initialize() {

    var map_canvas = document.getElementById('map_canvas');

    var map_options = {

      center: new google.maps.LatLng(10.769, 106.647117),

      zoom: 14,

      mapTypeId: google.maps.MapTypeId.ROADMAP

    }

    var map = new google.maps.Map(map_canvas, map_options);

	var marker = new google.maps.Marker({

	  position: new google.maps.LatLng(10.769, 106.647117), 

	  map: map,

	  title: 'Công ty cổ phần xây dựng & kết cấu thép Trường Phú',

	  icon: 'img/icon/location-icon.png'  

	});

  }

  google.maps.event.addDomListener(window, 'load', initialize);

</script>
<link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css"/>
<script type="text/javascript" src="js/jquery.validationEngine-vi.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script>
	jQuery('#quotation-form').validationEngine();
</script>
<div id="map_canvas"></div>

<section id="contact">

	<div class="container">

    	<div class="col-sm-6">

        	<h3 class="headline imp-f">{Contact_Us}</h3>

          <p>{Contact1}</p>

          <form id="quotation-form" role="form" method="POST" action="mail/mail.php">

            <div class="form-group">

              <label>{Full_Name} (*)</label>

              <input type="text" class="form-control" placeholder="{Your_Name}" name="name">

            </div>

            <div class="row">

              <div class="col-sm-6">

              	<div class="form-group">

	                <label>Email (*)</label>

    	            <input type="text" class="form-control" placeholder="Email" name="email">

                </div>

              </div>

              <div class="col-sm-6">

              	<div class="form-group">

	                <label>{Phone} (*)</label>

    	            <input type="text" class="form-control" placeholder="{Phone}" name="mobile">

                </div>

              </div>

            </div><!--end row-->

    		<div class="form-group">

            	<label>{Message} (*)</label>

                <textarea placeholder="{Type_Message}..." class="form-control" style="height:100px" name="message" ></textarea>

            </div>

            <button type="submit" class="btn btn-primary">{Send_Message}</button>

          </form>

        </div><!--end col-sm-6-->

        <div class="col-sm-6">

        	<div class="row">

                <div class="col-sm-6">

                    <h3 class="headline">{Office}</h3>

                    <ul>

                      <li><span><i class="fa fa-location-arrow"></i> {Address}:</span> <?=$row_info['diachi_vp_'.$lang]?></li>
						<li><span><i class="fa fa-phone"></i> Tel:</span> <?=$row_info['tel_vp']?></li>
						<li><span><i class="fa fa-phone-square"></i> Fax:</span> <?=$row_info['fax_vp']?></li>
						<li><span><i class="fa fa-envelope"></i> Email:</span> <a title="{Send_Email_Us}" href="mailto:<?=$row_info['email']?>"><?=$row_info['email']?></a></li>

                  </ul>

                </div><!--end col-sm-6-->

                <div class="col-sm-6">

                    <h3 class="headline">{Factory}</h3>

                    <ul>
						<li><span><i class="fa fa-location-arrow"></i> {Address}:</span> <?=$row_info['diachi_nm_'.$lang]?></li>
						<li><span><i class="fa fa-phone"></i> Tel:</span> <?=$row_info['tel_nm']?></li>
						<li><span><i class="fa fa-phone-square"></i> Fax:</span> <?=$row_info['fax_nm']?></li>
                  	</ul>
					
                    <h3 class="headline" style="margin-top:20px">{DN}</h3>
					<ul>
						<li><span><i class="fa fa-location-arrow"></i> {Address}:</span> <?=$row_info['diachi_dn_'.$lang]?></li>
						<li><span><i class="fa fa-phone"></i> Tel:</span> <?=$row_info['tel_dn']?></li>
						<li><span><i class="fa fa-phone-square"></i> Fax:</span> <?=$row_info['fax_dn']?></li>
                        <li><span><i class="fa fa-envelope"></i> Email:</span> <a title="{Send_Email_Us}" href="mailto:<?=$row_info['email_dn']?>"><?=$row_info['email_dn']?></a></li>
					</ul>
                </div><!--end col-sm-6-->

            </div><!--end row-->

            <h3 class="headline">{Connect_Us}</h3>

            <div class="list-icon">

                <a href="<?=$row_info['link_fb']?>" target="_blank" class="social-icon fb"><i class="fa fa-facebook"></i></a>

                <a href="<?=$row_info['link_gg']?>" target="_blank" class="social-icon gg"><i class="fa fa-google-plus"></i></a>

                <a href="<?=$row_info['link_sky']?>" target="_blank" class="social-icon sp"><i class="fa fa-skype"></i></a>

                <a href="<?=$row_info['link_yt']?>" target="_blank" class="social-icon yt"><i class="fa fa-youtube"></i></a>

                <a href="<?=$row_info['link_tw']?>" target="_blank" class="social-icon tw"><i class="fa fa-twitter"></i></a>
            </div>

        </div><!--end col-sm-6--> 

    </div><!--end container-->

</section>