<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JQuery Validation Engine</title>
	<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="css/template.css" type="text/css"/>
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script src="js/jquery.validationEngine-vi.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#formID").validationEngine();
		});
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
	</script>
</head>

<body>
<form id="formID" class="formular" method="post">
		<fieldset>
			<legend>
				Bắt buộc!
		        <br>
		  </legend>
			<label>
				<span>Tài khoản : </span>
				<input value="" class="validate[required] text-input" type="text" name="req" id="req" />
			</label>						
<label>
				<span>Ngành học :</span>
				<select name="sport" id="sport" class="validate[required]">
					<option value="">Chọn một môn</option>
					<option value="option1">Lịch sử</option>
					<option value="option2">Toán học</option>
					<option value="option3">Ngoại ngữ</option>
				</select>
			</label>
			<br/>
			validate[required]
		</fieldset>
			
		<fieldset>		  		
			<legend>Bắt chuỗi hợp lệ</legend>
			Một số chuỗi như điện thoại, email, địa chỉ ip ... (phone, url, ip, email..etc)<br>
	      Ta cần bắt định dạng cho nó  . Ví dụ<br/>
				<span> Nhập đường link : </span>
                <input value="http://" class="validate[required,custom[url]] text-input" type="text" name="url" id="url" />
				<br/>
				validate[required,custom[url]]
			</label>
		</fieldset>
			
		<fieldset>
			<legend>So sánh 2 chuỗi
			<br>
	    </legend>
			<label>
				<span>Mật khẩu : </span>
				<input value="karnius" class="validate[required] text-input" type="password" name="password" id="password" />
			</label>
			<label>
				<span>Nhập lại mật khẩu : </span>
			    <input value="kaniusBAD" class="validate[required,equals[password]] text-input" type="password" name="password2" id="password2" />
				<br/>
				validate[required,equals[password]]
			</label>
		</fieldset>
			
		<fieldset>
			<legend>Dùng hàm quy định
			<br>
		  </legend>
			<label>Một số trường hợp ta cần một điều kiện bắt lỗi đặc thù thì ta dùng tính năng validate này<br>
			  <br>
<span>Viết chữ 'HELLO' : </span>
			    <input value="" class="validate[required,funcCall[checkHELLO]] text-input" type="text" id="lastname" name="lastname" />
				<br/>
				validate[required,funcCall[checkHELLO]]
		  </label>
		</fieldset>
			
		<fieldset>
			<legend>
				Bắt lỗi có điều kiện
      </legend>
			<label>
				<span>Nếu như lớp được nhập dữ liệu thì phải nhập tên Trường <br/><br/> Tên Lớp (1): </span>
				<input value="" class="text-input" type="text" name="dep1" id="dep1" />
			</label>
			<label>
				<span>
                Tên Trường Học
          </span>
				<input class="validate[condRequired[dep1]] text-input" type="text" name="conditionalrequired1" id="conditionalrequired1" />
                                <br/>
				validate[condRequired[dep1]]
			</label>
                        
			<label>
                                <br/>
<strong>2 ô nhập liệu chính</strong><br/>
                                <br/>
				<span>  Địa chỉ thường trú (2a) : </span>
				<input value="" class="text-input" type="text" name="dep2a" id="dep2a" />
			</label>
			<label>
				<span>Địa chỉ tạm trú (2b) : </span>
				<input value="" class="text-input" type="text" name="dep2b" id="dep2b" />
			</label>
			<label>
				<span>Nếu 1 trong 2 có dữ liệu thì bắt buộc nhập : </span>
				<input class="validate[condRequired[dep2a,dep2b]] text-input" type="text" name="conditionalrequired2" id="conditionalrequired2" />
                                <br/>
				validate[condRequired[dep2a,dep2b]]
			</label>
                    
		</fieldset>
			
		<fieldset>
			<legend>
				MinSize
			</legend>
			<label>
				Số ký tự tối thiểu
				<br/>
				<input value="" class="validate[required,minSize[6]] text-input" type="text" name="minsize" id="minsize" />
				<br/>
				validate[required,minSize[6]]
			</label>
		</fieldset>
			
		<fieldset>
			<legend>
				MaxSize
			</legend>
			<label>
			  Số ký tự tối đa<br/>
				<input value="0123456789" class="validate[optional,maxSize[6]] text-input" type="text" name="maxsize" id="maxsize" />
				<br/>
				validate[maxSize[6]]<br/>
				lưu ý nếu trường này có thể rỗng</label>
		</fieldset>
			
		<fieldset>
			<legend>Giá trị nhỏ nhất</legend>
			<label>Số nguyên >= -5
