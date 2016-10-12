<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/

require_once '../config_a/common.inc2010.php';

ifhave_lang(LANG);//TEST if have lang,if no ,then jump
if($tid<>'' || $tid==0) {ifhasid(TABLE_PAGE,$tid);}

if($act <> "pos") zb_insert($_POST);
/********************************************/
$jumpvpage='mod_page.php?lang='.LANG;

$jumpv='mod_page_edit.php?lang='.LANG.'&tid='.$tid;
$jumpv_file=$jumpv.'&file='.$file; 
$jumpv_back = $jumpv_file.'&act=edit'; 
/************************/
$editindex_cur='';
 $editcan_cur=''; $editalias_cur=''; $editdesp_cur='';$editbuju_cur='';
 $editalbum_cur=$editalbumset_cur='';$edittab_cur='';$editaccord_cur='';

 if($file=="edit_desp" || $file=="edit_can")   $editdesp_cur=' cur'; 
  elseif($file=="edit_alias")   $editalias_cur=' cur';
  elseif($file=="edit_buju" or $file=="edit_bujucate")   $editbuju_cur=' cur';
elseif($file=="edit_album")   $editalbum_cur=' cur';
elseif($file=="edit_albumset")   $editalbumset_cur=' cur';
elseif($file=="edit_tab")   $edittab_cur=' cur';
elseif($file=="edit_accord")   $editaccord_cur=' cur';
//------------------------
 
 $ss = "select * from ".TABLE_PAGE." where id='$tid' $andlangbh limit 1"; 
  $row = getrow($ss);
  if($row=='no'){alert('出错,不存在的ID!');echo $backlist;exit;   } 
  $name=$row['name']; 
  $pidname=$row['pidname'];

$alias_jump=$row['alias_jump'];
$sta_noaccess=$row['sta_noaccess'];
$album=$row['album'];
$pagelayout=$row['pagelayout'];
//-------
 $sslay = "select * from ".TABLE_LAYOUT." where pid='$pidname' and stylebh='$curstyle'  $andlangbh limit 1"; 
   $rowlay = getrow($sslay); 
 
if($rowlay=='no') {$content = $contenttop = $contentbot = '';}
else {
	$content = $rowlay['content'];
	$contenttop = $rowlay['contenttop'];
	$contentbot = $rowlay['contentbot'];
 }
 
 $name=decode($name);//seo_decode
 
 $title = '修改单页面--'.$name;//seo_decode($name);
  
   
  //---
  $text_1='修改成功后，请在单页面管理 刷新后可看到效果。';
 $vtext_intro='<br />(中英文参考代码:<input type="text" style="background:#ccc;padding:3px;border:1px solid #666" value="<span>关于我们</span><span class=en>About us</span>" size="58" />) ';

//----
if($act == "delpage")
{ 
// $ss = "select id from ".TABLE_CATE." where pidname='$pidname' $andlangbh limit 1"; 
 //if(getnum($ss)>0) {alert('出错，不能在这里删除分类菜单');jump($jumpvmenu);}
  
  //$ifdel1 = ifcandel(TABLE_PAGE,$pidname,'出错，有子菜单，请删除它的子菜单！',$jumpvmenu);// back is fail 

  $ifdel1 = ifcandel(TABLE_ALBUM,$pidname,'出错，有相册。请先删除。！',$jumpvpage);// back is fail 
  $ifdel2 = ifcandel(TABLE_IMGFJ,$pidname,'出错，编辑器附件里有图片。请先删除。！',$jumpvpage);// back is fail 
 if($ifdel1 and $ifdel2) {
	ifsuredel(TABLE_PAGE,$pidname,'noback');
	ifsuredel_field(TABLE_ALIAS,'pid',$pidname,'eq','noback');
	ifsuredel_field(TABLE_LAYOUT,'pid',$pidname,'eq',$jumpvpage);
	//ifcandel_bypid(TABLE_ALIAS,$pidname,'noback');	
	//ifcandel_bypid(TABLE_LAYOUT,$pidname,$jumpvpage);
 }
 	  
}


 //----
 require_once HERE_ROOT.'mod_common/tpl_header.php';

 $sqlalbum = "SELECT id from ".TABLE_ALBUM." where pid='$pidname' $andlangbh order by id desc";//$pidname is in pro-modnews.php 
 
$num_album = '有 <span class="cred">'.getnum($sqlalbum).'</span>个';

/*
$sqltab = "SELECT id from ".TABLE_BLOCK." where pid='$pidname' and type='tab' and typefrom='page' $andlangbh order by id desc";
$num_tab = '有 <span class="cred">'.getnum($sqltab).'</span>个';
$sqlaccord = "SELECT id from ".TABLE_BLOCK." where pid='$pidname' and type='accord' and typefrom='page' $andlangbh order by id desc";
$num_accord = '有 <span class="cred">'.getnum($sqlaccord).'</span>个';
*/

?>
<!-- <div class="menu">
<a href="mod_page.php?lang=<?php //echo LANG?>">返回单页面管理</a>
</div>
 -->
