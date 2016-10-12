<?php
/*
	 
    //act:list edit del delimg updatetime submit(update add )
*/
$mod_previ = 'normal';//default is admin,and set in common.inc
require_once '../config_a/common.inc2010.php';
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

  // ECHO $LANG;exit;
 if($act <> "pos") zb_insert($_POST);
 
 $pidstring = substr($pid,0,4);
 //echo $pidstring;
 if($pidstring=='node') {ifhaspidname(TABLE_NODE,$pid);$title='编辑器附件管理';}
 else if($pidstring=='bloc' or $pidstring=='taba' ) {ifhaspidname(TABLE_REGION,$pid);$title='编辑器附件管理';}
  else if($pidstring=='taba') {ifhaspidname(TABLE_BLOCK,$pid);$title='编辑器附件管理';}
    else if($pidstring=='vblo') {ifhaspidname(TABLE_BLOCK,$pid);$title='编辑器附件管理';}
   else if($pidstring=='acco') {ifhaspidname(TABLE_BLOCK,$pid);$title='编辑器附件管理';}
  else if($pidstring=='page') {ifhaspidname(TABLE_PAGE,$pid);$title='编辑器附件管理';}
  else if($pidstring=='name') {$title='名称附件管理';}
   else if($pidstring=='comm') {$title='公共编辑器附件管理';}
  else if($pidstring=='grou') {ifhaspidname(TABLE_BLOCK,$pid);$title='编辑器附件管理';}
  else if($pidstring=='dhsu') {ifhaspidname(TABLE_BLOCK,$pid);$title='编辑器附件管理';}
  else if($pidstring=='regs') {ifhaspidname(TABLE_REGION,$pid);$title='编辑器附件管理';}

 else {echo '出错,没有分类!';exit;}
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);

$jumpv='mod_imgfj.php?lang='.LANG.'&pid='.$pid;
$jumpv_file=$jumpv.'&file='.$file;


//-----------
  if($act=="edit" or $act=="delimg" or $act=="update"){
	 $sql="select kv,title from ".TABLE_IMGFJ." where id='$tid' $andlangbh order by id limit 1";
	$row=getrow($sql);
	$imgsqlname=$row['kv']; //$imgsqlname is important
  }
 
 
 if($act=="delimg"){
p2030_delimg($imgsqlname,'y','n');//p2030_delimg($addr,$delbig,$delsmall)	  
	$ss = "delete from ".TABLE_IMGFJ." where id=$tid $andlangbh limit 1";
	iquery($ss);
	jump($jumpv);
	
}
 



require_once HERE_ROOT.'mod_common/tpl_header_popup.php';

require_once HERE_ROOT.'mod_imgfj/tpl_imgfj_add.php';
?>



<?php
if($file=='')
require_once HERE_ROOT.'mod_imgfj/tpl_imgfj.php';
else require_once HERE_ROOT.'mod_imgfj/tpl_imgfj_'.$file.'.php';

require_once HERE_ROOT.'mod_common/tpl_footer.php';
?>
 
 