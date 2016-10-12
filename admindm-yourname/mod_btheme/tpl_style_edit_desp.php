<?php
if($act=='update'){

   if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}


   $ss = "update ".TABLE_STYLE." set desp='$abc1' where pidname='$pidname' $andlangbh limit 1";
   // echo $ss;exit;    
   iquery($ss);  
 
$jumpv = $jumpv_pf.'&act=edit';
  jump($jumpv);

}
else{
  $sql = "SELECT * from ".TABLE_STYLE."  where pidname='$pidname' $andlangbh   order by id limit 1";
$row = getrow($sql);
 

$desp=$row['desp'];
$jumpv_insert = $jumpv_pf.'&act=update';

?>


<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
 


    <tr>
      <td  width="20%" class="tr">自定义模板：</td>
      <td width="70%"> 
   <textarea  style="font-size:16px" name="desp" cols="150" rows="35"><?php echo $desp;?></textarea> 
      </td>
    </tr>
     
        
    
  <tr>
      <td></td>
      <td>
      <input  class="mysubmitnew" type="submit" name="Submit" value="提交" /></td>
    </tr>
    </table>
    <p class="hintbox">使用上传的图片的方法：[uploadpath]1/****.jpg</p>

    <?php echo $inputmust;?>
    
</form>
<?php }
?>
<script>
function checkhere(thisForm) {
   
}

</script>
