<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';

ifhave_lang(LANG);//TEST if have lang,if no ,then jump

 
if($pidname<>'') {ifhaspidname(TABLE_REGION,$pidname);}
if($tid<>'' || $tid==0) {ifhasid(TABLE_REGION,$tid);}
 

 if($act <> "pos") zb_insert($_POST);
 
 //if($pidname<>'') {ifhaspidname(TABLE_BLOCK,$pidname);}
 
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
 $title = '区域管理'; 
 $type='index'; 

 
$jumpv='mod_region_edit.php?lang='.LANG.'&type='.$type;
$jumpvreg='mod_region.php?lang='.LANG.'&type='.$type;//use for back region sub list
 
$jumpvf=$jumpv.'&file='.$file;
$jumpvp=$jumpv.'&pidname='.$pidname;
$jumpvpf=$jumpvf.'&pidname='.$pidname;

 


//----
 $submenu='';
 

  

$title = $title.'---'.get_field(TABLE_REGION,'name',$pidname,'pidname');


$blocklist_cur='';$blockedit_cur='';
 if($file=="list" or $file=="addedit")   $blocklist_cur=' cur';
 elseif($file=="mainaddedit")   $blockedit_cur=' cur';
 
//---
if($act == "sta")
{
     $ss = "update ".TABLE_REGION." set sta_visible='$v' where id=$tid $andlangbh limit 1";
	// echo $ss;exit;
    iquery($ss);
    jump($jumpvpf); 
}

//-------------
if($act == "posmain")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_REGION." set  pos='$v' where id='$k' and pid='0'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpvpf);
}


if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_REGION." set  pos='$v' where id='$k'   $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpvpf);
}


//-----------------------
if($act == "delregion")
{ 
 $ifdel1 = ifcandel(TABLE_REGION,$pidname,'区域有区块，请先删除。',$jumpvp.'&file=list');// back is fail 
 if($ifdel1) ifsuredel(TABLE_REGION,$pidname,$jumpv);
	  
}

if($act == "delsub")
{ 
 $ifdel1 = ifcandel(TABLE_IMGFJ,$pidname2,'编辑器附件里有图片。请先删除。',$jumpvp.'&file=list');// back is fail 
 if($ifdel1) ifsuredel(TABLE_REGION,$pidname2,$jumpvp.'&file=list');
  
}



//-----------

require_once HERE_ROOT.'mod_common/tpl_header.php'; 
//require_once HERE_ROOT.'mod_region/tpl_region_'.$file.'.php';
require_once HERE_ROOT.'mod_region/tpl_region_edit.php';
require_once HERE_ROOT.'mod_common/tpl_footer.php';
 
?>