<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

//---------
?>

<form  onsubmit="return formvalidate()"  action="<?php  echo $jumpv_list.'&act=search';?>"   method="post" enctype="multipart/form-data">
<table class="formtab">


  <tr>
   
    <td width="88%"><strong>搜索别名：	</strong>
	
	<br /><input name="alias"   type="text"  value="" size="80">
 <input class="mysubmit" type="submit" name="Submit" value="搜索别名">
	</td>
  </tr>

  
 </table>
</form>
	 

	<br /> 
<hr><br />
 
<?php 
 if($act=='search') $where = "where  name like '%$abc1%' $andlangbh ";
 else $where=" where $noandlangbh ";
$sql = "SELECT * from ".TABLE_ALIAS." $where order by id desc";	
 // echo $sql;exit;
 $num_rows = getnum($sql);

     if($num_rows>0){
 
        $offset=5;$maxline=20;
        $page_total=ceil($num_rows/$maxline); //maxline is in mod_node.php

        if (!isset($page)||($page<=0)) $page=1;
        if($page>$page_total) $page=$page_total;
        $start=($page-1)*$maxline;
        $sql2="$sql  limit $start,$maxline"; 
        $rowlist = getall($sql2);   


		   ?>
 <table class="formtab">

<tr class="formtitle">
 	<td>标识</td> 
  <td>类型</td> 
    <td>标题</td> 
    <td style="background:red">别名</td>
    <td>操作</td>
 
  </tr> 

<?php
		  foreach($rowlist as $v){
		  	$type = $v['type'];	$pid = $v['pid'];  
          $tid = $v['id'];
		   
			$editlink='<a href="mod_alias.php?lang='.LANG.'&pid='.$pid.'&type='.$type.'&type2=fromlist">修改别名</a>';
$del_text= " | <a href=javascript:delid('del','$tid','$jumpv_list')  class=but2>删除</a>";


if($type=='node') $title = get_field(TABLE_NODE,'title',$pid,'pidname');
elseif($type=='page') $title = get_field(TABLE_MENU,'name',$pid,'pidname');
elseif($type=='cate')  $title = get_field(TABLE_CATE,'name',$pid,'pidname');
 

?>

  <tr>
   		<td><?php echo $pid;?></td> 
      <td><?php echo $type;?></td>
    	<td><?php echo $title;?></td> 
   	 	<td><?php echo $v['name'];?></td>
   		 <td><?php echo $editlink.$del_text;?></td>   
  </tr>
<?php } ?>
  
 </table>
 <?php
	 
 

require_once HERE_ROOT.'plugin/page_2010.php';
 
	}	

else {echo '没有找到相关的别名。';
	echo '<a href="'.$jumpv_list.'">返回别名管理>></a>';
}		


  ?>
 
 

 
  <script>
function formvalidate(){
    var valias = $.trim($('.formtab input[name=alias]').val());
     if(valias=='') {alert('别名不能为空。'); 
          $('.formtab input[name=alias]').focus();
         return false;}


}

 </script>