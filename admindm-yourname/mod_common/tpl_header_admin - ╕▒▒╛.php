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
<link rel="shortcut icon" href="../cssjs/ico/favicon2_<?php echo LANG?>.ico" />
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
<select name="sellang" onchange="gosele(this,'lang','../mod_basic/mod_lang.php?')">
<option>切换语言</option>
<?php navlang();?>
</select>
</div>


</div>
<div class="c0"></div>
<ul class="nav">
<li class="main"><a href="../mod_common/index-welcome.php?lang=<?php echo LANG?>">后台首页</a></li>
 <li class="main navcate"><a href="javascript:void(0)" style="cursor:default">网站设置</a>
 <div class="poa dn xialabox">
	  <div class="xialabox_inc">
	     <?php basicsub();    ?>	      
	 </div>
  </div>
  </li>
 <li class="main"><a href="../mod_menu/mod_menu.php?lang=<?php echo LANG?>">菜单和单页面管理</a></li>
 <li class="main navcate"><a href="javascript:void(0)" style="cursor:default">分类和内容管理</a>
 <div class="poa dn xialabox">
	  <div class="xialabox_inc">
	     <?php contentsub();    ?>	      
	 </div>
  </div>
 
 </li>
  <li class="main navcate"><a href="javascript:void(0)" style="cursor:default">布局</a>
 <div class="poa dn xialabox">
	  <div class="xialabox_inc">  <?php   layoutsub();  ?>	      
	 </div>
  </div>
 
 </li>
   <li class="main navblock"><a href="javascript:void(0)" style="cursor:default">区块</a>
	  <div  class="poa dn xialabox">
	  <ul class="xialabox_inc">
		<?php blocksub();?>	  
	</ul>
	</div>   
</li>


  <li class="main navblock"><a href="javascript:void(0)" style="cursor:default">模块管理</a>
	  <div  class="poa dn xialabox">
	  <ul class="xialabox_inc">
		<?php modulesub();?>	  
	</ul>
	</div>   
</li>


  <li class="main navblock"><a href="javascript:void(0)" style="cursor:default">媒体管理</a>
	  <div  class="poa dn xialabox">
	  <ul class="xialabox_inc">
		<?php imgfjsub();?>	  
	</ul>
	</div>   
</li>



<!--
 <li class="main"><a href="../mod_imgfj/mod_imgfj.php?pid=name&lang=<?php //echo LANG?>" target="_blank">名称附件管理</a></li>


<li class="main navblock">
 <a href="javascript:void(0)" style="cursor:default">订单管理</a>
 <div class="poa dn xialabox">
	  <div class="xialabox_inc">	   
		  <?php   // ddordersub();   ?>	      
	 </div>
  </div>

  </li>
-->

<li class="main navblock last">
 <a href="../mod_account/mod_account.php?lang=<?php echo LANG?>">帐号管理</a>
<!--
 <a href="javascript:void(0)" style="cursor:default">帐号管理</a>
 <div class="poa dn xialabox">
	  <div class="xialabox_inc">	   
		  <?php   // accountsub();   ?>	      
	 </div>
  </div>-->

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



<?php if($submenu=='product'){
?><div class="navmod">
    <?php   contentsub();?>
 
 </div>
	<?php
	}
if($submenu=='block'){
	?><div class="navmod">	  
       <strong>区块管理：</strong>         
          <?php   blocksub();?>
        
     </div>
	<?php
	} 

	if($submenu=='module'){
	?><div class="navmod">	  
       <strong>模块管理：</strong>         
          <?php   modulesub();?>
        
     </div>
	<?php
	} 


 if($submenu=='layout'){
	?><div class="navmod">	  
       <strong>区块和区域：</strong>         
          <?php   layoutsub();?>
        
     </div>
	<?php
	} 
 
if($submenu=='ddorder'){
	?><div class="navmod">	  
       <strong>管理：</strong>         
          <?php   ddordersub();?>
        
     </div>
	<?php
	} 
if($submenu=='basic'){
	?><div class="navmod">	  
       <strong>管理：</strong>         
          <?php   basicsub();?>
        
     </div>
	<?php
	} 


	?>
	

<div class="c0"></div>


<div class="newcnt">
 
<div class="tit_biao"><h1><?php echo $title?> </h1></div>
<div class="tit_biao_bot">
 




