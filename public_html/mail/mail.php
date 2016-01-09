<?
  session_start();
  include("class.phpmailer.php");

  $mail = new PHPMailer();

 

  $mail -> IsSMTP();

  $mail -> IsHTML(true);

  $mail -> Host     = "ssl://smtp.gmail.com";

  $mail -> Port     = 465;

  $mail -> SMTPAuth = true;

  $mail -> Username = "quytv@truongphusteel.vn";

  $mail -> Password = "tranvanquy2808";

 
  $mail->CharSet = "utf-8";
  
  $mail->IsHTML(true);

  $mail -> Body     = $_POST['message'];

  $mail -> Subject  = "Yêu cầu báo giá".' - '.$_POST['name'].' - '.$_POST['mobile'].' - '.$_POST['email'];
  
  $mail -> From     = '********';
  
  $mail->AddReplyTo($_POST['email'],$_POST['name']);

  $mail -> FromName = "[Khách hàng trên website Trường Phú Steel]";

  $mail -> AddAddress("quytv@truongphusteel.vn");

  if ($mail -> Send())

  {
	if($_SESSION['lang']=='en')
		$_SESSION['email-sent-success']="Thank you for sending message for Truong Phu Steel. We will respond to you as soon as possible.";
	else
		$_SESSION['email-sent-success']="Cảm ơn bạn đã gởi tin nhắn cho Trường Phú Steel. Chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất.";
    header("location:/index.php");

  } 

  else

  {

    echo "Error!<br><br>";

    echo "Error: " . $mail -> ErrorInfo;
	
	header("location:/index.php");

  }

?>