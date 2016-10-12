<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

/***here is common list part  ****
***********/

	if($act=='insertsub'){ 
			if($abc1=="" or strlen($abc1)<3) {alert('请输入分类名称或字太少！');  jump($jumpv_back); }
			ifhaspidname(TABLE_CATE,$catid);
			$pidname='csub'.$bshou;
			$ss = "insert into ".TABLE_CATE." (pid,pidname,pbh,name,last,level,lang) values ('$abc2','$pidname','$user2510','$abc1','y',1,'".LANG."')";
			 //echo $ss;exit;
			iquery($ss);
			//tongbu_pidname($table);//change id to pidname
			 alert("添加成功");
			 jump($jumpv_back);
	}
	
	if($act=='updatesub'){  
	 
		 if($abc1=="" or strlen($abc1)<3) {alert('请输入分类名称或33字太少！');  jump($jumpv_editsub); }
		//if($abc3=="" or strlen($abc3)<3) {alert('请输入别名或字太少！');  jump($jumpv_editsub); }
		//if(!in_array($catid,$art_cat_id)){alert('先选择父级分类。');jump($PHP_SELF);}
		ifhaspidname(TABLE_CATE,$abc2);
		$catpidname_qian3=substr($abc2,0,3); 
		if($catpidname_qian3<>'cat')  {
		 
		$ss = "SELECT id from ".TABLE_CATE." where pid='$sub_pidname' $andlangbh  limit 1";
		//$sub_pidname in mod file
				$row=getrow($ss);				 
				  if($row<>'no'){
							alert('出错，请先移走它的子分类。');//only judge when father cat is sub cat
							jump($jumpv_back);
						}
						
		 }		

			$ss = "update ".TABLE_CATE." set name='$abc1',pid='$abc2',sta_noaccess='$abc3',alias_jump='$abc4',cateimg='$abc5',seo1='$abc6',seo2='$abc7',seo3='$abc8' where id='$tid' $andlangbh limit 1";
			iquery($ss); 	
		//	echo $jumpv_file;
		jump($jumpv_editsub);
	
	}

 if($act=='editsub' or $act=='edit_alias'  or $act=='csubbuju'  or $act=='csubbujuread'){
	$ss = "select * from ".TABLE_CATE." where id= '$tid' $andlangbh limit 1";
		$row = getrow($ss);
		if($row=='no'){alert($text_edit_nothisid);exit;}
		
		  $pidnamesub=$row['pidname'];
		  $sta_noaccess=$row['sta_noaccess'];
		  $name=$row['name'];
		  $seo1=$row['seo1'];
		  $seo2=$row['seo2'];
		  $seo3=$row['seo3'];
		  $alias_jump=$row['alias_jump'];
		  $cateimg=$row['cateimg'];
		  

}	 
	if($act=='editsub'){ 
		$tit_v='修改分类';	 
		
		$jump_insertupdatesub = $jumpv_file.'&act=updatesub&tid='.$tid;
	}
	
	if($act=='addsub'){
		$jump_insertupdatesub = $jumpv_file.'&act=insertsub';
		$tit_v='添加分类';
		 $sta_noaccess='';
		  $name='';
		  $seo1='';
		  $seo2='';
		  $seo3='';
		  $alias_jump='';

	}
	


	if($act=='edit_alias'){ 
	 
	  $tit_v='修改别名';
	   
	}
 
  
	
