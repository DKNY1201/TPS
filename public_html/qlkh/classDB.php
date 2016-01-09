<?
	/**
	* Class DB ket noi toi database
	*/
	class db
	{
		PUBLIC $con=NULL;
		PUBLIC $host="localhost";
		PUBLIC $username="truongph_quytv";
		PUBLIC $pass="123@123a";
		PUBLIC $database="truongph_qlkh";
		function __construct()
		{
			$this->con=mysql_connect($this->host,$this->username,$this->pass);
			mysql_select_db($this->database);
			mysql_query("set names 'utf8'");
		}
		/*------GENERAL-----*/
		function check_mobile($mobile)
		{
			$sql="SELECT idNV FROM khachhang WHERE SoDT=$mobile OR SoDT1=$mobile";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function check_makh($makh)
		{
			$sql="SELECT idKH FROM khachhang WHERE MaKH='$makh'";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		/*------END-GENERAL-----*/
		
		/*------SEARCH-----*/
		function search($keyword,$con,$idUser)
		{
			$keyword=trim(strip_tags($keyword));
			$con=trim(strip_tags($con));
			
			if(get_magic_quotes_gpc()==false)
			{
				$keyword=mysql_real_escape_string($keyword);
				$con=mysql_real_escape_string($con);
			}
			
			$sql="SELECT * FROM khachhang WHERE $con LIKE '%$keyword%' AND idNV=$idUser ORDER BY idKH DESC";
			
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function search_group_1($keyword,$con)
		{
			$keyword=trim(strip_tags($keyword));
			$con=trim(strip_tags($con));
			
			if(get_magic_quotes_gpc()==false)
			{
				$keyword=mysql_real_escape_string($keyword);
				$con=mysql_real_escape_string($con);
			}
			
			$sql="SELECT * FROM khachhang WHERE $con LIKE '%$keyword%' ORDER BY idKH DESC";	
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function search_group_2($keyword,$con)
		{
			$keyword=trim(strip_tags($keyword));
			$con=trim(strip_tags($con));
			
			if(get_magic_quotes_gpc()==false)
			{
				$keyword=mysql_real_escape_string($keyword);
				$con=mysql_real_escape_string($con);
			}
			
			$sql="SELECT khachhang.idKH,khachhang.MaKH,khachhang.HoTen,khachhang.CongTy,khachhang.idCV,khachhang.SoDT,khachhang.SoDT1,khachhang.Email,khachhang.Email1,khachhang.DiaChi,khachhang.idLKH,khachhang.TenDuAn,khachhang.GhiChu,khachhang.idTT,khachhang.idNV FROM khachhang,nhanvien WHERE $con LIKE '%$keyword%' AND khachhang.idNV=nhanvien.idNV AND nhanvien.idNhom=3 ORDER BY idKH DESC";	
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		/*------END-SEARCH-----*/
		
		/*------FILTER-----*/
		function filter($idCV,$idLKH,$idTT,$idUser)
		{
			$idCV=$idCV;
			$idLKH=$idLKH;
			$idTT=$idTT;
			$idUser=$idUser;
			
			settype($idCV,"int");
			settype($idLKH,"int");
			settype($idTT,"int");
			settype($idUser,"int");

			if($idLKH==0&&$idCV==0&&$idTT==0) $sql="SELECT * FROM khachhang WHERE idNV=$idUser ORDER BY idKH DESC";
			elseif($idCV==0&&$idLKH==0)  $sql="SELECT * FROM khachhang WHERE idTT=$idTT AND idNV=$idUser ORDER BY idKH DESC";
			elseif($idCV==0&&$idTT==0)  $sql="SELECT * FROM khachhang WHERE idLKH=$idLKH AND idNV=$idUser ORDER BY idKH DESC";
			elseif($idCV==0) $sql="SELECT * FROM khachhang WHERE idLKH=$idLKH AND idTT=$idTT AND idNV=$idUser ORDER BY idKH DESC";
			elseif($idLKH==0&&$idTT==0)  $sql="SELECT * FROM khachhang WHERE idCV=$idCV AND idNV=$idUser ORDER BY idKH DESC";			
			elseif($idLKH==0) $sql="SELECT * FROM khachhang WHERE idCV=$idCV AND idTT=$idTT AND idNV=$idUser ORDER BY idKH DESC";
			elseif($idTT==0) $sql="SELECT * FROM khachhang WHERE idLKH=$idLKH AND idCV=$idCV AND idNV=$idUser ORDER BY idKH DESC";
			else $sql="SELECT * FROM khachhang WHERE idCV=$idCV AND idLKH=$idLKH AND idTT=$idTT AND idNV=$idUser ORDER BY idKH DESC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function filter_group_1($idCV,$idLKH,$idTT)
		{
			$idCV=$idCV;
			$idLKH=$idLKH;
			$idTT=$idTT;
			
			settype($idCV,"int");
			settype($idLKH,"int");
			settype($idTT,"int");

			if($idLKH==0&&$idCV==0&&$idTT==0) $sql="SELECT * FROM khachhang ORDER BY idKH DESC";
			elseif($idCV==0&&$idLKH==0)  $sql="SELECT * FROM khachhang WHERE idTT=$idTT ORDER BY idKH DESC";
			elseif($idCV==0&&$idTT==0)  $sql="SELECT * FROM khachhang WHERE idLKH=$idLKH ORDER BY idKH DESC";
			elseif($idCV==0) $sql="SELECT * FROM khachhang WHERE idLKH=$idLKH AND idTT=$idTT ORDER BY idKH DESC";
			elseif($idLKH==0&&$idTT==0)  $sql="SELECT * FROM khachhang WHERE idCV=$idCV ORDER BY idKH DESC";			
			elseif($idLKH==0) $sql="SELECT * FROM khachhang WHERE idCV=$idCV AND idTT=$idTT ORDER BY idKH DESC";
			elseif($idTT==0) $sql="SELECT * FROM khachhang WHERE idLKH=$idLKH AND idCV=$idCV ORDER BY idKH DESC";
			else $sql="SELECT * FROM khachhang WHERE idCV=$idCV AND idLKH=$idLKH AND idTT=$idTT ORDER BY idKH DESC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function filter_group_2($idCV,$idLKH,$idTT)
		{
			$idCV=$idCV;
			$idLKH=$idLKH;
			$idTT=$idTT;
			
			settype($idCV,"int");
			settype($idLKH,"int");
			settype($idTT,"int");

			if($idLKH==0&&$idCV==0&&$idTT==0) $sql="SELECT khachhang.idKH,khachhang.MaKH,khachhang.HoTen,khachhang.CongTy,khachhang.idCV,khachhang.SoDT,khachhang.SoDT1,khachhang.Email,khachhang.Email1,khachhang.DiaChi,khachhang.idLKH,khachhang.TenDuAn,khachhang.GhiChu,khachhang.idTT,khachhang.idNV FROM khachhang,nhanvien WHERE khachhang.idNV=nhanvien.idNV AND nhanvien.idNhom=3 ORDER BY idKH DESC";
			elseif($idCV==0&&$idLKH==0)  $sql="SELECT khachhang.idKH,khachhang.MaKH,khachhang.HoTen,khachhang.CongTy,khachhang.idCV,khachhang.SoDT,khachhang.SoDT1,khachhang.Email,khachhang.Email1,khachhang.DiaChi,khachhang.idLKH,khachhang.TenDuAn,khachhang.GhiChu,khachhang.idTT,khachhang.idNV FROM khachhang,nhanvien WHERE khachhang.idNV=nhanvien.idNV AND nhanvien.idNhom=3 AND khachhang.idTT=$idTT ORDER BY idKH DESC";
			elseif($idCV==0&&$idTT==0)  $sql="SELECT khachhang.idKH,khachhang.MaKH,khachhang.HoTen,khachhang.CongTy,khachhang.idCV,khachhang.SoDT,khachhang.SoDT1,khachhang.Email,khachhang.Email1,khachhang.DiaChi,khachhang.idLKH,khachhang.TenDuAn,khachhang.GhiChu,khachhang.idTT,khachhang.idNV FROM khachhang,nhanvien WHERE khachhang.idNV=nhanvien.idNV AND nhanvien.idNhom=3 AND khachhang.idLKH=$idLKH ORDER BY idKH DESC";
			elseif($idCV==0) $sql="SELECT khachhang.idKH,khachhang.MaKH,khachhang.HoTen,khachhang.CongTy,khachhang.idCV,khachhang.SoDT,khachhang.SoDT1,khachhang.Email,khachhang.Email1,khachhang.DiaChi,khachhang.idLKH,khachhang.TenDuAn,khachhang.GhiChu,khachhang.idTT,khachhang.idNV FROM khachhang,nhanvien WHERE khachhang.idNV=nhanvien.idNV AND nhanvien.idNhom=3 AND khachhang.idLKH=$idLKH AND khachhang.idTT=$idTT ORDER BY idKH DESC";
			elseif($idLKH==0&&$idTT==0)  $sql="SELECT khachhang.idKH,khachhang.MaKH,khachhang.HoTen,khachhang.CongTy,khachhang.idCV,khachhang.SoDT,khachhang.SoDT1,khachhang.Email,khachhang.Email1,khachhang.DiaChi,khachhang.idLKH,khachhang.TenDuAn,khachhang.GhiChu,khachhang.idTT,khachhang.idNV FROM khachhang,nhanvien WHERE khachhang.idNV=nhanvien.idNV AND nhanvien.idNhom=3 AND khachhang.idCV=$idCV ORDER BY idKH DESC";			
			elseif($idLKH==0) $sql="SELECT khachhang.idKH,khachhang.MaKH,khachhang.HoTen,khachhang.CongTy,khachhang.idCV,khachhang.SoDT,khachhang.SoDT1,khachhang.Email,khachhang.Email1,khachhang.DiaChi,khachhang.idLKH,khachhang.TenDuAn,khachhang.GhiChu,khachhang.idTT,khachhang.idNV FROM khachhang,nhanvien WHERE khachhang.idNV=nhanvien.idNV AND nhanvien.idNhom=3 AND khachhang.idCV=$idCV AND khachhang.idTT=$idTT ORDER BY idKH DESC";
			elseif($idTT==0) $sql="SELECT khachhang.idKH,khachhang.MaKH,khachhang.HoTen,khachhang.CongTy,khachhang.idCV,khachhang.SoDT,khachhang.SoDT1,khachhang.Email,khachhang.Email1,khachhang.DiaChi,khachhang.idLKH,khachhang.TenDuAn,khachhang.GhiChu,khachhang.idTT,khachhang.idNV FROM khachhang,nhanvien WHERE khachhang.idNV=nhanvien.idNV AND nhanvien.idNhom=3 AND khachhang.idLKH=$idLKH AND khachhang.idCV=$idCV ORDER BY idKH DESC";
			else $sql="SELECT khachhang.idKH,khachhang.MaKH,khachhang.HoTen,khachhang.CongTy,khachhang.idCV,khachhang.SoDT,khachhang.SoDT1,khachhang.Email,khachhang.Email1,khachhang.DiaChi,khachhang.idLKH,khachhang.TenDuAn,khachhang.GhiChu,khachhang.idTT,khachhang.idNV FROM khachhang,nhanvien WHERE khachhang.idNV=nhanvien.idNV AND nhanvien.idNhom=3 AND khachhang.idCV=$idCV AND khachhang.idLKH=$idLKH AND idTT=$idTT ORDER BY idKH DESC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		/*------END-FILTER-----*/
		
		/*------SORT-----*/
		function sort($des,$by,$idUser)
		{
			$sql="SELECT * FROM khachhang WHERE idNV=$idUser ORDER BY $by $des";
			//echo $sql; exit();
			$re=mysql_query($sql) or die(mysql_error());
			return $re;	
		}
		function sort_group_1($des,$by)
		{
			$sql="SELECT * FROM khachhang ORDER BY $by $des";
			//echo $sql; exit();
			$re=mysql_query($sql) or die(mysql_error());
			return $re;	
		}
		function sort_group_2($des,$by)
		{
			$sql="SELECT khachhang.idKH,khachhang.MaKH,khachhang.HoTen,khachhang.CongTy,khachhang.idCV,khachhang.SoDT,khachhang.SoDT1,khachhang.Email,khachhang.Email1,khachhang.DiaChi,khachhang.idLKH,khachhang.TenDuAn,khachhang.GhiChu,khachhang.idTT,khachhang.idNV FROM khachhang,nhanvien WHERE khachhang.idNV=nhanvien.idNV AND nhanvien.idNhom=3 ORDER BY $by $des";
			//echo $sql; exit();
			$re=mysql_query($sql) or die(mysql_error());
			return $re;	
		}
		/*------END-SORT-----*/
		/*------CUSTOMER-----*/
		function customer_list_all()
		{
			$sql="SELECT * FROM khachhang ORDER BY idKH DESC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function customer_list_by_mod()
		{
			$sql="SELECT khachhang.idKH,khachhang.MaKH,khachhang.HoTen,khachhang.CongTy,khachhang.idCV,khachhang.SoDT,khachhang.SoDT1,khachhang.Email,khachhang.Email1,khachhang.DiaChi,khachhang.idLKH,khachhang.TenDuAn,khachhang.GhiChu,khachhang.idTT,khachhang.idNV FROM khachhang,nhanvien WHERE khachhang.idNV=nhanvien.idNV AND (nhanvien.idNhom=2 OR nhanvien.idNhom=3) ORDER BY idKH DESC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function customer_list($idUser){
			$sql="SELECT * FROM khachhang WHERE idNV=$idUser ORDER BY idKH DESC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}

		function customer_detail($idKH){
			$sql="SELECT * FROM khachhang WHERE idKH=$idKH";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}

		function customer_add(&$error){
			$success=true;

			$makh=$_POST['makh'];
			$hoten=$_POST['hoten'];
			$congty=$_POST['congty'];
			$chucvu=$_POST['chucvu'];
			$sodt=$_POST['dienthoai'];
			$sodt1=$_POST['dienthoai1'];
			$email=$_POST['email'];
			$email1=$_POST['email1'];
			$diachi=$_POST['diachi'];
			$loaikh=$_POST['loaikh'];
			$duan=$_POST['duan'];
			$tinhtrang=$_POST['tinhtrang'];
			$nv=$_POST['nv'];

			$makh=trim(strip_tags($makh));
			$hoten=trim(strip_tags($hoten));
			$congty=trim(strip_tags($congty));
			$sodt=trim(strip_tags($sodt));
			$sodt1=trim(strip_tags($sodt1));
			$email=trim(strip_tags($email));
			$email1=trim(strip_tags($email1));
			$diachi=trim(strip_tags($diachi));
			$duan=trim(strip_tags($duan));

			if (get_magic_quotes_gpc()==false) {
				$makh=mysql_real_escape_string($makh);
				$hoten=mysql_real_escape_string($hoten);
				$congty=mysql_real_escape_string($congty);
				$sodt=mysql_real_escape_string($sodt);
				$sodt1=mysql_real_escape_string($sodt1);
				$email=mysql_real_escape_string($email);
				$email1=mysql_real_escape_string($email1);
				$diachi=mysql_real_escape_string($diachi);
				$duan=mysql_real_escape_string($duan);
			}

			if ((mysql_num_rows($this->check_makh($makh)))==1){
				$success=false;
				$error['makh']="Mã KH vừa có người khác nhập vào, vui lòng nhập lại";
			}
/*
			if ($hoten==NULL) {
				$success=false;
				$error['hoten']="Bạn chưa nhập họ tên";
			}

			if ($congty==NULL) {
				$success=false;
				$error['congty']="Bạn chưa nhập tên công ty";
			}

			if ($sodt==NULL) {
				$success=false;
				$error['sodt']="Bạn chưa nhập số điện thoại";
			}
*/
			elseif(preg_match("/^[0-9]+$/", $sodt)==false)
			{
				$success=false;
				$error['sodt']="Số điện thoại chỉ bao gồm số";
			}
			elseif((mysql_num_rows($this->check_mobile($sodt)))==1)
			{
					$row_dt=mysql_fetch_assoc($this->check_mobile($sodt));
					$idNV=$row_dt['idNV'];
					$nv=$this->user_detail($idNV);
					$row_nv=mysql_fetch_assoc($nv);
					$HT=$row_nv['HoTen'];
					$success=false;
					$error['sodt']="Khách hàng này đã có, thuộc quyền quản lí của $HT";
			}
			
			if($sodt1!=NULL)
			{
				if(preg_match("/^[0-9]+$/", $sodt1)==false)
				{
					$success=false;
					$error['sodt1']="Số điện thoại chỉ bao gồm số";
				}
				elseif((mysql_num_rows($this->check_mobile($sodt1)))==1)
				{
					$row_dt1=mysql_fetch_assoc($this->check_mobile($sodt1));
					$idNV1=$row_dt1['idNV'];
					$nv1=$this->user_detail($idNV1);
					$row_nv1=mysql_fetch_assoc($nv1);
					$HT1=$row_nv1['HoTen'];
					$success=false;
					$error['sodt1']="Khách hàng này đã có, thuộc quyền quản lí của $HT1";
				}
			}
			
			if($email!=NULL)
			{
				if (filter_var($email,FILTER_VALIDATE_EMAIL)==false) {
					$success=false;
					$error['email']="Bạn nhập email không đúng";
				}
			}
			
			if($email1!=NULL)
			{
				if (filter_var($email1,FILTER_VALIDATE_EMAIL)==false) {
					$success=false;
					$error['email1']="Bạn nhập email không đúng";
				}
			}
			/*
			if ($duan==NULL) {
				$success=false;
				$error['duan']="Bạn chưa nhập tên dự án";
			}
*/
			settype($chucvu, "int");
			settype($loaikh, "int");
			settype($tinhtrang, "int");
			settype($nv, "int");
/*
			if ($chucvu==0) {
				$success=false;
				$error['chucvu']="Bạn chưa chọn chức vụ";
			}

			if ($loaikh==0) {
				$success=false;
				$error['loaikh']="Bạn chưa chọn loại khách hàng";
			}

			if ($tinhtrang==0) {
				$success=false;
				$error['tinhtrang']="Bạn chưa chọn tình trạng";
			}
*/
			if($success==true)
			{
				$sql="INSERT INTO khachhang (MaKH,HoTen,CongTy,idCV,SoDT,SoDT1,Email,Email1,DiaChi,idLKH,TenDuAn,idTT,idNV) VALUES ('$makh','$hoten','$congty',$chucvu,'$sodt','$sodt1','$email','$email1','$diachi',$loaikh,'$duan',$tinhtrang,$nv)";
				mysql_query($sql) or die(mysql_error());
			}

			return $success;
		}

		function customer_edit($idKH,&$error){
			$success=true;

			$hoten=$_POST['hoten'];
			$congty=$_POST['congty'];
			$chucvu=$_POST['chucvu'];
			$email=$_POST['email'];
			$email1=$_POST['email1'];
			$diachi=$_POST['diachi'];
			$loaikh=$_POST['loaikh'];
			$duan=$_POST['duan'];
			$ghichu=$_POST['ghichu'];
			$tinhtrang=$_POST['tinhtrang'];
			if(isset($_POST['chuyenkh']))
				$idNV=$_POST['chuyenkh'];
			else 
				$idNV=$_POST['nv'];
			$hoten=trim(strip_tags($hoten));
			$congty=trim(strip_tags($congty));
			$email=trim(strip_tags($email));
			$email1=trim(strip_tags($email1));
			$diachi=trim(strip_tags($diachi));
			$duan=trim(strip_tags($duan));
			$ghichu=trim(strip_tags($ghichu));

			if (get_magic_quotes_gpc()==false) {
				$hoten=mysql_real_escape_string($hoten);
				$congty=mysql_real_escape_string($congty);
				$email=mysql_real_escape_string($email);
				$email1=mysql_real_escape_string($email1);
				$diachi=mysql_real_escape_string($diachi);
				$duan=mysql_real_escape_string($duan);
				$ghichu=mysql_real_escape_string($ghichu);
			}

/*
			if ($hoten==NULL) {
				$success=false;
				$error['hoten']="Bạn chưa nhập họ tên";
			}

			if ($congty==NULL) {
				$success=false;
				$error['congty']="Bạn chưa nhập tên công ty";
			}		
*/			
			if($email!=NULL)
			{
				if (filter_var($email,FILTER_VALIDATE_EMAIL)==false) {
					$success=false;
					$error['email']="Bạn nhập email không đúng";
				}
			}
			
			if($email1!=NULL)
			{
				if (filter_var($email1,FILTER_VALIDATE_EMAIL)==false) {
					$success=false;
					$error['email1']="Bạn nhập email không đúng";
				}
			}
/*
			if ($duan==NULL) {
				$success=false;
				$error['duan']="Bạn chưa nhập tên dự án";
			}
*/
			settype($chucvu, "int");
			settype($loaikh, "int");
			settype($tinhtrang, "int");
			settype($idNV, "int");
/*
			if ($chucvu==0) {
				$success=false;
				$error['chucvu']="Bạn chưa chọn chức vụ";
			}

			if ($loaikh==0) {
				$success=false;
				$error['loaikh']="Bạn chưa chọn loại khách hàng";
			}

			if ($chucvu==0) {
				$success=false;
				$error['tinhtrang']="Bạn chưa chọn tình trạng";
			}
*/
			if($success==true)
			{
				$sql="UPDATE khachhang SET HoTen='$hoten',CongTy='$congty',idCV=$chucvu,Email='$email',Email1='$email1',DiaChi='$diachi',idLKH=$loaikh,TenDuAn='$duan',GhiChu='$ghichu',idTT=$tinhtrang,idNV=$idNV WHERE idKH=$idKH";
				//echo $sql; exit();
				mysql_query($sql) or die(mysql_error());
			}

			return $success;
		}

		function customer_del($idKH){
			$sql="DELETE FROM khachhang WHERE idKH=$idKH";
			mysql_query($sql) or die(mysql_error());
		}

		function customer_last()
		{
			$sql="SELECT MaKH FROM khachhang ORDER BY idKH DESC LIMIT 0,1";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;	
		}
		
		function move_customer($idNV_From,$idNV_To)
		{
			$ghichu=$this->staff_detail($idNV_From);
			$row_ghichu=mysql_fetch_assoc($ghichu);
			$sql="UPDATE khachhang SET idNV=$idNV_To,GhiChu='From: $row_ghichu[HoTen] (Khách hàng này đã xóa)' WHERE idNV=$idNV_From";
			mysql_query($sql) or die(mysql_error());
		}
		/*------END-CUSTOMER-----*/

		/*------DUTY-----*/
		function duty_list(){
			$sql="SELECT * FROM chucvu";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}

		function duty_detail($idCV){
			$sql="SELECT * FROM chucvu WHERE idCV=$idCV";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		/*------END-DUTY-----*/

		/*------CUSTOMER-TYPE-----*/
		function customer_type_list(){
			$sql="SELECT * FROM loaikh";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}

		function customer_type_detail($idLKH){
			$sql="SELECT * FROM loaikh WHERE idLKH=$idLKH";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		/*------END-CUSTOMER-TYPE-----*/
		function status_list(){
			$sql="SELECT * FROM tinhtrang";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}

		function status_detail($idTT){
			$sql="SELECT * FROM tinhtrang WHERE idTT=$idTT";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		/*------USER-----*/
		
		function staff_list_lv1()
		{
			$sql="SELECT idNV,HoTen FROM nhanvien WHERE idNhom=1";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function staff_list_lv2()
		{
			$sql="SELECT idNV,HoTen FROM nhanvien WHERE idNhom=2";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function staff_list_lv3()
		{
			$sql="SELECT idNV,HoTen FROM nhanvien WHERE idNhom=3";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function user_detail($idUser)
		{
			$sql="SELECT * FROM nhanvien WHERE idNV=$idUser";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function staff_add(&$error){
			$success=true;

			$hoten=$_POST['hoten'];
			$ngaysinh=$_POST['ngaysinh'];
	
			$chucvu=$_POST['chucvu'];
			$sodt=$_POST['dienthoai'];
			$email=$_POST['email'];
			$phanquyen=$_POST['phanquyen'];
			
			$hoten=trim(strip_tags($hoten));
			$ngaysinh=trim(strip_tags($ngaysinh));
			$sodt=trim(strip_tags($sodt));
			$email=trim(strip_tags($email));

			if (get_magic_quotes_gpc()==false) {
				$hoten=mysql_real_escape_string($hoten);
				$ngaysinh=mysql_real_escape_string($ngaysinh);
				$sodt=mysql_real_escape_string($sodt);
				$email=mysql_real_escape_string($email);
			}

			if ($hoten==NULL) {
				$success=false;
				$error['hoten']="Bạn chưa nhập họ tên";
			}
			
			$ngaysinh_arr=explode("/",$ngaysinh);
			
			if ($ngaysinh==NULL) {
				$success=false;
				$error['ngaysinh']="Bạn chưa nhập tên ngày sinh";
			}
			
			if(count($ngaysinh_arr)==3)
			{
				$d=$ngaysinh_arr[0];	
				$m=$ngaysinh_arr[1];
				$y=$ngaysinh_arr[2];
			
				if(checkdate($m,$d,$y)==true)
					$ngaysinh=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['ngaysinh']="Ngày sinh không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['ngaysinh']="Ngày sinh không hợp lệ";
			}

			if ($sodt==NULL) {
				$success=false;
				$error['dienthoai']="Bạn chưa nhập số điện thoại";
			}

			if ($email==NULL) {
				$success=false;
				$error['email']="Bạn chưa nhập email";
			}
			elseif (filter_var($email,FILTER_VALIDATE_EMAIL)==false) {
				$success=false;
				$error['email']="Bạn nhập email không đúng";
			}


			settype($chucvu, "int");
			
			settype($phanquyen, "int");

			if ($chucvu==0) {
				$success=false;
				$error['chucvu']="Bạn chưa chọn chức vụ";
			}

		
			if ($phanquyen==0) {
				$success=false;
				$error['phanquyen']="Bạn chưa phân quyền";
			}
			
			$password=sha1(truongphu);

			if($success==true)
			{
				$sql="INSERT INTO nhanvien (HoTen,NgaySinh,SoDT,Email,idCV,idNhom,TinhTrang,Password) VALUES ('$hoten','$ngaysinh','$sodt','$email',$chucvu,$phanquyen,1,'$password')";
				mysql_query($sql) or die(mysql_error());
			}

			return $success;
		}
		
		function staff_edit($idUser,&$error){
			$success=true;

			$hoten=$_POST['hoten'];
			$ngaysinh=$_POST['ngaysinh'];	
			$sodt=$_POST['dienthoai'];

			
			$hoten=trim(strip_tags($hoten));
			$ngaysinh=trim(strip_tags($ngaysinh));
			$sodt=trim(strip_tags($sodt));
			
			if (get_magic_quotes_gpc()==false) {
				$hoten=mysql_real_escape_string($hoten);
				$ngaysinh=mysql_real_escape_string($ngaysinh);
				$sodt=mysql_real_escape_string($sodt);
			}

			if ($hoten==NULL) {
				$success=false;
				$error['hoten']="Bạn chưa nhập họ tên";
			}
			
			$ngaysinh_arr=explode("/",$ngaysinh);
			
			if ($ngaysinh==NULL) {
				$success=false;
				$error['ngaysinh']="Bạn chưa nhập tên ngày sinh";
			}
			
			if(count($ngaysinh_arr)==3)
			{
				$d=$ngaysinh_arr[0];	
				$m=$ngaysinh_arr[1];
				$y=$ngaysinh_arr[2];
			
				if(checkdate($m,$d,$y)==true)
					$ngaysinh=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['ngaysinh']="Ngày sinh không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['ngaysinh']="Ngày sinh không hợp lệ";
			}

			if ($sodt==NULL) {
				$success=false;
				$error['dienthoai']="Bạn chưa nhập số điện thoại";
			}

			if($success==true)
			{
				$sql="UPDATE nhanvien SET HoTen='$hoten',NgaySinh='$ngaysinh',SoDT='$sodt' WHERE idNV=$idUser";
				mysql_query($sql) or die(mysql_error());
			}

			return $success;
		}
		
		function staff_list($idParent)
		{
			$sql="SELECT * FROM nhanvien WHERE idParent=$idParent";	
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function staff_list_all($idNV)
		{
			$sql="SELECT idNV,HoTen,idNhom FROM nhanvien WHERE idNV<>$idNV ORDER BY idNhom ASC ";	
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function staff_list_nv($idNV)
		{
			$sql="SELECT idNV,HoTen,idNhom FROM nhanvien WHERE idNV<>$idNV AND (idNhom=2 OR idNhom=3) ORDER BY idNhom ASC";	
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
			
		function staff_detail($idUser)
		{
			$sql="SELECT * FROM nhanvien WHERE idNV=$idUser";	
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function belong_to()
		{
			$sql="SELECT * FROM nhanvien WHERE idNhom=1 OR idNhom=2";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function staff_del($idNV)
		{
			$sql="DELETE FROM nhanvien WHERE idNV=$idNV";	
			mysql_query($sql) or die(mysql_error());
		}
		
		/*------END-USER-----*/
		/*------GROUP-----*/
		function group_list(){
			$sql="SELECT * FROM nhom";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		/*------END-GROUP-----*/
		/*------CHANGE-PASS-----*/
		function check_pass($idUser,$oldPass)
		{
			$oldPass=sha1($oldPass);
			$sql="SELECT * FROM nhanvien WHERE idNV=$idUser AND Password='$oldPass'";
			$re=mysql_query($sql) or die(mysql_error());
			$n=mysql_num_rows($re);
			if($n==1)
				return true;
			else	
				return false;
		}
		
		function change_pass($idUser,&$error)
		{
			$success=true;
			$oldPass=$_POST['old-pass'];
			$newPass=$_POST['new-pass'];		
			$newPass1=$_POST['new-pass-1'];
			
			trim(strip_tags($oldPass));
			trim(strip_tags($newPass));	
			trim(strip_tags($newPass1));	
			
			if(get_magic_quotes_gpc()==false)
			{
				$oldPass=mysql_real_escape_string($oldPass);
				$newPass=mysql_real_escape_string($newPass);	
				$newPass1=mysql_real_escape_string($newPass1);		
			}
			
			if($oldPass=="")
			{
				$success=false;
				$error['oldpass']="Bạn chưa nhập password cũ";
			}
			elseif($this->check_pass($idUser,$oldPass)==false)
			{
				$success=false;
				$error['oldpass']="Bạn nhập sai password cũ";	
			}	
			
			if($newPass=="")
			{
				$success=false;
				$error['newpass']="Bạn chưa nhập password mới";
			}
			elseif(strlen($newPass)<=6)
			{
				$success=false;
				$error['newpass']="Password phải lớn hơn 6 kí tự";
			}
			
			if($newPass1=="")
			{
				$success=false;
				$error['newpass1']="Bạn chưa nhập lại password mới";
			}
			elseif($newPass1!=$newPass)
			{
				$success=false;
				$error['newpass1']="Password mới không trùng nhau";	
			}
			
			$newPass1=sha1($newPass1);
			
			if($success==true)
			{
				$sql="UPDATE nhanvien SET Password='$newPass1' WHERE idNV=$idUser";
				mysql_query($sql) or die(mysql_error());	
			}
			return $success;
		}
		/*------END-CHANGE-PASS-----*/
	}
?>