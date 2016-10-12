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

 <h2 class="h2tit_biao fb cred">
 <a href='<?php echo $jumpv_addsub;?>'>添加子分类</a>
 </h2>
<?php
 $sqlsub = "SELECT * from ".TABLE_CATE." where  pid='$catid' $andlangbh order by pos desc,id";
 $rowlistsub = getall($sqlsub);
 if($rowlistsub=='no') {
  echo '<p>&nbsp;&nbsp;还没有分类，请添加...</p>';
  }
  else{
  ?>


 <form method=post action="<?php echo $jumpv_back;?>&act=pos">
  <table class="formtab formtabhovertr" style="width:100%">
  <tr style="font-weight:bold;background:#eeefff;">
  <td width="80" align=center>排序号</td>
    <td width="250" align=left>分类名称</td>
    <td width="137" class=proname></td>
    <td width="100">状态</td>
	
<td width="120">标识</td>
<td width="60">管理</td>

	<td width="120">网址</td>
	<td width="50">其他</td>
  </tr>  
    <?php
   foreach($rowlistsub as $vsub){
           $tid=$vsub['id'];
		   $level=$vsub['level'];$last=$vsub['last']; 
		   $pidname=$vsub['pidname'];  $alias_jump=$vsub['alias_jump'];   		   
		   $aliascc = alias($pidname,'cate');	   
		   
		  // $catid=$vsub['pid'];//catid use edit when select degree cate.
            menu_changesta($vsub['sta_visible'],$jumpv_back,$tid,'sta_catesub');
        $edit_desp='<a class=but1 href='.$jumpv_back.'&file=subedit&act=editsub&tid='.$vsub['id'].'>修改分类</a>';
		$del_text= " <a href=javascript:del('delsubcate','$pidname','$jumpv_back')  class=but2>删除</a>";
	$gltext = 	"<a class=but1 href=../mod_node/mod_$modtype.php?lang=".LANG."&catpid=$catid&page=0&catid=$pidname>管理</a>";
 
	 if($alias_jump<>'') $aliasjumpv = '<span class="cred" >(跳转)</span>';
		 else  $aliasjumpv = '';

		$url_subcc = url('cate',$aliascc,$tid,$alias_jump); 
		 $url_sub_httpcc = $userurl.$url_subcc;
		 $url_subcc=l($url_sub_httpcc,$url_subcc.$aliasjumpv,'','');
					
//----if sub sub cat------------------------
         $sqlsub_sub = "SELECT * from ".TABLE_CATE." where  pid='$pidname' $andlangbh order by pos desc,id";		
         $row_sub = getall($sqlsub_sub);
		  if($row_sub<>'no') $sslevel = "update ".TABLE_CATE." set level=1,last='n' where id='$tid' $andlangbh limit 1";
			else $sslevel = "update ".TABLE_CATE." set level=1,last='y' where id='$tid' $andlangbh limit 1";
        iquery($sslevel); 
?>
  <tr <?php echo $tr_hide?>>
  <td align="center"><input type="text" name="<?php echo $tid;?>"  value="<?php echo $vsub['pos'];?>" size="5" /></td>
    <td align="left">&nbsp;<strong><?php echo decode($vsub['name']);?></strong></td>
    <td ><?php echo $edit_desp.$del_text;?></td>
    <td> <?php   echo $sta_visible;?></td>
	 <td>  <?php   echo $pidname;?></td>
	 <td>  <?php   echo $gltext;?></td>
   <td>  <?php  if($modtype=='node')  echo $url_subcc;?></td>
   <td>  <?php   echo $level.'-'.$last;?></td>
  </tr>
  
  <?php 
  
      //----if sub sub cat------------------------       
         if($row_sub<>'no'){
              foreach($row_sub as $v2_sub){
					$subtid=$v2_sub['id']; 
					$level_sub=$v2_sub['level'];$last_sub=$v2_sub['last'];
					
					$subname=$v2_sub['name'];  $alias_jump2=$v2_sub['alias_jump'];   
					$sub_pid=$v2_sub['pid'];
					$subpidname=$v2_sub['pidname'];
					$alias_sub=alias($subpidname,'cate');
				 
					menu_changesta($v2_sub['sta_visible'],$jumpv_back,$subtid,'sta_catesub');
					
					$edit_desp='<a class=but1 href='.$jumpv_back.'&file=subedit&act=editsub&tid='.$subtid.'>修改分类</a>';
					 
					$del_text= " <a href=javascript:del('delsubcate','$subpidname','$jumpv_back')  class=but2>删除</a>";
					$gltext2 = 	"<a class=but1 href=../mod_node/mod_$modtype.php?lang=cn&catpid=$catid&page=0&catid=$subpidname>管理</a>";

					if($alias_jump2<>'') $aliasjumpv2 = '<span class="cred" >(跳转)</span>';
					else  $aliasjumpv2 = '';
					
					$url_sub = url('cate',$alias_sub,$subtid,$alias_jump2); 
					$url_sub_http = $userurl.$url_sub;
					$url_sub2=l($url_sub_http,$url_sub.$aliasjumpv2,'','');
					 
					
					 $sslevel = "update ".TABLE_CATE." set level=2,last='y' where id='$subtid' $andlangbh limit 1";
					iquery($sslevel); 
		
				?>  
				<tr <?php echo $tr_hide;?>>
				  <td align="center">&nbsp;&nbsp;├ <input type="text" name="<?php echo $subtid;?>"  value="<?php echo $v2_sub['pos'];?>" size="3" /></td>
					<td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├ <?php echo decode($subname);?></td>
					<td ><?php echo $edit_desp.$del_text;?></td>
					<td> <?php   echo $sta_visible;?></td>					  
					     <td>  <?php   echo $subpidname;?></td>
					     <td>  <?php   echo $gltext2;?></td>
						 <td>  <?php if($modtype=='node')  echo $url_sub2;?></td>
						<td>  <?php   echo $level_sub.'-'.$last_sub;?></td>
				  </tr>
					
					<?php
						$ss2222 = "update ".TABLE_CATE." set level=2,last='y' where pidname='$subpidname'  $andlangbh limit 1";
						//echo $ss2222.'<br>';
						iquery($ss2222);
	}//end foreach
	
	$ss = "update ".TABLE_CATE." set level=1,last='n' where pidname='$pidname' $andlangbh limit 1";
	iquery($ss);
	 

			}
	 else{		
			$ss = "update ".TABLE_CATE." set level=1,last='y' where pidname='$pidname'  $andlangbh limit 1";
			iquery($ss);
	 }
	 
  }
  ?>

</table>

<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
</form>
<?php
  }
  ?>