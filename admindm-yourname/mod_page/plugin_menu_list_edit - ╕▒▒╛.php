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

    
    if($type_22=="page"){      
               
               
          if($alias_jump_22<>"") 
            {
           
            if(strpos($linkedit,'file=edit_can')>1)  $edittext_22='<a href="'.$linkedit.$tidhere.'">编辑(跳转)</a>';
            else $edittext_22='无编辑(跳转)';
 
          }
          else{    
         
            $edittext_22='<a href="'.$linkedit.$tidhere.'">编辑</a>';

           }
      


    ?>
<tr  <?php echo $tr_hide;?>  style="border-top:2px solid #999">
  <td align="left"><strong><?php echo $name_22.$type;?></strong>
<?php if($menu_xiala22<>'') echo '<br /><span class="cred">(注意： 下拉菜单有内容，<br />子菜单不会在前台显示)</span>';?>

    </td>
    <td ><?php  echo $edittext_22; 
    ?></td>
   
  </tr>
<?php
     }//only edit page

//--------------begin sub------
 $sqlsub = "SELECT * from ".TABLE_PAGE." where pbh='".USERBH."' and pid='$pidname_22'   order by pos desc,id";
    $rowlistsub = getall($sqlsub);
     if($rowlistsub<>'no'){
       // echo '<tr><td colspan=7><table width="100%"><tr><td width=80 style="background:#ccc;text-align:center">子菜单:</td><td>';
         foreach($rowlistsub as $vsub){
             $subtid=$vsub['id'];
       $subpidname=$vsub['pidname'];
       
       $aliassub_jump=$vsub['alias_jump'];
       $sta_visi_vsub=$vsub['sta_visible'];
             $sub_type=$vsub['type']; //sub only is page      
                  
        $sta_noaccesssub = $vsub['sta_noaccess']; 
            //
            $sta_noaccess_vsub = string_staaccess($sta_noaccesssub);
              //menu_changesta($sta_visi_vsub,$php_self,$subtid);
               menu_changesta($sta_visi_vsub,$jumpv,$subtid,'sta_menu'); 
 
       
         $subname='&nbsp;&nbsp;&nbsp;├ '.decode($vsub['name']); 
         
        $pageurl=getlink($subpidname,'page','admin');  
         
         if($aliassub_jump<>""){                    
              if(strpos($linkedit,'file=edit_can')>1)  $edit_despsub='<a href="'.$linkedit.$subtid.'">编辑(跳转)</a>';
            else $edit_despsub='无编辑(跳转)';
 
          }
          else{    
         
            $edit_despsub='<a href="'.$linkedit.$subtid.'">编辑子菜单</a>';

           }

          
      
             ?>
  <tr  <?php echo $tr_hide;?>>
  <td align="left"><?php echo $subname;?></td>
    <td ><?php //echo $subedit; 
     echo '&nbsp;&nbsp;&nbsp;├ '.$edit_despsub;?></td>
 
    
  </tr>
<?php
    }}
//-----end sub----

    } ?>
</table>


 


<?php 
}
 
?>