<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<?php
if($act=="update"){   
$jump_back = $jumpv_file.'&act=edit&tid='.$tid;

      if($abc1=="" or strlen($abc1)<1) {alert('请输入语言说明');  jump($jump_back); }
	  


     $ss = "update ".TABLE_LANG." set name='$abc1',path='$abc2' where  pbh='".USERBH."' and id='$tid' limit 1";
     //sta_main use button to set in list.php
    iquery($ss);
   //alert("修改成功");
       jump($jump_back);                      
}

if($act=="insert"){  
             
}
 

 if($act=='edit'){ 
 $sql = "SELECT * from ".TABLE_LANG."  where  id='$tid' and pbh='".USERBH."'    order by id limit 1"; 
$row = getrow($sql);

		$titv='语言设置'; 		  
		$tid=$row['id'];  
		$name=$row['name']; 
		$path=$row['path']; 
		$lang=$row['lang']; 
	
 
		$jump_insert=$jumpv_file.'&act=update&tid='.$tid;	
	
	} 
 if($act=='add'){  //echo 'no add function...';exit;
		$titv='添加语言';

		$name=''; 
		$path='';
		$lang='';

		$jump_insert=$jumpv_file.'&act=insert';
		 
	
	}
if($act=='add' or $act=='edit') {	
?> 

<h2 class="h2tit_biao"><?php echo $titv;?>  
</h2>
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_insert;?>" method="post">
  <table class="formtab">
 
	
    <tr>
      <td width="20%" class="tr">语言说明</td>
      <td width="78%"> <input name="name" type="text" value="<?php echo $name?>" size="40">
<?php echo $xz_must;?>
        </td>
    </tr>

	<tr>
      <td class="tr">访问路径：</td>
      <td> <input name="path" type="text" value="<?php echo $path?>" size="40">
<?php echo $xz_must;?> <br />
(  
访问路径比如www.yoursite.com/<span class="cred">en</span>/index.html 还是 www.yoursite.com/<span class="cred">english</span>/index.html
  
)
        </td>
    </tr>
	<?php 
if($act=='add'){
?>	
	<tr>
      <td class="tr">语言标识：</td>
      <td> <input name="lang" type="text" value="<?php echo $lang?>" size="40">
<?php echo $xz_must;?>(此项添加后不能修改)
        </td>
    </tr>
	<?php 
 }
 else {
?>
<tr>
      <td class="tr">语言标识：</td>
      <td>  <?php echo $lang?>  (标识不能修改)
        </td>
    </tr>
	<?php 
 } 
?>	

 

<?php 
/*繁体和主语言通过 在列表中 以  button方式产生*/
?>
  
  
	 
<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="提交"></td>
    </tr>
  </table>
</form>

</div>
	
<?php } ?>
 
<script>
function  checkhere(thisForm){
		if (thisForm.name.value==""){
		alert("请输入语言说明");
		thisForm.name.focus();
		return (false);
        } 
		if (thisForm.path.value==""){
		alert("请输入路径");
		thisForm.path.focus();
		return (false);
        } 
		if (thisForm.pidname.value==""){
		alert("请输入标识");
		thisForm.pidname.focus();
		return (false);
        } 
		
	
		
}

</script>


