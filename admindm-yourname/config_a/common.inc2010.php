<?php 
ini_set('display_errors', TRUE);//false  //TRUE
//ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
define('IN_DEMOSOSO', TRUE);
//define('HERE_ROOT', substr(dirname(__FILE__), 0, -7));//include - 7,inc-3
//define('HERE_ROOT', dirname(__FILE__));//这是一个知识点，这是根目录，
define('HERE_ROOT', substr(dirname(__FILE__), 0, -8));//这是本目录。3 mean inc number.is incc ,then is 4./通常是用这个。方便每个目录下的文件用这个。此法也是为了rewrite .
//THE folder need to be end by '\'  


$dirnamefile = dirname(__FILE__);

$dirnamefile=str_replace('\\','/',$dirnamefile);
 
$heredir_arr = explode('/',$dirnamefile);
$heredir_arr2 = array_slice($heredir_arr,-2,1);

$heredirlen = count($heredir_arr)-2;
$heredir_root = array_slice($heredir_arr,0,$heredirlen);  
$heredir_root_string = implode('/', $heredir_root).'/';



define('WEB_ROOT', $heredir_root_string);
 


$adminstring = $heredir_arr2[0];
if(substr($adminstring,0,8)<>'admindm-'){
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	echo '后台目录必须以admindm-开头，比如admindm-yournameyourname*** (admindm-后面不受限制)';
	exit;}



//define('WEB_ROOT',substr(HERE_ROOT, 0, -16));
define('SES_ROOT',WEB_ROOT.'cache/session'); 
define('ADMIN', 'y');//use url function link target 
   //echo WEB_ROOT.'CM-static';
  //echo UPLOADROOTIMAGE; 
$submenu='';
 $baseurl_def = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
  $php_self = $_SERVER['PHP_SELF'];
 //echo $baseurl_def;
 //echo '<br />';
$baseurlarr = explode("/", $baseurl_def);
$baseurl_dir_len=count($baseurlarr)-3; 
$baseurl_root = array_slice($baseurlarr,0,$baseurl_dir_len);
//echo $baseurl_dir_len;
$baseurl_root_string = implode('/', $baseurl_root).'/'; 
$baseurl = 'http://'.$baseurl_root_string;//16 is admin_yourname1
define("BASEURL", $baseurl);
//echo BASEURL;
 
  
require_once WEB_ROOT.'component/dm-config/fsession.php';//fsession must before....$_SESSION['user2510']

require_once WEB_ROOT.'component/dm-config/inc_table.php';
require_once WEB_ROOT.'component/dm-config/config.php';
 
require_once WEB_ROOT.'component/dm-config/mysql.php';
require_once WEB_ROOT.'component/dm-config/global.common.php';
require_once HERE_ROOT.'config_a/func.2010.php';
require_once HERE_ROOT.'config_a/func.2010.select.php';
require_once HERE_ROOT.'config_a/func.2010.lang.theme.php';
require_once HERE_ROOT.'config_a/func.2010.if.php';

 //----------
$stapath=$baseurl.$stadir;
define('STAPATH', $stapath);
define('UPLOADPATH', $stapath.'upload/');
define('UPLOADPATHIMAGE', UPLOADPATH.'image/');
define('STAROOT',WEB_ROOT.$stadir);
define('UPLOADROOT',STAROOT.'upload/');
define('UPLOADROOTIMAGE',STAROOT.'upload/image/');
define('TMIMG',STAPATH.'img/tm.gif');
//-------
//echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
 
  	$user2510='bh2010079002demososo';	//also  in login.php....
	define('USERBH', $user2510);  //user2510 and USERBH need baoliu...,
	 
	// pre($_SESSION);
	//session......
	 

	//no other use,only for session;
			//	 $ses1='ses1_'.$userdir;
			//	 $ses2ps='ses2_'.$userdir;

				 
//	$userdirr2=@$_SESSION[$ses1];	
	//$userps=substr(@$_SESSION[$ses2ps],0,-6);
