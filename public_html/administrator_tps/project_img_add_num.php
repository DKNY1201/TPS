<?
	require_once "checklogin.php";
	if(isset($_GET['idpr']))
		$idPro=$_GET['idpr'];
?>
<script>
	$(document).ready(function(e) {
        $("#sub").click(function(e) {
			var idPro=$("#idPro").val();
			var n=$("#img_amount").val();
			//alert(idPro);
            //document.location("index.php?p=sanpham_themnhieu&sosp="+n);
			location.replace("index.php?p=project_img_add&img_amount="+n+"&idpr="+idPro);
        });
    });
</script>
	<h3>Bạn muốn thêm bao nhiêu hình?</h3>
    <select name="img_amount" id="img_amount">
        <? for($k=1;$k<=20;$k++){?>
        <option value="<?=$k?>"><?=$k?></option>
        <? }?>
    </select>
    <input type="hidden" value="<?=$idPro?>" id="idPro">
    <br /><br />
    <input type="submit" value="Thêm" class="btn btn-danger" id="sub">