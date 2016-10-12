<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

?>

 
<?php 
 
  $ss_22 = "select menu from ".TABLE_LANG." where $noandlangbh2 limit 1";
  $row_22 = getrow($ss_22);
  if($row_22['menu']<>'') echo '<p class="box_hint">提示：你使用了自定义菜单。下面的菜单将不会在前台显示。</p>';
 
   $sql_22 = "SELECT * from ".TABLE_PAGE." where  pid='0' $andlangbh  order by pos desc,id";
   //ECHO $sql;
   $rowlist_22 = getall($sql_22);
    if($rowlist_22 == 'no')  echo '<p style="padding:55px;background:#eee">没有菜单，请添加。</p>';
    else {
  ?>

<style>
.menu_list_edit a{color:blue;}
</style>
<table class="formtab  formtabhovertr menu_list_edit" style="width:100%">

    <td width="300" align=center>菜单名称</td>
    <td width="220" class=proname></td>
   

  </tr> 
  <?php
      foreach($rowlist_22 as $v_22){
            $tidhere = $v_22['id'];
             $pidname_22 = $v_22['pidname'];
            $name_22 = decode($v_22['name']);
            $menu_xiala22 = $v_22['menu_xiala'];  
         $alias_jump_22 = $v_22['alias_jump'];
            $type_22 = $v_22['type']; 


            $sta_visi_v = $v_22['sta_visible']; 
             $sta_noaccess22 = $v_22['sta_noaccess'];       
            //
            $sta_noaccess_v = string_staaccess($sta_noaccess22);
           // menu_changesta($sta_visi_v,$jumpv,$tid);//trbg and tr_hide is in here
       menu_changesta($sta_visi_v,$jumpv,$tid,'sta_menu');

  
   $linkedit = 'mod_page_edit.php?lang='.LANG.'&file='.$file.'&act=edit&tid=';

//echo $linkedit;

 $edittext_22='<a href="'.$linkedit.$tidhere.'">编辑</a>';

    ?>
<tr  <?php echo $tr_hide;?>  style="border-top:2px solid #999">
  <td align="left"><strong><?php echo $name_22.$type;?></strong>
<?php 

if($menu_xiala22<>'') echo '<br /><span class="cred">(注意： 下拉菜单有内容，<br />子菜单不会在前台显示)</span>';?>

    </td>
    <td >
    <?php  
  if($tidhere==$tid) echo '正在编辑';
   else  echo $edittext_22; 
    ?></td>
   
  </tr>
<?php
    } ?>
</table>

 

<?php 
}
 
?>