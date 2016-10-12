<?php
/*
	欢迎使用DM建站系统，网址：www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

 

  if($act=='update')
 {

if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}

 $despjj=zbdespadd2($abc3); 

       $despcontent = zbdesp_onlyinsert($_POST['despcontent']);

 //$despjj=zbdespadd2($abc2); 


//usr linkcss,not use linkstyle
 $ss = "update ".TABLE_REGION." set name='$abc1',namebz='$abc2',despjj='$despjj',blockid='$abc4',desptext='$abc5',desp='$despcontent' where id='$tid' $andlangbh limit 1";
			iquery($ss); 	
			$jumpvp = $jumpvpf.'&act=edit&tid='.$tid;		
			 jump($jumpvp);			
 }
 
 
 
 if($act=='edit')
 {
	$jumpv_insert = $jumpvpf.'&act=update&tid='.$tid;
	$titleh2='修改';
	$sql = "SELECT * from ".TABLE_REGION."  where id='$tid' $andlangbh order by id limit 1";
$row = getrow($sql);

$name=$row['name'];
$namebz=$row['namebz'];

$effect=$row['effect'];
 
$blockid=$row['blockid'];


$despjj=zbdespedit($row['despjj']);
$desp=zbdesp_imgpath($row['desp']);
$desptext=zbdesp_imgpath($row['desptext']);

 }
 
?>


<!-- <h2 class="h2tit_biao"> <?php //echo $titleh2?> </h2>
 -->
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
    <tr>
      <td width="20%" class="tr">标题：</td>
      <td width="78%"> <input name="name" type="text" value="<?php echo $name?>" size="80">
<?php echo $xz_must;?> 
        </td>
    </tr>
    <tr>
      <td width="20%" class="tr">说明：</td>
      <td width="78%"> <input name="namebz" type="text" value="<?php echo $namebz?>" size="80">
<?php echo $xz_must;?> (仅起到说明作用，不会出现在前台。)
        </td>
    </tr>

 <tr>
      <td width="20%" class="tr">副标题的内容：</td>
      <td width="78%"> 
      <textarea name="despjj" cols="130" rows="3"><?php echo $despjj?></textarea>

<?php echo $xz_maybe;?>  
        </td>
    </tr>
     
 

   <tr>
      <td class="tr" valign="top">内容：


      </td>
      <td> 
标识：<input name="blockid" type="text" value="<?php echo $blockid?>" size="40">
<?php echo $xz_maybe;?>  
 <a href="../mod_block/mod_nodelist.php?lang=<?php echo LANG?>" target="_blank">区块管理</a> 

<br />
<?php echo check_blockid($blockid);?>



 
  <p class="cred">提示，如果上面 <strong>标识</strong> 有内容，则这里编辑器的内容在前台不会显示。</p>

	  <p>
  <!--
    <a href="../mod_imgfj/mod_imgfj.php?pid=<?php //echo $pidnamesub;?>&lang=<?php //echo LANG;?>" target="_blank">私有编辑器附件管理(<?php //echo num_imgfj($pidnamesub);?>)</a>
|
-->

<?php echo $text_imgfjlink_bjq;?>
     </p>
 
 <?php require_once('../plugin/editor_textarea.php');//textarea is in this file?>
	
</td> 
    </tr>

 
 
<tr>
      <td></td>
      <td>
      <input  class="mysubmitnew" type="submit" name="Submit" value="<?php echo $titleh2;?>"></td>
    </tr>
  </table>

    <?php echo $inputmust;?>

</form>
 
 

 
<script>
function checkhere(thisForm) {
   if (thisForm.name.value==""){
		alert("请输入标题。");
		thisForm.name.focus();
		return (false);
	}

     
  

 
   // return;

}
 

</script>

