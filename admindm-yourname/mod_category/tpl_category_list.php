<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<div class="menu">
<a href="<?php echo $jumpv;?>">管理列表</a>
<a href="<?php echo $jumpv_addmain;?>">添加主类</a>
</div>
 <div class="pro_album_left">
 <h3>主分类管理</h3>





<form method=post action="<?php echo $jumpv_back;?>&act=posleft">
<table class="formtab">
<tr style="background:#B3C0E0"><td width="50">排序</td> <td>标题</td></tr>

<?php
 
  //foreach ($arr_mod as  $k=>$v) {
    

//echo '<tr><td colspan="2" class="sidebarsubtitle"><div class="tdtitle" style="padding:5px 0"><strong>'.$v.'</strong> </div></td></tr>';

$k = 'node';
$sql = "SELECT * from ".TABLE_CATE." where   modtype='$k' and pid='0'   $andlangbh  order by pos desc,pidname desc,id desc";
  // echo $sql;
$rowlist = getall($sql);

if($rowlist<>'no'){
 
	foreach($rowlist as $v){
	$tidmain = $v['id'];
	$pidname = $v['pidname'];
	$alias = alias($pidname ,'cate');	 
	if($alias=='') echo $alias='<br />请修改别名'.$pidname;
	 
		if($catid==$pidname)
			$cat_cur='class="cur" ';
		else  $cat_cur='';
$link=' | <a style="font-weight:normal" href="'.$userurl.$alias.'.html" target="_blank">网址</a>';
		//echo '<li><a '.$cat_cur.' href="'.$jumpv.'&catid='.$pidname.'">'.decode($v['name']).'('.$nianji2.')</a><br />标识:'.$pidname.'<br />别名:'.$alias.$link.'</li>';
	
 
	 
?>
<tr>
<td align="center"><input type="text" name="<?php echo $tidmain;?>"  value="<?php echo $v['pos'];?>" size="3" /></td>
 <td> 
<?php 
	echo '<a '.$cat_cur.' href="'.$jumpv.'&catid='.$pidname.'"><strong>'.decode($v['name']).'</strong></a><br />标识:'.$pidname.'<br />别名:'.$alias;

	if($k<>'blockdh') echo $link;
?>
  </td>
</tr>
<?php

}//end foreach

}

 // }

?>

</table>

 
<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
</form>

 
</div><!-- end pro_album_left-->
<div class="pro_album_right">

<!---->

<?php
if($catid<>'') {
   $sta_field =  get_field(TABLE_CATE,'sta_field',$catid,'pidname');

echo '<div class="menusub"  style="margin-bottom:10px;">';
echo "<a class='fr bg22 del'  href=javascript:del('delmaincate','$catid','$jumpv_back')><span  class='bg22' >删除主类</span></a>";
echo '<a class="bg22'.$catsublist_cur.'" href="'.$jumpv_back.'"><span  class=bg22 >分类管理</span></a>';

if($modtype=='node'){
echo '<a class="bg22'.$mainedit_cur.'"  href="'.$jumpv_editmain.'"><span  class=bg22 >修改主类</span></a>';
echo '<a  class="bg22 '.$editalias_cur.'"  href="'.$jumpv_back.'&file=edit_alias&act=edit"><span class="bg22">修改别名</span></a>';
if( $sta_field =='y') echo "<a   class='bg22 $field_cur'  href=$jumpv_back&file=field><span  class='bg22' >字段属性管理</span></a>";
echo "<a class='bg22 $buju_cur'  href='$jumpv_back&file=buju'><span  class='bg22' >主类布局管理</span></a>";
echo "<a class='bg22 $bujuread_cur'  href='$jumpv_back&file=bujuread'><span  class='bg22' >主类详情页-内容区域参数</span></a>";
		   }
if($modtype=='blockdh'){
echo '<a class="bg22'.$maineditdh_cur.'"  href="'.$jumpv_editmain_blockdh.'"><span  class=bg22 >修改主类</span></a>';
} 
 
	 
echo '</div>';
}
?>
 

<?php 
 

if($file==""){    
	  if($catid=='') echo '<span class="f14b cred">请先在左边选择一个主类。</span>';
	  else{	 
	  $catname = get_field(TABLE_CATE,'name',$catid,'pidname');
	  require_once HERE_ROOT.'mod_category/tpl_category_list_inc.php';
	 
	  }//end if($catid=='')
} 
elseif($file=='buju'){
	
 echo $text_imgfjlink;
	$framesrc='../mod_layout/mod_layout.php?pid='.$catid.'&lang='.LANG.'&type=cate';
	echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1000" scrolling="no" frameborder="0"></iframe>';
}
elseif($file=='bujuread'){
	
 echo $text_imgfjlink;
	$framesrc='../mod_layout/mod_layout.php?pid='.$catid.'&lang='.LANG.'&type=read';
	echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1000" scrolling="no" frameborder="0"></iframe>';
}
elseif($file=='field'){
	//echo '<p>只要把下面的全部隐藏，就不会在前台显示。(不需要删除)</p>';
	$framesrc='../mod_field/mod_field.php?pid='.$catid.'&lang='.LANG.'&type=cate';
	echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1000" scrolling="no" frameborder="0"></iframe>';
  }
else if($file=='edit_alias'){
   $framesrc='../mod_module/mod_alias.php?pid='.$catid.'&lang='.LANG.'&type=cate';
	echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1000" scrolling="no" frameborder="0"></iframe>';
  }
else 
	require_once HERE_ROOT.'mod_category/tpl_category_'.$file.'.php'; 
?>



</div><!-- end right -->
<div class="c"></div>

<script>
function catmain(thisForm) {
   if (thisForm.name.value=="")
	{
		alert("请输入主分类名称");
		thisForm.name.focus();
		return (false);
	}
	
	
   
    
	 if (thisForm.alias.value=="")
	{
		alert("请输入别名");
		thisForm.alias.focus();
		return (false);
	}
   // return;
   
 

}
 
 
</script>
