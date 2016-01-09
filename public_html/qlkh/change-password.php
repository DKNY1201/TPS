<?
	require_once("check-login.php");
	$error=array();
	$idUser=$_SESSION['id'];
	if(isset($_POST['changepass']))
	{
		$success=$i->change_pass($idUser,$error);
		if($success)
		{
			header("location:index.php?p=change-pass-success");
		}
	}
?>
<div id="change-password">
    <div class="module-title">
        <img src="images/change-password-icon.png" alt="staff add">
        <h1>Đổi mật khẩu <span class="small">(* Password phải có nhiều hơn 6 kí tự)</span></h1>
    </div>
    <div class="clear"></div>
		<div id="customer-add-inner">
			<form id="customer-add-f" method="POST" action="" name="staff-add-f">
            	<p><span class="left-text">Password cũ</span><input type="password" name="old-pass" id="old-pass" value=""><span class="error"><?=$error['oldpass']?></span></p>
                <p><span class="left-text">Password mới</span><input type="password" name="new-pass" id="new-pass" value=""><span class="error"><?=$error['newpass']?></span></p>
                <p><span class="left-text">Gỏ lại password mới</span><input type="password" name="new-pass-1" id="new-pass-1" value=""><span class="error"><?=$error['newpass1']?></span></p>
                <div class="clear"></div>
                <input type="submit" value="Đổi password" name="changepass">
        	</form>
        </div>
</div>