<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

 echo 'no use';exit;
?>

 
<?php 
 
 //mod_blockdh.php?lang=cn&catpid=cate20160707_0437114782&page=0&catid=csub20160707_0904417537

 
 $sql_22 = "SELECT * from ".TABLE_STYLE." where    $noandlangbh and pid='0' and sta_visible='y'   order by pos desc,id desc"; 
  
 $rowlist_22 = getall($sql_22);
    if($rowlist_22 == 'no')  echo '无内容';
    else {
  ?>

<style>
.menu_list_edit a{color:blue;}
</style>
<table class="formtab  formtabhovertr menu_list_edit" style="width:100%">

    <td width="80" align="center">标题</td>
     <td width="220" class="center">标识</td>
     <td width="220" class="center"></td>
   
   
  </tr> 
  <?php
      foreach($rowlist_22 as $v_22){
          
           $tid22=$v_22['id']; $title22=$v_22['title']; 
   $pidnamecur22=$v_22['pidname']; 
    $stylebh=$v_22['stylebh']; 


  //mod_style.php?lang=cn&pidname=style20160506_1242421660&file=edit_boxtitle&act=edit
  $linkedit = 'mod_style.php?lang='.LANG.'&pidname='.$pidnamecur22.'&stylebh='.$stylebh.'&file='.$file.'&act=edit';

 $edittext_22='<a href="'.$linkedit.'">编辑模板</a>';

    ?>
<tr   style="border-top:2px solid #999">

<td align="left">
  <?php  echo '标题：'.$title22;  

   if($curstyle==$pidnamecur22) echo '<span style="color:red">(正在使用)</span>';
 
  ?>
 </td>
   <td   align="center"><?php echo $pidnamecur22;?></td>
    <td ><?php  
     if($pidname==$pidnamecur22) echo '正在编辑';
     else   echo $edittext_22;      ?></td>

 
   
  </tr>
 <?php
     
 
    } ?>
</table>


 <?php
     
 
    } ?>