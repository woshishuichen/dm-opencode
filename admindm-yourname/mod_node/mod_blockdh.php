<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
$mod_previ = 'normal';//default is admin,and set in common.inc
require_once '../config_a/common.inc2010.php';
require_once HERE_ROOT.'config_a/func.previ.php';//when normal,require is here.
//
if($catpid <> "")  ifhaspidname(TABLE_CATE,$catpid);
if($catid <> "")  ifhaspidname(TABLE_CATE,$catid);

ifhave_lang(LANG);//TEST if have lang,if no ,then jump
if($act <> "pos") zb_insert($_POST);

$submenu='';//use for show news menu
$maxline=10;
$namesm='';
//-----------------------------
//
$jumpv='mod_blockdh.php?lang='.LANG.'&catpid='.$catpid.'&page='.$page;
$jumpv_catid='mod_blockdh.php?lang='.LANG.'&catpid='.$catpid.'&catid='.$catid.'&page='.$page;

$jumpv_list=$jumpv_catid.'&file=list';
$jumpv_add=$jumpv_catid.'&file=add';
$jumpv_edit=$jumpv_catid.'&file=edit';


/********************************************************/
/*get title***************************/ 
  $maincate = get_field(TABLE_CATE,'name',$catpid,'pidname');
   $title= '效果区块的内容管理 - '.$maincate;
/****************************/
 

if($act == "sta_node")
{
     $ss = "update ".TABLE_NODE." set sta_visible='$v' where id='$tid' and ppid='$catpid' $andlangbh limit 1";
    iquery($ss);
    jump($jumpv_list);
}

if($act == "pos")
{
   foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_NODE." set  pos='$v' where id='$k' and ppid='$catpid' $andlangbh limit 1";
         iquery($ss);
        }
    jump($jumpv_list);
}


if($act == "delnode") 
{  

$nodearr = get_fieldarr(TABLE_NODE,$pidname,'pidname');
$kv = $nodearr['kv'];
$kvsm = $nodearr['kvsm'];
$kvsm2 = $nodearr['kvsm2'];
p2030_delimg($kv,'y','n');//p2030_delimg($addr,$delbig,$delsmall);
p2030_delimg($kvsm,'n','y');
p2030_delimg($kvsm2,'n','y');

//pre($nodearr);
 ifsuredel_field(TABLE_NODE,'pidname',$pidname,'equal',$jumpv_list);

}

/*****
****
***
*********************/


require_once HERE_ROOT.'mod_common/tpl_header.php'; 
 
require_once HERE_ROOT.'mod_node/tpl_blockdh.php';

require_once HERE_ROOT.'mod_common/tpl_footer.php';


?>