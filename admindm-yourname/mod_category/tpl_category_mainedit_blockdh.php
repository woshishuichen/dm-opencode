<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

exit;
//no use.....

 
	if($act=='updatemain'){ 
		if($abc6<5) $abc6 = 5;
		if($abc1=="")  $abc1 = '请输入主类名称或字太少！';
		//if($abc2=="" or strlen($abc2)<2) {alert('请输入别名或字太少！');  jump($jumpv_editmain); }
		//ifaliasrepeat($abc2,$catid,'maincate',$jumpv_editmain);//ifaliasrepeat($alias,$curid,$type,$backpage)
	    $ss = "update ".TABLE_CATE." set name='$abc1',modtype='$abc2',sta_noaccess='$abc3',sm_w='$abc4',sm_h='$abc5',maxline='$abc6' where pidname='$catid' $andlangbh limit 1";
		//echo $ss;exit;
			iquery($ss); 	
		jump($jumpv_editmain_blockdh);

	 

	
	}
	
if($act=='editmain')	{
	$ss = "select * from ".TABLE_CATE." where pidname= '$catid' $andlangbh limit 1";
		$row = getrow($ss);
		if($row=='no'){alert($text_edit_nothisid);exit;}	
		 $tit_v='修改主类';
		 $sta_modtype=$row['modtype'];
		 $sta_noaccess=$row['sta_noaccess'];
		 $listfg=$row['listfg'];   $detailfg=$row['detailfg'];
		$album=$row['album'];$albumcssname=$row['albumcssname'];$albumposi=$row['albumposi'];	 
		$name=$row['name']; 

		
		$jump_insertupdatesub = $jumpv_file.'&act=updatemain';

?>	
 
 <h2 class="h2tit_biao"><?php  echo $tit_v;?> </h2>
<form  onsubmit="javascript:return checkhere(this)" action="<?php  echo $jump_insertupdatesub;?>" method="post" enctype="multipart/form-data">
<table class="formtab">

  <tr>
    <td width="18%" class="tr">主类名称：</td>
    <td width="75%"><input name="name" type="text" id="name" value="<?php echo $name?>" size="80">
	<?php
	if($act=='addmain'){
	   echo '<p class="hintbox">提示：<br />添加完后，必须去修改别名。</p>';
	}
	 
	 
	 ?>
     </td>
  </tr>
  

  
	

   <tr>
    <td  class="tr">分类类型：</td>
    <td> <select name="selxe22">
	  <?php select_from_arr($arr_mod,$sta_modtype,'');?>
     </select>
     </td>
  </tr>

      <tr>
      <td class="tr">禁止访问：</td>
      <td><select name="selxeacc">
	  <?php select_from_arr($arr_yn,$sta_noaccess,'');?>
     </select>
	 
	 <?php
	 if($sta_noaccess=='y') echo '<span style="color:red">禁止访问</span>';
	 ?>
        </td>
    </tr>

	
      <tr>
    <td class="tr">缩略图片：</td>
    <td>	
	宽：<input name="namieww2" type="text"  value="<?php echo $row['sm_w']?>" size="10"> <br />
	高：<input name="naimehh" type="text"  value="<?php echo $row['sm_h']?>" size="10"> <br />
	<?php echo $text_sm_wh;?>
     </td>
  </tr>

  <tr>
    <td class="tr">每页记录数maxline：</td>
    <td><input name="maxline" type="text"  value="<?php echo $row['maxline']?>" size="30">
	 <span class="cgray">(为数字，且要大于或等于5)</span>
     </td>
  </tr>
  
  <tr>
    <td></td>
    <td> <input class="mysubmit" type="submit" name="Submit" value="<?php echo $tit_v;?>"></td>
  </tr>
 </table>
</form>
<?php
}
?>
<script>
function  checkhere(thisForm){
		if (thisForm.name.value==""){
		alert("请输入名称");
		thisForm.name.focus();
		return (false);
        }
		if (thisForm.selxe22.value==""){
		alert("请选择分类类型");
		thisForm.selxe22.focus();
		return (false);
        }
	


		
}
 </script>
 