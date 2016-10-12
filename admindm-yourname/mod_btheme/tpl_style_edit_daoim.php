<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

?>
<div class="menu">
<a href="mod_color.php?lang=cn" target="_blank">配色管理</a>


</div>


<h2 class="h2tit_biao">配色管理</h2>


<?php
if($act=='suredao'){

?>
<div class="menu" style="padding:50px">


<a   class="but1" href="<?php echo $jumpv_pf.'&tid='.$tid.'&act=yesdao';?>">确定导入?</a>

<a href="<?php echo $jumpv_pf?>">取消导入</a>
<p>注意：导入的样式将会影响当前模板的效果。导入部分不包括自定义样式</p>
</div>

<?php

}


else if($act=='yesdao'){

   $title=$color='';
      $style_normal=$style_hf=$style_menu=$style_boxtitle='';

      
    $sql = "SELECT * from ".TABLE_BLOCK."  where type='stylecolor' and id=$tid  order by id limit 1";
$row = getrow($sql);
 $desp = $row['desp'];

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
       

   $sql = "update  ".TABLE_STYLE." set style_normal='$style_normal',style_hf='$style_hf',style_menu='$style_menu',style_boxtitle='$style_boxtitle' where pidname='$pidname'   order by id limit 1";
   //echo $sql; 
    iquery($sql);
    echo '<p style="padding:50px;font-size:18px">导入成功。点击 生成样式 才有效。</p>';


//----------------

}




else {
  ?>


<?php
$sql = "SELECT * from ".TABLE_BLOCK." where    type='stylecolor' order by pos desc,pidname desc,id desc";
   //echo $sql;
$rowlist = getall($sql);
 if($rowlist=='no') echo $norr2;
else{
?>
 
<table class="formtab formtabhovertr">
<tr style="background:#B3C0E0">
 
 
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




 $edit = '<a  class="but1" href="'.$jumpv_pf.'&tid='.$tid.'&act=suredao">导入</a>';
 
 ?>
<tr>
 
 <td align="center"> <?php echo $title?> </td>

 <td align="center" style=""> <?php echo $color?>
  <span style="background:<?php echo $color?>;display:inline-block;width:100px;height:20px"></span>
     </td>
  <td align="center"> <?php echo $edit ?>    </td>
 

   
</tr>
<?php 
} 
?>
</table>
 
<?php }?>

 
<?php }?>
 
<div class="c"></div>
