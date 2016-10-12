<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/

require_once '../config_a/common.inc2010.php';
//
 if($act <> "pos") zb_insert($_POST);

if($tid<>'') {ifhasid_nolang(TABLE_BLOCK,$tid);}
 
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
ifhave_lang(LANG);//TEST if have lang,if no ,then jump



 
$jumpv='mod_color.php?lang='.LANG;
$jumpvp=$jumpv.'&pidname='.$pidname;
$jumpvf=$jumpv.'&file='.$file;
 

//----
$submenu='basic';
$title = '配色管理';

 
 if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_BLOCK." set  pos='$v' where id='$k' and type='stylecolor'  limit 1";
         iquery($ss);
        }
      jump($jumpv);
}

 


if($act == "del")
{ 
   //ifsuredel_field(TABLE_BLOCK,'id',$pidname,'eq',$jumpv);//need lang
  $ss = "delete from ".TABLE_BLOCK." where id= '$pidname' and type='stylecolor' limit 1";
  //echo $ss;exit;
  iquery($ss);
  jump($jumpv); 
   
}

//-----------

require_once HERE_ROOT.'mod_common/tpl_header_img.php'; 
 
if($file<>'') require_once HERE_ROOT.'mod_btheme/tpl_color_'.$file.'.php';
else require_once HERE_ROOT.'mod_btheme/tpl_color.php';
 

require_once HERE_ROOT.'mod_common/tpl_footer.php';

?>


 