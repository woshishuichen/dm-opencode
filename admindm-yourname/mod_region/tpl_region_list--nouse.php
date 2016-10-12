<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 
 
?> 
<h2 class="h2tit_biao"><?php echo $title?> 
<a href="<?php echo $jumpvp?>&file=add&act=add">添加记录</a>
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
           

            ?>
 <form method=post action="<?php echo $jumpvpf;?>&act=pos">
 <table class="formtab formtabhovertr">    
<tr style="background:#B3C0E0">
<td width="30" align="center">排序号</td>
<td width="250">区块说明</td>
<td width="150" align="center">css名称</td>
<td width="150" align="center">预览</td>
<td width="250" align="center">标识</td> 
<?php if($pidname==$bsindex){?>
<td width="200" align="center">分配给模板</td> 
<?php } ?>
<td width="200">操作</td>
<td>状态</td> 
</tr>
<?php
 $sql = "SELECT * from ".TABLE_REGION." where pid='$pidname'  $andlangbh order by pos desc,id";
 
 $rowlist = getall($sql);
if($rowlist=='no') echo '暂无内容';
else{
foreach($rowlist as $v){
$pidname2=$v['pidname'];
$name=$v['name'];$namebz=$v['namebz'];
$tid=$v['id'];
$blockid=$v['blockid']; 
$cssname=$v['cssname']; 
$wrap=$v['wrap'];
$linkurl=$v['linkurl'];
$effect=$v['effect'];

$sta_visi_v=$v['sta_visible']; 

menu_changesta($sta_visi_v,$jumpvpf,$tid,'sta');
 
 if(substr($blockid,0,3)=='reg')  $sta_sub ='<span class="cred">[调区域]</span>';
 else $sta_sub ='';

 
$editlink='<a class=but1  target="_blank" href='.$jumpvp_edit.'&file=editcan&act=edit&tid='.$tid.'>修改</a> ';
$editlink.='<a class=but1  target="_blank" href='.$jumpvp_edit.'&file=editcfg&act=edit&tid='.$tid.'>样式</a> ';
$editlinkstyle='<a class=but1  target="_blank" href='.$jumpvp_edit.'&file=editstyle&act=edit&tid='.$tid.'>修改样式</a>';
$del_text= " <a href=javascript:del2('delsub','$pidname','$pidname2','$jumpv')  class=but2>删除</a>";
$movelink=' <a class=but1  target="_blank" href='.$jumpvp_edit.'&file=move&act=edit&tid='.$tid.'&stylebh='.$stylebh.'>转移</a>';
 
   $previewlink = $userurl.'previewofndlist&tov='.$pidname2;

$namebz2 ='';
if($namebz<>'') $namebz2 = '<br /><span class="cyel">说明：'.$namebz.'</span>';

echo '<tr '.$tr_hide.'>';
echo '<td align="center"><input type="text" name="'.$tid.'"  value="'.$v['pos'].'" size="5" /></td>';

  echo '<td>'.$sta_sub.$name.'('.$tid.')'.$namebz2.'<br /><span class="cgray">'.$pidname2.'</span><br />';
  if($wrap=='normal') echo '<span class="cgray">普通</span>';
  if($wrap=='clear') echo '<span class="cyel">分隔清行</span>';
if($wrap=='divbegin') echo '<span class="fb cred">div开头</span>';
if($wrap=='divend') echo '<span class="fb cred">div结尾</span>';
  echo '</td>';
echo ' <td><span class="cgray">'.$cssname.'</span></td> ';

?>
<td align="center">   <a style="color:#666" href="<?php echo $previewlink;?>" target="_blank">预览<i class="fa fa-link"></i></a>  </td>

<?php

echo '<td>';
 echo '标识：'.check_blockid($blockid);
echo '<br />链接：<span class="cgray">'.$linkurl.'</span>';
echo '<br />效果：<span class="cgray">'.$effect.'</span>';
echo '</td>';


?>
<?php if($pidname==$bsindex){?>
  <?php 
   $sql22= "SELECT rgindex_design from " . TABLE_STYLE . "  where   pidname='$curstyle'  $andlangbh order by id limit 1";
 $row22 = getrow($sql22);
 $rgindex_design = $row22['rgindex_design'];

 $strpos = strpos($rgindex_design,$pidname2); //只有checkbox会有连接字符串          
            //if(in_array($pidname,$value22)){    $checked='checked="checked"';$class='class="cur"';}
              if(is_int($strpos)){ $checked=' checked="checked" ';$classcc='style="background:#FF6634"';}
            else{ $checked='';$classcc='';}
 

        
             
            ?>

 <td align="center" <?php echo $classcc;?>>
<input type="checkbox" <?php echo $checked;?> value="<?php echo $pidname2;?>" name="pidregion[]" size="80">
  </td>

  <?php
}

if($effect == 'block_titlecenter')   echo '<td>'.$editlink.$editlinkstyle.'<div style="padding-top:5px;">'.$del_text.$movelink.'</div></td>';
else   echo '<td>'.$editlink.$del_text.$movelink.'</td>';
   echo '<td>'.$sta_visible.'</td>';
 echo '</tr>';
}
}
?>
	
	</table>
<div style="padding-bottom:22px;text-align:center">
<input class="mysubmitnew" type="submit" name="Submit" value="提交" />
<p><?php echo $sort_ads?>
</p>
</div>
</form>