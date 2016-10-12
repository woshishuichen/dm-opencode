<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
 //if($act <> "pos") zb_insert($_POST);//will error of Warning: addslashes() because checkbox.
 
//if($pidname<>'') {ifhaspidname(TABLE_USER,$pidname);}
if($tid<>'') {ifhasid_nolang(TABLE_USER,$tid);}

/*
if (!in_array($type,$arr_group_type))
  {
  echo "error,type:".$type.' not exist...... in array:arr_group_type' ;
  exit;
  }
*/

 
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

$jumpv='mod_user.php?lang='.LANG;
$jumpvp=$jumpv.'&pidname='.$pidname;
$jumpvf=$jumpv.'&file='.$file;
$jumpvpf=$jumpvp.'&file='.$file;
$jumpvtf=$jumpvp.'&file='.$file.'&tid='.$tid;


$jump_addimg = $jumpvp.'&file=subadd&act=addsub';

$jumpv_imglist = $jumpv.'&pidname='.$pidname.'&file=sublist';
$jumpv_editblock = $jumpv.'&pidname='.$pidname.'&file=mainedit&act=edit';
//----
$submenu='account';
$title = '添加管理员';
/*-----------
*/
$blocklist_cur='';$blockedit_cur='';
 if($file=="subedit"  or $file=="sublist")   $blocklist_cur=' cur';
 elseif($file=="mainedit")   $blockedit_cur=' cur';
 
//---


//----------
if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_USER." set  pos='$v' where id='$k'   limit 1";
         iquery($ss);
        }
      jump($jumpvpf);
} 
 
if($act == "deluser")
{ 
  $ss2 = "delete from ".TABLE_USER."  where id= '$tid' and type='normal' limit 1"; 
  //echo $ss2;exit; 
      iquery($ss2); 
     alert('删除成功');
      jump($jumpv);
	 
}
//---------

 

//-----------

require_once HERE_ROOT.'mod_common/tpl_header.php';
 
require_once HERE_ROOT.'mod_account/tpl_user.php';
 
require_once HERE_ROOT.'mod_common/tpl_footer.php';



?>