if($act=='editsub' or $act=='addsub'  or  $act=='edit_alias'  or $act=='csubbuju'  or $act=='csubbujuread')	{
?>
 

 <h2 class="h2tit_biao fb cred csubheaderlist"> 
   <a href='<?php echo $jumpv_back;?>'>返回主类</a>  | 
 <?php
 $editsub_cur =''; $edit_alias_cur =''; $csubbuju_cur =''; $csubbujuread_cur ='';
if($act=='editsub') $editsub_cur =' cur'; 
if($act=='edit_alias') $edit_alias_cur = ' cur'; 
if($act=='csubbuju') $csubbuju_cur = ' cur'; 
if($act=='csubbujuread') $csubbujuread_cur = ' cur'; 


 if($act=='editsub' or $act=='edit_alias' or $act=='csubbuju'  or $act=='csubbujuread'){
 echo '<a class="'.$editsub_cur.'" href="'.$jumpv_file.'&act=editsub&tid='.$tid.'">修改分类</a> | ';

if($modtype=='node'){
 echo '<a class="'.$edit_alias_cur.'" href="'.$jumpv_file.'&act=edit_alias&tid='.$tid.'">修改别名</a> | ';
echo '<a class="'.$csubbuju_cur.'" href="'.$jumpv_file.'&act=csubbuju&tid='.$tid.'">子分类列表 布局</a> | ';
echo '<a class="'.$csubbujuread_cur.'" href="'.$jumpv_file.'&act=csubbujuread&tid='.$tid.'">子分类详情页 布局</a> ';
}


 }

 }
 ?>  
 </h2>  
 <?php 
 if($act=="editsub" or $act=="addsub" )
 {
 echo '<h2 class="h2tit_biao">';
 echo $tit_v;
 echo '</h2>';
 }
 ?>

 <?php
  if($act=='editsub' or $act=='addsub')	{
  ?>
<form  onsubmit="javascript:return catsub(this)" action="<?php  echo $jump_insertupdatesub;?>" method="post" enctype="multipart/form-data">
<table class="formtab">

  <tr>
    <td width="12%" class="tr">分类名称：</td>
    <td width="88%"><input name="name" type="text" id="name" value="<?php echo $name?>" size="80">
     </td>
  </tr>
 
  <?php if($act=='addsub')
  {
  ?>
  <tr>
    <td width="12%" class="tr">选择分类的父级：</td>
    <td width="88%">
	<?php	
 $sql_sel = "select pidname,pid,name,sta_visible from  ".TABLE_CATE." where pid='$catid' and level=1 $andlangbh order by pos desc,id";
    $rowlist_sel = getall($sql_sel);
	//echo $sql_sel;exit;	
	?>
 <select name='pcla'><option  value='<?php echo $catid;?>'>(主类)<?php echo $catname;?></option>
<?php 
   foreach ($rowlist_sel as $vcla){  //by pidname is father.
			 
				 if($vcla['sta_visible']<>'y') $subname_hide22='(已隐藏)';else $subname_hide22='';			
			
					echo '<option value='.$vcla['pidname'].'>&nbsp;&nbsp;├ '.$vcla['name'].$subname_hide22.'</option>';
				
			}
 
		?>
 </select> 
 

 </td>
  </tr>
  
  
  
  <?php }
  ?>
  <?php if($act=='editsub')
  {
  ?>
<tr>
    <td width="12%" class="tr">选择分类的父级：</td>
    <td width="88%">
	<?php	
 $sql_sel = "select pidname,pid,name,sta_visible from  ".TABLE_CATE." where pid='$catid' $andlangbh order by pos desc,id";
    $rowlist_sel = getall($sql_sel);
	//echo $sql_sel;exit;	
	?>
 <select name='pcla'><option  value='<?php echo $catid;?>'>(主类)<?php echo $catname;?></option>
<?php 
   foreach ($rowlist_sel as $vcla){  //by pidname is father.
			$opt_pidname=$vcla['pidname'];	
			$optname=$vcla['name'];

			// $sqlcate = "select * from  ".TABLE_CATE." where id='$tid' $andlangbh order by pos desc,id limit 1";
    		//$rowcate22 = getrow($sqlcate);
    		//$cur_pidname=$rowcate22['pidname'];	
    		//$cur_pid=$rowcate22['pid'];  //more to mod file


			//$cur_pid_here = web_getpid_cat($tid);
			//$pidname_here = web_getpidname_cat($tid);
			  
		   
			  if($opt_pidname == $sub_pid) $selected2=' selected="selected"';else $selected2='';

			  if($vcla['sta_visible']<>'y') $subname_hide22='(已隐藏)';else $subname_hide22='';

				//echo $opt_pidname.'--'.$cur_pidname.'|||';
				 if($opt_pidname<>$sub_pidname){
					echo '<option value='.$opt_pidname.$selected2.'>&nbsp;&nbsp;├ '.$optname.$subname_hide22.'</option>';
					 }
			}
 
		?>
 </select> 
 

 </td>
  </tr>
    <tr>
      <td width="12%" class="tr">禁止访问：</td>
      <td width="88%" ><select name="selxeacc">
	  <?php select_from_arr($arr_yn,$sta_noaccess,'');?>
     </select>
	 
	 <?php
	 if($sta_noaccess=='y') echo '<span style="color:red">禁止访问</span>';
	 ?>
        </td>
    </tr>

      <tr>
    <td class="tr">链接跳转：</td>
    <td><input name="alias_jump" type="text"  value="<?php echo $alias_jump?>" size="80" />
	  <?php echo $aliasjumptext.$xz_maybe;?>
      <?php if($row['alias_jump']<>'') { echo $text_jump;
      }?>
     </td>
  </tr>
   <tr>
    <td class="tr">分类图片：</td>
    <td><input name="cateimg" type="text"  value="<?php echo $cateimg?>" size="30" />
	  <?php echo $xz_maybe; 
       ?>
        <?php   echo  p2030_imgyt($cateimg,'y','y');
echo $text_imgfjlink; 
?>
     </td>
  </tr>


	
  <tr>
    <td width="12%" class="tr">搜索引擎优化：</td>
    <td width="88%"> SEO标题：<input name="page_seo1" type="text" id="page_seo1" value="<?php echo $seo1 ;?>" size="100">
      <?php echo $xz_maybe;?>
     <div class="c5"></div>SEO关键字：
      <input name="page_seo2" type="text" id="page_seo2" value="<?php echo $seo2;?>" size="100">
      <?php echo $xz_maybe;?><br />多个关键字，请以空格隔开。
      <div class="c5"></div>
SEO描述：
<textarea id="page_seodesp" name="page_seodesp" cols="100" rows="3" ><?php echo $seo3;?></textarea>
      <?php echo $xz_maybe;?>
      </td>
  </tr>


  <?php } ?>
  <tr>
    <td></td>
    <td> <input class="mysubmit" type="submit" name="Submit" value="<?php echo $tit_v;?>"></td>
  </tr>
 </table>
</form>

<?php
}
else if($act=='edit_alias'){
 $framesrc='../mod_module/mod_alias.php?pid='.$pidnamesub.'&lang='.LANG.'&type=cate';
 echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="800" scrolling="no" frameborder="0"></iframe>';

}

elseif($act=='csubbuju'){
	
 echo $text_imgfjlink;
	$framesrc='../mod_layout/mod_layout.php?pid='.$pidnamesub.'&lang='.LANG.'&type=csub';
	echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1000" scrolling="no" frameborder="0"></iframe>';
}
elseif($act=='csubbujuread'){

 echo $text_imgfjlink;
	$framesrc='../mod_layout/mod_layout.php?pid='.$pidnamesub.'&lang='.LANG.'&type=read';
	echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1000" scrolling="no" frameborder="0"></iframe>';
	//cate sub de detail is read too.no use csubread
}
?>

 