<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
 if($act <> "pos") zb_insert($_POST);
 
 if($pidname<>'') {
  ifhaspidname(TABLE_STYLE,$pidname);
 
}

 
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
ifhave_lang(LANG);//TEST if have lang,if no ,then jump



$jumpv='mod_style.php?lang='.LANG;
$jumpv_p=$jumpv.'&pidname='.$pidname;
$jumpv_f=$jumpv.'&file='.$file;
$jumpv_pf=$jumpv_p.'&file='.$file;


//----
$submenu='basic';
$title = '模板管理';

 
 if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_STYLE." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv);
}

if($act == "sta")
{ 
     $ss = "update ".TABLE_STYLE." set sta_visible='$v' where id=$tid $andlangbh limit 1";   
     iquery($ss);
    jump($jumpv); 
}



if($act == "del")
{ 
$pidregion = get_field(TABLE_STYLE,'pidregion',$pidname,'pidname');

//echo $pidregion;
 $sql = "SELECT cssdir from ".TABLE_LANG."  where   $noandlangbh   order by id limit 1";
$row = getrow($sql);
$cssdir = $row['cssdir'];

   $cssfile = STAROOT.'template/'.$cssdir .'/css/'.$pidname.'.css';
   $cssfilebak =  WEB_ROOT.'cache\customcss/'.$pidname.'_bak_'.$bshou.'.css';
  if(is_file($cssfile)){ 
   unlink($cssfile);
       // if (!copy($cssfile,$cssfilebak)) {
       // echo  '<p style="padding:20px;font-size:16px;color:red">对不起，'.$cssfile.'备份不成功。failed to copy $cssfile...</p>';
      //  }
  

  }
  //  else{echo '<p style="padding:20px;font-size:16px;color:red">对不起，出错。template/'.$cssdir .'/css/'.$pidname.'.css不存在，需要在当前模板里有这个css文件。</p>';return;}

 //temp not del region
  $delss = "delete from ".TABLE_REGION." where pid='$pidregion' $andlangbh";
  iquery($delss);
  $delss = "delete from ".TABLE_REGION." where pidname='$pidregion' $andlangbh limit 1";
  iquery($delss);
  //temp notdel menu
  $delss = "delete from ".TABLE_MENU." where stylebh='$pidname' $andlangbh";  
  iquery($delss);
  //temp notdel layout
  $delss = "delete from ".TABLE_LAYOUT." where stylebh='$pidname' $andlangbh";  
  iquery($delss);

   //del style:
  ifsuredel_field(TABLE_STYLE,'pidname',$pidname,'eq',$jumpv);

   
}

//-----------

