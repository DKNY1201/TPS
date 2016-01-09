<?

	require_once "administrator_tps/classBack.php";

	class front extends back{
		/*----- GENERAL ----- */
		function GetMetaFB($idNews){
			settype($idNews,"int");
			$sql="SELECT name_vn,sum_vn,img FROM news WHERE idNews=$idNews";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}
		/*----- PROJECT ----- */

		function listProjectByPT($idPT,$pageNum=1,$pageSize=9,&$totalRows){

			$totalRows=0;

			$sql="SELECT count(*) FROM project,project_tag,project_type WHERE project.idPT=$idPT AND project.idPT=project_type.idPT AND project.idTag=project_tag.idTag AND project.anhien=1";

			$kq=mysql_query($sql) or die(mysql_error());

			$row_kq=mysql_fetch_row($kq);

			$totalRows=$row_kq[0];



			$startRow = ($pageNum-1)*$pageSize;

			$sql="SELECT idPro,project.name_vn as pro_name_vn,project.name_en as pro_name_en,project.national_vn as national_vn,project.national_en as national_en,year,img,project_type.name_vn as pro_type_name_vn,project_type.name_en as pro_type_name_en,scale,project.url as url_pro FROM project,project_tag,project_type WHERE project.idPT=$idPT AND project.idPT=project_type.idPT AND project.idTag=project_tag.idTag AND project.anhien=1 ORDER BY project.thutu DESC LIMIT $startRow,$pageSize";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}

		

		function listProjectByPTAndTag($idPT,$idTag,$pageNum=1,$pageSize=9,&$totalRows){

			$totalRows=0;

			$sql="SELECT count(*) FROM project,project_tag,project_type WHERE project.idPT=$idPT AND project.idPT=project_type.idPT AND project.idTag=project_tag.idTag AND project.idTag=$idTag AND project.anhien=1";

			$kq=mysql_query($sql) or die(mysql_error());

			$row_kq=mysql_fetch_row($kq);

			$totalRows=$row_kq[0];



			$startRow = ($pageNum-1)*$pageSize;

			$sql="SELECT idPro,project.name_vn as pro_name_vn,project.name_en as pro_name_en,project.national_vn as national_vn,project.national_en as national_en,year,img,project_type.name_vn as pro_type_name_vn,project_type.name_en as pro_type_name_en,scale,project.url as url_pro FROM project,project_tag,project_type WHERE project.idPT=$idPT AND project.idPT=project_type.idPT AND project.idTag=project_tag.idTag AND project.idTag=$idTag AND project.anhien=1 ORDER BY project.thutu DESC LIMIT $startRow,$pageSize";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}

		

		function listOrtherProject($idPro){

			$sql="SELECT * FROM project WHERE idPro!=$idPro AND anhien=1";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}

		

		function listNewProject(){

			$sql="SELECT * FROM project WHERE anhien=1 ORDER BY thutu DESC LIMIT 0,8";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}



		function listSameCatProject($idPro,$idPT,$idTag)

		{

			$sql="SELECT * FROM project WHERE idPro!=$idPro AND idPT=$idPT AND idTag=$idTag AND anhien=1 ORDER BY thutu DESC LIMIT 0,8";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}



		function detailProjectTypeF($url_type){

			$sql="SELECT * FROM project_type WHERE url='$url_type' AND anhien=1";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}



		function detailProjectF($url){

			$sql="SELECT * FROM project WHERE url='$url' AND anhien=1";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}



		function getIDProjectType($url_type){

			$sql="SELECT idPT FROM project_type WHERE url='$url_type'";

			$kq=mysql_query($sql) or die(mysql_error());

			$row_kq=mysql_fetch_assoc($kq);

			return $row_kq['idPT'];

		}



		function getIDTag($url_tag){

			$sql="SELECT idTag FROM project_tag WHERE url='$url_tag'";

			$kq=mysql_query($sql) or die(mysql_error());

			$row_kq=mysql_fetch_assoc($kq);

			return $row_kq['idTag'];

		}



		function getIDProject($url){

			$sql="SELECT idPro FROM project WHERE url='$url'";

			$kq=mysql_query($sql) or die(mysql_error());

			$row_kq=mysql_fetch_assoc($kq);

			return $row_kq['idPro'];

		}



		function recentProject(){

			$sql="SELECT * FROM project WHERE anhien=1 ORDER BY thutu DESC LIMIT 0,5";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}

		/*----- NEWS ----- */

		function listNewsByNT($idNT,$pageNum=1,$pageSize=9,&$totalRows){

			if(isset($idNT)){

				$totalRows=0;

				$sql="SELECT count(*) FROM news,news_type WHERE news.idNT=$idNT AND news.idNT=news_type.idNT AND news.anhien=1";

				$kq=mysql_query($sql) or die(mysql_error());

				$row_kq=mysql_fetch_row($kq);

				$totalRows=$row_kq[0];

				$startRow = ($pageNum-1)*$pageSize;

				$sql="SELECT idNews,news.name_vn as title_vn,news.name_en as title_en,sum_vn,sum_en,img,date,news_type.name_vn as news_type_vn,news_type.name_en as news_type_en,news.url as url FROM news,news_type WHERE news.idNT=$idNT AND news.idNT=news_type.idNT AND news.anhien=1 ORDER BY news.thutu DESC LIMIT $startRow,$pageSize";

			}

			else{

				$totalRows=0;

				$sql="SELECT count(*) FROM news,news_type WHERE news.idNT=news_type.idNT AND news.anhien=1";

				$kq=mysql_query($sql) or die(mysql_error());

				$row_kq=mysql_fetch_row($kq);

				$totalRows=$row_kq[0];



				$startRow = ($pageNum-1)*$pageSize;

				$sql="SELECT idNews,news.name_vn as title_vn,news.name_en as title_en,sum_vn,sum_en,img,date,news_type.name_vn as news_type_vn,news_type.name_en as news_type_en,news.url as url FROM news,news_type WHERE news.idNT=news_type.idNT AND news.anhien=1 ORDER BY news.thutu DESC LIMIT $startRow,$pageSize";

			}

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}

		

		function increaseNewsHits($idNews){

			$sql="UPDATE news SET hits=hits+1 WHERE idNews=$idNews";

			mysql_query($sql) or die(mysql_error());

		}

		

		function recentNews(){

			$sql="SELECT * FROM news WHERE anhien=1 ORDER BY idNews DESC LIMIT 0,6";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}

		

		function listOrtherNews($idNews){
			$nt=$this->detailNews($idNews);
			$row_nt=mysql_fetch_assoc($nt);
			$idNT=$row_nt['idNT'];

			$sql="SELECT * FROM news WHERE idNews!=$idNews AND idNT=$idNT AND anhien=1 LIMIT 0,6";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}
		
		function listNewNews(){

			$sql="SELECT * FROM news WHERE anhien=1 ORDER BY thutu DESC LIMIT 0,8";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}



		function detailNewsTypeF($url){

			$sql="SELECT * FROM news_type WHERE url='$url' AND anhien=1";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}

		

		function getIDNewsType($url){
			$sql="SELECT idNT FROM news_type WHERE url='$url'";
			$kq=mysql_query($sql) or die(mysql_error());
			$row_kq=mysql_fetch_assoc($kq);
			return $row_kq['idNT'];
		}



		function getIDNews($url){
			$sql="SELECT idNews FROM news WHERE url='$url'";

			$kq=mysql_query($sql) or die(mysql_error());

			$row_kq=mysql_fetch_assoc($kq);

			return $row_kq['idNews'];

		}

		function listNewsTypeF(){
			$sql="SELECT * FROM news_type WHERE anhien=1 ORDER BY thutu ASC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;			
		}//end listNewsType

		/*----- INTRODUCTION ----- */

		function detailIntroductionF($url){

			$sql="SELECT * FROM introduction WHERE url='$url' AND anhien=1";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}



		function increaseIntroductionHits($url){

			$sql="UPDATE introduction SET hits=hits+1 WHERE url='$url'";

			mysql_query($sql) or die(mysql_error());

		}

		

		function listOrtherIntroduction($url){

			$sql="SELECT * FROM introduction WHERE url!='$url' AND anhien=1 LIMIT 0,6";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}

		

		function listIntroduction(){

			$sql="SELECT * FROM introduction WHERE anhien=1 ORDER BY thutu ASC";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}// end listIntrodution



		/*----- PAGING -----*/

		function pagesList($baseURL,$totalRows , $pageNum=1,$pageSize = 16, $offset = 5){

			/*$baseURL = $_SERVER['PHP_SELF'];

			parse_str($_SERVER['QUERY_STRING'],$arr);

			unset($arr['pageNum']);

			foreach($arr as $k=> $v) $str.= "&{$k}={$v}";

			$baseURL .="?".$str;*/

			if ($totalRows<=0) return "";

			$totalPages = ceil($totalRows/$pageSize);

			if ($totalPages<=1) return "";

				

			$firstLink="";  $prevLink="";  $lastLink="";  $nextLink="";

	

			if ($pageNum > 1) {

				$firstLink = "<li><a href='$baseURL'>Trang đầu</a></li>";

				$prevPage = $pageNum - 1;

				$prevLink="<li><a href='$baseURL/$prevPage/'>&laquo;</a></li>";

			}

			if ($pageNum < $totalPages) { 

				$lastLink = "<li><a href='$baseURL/$totalPages/'>Trangcuối</a></li>";

				$nextPage = $pageNum + 1;

				$nextLink = "<li><a href='$baseURL/$nextPage/'>&raquo;</a></li>";

			} 

			

			$from = $pageNum - $offset;	

			$to = $pageNum + $offset;

			if ($from <=0) { $from = 1;   $to = $offset*2; }

			if ($to > $totalPages) { $to = $totalPages; }

			$links = "";

			for($j = $from; $j <= $to; $j++) 

			{

				$str=($j==$pageNum)?"<li class='active'><a class='number' href = '$baseURL/$j/'>$j</a></li>":"<li><a class='number' href = '$baseURL/$j/'>$j</a></li>";

				$links= $links . $str;

			}

			return $prevLink.$links.$nextLink;

		}



		/*------EMAIL MARKETING-----*/

			function checkEmailMarketing($email){

				$email=trim(strip_tags($email));

				if(get_magic_quotes_gpc()==false)

				{

					$email=mysql_real_escape_string($email);	

				}

				$sql="SELECT * FROM email_marketing WHERE email='$email'";

				$kq=mysql_query($sql) or die(mysql_error());

				if(mysql_fetch_row($kq)>=1)

					return 0;

				else return 1;

			}

			

			function addEmailMarketing($email){

				$email=trim(strip_tags($email));

				if(get_magic_quotes_gpc()==false)

				{

					$email=mysql_real_escape_string($email);	

				}

				$date=date("Y-m-d H:i:s");

				$sql="INSERT INTO email_marketing (email,date) VALUES ('$email','$date')";

				mysql_query($sql) or die(mysql_error());

			}

		/*------END EMAIL MARKETING-----*/	

		/*------CLIENT REVIEW-----*/

		function listClientReview_F(){

			$sql="SELECT * FROM client_review WHERE anhien=1 ORDER BY thutu DESC";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}

		/*------END CLIENT REVIEW-----*/
		
		/*------CLIENT REVIEW-----*/

		function listCertificate_F(){
			$sql="SELECT * FROM certificate WHERE anhien=1 ORDER BY thutu ASC";
			$re=mysql_query($sql) or die(mysql_error());
			return $re;
		}

		/*------END CLIENT REVIEW-----*/

		/*------IMAGES-----*/

		function listImagesByImageType($idImgType){

			$sql="SELECT * FROM images WHERE idImgType=$idImgType AND anhien=1 ORDER BY thutu ASC";

			$re=mysql_query($sql) or die(mysql_error());

			return $re;

		}

		

		function getImagesByUrl($url){

			$sql="SELECT idImgType,name_vn,name_en FROM images_type WHERE url='$url'";

			$kq=mysql_query($sql) or die(mysql_error());

			return $kq;

		}

		/*------END IMAGES-----*/
		
		/*------HR-----*/
		function increaseHRHits($idHR){
			$sql="UPDATE hr SET hits=hits+1 WHERE idHR=$idHR";
			mysql_query($sql) or die(mysql_error());
		}
		
		function getidHRFromUrl($url){
			$sql="SELECT idHR FROM hr WHERE url='$url' AND anhien=1";
			$kq=mysql_query($sql) or die(mysql_error());
			$row_kq=mysql_fetch_assoc($kq);
			return $row_kq['idHR'];
		}
		
		/*------PRODUCT-----*/
		function listProductF(){
			$sql="SELECT * FROM product WHERE anhien=1";
			$kq=mysql_query($sql) or die(mysql_error());
			return $kq;
		}
		
		function increaseProductsHits($idPr){
			$sql="UPDATE product SET hits=hits+1 WHERE idPr=$idPr";
			mysql_query($sql) or die(mysql_error());
		}
		
		function getidProductFromUrl($url){
			$sql="SELECT idPr FROM product WHERE url='$url' AND anhien=1";
			$kq=mysql_query($sql) or die(mysql_error());
			$row_kq=mysql_fetch_assoc($kq);
			return $row_kq['idPr'];
		}
		
		/*------DESIGN-----*/
		function listDesignF($idDT){
			$sql="SELECT * FROM design WHERE idDT=$idDT AND anhien=1";
			$kq=mysql_query($sql) or die(mysql_error());
			return $kq;
		}
		
		function increaseDesignHits($idDe){
			$sql="UPDATE design SET hits=hits+1 WHERE idDe=$idDe";
			mysql_query($sql) or die(mysql_error());
		}
		
		function getidDesignTypeFromUrl($url){
			$sql="SELECT idDT FROM design_type WHERE url='$url' AND anhien=1";
			$kq=mysql_query($sql) or die(mysql_error());
			$row_kq=mysql_fetch_assoc($kq);
			return $row_kq['idDT'];
		}
		
		function getidDesignFromUrl($url){
			$sql="SELECT idDe FROM design WHERE url='$url' AND anhien=1";
			$kq=mysql_query($sql) or die(mysql_error());
			$row_kq=mysql_fetch_assoc($kq);
			return $row_kq['idDe'];
		}
		
		function relateDesign($idDT,$idDe){
			$sql="SELECT * FROM design WHERE idDT=$idDT AND idDe!=$idDe AND anhien=1";
			$kq=mysql_query($sql) or die(mysql_error());
			return $kq;
		}
	}

?>