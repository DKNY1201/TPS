<?
	session_start();
	$lang=$_SESSION['language'];
?>
<link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css"/>
<script type="text/javascript" src="js/jquery.validationEngine-vi.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script>
	jQuery('#quotation-form').validationEngine();
</script>
<div id="quotation">

    <form id="quotation-form" role="form" method="POST" action="mail/mail.php">

    	<div class="imp-f caption">

        	<h2><? if($lang=='en') echo 'Quotation'; else echo 'Báo giá';?></h2>

        </div>

        <div class="form-group">

          <label><? if($lang=='en') echo 'Full name'; else echo 'Họ tên';?> (*)</label>

          <input type="text" class="form-control validate[required]" placeholder="<? if($lang=='en') echo 'Your name'; else echo 'Họ tên';?>" name="name">

        </div>

        <div class="row">

          <div class="col-sm-6">

            <div class="form-group">

                <label>Email (*)</label>

                <input type="text" class="form-control validate[required,custom[email]]" placeholder="Email" name="email">

            </div>

          </div>

          <div class="col-sm-6">

            <div class="form-group">

                <label><? if($lang=='en') echo 'Phone'; else echo 'Điện thoại';?> (*)</label>

                <input type="text" class="form-control validate[required,minSize[10],custom[phone]]" placeholder="<? if($lang=='en') echo 'Your phone number'; else echo 'Điện thoại';?>" name="mobile">

            </div>

          </div>

        </div><!--end row-->

        <div class="form-group">

            <label><? if($lang=='en') echo 'Message'; else echo 'Tin nhắn';?> (*)</label>

            <textarea placeholder="<? if($lang=='en') echo 'Type your message...'; else echo 'Gõ tin nhắn...';?>" class="form-control validate[required]" style="height:100px" name="message" ></textarea>

        </div>

        <input type="submit" name="btn-req" class="btn btn-primary" value="<? if($lang=='en') echo 'Send request'; else echo 'Gởi yêu cầu';?>">

    </form>

    <a onclick="closeQuotation()"><span class="fa fa-times"></span></a>

</div>