<?php 
/******************************/
function p20_getmodmenu($k,$name) {
	Global $andlangbh;
	echo '<strong>'.$name.'：</strong>';
	$ss = "select pidname,name from ".TABLE_CATE." where   pid='0' and modtype='$k' $andlangbh order by pos desc,id";
	// echo $ss;exit;
	if(getnum($ss)>0){
		$row = getall($ss);
		foreach($row as $v){
		   // $bszj=explode('-', $v['bs_zj']);//like news1-news 
		   if($k=='node') $link='../mod_node/mod_node.php?lang='.LANG.'&catpid='.$v['pidname'];
		   else if($k=='blockdh') $link='../mod_node/mod_blockdh.php?lang='.LANG.'&catpid='.$v['pidname'];
		   else if($k=='hr') $link='../mod_hr/mod_hr.php?lang='.LANG.'&catpid='.$v['pidname'];
		echo '<a href="'.$link.'">'.decode($v['name']).'</a>  ';
		}
	}
	else echo '此模块暂无分类... | ';
}//end func

function blocksub() {
//echo  '<a href="../mod_group/mod_effect.php?lang='.LANG.'">区块效果文件管理</a>';
	 echo  '<a href="../mod_block/mod_block.php?lang='.LANG.'">图文区块管理</a>';
  //echo  '<a href="../mod_block/mod_img.php?lang='.LANG.'">效果区块管理</a>';
 echo  '<a href="../mod_block/mod_nodelist.php?lang='.LANG.'">文章列表区块管理</a>'; 
 
}//end func

function modulesub() {

 echo  '<a href="../mod_module/mod_baidumap.php?lang='.LANG.'&file=list">百度地图参数</a>';
echo  '<a href="../mod_module/mod_alias.php?lang='.LANG.'&file=list" target="_blank">搜索别名</a>'; 
echo  '<a href="../mod_module/mod_bakdata.php?lang='.LANG.'&file=list" target="_blank">备份数据库</a>'; 
echo  '<a href="../mod_module/mod_sqcode.php?lang='.LANG.'&file=list" target="_blank">系统授权代码</a>';
echo  '<a href="../mod_comment/mod_comm_contact.php?lang='.LANG.'">留言管理</a>';
//echo  '<a href="../mod_ddorder/mod_ddorder.php?lang='.LANG.'">订单管理</a>';

 
}//end func
 
 function accountsub() {
 echo  '<a href="../mod_account/mod_account.php?lang='.LANG.'">帐号管理</a>';
echo  '<a href="../mod_account/mod_user.php?lang='.LANG.'&file=list">添加管理员</a>';
 
}//end func

 function ddordersub() {global $baseurl;
 echo  '<a href="../mod_ddorder/mod_ddorder.php?lang='.LANG.'">订单管理</a>';
echo  '<a href="../mod_ddorder/mod_ddproduct.php?lang='.LANG.'">订单的产品管理</a>';
 echo  '<a target="_blank" href="'.$baseurl.'ddorder.php">前台下单</a>';
}//end func

 function imgfjsub() {
 echo  '<a href="../mod_imgfj/mod_imgfj.php?pid=name&lang='.LANG.'" target="_blank">名称附件管理</a>';
 echo  '<a href="../mod_imgfj/mod_imgfj.php?pid=common&lang='.LANG.'" target="_blank">公共编辑器附件管理</a>';
 
}//end func


 
 
function basicsub() {		
 echo  '<a href="../mod_basic/mod_lang.php?lang='.LANG.'">网站设置和多语言管理</a>';
 echo  '<a href="../mod_basic/mod_style.php?lang='.LANG.'">样式管理</a>';
 
}//end func
function layoutsub() {	
echo  '<a href="../mod_region/mod_region.php?lang='.LANG.'">区域管理</a>';
echo  '<a href="../mod_layout/mod_layoutcommon.php?lang='.LANG.'">公共布局管理</a>';
//echo  '<a href="../mod_layout/mod_layoutindex.php?lang='.LANG.'">首页布局设置</a>';
 
}//end func

 function contentsub() { global $arr_mod;
 
	echo  '<a href="../mod_category/mod_category.php?lang='.LANG.'">分类管理</a>';
 
	  foreach($arr_mod as $k=>$name){
					   //echo $k;
						p20_getmodmenu($k,$name);
					 }
}//end func
 
   
?> 