<br/>
				<input value="-7" class="validate[required,custom[integer],min[-5]] text-input" type="text" name="min" id="min" />
				<br/>
				validate[required,custom[integer],min[-5]]
			</label>
		</fieldset>
			
		<fieldset>
			<legend>Giá trị lớn nhất</legend>
			<label>
		    Số nguyên &lt;= 50<br/>
				<input value="55" class="validate[required,custom[integer],max[50]] text-input" type="text" name="max" id="max" />
				<br/>
				validate[required,custom[integer],max[50]]
			</label>
		</fieldset>
			
		<fieldset>
			<legend>Quá khứ</legend>
			<label>Kiểm tra giá trị nhập là một ngày trong quá khứ<br/>
				<span>Vui lòng nhập một ngày trước 2010/01/01</span>
				<input value="2009/06/30" class="validate[custom[date],past[2010/01/01]] text-input" type="text" name="past" id="past" />
				<br/>
				validate[custom[date],past[2010/01/01]]
		  </label>
		</fieldset>
			
		<fieldset>
			<legend>Tương lai</legend>
			<label>
Kiểm tra giá trị là một ngày trong tương lai<br/>
Vui lòng nhập một ngày sau ngày hôm nay
<input value="2011-01-" class="validate[custom[date],future[NOW]] text-input" type="text" name="future" id="future" />
				<br/>
				validate[custom[date],future[NOW]]<br/><br/>
		</fieldset>
			
		<fieldset>
			<legend>Bắt lỗi theo nhóm </legend>
			<label>Yêu cầu phải nhập một trong các trường sau.
			  <br/>
				<br/>
				<span>Vui lòng nhập credit card</span>
			</label>
			<input value="" class="validate[groupRequired[payments]] text-input" type="text" name="creditcard1" id="creditcard1" />
			<label><strong>HOẶC</strong></label><br/>
			<label>Vui lòng nhập paypal acccount</label>
		  <input value="" class="validate[groupRequired[payments],custom[email]] text-input" type="text" name="paypal" id="paypal" />
			<label><strong>HOẶC</strong></label><br/>
			<label>Vui lòng nhập bank account</label>
		  <input value="" class="validate[groupRequired[payments],custom[integer]] text-input" type="text" name="bank" id="bank" />
			<label><strong>HOẶC</strong></label><br/>
			<label>Vui lòng chọn </label>
			<select class="validate[groupRequired[payments]] text-input" type="text" name="bank2" id="bank2">
		    <option value="">Choose a payment option</option>
				<option value="Paypal">Paypal</option>
				<option value="Bank">Bank account</option>
			</select>
		</fieldset>
			
		<fieldset>
			<legend>
				Khoảng ngày tháng<br />
			</legend>
			<label>
				Bắt lỗi nếu khoảng ngày tháng không hợp lệ
				Vui lòng nhập ngày bắt đầu và ngày kết thúc<br /><br />
				<label for="date1">Ngày bắt đầu : </label>
				<input value="9/1/2009"  class="validate[dateRange[grp1]]" type="text" id="date1" />
			</label>
			<label>
				<label for="date2">Ngày kết thúc : </label>
				<input value="3/18/1985" class="validate[dateRange[grp1]]" type="text" id="date2" />
				<br/>
				validate[dateRange[grp1]]<br />
				
			</label>
		</fieldset>
		
		<fieldset>
			<legend>
				Khoảng thời gian<br />
			</legend>
			<label>
				ắt lỗi nếu khoảng thời gian không hợp lệ.
				Vui lòng nhập ngày giờ bắt đầu và ngày giờ kết thúc<br /><br />
				<label for="date1">Ngày giờ bắt đầu: </label>
				<input value="9/1/2009 9:30:00 PM"  class="validate[dateTimeRange[grp2]]" type="text" id="datetime1" />
			</label>
			<label>
				<label for="date2">Ngày giờ kết thúc: </label>
				<input value="9/1/2009 2:30:00 AM" class="validate[dateTimeRange[grp2]]" type="text" id="datetime2" />
				<br/>
				validate[dateTimeRange[grp2]<br />
			</label>
		</fieldset>
		
		

		<fieldset>
			<legend>
				Credit Card
			</legend>
			<label>
				Có thể nhập theo 2 dạng sau:<br/>
				<ul>
					<li>4111 1111 1111 1111</li>
					<li>3737-321345-610004</li>
				</ul>
				<input value="" class="validate[required,creditCard] text-input" type="text" name="creditcard2" id="creditcard2" />
				<br/>
				validate[required,creditCard]
			</label>
		</fieldset>
		<input class="submit" type="submit" value="Gửi dữ liệu"/>
	</form>
</body>
</html>