<div class="menusub">
<?php
 if( $file=='edit_desp'  ){
echo  " <a class='del fr bg22'  href=javascript:del('delpage','$pidname','$jumpv')><span class='bg22'>删除单页面</span></a>";
}

 // if($file=='edit_index'){
 // echo '<a  class="bg22 '.$editindex_cur.'"  href="'.$jumpv.'&file=edit_index&act=edit"><span class="bg22">修改首页参数</span></a>';
	 
 // }
  
 if($file=='edit_can' or $file=='edit_alias' or $file=='edit_desp' or $file=='edit_buju' or $file=='edit_album' or $file=='edit_albumset'  or $file=='edit_tab' or $file=='edit_accord'){

echo '<a  class="bg22 '.$editdesp_cur.'"  href="'.$jumpv.'&file=edit_desp&act=edit"><span class="bg22">修改内容</span></a>';
   
if($alias_jump==''){ 
echo '<a  class="bg22 '.$editalias_cur.'"  href="'.$jumpv.'&file=edit_alias&act=edit"><span class="bg22">修改别名</span></a>';
//echo '<a  class="bg22 '.$editdesp_cur.'"  href="'.$jumpv.'&file=edit_desp&act=edit"><span class="bg22">修改内容</span></a>';
echo '<a  class="bg22 '.$editbuju_cur.'"  href="'.$jumpv.'&file=edit_buju&act=edit"><span class="bg22">修改布局</span></a>';
echo '<a  class="bg22 '.$editalbum_cur.'"  href="'.$jumpv.'&file=edit_album&act=edit"><span class="bg22">相册管理('.$num_album.')</span></a>';
echo '<a  class="bg22 '.$editalbumset_cur.'"  href="'.$jumpv.'&file=edit_albumset&act=edit"><span class="bg22">相册设置</span></a>';
//echo '<a  class="bg22 '.$edittab_cur.'"  href="'.$jumpv.'&file=edit_tab&act=edit"><span class="bg22">修改Tab('.$num_tab.')</span></a>';
//echo '<a  class="bg22 '.$editaccord_cur.'"  href="'.$jumpv.'&file=edit_accord&act=edit"><span class="bg22">修改手风琴('.$num_accord.')</span></a>';
}

	
	
}
 
  
 //&#8595;  &#8593;
?>
<div class="fr" style="margin-right:100px">

<span class="cp editmenuother cirbtn">编辑其他单页面 &#8595; </span>

</div><!--end fr-->





</div>
<div class="editmenuother_cnt">
	

<?php 
 
//$querystring = $_SERVER['QUERY_STRING'];
//print_r (explode("&",$querystring));

//$arr_qs = explode("&",$querystring);
 /*
function array_remove(&$arr, $offset) 
{ 
array_splice($arr, $offset, 1); //
} 
array_remove($arr_qs, 3); 
 
//lang=cn&file=edit_can&act=edit&tid=34


$qsnew= implode("&",$arr_qs);
*/
//$linkedit = $php_self.'?'.$qsnew.'&tid=';


 require_once('plugin_page_list_edit.php');
?>


</div><!--end editmenuother_cnt-->

<div style="padding:20px">
<?php
 
 

if($file=='edit_buju'){
	$framesrc='../mod_layout/mod_layout.php?pid='.$pidname.'&lang='.LANG.'&type=page';
	echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1000" scrolling="no" frameborder="0"></iframe>';
}
  
else if($file=='edit_album'){

	  if($content<>''){echo '<p class="f14bgred">由于本页面的内容调用了'.check_blockid($content).'，所以这里的相册不会在前台显示</p>';}

	$framesrc='../mod_album/mod_album.php?pid='.$pidname.'&lang='.LANG.'&type=page';
	echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1100" scrolling="no" frameborder="0"></iframe>';
 } 
//else if($file=='edit_tab'){
	//$framesrc='../mod_tab/mod_tab.php?pid='.$pidname.'&lang='.LANG.'&type=tab&typefrom=page';
	//echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1100" scrolling="no" frameborder="0"></iframe>';
//} 
//else if($file=='edit_accord'){
	//$framesrc='../mod_tab/mod_tab.php?pid='.$pidname.'&lang='.LANG.'&type=accord&typefrom=page';
	//echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1100" scrolling="no" frameborder="0"></iframe>';
//} 
else if($file=='edit_alias'){
   $framesrc='../mod_module/mod_alias.php?pid='.$pidname.'&lang='.LANG.'&type=page';
	echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1000" scrolling="no" frameborder="0"></iframe>';
}
else if($file=='edit_desp'){
        // if($contenttop<>''){echo '<p class="f14bgred">内容的上面(contenttop)调用'.check_blockid($contenttop).'</p>';}
        // if($contentbot<>''){echo '<p class="f14bgred">内容的下面(contentbot)调用'.check_blockid($contentbot).'</p>';}
	 
         if($content<>''){
         	echo '<p class="f14bgred">此处内容调用'.check_blockid($content).'<span class="blue">(可以通过 修改布局 来取消调用)</span></p>';

     }

           require_once HERE_ROOT.'mod_page/tpl_page_'.$file.'.php';
	}
else  
	{
	if($file=='edit_albumset'){
	  if($content<>''){echo '<p class="f14bgred">由于本页面的内容调用了'.check_blockid($content).'，所以这里的相册设置不起作用</p>';}
	}

	require_once HERE_ROOT.'mod_page/tpl_page_'.$file.'.php';
	}

?>
</div>
<?php 
require_once HERE_ROOT.'mod_common/tpl_footer.php';
//echo "$hotellist<pre>".print_r($_POST,1)."</pre><hr>";
//echo 'kk';
//echo substr($_FILES['addr']['name'],-3);
?>



