<?php
/*
	 
    //act:list edit del delimg updatetime submit(update add )
*/
$mod_previ = 'normal';//default is admin,and set in common.inc
require_once '../config_a/common.inc2010.php';
ifhave_lang(LANG);//TEST if have lang,if no ,then jump
  // ECHO $LANG;exit;
if($tid<>'') ifhasid(TABLE_ALIAS,$tid); 

if($file<>'list'){
  		if($type=='page') ifhaspidname(TABLE_PAGE,$pid);
		else if($type=='cate') ifhaspidname(TABLE_CATE,$pid);
		else if($type=='node') ifhaspidname(TABLE_NODE,$pid);
	 	else  {echo '出错，别名类型不存在！';exit;}



$sqllayout = "SELECT * from ".TABLE_ALIAS."  where pid='$pid' and type='$type' $andlangbh order by id limit 1";	
	//echo $sqllayout;exit; 
	  if(getnum($sqllayout)>0){ 
		$row = getrow($sqllayout); 
		$tid=$row['id']; 
		$name=$row['name'];  		
		}
	  else{
	   // $ss = "insert into ".TABLE_ALIAS." (pid,pbh,lang,type) values ('$pid','$user2510','".LANG."','$type')"; //	iquery($ss);
			//echo $ss;exit;
			}
			
} 			
  

 if($act <> "pos") zb_insert($_POST);
//
$jumpv='mod_alias.php?lang='.LANG.'&pid='.$pid.'&type='.$type;
$jumpv_list='mod_alias.php?lang='.LANG.'&file=list';
//$jumpv_file=$jumpv.'&file='.$file;



if($file=='list' or $type2=='fromlist') {
	$title='别名管理';
	require_once HERE_ROOT.'mod_common/tpl_header_img.php';
}
else {
	$title='修改别名';
	require_once HERE_ROOT.'mod_common/tpl_header_iframe.php';
}

 
if($act == "del")
{ 
ifsuredel_field(TABLE_ALIAS,'id',$tid,'equal',$jumpv_list);

}



?>
 <h2 class="h2tit_biao"><?php echo $title?></h2>
<div class="pro_album" style="border:1px solid #ccc;padding:20px">

<?php
if($file=='list')  require_once HERE_ROOT.'mod_module/tpl_alias_list.php';
 else require_once HERE_ROOT.'mod_module/tpl_alias.php';
 
?>
<div class="c"></div>
</div>

 
</body>
</html>