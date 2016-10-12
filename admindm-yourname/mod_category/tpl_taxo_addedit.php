<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com  
*/

	if($act=='insert'){ 
			
      $catbs='csub'.$bshou;
      $ss = "insert into ".TABLE_CATE." (pid,pidname,pbh,name,modtype,last,level,lang) values ('$catepidname','$catbs','$user2510','$abc1','blockdh','y',1,'".LANG."')";
      // echo $ss;exit;
       iquery($ss);

			 alert("添加成功");
			//tongbu_pidname($table);//change id to pidname
			jump($jumpv);
	}
	
	if($act=='update'){ 
		 
	    $ss = "update ".TABLE_CATE." set name='$abc1'  where id='$tid'  $andlangbh limit 1";
		//echo $ss;exit;
			iquery($ss); 	
		jump($jumpv);

	 

	
	}
	
   if($act=='edit'){  
      $sql2 = "SELECT * from ".TABLE_CATE." where  id= '$tid' and modtype='blockdh'   $andlangbh  order by pos desc,id desc limit 1";
      $row = getrow($sql2);
      $name = $row['name'];

 
        $jumpform = $jumpvf.'&act=update&tid='.$tid;
         $tit_v='修改';

  }
  
  if($act=='add'){
     $name ='';
    $jumpform = $jumpvf.'&act=insert';
    $tit_v='添加';
   
  }
  


if($act=='add' or $act=='edit')	{
?>	
 <div class="menu">
<a href="<?php echo $jumpv;?>">返回管理列表</a>

</div>

 <h2 class="h2tit_biao"><?php  echo $tit_v;?> </h2>
<form  onsubmit="javascript:return checkhere(this)" action="<?php  echo $jumpform;?>" method="post" enctype="multipart/form-data">
<table class="formtab">

  <tr>
    <td width="18%" class="tr">标题：</td>
    <td width="75%"><input name="name" type="text" id="name" value="<?php echo $name?>" size="80">
	
     </td>

  
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
		alert("请输入标题");
		thisForm.name.focus();
		return (false);
        } 
		
}
 </script>
 