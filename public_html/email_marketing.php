<?
	require_once "classFront.php";
	$i=new front;
	if(isset($_GET['email']))
		$email=$_GET['email'];
	if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
?>
<div id="email_false">
	<? if ($lang=="vn") {
		echo "Địa chỉ email không hợp lệ.";
	}
	else{
		echo "Email address is invalid.";
	}
	?>
</div>
<? } 
else{
	$check=$i->checkEmailMarketing($email);
	if($check==1)
	{
		$i->addEmailMarketing($email);
?>
<div id="email_true">
	<? if ($lang=="vn") {
		echo "Cám ơn bạn đã yêu cầu nhận báo giá.";
	}
	else{
		echo "Thank you for your request.";
	}
	?>
</div>
<? } else {?>
<div id="email_false">
	<? if ($lang=="vn") {
	echo "Địa chỉ email này đã yêu cầu báo giá.";
	}
	else{
		echo "This email address already registered quote.";
	}
	?>
</div>
<? }}?>