//@$_COOKIE["curstyle"]
      $cookiesecret='xylive029';
	  $usercookie=@$_COOKIE['usercookie'];	
	   
	  $useridarr = explode("-", $usercookie); 
	  $userid = $useridarr[0];

	
	  // pre($_SESSION);exit;
	
	$ss_98373="select * from  ".TABLE_USER."  where id='$userid'  order by id desc limit 1";
	 // echo $ss_98373;//exit;
 
	$rowweb = getrow($ss_98373);
	$logouturl = '../mod_common/logout.php';
	if($rowweb=='no'){
		 //alert('out');
	    jump($logouturl);
	} {
          $userps = $rowweb['ps']; 
          $usercookievcompare = $userid.'-'.md5($userps.$cookiesecret);
        // echo '<Br>'.$usercookievcompare;
        // echo '<Br>'.$usercookie;

          if($usercookievcompare<>$usercookie) 
          	{
          		 jump($logouturl);
          	}
	}
//-----------------
	$usertype = $rowweb['type'];
	$useremail = $rowweb['email'];//use for tpl_account.php
	$arrayprevi = $rowweb['previ'];
	if(!isset($mod_previ)) $mod_previ = 'admin'; 
	 //first set admin here. default all is admin.then other set normal. like node,alias , feildvalue,album...etc.


//-end login or out-------------------------------------------------------------------------
//------------------------------------------



$act = @htmlentities($_GET['act']);$act2 = @htmlentities($_GET['act2']); 
$tid = @intval($_GET['tid']);  $theme = @htmlentities($_GET['theme']);  $themeid = @htmlentities($_GET['themeid']);   
$submit = @htmlentities($_GET['submit']);$file = @htmlentities($_GET['file']);
$catid = @htmlentities($_GET['catid']);$catpid = @htmlentities($_GET['catpid']);$catzj = @htmlentities($_GET['catzj']);
$pidname = @htmlentities($_GET['pidname']);$pidname2 = @htmlentities($_GET['pidname2']);
$pid = @htmlentities($_GET['pid']);$pid2 = @htmlentities($_GET['pid2']);$page = @intval($_GET['page']);
$v = @htmlentities($_GET['v']);$success = @htmlentities($_GET['success']);
$name = @htmlspecialchars($_GET['name']);//htmlspecialchars avoid zhongwen
$bs = @htmlentities($_GET['bs']);$editid = @htmlentities($_GET['editid']);$editid2 = @htmlentities($_GET['editid2']);
$type = @htmlentities($_GET['type']);$pidtype = @htmlentities($_GET['pidtype']);
$type2 = @htmlentities($_GET['type2']);
$position = @htmlentities($_GET['position']);//for block
$stylebh = @htmlentities($_GET['stylebh']);
 
if($act == "")$act = "list";
//if($file == "")$file = "list"; //keep 
//about lang 
$script_name = $_SERVER['SCRIPT_NAME'];//$pos = strpos($mystring, $findme);
$lang_temp = htmlentities(@$_GET['lang']);
if($lang_temp==''){ echo '出错，请先在选择语言.';exit;	 

}  
define('LANG', $lang_temp);

$userurl= $baseurl.'adminfrom.php?to=';
if(LANG=='cn') $fronturl= $userurl.'index.html';
else  $fronturl= $userurl.LANG.'/index.html';
 
