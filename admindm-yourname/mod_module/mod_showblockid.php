<?php
/*  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
 if($act <> "pos") zb_insert($_POST);
 
 //if($pidname<>'') {ifhaspidname(TABLE_STYLE,$pidname);}
 ifhaspidname(TABLE_STYLE,$pidname); //here,must have pidname;
 
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

$title='查看标识';
$stylebh = $pidname;
 
//-----------

require_once HERE_ROOT.'mod_common/tpl_header_img.php'; 

?>


  <table class="formtab">
   <tr>
    <td  colspan="2" style="background:#4d91d5;text-align:center;color:#fff;font-size:18px">
组合区块
        
  </td>   
  </tr>




<?php
 

 
$sql = "SELECT name,pidname from ".TABLE_REGION." where pid='0' and type='common'  $andlangbh  order by  pos desc,id desc";
   //echo $sql.'<br/>';
if(getnum($sql)>0){
$rowlist = getall($sql);
    foreach($rowlist as $vcat){
       
       $name=$vcat['name']; 
       $pidname=$vcat['pidname'];  
 
     ?>
    <tr>
    <td width="50%" align="right"><?php echo $name?> </td>
     <td align="left">  <?php echo $pidname?>  </td>
    </tr>
    <?php 
    } 
    ?>
  

    <?php }
    else echo '<tr><td></td><td>暂无内容，请添加。<td><tr>';

 

?> 

 


  <tr>
    <td  colspan="2" style="background:#4d91d5;color:#fff;text-align:center;color:#fff;font-size:18px"> 
        效果区块
       
  </td>   
  </tr>
<tr>
    <td    colspan="2" style="text-align:center;"> 
      
 <a href="../mod_block/mod_nodelist.php?lang=<?php echo LANG;?>" target="_blank">点击查看></a> 
  </td>
   
  </tr>






  <tr>
    <td  colspan="2" style="background:#4d91d5;color:#fff;text-align:center;color:#fff;font-size:18px"> 
         图文区块 
  </td>   
  </tr>


  <?php 
  $sql = "SELECT name,pidname from ".TABLE_BLOCK."  where type='vblock' $andlangbh order by pos desc,id desc";
  //echo $sql.'<br/>';
if(getnum($sql)>0){
$rowvblock = getall($sql);
foreach ($rowvblock as $value) {
?>
  <tr>
    <td align="right"> 
        <?php echo $value['name']?>
  </td>
   <td> 
         <?php echo $value['pidname']?>
  </td>
   
  </tr>


 <?php
}
}

  ?>






 
    </table>
 


 <?php
require_once HERE_ROOT.'mod_common/tpl_footer.php';

?>