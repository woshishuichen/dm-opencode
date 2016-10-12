<?php 
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
ini_set('display_errors', TRUE);//false
//ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
  //ini_set('display_errors', FALSE);
//define('WEB_ROOT', substr(dirname(__FILE__), 0, -4));
//define('HTMLROOT',WEB_ROOT.'html/');
//define('SES_ROOT',WEB_ROOT.'cache\ses'); 
//change below in single website

define( 'WEB_ROOT', dirname(__FILE__) . '/' );
//define('WEB_ROOT', substr(dirname(__FILE__), 0, -22));

define('SES_ROOT',WEB_ROOT.'cache/session'); 
define('INCLUDE_ROOT',WEB_ROOT.'component/dm-include/'); 
define('ADMINDIR',@$_COOKIE['admindir']); 
define('ISADMIN',@$_COOKIE['isadmin']); 

// echo dirname(__FILE__).'<br />'; 

//  echo HTMLROOT.'<br />'; 
 // echo WEB_ROOT.'<br />'; 
 //echo SES_ROOT.'<br />';  
$PHP_SELF=$_SERVER['PHP_SELF'];
//--
$cfg_cinc='component/dm-config/'; 
require_once WEB_ROOT.$cfg_cinc.'inc_table.php';
require_once WEB_ROOT.$cfg_cinc.'config.php';
//require_once WEB_ROOT.$cfg_cinc.'fsession.php';
require_once WEB_ROOT.$cfg_cinc.'mysql.php';
require_once WEB_ROOT.$cfg_cinc.'global.common.php';
 
//front func echo SES_ROOT.'<br />'; 


$targetv = ''; //$targetv is set in page_search, and list_text.php
$routeid='';$alias='';$ifalias='';$offset=5;$page_total='';
$pagesql='';//$pagesql is diff $page,just for seo ,like page-2.html is ok,if total is 2,then  page-22 will 404 page.
//$page is from _GET[],$pagesql is from and more than $page,like juse if >page_total.
//so if $page maybe is 22,but $pagesql is limit page_total 2.
$routeid = @htmlentities($_GET['routeid']);
$alias = @htmlentities($_GET['alias']);  
$ifalias = @htmlentities($_GET['ifalias']);
if(@$file=='')  $file = @htmlentities($_GET['file']);
$detailid = @htmlentities($_GET['detailid']);$brandid = @htmlentities($_GET['brandid']);
$page = @htmlentities($_GET['page']);
$pagelayout ='';

	/*------------some variable------------*/	
		$title='';	
		$pid=$curpidname = $pidname ='';
		$maintitle = $mainpid= $mainpidname= $mainalias='';//parent parent
		$modtype='';
		$sidebarcss =  $contentcss =  $bodycss='';		

		$maxline= $listfg ='';	
		$breadarr = array(); 
		$seo1 = array();$seo2 = array();$seo3 = array();
		//array_push($stack, "apple", "raspberry");
		//array_unshift($seo1, $row['seo1']);


//
$act = @htmlentities($_GET['act']);$act2 = @htmlentities($_GET['act2']);
$alias = @htmlentities($_GET['alias']);$tid = @intval($_GET['tid']);
$catid = @intval($_GET['catid']);
//$page = @intval($_GET['page']);//page is in file_inc.php
$fid = @intval($_GET['fid']);$search = @htmlentities($_GET['search']);$searchpage = @htmlentities($_GET['searchpage']);//htmlspecialchars
//
if(empty($act)) $act='index';
if($catid=='') $catid=0;
 if (!isset($page)||($page<=0)) $pagesql=1;// other judge in display/plugin_pager.php 
 else $pagesql=$page;
//echo '<br>page:'.$page;
/*------------some variable------------*/	

$dateall = date("Y-m-d H:i:s");
$dateday = date("Y-m-d");

 $lang_temp ='cn';
define('LANG', $lang_temp); 
 //echo @htmlentities($_GET['lang']);

/*------------------------------------*/

