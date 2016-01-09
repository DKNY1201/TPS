<?
   require_once("check-login.php"); 
   $idGroup=$_SESSION['group'];
   $idNV=$_SESSION['id'];
   if($idGroup==1)
   {
		$st1=$i->staff_list_lv1();
		$st2=$i->staff_list_lv2();
		$st3=$i->staff_list_lv3();      	
   }
   if($idGroup==2)
   {	
		$st3=$i->staff_list_lv3();  
	}
?>
<script>
	$(document).ready(function(e) {
        $("#staff-c-a").click(function(e) {
            var stt=this.checked;
			$("input[name='staff-c']").each(function(index, element) {
                this.checked=stt;
            });
        });
		
		$(".del").click(function(e) {
			idNV=$(this).attr("idNV");
			//alert(idNV);
            hoi1=confirm('Tất cả dữ liệu của khách hàng này sẽ chuyển qua cho user Trần Văn Đoàn Tụ');
			if(hoi1)
			{
				hoi2=confirm('Bạn chắc chắn xóa khách hàng này?');
				if(hoi2)
					document.location="staff-del.php?idNV="+idNV;
				else 
					return;	
			}
			else	
				return;
        });
		
		$("#delete-all").click(function(e) {
			//alert('a');
            var listid="";
			$("input[name='staff-c']").each(function(index, element) {
                if(this.checked==true) listid=listid+","+this.value;
            });
			listid=listid.substr(1);
			if(listid=="")
			{
				alert("Bạn chưa chọn nhân viên");
				return;
			}
			else
			{
				
				hoi=confirm("Xóa những nhân viên này?");
				if(hoi)
				{
					document.location="staff-del.php?listid="+listid;
					alert('a');
				}
				else
					return;
			}
        });
    });
</script>
<div id="staff-list">
    <div class="module-title">
        <img src="images/customer-img.png" alt="staff">
        <h1>Nhân viên</h1>
    </div>
    <div class="clear"></div>
    <div id="staff-list-inner">
    	<table id="staff-list-t" name="staff-list-t">
        	<tr class="title">
            	<td>STT</td>
                <td>Họ Tên</td>
            <? if($idGroup==1)
   				{
			?>
                <td>Hành Động</td>
            <?
				}
			?>
            </tr>
            <? if($idGroup==1)
   				{
			?>
            <tr class="level">
            	<td colspan="3" align="left">Cấp I</td>
            </tr>
            <? 
				$i=0;
				while($row_st=mysql_fetch_assoc($st1)){
					$i++;	
			?>
					<tr>
                    	<td><?=$i?></td>
                        <td><a href="index.php?p=customer-list&idUser=<?=$row_st['idNV']?>"><?=$row_st['HoTen']?></a></td>
                        <td><img class="del" src="images/delete-ico.png" idNV="<?=$row_st['idNV']?>" alt="Delete" title="Delete"></td>
                    </tr>
			<? 
			}
			?>
            <tr class="level" align="left">
            	<td colspan="3">Cấp II</td>
            </tr>
            <? 
				$i=0;
				while($row_st=mysql_fetch_assoc($st2)){
					$i++;	
			?>
					<tr>
                    	<td><?=$i?></td>
                        <td><a href="index.php?p=customer-list&idUser=<?=$row_st['idNV']?>"><?=$row_st['HoTen']?></a></td>
                        <td><img class="del" src="images/delete-ico.png" idNV="<?=$row_st['idNV']?>" alt="Delete" title="Delete"></td>
                    </tr>
			<? 
			}}
			?>
             <tr class="level" align="left">
            	<td colspan="<? if($idGroup==1) echo "3"; elseif($idGroup==2) echo "2";?>">Cấp III</td>
            </tr>
            <? 
				$i=0;
				while($row_st=mysql_fetch_assoc($st3)){
					$i++;	
			?>
					<tr>
                    	<td><?=$i?></td>
                        <td><a href="index.php?p=customer-list&idUser=<?=$row_st['idNV']?>"><?=$row_st['HoTen']?></a></td>
                        <? if($idGroup==1)
   						{
						?>
                        <td><img class="del" src="images/delete-ico.png" idNV="<?=$row_st['idNV']?>" alt="Delete" title="Delete"></td>
                        <?
						}
						?>
                    </tr>
			<? 
			}
			?>
        </table>
    	
    </div>
</div>