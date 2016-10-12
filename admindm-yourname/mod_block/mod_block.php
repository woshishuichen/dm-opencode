<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
 if($act <> "pos") zb_insert($_POST);
 
if($pidname<>'') {ifhaspidname(TABLE_BLOCK,$pidname);}

if($tid<>'') {ifhasid(TABLE_BLOCK,$tid);}

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

// if($stylebh=='') $stylebh = $curstylebh;

$stylebh = $curstyledebug;

 
$jumpv='mod_block.php?lang='.LANG;
$jumpvp=$jumpv.'&pidname='.$pidname;
$jumpvf=$jumpv.'&file='.$file;
$jumpvpf=$jumpvp.'&file='.$file;


 
//$jumpv_editblock = $jumpv.'&pidname='.$pidname.'&file=mainedit&act=edit';
//----


$submenu='block';
$title = '区块管理';
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
         $ss = "update ".TABLE_BLOCK." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpvpf);
}
if($act == "possub")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_BLOCK." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpvpf);
}

if($act == "sta_lunh")
{ 
     $ss = "update ".TABLE_BLOCK." set sta_visible='$v' where id=$tid $andlangbh limit 1";	 
     iquery($ss);
    jump($jumpvpf); 
}

if($act == "delblock")
{ 


 $jumpv_back = $jumpvp.'&file=sublist';
 //function ifcandel_field($table,$field,$value,$typelike,$error,$back){
 //function ifsuredel_field($table,$field,$value,$typelike,$back){
 
 $ifdel1 = ifcandel_field(TABLE_BLOCK,'pid',$pidname,'eq','有记录。请先删除。',$jumpv_back);
//$ifdel1 = ifcandel_field(TABLE_IMGFJ,'pid',$pidname,'eq','编辑器附件里有图片。请先删除。',$jumpv_back);

 if($ifdel1) ifsuredel_field(TABLE_BLOCK,'pidname',$pidname,'eq',$jumpv);
	 
}
//---------

if($act == "delimg")
{ 
     $sqlsub = "SELECT * from ".TABLE_BLOCK."  where id='$tid' $andlangbh order by id limit 1";
   //echo $sqledit;exit;
$rowsub = getrow($sqlsub);
$imgsqlname = $rowsub['kv'];
$pidname = $rowsub['pidname'];

    $jumpv_back = $jumpv;
    $ifdel1 = ifcandel_field(TABLE_IMGFJ,'pid',$pidname,'eq','编辑器里有图片。请先删除。',$jumpv_back);
    if($ifdel1){
        if($imgsqlname<>'')  p2030_delimg($imgsqlname,'y','y');
        ifsuredel_field(TABLE_BLOCK,'pidname',$pidname,'eq',$jumpv_back);
    }
	
}

//-----------

require_once HERE_ROOT.'mod_common/tpl_header.php';
?>

<?php //stylebhcntlink($stylebh);?>


 <div class="menu">
 <a href="<?php echo $jumpv?>">管理列表</a>

<a href="<?php echo $jumpv?>&file=add&act=add">添加区块</a>
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



 
 
</div>



<?php
 if($file=='') require_once HERE_ROOT.'mod_block/tpl_block.php';
 else require_once HERE_ROOT.'mod_block/tpl_block_'.$file.'.php';
 
require_once HERE_ROOT.'mod_common/tpl_footer.php';



?>