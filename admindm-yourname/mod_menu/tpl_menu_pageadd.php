<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
//---------------------
if($act == "insert")
{
   
	//$pidname='page'.$bshou;
	//date("YmdHis").'_'.rand(1000,9999);
 
$ss = "insert into ".TABLE_MENU." (pid,pidname,stylebh,type,pbh,lang) values ('$abc2','$abc1','$stylebh','page','$user2510','".LANG."')"; 
  //echo $ss;exit;  
    iquery($ss); 
		alert('添加成功!');
		jump($jumpv);
	
} 
 

?>

 
<?php 
 
if($act=="add"){
?>
<h2 class="h2tit_biao">添加单页</h2>
<form  method="post"  onsubmit="javascript:return checkhereadd(this)"  action="<?php echo $jumpvf;?>&act=insert">
<table class="formtab">
 
   <tr>
    <td width="12%" class="tr">选择单页面：</td>
    <td width="88%">

       <select name="page">
        <option value="">请选择：</option>
          <?php 
          $sql = "SELECT * from ".TABLE_PAGE." where pid='0'  and sta_visible='y'  $andlangbh order by pos desc,id";
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
    <td width="12%" class="tr">选择父菜单：</td>
    <td width="88%">  <select name="menucate">
       	 <option value="0">主菜单</option>
          <?php 
          $sql = "SELECT * from ".TABLE_MENU." where pid='0' and type<>'cate' and stylebh='$stylebh' $andlangbh order by pos desc,id";
	       $rowall = getall($sql);
	       foreach($rowall as $v){

                $sta_visi = $v['sta_visible'];
              $sta_visi_v = string_stavisi($sta_visi); 
              $pagename = $v['name'];
              $pidname = $v['pidname'];
              $type = $v['type'];
             
                  // if($vcla['pidname'] == intval($pid)) $selected2=' selected=selected';else $selected2='';
                if($pidname ==$pid) $selected2=' selected=selected';else $selected2='';

             if($type=='page')  $pagename = get_field(TABLE_PAGE,'name',$pidname,'pidname');
               
	       	  
	         echo '<option  value='.$pidname.'>&nbsp;&nbsp;├ '.decode($pagename).$sta_visi_v.'</option>';
      }        

	?>

       </select>

       </td>
  </tr>


  <tr>
    <td> </td>
    <td>
 <br /> <br />
	<input class="mysubmit" type="submit" name="Submit" value="添加" /> <br />
</td>
  </tr>
 </table>
</form>


<?php
}
?>
 
 
   <script>
function  checkhereadd(thisForm){
    if (thisForm.page.value==""){
    alert("请选择单页面");
    thisForm.page.focus();
    return (false);
        } 
}

</script>
