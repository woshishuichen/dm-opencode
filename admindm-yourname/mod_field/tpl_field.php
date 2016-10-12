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

 <h2 class="h2tit_biao fb cred"><?php echo $title;?>  | 
 <a href='<?php echo $jumpv.'&file=addedit&act=add';?>'>添加字段</a>
 </h2>
<?php
 $sqlsub = "SELECT * from ".TABLE_FIELD." where  pid='$pid' $andlangbh order by pos desc,id";
 $rowlistsub = getall($sqlsub);
 if($rowlistsub=='no') {
  echo '<p>&nbsp;&nbsp;还没有字段，请添加...</p>';
  }
  else{
  ?>


 <form method=post action="<?php echo $jumpv;?>&act=pos">
  <table class="formtab" style="width:100%">
  <tr style="font-weight:bold;background:#eeefff;">
  <td width="80" align=center>排序号</td>
    <td width="200" align=left>字段名称</td>
    <td width="137" class=proname></td>
    <td width="100">状态</td>
	<td width="140">标识</td>
	<td width="80">类型</td>
	<td width="100">其他</td>
  </tr>
  
    <?php

   foreach($rowlistsub as $vsub){

           $tid=$vsub['id'];$type_fie=$vsub['typeinput']; 
		   $pidname=$vsub['pidname'];  
		  // $catid=$vsub['pid'];//catid use edit when select degree cate.
		  
            menu_changesta($vsub['sta_visible'],$jumpv,$tid,'sta');
        $edit_desp='<a class=but1 href='.$jumpv.'&file=addedit&act=edit&tid='.$vsub['id'].'>修改字段</a>';
		$del_text= " <a href=javascript:del('del','$pidname','$jumpv')  class=but2>删除</a>";

		//$url = ht_url($alias,$mainalias,'subcate',$tid); //ht_url($alias,$mainalias,$type,$id)
	  if($type_fie=='checkbox' or $type_fie=='radio' or $type_fie=='select') 
	  {
	   $sqlfieopt = "SELECT id from ".TABLE_FIELDOPTION." where  pid='$pidname' $andlangbh order by pos desc,id";
     //echo $sqlfieopt;
	   $fieoptnum=getnum($sqlfieopt);
 
	  
	  $fieldoption = '<a target="_blank" href="mod_fieldoption.php?pid='.$pidname.'&type='.$type_fie.'&lang='.LANG.'">设置字段选项(<span class="cred">'.$fieoptnum.'</span>)</a>';
	  
	  }
	  else $fieldoption ='';
?>
  <tr <?php echo $tr_hide?>>
  <td align="center"><input type="text" name="<?php echo $tid;?>"  value="<?php echo $vsub['pos'];?>" size="5" /></td>
    <td align="left">&nbsp;<strong><?php echo $vsub['name'];?></strong></td>
    <td ><?php echo $edit_desp.$del_text;?></td>
    <td> <?php   echo $sta_visible;?></td>
	 <td>  <?php   echo $pidname;?></td>
   <td> 
	  <?php echo select_return_string($arr_field,0,'',$type_fie);?>
      
	 </td>
   <td>  <?php   echo $fieldoption;?></td>
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