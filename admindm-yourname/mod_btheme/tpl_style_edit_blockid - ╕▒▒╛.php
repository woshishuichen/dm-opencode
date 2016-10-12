<?php
if($act=='update'){
   $ss = "update ".TABLE_STYLE." set bsbanner='$abc1',bsbannermob='$abc2',bsindex='$abc3',bsindexmob='$abc4',bsmenu='$abc5',bsfootercol='$abc6',bsfooter='$abc7',bsfootermob='$abc8',bsfooternavmob='$abc9'  where pidname='$pidname' $andlangbh limit 1";
  
// echo $ss;exit;    
   iquery($ss);   
  $jumpv = $jumpv_pf.'&act=edit';
  jump($jumpv);


}
else{
  $sql = "SELECT * from ".TABLE_STYLE."  where  pidname='$pidname' $andlangbh   order by id limit 1";
$row = getrow($sql);

$title=$row['title'];
$bsbanner=$row['bsbanner']; $bsbannermob=$row['bsbannermob']; 
$bsindex=$row['bsindex']; $bsindexmob=$row['bsindexmob']; 
$bsmenu=$row['bsmenu']; 
$bsfootercol=$row['bsfootercol'];
$bsfooter=$row['bsfooter']; $bsfootermob=$row['bsfootermob']; $bsfooternavmob=$row['bsfooternavmob'];  
$jumpv_insert = $jumpv_pf.'&act=update';

?>


<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
 
    <tr>
      <td  width="20%" class="tr">首页banner：</td>
      <td  width="70%"> 
       pc端：<input name="bsbanner" type="text"  value="<?php echo $bsbanner;?>" size="50" />
       <?php echo check_blockid($bsbanner);?>
<br />
       移动端：<input name="bsbannermob" type="text"  value="<?php echo $bsbannermob;?>" size="50" /> 
       <?php echo check_blockid($bsbannermob);?>
      (但不作用于ipad)
  </td>
    </tr>

    <tr>
      <td  width="20%" class="tr">首页内容：</td>
      <td  width="70%"> 
       pc端：<input name="bsindex" type="text"  value="<?php echo $bsindex;?>" size="50" />
       <?php echo check_blockid($bsindex);?>
<br />
       移动端：<input name="bsindexmob" type="text"  value="<?php echo $bsindexmob;?>" size="50" />

       <?php echo check_blockid($bsindexmob);?>
      (但不作用于ipad)
  </td>
    </tr>

  <tr>
      <td  width="20%" class="tr">菜单的内容：</td>
      <td  width="70%"> 
       <input name="bsmenu" type="text"  value="<?php echo $bsmenu;?>" size="50" />
       <?php echo check_blockid($bsmenu);?>
      
  </td>
    </tr>

<tr>
      <td  width="20%" class="tr">底部多列的内容：</td>
      <td  width="70%"> 
   <input name="bsfootercol" type="text"  value="<?php echo $bsfootercol;?>" size="50" />
       <?php echo check_blockid($bsfootercol);?>
            
  </td>
    </tr>

   <tr>
      <td  width="20%" class="tr">底部内容：</td>
      <td  width="70%"> 
       pc端：<input name="bsfooter" type="text"  value="<?php echo $bsfooter;?>" size="50" />
       <?php echo check_blockid($bsfooter);?>
<br />
       移动端：<input name="bsfootermob" type="text"  value="<?php echo $bsfootermob;?>" size="50" />

       <?php echo check_blockid($bsfootermob);?>
      (但不作用于ipad)


      
  </td>
    </tr>

<tr>
      <td  width="20%" class="tr">移动端底部导航：</td>
      <td  width="70%"> 
       
  <select name="bsfooternavmob">
    <?php select_from_arr($arr_bsfooternavmob,$bsfooternavmob,'');?>
     </select>

      
      
  </td>
    </tr>

    
  <tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="提交" /></td>
    </tr>
    </table>

     <p class="hintbox">提示： 
   这里的值都可以留空。如果移动端没有值，就使用PC端，如果PC端没有值，则使用布局里的值。
  </p>

</form>
<?php }
?>
<script>
function checkhere(thisForm) {
   
}

</script>
