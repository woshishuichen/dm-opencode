<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}
//echo 'no use';exit;
?>
 
 <div class="menu">
<a href="<?php echo $jumpv?>&file=addedit&act=add">添加列表区块</a>
<!-- &nbsp;&nbsp;后台模板编号: -->
<?php //、echo $curstyledebug.' -- '.get_field(TABLE_STYLE,'title',$curstyledebug,'pidname')?>


<?php 
//$jumpvsel = 'mod_nodelist.php?lang='.LANG.'&';
//if($stylebh=='') $stylebh = $curstylebh; //move to mod.php
?>
<!-- &nbsp;&nbsp;选择样式编号:
<select name="sellang" onchange="gosele(this,'stylebh','<?php //echo $jumpvsel;?>')">
  -->
  <?php //sele_stylebh($arr_stylebh,$stylebh);?>

<!-- </select> 
&nbsp;&nbsp;<a  class="needpopup" href="mod_effect.php?lang=<?php //echo LANG?>&stylebh=<?php //echo $stylebh?>" target="_blank" style="color:#666">效果模板管理</a>-->




 
</div>

<h2 class="h2tit_biao">效果区块管理  &nbsp;&nbsp;&nbsp; 
  </h2>
<div class="cred ptb10"><?php echo $text_adminhide2;?></div>
<form method=post action="<?php echo $jumpv;?>&act=pos">
<table class="formtab">
<tr style="background:#B3C0E0">
<td width="60" >排序</td>
 <td width="260"  align="center">标题</td>
  <td width="200"  align="center">标识</td>
  <td align="center">预览 </td>
   <td width="300" align="center">分配给模板 <a href="http://www.demososo.com/detail-116.html" target="_blank">查看教程 ></a></td>
  <td width="150"  align="center"> </td>
  <td> </td>
   
 </tr>

<?php
 
// $sqleff = "SELECT * from ".TABLE_BLOCK." where   type='effect_nd' and stylebh='$stylebh' and sta_visible='y'    order by pos desc,id desc";  
 
// $reseff = getall($sqleff);
 
//if(getnum($sqleff)>0) {
  if(3>0) {//pre($arr_blocknd);
  foreach ($arr_blocknd as  $keff => $veff) {

    // $eff_name = $veff['name'];
    // $eff_pidname = $veff['pidname'];
    // $eff_effect = $veff['effect'];

 if(strpos($keff, 'o==')>0){ }
  else{
 //$effectlink = 'mod_effect.php?lang='.LANG.'&type=dh';
 $blockfile = EFFECTROOTADMIN.'block/'.$keff.'.php';
  $blockfilev='';
 if(!is_file($blockfile))  $blockfilev='<span class="cred">'.$keff.'.php 文件不存在</span>';
 

echo '<tr><td colspan="7" class="sidebarsubtitle"><div class="tdtitle dn2"><strong>'.$veff.'</strong> <span class="blockid">('.$keff.'}</span>'.$blockfilev.'</div></td></tr>';

//<a  class="needpopup" href="'.$effectlink.'" target="_blank" style="color:#000">(编辑)</a></div></td></tr>';


$sql = "SELECT id,name,pidname,pos,sta_visible from ".TABLE_BLOCK." where    type='nd'   and effect='$keff'   $andlangbh  order by pos desc,pidname desc,id desc";
  // echo $sql;
$rowlist = getall($sql);
 if($rowlist<>'no')  {
 
foreach($rowlist as $vcat){
   $tidmain=$vcat['id']; //tidmain ,not use tid,for conflict in subedit.php
   $name=$vcat['name']; 
   $pidnamecur=$vcat['pidname'];  
if($pidname==$pidnamecur) $curclass=' style="color:#fff;background:red;padding:3px;" ';
else $curclass=' ';

 $sta_visible=$vcat['sta_visible']; 
 
 
menu_changesta($sta_visible,$jumpv,$tidmain,'sta');

 //  $namev = '<a '.$curclass.' href="'.$jumpv.'&pidname='.$pidnamecur.'&file=sublist&act=list">'.$name.'</a>'.$sta_visiblev;
  $editv = '<a class="but1" href="'.$jumpv.'&pidname='.$pidnamecur.'&file=addedit&act=edit">修改</a>';
 

   //$namev = '<a '.$curclass.' href="'.$jumpv.'&pidname='.$pidnamecur.'&file=mainedit&act=edit"><strong>'.$name.'</strong></a>';
  $previewlink = $userurl.'previewofndlist&tov='.$pidnamecur;

 ?>
<tr  <?php echo $tr_hide;?>>
<td align="center"><input type="text" name="<?php echo $tidmain;?>"  value="<?php echo $vcat['pos'];?>" size="5" /></td>
 <td>  <?php   echo $name;?></td>
  <td>  <?php   echo $pidnamecur;?></td>
    <td align="center">   <a style="color:#666" href="<?php echo $previewlink;?>" target="_blank">预览<i class="fa fa-link"></i></a>  </td>


  <?php 
 $strpos = strpos($nd_design,$pidnamecur); //只有checkbox会有连接字符串          
            //if(in_array($pidname,$value22)){    $checked='checked="checked"';$class='class="cur"';}
              if(is_int($strpos)){ $checked='checked="checked"';$classcc='style="background:#ecefc6"';}
            else{ $checked='';$classcc='';}

            ?>

 <td align="center" <?php echo $classcc;?>>
<input type="checkbox" <?php echo $checked;?> value="<?php echo $pidnamecur;?>" name="pidregion[]" size="80">
  </td>
    <td  align="center">  <?php   echo $editv;?></td>
   <td>  <?php    echo $sta_visible;  ?>    </td>

   
</tr>
<?php 
    } 
 

  }
  else { echo '<tr><td colspan="7" align="center">暂无内容</td></tr>';}

} 

}

}
 
?>

</table>


 
<div style="padding-bottom:22px;text-align:center">
<input class="mysubmitnew" type="submit" name="Submit" value="排序" />
<p><?php echo $sort_ads?></p></div>
</form>

 
<div class="c"></div>
 