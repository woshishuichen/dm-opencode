<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}



  if($act=='update')
 {
  
//usr linkcss,not use linkstyle
 $ss = "update ".TABLE_REGION." set  titleboxcssname='$abc1',titleimg='$abc2' where id='$tid' $andlangbh limit 1";
      iquery($ss);  
      $jumpvp = $jumpvpf.'&act=edit&tid='.$tid;   
       jump($jumpvp);     
 }
 
 
 if($act=='edit')
 {
  $jumpv_insert = $jumpvpf.'&act=update&tid='.$tid;
  $titleh2='修改区块';
  $sql = "SELECT * from ".TABLE_REGION."  where id='$tid' $andlangbh order by id limit 1";
$row = getrow($sql);
 
$name=$row['name'];
 
//$titlebox=$row['titlebox'];
$titleboxcssname=$row['titleboxcssname'];
$titleimg=$row['titleimg'];
$titlebox=$row['titlebox'];
 
 }
 
?>

 

<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">

 
    <tr  style="background:#fff">
      <td  class="tr">标题盒子的css名称：</td>
     <td >   
  <input class="inputcss" name="titleboxcssname" type="text" value="<?php echo $titleboxcssname?>" size="85" />
       </td>
    </tr>

     <tr  style="background:#fff">
      <td  class="tr">标题用图片代替：</td>
     <td > <input name="titleimg" type="text" value="<?php echo $titleimg?>" size="50" /> 
 <?php echo  p2030_imgyt($titleimg,'y','y');
 ?> 
        </td>
    </tr>

     

  
 

 
<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="<?php echo $titleh2;?>"></td>
    </tr>
  </table>
</form>
 
 

 
<script>
function checkhere(thisForm) { 
 

     
  

 
   // return;

}
 

</script>