require_once HERE_ROOT.'mod_common/tpl_header.php'; 
if($file=='') require_once HERE_ROOT.'mod_btheme/tpl_style.php';
else {

 if($file<>'add'){//edit part....
?>
<div class="menu">

<!-- <a href="<?php //echo //$jumpv?>">返回模板管理</a>
 -->
正在编辑的模板： 
<span class="cred"><?php 

echo get_field(TABLE_STYLE,'title',$pidname,'pidname');
echo ' - '.$pidname;
?> </span>

<!-- &nbsp;&nbsp;&nbsp;
 <span class="cp editmenuother cirbtn">编辑其他模板 &#8595; </span>

 -->

 <div class="editmenuother_cnt">  
<?php 
 //require_once('plugin_style_list_edit.php');
?>
</div><!--end editmenuother_cnt-->


 
</div>






<?php

 $edittitle_cur=  $editnormal_cur= $editmenu_cur= $editdesp_cur=$edithf_cur=$editboxtitle_cur=$editblockid_cur='';
 $editstyle_cur= $editdaoim_cur= $editdaoex_cur='';
  if($file=='edit_title') $edittitle_cur = ' cur';
   if($file=='edit_normal') $editnormal_cur = ' cur';
  if($file=='edit_hf') $edithf_cur = ' cur';
  if($file=='edit_menu') $editmenu_cur = ' cur';
      if($file=='edit_desp') $editdesp_cur = ' cur';
 if($file=='edit_boxtitle') $editboxtitle_cur = ' cur';
 if($file=='edit_blockid') $editblockid_cur = ' cur';
  if($file=='edit_daoim') $editdaoim_cur = ' cur';
   if($file=='edit_daoex') $editdaoex_cur = ' cur';


if($file=='edit_normal' or $file=='edit_hf' or $file=='edit_menu' or $file=='edit_boxtitle' or $file=='edit_desp' or $file=='generatecss' or $file=='edit_daoim' or $file=='edit_daoex')  $editstyle_cur = ' cur';

$del_text= "<a href=javascript:del('del','$pidname','$jumpv')  class='fr but2'>删除</a>";

//echo '<div class="menusub"  style="margin-bottom:20px">';


 // echo '<a class="bg22'.$edittitle_cur.'" href="'.$jumpv_p.'&file=edit_title&act=edit"><span  class="bg22" >修改标题</span></a>';
 // echo '<a class="bg22'.$editstyle_cur.'" href="'.$jumpv_p.'&file=edit_normal&act=edit"><span  class="bg22" >修改样式</span></a>';
 //  echo '<a class="bg22'.$editblockid_cur.'" href="'.$jumpv_p.'&file=edit_blockid&act=edit"><span  class="bg22" >标识和设置</span></a>';
 
 //echo '</div>';

?>
<h2 class="h2tit_biao" style="margin-bottom:10px">

<?php if($pidname<>$curstyle and $file=='edit_title') echo $del_text;//when mb  active,not del...

if($file=='edit_title') echo '修改标题';
else if($file=='edit_blockid') echo '修改标识';
else echo '修改样式';
?>

 
 </h2>


<?php
 
if($file=='edit_normal' or $file=='edit_hf' or $file=='edit_menu' or $file=='edit_boxtitle' or $file=='edit_desp' or $file=='generatecss' or $file=='edit_daoim' or $file=='edit_daoex')
{ echo '<p>提示：改动后，需要点击生成样式才能生效和。</p>';
  echo '<div class="menusub menusub2" style="margin-bottom:20px">';
 
 echo '<a class="fr bg22'.$editdaoim_cur.'" href="'.$jumpv_p.'&file=edit_daoim&act=edit"><span  class="bg22" >导入样式</span></a>';


     echo '<a class="bg22'.$editnormal_cur.'" href="'.$jumpv_p.'&file=edit_normal&act=edit"><span  class="bg22" >常用样式</span></a>';
  echo '<a class="bg22'.$edithf_cur.'" href="'.$jumpv_p.'&file=edit_hf&act=edit"><span  class="bg22" >页头和页尾样式</span></a>';
 echo '<a class="bg22'.$editmenu_cur.'" href="'.$jumpv_p.'&file=edit_menu&act=edit"><span  class="bg22" >菜单样式</span></a>';
  echo '<a class="bg22'.$editboxtitle_cur.'" href="'.$jumpv_p.'&file=edit_boxtitle&act=edit"><span  class="bg22" >传统盒子</span></a>';




echo '<a class="bg22'.$editdesp_cur.'" href="'.$jumpv_p.'&file=edit_desp&act=edit"><span  class="bg22" >修改自定义样式</span></a>';
echo '<a class="but2" href="'.$jumpv_p.'&file=generatecss&act=edit" style="padding:1px 20px">生成样式</a>';


//echo '<a class="bg22'.$editdaoex_cur.'" href="'.$jumpv_p.'&file=edit_daoex&act=edit"><span  class="bg22" >导出样式</span></a>';

echo '</div>';

}


 
}

  require_once HERE_ROOT.'mod_btheme/tpl_style_'.$file.'.php';
}

require_once HERE_ROOT.'mod_common/tpl_footer.php';

?>


 