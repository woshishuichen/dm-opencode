<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';

ifhave_lang(LANG);//TEST if have lang,if no ,then jump

 
if($pidname<>'') {ifhaspidname(TABLE_REGION,$pidname);}
if($tid<>'') {ifhasid(TABLE_REGION,$tid);}


 if($act <> "pos") zb_insert($_POST);
 $title = '组合区块管理'; 
 
 //if($pidname<>'') {ifhaspidname(TABLE_BLOCK,$pidname);}
 
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
// if($pidname==''){
//         if($stylebh=='') $stylebh = $curstylebh;
// }
// else $stylebh = get_field(TABLE_REGION,'stylebh',$pidname,'pidname');


$type='common';

 

$jumpv='../mod_region/mod_regcommon.php?lang='.LANG.'&type='.$type;
 
$jumpvf=$jumpv.'&file='.$file;
$jumpvp=$jumpv.'&pidname='.$pidname;
$jumpvpf=$jumpvf.'&pidname='.$pidname;
 
// $jumpvstylebh=$jumpv.'&stylebh='.$stylebh;--no use,by pidname
// $jumpvstylebhf=$jumpvstylebh.'&file='.$file;
// $jumpvstylebhp=$jumpvstylebh.'&pidname='.$pidname;
// $jumpvstylebhpf=$jumpvstylebh.'&pidname='.$pidname.'&file='.$file;



$jumpvp_edit='mod_region_edit.php?lang='.LANG.'&pidname='.$pidname.'&type='.$type;
 


//----
 $submenu='';
 



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

 
        

 if($pidname==$bsindex) { 
 //only cur theme can do it .
//-------------------------------

 //pre($_POST );
  $pidregion = @$_POST['pidregion'];
 
 
if(count($pidregion>0)){
       $v3='';
       if(is_array($pidregion)) {
           foreach ($pidregion as $k2=>$v2){
            $v3=$v3.$v2.'|';
            }
         }   
      
    //  echo 'aaaa'.$v3;
        $ss = "update ".TABLE_STYLE." set  rgindex_design='$v3' where pidname='$curstyle'  $andlangbh  limit 1";
       // echo $ss;
         iquery($ss);


}
//---------------------------------------
}



    foreach ($_POST as $k=>$v){
         if(!is_array($v)){
         $ss = "update ".TABLE_REGION." set  pos='$v' where id='$k'   $andlangbh  limit 1";
         iquery($ss);
     }
        }
      jump($jumpvpf);
}


//-----------------------
if($act == "delregion")
{ 
 $ifdel1 = ifcandel(TABLE_REGION,$pidname,'有记录，请先删除。',$jumpvp.'&file=list');// back is fail 
 if($ifdel1) ifsuredel(TABLE_REGION,$pidname,$jumpv);
	  
}

if($act == "delsub")
{ 

ifsuredel(TABLE_REGION,$pidname2,$jumpvp.'&file=list');

}



//-----------
 
  require_once HERE_ROOT.'mod_common/tpl_header.php'; 
 require_once HERE_ROOT.'mod_region/tpl_regcommon.php'; 
require_once HERE_ROOT.'mod_common/tpl_footer.php';
 
?>