<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

?>

 
<?php 
 

	 $sql = "SELECT * from ".TABLE_PAGE." where  pid='0'  $andlangbh  order by pos desc,id";
	 //ECHO $sql;
	 $rowlist = getall($sql);
    if($rowlist == 'no')  echo '<p style="padding:55px;background:#eee">没有菜单，请添加。</p>';
    else {
	?>

<h2 class="h2tit_biao">管理列表</h2> 
<form method=post action="<?php echo $jumpv;?>&act=pos">
<table class="formtab formtabhovertr" style="width:100%">
  <tr style="font-weight:bold;background:#eeefff">
  <td width="100" align=center>排序号</td>
    <td width="300" align=center>菜单名称</td>
     <td width="200">菜单类型</td>
    <td width="200" class=proname></td>
   
    <td width="200">状态</td>
    <td width="">文件名</td>

  </tr> 
  <?php
      foreach($rowlist as $v){
            $tid = $v['id'];
            $pidname = $v['pidname'];
            $name = decode($v['name']);
            
			   $arr_can = $v['arr_can'];
          
            $sta_visi_v = $v['sta_visible']; 


//------------
            $bscntarr = explode('==#==',$arr_can); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
    
    //-----------------

 			 			
            //
        $sta_noaccess_v = string_staaccess($sta_noaccess);
           // menu_changesta($sta_visi_v,$jumpv,$tid);//trbg and tr_hide is in here
			 menu_changesta($sta_visi_v,$jumpv,$tid,'sta_menu');
			  
			 
  
               
   $pageurl=getlink($pidname,'page','admin');

				 
   $edit_desp='<a class="but1"   href='.$jumpv_edit.'&file=edit_desp&act=edit&tid='.$tid.'>修改</a>';
			 
            
          
               


    ?>
  <tr  <?php echo $tr_hide;?> style="border-top:2px solid #999">
  <td align="center"><input type="text" name="<?php echo $tid;?>"  value="<?php echo $v['pos'];?>" size="5" /></td> 

    <td align="left"><strong><?php echo $name;?></strong>
 
    </td>
   
    <td> </td>
    <td align="center"><?php  echo $edit_desp;?></td>
    <td> <?php   echo $sta_visible.$sta_noaccess_v;?></td>
    <td><?php echo "$pageurl"; ?></td>
  </tr>
<?php 
}
?>

</table>
<div style="padding-bottom:22px"><input class="mysubmitnew" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
</form>
 


<?php 
}
?>
<p class="cred ptb10"><?php echo $text_adminhide2;?></p>
