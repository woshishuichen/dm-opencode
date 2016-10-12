<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
//'  category sub can set page content.';

 
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
//---------------------
if($act == "insert")
{
    
	 if(strlen(trim($abc1))<2){
        alert(' 不能为空或字太少');
        jump($jumpv);
    }

		$ss = "insert into ".TABLE_MENU." (pid,pidname,stylebh,type,pbh,lang) values ('0','$abc1','$stylebh','cate','$user2510','".LANG."')";	
		 // echo $ss;exit;	
		iquery($ss);		 

		alert('添加成功!');
		jump($jumpv);
	
} 
 

?>

 
<?php 
 
if($act=="add"){
?>
<h2 class="h2tit_biao">添加分类菜单</h2>
<form  method="post"   action="<?php echo $jumpvf;?>&act=insert">
<table class="formtab">
  <tr>
    <td width="12%" class="tr">请选择：</td>
    <td width="88%">

       <select name="menucate">
       	<option value="0">请选择：</option>
          <?php 
          $sql = "SELECT * from ".TABLE_CATE." where pid='0' and modtype='node'  $andlangbh order by pos desc,id";
	       $rowall = getall($sql);
	       foreach($rowall as $v){
              $pidname = $v['pidname'];
           $sql2 = "SELECT * from ".TABLE_MENU." where pidname='$pidname' and stylebh='$stylebh' $andlangbh order by pos desc,id";
	       if(getnum($sql2)==0) echo '<option value="'.$pidname.'">'.decode($v['name']).'</option>';
	       //strip_tags(decode($v['name'])) //no necessary use strip_tags here.
	       }
	        

	?>

       </select>

       (如果没有选项，表明已经添加到菜单里了。)


      </td>
  </tr>

  <tr>
    <td></td>
    <td> <br />
	<br />
 
	<input class="mysubmit" type="submit" name="Submit" value="添加" />
</td>
  </tr>
 </table>
</form>


<?php
}
?>
 
 

