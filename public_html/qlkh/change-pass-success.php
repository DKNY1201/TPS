<script>
s=5; 
setTimeout("document.location='index.php'",s*1000);  //Sau khoảng thời gian s*1000 sẽ thực hiện lệnh trước
setInterval("document.getElementById('sogiay').innerHTML=s--;",1000); // cứ mổi giây sẽ lấy giá trị giảm dần của s và đưa vào span sogiay
</script> 

<div id="change-pass-success">
    <p>Đổi password thành công</p>
    <p>Quay lại trang chủ sau <span id=sogiay></span> giây</p>
</div>