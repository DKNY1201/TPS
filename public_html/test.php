<?php
/*
	mysql_connect("localhost","truongph_quytv","123@123a");
	mysql_select_db("truongph_truongphu");
	mysql_query("set names 'utf-8'");
	
	$sql="SELECT * FROM project_img";
	$kq=mysql_query($sql) or die(mysql_error());
	while($row=mysql_fetch_assoc($kq)){
		$id=$row['idImg'];
		$img=$row['url_small'];
		$img=str_replace('//img/upload','/img/upload',$img);
	
		$sql="UPDATE project_img set url_small='$img' WHERE idImg=$id";
		mysql_query($sql) or die(mysql_error());
	}
	*/
	xin chao quy dai ca
?>