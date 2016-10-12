<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

?>

 
<?php 
 

	 $sql = "SELECT * from ".TABLE_MENU." where  pid='0' and stylebh = '$stylebh' $andlangbh  order by pos desc,id";
	 //ECHO $sql;
	 $rowlist = getall($sql);
    if($rowlist == 'no')  echo '<p style="padding:55px;background:#eee">没有菜单，请添加。</p>';
    else {
	?>

<h2 class="h2tit_biao">管理列表</h2> 
<form method=post action="<?php echo $jumpv;?>&act=pos">
<table class="formtab" style="width:100%">
  <tr style="font-weight:bold;background:#eeefff">
  <td width="100" align=center>排序号</td>
    <td width="300" align=center>菜单名称</td>
  
    <td width="100" align="center">修改</td>
    <td width="100" align="center">删除</td>
    <td width="200">状态</td>
    <td width="200">标识</td>
      <td width="300">菜单类型</td>

  </tr> 
  <?php
      foreach($rowlist as $v){
            $tid = $v['id'];
            $pidname = $v['pidname'];
            
            $menu_xiala = $v['menu_xiala'];  
			   $alias_jump = $v['alias_jump'];

            $type = $v['type'];$sta_visi_v = $v['sta_visible']; 
			$sta_noaccess = $v['sta_noaccess']; 			
            //
            $sta_noaccess_v = string_staaccess($sta_noaccess);
           // menu_changesta($sta_visi_v,$jumpv,$tid);//trbg and tr_hide is in here
			 menu_changesta($sta_visi_v,$jumpv,$tid,'sta_menu');
			  
			  if($type=="index"){	
			  // 	$name="<span class='cblue'>$name</span>";
     //                  $sta_cmp_v='<span class="cblue">首页</span>';
					// $edit_desp='<a class="but2" target="_blank"  href='.$jumpv_edit.'&file=edit_index&act=edit&tid='.$tid.'>修改首页</a>';
					 
			  }
 else if($type=="cust"){    
  $name = $v['name'];
   $sta_cmp_v= '自定义 <span class="cgray">(链接：'.$v['linkurl'].')</span>';

 if(ifhasrecord(TABLE_MENU,$pidname,'pid','')) $edit_desp='';
   else $edit_desp='<a class="but1"   href='.$jumpv.'&file=cusaddedit&act=edit&tid='.$tid.'>修改</a>';
          

 }

            else if($type=="page"){			 
               
                  $pagearr = get_fieldarr(TABLE_PAGE,$pidname,'pidname');
                  if($pagearr=='no') {$name='单页面不存在';
                  $pageid = '0';
                }
                else {
                  $name = decode($pagearr['name']);
                  $pageid = $pagearr['id'];
                }

 $sta_cmp_v='单页面<a href="../mod_page/mod_page_edit.php?lang='.LANG.'&file=edit_desp&act=edit&tid='.$pageid.'" target="_blank">(编辑)</a>';  

            


           // $edit_desp='<a class="but1"   href='.$jumpv.'&file=edit&act=edit&tid='.$tid.'>修改</a>';
				      if(ifhasrecord(TABLE_MENU,$pidname,'pid','')) $edit_desp='';
              else $edit_desp='<a class="but1"   href='.$jumpv.'&file=pageedit&act=edit&tid='.$tid.'>修改</a>';
          




				 }
            
     else {
            	


			//	$rowcate = getrow_catebypidname($pidname);	
     
        $sqlcate = "SELECT * from ".TABLE_CATE." where  pidname='$pidname' $andlangbh order by id desc limit 1";
       $rowcate= getrow($sqlcate);   

				$name = decode($rowcate['name']);  			 
		   $name="<span class='cyel'>$name</span>";


  $catelink = '<a target="_blank"  href="../mod_category/mod_category.php?lang='.LANG.'&catid='.$pidname.'">分类</a>';
   $sta_cmp_v='<span class="cyel">'.$catelink.'</span>';

        $edit_desp='';

	 
    } 

      $delmenu= " <a class='but2'  href=javascript:del('del','$pidname','$jumpv')>删除</a>";



    ?>
  <tr  <?php echo $tr_hide;?> style="border-top:2px solid #999">
  <td align="center"><input type="text" name="<?php echo $tid;?>"  value="<?php echo $v['pos'];?>" size="5" /></td> 

    <td align="left"><strong><?php echo $name;?></strong>
<?php if($menu_xiala<>'') echo '<br /><span class="cred">(注意： 下拉菜单有内容， 子菜单不会在前台显示)</span>';?>

    </td>
   

    <td align="center"><?php  echo $edit_desp?></td>
    <td align="center"><?php  echo $delmenu;?></td>
    <td> <?php   echo $sta_visible;?></td>   
     <td><?php echo $pidname; ?></td>
     <td><?php echo $sta_cmp_v; ?></td>
  </tr>
<?php
//--------------begin sub------
 $sqlsub = "SELECT * from ".TABLE_MENU." where  pid='$pidname' and stylebh='$stylebh' $andlangbh  order by pos desc,id";
    $rowlistsub = getall($sqlsub);
     if($rowlistsub<>'no'){
       // echo '<tr><td colspan=7><table width="100%"><tr><td width=80 style="background:#ccc;text-align:center">子菜单:</td><td>';
         foreach($rowlistsub as $vsub){
             $subtid=$vsub['id'];
			 $subpidname=$vsub['pidname'];

        

			  
			 $sta_visi_vsub=$vsub['sta_visible'];
             $sub_type=$vsub['type']; //sub only is page	and cust

  if($sub_type=="cust"){    
  $subname = '&nbsp;&nbsp;&nbsp;├ '.$vsub['name'];
  
 $substa_cmp_v='&nbsp;&nbsp;&nbsp;├自定义 <span class="cgray">(链接：'.$vsub['linkurl'].')</span>';

   $edittext_sub='<a class="but1"   href='.$jumpv.'&file=cusaddedit&act=edit&tid='.$subtid.'>修改</a>';

 }
  else
  {

     
             $subpagearr = get_fieldarr(TABLE_PAGE,$subpidname,'pidname');   
             if($subpagearr=='no') {$subname='&nbsp;&nbsp;&nbsp;├单页面不存在';
                  $subpageid = '0';
                }
                else {
                   $subname='&nbsp;&nbsp;&nbsp;├ '.decode($subpagearr['name']); 
                  $subpageid = $subpagearr['id'];
                }

                 

 $substa_cmp_v='&nbsp;&nbsp;&nbsp;├单页面<a href="../mod_page/mod_page_edit.php?lang='.LANG.'&file=edit_desp&act=edit&tid='.$subpageid.'" target="_blank">(编辑)</a>';  

   $edittext_sub='<a class="but1"   href='.$jumpv.'&file=pageedit&act=edit&tid='.$subtid.'>修改</a>';

  }


             		  
	   //menu_changesta($sta_visi_vsub,$php_self,$subtid);
               menu_changesta($sta_visi_vsub,$jumpv,$subtid,'sta_menu'); 
 
			 
			   
			 
			

   $delmenu_sub= " <a class='but2'  href=javascript:del('del','$subpidname','$jumpv')>删除</a>";
         
             ?>
  <tr  <?php echo $tr_hide;?>>
  <td align="center">&nbsp;&nbsp;├ <input type="text" name="<?php echo $subtid;?>"  value="<?php echo $vsub['pos'];?>" size="3" /></td>

    <td align="left"><?php echo $subname;?></td> 
 
  
      <td align="center"><?php     echo $edittext_sub;?></td>
          <td align="center"><?php     echo $delmenu_sub;?></td>
    <td> <?php   echo $sta_visible;?></td>
     <td>&nbsp;&nbsp;├ <?php echo $subpidname; ?></td>
 <td><?php echo $substa_cmp_v; ?></td>
     
     
  </tr>
<?php
    }
  }
//-----end sub----

    } ?>
</table>
<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
</form>
 


<?php 
}