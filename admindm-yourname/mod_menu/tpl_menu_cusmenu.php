<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
//---------------------
if($act == "insert")
{
   
 
	
} 
if($act == "update")
{
$ss = "update ".TABLE_STYLE." set  sta_cusmenu='$abc1',cusmenu='$abc2'  where pidname='$stylebh' $andlangbh limit 1";
   //echo $ss;exit;  
  iquery($ss);   
    jump($jumpvf.'&act=edit');
    
  
} 
 
if($act=='add'){
   
}

if($act=='edit'){
  $formact = $jumpvf.'&act=update&tid='.$tid;

  $subtext ='修改';
  

  //   $ss = "select cusmenu from ".TABLE_STYLE." where pidname='$stylebh' $andlangbh limit 1"; 
  // $row = getrow($ss);
  // $cusmenu= $row['cusmenu'];//in mod file
  
  
}

?>

 
<?php 
 
if($act=="add" or $act=='edit'){
?>
<h2 class="h2tit_biao"><?php echo $subtext;?>自定义菜单内容</h2>
<form  method="post"   action="<?php echo $formact;?>">
<table class="formtab">
 
   <tr>
      <td class="tr">是否启动自定义：</td>
      <td> <select name="sta_cusmenu">
    <?php select_from_arr($arr_yn,$sta_cusmenu,'');?>
     </select> </td>
      </tr>

   <tr>
    <td width="12%" class="tr">菜单内容：</td>
    <td width="88%">
 
<textarea   cols="150" id="editor1" name="menu" rows="30">
<?php echo $cusmenu;?>
</textarea>
      </td>
  </tr>
 



  <tr>
    <td> </td>
    <td>
 <br /> <br />
	<input class="mysubmitnew" type="submit" name="Submit" value="<?php echo $subtext?>" /> <br />
</td>
  </tr>
 </table>
</form>


<?php
}
?>
 
  