<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

/***here is common list part  ****
********
*********
***********
***********/


?>

 <h2 class="h2tit_biao fb cred"><?php echo $title;?> 的 字段选项管理 | 
 <a href='<?php echo $jumpv.'&file=addedit&act=add';?>'>添加选项</a>
 </h2>
<?php
 $sqlsub = "SELECT * from ".TABLE_FIELDOPTION." where  pid='$pid' $andlangbh order by pos desc,id";

 $rowlistsub = getall($sqlsub);
 if($rowlistsub=='no') {
  echo '<p>&nbsp;&nbsp;还没有选项，请添加...</p>';
  }
  else{
  ?>


 <form method=post action="<?php echo $jumpv;?>&act=pos">
  <table class="formtab" style="width:100%">
  <tr style="font-weight:bold;background:#eeefff;">
  <td width="80" align=center>排序号</td>
    <td width="250" align=left>选项名称</td>
    <td width="137" class=proname></td>
    <td width="100">状态</td>
	<td width="140">标识</td>
 
  </tr>
  
    <?php

   foreach($rowlistsub as $vsub){

           $tid=$vsub['id'];         
          
		   $pidname=$vsub['pidname'];  
		  // $catid=$vsub['pid'];//catid use edit when select degree cate.
		  
            menu_changesta($vsub['sta_visible'],$jumpv,$tid,'sta');
        $edit_desp='<a class=but1 href='.$jumpv.'&file=addedit&act=edit&tid='.$vsub['id'].'>修改选项</a>';
	 
		 $del_text= " <a href=javascript:del('del','$pidname','$jumpv')  class=but2>删除</a>";
		//$url = ht_url($alias,$mainalias,'subcate',$tid); //ht_url($alias,$mainalias,$type,$id)
	 
?>
  <tr <?php echo $tr_hide?>>
  <td align="center"><input type="text" name="<?php echo $tid;?>"  value="<?php echo $vsub['pos'];?>" size="5" /></td>
    <td align="left">&nbsp;<strong><?php echo $vsub['name'];?></strong></td>
    <td ><?php echo $edit_desp.$del_text;?></td>
    <td> <?php   echo $sta_visible;?></td>
	 <td>  <?php   echo $pidname;?></td>
 
  </tr>
  
  <?php 
  }
  ?>

</table>

<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
</form>

 


<?php
          
  
  }
  ?>