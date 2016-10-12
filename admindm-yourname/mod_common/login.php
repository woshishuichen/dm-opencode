<?php
$dirnamefile = dirname(__FILE__);
$dirnamefile=str_replace('\\','/',$dirnamefile); 
$heredir_arr = explode('/',$dirnamefile);
$heredir_arr2 = array_slice($heredir_arr,-2,1);
$heredirlen = count($heredir_arr)-2;
$heredir_root = array_slice($heredir_arr,0,$heredirlen);	
$heredir_root_string = implode('/', $heredir_root).'/';

define('WEB_ROOT', $heredir_root_string);

$adminstring = $heredir_arr2[0];
//echo $adminstring;

if(substr($adminstring,0,8)<>'admindm-'){
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />后台目录必须以admindm-开头，比如admindm-yournameyourname*** (admindm-后面不受限制)';
	exit;}

 


ini_set('display_errors', false);
  
define('IN_DEMOSOSO', TRUE);

//define('WEB_ROOT', substr(dirname(__FILE__), 0, -26));


define('SES_ROOT',WEB_ROOT.'cache/session');
 
// echo WEB_ROOT;


	
	
$userdir='';

 $baseurl_def = $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
 //echo $baseurl_def;
 //echo '<br />';
$baseurlarr = explode("/", $baseurl_def);
$baseurl_dir_len=count($baseurlarr)-3; 
$baseurl_root = array_slice($baseurlarr,0,$baseurl_dir_len);
//echo $baseurl_dir_len;
$baseurl_root_string = implode('/', $baseurl_root).'/'; 
$baseurl = 'http://'.$baseurl_root_string;//16 is admin_yourname1
define("BASEURL", $baseurl);
 //echo '<pre>'.print_r($baseurl,1).'</pre>';


require_once WEB_ROOT.'component/dm-config/inc_table.php';
require_once WEB_ROOT.'component/dm-config/config.php';
require_once WEB_ROOT.'component/dm-config/global.common.php';
require_once WEB_ROOT.'component/dm-config/fsession.php';
 
ini_set('session.gc_maxlifetime', 7200);

$jumpv = 'login.php';

?>
<?php
$act= @htmlentities($_GET['act']);
if($act=='login'){

$user= @htmlentities(trim($_POST['user']));
$ps= @htmlentities(trim($_POST['password']));

if(strlen($user)<2 or strlen($ps)<2){
	alert('字符不够 sorry,user need more long');    jump($jumpv);
}					

require_once WEB_ROOT.'component/dm-config/mysql.php';
     // $salt = '00';is in config.php
  $pscrypt= crypt($ps, $salt);
     //echo $pscrypt; 


 $ss_P="select * from ".TABLE_USER."  where  userdir='$user' and ps='$pscrypt'  order by id desc limit 1";



    // echo $ss_P;exit;
		if(getnum($ss_P)>0){		
					 $row=getrow($ss_P);
					 $userid=$row['id']; $hit=$row['hit'];$hit++;

					 if($hit>30) {
							 $sqlhit2 = "update  ".TABLE_USER."  set ps='' where id=$userid  limit 1"; 
							 iquery($sqlhit2);
 
					}


					
$cookiesecret='xylive029'; //only important
$usercookiev = $userid.'-'.md5($pscrypt.$cookiesecret);
//echo '<br>'.$usercookiev;
				// $ses1='ses1_'.$userdir;
				// $ses2ps='ses2_'.$userdir;
		//setcookie("curstyle",'');
				// setcookie($ses1,$user,time()+36000,"/");
				// setcookie($ses2ps,$pscrypt.$sespshou,time()+36000,"/");
				 setcookie("usercookie",$usercookiev,time()+36000,"/");
				 setcookie("isadmin",'y',time()+36000,"/");
				 setcookie("admindir",$adminstring,time()+36000,"/");//use frontend


			// $_SESSION[$ses1]=$user;
			// $_SESSION[$ses2ps]=$pscrypt.$sespshou;
			// $_SESSION['isadmin']='y';
			// $_SESSION['admindir']=$adminstring;//use frontend
			
		
			//$_SESSION['le32se_de1_235fds']=$sesv_u_o;
			// setcookie("cookiec", $cookiev,time()+3800);
			//echo 'ok';exit;
			$mainlang = navlang_main(); 


 $sqlhit = "update  ".TABLE_USER."  set hit=$hit where id=$userid  limit 1"; 
 
 iquery($sqlhit);
  jump('index-welcome.php?lang='.$mainlang);
					}
					else{
						// $_SESSION['isadmin']='n';
						 setcookie("isadmin",'n',time()+36000,"/");
			 
					     alert('用户名或密码不对！sorry,user or password is incorrect');    jump($jumpv);
					}
   
 
}


