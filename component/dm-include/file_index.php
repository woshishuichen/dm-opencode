<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
echo 'no use file_index.php';
exit;



 layoutcur('index','index');//layoutcur($pid,$type);

//echo $banner;
//echo $contentbot;
 
$cur_id='index';
$main_id='index';
$modtype='index';

$seo1[0] = $indexseo1; //in lang in func_init.php
$seo2[0] = $indexseo2;
$seo3[0] = $indexseo3;
$bodycss = 'index';  
	
 //require_once HTMLROOT.'page_index.php';
require_once HTMLROOT.'page_page.php';//set region value in layout.
?>

 
 
 
 