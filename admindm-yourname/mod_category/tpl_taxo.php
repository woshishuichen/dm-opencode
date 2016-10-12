<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<div class="menu">
<a href="<?php echo $jumpv;?>">管理列表</a>

</div>
 
 
 <h2 class="h2tit_biao">分类管理 (<?php echo $catepidname;?>)
<a href="<?php echo $jumpv;?>&file=addedit&act=add">添加</a>
 </h2>

<?php 
  $sql2 = "SELECT * from ".TABLE_CATE." where  pid= '$catepidname' and modtype='$type'   $andlangbh  order by pos desc,id desc";
   //echo $sql2;
   if(getnum($sql2)>0){
     $rowall = getall($sql2);
  //   pre($rowall);
   
     	?>



<form method=post action="<?php echo $jumpvf;?>&act=pos">
<table class="formtab formtabhovertr">
  <tr><td width="100"  align="center">排序</td>
      <td width="250"  align="center">标题</td>
       <td width="200"  align="center">标识</td>
 <td width="200" align="center">管理</td>
     <td width="200"  align="center"> 操作</td>
     <td width=""  align="center"> 状态</td>   
  </tr>


  <?php
  foreach ($rowall as $key => $v) {
 $tid = $v['id'];
 $name = $v['name']; 
   
  $pidnamehere = $v['pidname'];


           $sqlnode = "SELECT id from ".TABLE_NODE." where  pid='$pidnamehere' and modtype='blockdh' $andlangbh  order by id";
             $nodenum = getnum($sqlnode);

 //  if($v['sta_visible']=='n') $staclass=' style="background:#ddd;"';
 // else $staclass=''; 
  menu_changesta($v['sta_visible'],$jumpvf,$tid,'sta');
  
 //mod_node/mod_blockdh.php?lang=en&catpid=cate20160825_1145264967&page=0&catid=csub20160826_0439083359
  $gllink = '../mod_node/mod_blockdh.php?lang='.LANG.'&catpid='.$catepidname.'&page=0&catid='.$pidnamehere;
$gl_text= '<a class="but3" target="_blank"  href="'.$gllink.'">管理内容</a>'; 
$edit_text= '<a class="but1" href="'.$jumpv.'&file=addedit&act=edit&tid='.$tid.'">修改</a>';

$del_text= " |  <a href=javascript:del('del_blockdh','$pidnamehere','$jumpv')  class='but2'>删除</a>";
if($nodenum>0)  $del_text= ''; 
//$movelink='<a class=but1  href='.$jumpvp.'&file=move&act=edit&tid='.$tid.'>转移</a>';
 	
   ?>
    <tr <?php echo $tr_hide;?>>
      <td>  <input type="text" name="<?php echo $tid;?>"  value="<?php echo $v['pos'];?>" size="3" /></td>  
      <td>  <span style="<?php echo $nameday?>"><?php echo $name;?></span><span class="cred">(<?php echo $nodenum;?>)</span>  </td> 
       <td  align="center"> <?php echo $pidnamehere;?></td>
        <td  align="center"> <?php echo $gl_text ;?></td> 
       <td  align="center"> <?php echo $edit_text.$del_text ;?></td>
       <td  align="center"> <?php echo $sta_visible;?></td>
        
  </tr>
  
 
<?php
    } //end foreach

    ?> 
</table>
 

<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="修改排序" /><?php echo $sort_ads_f;?><br /><br />  </div>
</form>
 

 <?php    	 
    

   }
    else{
      echo '<p>暂无子类，请添加子类</p>';
    }


  

  ?>


<div class="c"></div>
 