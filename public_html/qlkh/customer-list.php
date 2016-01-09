<?
   require_once("check-login.php"); 
   if(isset($_GET['idUser'])==true)
   		$idUser=$_GET['idUser'];
	else
		$idUser=$_SESSION['id'];
		
   
   $cl=$i->customer_list($idUser);
   $st=$i->staff_list($idUser);
   $us=$i->staff_detail($idUser);
   $row_us=mysql_fetch_assoc($us);
   
   $cv=$i->duty_list();
   $lkh=$i->customer_type_list();
   $tt=$i->status_list();
?>
<script>
	$(document).ready(function(e) {
        $("#customer-c-a").click(function(e) {
            var stt=this.checked;
			$("input[name='customer-c']").each(function(index, element) {
                this.checked=stt;
            });
        });
		
		$("#delete-all").click(function(e) {
			//alert('a');
            var listid="";
			idUser="";
			idUser=$("#idUser").val();
			$("input[name='customer-c']").each(function(index, element) {
                if(this.checked==true) listid=listid+","+this.value;
            });
			listid=listid.substr(1);
			if(listid=="")
			{
				alert("Bạn chưa chọn khách hàng");
				return;
			}
			else
			{
				
				hoi=confirm("Xóa những khách hàng này?");
				if(hoi)
				{
					document.location="customer-del.php?listid="+listid+"&idUser="+idUser;
					alert("Chức năng này chỉ chạy trên Firefox");//phải để alert('...') thì code trên mới chạy >"<
				}
				else
					return;
			}
        });
		
		$("#search-b").click(function(e) {
			//alert('a');
			url="search.php";
			var keyword=$("input[name='search-t']").val();
			var data="";
            var con="";
			var idUser="";
			idUser=$("#idUser").val();
			con=$("input[name='s-radio']:checked").val();
			
			if(con==null)
			{
				alert("Bạn tìm kiếm theo cột nào?");
				return;
			}
			data="con="+con+"&keyword="+keyword+"&idUser="+idUser;
			
			$("#customer-f").css("display","none");
			$("#customer-content").load(url,data,process);
        });
		
		function process(){

		}
		
		$("#cv-filter").change(function(e) {
            //alert("a");
			idCV=$(this).val();
			idLKH=$(this).parent().find($("#lkh-filter")).val();
			idTT=$(this).parent().find($("#tt-filter")).val();
			idUser=$("#idUser").val();
			//alert(idLKH);
			//alert(val);
			var data="";
			var url="filter.php";
			data="idCV="+idCV+"&idLKH="+idLKH+"&idTT="+idTT+"&idUser="+idUser;
			//alert(data);
			$("#customer-f").css("display","none");
			$("#customer-content").load(url,data,process);
        });
		
		$("#lkh-filter").change(function(e) {
            //alert("a");
			idLKH=$(this).val();
			idCV=$(this).parent().find($("#cv-filter")).val();
			idTT=$(this).parent().find($("#tt-filter")).val();
			idUser=$("#idUser").val();
			//alert(idLKH);
			//alert(val);
			var data="";
			var url="filter.php";
			data="idCV="+idCV+"&idLKH="+idLKH+"&idTT="+idTT+"&idUser="+idUser;
			//alert(data);
			$("#customer-f").css("display","none");
			$("#customer-content").load(url,data,process);
        });
		
		$("#tt-filter").change(function(e) {
            //alert("a");
			idTT=$(this).val();
			idCV=$(this).parent().find($("#cv-filter")).val();
			idLKH=$(this).parent().find($("#lkh-filter")).val();
			idUser=$("#idUser").val();
			//alert(idLKH);
			//alert(val);
			var data="";
			var url="filter.php";
			data="idCV="+idCV+"&idLKH="+idLKH+"&idTT="+idTT+"&idUser="+idUser;
			//alert(data);
			$("#customer-f").css("display","none");
			$("#customer-content").load(url,data,process);
        });
		
		$("#asc").click(function(e) {
			url="sort.php";
			data="";
			by=$(this).parent().find($("input[name='s-radio']:checked")).val();
			//alert(by);
			idUser=$("#idUser").val();
			data="des=ASC"+"&by="+by+"&idUser="+idUser;
			//alert(data);
            $("#customer-f").css("display","none");
			$("#customer-content").load(url,data,process);
        });
		
		$("#desc").click(function(e) {
			url="sort.php";
			data="";
			by=$(this).parent().find($("input[name='s-radio']:checked")).val();
			//alert(by);
			idUser=$("#idUser").val();
			data="des=DESC"+"&by="+by+"&idUser="+idUser;
			//alert(data);
            $("#customer-f").css("display","none");
			$("#customer-content").load(url,data,process);
        });
    });
</script>


