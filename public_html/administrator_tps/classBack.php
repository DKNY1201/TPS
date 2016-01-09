<?
	/**
	* Class Back kết nối database dùng cho trang Backend
	*/
	class back
	{
		PUBLIC $con=NULL;
		PUBLIC $host="localhost";
		PUBLIC $username="truongph_quytv";
		PUBLIC $pass="123@123a";
		PUBLIC $database="truongph_truongphu";
		function __construct()
		{
			$this->con=mysql_connect($this->host,$this->username,$this->pass);
			mysql_select_db($this->database);
			mysql_query("set names 'utf8'");
		}
		/*------GENERAL-----*/
		function changeTitle($str){
			$str = $this->stripUnicode($str);
			$str = str_replace("?","",$str);
			$str = str_replace("&","",$str);
			$str = str_replace("'","",$str);
			$str = str_replace("/","",$str);
			$str = str_replace(",","",$str);
			$str = str_replace(".","",$str);
			$str = str_replace("+","",$str);		
			$str = str_replace("  "," ",$str);
			$str = trim($str);
			$str = mb_convert_case($str , MB_CASE_TITLE , 'utf-8');
		// MB_CASE_UPPER/MB_CASE_TITLE/MB_CASE_LOWER
			$str = str_replace(" ","-",$str);	
			return $str;
		}
	
		function stripUnicode($str){
			if(!$str) return false;
			$unicode = array(
			 'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
			 'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
			 'd'=>'đ',
			 'D'=>'Đ',
			 'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
			 'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			 'i'=>'í|ì|ỉ|ĩ|ị',	  
			 'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
			 'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
			 'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			 'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			 'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			 'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
			 'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
			);
			foreach($unicode as $khongdau=>$codau) {
			  $arr = explode("|",$codau);
			  $str = str_replace($arr,$khongdau,$str);
			}
			return $str;
		}
		
		function rutgonchuoi($noidung,$num)
		{        
				$limit = $num - 1 ;
				$str_tmp = '';
				$arrstr = explode(" ", $noidung);
				if ( count($arrstr) <= $num ) {
					if (strlen($noidung)>(9*$num))
						return substr($noidung,0,(9*$num))."...";
					else
						return $noidung; 
				}
				if (!empty($arrstr))
				{
					for ( $j=0; $j< count($arrstr) ; $j++)
					{
						$str_tmp .= " " . $arrstr[$j];
						if ($j == $limit)
						{  break; }
					}
				}
				if (strlen($str_tmp)>9*$num)
					{
						return substr($str_tmp,0,9*$num)."...";
					}
				return $str_tmp."...";
		}
		
		/*----- NEWS ----- */
		function addNewsType(){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			$name_vn=trim(strip_tags($name_vn));
			$name_en=trim(strip_tags($name_en));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
			}
			$sql="INSERT INTO news_type (name_vn,name_en,url,thutu,anhien) VALUES ('$name_vn','$name_en','$url',$thutu,$anhien)";
			mysql_query($sql) or die(mysql_error());
		}//end addNewsType
		
		function editNewsType($idNT){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			$name_vn=trim(strip_tags($name_vn));
			$name_en=trim(strip_tags($name_en));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
			}
			
			$sql="UPDATE news_type SET name_vn='$name_vn',name_en='$name_en',url='$url',thutu=$thutu,anhien=$anhien WHERE idNT=$idNT";
			mysql_query($sql) or die(mysql_error());			
		}//end editNewsType
		
		function listNewsType(){
			$sql="SELECT * FROM news_type ORDER BY thutu ASC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;			
		}//end listNewsType
		
		function delNewsType($idNT){
			$sql="DELETE FROM news_type WHERE idNT=$idNT";
			mysql_query($sql) or die(mysql_error());
		}//end delNewsType
		
		function detailNewsType($idNT){
			$sql="SELECT * FROM news_type WHERE idNT=$idNT";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailNewsType
		
		function addNews(&$error){
			$success=true;
			$news_type=$_POST['news_type'];
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$sum_vn=$_POST['sum_vn'];
			$sum_en=$_POST['sum_en'];
			$content_vn=$_POST['content_vn'];
			$content_en=$_POST['content_en'];
			$date=$_POST['date'];			
			$feature=$_POST['feature'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];
			
			settype($news_type,"int");
			settype($feature,"int");
			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			trim(strip_tags($date));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
				$date=mysql_real_escape_string($date);
			}
			$date_arr=explode("/",$date);
			if(count($date_arr)==3)
			{
				$d=$date_arr[0];	
				$m=$date_arr[1];
				$y=$date_arr[2];
				if(checkdate($m,$d,$y)==true)
					$date=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['date']="Ngày đăng tin không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['date']="Ngày đăng tin không hợp lệ";
			}
			
			if($success==true)
			{
				$sql="INSERT INTO news (idNT,name_vn,name_en,url,img,sum_vn,sum_en,content_vn,content_en,date,feature,hits,thutu,anhien) VALUES ($news_type,'$name_vn','$name_en','$url','$img','$sum_vn','$sum_en','$content_vn','$content_en','$date',$feature,0,$thutu,$anhien)";
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}//end addNews
		
		function editNews($idNews){
			$success=true;
			$news_type=$_POST['news_type'];
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$sum_vn=$_POST['sum_vn'];
			$sum_en=$_POST['sum_en'];
			$content_vn=$_POST['content_vn'];
			$content_en=$_POST['content_en'];
			$date=$_POST['date'];			
			$feature=$_POST['feature'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];
			
			settype($news_type,"int");
			settype($feature,"int");
			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			trim(strip_tags($date));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
				$date=mysql_real_escape_string($date);
			}
			$date_arr=explode("/",$date);
			if(count($date_arr)==3)
			{
				$d=$date_arr[0];	
				$m=$date_arr[1];
				$y=$date_arr[2];
				if(checkdate($m,$d,$y)==true)
					$date=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['date']="Ngày đăng tin không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['date']="Ngày đăng tin không hợp lệ";
			}
			
			if($success==true)
			{
				$sql="UPDATE news SET idNT=$news_type,name_vn='$name_vn',name_en='$name_en',url='$url',img='$img',sum_vn='$sum_vn',sum_en='$sum_en',content_vn='$content_vn',content_en='$content_en',date='$date',feature=$feature,thutu=$thutu,anhien=$anhien WHERE idNews=$idNews";
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}//end editNews
		
		function listNews(){
			$sql="SELECT * FROM news ORDER BY idNews DESC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}//end listNews
		
		function detailNews($idNews){
			$sql="SELECT * FROM news WHERE idNews=$idNews";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailNews
		
		function delNews($idNews){
			$sql="DELETE FROM news WHERE idNews=$idNews";
			mysql_query($sql) or die(mysql_error());
		}//end delNews
		
		/*----- PROJECT ----- */
		function listProjectType(){
			$sql="SELECT * FROM project_type ORDER BY thutu ASC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end listProjectType
		
		function detailProjectType($idPT){
			$sql="SELECT * FROM project_type WHERE idPT=$idPT";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailProjectType
		
		function addProjectType(){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
			}
			
			$sql="INSERT INTO project_type (name_vn,name_en,url,thutu,anhien) VALUES ('$name_vn','$name_en','$url',$thutu,$anhien)";
			mysql_query($sql) or die(mysql_error());
		}// end addProjectType
		
		function editProjectType($idPT){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
			}
			
			$sql="UPDATE project_type SET name_vn='$name_vn',name_en='$name_en',url='$url',thutu=$thutu,anhien=$anhien WHERE idPT=$idPT";
			mysql_query($sql) or die(mysql_error());
		} // end editProjectType
		
		function delProjectType($idPT){
			$sql="DELETE FROM project_type WHERE idPT=$idPT";
			mysql_query($sql) or die(mysql_error());
		}// end delProjectType
		
		function listProjectTag(){
			$sql="SELECT * FROM project_tag WHERE anhien=1 ORDER BY thutu ASC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end listProjectTag
		
		function addProject(&$error){
			$success=true;
			$project_type=$_POST['project_type'];
			$tag=$_POST['tag'];
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$location_vn=$_POST['location_vn'];
			$location_en=$_POST['location_en'];
			$national_vn=$_POST['national_vn'];
			$national_en=$_POST['national_en'];
			$investor_vn=$_POST['investor_vn'];
			$investor_en=$_POST['investor_en'];
			$scale=$_POST['scale'];
			$date=date("Y-m-d H:i:s");
			$year=$_POST['year'];
			$feature=$_POST['feature'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];
			
			settype($project_type,"int");
			settype($tag,"int");
			settype($feature,"int");
			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			trim(strip_tags($location_vn));
			trim(strip_tags($location_en));
			trim(strip_tags($national_vn));
			trim(strip_tags($national_en));
			trim(strip_tags($investor_vn));
			trim(strip_tags($investor_en));
			trim(strip_tags($scale));
			trim(strip_tags($year));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
				$location_vn=mysql_real_escape_string($location_vn);
				$location_en=mysql_real_escape_string($location_en);
				$national_vn=mysql_real_escape_string($national_vn);
				$national_en=mysql_real_escape_string($national_en);
				$investor_vn=mysql_real_escape_string($investor_vn);
				$investor_en=mysql_real_escape_string($investor_en);
				$scale=mysql_real_escape_string($scale);
				$year=mysql_real_escape_string($year);
			}
			$year_arr=explode("/",$year);
			if(count($year_arr)==3)
			{
				$d=$year_arr[0];	
				$m=$year_arr[1];
				$y=$year_arr[2];
				if(checkdate($m,$d,$y)==true)
					$year=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['year']="Ngày hoàn thành không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['year']="Ngày hoàn thành không hợp lệ";
			}
			
			if($success==true)
			{
				$sql="INSERT INTO project (idPT,idTag,name_vn,name_en,url,img,national_vn,national_en,location_vn,location_en,investor_vn,investor_en,scale,date,year,feature,hits,thutu,anhien) VALUES ($project_type,$tag,'$name_vn','$name_en','$url','$img','$national_vn','$national_en','$location_vn','$location_en','$investor_vn','$investor_en','$scale','$date','$year',$feature,0,$thutu,$anhien)";
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}//end addProject
		
		function editProject($idpr,&$error){
			$success=true;
			$project_type=$_POST['project_type'];
			$tag=$_POST['tag'];
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$location_vn=$_POST['location_vn'];
			$location_en=$_POST['location_en'];
			$national_vn=$_POST['national_vn'];
			$national_en=$_POST['national_en'];
			$investor_vn=$_POST['investor_vn'];
			$investor_en=$_POST['investor_en'];
			$scale=$_POST['scale'];
			$date=date("Y-m-d H:i:s");
			$year=$_POST['year'];
			$feature=$_POST['feature'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];
			
			settype($project_type,"int");
			settype($tag,"int");
			settype($feature,"int");
			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			trim(strip_tags($location_vn));
			trim(strip_tags($location_en));
			trim(strip_tags($national_vn));
			trim(strip_tags($national_en));
			trim(strip_tags($investor_vn));
			trim(strip_tags($investor_en));
			trim(strip_tags($scale));
			trim(strip_tags($year));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
				$national_vn=mysql_real_escape_string($national_vn);
				$national_en=mysql_real_escape_string($national_en);
				$location_vn=mysql_real_escape_string($location_vn);
				$location_en=mysql_real_escape_string($location_en);
				$investor_vn=mysql_real_escape_string($investor_vn);
				$investor_en=mysql_real_escape_string($investor_en);
				$scale=mysql_real_escape_string($scale);
				$year=mysql_real_escape_string($year);
			}
			$year_arr=explode("/",$year);
			if(count($year_arr)==3)
			{
				$d=$year_arr[0];	
				$m=$year_arr[1];
				$y=$year_arr[2];
				if(checkdate($m,$d,$y)==true)
					$year=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['year']="Ngày hoàn thành không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['year']="Ngày hoàn thành không hợp lệ";
			}
			
			if($success==true)
			{
				$sql="UPDATE project SET idPT=$project_type,idTag=$tag,name_vn='$name_vn',name_en='$name_en',url='$url',img='$img',location_vn='$location_vn',location_en='$location_en',national_vn='$national_vn',national_en='$national_en',investor_vn='$investor_vn',investor_en='$investor_en',scale='$scale',date='$date',year='$year',feature=$feature,thutu=$thutu,anhien=$anhien WHERE idPro=$idpr";
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}//end editProject
		
		function detailProject($idpr){
			$sql="SELECT * FROM project WHERE idPro=$idpr";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function listProject(){
			$sql="SELECT * FROM project ORDER BY idPro DESC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}//end listProject
		
		function delProject($idpr){
			$sql="DELETE FROM project WHERE idPro=$idpr";
			mysql_query($sql) or die(mysql_error());
		}//end delProject
		
		function listProjectImg($idPro){
			$sql="SELECT * FROM project_img WHERE idPro=$idPro AND anhien=1 ORDER BY thutu ASC ";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}//end listProjectImg
		
		function addProjectImg($idPro,$amount){
			for($i=1;$i<=$amount;$i++)
			{
				$url_large=$_POST['imgLarge_'.$i];
				$url_small=$_POST['imgSmall_'.$i];
				trim(strip_tags($url_large));
				trim(strip_tags($url_small));
				if(get_magic_quotes_gpc()==false)
				{
					$url_large=mysql_real_escape_string($url_large);
					$url_small=mysql_real_escape_string($url_small);	
				}
				
				$sql="INSERT INTO project_img (idPro,url_large,url_small,thutu,anhien) VALUES ($idPro,'$url_large','$url_small',$i,1)";
				mysql_query($sql) or die(mysql_error());
			}
		}//end addProjectImg
		
		function delProjectImg($idImg){
			$sql="DELETE FROM project_img WHERE idImg=$idImg";
			mysql_query($sql) or die(mysql_error());
		}//end delProject
		
		/* ----- HR ----- */
		function listHR(){
			$sql="SELECT * FROM hr ORDER BY thutu ASC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end listHR
		
		function addHR($error){
			$success=true;
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$content_vn=$_POST['content_vn'];
			$content_en=$_POST['content_en'];
			$date=$_POST['date'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
			}
			
			$date_arr=explode("/",$date);
			if(count($date_arr)==3)
			{
				$d=$date_arr[0];	
				$m=$date_arr[1];
				$y=$date_arr[2];
				if(checkdate($m,$d,$y)==true)
					$date=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['date']="Ngày đăng tin không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['date']="Ngày đăng tin không hợp lệ";
			}
			$idUser=$_SESSION['id'];
			if($success==true){
				$sql="INSERT INTO hr (idUser,name_vn,name_en,url,content_vn,content_en,date,thutu,anhien) VALUES ($idUser,'$name_vn','$name_en','$url','$content_vn','$content_en','$date',$thutu,$anhien)";
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}// end addHR
		
		function editHR($idHR,$error){
			$success=true;
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$content_vn=$_POST['content_vn'];
			$content_en=$_POST['content_en'];
			$date=$_POST['date'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
			}
			
			$date_arr=explode("/",$date);
			if(count($date_arr)==3)
			{
				$d=$date_arr[0];	
				$m=$date_arr[1];
				$y=$date_arr[2];
				if(checkdate($m,$d,$y)==true)
					$date=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['date']="Ngày đăng tin không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['date']="Ngày đăng tin không hợp lệ";
			}
			$idUser=$_SESSION['id'];
			if($success==true){
				$sql="UPDATE hr SET idUser=$idUser,name_vn='$name_vn',name_en='$name_en',url='$url',content_vn='$content_vn',content_en='$content_en',date='$date',thutu=$thutu,anhien=$anhien WHERE idHR=$idHR";
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}// end editHR
		
		function detailHR($idHR){
			$sql="SELECT * FROM hr WHERE idHR=$idHR AND anhien=1";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailHR
		
		function delHR($idHR){
			$sql="DELETE FROM hr WHERE idHR=$idHR";
			mysql_query($sql) or die(mysql_error());
		}// end delHR
		
		/* ----- INTRODUTION ----- */
		function listIntroduction_Back(){
			$sql="SELECT * FROM introduction ORDER BY thutu ASC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end listIntrodution_Back
		
		function addIntroduction($error){
			$success=true;
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$content_vn=$_POST['content_vn'];
			$content_en=$_POST['content_en'];
			$date=$_POST['date'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
			}
			
			$date_arr=explode("/",$date);
			if(count($date_arr)==3)
			{
				$d=$date_arr[0];	
				$m=$date_arr[1];
				$y=$date_arr[2];
				if(checkdate($m,$d,$y)==true)
					$date=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['date']="Ngày đăng tin không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['date']="Ngày đăng tin không hợp lệ";
			}
			$idUser=$_SESSION['id'];
			if($success==true){
				$sql="INSERT INTO introduction (idUser,name_vn,name_en,url,content_vn,content_en,date,thutu,anhien) VALUES ($idUser,'$name_vn','$name_en','$url','$content_vn','$content_en','$date',$thutu,$anhien)";
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}// end addIntrodution
		
		function editIntroduction($idIT,$error){
			$success=true;
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$content_vn=$_POST['content_vn'];
			$content_en=$_POST['content_en'];
			$date=$_POST['date'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
			}
			
			$date_arr=explode("/",$date);
			if(count($date_arr)==3)
			{
				$d=$date_arr[0];	
				$m=$date_arr[1];
				$y=$date_arr[2];
				if(checkdate($m,$d,$y)==true)
					$date=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['date']="Ngày đăng tin không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['date']="Ngày đăng tin không hợp lệ";
			}
			$idUser=$_SESSION['id'];
			if($success==true){
				$sql="UPDATE introduction SET idUser=$idUser,name_vn='$name_vn',name_en='$name_en',url='$url',content_vn='$content_vn',content_en='$content_en',date='$date',thutu=$thutu,anhien=$anhien WHERE idIT=$idIT";
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}// end editIntrodution
		
		function detailIntroduction($idIT){
			$sql="SELECT * FROM introduction WHERE idIT=$idIT";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailIntroduction
		
		function delIntroduction($idIT){
			$sql="DELETE FROM introduction WHERE idIT=$idIT";
			mysql_query($sql) or die(mysql_error());
		}// end delIntroduction
		
		/* ----- PRODUCT ----- */
		function listProduct(){
			$sql="SELECT * FROM product ORDER BY thutu ASC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end listProduct
		
		function addProduct($error){
			$success=true;
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$content_vn=$_POST['content_vn'];
			$content_en=$_POST['content_en'];
			$date=$_POST['date'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			
			$date_arr=explode("/",$date);
			if(count($date_arr)==3)
			{
				$d=$date_arr[0];	
				$m=$date_arr[1];
				$y=$date_arr[2];
				if(checkdate($m,$d,$y)==true)
					$date=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['date']="Ngày đăng tin không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['date']="Ngày đăng tin không hợp lệ";
			}
			$idUser=$_SESSION['id'];
			if($success==true){
				$sql="INSERT INTO product (idUser,name_vn,name_en,url,img,content_vn,content_en,date,thutu,anhien) VALUES ($idUser,'$name_vn','$name_en','$url','$img','$content_vn','$content_en','$date',$thutu,$anhien)";
				
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}// end addProduct
		
		function editProduct($idPr,$error){
			$success=true;
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$content_vn=$_POST['content_vn'];
			$content_en=$_POST['content_en'];
			$date=$_POST['date'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			
			$date_arr=explode("/",$date);
			if(count($date_arr)==3)
			{
				$d=$date_arr[0];	
				$m=$date_arr[1];
				$y=$date_arr[2];
				if(checkdate($m,$d,$y)==true)
					$date=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['date']="Ngày đăng tin không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['date']="Ngày đăng tin không hợp lệ";
			}
			$idUser=$_SESSION['id'];
			if($success==true){
				$sql="UPDATE product SET idUser=$idUser,name_vn='$name_vn',name_en='$name_en',url='$url',img='$img',content_vn='$content_vn',content_en='$content_en',date='$date',thutu=$thutu,anhien=$anhien WHERE idPr=$idPr";
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}// end editProduct
		
		function detailProduct($idPr){
			$sql="SELECT * FROM product WHERE idPr=$idPr AND anhien=1";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailProduct
		
		function delProduct($idPr){
			$sql="DELETE FROM product WHERE idPr=$idPr";
			mysql_query($sql) or die(mysql_error());
		}// end delProduct
		
		/* ----- CLIENT REVIEW ----- */
		function listClientReview(){
			$sql="SELECT * FROM client_review ORDER BY thutu DESC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}

		function addClientReview(){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			$sql="INSERT INTO client_review (name_vn,name_en,url,img,thutu,anhien) VALUES ('$name_vn','$name_en','$url','$img',$thutu,$anhien)";
			mysql_query($sql) or die(mysql_error());
		}// end addCLientReview

		function editClientReview($idCR){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			$sql="UPDATE client_review SET name_vn='$name_vn',name_en='$name_en',url='$url',img='$img',thutu=$thutu,anhien=$anhien WHERE idCR=$idCR";
			mysql_query($sql) or die(mysql_error());
		}// end editCLientReview

		function detailClientReview($idCR){
			$sql="SELECT * FROM client_review WHERE idCR=$idCR AND AnHien=1";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailClientReview
		
		function delClientReview($idCR){
			$sql="DELETE FROM client_review WHERE idCR=$idCR";
			mysql_query($sql) or die(mysql_error());
		}// end delCLientReview
		
		/* ----- CERTIFICATE & AWARD ----- */
		function listCertificate(){
			$sql="SELECT * FROM certificate ORDER BY thutu DESC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end listCertificate

		function addCertificate(){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			$sql="INSERT INTO certificate (name_vn,name_en,url,img,thutu,anhien) VALUES ('$name_vn','$name_en','$url','$img',$thutu,$anhien)";
			mysql_query($sql) or die(mysql_error());
		}// end addCertificate

		function editCertificate($idCA){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			$sql="UPDATE certificate SET name_vn='$name_vn',name_en='$name_en',url='$url',img='$img',thutu=$thutu,anhien=$anhien WHERE idCA=$idCA";
			echo $sql;
			mysql_query($sql) or die(mysql_error());
		}// end editCLientReview

		function detailCertificate($idCA){
			$sql="SELECT * FROM certificate WHERE idCA=$idCA AND AnHien=1";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailCertificate
		
		function delCertificate($idCA){
			$sql="DELETE FROM certificate WHERE idCA=$idCA";
			mysql_query($sql) or die(mysql_error());
		}// end delCertificate
		
		/* ----- USER ----- */
		function detailUser($idUser){
			$sql="SELECT * FROM users WHERE idUser=$idUser";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailUser
		
		/* ----- IMAGES ----- */
		function listImagesType(){
			$sql="SELECT * FROM images_type ORDER BY thutu ASC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end listImagesType
		
		function addImagesType(){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			$sql="INSERT INTO images_type (name_vn,name_en,url,img,thutu,anhien) VALUES ('$name_vn','$name_en','$url','$img',$thutu,$anhien)";
			mysql_query($sql) or die(mysql_error());
		}// end addImagesType
		
		function editImagesType($idImgType){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			$sql="UPDATE images_type SET name_vn='$name_vn',name_en='$name_en',url='$url',img='$img',thutu=$thutu,anhien=$anhien WHERE idImgType=$idImgType";
			mysql_query($sql) or die(mysql_error());
		}// end editImagesType

		function detailImagesType($idImgType){
			$sql="SELECT * FROM images_type WHERE idImgType=$idImgType AND AnHien=1";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailImagesType
		
		function delImagesType($idImgType){
			$sql="DELETE FROM images_type WHERE idImgType=$idImgType";
			mysql_query($sql) or die(mysql_error());
		}// end delImagesType
		
		
		function listImages(){
			$sql="SELECT * FROM images ORDER BY thutu ASC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end listImagesType
		
		function addImages(){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$it=$_POST['images_type'];
			$img=$_POST['img'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			settype($it,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			$sql="INSERT INTO images (name_vn,name_en,idImgType,img,thutu,anhien) VALUES ('$name_vn','$name_en',$it,'$img',$thutu,$anhien)";
			mysql_query($sql) or die(mysql_error());
		}// end addImages
		
		function editImages($idImg){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$it=$_POST['images_type'];
			$img=$_POST['img'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			settype($it,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			$sql="UPDATE images SET name_vn='$name_vn',name_en='$name_en',idImgType=$it,img='$img',thutu=$thutu,anhien=$anhien WHERE idImg=$idImg";
			mysql_query($sql) or die(mysql_error());
		}// end editImages

		function detailImages($idImg){
			$sql="SELECT * FROM images WHERE idImg=$idImg AND AnHien=1";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailImages
		
		function delImages($idImg){
			$sql="DELETE FROM images WHERE idImg=$idImg";
			mysql_query($sql) or die(mysql_error());
		}// end delImages
		
		/*----- DESIGN ----- */
		function listDesignType(){
			$sql="SELECT * FROM design_type ORDER BY thutu ASC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end listDesignType
		
		function detailDesignType($idDT){
			$sql="SELECT * FROM design_type WHERE idDT=$idDT";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailDesignType
		
		function addDesignType(){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			
			$sql="INSERT INTO design_type (name_vn,name_en,url,img,thutu,anhien) VALUES ('$name_vn','$name_en','$url','$img',$thutu,$anhien)";
			mysql_query($sql) or die(mysql_error());
		}// end addDesignType
		
		function editDesignType($idDT){
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			
			$sql="UPDATE design_type SET name_vn='$name_vn',name_en='$name_en',url='$url',img='$img',thutu=$thutu,anhien=$anhien WHERE idDT=$idDT";
			mysql_query($sql) or die(mysql_error());
		} // end editDesignType
		
		function delDesignType($idDT){
			$sql="DELETE FROM design_type WHERE idDT=$idDT";
			mysql_query($sql) or die(mysql_error());
		}// end delDesignType
		
		function listDesign(){
			$sql="SELECT * FROM design ORDER BY thutu ASC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end listDesign
		
		function addDesign($error){
			$success=true;
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$img=$_POST['img'];
			$idDT=$_POST['design_type'];
			$content_vn=$_POST['content_vn'];
			$content_en=$_POST['content_en'];
			$date=$_POST['date'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			settype($idDT,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			
			$date_arr=explode("/",$date);
			if(count($date_arr)==3)
			{
				$d=$date_arr[0];	
				$m=$date_arr[1];
				$y=$date_arr[2];
				if(checkdate($m,$d,$y)==true)
					$date=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['date']="Ngày đăng tin không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['date']="Ngày đăng tin không hợp lệ";
			}
			$idUser=$_SESSION['id'];
			if($success==true){
				$sql="INSERT INTO design (idUser,name_vn,name_en,url,idDT,img,content_vn,content_en,date,thutu,anhien) VALUES ($idUser,'$name_vn','$name_en','$url',$idDT,'$img','$content_vn','$content_en','$date',$thutu,$anhien)";
				
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}// end addDesign
		
		function editDesign($idDe,$error){
			$success=true;
			$name_vn=$_POST['namevn'];
			$name_en=$_POST['nameen'];
			$url=$this->changeTitle($name_vn);
			$idDT=$_POST['design_type'];
			$img=$_POST['img'];
			$content_vn=$_POST['content_vn'];
			$content_en=$_POST['content_en'];
			$date=$_POST['date'];
			$thutu=$_POST['thutu'];
			$anhien=$_POST['anhien'];

			settype($thutu,"int");
			settype($anhien,"int");
			settype($idDT,"int");
			trim(strip_tags($name_vn));
			trim(strip_tags($name_en));
			trim(strip_tags($img));
			if(get_magic_quotes_gpc()==false)
			{
				$name_vn=mysql_real_escape_string($name_vn);
				$name_en=mysql_real_escape_string($name_en);
				$img=mysql_real_escape_string($img);
			}
			
			$date_arr=explode("/",$date);
			if(count($date_arr)==3)
			{
				$d=$date_arr[0];	
				$m=$date_arr[1];
				$y=$date_arr[2];
				if(checkdate($m,$d,$y)==true)
					$date=$y."-".$m."-".$d;
				else
				{
					$success=false;
					$error['date']="Ngày đăng tin không hợp lệ";
				}
			}
			else
			{
				$success=false;
				$error['date']="Ngày đăng tin không hợp lệ";
			}
			$idUser=$_SESSION['id'];
			if($success==true){
				$sql="UPDATE design SET idUser=$idUser,name_vn='$name_vn',name_en='$name_en',url='$url',idDT=$idDT,img='$img',content_vn='$content_vn',content_en='$content_en',date='$date',thutu=$thutu,anhien=$anhien WHERE idDe=$idDe";
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}// end editDesign
		
		function detailDesign($idDe){
			$sql="SELECT * FROM design WHERE idDe=$idDe AND anhien=1";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}// end detailDesign
		
		function delDesign($idDe){
			$sql="DELETE FROM design WHERE idDe=$idDe";
			mysql_query($sql) or die(mysql_error());
		}// end delDesign
		
		/*===== INFO =====*/
		function detailInfo(){
			$sql="SELECT * FROM info WHERE idInfo=1";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function editInfo(){
			$hotline=$_POST['hotline'];
			$email=$_POST['email'];
			$email_dn=$_POST['email_dn'];
			$link_fb=$_POST['link_fb'];
			$link_gg=$_POST['link_gg'];
			$link_yt=$_POST['link_yt'];
			$link_sky=$_POST['link_sky'];
			$link_tw=$_POST['link_tw'];
			$diachi_vp_vn=$_POST['diachi_vp_vn'];
			$diachi_vp_en=$_POST['diachi_vp_en'];
			$diachi_nm_vn=$_POST['diachi_nm_vn'];
			$diachi_nm_en=$_POST['diachi_nm_en'];
			$diachi_dn_vn=$_POST['diachi_dn_vn'];
			$diachi_dn_en=$_POST['diachi_dn_en'];
			$tel_vp=$_POST['tel_vp'];
			$tel_nm=$_POST['tel_nm'];
			$tel_dn=$_POST['tel_dn'];
			$fax_vp=$_POST['fax_vp'];
			$fax_nm=$_POST['fax_nm'];
			$fax_dn=$_POST['fax_dn'];
			
			$hotline=trim(strip_tags($hotline));
			$email=trim(strip_tags($email));
			$email_dn=trim(strip_tags($email_dn));
			$link_fb=trim(strip_tags($link_fb));
			$link_gg=trim(strip_tags($link_gg));
			$link_yt=trim(strip_tags($link_yt));
			$link_sky=trim(strip_tags($link_sky));
			$link_tw=trim(strip_tags($link_tw));
			$diachi_vp_vn=trim(strip_tags($diachi_vp_vn));
			$diachi_vp_en=trim(strip_tags($diachi_vp_en));
			$diachi_nm_vn=trim(strip_tags($diachi_nm_vn));
			$diachi_nm_en=trim(strip_tags($diachi_nm_en));
			$diachi_dn_vn=trim(strip_tags($diachi_dn_vn));
			$diachi_dn_en=trim(strip_tags($diachi_dn_en));
			$tel_vp=trim(strip_tags($tel_vp));
			$tel_nm=trim(strip_tags($tel_nm));
			$tel_dn=trim(strip_tags($tel_dn));
			$fax_vp=trim(strip_tags($fax_vp));
			$fax_nm=trim(strip_tags($fax_nm));
			$fax_dn=trim(strip_tags($fax_dn));
			
			if(get_magic_quotes_gpc()==false){
				$hotline=mysql_real_escape_string($hotline);
				$email=mysql_real_escape_string($email);
				$email_dn=mysql_real_escape_string($email_dn);
				$link_fb=mysql_real_escape_string($link_fb);
				$link_gg=mysql_real_escape_string($link_gg);
				$link_yt=mysql_real_escape_string($link_yt);
				$link_sky=mysql_real_escape_string($link_sky);
				$link_tw=mysql_real_escape_string($link_tw);
				$diachi_vp_vn=mysql_real_escape_string($diachi_vp_vn);
				$diachi_vp_en=mysql_real_escape_string($diachi_vp_en);
				$diachi_nm_vn=mysql_real_escape_string($diachi_nm_vn);
				$diachi_nm_en=mysql_real_escape_string($diachi_nm_en);
				$diachi_dn_vn=mysql_real_escape_string($diachi_dn_vn);
				$diachi_dn_en=mysql_real_escape_string($diachi_dn_en);
				$tel_vp=mysql_real_escape_string($tel_vp);
				$tel_nm=mysql_real_escape_string($tel_nm);
				$tel_dn=mysql_real_escape_string($tel_dn);
				$fax_vp=mysql_real_escape_string($fax_vp);
				$fax_nm=mysql_real_escape_string($fax_nm);
				$fax_dn=mysql_real_escape_string($fax_dn);
			}
			$sql="UPDATE info set hotline='$hotline',email='$email',email_dn='$email_dn',link_fb='$link_fb',link_gg='$link_gg',link_yt='$link_yt',link_sky='$link_sky',link_tw='$link_tw',diachi_vp_vn='$diachi_vp_vn',diachi_vp_en='$diachi_vp_en',diachi_nm_vn='$diachi_nm_vn',diachi_nm_en='$diachi_nm_en',diachi_dn_vn='$diachi_dn_vn',diachi_dn_en='$diachi_dn_en',tel_vp='$tel_vp',tel_nm='$tel_nm',tel_dn='$tel_dn',fax_vp='$fax_vp',fax_nm='$fax_nm',fax_dn='$fax_dn' WHERE idInfo=1";
			mysql_query($sql) or die(mysql_error());
		}
		
		/*============= SLIDER =============*/
		function ListSlider(){
			$sql = "SELECT * FROM slider WHERE isShow = 1 ORDER BY nOrder ASC";
			$re = mysql_query($sql) or die(mysql_error());
			return $re;
		}
		
		function AddSlider(&$error){
			$success=true;
			$background=$_POST['background'];
			$link=$_POST['link'];
			$caption1vn=$_POST['caption1vn'];
			$caption1en=$_POST['caption1en'];
			$caption2vn=$_POST['caption2vn'];
			$caption2en=$_POST['caption2en'];
			$investorvn=$_POST['investorvn'];
			$investoren=$_POST['investoren'];
			$scale=$_POST['scale'];
			$year=$_POST['year'];
			$nOrder=$_POST['nOrder'];
			$isShow=$_POST['isShow'];
			
			settype($scale,"int");
			settype($year,"int");
			settype($nOrder,"int");
			settype($isShow,"int");
			trim(strip_tags($background));
			trim(strip_tags($link));
			trim(strip_tags($caption1vn));
			trim(strip_tags($caption1en));
			trim(strip_tags($caption2vn));
			trim(strip_tags($caption2en));
			trim(strip_tags($investorvn));
			trim(strip_tags($investoren));
			if(get_magic_quotes_gpc()==false)
			{
				$background=mysql_real_escape_string($background);
				$link=mysql_real_escape_string($link);
				$caption1vn=mysql_real_escape_string($caption1vn);
				$caption1en=mysql_real_escape_string($caption1en);
				$caption2vn=mysql_real_escape_string($caption2vn);
				$caption2en=mysql_real_escape_string($caption2en);
				$investorvn=mysql_real_escape_string($investorvn);
				$investoren=mysql_real_escape_string($investoren);
			}
			
			
			if($success==true)
			{
				$sql="INSERT INTO slider (background,link,caption1_vn,caption1_en,caption2_vn,caption2_en,investor_vn,investor_en,scale,year,isShow,nOrder) VALUES ('$background','$link','$caption1vn','$caption1en','$caption2vn','$caption2en','$investorvn','$investoren',$scale,$year,$isShow,$nOrder)";
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}//end AddSlider

		function EditSlider($idSlider,&$error){
			$success=true;
			$background=$_POST['background'];
			$link=$_POST['link'];
			$caption1vn=$_POST['caption1vn'];
			$caption1en=$_POST['caption1en'];
			$caption2vn=$_POST['caption2vn'];
			$caption2en=$_POST['caption2en'];
			$investorvn=$_POST['investorvn'];
			$investoren=$_POST['investoren'];
			$scale=$_POST['scale'];
			$year=$_POST['year'];
			$nOrder=$_POST['nOrder'];
			$isShow=$_POST['isShow'];
			
			settype($scale,"int");
			settype($year,"int");
			settype($nOrder,"int");
			settype($isShow,"int");
			trim(strip_tags($background));
			trim(strip_tags($link));
			trim(strip_tags($caption1vn));
			trim(strip_tags($caption1en));
			trim(strip_tags($caption2vn));
			trim(strip_tags($caption2en));
			trim(strip_tags($investorvn));
			trim(strip_tags($investoren));
			if(get_magic_quotes_gpc()==false)
			{
				$background=mysql_real_escape_string($background);
				$link=mysql_real_escape_string($link);
				$caption1vn=mysql_real_escape_string($caption1vn);
				$caption1en=mysql_real_escape_string($caption1en);
				$caption2vn=mysql_real_escape_string($caption2vn);
				$caption2en=mysql_real_escape_string($caption2en);
				$investorvn=mysql_real_escape_string($investorvn);
				$investoren=mysql_real_escape_string($investoren);
			}
			
			
			if($success==true)
			{
				$sql="UPDATE slider SET background='$background',link='$link',caption1_vn='$caption1vn',caption1_en='$caption1en',caption2_vn='$caption2vn',caption2_en='$caption2en',investor_vn='$investorvn',investor_en='$investoren',scale=$scale,year=$year,isShow=$isShow,nOrder=$nOrder WHERE idSlider = $idSlider";
				mysql_query($sql) or die(mysql_error());
			}
			return $success;
		}//end EditSlider

		function DetailSlider($idSlider){
			$sql = "SELECT * FROM slider WHERE idSlider = $idSlider";
			$re = mysql_query($sql) or die(mysql_error());
			return $re;
		}

		function DelSlider($idSlider){
			$sql = "DELETE FROM slider WHERE idSlider=$idSlider";
			mysql_query($sql) or die(mysql_error());
		}
	}
?>