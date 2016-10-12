<?php define("IN_DEMOSOSO", false); //TRUE //false
//$userdir='user_20130601_2148331669';
$test='n';
 $baseurl='http://'.substr($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'],0,-14); 
 //echo $baseurl;
// routeid=$1&ifalias=n&file=baidumap&page=1


$routeid=25;//no use ,because override in file_inc
$ifalias='n';

 
/*
上面是通过程序判断的，如果网站域名固定，可以在这里直接写好。以http开头，以斜杠结束。然后把上面的注释了。
$baseurl = 'http://www.yoursite.com/'; 

*/
 define('BASEURL',$baseurl);  

 
 //print_r($_SERVER);
 $typeformarr =array("contact","colordemo","masonry","wookmark","previewofndlist");//masonry replace by wookmark
//typeformarr element not use ?v=v in htaccess, just add ?v=v in url.
 $type = @htmlentities($_GET['type']);
// $lang = @htmlentities($_GET['lang']);




if (!in_array($type, $typeformarr)) {

echo 'sorry,type error';exit;

}

$file='formpost_'.$type;//it need here

 
require_once "indexDM_load.php";




 
?> 
