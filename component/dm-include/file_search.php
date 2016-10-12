<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

?>
<?php
$modtype='search';
//$searchkey=@$_POST['searchword']; _GET
$searchkey = @htmlentities($_POST['searchword']);

$title ='站点搜索';
	//--seo----
		$seo1v='站点搜索：'.$searchkey;
		$seo2v='站点搜索：'.$searchkey;
		$seo3v='站点搜索：'.$searchkey;
		//unset($seo1)
		//array_unshift($seo1, $curseo1);
		if($seo1v<>''){ $seo1[0] =$seo1v;} else  $seo1[0] =$title;
		if($seo2v<>''){ $seo2[0] =$seo2v;} else  $seo2[0] =$title;
		if($seo3v<>''){ $seo3[0] =$seo3v;} else  $seo3[0] =$title;
	 
?>

 
<?php
 require_once HTMLROOT.'page_search.php';

?>