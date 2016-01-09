<?php
session_start();
if (isset($_POST['btn-login'])==true){	
	require_once("db_connect.php");  
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	if (get_magic_quotes_gpc()== false) {
		$email=trim(mysql_real_escape_string($email));
		$password=trim(mysql_real_escape_string($password));
	}

	$sql = "SELECT * FROM users WHERE email='$email' AND password ='$password'";
	$user = mysql_query($sql);

	if (mysql_num_rows($user)==1) {//Thành công	
		if (isset($_POST['remember'])== true){
			 setcookie("em", $_POST['email'], time() + 60*60*24*7 );
			 setcookie("pw", $_POST['password'], time() + 60*60*24*7 );
		} else {
			 setcookie("em", $_POST['email'], time() -1);
			 setcookie("pw", $_POST['password'], time() -1);
		}

		//Tạo ra các biến session để dùng cho các tác vụ khác
		$row_user = mysql_fetch_assoc($user);
		$_SESSION['id'] = $row_user['idUser'];
		$_SESSION['email'] = $row_user['email'];
		$_SESSION['level'] = $row_user['idLevel'];
		$_SESSION['hoten'] = $row_user['name'];

		if (strlen($_SESSION['back'])>0){
			$back = $_SESSION['back']; unset($_SESSION['back']);
			header("location:$back");
		} 
		else header("location: index.php");
	} 
	else { //Thất bại
    	header("location: login.php");
  	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>TPS Admin Panel - Login Page</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
        <!-- theme color-->
            <link rel="stylesheet" href="css/blue.css" />
        <!-- tooltip -->    
			<link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
        <!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />
    
        <!-- Favicons and the like (avoid using transparent .png) -->
            <link rel="shortcut icon" href="favicon.ico" />
            <link rel="apple-touch-icon-precomposed" href="icon.png" />
    
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    
        <!--[if lte IE 8]>
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
        <![endif]-->
		
    <!-- Shared on MafiaShare.net  --><!-- Shared on MafiaShare.net  --></head>
    <body class="login_page">
		
		<div class="login_box">
			
			<form action="" method="post" id="login_form">
				<div class="top_b">Đăng nhập vào khu vực quản trị TPS</div>    
				<div class="alert alert-info alert-login">
					Gỏ địa chỉ Email và Mật khẩu vào khung dưới
				</div>
                <? if(isset($_SESSION['error_admin'])) {?>
                <div class="alert alert-danger alert-login">
					<?
                    	echo $_SESSION['error_admin'];
					?>
				</div>
                <? 
					unset($_SESSION['error_admin']);
				}?>
				<div class="cnt_b">
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span><input type="text" id="username" name="email" placeholder="Email address" />
						</div>
					</div>
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" name="password" placeholder="Password" />
						</div>
					</div>
					<div class="formRow clearfix">
						<label class="checkbox" name="remember"><input type="checkbox" /> Nhớ mật khẩu</label>
					</div>
				</div>
				<div class="btm_b clearfix">
					<button class="btn btn-inverse pull-right" type="submit" name="btn-login">Đăng nhập</button>
					<span class="link_reg"><a href="#reg_form">Chưa đăng kí? Nhấn vào đây</a></span>
				</div>  
			</form>
			
			<form action="" method="post" id="pass_form" style="display:none">
				<div class="top_b">Không thể đăng nhập?</div>    
					<div class="alert alert-info alert-login">
                    Vui lòng điền địa chỉ email của bạn. Bạn sẽ nhận được đường dẩn tạo password mới qua email.
				</div>
				<div class="cnt_b">
					<div class="formRow clearfix">
						<div class="input-prepend">
							<span class="add-on">@</span><input type="text" placeholder="Your email address" />
						</div>
					</div>
				</div>
				<div class="btm_b tac">
					<button class="btn btn-inverse" type="submit" name="btn-renew-pass">Cấp mật khẩu mới</button>
				</div>  
			</form>
			
			<form action="" method="post" id="reg_form" style="display:none">
				<div class="top_b">Đăng kí</div>
				<div class="alert alert-login">
                	Bằng cách điền thông tin vào khung dưới và nhấn vào nút Đăng kí, có nghĩa Bạn đồng ý với <a data-toggle="modal" href="#terms">điều kiện</a> của chúng tôi.
				</div>
				<div id="terms" class="modal hide fade" style="display:none">
					<div class="modal-header">
						<a class="close" data-dismiss="modal">×</a>
						<h3>Terms and Conditions</h3>
					</div>
					<div class="modal-body">
						<p>
							Nulla sollicitudin pulvinar enim, vitae mattis velit venenatis vel. Nullam dapibus est quis lacus tristique consectetur. Morbi posuere vestibulum neque, quis dictum odio facilisis placerat. Sed vel diam ultricies tortor egestas vulputate. Aliquam lobortis felis at ligula elementum volutpat. Ut accumsan sollicitudin neque vitae bibendum. Suspendisse id ullamcorper tellus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum at augue lorem, at sagittis dolor. Curabitur lobortis justo ut urna gravida scelerisque. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam vitae ligula elit.
							Pellentesque tincidunt mollis erat ac iaculis. Morbi odio quam, suscipit at sagittis eget, commodo ut justo. Vestibulum auctor nibh id diam placerat dapibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse vel nunc sed tellus rhoncus consectetur nec quis nunc. Donec ultricies aliquam turpis in rhoncus. Maecenas convallis lorem ut nisl posuere tristique. Suspendisse auctor nibh in velit hendrerit rhoncus. Fusce at libero velit. Integer eleifend sem a orci blandit id condimentum ipsum vehicula. Quisque vehicula erat non diam pellentesque sed volutpat purus congue. Duis feugiat, nisl in scelerisque congue, odio ipsum cursus erat, sit amet blandit risus enim quis ante. Pellentesque sollicitudin consectetur risus, sed rutrum ipsum vulputate id. Sed sed blandit sem. Integer eleifend pretium metus, id mattis lorem tincidunt vitae. Donec aliquam lorem eu odio facilisis eu tempus augue volutpat.
						</p>
					</div>
					<div class="modal-footer">
						<a data-dismiss="modal" class="btn" href="#">Đóng</a>
					</div>
				</div>
				<div class="cnt_b">
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span><input name="email-reg" type="text" placeholder="Email address" />
						</div>
					</div>
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span><input name="pass-reg" type="text" placeholder="Password" />
						</div>
					</div>
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-bold"></i></span><input type="text" name="name" placeholder="Họ tên" />
						</div>
					</div>
                    <div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-home"></i></span><input type="text" name="address" placeholder="Địa chỉ" />
						</div>
					</div>
                    <div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-bell"></i></span><input type="text" name="phone" placeholder="Điện thoại" />
						</div>
					</div>
                    <div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-calendar"></i></span><input type="text" name="birthday" placeholder="Ngày sinh" />
						</div>
					</div>
                    <div class="formRow">
						<div class="input-prepend">
							<span class="add-on">
                            	<i class="icon-eye-close"></i></span>
                                 <input type="radio" name="sex" value="1" checked/> Nam <input type="radio" name="sex" value="0"/> Nữ
						</div>
					</div>					 
				</div>
				<div class="btm_b tac">
					<button class="btn btn-inverse" type="submit">Đăng kí</button>
				</div>  
			</form>
			
		</div>
		
		<div class="links_b links_btm clearfix">
			<span class="linkform"><a href="#pass_form">Quên mật khẩu?</a></span>
			<span class="linkform" style="display:none">Không quan tâm, <a href="#login_form">đưa tôi về màn hình login</a></span>
		</div>  
        
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.actual.min.js"></script>
        <script src="lib/validation/jquery.validate.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                
				//* boxes animation
				form_wrapper = $('.login_box');
                $('.linkform a,.link_reg a').on('click',function(e){
					var target	= $(this).attr('href'),
						target_height = $(target).actual('height');
					$(form_wrapper).css({
						'height'		: form_wrapper.height()
					});	
					$(form_wrapper.find('form:visible')).fadeOut(400,function(){
						form_wrapper.stop().animate({
                            height	: target_height
                        },500,function(){
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
							$(form_wrapper).css({
								'height'		: ''
							});	
                        });
					});
					e.preventDefault();
				});
				
				//* validation
				$('#login_form').validate({
					onkeyup: false,
					errorClass: 'error',
					validClass: 'valid',
					rules: {
						username: { required: true, minlength: 3 },
						password: { required: true, minlength: 3 }
					},
					highlight: function(element) {
						$(element).closest('div').addClass("f_error");
					},
					unhighlight: function(element) {
						$(element).closest('div').removeClass("f_error");
					},
					errorPlacement: function(error, element) {
						$(element).closest('div').append(error);
					}
				});
            });
        </script>
    </body>
</html>