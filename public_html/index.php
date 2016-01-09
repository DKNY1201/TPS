<?

	session_start();

	//ob_start('ob_gzhandler');  

	$lang="vn";

	$lang_arr=array("vn","en");

	if (isset($_COOKIE['lang']) == true){ 
		if (in_array($_COOKIE['lang'],$lang_arr)==true){
			$lang = $_COOKIE['lang'];
			$_SESSION['language']=$_COOKIE['lang'];
		}
	}

	require_once "lang/lang_$lang.php";

	ob_start();

	include "home.php";

	$str=ob_get_clean();

	$str = str_replace("{TPS}" , TPS , $str);

	$str = str_replace("{Site_Title}" , Site_Title , $str);

	$str = str_replace("{Hotline}" , Hotline , $str);

	$str = str_replace("{See_More}" , See_More , $str);

	$str = str_replace("{Article}" , Article , $str);
	$str = str_replace("{Customer_Manage}" , Customer_Manage, $str);
	$str = str_replace("{Notice}" , Notice, $str);
	$str = str_replace("{DN}" , DN, $str);
	//login

	$str = str_replace("{Register}" , Register , $str);

	$str = str_replace("{Account}" , Account , $str);

	$str = str_replace("{Login}" , Login , $str);

	$str = str_replace("{Logout}" , Logout , $str);

	//language

	$str = str_replace("{Language}" , Language , $str);

	$str = str_replace("{Vietnamese}" , Vietnamese , $str);

	$str = str_replace("{English}" , English , $str);

	//search

	$str = str_replace("{Search_Keyword}" , Search_Keyword , $str);

	$str = str_replace("{Search}" , Search , $str);

	//menu

	$str = str_replace("{Home}" , Home , $str);

	$str = str_replace("{Intro}" , Intro , $str);
	$str = str_replace("{Intro1}" , Intro1 , $str);
	$str = str_replace("{Product}" , Product , $str);
	$str = str_replace("{Product1}" , Product1 , $str);

	$str = str_replace("{News}" , News , $str);

	$str = str_replace("{Contact}" , Contact , $str);

	$str = str_replace("{Cat}" , Cat , $str);

	$str = str_replace("{Image}" , Image , $str);

	$str = str_replace("{Capacity}" , Capacity , $str);

	$str = str_replace("{Capacity_Profile}" , Capacity_Profile , $str);

	$str = str_replace("{Advantage}" , Advantage , $str);

	$str = str_replace("{Scope_Work}" , Scope_Work , $str);

	$str = str_replace("{Project}" , Project , $str);

	$str = str_replace("{Completed_Project}" , Completed_Project , $str);

	$str = str_replace("{Ongoing_Project}" , Ongoing_Project , $str);

	$str = str_replace("{Achievement}" , Achievement , $str);

	$str = str_replace("{Certification_Award}" , Certification_Award , $str);

	$str = str_replace("{Client_Review}" , Client_Review , $str);

	$str = str_replace("{Values}" , Values , $str);

	$str = str_replace("{The_Values_Of_TPS}" , The_Values_Of_TPS , $str);

	$str = str_replace("{Operation_Policy}" , Operation_Policy , $str);

	$str = str_replace("{Safety_Policy}" , Safety_Policy , $str);

	$str = str_replace("{Quality_Policy}" , Quality_Policy , $str);
	$str = str_replace("{Recruitment}" , Recruitment , $str);
	$str = str_replace("{HR}" , HR , $str);
	$str = str_replace("{Design}" , Design , $str);
	//4

	$str = str_replace("{Values_TPS}" , Values_TPS , $str);

	$str = str_replace("{Values_TPS1}" , Values_TPS1 , $str);

	$str = str_replace("{Capacity_Profile1}" , Capacity_Profile1 , $str);

	$str = str_replace("{Achievement1}" , Achievement1 , $str);

	$str = str_replace("{Why_Choose_Us}" , Why_Choose_Us , $str);

	$str = str_replace("{Why_Choose_Us1}" , Why_Choose_Us1 , $str);

	//quotation

	$str = str_replace("{Request}" , Request , $str);

	$str = str_replace("{Request_For}" , Request_For , $str);

	$str = str_replace("{Quotation}" , Quotation , $str);

	$str = str_replace("{Quotation_1}" , Quotation_1 , $str);

	$str = str_replace("{Quotation_2}" , Quotation_2 , $str);

	//project

	$str = str_replace("{Newest_Project}" , Newest_Project , $str);

	$str = str_replace("{Customer}" , Customer , $str);

	$str = str_replace("{Newest_News}" , Newest_News , $str);

	$str = str_replace("{Post_Date}" , Post_Date , $str);

	$str = str_replace("{Some_Our_Work}" , Some_Our_Work , $str);
	$str = str_replace("{Some_Our_Work1}" , Some_Our_Work1 , $str);
	$str = str_replace("{Some_Our_Work2}" , Some_Our_Work2 , $str);

	$str = str_replace("{Scale}" , Scale , $str);

	$str = str_replace("{Detail_Project}" , Detail_Project , $str);

	$str = str_replace("{Name_Project}" , Name_Project , $str);

	$str = str_replace("{National}" , National , $str);

	$str = str_replace("{Location}" , Location , $str);

	$str = str_replace("{Investor}" , Investor , $str);

	$str = str_replace("{Finish_Year}" , Finish_Year , $str);

	$str = str_replace("{Scope}" , Scope , $str);

	$str = str_replace("{Orther_Project}" , Orther_Project , $str);

	$str = str_replace("{Same_Cat_Project}" , Same_Cat_Project , $str);

	$str = str_replace("{New_Project}" , New_Project , $str);
	$str = str_replace("{Project_Info}" , Project_Info , $str);

	//news

	$str = str_replace("{Comment}" , Comment , $str);

	$str = str_replace("{News_Type}" , News_Type , $str);

	$str = str_replace("{New_News}" , New_News , $str);

	$str = str_replace("{Relate_News}" , Relate_News , $str);
	$str = str_replace("{Relate_Article}" , Relate_Article , $str);
	//footer

	$str = str_replace("{Office}" , Office , $str);

	$str = str_replace("{Address}" , Address , $str);

	$str = str_replace("{Address_Office}" , Address_Office , $str);

	$str = str_replace("{Factory}" , Factory , $str);

	$str = str_replace("{Address_Factory}" , Address_Factory , $str);

	$str = str_replace("{Contact_Us}" , Contact_Us , $str);

	//contact

	$str = str_replace("{Contact1}" , Contact1 , $str);

	$str = str_replace("{Full_Name}" , Full_Name , $str);

	$str = str_replace("{Your_Name}" , Your_Name , $str);

	$str = str_replace("{Phone}" , Phone , $str);

	$str = str_replace("{Message}" , Message , $str);

	$str = str_replace("{Type_Message}" , Type_Message , $str);

	$str = str_replace("{Send_Message}" , Send_Message , $str);

	$str = str_replace("{Send_Email_Us}" , Send_Email_Us , $str);

	$str = str_replace("{Connect_Us}" , Connect_Us , $str);

	echo $str;

?>