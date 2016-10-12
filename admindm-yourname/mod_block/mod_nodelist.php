<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
 
 if($act <> "pos") zb_insert($_POST);
 
 if($pidname<>'') {ifhaspidname(TABLE_BLOCK,$pidname);}

 // if($pid2=='') $pid2 = $curregionindex;
 //   if($pid2<>'') {ifhaspidname(TABLE_REGION,$pid2);}
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

// if($pidname==''){ //when edit .
//         if($stylebh=='') $stylebh = $curstylebh;
// }
// else $stylebh = get_field(TABLE_BLOCK,'stylebh',$pidname,'pidname');

$stylebh = $curstyledebug;

 
$jumpv='mod_nodelist.php?lang='.LANG;
$jumpvp=$jumpv.'&pidname='.$pidname;
$jumpvf=$jumpv.'&file='.$file;
$jumpvpf=$jumpvp.'&file='.$file;
 
 

//----
$submenu='block';
$title = '效果区块管理 ';


 $sql22= "SELECT nd_design from " . TABLE_STYLE . "  where   pidname='$curstyle'  $andlangbh order by id limit 1";
 $row22 = getrow($sql22);
 $nd_design = $row22['nd_design'];

 
//---
if($act == "pos")
{

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
        $ss = "update ".TABLE_STYLE." set  nd_design='$v3' where pidname='$curstyle'  $andlangbh  limit 1";
       // echo $ss;
         iquery($ss);


}




    foreach ($_POST as $k=>$v){
          if(!is_array($v)){
             $ss = "update ".TABLE_BLOCK." set  pos='$v' where id='$k'  $andlangbh  limit 1";
             iquery($ss);
           }
        }
      jump($jumpv);
}

if($act == "posall")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_BLOCK." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv.'&file=all');
}



if($act == "sta")
{ 
     $ss = "update ".TABLE_BLOCK." set sta_visible='$v' where id=$tid $andlangbh limit 1";   
     iquery($ss);
    jump($jumpv); 
}

if($act == "staall")
{ 
     $ss = "update ".TABLE_BLOCK." set sta_visible='$v' where id=$tid $andlangbh limit 1";   
     iquery($ss);
          jump($jumpv.'&file=all');
}


if($act == "delblock")
{ 
 //$jumpv_back = $jumpv_pidnamefile.'&act=edit';
 //$ifdel1 = ifcandel(TABLE_IMGFJ,$pidname,'编辑器附件里有图片。请先删除。',$jumpv_back);// back is fail 
$ifdel1=true;


 $sqlsub = "SELECT * from ".TABLE_BLOCK."  where pidname='$pidname' $andlangbh order by id limit 1";
   //echo $sqledit;exit;
$rowsub = getrow($sqlsub);
$imgsqlname = $rowsub['kv'];
 
   if($imgsqlname<>'')  p2030_delimg($imgsqlname,'y','n');

 if($ifdel1) ifsuredel(TABLE_BLOCK,$pidname,$jumpv);
	
}
//-----------

require_once HERE_ROOT.'mod_common/tpl_header.php'; 
?>
<?php // stylebhcntlink($stylebh);?>



<!-- &nbsp;&nbsp;后台模板编号: -->
<?php //、echo $curstyledebug.' -- '.get_field(TABLE_STYLE,'title',$curstyledebug,'pidname')?>


<?php 
//$jumpvsel = 'mod_nodelist.php?lang='.LANG.'&';
//if($stylebh=='') $stylebh = $curstylebh; //move to mod.php
?>
<!-- &nbsp;&nbsp;选择样式编号:
<select name="sellang" onchange="gosele(this,'stylebh','<?php //echo $jumpvsel;?>')">
  -->
  <?php //sele_stylebh($arr_stylebh,$stylebh);?>

<!-- </select> -->

 


<?php
if($file=='addedit') require_once HERE_ROOT.'mod_block/tpl_nodelist_addedit.php'; 
else if($file=='all') require_once HERE_ROOT.'mod_block/tpl_nodelist_all.php'; 
else  require_once HERE_ROOT.'mod_block/tpl_nodelist.php'; 
require_once HERE_ROOT.'mod_common/tpl_footer.php';

?>