/*
if(LANG=='big5') {
	 $sta_auto_big5=navlang_auto_big5();
	 if($sta_auto_big5=='y'){
	 echo '出错，繁体是自动切换，不是一个独立的版本。';exit;
	 //alert('出错，繁体是自动切换，不是一个独立的版本。');jump('pro-lang.php');
	 }
}*/

	 $sqlmain = "SELECT * from ".TABLE_LANG." where   sta_main='y' and pbh='".USERBH."' order by id limit 1";
		//echo getnum($sqlmain);
		if(getnum($sqlmain)==0){
		  $websitename = '提示：目前没有主语言，网站必须要有一个主语言，请在 “语言设置” 里选一个。';
		    
		}
		else{
 

				 $sqlmain = "SELECT * from ".TABLE_LANG." where   lang='".LANG."' and pbh='".USERBH."' order by id limit 1";//pidname is not path;
				
				 if(getnum($sqlmain)==0){
				 	$websitename = '提示：当前语言出错,请重新登录！';alert($websitename);
					 echo $websitename;exit;}
				 else{


				 		$rowlang= getrow($sqlmain);
					   $websitename = $rowlang['sitename'];
					   if($websitename =='') $websitename ='请填写标题';
					   $water = $rowlang['water'];
					   $editor = $rowlang['editor'];
					   $htmldir = $rowlang['htmldir']; 
					   $cssdir = $rowlang['cssdir']; 
					   $curstyle = $rowlang['curstyle']; 
					   //	$curstyledebug = $rowlang['curstyledebug']; 
					   $curstyledebug = $curstyle;

					   //$curregionindex = get_field(TABLE_STYLE,'bsindex',$curstyle,'pidname');
					   //	$curstylebh = get_field(TABLE_STYLE,'stylebh',$curstyle,'pidname');

					    
					    
						$csspath=STAPATH.'template/'.$cssdir.'/'; 
						define('CSSPATH', $csspath);
	  
					   define('HTMLROOTADMIN',WEB_ROOT.'component/'.$htmldir.'/');
					   define('EFFECTROOTADMIN',WEB_ROOT.'component/effect/');
					   if($water<>'') {$waterimg= UPLOADROOTIMAGE.$water;$up_water='y';}
					   else {$waterimg='';$up_water='';}


					 }

		
		   
		}
//-------------end lang --------------------------------------------------------------
if($mod_previ=='admin')		
require_once HERE_ROOT.'config_a/func.previ.php';//put here,because need lang
//-----------
require_once HERE_ROOT.'config_a/text.2010.php';//put here,because need lang

// if(LANG=='cn') $arr_stylebh = $arr_stylebh_cn;
// else if(LANG=='en') $arr_stylebh = $arr_stylebh_en;
// else   $arr_stylebh = $arr_stylebh_other;

//$ndconfig = EFFECTROOTADMIN.'ndconfig/'.$curstyle.'.php';

// if(is_file($ndconfig))  require_once  $ndconfig;
// else echo 'nd配置文件不存';
// else{
// 	$arr_blocknd = array( 
// 		'error config'               =>'配置文件不存在',
// 		);

// }



//if mod_previ is normal,then require is in mod.php.bec need catid variable.
//---------	
//-----------------------------------------------------
 
$andlangbh=" and lang='".LANG."'    and pbh='".USERBH."' ";
$noandlangbh=" lang='".LANG."' and pbh='".USERBH."' ";
$noandlangbh2=" lang='".LANG."'  and pbh='".USERBH."' ";//use in custom menu...

   define('DEFAULTIMG',CSSPATH.'default.png');
    define('DEFAULTIMGDIV','<img src="'.DEFAULTIMG.'" alt="" />');

$superadmin=''; 
 

//---------------------------------
					   $sqlstyle = "SELECT * from ".TABLE_STYLE." where pidname='$curstyle' $andlangbh limit 1"; 
					    $rowstyle = getrow($sqlstyle);
					    $style_blockid = $rowstyle['style_blockid'];
					     $pidregion = $rowstyle['pidregion'];
					    /*-----------style_blockid-----------------*/
					    $bscntarr = explode('==#==',$style_blockid); 
					     
					    $bsbannertop=$bsbanner=$bsbannermob=$bsindex=$bsindexmob=$bsmenu=$bsheadertop=$bsheader=$bsfooterbegin=$bsfooter=$bsfooterlast=$bsfooternavmob=$bsblock404=$sta_narrowscreen=$sta_header_fullwidth=$sta_menuright=$sta_menufix='';

					  

					     if(count($bscntarr)>1){
					        foreach ($bscntarr as   $bsvalue) {
					           $bsvaluearr = explode(':##',$bsvalue);
					           $bsccc = $bsvaluearr[0];
					           $$bsccc=$bsvaluearr[1];
					        }
					    }
					    //-------------------



//-------------

?>
 

