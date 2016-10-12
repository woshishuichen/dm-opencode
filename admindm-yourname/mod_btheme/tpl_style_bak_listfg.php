<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}



if($act=='activatestyle'){

  $ss = "update ".TABLE_LANG." set curstyle='$pidname' where pidname='".LANG."' limit 1";
 
    iquery($ss);


alert('启动成功，请到前台去查看效果。');
jump($jumpv);
}
?>
<div class="menu">
<a href="<?php echo $jumpv?>&file=add&act=add">添加模板</a>
<a href="mod_style_select.php?lang=<?php echo  LANG;?>">模板切换</a>


</div>

<h2 class="h2tit_biao">模板管理</h2>
<?php
$sql = "SELECT * from ".TABLE_STYLE." where $noandlangbh  and pid='0' order by pos desc,pidname desc,id desc";
   //echo $sql;
$rowlist = getall($sql);
 if($rowlist=='no') echo $norr2;
else{
?>
<form method=post action="<?php echo $jumpv;?>&act=pos">
<table class="formtab formtabhovertr">
<tr style="background:#B3C0E0">
<td width="60" align="center">排序</td> 
<td width="160" align="center">缩略图</td> 
<td width="350" align="center">标题</td>
<td width="150" align="center">编号</td>
 
<td width="300" align="center">操作</td>
<td width="300" align="center">模板内容</td>
 
 
</tr>

<?php

foreach($rowlist as $vcat){
   $tid=$vcat['id']; $title=$vcat['title']; 
   $pidnamecur=$vcat['pidname']; 
// if($pidname==$pidnamecur) $curclass=' style="color:#fff;background:red;padding:3px;" ';
// else $curclass=' ';

$kv=$vcat['kv'];
 //$imgsmall2 = p2030_imgyt($kv, 'y', 'n');
$kv = '<img src='.get_img($kv, '', '').' alt="" width="200" height="200" />';


 $sta_visible=$vcat['sta_visible']; 
 
menu_changesta($sta_visible,$jumpv,$tid,'sta');

   $edit = '<a  class="but1" href="'.$jumpv.'&pidname='.$pidnamecur.'&file=edit_title&act=edit">修改</a>';
    $edit2 = ' <a  class="but1" href="'.$jumpv.'&pidname='.$pidnamecur.'&file=edit_normal&act=edit">修改样式</a>';
 $edit2 .= ' <a  class="but1" href="'.$jumpv.'&pidname='.$pidnamecur.'&file=edit_blockid&act=edit">修改标识</a>';
  // $mbfront = '<a href="'.$userurl.'colordemo&mb='.$pidnamecur.'"   target="_blank" style="color:#666">查看前台<i class="fa fa-eye"></i></a>';
$activatestyle= "<p><a href=javascript:activatestyle('activatestyle','$pidnamecur','$jumpv')  class=but2>启动模板</a></p>";

 
 ?>
<tr <?php echo $tr_hide;?>>
<td align="center">
<input type="text" name="<?php echo $tid;?>"  value="<?php echo $vcat['pos'];?>" size="5" />
</td>

 <td align="center"> <?php 

if($superadmin=='y') echo '<a href="'.$userurl.'colordemo&mb='.$pidnamecur.'"  target="_blank">';
  echo $kv;
if($superadmin=='y') echo '</a>';


  ?>

 </td>

 <td align="center">  <h1><?php echo $title;?></h1>

 <?php  // echo '<a href="'.$userurl.'colordemo&mb='.$pidnamecur.'"   target="_blank" style="font-size:16px;font-size:bold;color:#666;text-decoration:none">'.$title.'<i class="fa fa-link"></i> <span style="color:#666">预览</span></a> ';


 ?>
 

 </td>


  <td align="center"> 
  <?php echo $pidnamecur;

 if($curstyle==$pidnamecur) echo '<br /><span style="color:red">(正在使用)</span>';
//if($curstyledebug==$pidnamecur) echo '<br /><span style="color:red">(后台正在调试)</span>';

  if($curstyle<>$pidnamecur){  echo $activatestyle;}
  
 ?>   </td>

  <td align="center"> 
  <?php 
  echo  $edit;  
  if($superadmin=='y') echo $edit2;
    ?>
   </td>
  <td align="center">

 <?php  if($curstyle==$pidnamecur){?>
 <div class="styleeditlink">
<a href="../mod_menu/mod_menu.php?lang=<?php echo LANG?>" target="_blank">菜单管理</a>
 
  
    <a href="../mod_layout/mod_layoutcommon.php?lang=<?php echo LANG?>" target="_blank">公共布局</a> 
 
  </div>
<?php }?>

   </td>
   
</tr>
<?php 
} 
?>
</table>
<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
</form>
<?php }?>

 


</div>
<div class="c"></div>


<script>

function  activatestyle(actgo2,pidname,backpage){  
    if (confirm("确定启动这个模板？这会直接影响前台效果！")){
      golink  = backpage+'&act='+actgo2+'&pidname='+pidname;
  //alert(golink);
       window.location=golink;
    }
}

</script>