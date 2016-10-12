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
   
 $pidname='menu'.$bshou;
	//date("YmdHis").'_'.rand(1000,9999);
 
$ss = "insert into ".TABLE_MENU." (name,linkurl,pid,menu_xiala,pidname,stylebh,type,pbh,lang) values ('$abc1','$abc2','$abc3','$abc4','$pidname','$stylebh','cust','$user2510','".LANG."')"; 
   //echo $ss;exit;  
  iquery($ss);  
    alert('添加成功!');
    jump($jumpv);
    
	
} 
if($act == "update")
{
$ss = "update ".TABLE_MENU." set  name='$abc1',linkurl='$abc2',pid='$abc3',menu_xiala='$abc4' where id='$tid' $andlangbh limit 1";
   //echo $ss;exit;  
  iquery($ss);   
    jump($jumpv);
    
  
} 
 
if($act=='add'){
   $formact = $jumpvf.'&act=insert';
$name=$menu_xiala=$linkurl='';
$pid='';
$subtext='添加';
}

if($act=='edit'){
  $formact = $jumpvf.'&act=update&tid='.$tid;

  $subtext ='修改';
  

    $ss = "select * from ".TABLE_MENU." where id='$tid' $andlangbh limit 1"; 
  $row = getrow($ss);
  $name= $row['name'];
  
  $menu_xiala= $row['menu_xiala'];
  $linkurl= $row['linkurl'];

     $pid=$row['pid'];
}

?>

 
<?php 
 
if($act=="add" or $act=='edit'){
?>
<h2 class="h2tit_biao"><?php echo $subtext;?>其他菜单</h2>
<form  method="post"  onsubmit="javascript:return checkhereadd(this)"  action="<?php echo $formact;?>">
<table class="formtab">
 
   <tr>
    <td width="12%" class="tr">菜单标题：</td>
    <td width="88%">
 
<input name="name" type="text"  value="<?php echo $name;?>" size="100">

      </td>
  </tr>

   <tr>
    <td width="12%" class="tr">链接网址：</td>
    <td width="88%">
 
<input name="linkurl" type="text"  value="<?php echo $linkurl;?>" size="100">
<?php echo $text_outlink;?>
      </td>
  </tr>

 <tr>
    <td width="12%" class="tr">选择父菜单：</td>
    <td width="88%"> 


   <select name="pcla"><option value='0'>主菜单</option>
  <?php
  
      
  $sql = "select * from ".TABLE_MENU." where id<>'$tid' and  pid='0' and stylebh='$stylebh'  and type<>'cate' $andlangbh order by pos desc,id";
  //echo $sql;
  //only show page, if cate menu want have page,then do it by give sub cate a filed.
    $rowall = getall($sql);

     foreach ($rowall as $v){
          $sta_visi = $v['sta_visible'];
      $sta_visi_v = string_stavisi($sta_visi); 
      $pagename = $v['name'];
      $pidname = $v['pidname'];
       $type = $v['type'];
            
     
          // if($vcla['pidname'] == intval($pid)) $selected2=' selected=selected';else $selected2='';
        if($pidname ==$pid) $selected2=' selected=selected';else $selected2='';

       if($type=='page')  $pagename = get_field(TABLE_PAGE,'name',$pidname,'pidname');
      
     
        echo '<option '.$selected2.' value='.$pidname.'>&nbsp;&nbsp;├ '.decode($pagename).$sta_visi_v.'</option>';
      }
       
   
  
  // select_cate_menu($row_menu_degree,$tid,$table);
    ?>
</select>


       </td>
  </tr>



    <tr>
    <td width="12%" class="tr">自定义下拉菜单： <br />(<em>只在主菜单有效</em>)</td>
    <td width="88%">
<textarea  name="menu_xiala" cols="130" rows="8" ><?php echo $menu_xiala ;?></textarea>
      <?php echo $xz_maybe;?>
      </td>
  </tr>



  <tr>
    <td> </td>
    <td>
 <br /> <br />
	<input class="mysubmit" type="submit" name="Submit" value="<?php echo $subtext?>" /> <br />
</td>
  </tr>
 </table>
</form>


<?php
}
?>
 
 
   <script>
function  checkhereadd(thisForm){
    if ($.trim(thisForm.name.value)==""){
    alert("请输入菜单标题");
    thisForm.name.focus();
    return false;
        }

         if ($.trim(thisForm.linkurl.value)==""){
    alert("请链接网址");
    thisForm.linkurl.focus();
    return (false);
        } 


}

</script>
