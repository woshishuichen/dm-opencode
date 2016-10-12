<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/

require_once '../config_a/common.inc2010.php';

ifhave_lang(LANG);//TEST if have lang,if no ,then jump

if($act <> "pos") zb_insert($_POST);
/********************************************/
$title = '菜单管理';
//
/************************/
//$sql = "SELECT id from ".TABLE_MENU." where pbh='".USERBH."'  order by id desc";
 // $num = getnum($sql);
 // $limitnum='菜单限制数：'.$num_menu.' / 已用数：'.$num;
$stylebh = $curstyledebug;

$jumpv='mod_menu.php?lang='.LANG;
$jumpvf='mod_menu.php?lang='.LANG.'&file='.$file;
 


   $ss = "select sta_cusmenu,cusmenu from ".TABLE_STYLE." where pidname='$stylebh' $andlangbh limit 1"; 
   $row = getrow($ss);
    $sta_cusmenu= $row['sta_cusmenu'];
 $cusmenu= $row['cusmenu'];//use in cusmenu.php


 
if($act == "sta_menu")
{ 
     $ss = "update ".TABLE_MENU." set sta_visible='$v' where id=$tid $andlangbh limit 1";	 
     iquery($ss);
    jump($jumpv);
}
if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_MENU." set  pos='$v' where id='$k'  $andlangbh limit 1";
         iquery($ss);
        }
      jump($jumpv);
}
//-------------------
if($act == "del")
{ 
 $ifdel1 = ifcandel(TABLE_MENU,$pidname,'出错，有子菜单！',$jumpv);// back is fail 
if($ifdel1){
  ifsuredel(TABLE_MENU,$pidname,$jumpv);
  }
	
}

 

require_once HERE_ROOT.'mod_common/tpl_header.php';
?>
<?php //stylebhcntlink($stylebh);?>


<div class="menu">
<?php if($sta_cusmenu=='n'){
  ?>
<a href="<?php echo $jumpv;?>">管理列表</a>
<a href="<?php echo $jumpv;?>&file=pageadd&act=add">添加单页面菜单</a>
<a href="<?php echo $jumpv;?>&file=cateadd&act=add">添加分类菜单</a>

<a href="<?php echo $jumpv;?>&file=cusaddedit&act=add">添加其他菜单</a>
<?php }?>
<a href="<?php echo $jumpv;?>&file=cusmenu&act=edit" style="color:#FF9935">自定义菜单内容</a>
<!-- <a href="<?php //echo $jumpv_edit_custom;?>">自定义菜单</a>
 -->
</div>
<?php

if($sta_cusmenu=='n'){
if($file=='') require_once HERE_ROOT.'mod_menu/tpl_menu_list.php';
else  require_once HERE_ROOT.'mod_menu/tpl_menu_'.$file.'.php';
}
else {echo '<p class="hintbox">启动了自定义菜单的内容，如果要取消自定义功能，请点击上面链接 修改即可。</p>';

   require_once HERE_ROOT.'mod_menu/tpl_menu_cusmenu.php';
}
 
require_once HERE_ROOT.'mod_common/tpl_footer.php';
//echo "$hotellist<pre>".print_r($_POST,1)."</pre><hr>";
//echo 'kk';
//echo substr($_FILES['addr']['name'],-3);
?>