$sql = "SELECT bh from ".TABLE_USER." where userdir='$userdir'   limit 1";
	if(getnum($sql)==0){ echo  'not exist user...';exit;}
	else{
		$row = getrow($sql);
		$userbh = $row['bh'];
		define('USERBH', $userbh);		
		$andlangbh=" and lang='".LANG."'  and pbh='".USERBH."' ";
		$noandlangbh=" lang='".LANG."'  and pbh='".USERBH."' "; 
		
	 
		
		$sql = "SELECT * from ".TABLE_LANG." where pidname='".LANG."'  limit 1"; 

		$row = getrow($sql);
		$websitename = $row['sitename'];
		$langpath = $row['path'];
		//$cssdir = $row['cssdir'];
		//$htmldir = $row['htmldir'];
		$cdn = $row['cdn'];$sta_cdn = $row['sta_cdn'];
		//$curstyledebug = $row['curstyledebug'];//temp cancel curstyledebug...
		 $curstylenow = $row['curstyle'];

$curstyle = $row['curstyle'];
 //echo $curstyle;
 //echo @$_COOKIE["curstyle"];
 //echo LANG;

		$ico = $row['ico'];
		$sta_frontedit = $row['sta_frontedit'];$cssversion = $row['cssversion'];
		define('STA_FRONGEDIT',$sta_frontedit);


 
		/*---------some config, other in config.php above require*/
			

				$stapath=$baseurl.$stadir;
				define('STAPATH', $stapath);
				if($cdn<>'' && $sta_cdn=='y')   define('UPLOADPATH', 'http://'.$cdn.'/upload/');
				else define('UPLOADPATH', $stapath.'upload/');
				
				define('UPLOADPATHIMAGE', UPLOADPATH.'image/');

				define('STAROOT',WEB_ROOT.$stadir);
				define('UPLOADROOT',STAROOT.'upload/');
				define('UPLOADROOTIMAGE',STAROOT.'upload/image/');
				define('TMIMG',STAPATH.'img/tm.gif'); 


        define('ADMIN', 'n');//use url function when link target 
		define('LINKTARGET_F', '');
		//---------------

// $bsbanner=$bsbannermob=$bsindex=$bsindexmob=$bsmenu=$bsfooter=$bsfootermob=$bsfooternavmob='';
$sqlstyle = "SELECT * from ".TABLE_STYLE." where pidname='$curstyle' $andlangbh limit 1"; 
 //echo $sqlstyle;exit;
if(getnum($sqlstyle)>0){
	$rowstyle = getrow($sqlstyle);
	 // pre($rowstyle);
    $sta_cusmenu = $rowstyle['sta_cusmenu']; $cusmenu = $rowstyle['cusmenu'];
    $pidregion = $rowstyle['pidregion'];
	$style_blockid = $rowstyle['style_blockid'];
	$rgindex_design = $rowstyle['rgindex_design'];
	$cssdir = $rowstyle['cssdir'];$htmldir = $rowstyle['htmldir'];
	if($htmldir=='') $htmldir = 'html_default';
	if($cssdir=='') $cssdir = 'default';
	/*------------css dir--------------------------------------*/
	     define('MBROOT', STAROOT.'template/'.$cssdir.'/');
       if(!is_dir(MBROOT)) alert('样式目录'.$cssdir.'不存在！');

         define('HTMLROOT', WEB_ROOT.'component/'.$htmldir.'/');
       if(!is_dir(HTMLROOT)) alert('html目录'.$htmldir.'不存在！'); 

         define('DISPLAYROOT',HTMLROOT.'display/');
		define('EFFECTROOT',WEB_ROOT.'component/effect/');
     
      $csspath=STAPATH.'template/'.$cssdir.'/';//use in meta.php
      define('CSSPATH', $csspath);

       define('DEFAULTIMG',CSSPATH.'default.png');
       define('DEFAULTIMGDIV','<img src="'.DEFAULTIMG.'" alt="" />');


	/*-----------style_blockid-----------------*/
    $bscntarr = explode('==#==',$style_blockid); 
     
    $bsbannertop=$bsbanner=$bsbannermob=$bsindex=$bsindexmob=$bsmenu=$bsheadertop=$bsheader=$bsheaderlogo=$bsheadertext=$bsheadersearch=$bsfooterbegin=$bsfootercols=$bsfooterlinks=$bsfooter=$bsfooterlast=$bsfooternavmob=$bsblock404=$sta_narrowscreen=$sta_header_fullwidth=$sta_menuright=$sta_menufix='';
//bsfooterbegin,bsheaer no use, add footercols and links, add logo and text and search....
  

     if(count($bscntarr)>1){
        foreach ($bscntarr as   $bsvalue) {
           $bsvaluearr = explode(':##',$bsvalue);
           $bsccc = $bsvaluearr[0];
           $$bsccc=$bsvaluearr[1];
        }
    }
    
  }
 else{
 	echo 'sorry,not found,maybe style and lang not match......pls refresh page, or contact us: www.demososo.com';
 	setcookie("curstyle",'');//the reste cookie........
 	exit;
 }

//------------------------
	 		
		$menu = web_despdecode($row['menu']);

		//---
		//$indexseo1 = $row['seo1'];
		//$indexseo2 = $row['seo2'];
		//$indexseo3 = $row['seo3'];
//----------------------
	 
	}


//var pagecan

//var catecan

//var nodecan

//var regionindex can


?>
<?php
require_once INCLUDE_ROOT.'func_frontcommon.php';
require_once INCLUDE_ROOT.'func_frontformate.php';//only use in dh,no vblock...'bkcnt_imgleft'=>'图片在左，内容在右',
$langfile = 'lang_'.LANG;
 require_lang($langfile);
require_once INCLUDE_ROOT.'func_block.php';
//function layoutcur($pid,$type){  //invoke is in page
require_once INCLUDE_ROOT.'func_layout.php';
layoutcommon(); 
require_once INCLUDE_ROOT.'file_inc.php';

?>
