<?php
/*
  欢迎使用DM建站系统，网址：www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}
//----------

$effect = get_field(TABLE_REGION,'effect',$tid,'id'); //function get_field($table,$field,$v,$type){
//echo $effect;

?> 
 <div class="menu">
<?php
// echo  '<span style="display:inline-block">'.$text_imgfjlink.'</span>';
  //echo  '<a class="needpopup" href="../mod_module/mod_showblockid.php?pidname='.$curstyle.'&lang='.LANG.'" >区域和区块的标识管理</a>';
?>
</div>

<?php 
	$sql = "SELECT * from ".TABLE_REGION."  where id='$tid' $andlangbh order by id limit 1";
$row = getrow($sql);
 
$name=$row['name'];$namebz=$row['namebz'];
 
?>
<h2 class="h2tit_biao">标题：<?php echo $name?>  
<?php if($namebz<>''){ ?> | 
<span class="cgray">说明：<?php echo $namebz?></span>
<?php } ?>


<a style="color:red;font-size:16px" href="mod_region.php?lang=<?php echo LANG?>&type=<?php echo $type?>&pid=<?php echo $pidname?>&file=sub">< 返回区域列表</a>

</h2>
<div class="menusub" style="margin-top:22px;">

<?php

//--------------
 $editcan_cur=  $editstyle_cur=$editlink_cur=$edittitle_cur=$editcfg_cur='';

 if($file=="editcan")   $editcan_cur=' cur'; 
 elseif($file=="editcfg")   $editcfg_cur=' cur';
 elseif($file=="editstyle")   $editstyle_cur=' cur';
 elseif($file=="editlink")   $editlink_cur=' cur';
elseif($file=="edittitle" || $file=="edittitlecenter")   $edittitle_cur=' cur';
//mod_region_edit.php?lang=cn&pidname=region20160307_1119576083&file=edit&act=edit&tid=127

if($file<>'move'){
echo '<a class="bg22'.$editcan_cur.'" href="'.$jumpvp.'&act=edit&file=editcan&tid='.$tid.'"><span  class="bg22" >修改标题</span></a>';


echo '<a class="bg22'.$editcfg_cur.'" href="'.$jumpvp.'&act=edit&file=editcfg&tid='.$tid.'"><span  class="bg22" >修改样式</span></a>';


 
// echo '<a class="bg22'.$editstyle_cur.'" href="'.$jumpvp.'&act=edit&file=editstyle&tid='.$tid.'"><span  class="bg22" >修改样式</span></a>';
// if($effect=='block_titlecenter' || $effect=='block_title')
//  echo '<a class="bg22'.$editlink_cur.'" href="'.$jumpvp.'&act=edit&file=editlink&tid='.$tid.'"><span  class="bg22" >更多链接</span></a>';
 
//  if($effect=='block_titlecenter')
//  	echo '<a class="bg22'.$edittitle_cur.'" href="'.$jumpvp.'&act=edit&file=edittitlecenter&tid='.$tid.'"><span  class="bg22" >标题样式</span></a>';
 
//   if($effect=='block_title')
//   	echo '<a class="bg22'.$edittitle_cur.'" href="'.$jumpvp.'&act=edit&file=edittitle&tid='.$tid.'"><span  class="bg22" >标题样式</span></a>';

}
?>
 
 

</div>



 <div style="padding:20px;"> 
 <?php 
 if($file=='editalbum'){
//....
 }
 elseif($file=='edittab'){
//...
 }
 

  else
 require_once HERE_ROOT.'mod_region/tpl_region_'.$file.'.php';
 ?>
 </div> 
 <div style="height:50px"> </div>
 
 