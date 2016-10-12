<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/


require_once '../config_a/common.inc2010.php';
ifhave_lang(LANG);//TEST if have lang,if no ,then jump


if($type=='radio' or $type=='checkbox' or $type=='select'){}
else {echo '错误的类型!<br /><br />';echo $backlist;exit;}

if($pid <> "") ifhaspidname(TABLE_FIELD,$pid);

if($act <> "pos") zb_insert($_POST);
//----------------
 $sql223 = "SELECT name from ".TABLE_FIELD." where  pidname='$pid' $andlangbh order by pos desc,id";
 $row223 = getrow($sql223);
 if($row223=='no') {echo 'error...';}
 else{
 $title = $row223['name'];
 }
 //----------------
$jumpv='mod_fieldoption.php?lang='.LANG.'&pid='.$pid.'&type='.$type;
$jumpv_file=$jumpv.'&file='.$file;

//----------------

if($act == "sta")
{
     $ss = "update ".TABLE_FIELDOPTION." set sta_visible='$v' where id=$tid $andlangbh limit 1";
	// echo $ss;exit;
    iquery($ss);
    jump($jumpv);
}

if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_FIELDOPTION." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv);
}
if($act == "del")
{  

ifcandel_field(TABLE_FIELDVALUE,'value',$pidname,'like','出错，有文章用到了这个选项！请先删除用了这个选项的文章！或者不用删除，直接隐藏这个选项。',$jumpv);
//ifcandel_field($table,$field,$value,$typelike,$back)
  
 ifsuredel_field(TABLE_FIELDOPTION,'pidname',$pidname,'',$jumpv);
 //ifsuredel_field($table,$field,$value,$typelike,$back)
//old way: ifsuredel(TABLE_FIELDOPTION,$pidname,$jumpv);
}


//-------------------
require_once HERE_ROOT.'mod_common/tpl_header_img.php';
 
 
if($file==""){  require_once HERE_ROOT.'mod_field/tpl_fieldoption.php'; 
}
else  require_once HERE_ROOT.'mod_field/tpl_fieldoption_addedit.php'; 
 

require_once HERE_ROOT.'mod_common/tpl_footer.php';

?>