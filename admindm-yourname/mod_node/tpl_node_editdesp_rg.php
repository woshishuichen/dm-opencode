  <table class="formtab">
 <tr>
      <td>分类：
<?php 
 $sqlcatlist = "SELECT * from ".TABLE_CATE." where  pid='$catpid' $andlangbh order by pos desc,id";
  //echo $sqlcatlist;
$rowcatlist= getall($sqlcatlist);

    select_cate($rowcatlist,'分类',$pid);//in list left menu php
   ?>
</td></tr>


 <tr>
      <td >
  发布时间：
       
      <input name="dateedit" type="text"  value="<?php echo $dateedit;?>" size="30">
  <span class="cgray">参考：<?php echo $dateall;?></span>
     
        </td>
    </tr>

 
     <tr>   <td>
      页面跳转网址： 
      <input name="alias_jump" type="text"  value="<?php echo $alias_jump?>" size="60">
 
       <?php echo $xz_maybe;?>
      <br /><?php echo $text_outlink;?> 


 <?php if($alias_jump<>'') { echo $text_jump;
      }?>
      

        </td>
    </tr>

  </table>

