<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

?>
<div class="menu">
<a href="<?php echo $jumpv?>&file=add&act=add">添加样式</a>


</div>


<h2 class="h2tit_biao">样式管理</h2>
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
<td width="60">排序</td> 
<td width="350" align="center">标题</td>
<td width="150" align="center">编号</td>
<td width="250" align="center">标识</td>
<td width="300">操作</td>
<td width="300">状态</td>
 
</tr>

<?php

foreach($rowlist as $vcat){
   $tid=$vcat['id']; $title=$vcat['title']; 
   $pidnamecur=$vcat['pidname']; 
// if($pidname==$pidnamecur) $curclass=' style="color:#fff;background:red;padding:3px;" ';
// else $curclass=' ';


 $sta_visible=$vcat['sta_visible']; 
 
menu_changesta($sta_visible,$jumpv,$tid,'sta');

   $edit = '<a  class="but1" href="'.$jumpv.'&pidname='.$pidnamecur.'&file=edit_title&act=edit">修改</a>';
    $edit .= ' <a  class="but1" href="'.$jumpv.'&pidname='.$pidnamecur.'&file=edit_normal&act=edit">修改样式</a>';
  // $mbfront = '<a href="'.$userurl.'colordemo&mb='.$pidnamecur.'"   target="_blank" style="color:#666">查看前台<i class="fa fa-eye"></i></a>';

 
 ?>
<tr <?php echo $tr_hide;?>>
<td align="center">
<input type="text" name="<?php echo $tid;?>"  value="<?php echo $vcat['pos'];?>" size="5" />
</td>

 <td align="center">  <?php   echo '<a href="'.$userurl.'colordemo&mb='.$pidnamecur.'"   target="_blank" style="font-size:16px;font-size:bold;color:#666;text-decoration:none">'.$title.'<i class="fa fa-link"></i></a> ';


 if($curstyle==$pidnamecur) echo '<span style="color:red">(正在使用)</span>';
 ?>
 <br />

 <?php// echo $mbfront;?> 

 </td>
 <td align="center"> <?php echo $vcat['stylebh'];?>  </td>

  <td align="center"> <?php echo $pidnamecur;?>  </td>

  <td align="center"> <?php echo $edit;?> </td>
   <td align="center"> <?php echo $sta_visible;?> </td>
   
</tr>
<?php 
} 
?>
</table>
<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
</form>
<?php }?>

<p>
  
教程：<a href="http://www.demososo.com/detail-102.html" target="_blank">如何选择当前样式></a>

</p>
<p class="cred ptb10"><?php echo $text_adminhide2;?></p>



</div>
<div class="c"></div>
