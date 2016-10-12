
<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title>
<meta name="author" content="" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="robots" content="all" />

<link href="../cssjs/a_css.css" rel="stylesheet" type="text/css" />
<link href="../cssjs/a_responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STAPATH?>app/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

<script src="../cssjs/jquery.js" type="text/javascript" ></script>
<script src="../cssjs/a_js.js" type="text/javascript" ></script>
</head>
<body>

<div class="sitename">
<strong class="fl k1"><?php echo  $websitename;?></strong> 
 <a href="<?php echo  $fronturl;?>" target="_blank" class="imgbg_blue fl k2"><span>查看前台效果</span></a>
 <a href="../mod_common/logout.php" title="记得退出" class="poa imgbg_yell fl k3" style="right:50px;top:0px"><span>记得退出管理</span></a> 


<div class="fl navlang"> 

当前语言：<span style="font-size:14px;font-weight:bold;color:red"><?php echo navlang_cur();?></span>
 
</div>


</div>
<div class="c0"></div>
<ul class="nav">
<li class="main"><a href="../mod_common/index-welcome.php?lang=<?php echo LANG?>">后台首页</a></li>
  
 <li class="main navcate"><a href="javascript:void(0)" style="cursor:default">内容管理</a>
 <div class="poa dn xialabox">
	  <div class="xialabox_inc">
	     <?php contentsub();    ?>	      
	 </div>
  </div>
 
 </li>
 
 
<!--
 <li ><a href="javascript:this.location.reload()"><b class="cyel">刷新页面</b></a></li>-->
</ul>

<div class="c0"></div>

<?php 
/*no use
 $sql = "SELECT * from ".TABLE_THEME." where  ifdefault='y'  and  pbh='".USERBH."'   order by pos desc,id";
$rowtheme = getrow($sql);
if($rowtheme=='no') echo '<p class="f14bgred">注意：您还没有为网站选择一个当前模板。请赶快去修改---<a style="font-size:14px;color:yellow" href="../mod_basic/mod_theme.php">模板管理</a>。</p>';
*/?>

 
 

<div class="c0"></div>
<?php if($submenu=='product'){
?><div class="navmod">
    <?php   contentsub();?>
 
 </div>
	<?php
	}
	?>

<div class="newcnt">
 
<div class="tit_biao"><h1><?php echo $title?> </h1></div>
<div class="tit_biao_bot">
 



<?php 
/******************************/
function p20_getmodmenu($k,$name) {
	Global $andlangbh;Global $arrayprevi;
	echo '<strong>'.$name.'：</strong>';
	$ss = "select pidname,name from ".TABLE_CATE." where   pid='0' and modtype='$k' $andlangbh order by pos desc,id";
	//echo $ss;exit;
	if(getnum($ss)>0){
		$row = getall($ss);
		foreach($row as $v){
		   // $bszj=explode('-', $v['bs_zj']);//like news1-news 
			$catpid = $v['pidname'];
			$strpos = strpos($arrayprevi,$catpid);
			if(is_int($strpos)){ 
				   if($k=='node'){
						   	$link='../mod_node/mod_node.php?lang='.LANG.'&catpid='.$catpid;
						}
						echo '<a href="'.$link.'">'.decode($v['name']).'</a>  ';
			}	
		  // else if($k=='book') $link='../mod_book/mod_book.php?lang='.LANG.'&catpid='.$v['pidname'];
		  // else if($k=='hr') $link='../mod_hr/mod_hr.php?lang='.LANG.'&catpid='.$v['pidname'];
	
		}
	}
	else echo '此模块暂无分类... | ';
}//end func

 
 

 function contentsub() { global $arr_mod;
 
 
	  foreach($arr_mod as $k=>$name){
					   //echo $k;
						p20_getmodmenu($k,$name);
					 }
}//end func
 
   
?> 

