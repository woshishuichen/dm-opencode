<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

if($act=='insert')
 {
  if($abc1=="") {$abc1='pls input title'; }

  $pidname='regcommon'.$bshou;
 

			$ss = "insert into ".TABLE_REGION." (pid,pidname,pbh,name,type,cssname,sta_width_cnt,lang,dateedit) values ('0','$pidname','$user2510','$abc1','common','$abc2','$abc3','".LANG."','$dateall')";
			 //echo $ss;exit;
			iquery($ss);
			alert('添加成功！');
			//jump($jumpvf.'&act=edit&pidname='.$pidname);
			jump($jumpv.'&file=list&act=list&pidname='.$pidname);
			
 
 }
 if($act=='update')
 {
    if($abc1=="") {$abc1='pls input title'; }
			 $ss = "update ".TABLE_REGION." set name='$abc1',cssname='$abc2',sta_width_cnt='$abc3' where pidname='$pidname' $andlangbh limit 1";
			iquery($ss); 	
		 
			 jump($jumpvpf.'&act=edit');
	 	
 }
 
 
 if($act=='add')
 { $titleh2= '添加';
 
 $jumpv_insert = $jumpvf.'&act=insert&stylebh='.$stylebh;
 $name=$cssname='';
 $sta_width_cnt = 'n';
 
 }
 
 if($act=='edit')
 {
 $titleh2= '修改';
  $jumpv_insert =  $jumpvpf.'&act=update';
   $sta_sub = 'y';
 
$sql = "SELECT * from ".TABLE_REGION."  where pidname='$pidname' $andlangbh order by id limit 1";
$row222 = getrow($sql);
//$desp=zbdesp_imgpath($row['desp']);
$name= $row222['name']; $cssname= $row222['cssname']; 
$type= $row222['type']; 
$sta_width_cnt= $row222['sta_width_cnt'];
 
}

 if($act=='add' or $act=='edit')
 {
?>
<h2 class="h2tit_biao"><?php echo $titleh2;?></h2>
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert?>" method="post">
  <table class="formtab">
    <tr>
      <td width="22%" class="tr">说明：</td>
      <td width="77%"> <input name="name" type="text" value="<?php echo $name?>" size="60">
       </td>
    </tr>




 <tr>
      <td width="22%" class="tr">css名称：</td>
      <td width="77%">
           <input name="cssname" type="text" value="<?php echo $cssname?>" class="inputcss" size="60">
       </td>
    </tr>
 

     <tr>
      <td width="22%" class="tr">是否全宽：</td>
      <td width="77%">
          
               
               <select name="sta_width_cnt">

         <?php select_from_arr($arr_yn,$sta_width_cnt,'plsno');?>
     </select>
       </td>
    </tr>
 

 
<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="<?php echo $titleh2;?>"></td>
    </tr>
  </table>
</form>

 

<?php
}
?>

<script>
function checkhere(thisForm) {
   if (thisForm.name.value=="")
	{
		alert("请输入说明。");
		thisForm.name.focus();
		return (false);
	}
   

   // return;

}
 

</script>
