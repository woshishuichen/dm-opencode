<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}



  if($act=='update')
 {
  
  $despjj=zbdespadd2($abc7); 


//usr linkcss,not use linkstyle
 $ss = "update ".TABLE_REGION." set titleboxcssname='$abc1',titlestyle='$abc2',titleimg='$abc3',titlelinewrap='$abc4',titleline='$abc5',despjj='$despjj',titlestylesub='$abc8' where id='$tid' $andlangbh limit 1";
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
$titlebox=$row['titlebox'];
$titleboxcssname=$row['titleboxcssname'];
$titleimg=$row['titleimg'];
$titlestyle=$row['titlestyle'];

$titleline=$row['titleline'];
$titlelinewrap=$row['titlelinewrap'];

$despjj=zbdespedit($row['despjj']);
$titlestylesub=$row['titlestylesub'];

 }
 
?>

 

<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
   <tr>
      <td width="20%" class="tr">区块说明：</td>
      <td width="78%" class="cgray"> <?php echo $name?>
        </td>
    </tr>

 <tr  style="background:#fff">
      <td  class="tr">标题名称：</td>
     <td >   
  <input  name="titlebox" type="text" value="<?php echo $titlebox?>" size="85">
  <p class="cgray">如果为空，则标题显示 区块说明的文字</p>
       </td>
    </tr>

 <tr  style="background:#fff">
      <td  class="tr">标题盒子的css名称：</td>
     <td >   
  <input  name="titleboxcssname" class="inputcss"  type="text" value="<?php echo $titleboxcssname?>" size="85">
     <span class="cgray">试下 titlelineawe </span>
       </td>
    </tr>
    

 <tr  style="background:#fff">
      <td  class="tr">标题修改：</td>
     <td >   
 标题的样式：<input class=" " name="titlestyle" type="text" value="<?php echo $titlestyle?>" size="85">

     <div class="inputclear"> </div>
     标题用图片代替：<input name="titleimg" type="text" value="<?php echo $titleimg?>" size="50"> 
 <?php echo  p2030_imgyt($titleimg,'y','y');
 ?> 
        </td>
    </tr>
    
 <tr>
      <td  class="tr">标题下划线：</td>
      <td >      <div class="inputclear"> </div>
   长的样式：<input class=" " name="titlelinewrap" type="text" value="<?php echo $titlelinewrap?>" size="85"> 
<span class="cgray">使用 border:0;  来隐藏 </span>
     <div class="inputclear"> </div>
   短的样式：<input class=" " name="titleline" type="text" value="<?php echo $titleline?>" size="85"> 
<span class="cgray">使用 background:red; 来显示</span>

        </td>
    </tr> 

   

 
 <tr  style="background:#fff">
      <td  class="tr">副标题：</td>
      <td >副标题的内容： 
      <br /><textarea name="despjj" cols="130" rows="3"><?php echo $despjj?></textarea>
     <div class="inputclear"> </div>
   副标题的样式：<input class=" " name="titlestylesub" type="text" value="<?php echo $titlestylesub?>" size="85"> 

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

