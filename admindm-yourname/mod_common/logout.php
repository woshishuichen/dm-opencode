<?php
  // ini_set('display_errors', FALSE);
ini_set('display_errors', FALSE);
  
define('IN_DEMOSOSO', TRUE);

 
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
  echo '后台目录必须以admindm-开头，比如admindm-yournameyourname*** (admindm-后面不受限制)';
  exit;}



//define('WEB_ROOT', substr(dirname(__FILE__), 0, -26));//这是本目录。3 mean inc number.is incc ,then is  
define('SES_ROOT',WEB_ROOT.'cache/session');
 
// echo WEB_ROOT;


$userdir='';$baseurl='';
require_once WEB_ROOT.'component/dm-config/inc_table.php';
require_once WEB_ROOT.'component/dm-config/config.php';
require_once WEB_ROOT.'component/dm-config/global.common.php';
require_once WEB_ROOT.'component/dm-config/fsession.php';
 
ini_set('session.gc_maxlifetime', 7200);




$userdir='xylive';//no other use,only for session;
				 $ses1='ses1_'.$userdir;
				 $ses2ps='ses2_'.$userdir;
				 

	//$_SESSION[$ses1]="a";
	//		$_SESSION[$ses2ps]="a";

//$_SESSION['isadmin']='n';
 // setcookie($ses1,'a',time()-1,"/");
 // setcookie($ses2ps,'a',time()-1,"/");
         
 setcookie("usercookie",'n',time()-1,"/");
 setcookie("isadmin",'n',time()-1,"/");
   setcookie("admindir",'n',time()-1,"/");
		 
		//	session_destroy(); 
 

   jump('../mod_common/login.php');



?>
 	  

  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head>
  <title>用户登录</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <!--
    <script type="text/javascript" src="js/common.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    -->
  <style>

  </style>
 </head>
 <body>

 </body>
</html>



 