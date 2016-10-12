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
 if($effect=='block_titlecenter')  
 $ss = "update ".TABLE_REGION." set linkurl='$abc1',linktitle='$abc2',linkcss='$abc3',linkposi='$abc4',dateedit='$dateall' where id='$tid' $andlangbh limit 1";
 else
 $ss = "update ".TABLE_REGION." set linkurl='$abc1',linktitle='$abc2',linkcss='$abc3',dateedit='$dateall' where id='$tid' $andlangbh limit 1";
 
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
$linkurl=$row['linkurl'];$linkcss=$row['linkcss'];$linkposi=$row['linkposi'];$linktitle=$row['linktitle'];


 }
 
?>


<h2 class="h2tit_biao"> 
<a href="http://www.demososo.com/detail-99.html" target="_blank">什么是更多的链接?</a> 
 </h2>

<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
  

  

<tr style="background:#fcf6ee"> <td  class="tr">关于更多链接：</td>
      <td width="78%">
      链接网址： <input name="linkurl" type="text" value="<?php echo $linkurl?>" size="60">
<?php echo $xz_maybe;?> （ 如果有值，则会出现 链接）

 <div class="inputclear"> </div>
 链接的字样：<input name="linktitle" type="text" value="<?php echo $linktitle?>" size="80">
<?php echo $xz_maybe;?> （ 可以填写‘查看详情’，如果不填，则为 ‘更多’）
 <div class="inputclear"> </div>
 链接的css名称：<input class="inputcss" name="linkcss" type="text" value="<?php echo $linkcss?>" size="30">
<?php echo $xz_maybe;?> 
<p class="cgray">默认是蓝色，其他选择：more1 透明  , more2 白色，more3 黑色，more4 红色，more5 橙色，more6 绿色，more7 紫色</p>
 

<?php if($effect=='block_titlecenter'){?>
 <div class="inputclear"> </div> 
 链接的位置：<select name="linkposi">  
   <?php select_from_arr($arr_linkposi,$linkposi,'plsno');?>
     </select> 

<?php  }?>

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

