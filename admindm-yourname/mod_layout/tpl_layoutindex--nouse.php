<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
//-------------
 if($act=="edit"){
  
  		 $ss = "update ".TABLE_LAYOUT." set banner='$abc1',contentbot='$abc2',dateedit='$dateall' where id='$tid' $andlangbh limit 1";
		   //echo $ss;exit;
			iquery($ss);   	
			 jump($jumpv_file);
	 	
		
 }
 
if($act=="list"){
 
 $jumpv_update_buju = $jumpv_file.'&act=edit&tid='.$tid;
 //echo $jumpv_update_buju;
    ?>

	
<form  onsubmit="javascript:return checkhere-(this)" action="<?php  echo $jumpv_update_buju;?>"   method="post" enctype="multipart/form-data">
<table class="formtab">

 
 

<tr>
    <td width="22%" class="tr">首页banner设置：</td>
    <td width="78%">
<input name="raight1" type="text"  value="<?php echo $row['banner'];?>" size="55"> <?php echo $xz_maybe;?>
<Br />
<?php echo check_blockid($row['banner']);?>

      </td>
  </tr>
  
  <tr>
    <td width="22%" class="tr"><br /><br />首页内容区域：</td>
    <td width="78%"><br /><br />

  <input name="raightregg" type="text"  value="<?php echo $row['contentbot'];?>" size="30"> 
  <?php echo $xz_maybe;?>
 (如果为空，则调用prog_index.php)
<Br />
<?php echo check_blockid($row['contentbot']);?>

 

      </td>
  </tr>

  

   

  <tr>
    <td></td>
    <td> <input class="mysubmit" type="submit" name="Submit" value="提交"></td>
  </tr>
 </table>
</form>
	 

<?php } 
?>