<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

?>
<div class="menu">
<a href="<?php echo $jumpv?>&file=add&act=add">添加模板</a>


</div>
<div class="pro_album_left">

<h3>模板  </h3>
<?php
$sql = "SELECT * from ".TABLE_STYLE." where $noandlangbh  and pid='0' order by pos desc,pidname desc,id desc";
   //echo $sql;
$rowlist = getall($sql);
 if($rowlist=='no') echo $norr2;
else{
?>
<form method=post action="<?php echo $jumpv;?>&act=pos">
<table class="formtab">
<tr style="background:#B3C0E0"><td width="60">排序</td> <td>标题</td></tr>

<?php

foreach($rowlist as $vcat){
   $tid=$vcat['id']; $title=$vcat['title']; 
   $pidnamecur=$vcat['pidname']; 
if($pidname==$pidnamecur) $curclass=' style="color:#fff;background:red;padding:3px;" ';
else $curclass=' ';

   $namev = '<a '.$curclass.' href="'.$jumpv.'&pidname='.$pidnamecur.'&file=edit_normal&act=edit"><strong>'.$title.'</strong></a>';
 ?>
<tr>
<td align="center"><input type="text" name="<?php echo $tid;?>"  value="<?php echo $vcat['pos'];?>" size="5" /></td>
 <td>  <?php   echo $namev;
 if($curstyle==$pidnamecur) echo '<span style="color:red">(正在使用)</span>';
 echo '<br />标识: '.$pidnamecur;?>


 </td>
</tr>
<?php 
} 
?>
</table>
<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
</form>
<?php }?>

<p>
  
<a href="http://www.demososo.com/detail-102.html" target="_blank">如何选择当前模板></a>

</p>
</div><!-- end pro_album_left-->
<div class="pro_album_right">


<?php
if($file=='') echo '<p class="pad8 f14b cred">请先在左边选择。 </p>';
else 
{ 

  if($file<>'add'){

  $editnormal_cur= $editmenu_cur= $editdesp_cur=$edithf_cur=$editboxtitle_cur=$editblockid_cur='';
  if($file=='edit_normal') $editnormal_cur = ' cur';
  if($file=='edit_hf') $edithf_cur = ' cur';
  if($file=='edit_menu') $editmenu_cur = ' cur';
      if($file=='edit_desp') $editdesp_cur = ' cur';
 if($file=='edit_boxtitle') $editboxtitle_cur = ' cur';
 if($file=='edit_blockid') $editblockid_cur = ' cur';
$del_text= "<a href=javascript:del('del','$pidname','$jumpv')  class='fr but2'>删除</a>";

echo '<div class="menusub">';
echo $del_text;
 echo '<a class="bg22'.$editnormal_cur.'" href="'.$jumpv_p.'&file=edit_normal&act=edit"><span  class="bg22" >修改常用模板</span></a>';
  echo '<a class="bg22'.$edithf_cur.'" href="'.$jumpv_p.'&file=edit_hf&act=edit"><span  class="bg22" >页头和页尾模板</span></a>';
 echo '<a class="bg22'.$editmenu_cur.'" href="'.$jumpv_p.'&file=edit_menu&act=edit"><span  class="bg22" >菜单模板</span></a>';
  echo '<a class="bg22'.$editboxtitle_cur.'" href="'.$jumpv_p.'&file=edit_boxtitle&act=edit"><span  class="bg22" >传统盒子</span></a>';
  echo '<a class="bg22'.$editblockid_cur.'" href="'.$jumpv_p.'&file=edit_blockid&act=edit"><span  class="bg22" >标识</span></a>';
echo '<a class="bg22'.$editdesp_cur.'" href="'.$jumpv_p.'&file=edit_desp&act=edit"><span  class="bg22" >修改自定义模板</span></a>';

echo '<a class="but2" href="'.$jumpv_p.'&file=generatecss&act=edit">生成模板</a>';
 echo '</div>';

  }
  echo $text_imgfjlink; 
  echo '<div style="padding:20px">';
$reqfile = HERE_ROOT.'mod_btheme/tpl_style_'.$file.'.php';
if(is_file($reqfile))  require_once $reqfile;
 echo '</div>';
}
 


?>

</div>
<div class="c"></div>