function navlang_main(){//use in common.php //must give first in mysql
	$user2510='bh2010079002demososo';	//also set in common.inc..............
define('USERBH', $user2510);

 $sql = "SELECT pidname from ".TABLE_LANG." where pbh='".USERBH."' and sta_main='y'  limit 1"; 
 // echo $sql;exit;
$row = getrow($sql);
return($row['pidname']);
} 



?>
   
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head>
  <title>用户登录</title>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <link rel="shortcut icon" href="../cssjs/ico/favicon2.ico" />
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <!--
    <script type="text/javascript" src="js/common.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    -->
<script src="../cssjs/jquery.js" type="text/javascript" ></script>
 </head>
 <body> 

 <div class="loginwrap2">
<div class="loginarea">
<h1 style="text-align:center">用户登录
<span style="display:none;padding:10px;color:red;font-size:14px">后台请用 chrome浏览器 </span>
</h1>
<form name="form1" method="post" action="<?php echo $jumpv.'?act=login' ?>">
    <div>
    <div class="w1">用户：</div>
     <div class="w2">
      <input name="user" type="text"  size="30">
       </div>
 <div class="c"> </div>
      <div class="w1">密码</div>  
       <div class="w2"> 
           <input name="password" type="password" size="30" >
      </div> 

 <div class="c"> </div>
        <div class="submit">
          <input  type="submit"  name="Submit" value="用户登录">
        </div>
        </div>
  </form>
			  
	<div class="power">power by <a href="http://www.demososo.com" target="_blank">demososo.com</a></div>		  

</div>			  
	</div> 

	<style>
	*{padding:0;margin:0;}
.loginwrap{margin-top:200px;height:400px; background:url(../cssjs/img/loginbg.jpg);position: relative;}
.loginwrap .loginarea{position:absolute;width:350px;top:50px;left:50%;margin-left:-170px;padding:10px 15px 30px 15px;border-top:4px solid #ff6600;background: #fff}
.loginwrap h1{ height:66px; line-height:66px; text-align:center; font-size:26px; color:#999999; font-weight:normal;}
.loginwrap .w1{width:60px;height:30px;float:left;font-size:14px;}
.loginwrap .w2{width:200px;height:30px;float:left;}
.loginwrap .w2 input{border:1px solid #ccc;padding:10px;background: #fff}
.loginwrap  .c{clear:both;height:20px;}

.loginwrap .submit input{ width:100%; height:45px; line-height:45px; text-align:center; background:#ff6600; color:#fff; display:inline-block; border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px; text-decoration:none;border:0;font-size:14px;cursor:pointer;}
.loginwrap .submit input:hover{text-decoration:none;background:#E5550C;}
.loginwrap .power{padding-top:40px;text-align:center;font-size:12px;color:#666;}
.loginwrap .power a{font-size:12px;color:#999;}
/*--------------------blue-----------------*/
.loginwrap2{margin-top:200px;height:400px; background:url(../cssjs/img/loginbg2.jpg);position: relative;}
.loginwrap2 .loginarea{position:absolute;width:350px;top:50px;left:50%;margin-left:-170px;padding:10px 15px 30px 15px;border-top:6px solid #1AA1F3;background: #fff}
.loginwrap2 h1{ height:66px; line-height:66px; text-align:center; font-size:26px; color:#999999; font-weight:normal;}
.loginwrap2 .w1{width:60px;height:30px;float:left;font-size:14px;}
.loginwrap2 .w2{width:200px;height:30px;float:left;}
.loginwrap2 .w2 input{border:1px solid #ccc;padding:10px;background: #fff}
.loginwrap2  .c{clear:both;height:20px;}

.loginwrap2 .submit input{ width:100%; height:45px; line-height:45px; text-align:center; background:#1AA9F5; color:#fff; display:inline-block; border-radius:2px; -webkit-border-radius:2px; -moz-border-radius:2px; text-decoration:none;border:0;font-size:14px;cursor:pointer;}
.loginwrap2 .submit input:hover{text-decoration:none;background:#18A1F2;}
.loginwrap2 .power{padding-top:40px;text-align:center;font-size:12px;color:#666;}
.loginwrap2 .power a{font-size:12px;color:#999;}

	</style>	


	<script>

 var winhg = ($(window).height()-400)/2+'px';
 console.log(winhg);
 $('.loginwrap2').css('margin-top',winhg);
 $('.loginwrap').css('margin-top',winhg);
	</script>  
 </body>
</html>
