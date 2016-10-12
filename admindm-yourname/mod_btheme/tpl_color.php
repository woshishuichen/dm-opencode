<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

?>
<div class="menu">
<a href="<?php echo $jumpv?>&file=addedit&act=add">添加配色</a>


</div>


<h2 class="h2tit_biao">配色管理</h2>
<?php
$sql = "SELECT * from ".TABLE_BLOCK." where    type='stylecolor' order by pos desc,pidname desc,id desc";
   //echo $sql;
$rowlist = getall($sql);
 if($rowlist=='no') echo $norr2;
else{
?>
<form method=post action="<?php echo $jumpv;?>&act=pos">
<table class="formtab formtabhovertr">
<tr style="background:#B3C0E0">
<td width="60" align="center">排序</td> 
 
<td width="150" align="center">标题</td>
<td width="150" align="center">颜色</td>
 <td width="350" align="center">操作</td>
 
 
</tr>

<?php

foreach($rowlist as $vcat){
  $tid=$vcat['id'];  
   $desp=$vcat['desp'];  
   //echo $desp;

   $bscntarr = explode('==@==',$desp); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':@@')){

               $bsvaluearr = explode(':@@',$bsvalue);
               //pre($bsvaluearr);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
      else{
      $title=$color='';
      $style_normal=$style_hf=$style_menu=$style_boxtitle='';
      
      }




 $edit = '<a  class="but1" href="'.$jumpv.'&file=addedit&tid='.$tid.'&act=edit">修改</a>';

$del_text= " <a href=javascript:del('del','$tid','$jumpv')  class='fr but2'>删除</a>";
 
 ?>
<tr>
<td align="center">
<input type="text" name="<?php echo $tid;?>"  value="<?php echo $vcat['pos'];?>" size="5" />
</td>

 <td align="center"> <?php echo $title?> </td>

 <td align="center" style=""> <?php echo $color?>
  <span style="background:<?php echo $color?>;display:inline-block;width:100px;height:20px"></span>
     </td>
  <td align="center"> <?php echo $edit.$del_text?>    </td>
 

   
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
