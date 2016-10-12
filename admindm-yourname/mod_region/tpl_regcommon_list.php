<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 
 
?> 
<div class="menu">
<a href="<?php echo $jumpvp?>&file=subaddedit&act=add">添加记录</a>
</div>
<h2 class="h2tit_biao"><?php echo $title?> 

</h2>
 
 <?php 
//  $regsta_sub = get_field(TABLE_REGION,'sta_sub',$pidname,'pidname');
 
//  $readonly =  $readonlypos = $readonlytitle = '';
//  $submitv = '提交';

//  if($regsta_sub=='n'){
//      if($pidname<>$bsindex) {
//             $readonly =' disabled="disabled" ';
//             $readonlypos =' disabled="disabled" ';
//            $readonlytitle = '<br ><strong class="cred">非当前模板，不可分配 </span>';
//            $submitv = '非当前模板，不可操作';

//     }
// }
// else{
//   $readonlytitle = '<br ><strong class="cred">这是子区域，不可分配 </span>';
//    $readonly =' disabled="disabled" ';

// }
           
 $sql = "SELECT * from ".TABLE_REGION." where pid='$pidname'  $andlangbh order by pos desc,id";
 
 $rowlist = getall($sql);
if($rowlist=='no') echo '暂无内容';
else{

            ?>
 <form method=post action="<?php echo $jumpvpf;?>&act=pos">
 <table class="formtab formtabhovertr">    
<tr style="background:#B3C0E0">
<td width="30" align="center">排序号</td>
<td width="250">标题</td>
<td width="150" align="center">css名称</td>
 
<td width="250" align="center">调用的标识</td> 
 
<td width="200">操作</td>
<td>状态</td> 
</tr>
<?php

foreach($rowlist as $v){
$pidname2=$v['pidname'];
$name=$v['name'];$namebz=$v['namebz'];
$tid=$v['id'];
$blockid=$v['blockid']; 
$cssname=$v['cssname']; 
 ;
$effect=$v['effect'];

$sta_visi_v=$v['sta_visible']; 

menu_changesta($sta_visi_v,$jumpvpf,$tid,'sta');
 
 if(substr($blockid,0,3)=='reg')  $sta_sub ='<span class="cred">[调区域]</span>';
 else $sta_sub ='';

 
$editlink='<a class=but1   href='.$jumpv.'&pidname='.$pidname.'&file=subaddedit&act=edit&tid='.$tid.'>修改</a> ';
//$editlinkstyle='<a class=but1    href='.$jumpvp_edit.'&file=editstyle&act=edit&tid='.$tid.'>修改样式</a>';
$del_text= " <a href=javascript:del2('delsub','$pidname','$pidname2','$jumpv')  class=but2>删除</a>";
//$movelink=' <a class=but1  target="_blank" href='.$jumpvp_edit.'&file=move&act=edit&tid='.$tid.'&stylebh='.$stylebh.'>转移</a>';
 
   $previewlink = $userurl.'previewofndlist&tov='.$pidname2;

$namebz2 ='';
if($namebz<>'') $namebz2 = '<br /><span class="cyel">说明：'.$namebz.'</span>';
?>

<tr <?php echo $tr_hide;?>>
 <td align="center"><input type="text" name="<?php echo $tid;?>"  value="<?php echo $v['pos'];?>" size="5" /></td> 


<td>
<h1><?php echo $name;?></h1>
<span class="db cgray"><?php echo $pidname2;?></span>
是否显示标题：<?php echo $v['sta_name'];?> 
</td> 

<td>
 <?php echo $cssname;?> 
 
</td> 

<td>
 <?php echo check_blockid($blockid);?> 
 
</td> 


<td><?php echo $editlink.$del_text;?></td> 
<td><?php echo $sta_visible;?></td>

 </tr> 
 <?php
}
 ?>
	
	</table>
<div style="padding-bottom:22px;text-align:left">
<input class="mysubmit" type="submit" name="Submit" value="排序" />
<p><?php echo $sort_ads?>
</p>
</div>
</form>
<?php }
?>