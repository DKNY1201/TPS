<?
	require_once "check-login.php";
	if($_SESSION['group']==1)
	{
		$cl=$i->customer_list_all();
	}
	elseif($_SESSION['group']==2)
	{
		$cl=$i->customer_list_by_mod();
	}
	$idUser=$_SESSION['id'];		  
	$idGroup=$_SESSION['group'];

	 
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
			//alert(listid);
			hoi=confirm("Xóa những khách hàng này?");
			if(hoi==true)
			{	
				window.location.assign("customer-del.php?listid="+listid);
				alert("Chức năng này chỉ chạy trên Firefox");
			}

        });
		
		$("#search-b").click(function(e) {
			//alert('a');
			url="search.php";
			var keyword=$("input[name='search-t']").val();
			var data="";
            var con="";
			var idGroup="";
			idGroup=$("#idGroup").val();
			con=$("input[name='s-radio']:checked").val();
			
			if(con==null)
			{
				alert("Bạn tìm kiếm theo cột nào?");
				return;
			}
			data="con="+con+"&keyword="+keyword+"&idGroup="+idGroup;
			
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
			idGroup=$("#idGroup").val();
			//alert(idLKH);
			//alert(val);
			var data="";
			var url="filter.php";
			data="idCV="+idCV+"&idLKH="+idLKH+"&idTT="+idTT+"&idGroup="+idGroup;
			//alert(data);
			$("#customer-f").css("display","none");
			$("#customer-content").load(url,data,process);
        });
		
		$("#lkh-filter").change(function(e) {
            //alert("a");
			idLKH=$(this).val();
			idCV=$(this).parent().find($("#cv-filter")).val();
			idTT=$(this).parent().find($("#tt-filter")).val();
			idGroup=$("#idGroup").val();
			//alert(idLKH);
			//alert(val);
			var data="";
			var url="filter.php";
			data="idCV="+idCV+"&idLKH="+idLKH+"&idTT="+idTT+"&idGroup="+idGroup;
			//alert(data);
			$("#customer-f").css("display","none");
			$("#customer-content").load(url,data,process);
        });
		
		$("#tt-filter").change(function(e) {
            //alert("a");
			idTT=$(this).val();
			idCV=$(this).parent().find($("#cv-filter")).val();
			idLKH=$(this).parent().find($("#lkh-filter")).val();
			idGroup=$("#idGroup").val();
			//alert(idLKH);
			//alert(val);
			var data="";
			var url="filter.php";
			data="idCV="+idCV+"&idLKH="+idLKH+"&idTT="+idTT+"&idGroup="+idGroup;
			//alert(data);
			$("#customer-f").css("display","none");
			$("#customer-content").load(url,data,process);
        });
		
		$("#asc").click(function(e) {
			url="sort.php";
			data="";
			by=$(this).parent().find($("input[name='s-radio']:checked")).val();
			//alert(by);
			idGroup=$("#idGroup").val();
			data="des=ASC"+"&by="+by+"&idGroup="+idGroup;
			//alert(data);
            $("#customer-f").css("display","none");
			$("#customer-content").load(url,data,process);
        });
		
		$("#desc").click(function(e) {
			url="sort.php";
			data="";
			by=$(this).parent().find($("input[name='s-radio']:checked")).val();
			//alert(by);
			idGroup=$("#idGroup").val();
			data="des=DESC"+"&by="+by+"&idGroup="+idGroup;
			//alert(data);
            $("#customer-f").css("display","none");
			$("#customer-content").load(url,data,process);
        });
    });
</script>


<div id="customer-list">
    <div class="module-title">
        <img src="images/customer-img.png" alt="Customer" >
        <h1>Tất cả Khách hàng <? if($idUser==1)?></span></h1>
    </div>
    <div class="clear"></div>
    
    <div id="search">
            <form id="search-f" name="search" action="" method="get">
                <input type="text" name="search-t" id="search-t" class="search-t" value="Tìm kiếm..." onfocus="if(this.value=='Tìm kiếm...') this.value=''" onblur="if(this.value=='') this.value='Tìm kiếm...'"/>
                <input type="radio" name="s-radio" id="s-makh" value="khachhang.MaKH" /> <label for="s-makh">Mã KH</label>
                <input type="radio" name="s-radio" id="s-hoten" value="khachhang.HoTen" /> Họ Tên
                <input type="radio" name="s-radio" id="s-congty" value="khachhang.CongTy"/> Công Ty
                <input type="radio" name="s-radio" id="s-dienthoai" value="khachhang.SoDT"/> Điện Thoại
                <input type="radio" name="s-radio" id="s-email" value="khachhang.Email"/> Email
                <input type="radio" name="s-radio" id="s-duan" value="khachhang.TenDuAn"/> Dự Án
                <input type="radio" name="s-radio" id="s-duan" value="khachhang.GhiChu"/> Ghi Chú
                <div class="clear"></div>
                <input type="hidden" value="<?=$idGroup?>" id="idGroup" />
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
            	<input type="radio" name="s-radio" id="s-makh" value="khachhang.MaKH" /> <label for="s-makh">Mã KH</label>
                <input type="radio" name="s-radio" id="s-hoten" value="khachhang.HoTen" /> Họ Tên
                <input type="radio" name="s-radio" id="s-congty" value="khachhang.CongTy"/> Công Ty
                <input type="radio" name="s-radio" id="s-dienthoai" value="khachhang.SoDT"/> Điện Thoại
                <input type="radio" name="s-radio" id="s-email" value="khachhang.Email"/> Email
                <input type="radio" name="s-radio" id="s-duan" value="khachhang.TenDuAn"/> Dự Án
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
            <td class="stt">Người quản lý</td>
            <td class="stt">Ghi chú</td>
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
				
				$idNV=$row_cl['idNV'];
				$nv=$i->user_detail($idNV);
				$row_nv=mysql_fetch_assoc($nv);
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
            <td><?=$row_nv['HoTen']?></td>
            <td><?=$row_cl['GhiChu']?></td>
            <td>
            
                <a href="customer-del.php?idKH=<?=$row_cl['idKH']?>&idUser=<?=$row_cl['idNV']?>" onclick="return confirm('Xóa khách hàng này?')"><img src="images/delete-ico.png" alt="Delete" title="Delete"></a>
                <a href="index.php?p=customer-edit&idKH=<?=$row_cl['idKH']?>&idUser=<?=$row_cl['idNV']?>" ><img src="images/edit-ico.png" alt="Edit" title="Edit"></a>
            
            </td>
          </tr>
          <? }?>
          
          <tr>
            <td colspan="14" align="left"><input class="input list" id="delete-all" type="submit" value="Xóa hết"></td>
          </tr>
        </table>
    </form>
    </div>
</div>
