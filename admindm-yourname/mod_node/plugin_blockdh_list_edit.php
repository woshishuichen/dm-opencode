<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

?>

 
<?php 
 
 //mod_blockdh.php?lang=cn&catpid=cate20160707_0437114782&page=0&catid=csub20160707_0904417537


 $catid_v="ppid='$catpid' and pid='$catid'";
   
 $sql_22 = "SELECT * from ".TABLE_NODE." where $catid_v  $andlangbh order by pos desc,id desc"; 
  
 $rowlist_22 = getall($sql_22);
    if($rowlist_22 == 'no')  echo '无内容';
    else {
  ?>

<style>
.menu_list_edit a{color:blue;}
</style>
<table class="formtab  formtabhovertr menu_list_edit" style="width:100%">

    <td width="300" align=center>标题</td>
    <td width="100" class="tc">icon</td>
    <td width="220" class=proname></td>
   

  </tr> 
  <?php
      foreach($rowlist_22 as $v_22){
            $title22 = $v_22['title'];
             $tidhere22 = $v_22['id'];  
              $sta_visi_v = $v_22['sta_visible'];

               $desptext22 = $v_22['desptext'];
               $desp22 = $v_22['desp'];
               $despjj22 = $v_22['despjj'];
      $blockid22 = $v_22['blockid'];       
      $blockcntid22 = $v_22['blockcntid'];
      $linkurl22 = $v_22['linkurl'];
      $iconimg22 = $v_22['iconimg'];

$jumpv='';

             menu_changesta($sta_visi_v,$jumpv,$tidhere22,'sta_menu');

  //mod_blockdh.php?lang=cn&catpid=cate20160707_0437114782&catid=csub20160707_0904417537&page=0&file=edit&tid=148&act=edit
      $linkedit = 'mod_blockdh.php?lang='.LANG.'&catpid='.$catpid.'&catid='.$catid.'&page=0&file=edit&tid='.$tidhere22.'&act=edit';
 $edittext_22='<a href="'.$linkedit.'">编辑</a>';

    ?>
<tr  <?php echo $tr_hide;?>  style="border-top:2px solid #999">
  <td align="left">
  <?php  echo '标题：'.$title22;   

 ?>

<br />
    副标题：<?php echo $despjj22;?><br />
           链接：<?php echo $linkurl22;?><br />
      

        内容格式：<span class="cgray">
        <?php
       // echo $blockcntid22;
       // pre($arr_blockcnt);
         //if(substr($blockcntid22, 0,6)=='bkcnt_' && $blockid22==''){
           //  echo  '模板： <span class="cgray">';
          echo select_return_string($arr_blockcnt,0,'',$blockcntid22);
          //echo  '</span><br />';
        //}
          ?></span>
      <br />
   标识：  <?php echo check_blockid($blockid22);?><br />
 </td>
  <td ><?php  echo  web_despdecode($iconimg22)     ?></td>
   

    <td ><?php  
     if($tid==$tidhere22) echo '正在编辑';
     else echo $edittext_22;      ?></td>
   
  </tr>
 <?php
     
 
    } ?>
</table>


 <?php
     
 
    } ?>