<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
$mod_previ = 'normal';//default is admin,and set in common.inc
require_once '../config_a/common.inc2010.php';
require_once HERE_ROOT.'config_a/func.previ.php';//when normal,require is here.
//
if($catpid <> "")  ifhaspidname(TABLE_CATE,$catpid);
if($catid <> "")  ifhaspidname(TABLE_CATE,$catid);

$modtype = get_field(TABLE_CATE,'modtype',$catpid,'pidname');
if($modtype<>'node') {echo 'modtype must be node';exit;}

ifhave_lang(LANG);//TEST if have lang,if no ,then jump
if($act <> "pos") zb_insert($_POST);

$submenu='product';//use for show news menu
$maxline=20;
$namesm='';
//-----------------------------
//
$jumpv='mod_node.php?lang='.LANG.'&catpid='.$catpid.'&page='.$page;
$jumpv_catid='mod_node.php?lang='.LANG.'&catpid='.$catpid.'&catid='.$catid.'&page='.$page;

$jumpv_add=$jumpv_catid.'&act=add';


/********************************************************/
/*get title***************************/ 
  $maincate = get_field(TABLE_CATE,'name',$catpid,'pidname');
   $title= '内容模块管理 - '.$maincate;
/****************************/
 

if($act == "sta_node")
{
     $ss = "update ".TABLE_NODE." set sta_visible='$v' where id='$tid' and ppid='$catpid' $andlangbh limit 1";
    iquery($ss);
    jump($jumpv_catid);
}

if($act == "pos")
{
   foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_NODE." set  pos='$v' where id='$k' and ppid='$catpid' $andlangbh limit 1";
         iquery($ss);
        }
    jump($jumpv_catid);
}


if($act == "delnode") 
{  
$ifdel1 =  ifcandel_field(TABLE_IMGFJ,'pid',$pidname,'equal','出错，编辑器里有图片，请先删除编辑器图片！',$jumpv_catid);
//$ifdel1 = ifcandel(TABLE_IMGFJ,$pidname,'出错，编辑器里有图片，请先删除编辑器图片！',$jumpv_catid);
$ifdel1 =  ifcandel_field(TABLE_ALBUM,'pid',$pidname,'equal','出错，相册里有图片，请先删除相册图片！',$jumpv_catid);
 
if($ifdel1)  ifsuredel_field(TABLE_NODE,'pidname',$pidname,'equal',$jumpv_catid);

}

/*****
****
***
*********************/


require_once HERE_ROOT.'mod_common/tpl_header.php'; 
 
require_once HERE_ROOT.'mod_node/tpl_node_list.php';

require_once HERE_ROOT.'mod_common/tpl_footer.php';


?>