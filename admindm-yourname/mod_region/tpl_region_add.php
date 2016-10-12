<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

 
ifhaspidname(TABLE_REGION,$pid);
	
	 

 if($act=='insert')
 {
	
	if($abc1=='') $abc1 = 'pls input title'; 
			 
 $pidnamesub='block'.$bshou;

$arr_cfg = 'cssname:##==#==sta_title:##y==#==cssstyle:##==#==bgcolor:##==#==bgimg:##==#==bgeffect:##n==#==sta_width_title:##y==#==sta_width_cnt:##n==#==titleimg:##==#==titlestyle:##==#==titlestylesub:##==#==titlelinelong:##==#==titlelineshort:##==#==titlelineawe:##==#==linkurl:##==#==linktitle:##==#==linkcss:##==#==linkposi:##belowtitle';

$ss = "insert into ".TABLE_REGION." (pid,pidname,pbh,name,lang,dateedit,arr_cfg) values ('$pid','$pidnamesub','$user2510','$abc1','".LANG."','$dateall','$arr_cfg')";
			//echo $ss;exit;
			iquery($ss);	
alert('添加成功！');
			$jumpvp = $jumpvpid.'&file=sub';		
			jump($jumpvp);			
 }



 
  if($act=='add')
 {
	$jumpv_insert = $jumpvpidf.'&act=insert';
	$titleh2='添加';

	$name='';
$cssname='';
$clear='';$style='';
$linkurl='';$effect='';
$blockid='';
 

 }
 


 
?>

<h2 class="h2tit_biao"><?php echo $title?> 
<span style="color:#FF9935">(<?php echo get_field(TABLE_REGION,'name',$pid,'pidname');?>)</span>
<a href="<?php echo $jumpvpid?>&file=sub">返回区域</a>
</h2>
 

<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
    <tr>
      <td width="20%" class="tr">标题：</td>
      <td width="78%"> <input name="name" type="text" value="<?php echo $name?>" size="40">
<?php echo $xz_must;?>
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
   if (thisForm.name.value==""){
		alert("请输入标题。");
		thisForm.name.focus();
		return (false);
	}

     
  

 
   // return;

}
 

</script>