<div id="customer-list">
    <div class="module-title">
        <img src="images/customer-img.png" alt="Customer" >
        <h1>Khách hàng của <span class="name"><?=$row_us['HoTen']?></span></h1>
    </div>
    <div class="clear"></div>
    
    <div id="search">
            <form id="search-f" name="search" action="" method="get">
                <input type="text" name="search-t" id="search-t" class="search-t" value="Tìm kiếm..." onfocus="if(this.value=='Tìm kiếm...') this.value=''" onblur="if(this.value=='') this.value='Tìm kiếm...'"/>
                <input type="radio" name="s-radio" id="s-makh" value="MaKH" /> <label for="s-makh">Mã KH</label>
                <input type="radio" name="s-radio" id="s-hoten" value="HoTen" /> Họ Tên
                <input type="radio" name="s-radio" id="s-congty" value="CongTy"/> Công Ty
                <input type="radio" name="s-radio" id="s-dienthoai" value="SoDT"/> Điện Thoại
                <input type="radio" name="s-radio" id="s-email" value="Email"/> Email
                <input type="radio" name="s-radio" id="s-duan" value="TenDuAn"/> Dự Án
                <div class="clear"></div>
                <input type="hidden" value="<?=$idUser?>" id="idUser" />
                
                <p name="search-b" id="search-b" class="search-b" style="cursor:pointer">Tìm</p>
                <div id="filter">
                	<span class="sfilter">Lọc khách hàng</span>
                    <select id="cv-filter">
                        <option value="0">Chọn chức vụ</option>
                        <? while($row_cv=mysql_fetch_assoc($cv)){?>
                        <option value="<?=$row_cv['idCV']?>"><?=$row_cv['MoTa']?></option>
                        <? }?>
                    </select>
                    <select id="lkh-filter">
                        <option value="0">Phân loại khách hàng</option>
                        <? while($row_lkh=mysql_fetch_assoc($lkh)){?>
                        <option value="<?=$row_lkh['idLKH']?>"><?=$row_lkh['MoTa']?></option>
                        <? }?>
                    </select>
                    <select id="tt-filter">
                        <option value="0">Tình trạng</option>
                        <? while($row_tt=mysql_fetch_assoc($tt)){?>
                        <option value="<?=$row_tt['idTT']?>"><?=$row_tt['MoTa']?></option>
                        <? }?>
                    </select>
                </div>
            </form>
            <div class="clear"></div>
            <div id="sort">
            <span class="sfilter">Sắp xếp khách hàng theo &nbsp;&nbsp;</span>
            	<input type="radio" name="s-radio" id="s-makh" value="MaKH" /> <label for="s-makh">Mã KH</label>
                <input type="radio" name="s-radio" id="s-hoten" value="HoTen" /> Họ Tên
                <input type="radio" name="s-radio" id="s-congty" value="CongTy"/> Công Ty
                <input type="radio" name="s-radio" id="s-dienthoai" value="SoDT"/> Điện Thoại
                <input type="radio" name="s-radio" id="s-email" value="Email"/> Email
                <input type="radio" name="s-radio" id="s-duan" value="TenDuAn"/> Dự Án
                <div class="clear"></div>
            	<p class="order search-b" id="asc" des="asc">Tăng</p> <p class="order search-b" id="desc" des="desc">Giảm</p>
            </div>
    </div>   
   
    <div class="clear"></div>
    <div id="customer-content">
    <form id="customer-f" name="customer-f" action="" method="POST" >
        <table width="100%" border="0" cellpadding="3" id="customer-table">
          <tr class="title">
            <td class="check-box"><input type="checkbox" name="customer-c-a" id="customer-c-a"></td>
            <td class="customer-code">Mã KH </td>
            <td class="name">Họ tên</td>
            <td class="company">Công ty</td>
            <td class="duty">Chức vụ</td>
            <td class="mobile">Điện thoại</td>
            <td class="email">Email</td>
            <td class="email">Địa chỉ</td>
            <td class="category">Phân loại KH</td>
            <td class="project">Dự án</td>
            <td class="stt">Tình trạng</td>
            <td class="note">Ghi chú</td>
            <td class="action">Hành động</td>
          </tr>
         
          <? 
            while($row_cl=mysql_fetch_assoc($cl)){
                $idCV=$row_cl['idCV'];
                $cv=$i->duty_detail($idCV);
                $row_cv=mysql_fetch_assoc($cv);

                $idLKH=$row_cl['idLKH'];
                $lkh=$i->customer_type_detail($idLKH);
                $row_lkh=mysql_fetch_assoc($lkh);

                $idTT=$row_cl['idTT'];
                $tt=$i->status_detail($idTT);
                $row_tt=mysql_fetch_assoc($tt);
            ?>
          <tr>
            <td><input type="checkbox" name="customer-c" id="customer-c" value="<?=$row_cl['idKH']?>"></td>
            <td><?=$row_cl['MaKH']?></td>
            <td><?=$row_cl['HoTen']?></td>
            <td><?=$row_cl['CongTy']?></td>
            <td><?=$row_cv['MoTa']?></td>
            <td><?=$row_cl['SoDT']?><? if(strlen($row_cl['SoDT1'])>=1) {echo ", "; } echo $row_cl['SoDT1']; ?></td>
            <td><?=$row_cl['Email']?><? if(strlen($row_cl['Email1'])>=1) {echo ", "; } echo $row_cl['Email1'];?> </td>
            <td><?=$row_cl['DiaChi']?></td>
            <td><?=$row_lkh['MoTa']?></td>
            <td><?=$row_cl['TenDuAn']?></td>
            <td><?=$row_tt['MoTa']?></td>
            <td><?=$row_cl['GhiChu']?></td>
            <td>
            
                <? if(strlen($row_cl['GhiChu'])<=0) {?>
                <a href="customer-del.php?idKH=<?=$row_cl['idKH']?>&idUser=<?=$idUser?>" onclick="return confirm('Xóa khách hàng này?')"><img src="images/delete-ico.png" alt="Delete" title="Delete"></a>
                <? }?>
                <a href="index.php?p=customer-edit&idKH=<?=$row_cl['idKH']?>&idUser=<?=$idUser?>" ><img src="images/edit-ico.png" alt="Edit" title="Edit"></a>
            
            </td>
          </tr>
          <? }?>
          
          <tr>
            <td colspan="13" align="left"><input class="input list" id="delete-all" type="submit" value="Xóa hết"></td>
          </tr>
        </table>
    </form>
    </div>
</div>
