<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

//echo strlen('lunh1/20100514_1637283869.jpg');--29
?>

<?php
 //if($type=='index')  stylebhcntlink($stylebh);?>


<div class="menu">
<a href="<?php echo $jumpv?>&file=mainaddedit&act=add">添加</a>

<!-- &nbsp;&nbsp;后台模板编号: -->
<?php //、echo $curstyledebug.' -- '.get_field(TABLE_STYLE,'title',$curstyledebug,'pidname')?>


 <?php 
//$jumpvsel = 'mod_region.php?lang='.LANG.'&';
//if($stylebh=='') $stylebh = $curstylebh; //move to mod.php
?>
 
<!-- &nbsp;&nbsp;选择样式编号:
<select name="sellang" onchange="gosele(this,'stylebh','<?php// echo //$jumpvsel;?>')">
  -->
<?php 
//sele_stylebh($arr_stylebh,$stylebh);
?>
<!-- </select> -->
</div>
 


<div class="pro_album_left" style="width:28%">
 
<form method=post action="<?php echo $jumpvpf;?>&act=posmain">
<table class="formtab">
<tr style="background:#B3C0E0">
<td>排序</td> 
<td>标题</td>
<td>预览</td>
</tr>


<?php
 
//foreach($arr_regiontype as $ktype=>$vtype){
  //   echo '<tr>  <td colspan="2" style="background:#539ee9;text-align:center;font-weight:bold">'.$vtype.'</td></tr>';
 echo '<tr>  <td colspan="3" style="background:#539ee9;text-align:center;font-weight:bold">'.$title.'</td></tr>';
 //----------------------------
  //if($type=='index') $stylebhv = " and stylebh = '$stylebh'";
 // else  $stylebhv = ""; // edit 20160908 //all use index region.no disguish theme.make simple,not difficult
 $stylebhv = "";
$sql = "SELECT id,name,pidname,pos,cssname,sta_width_cnt from ".TABLE_REGION." where pid='0' and type='common'  $andlangbh  order by  pos desc,id desc";
  // echo $sql;
if(getnum($sql)>0){
$rowlist = getall($sql);
    foreach($rowlist as $vcat){
       $tidmain=$vcat['id']; //tidmain ,not use tid,for conflict in subedit.php
       $name=$vcat['name']; 
       $pidnamecur=$vcat['pidname'];  $cssname=$vcat['cssname'];  
       $sta_width_cnt=$vcat['sta_width_cnt']; 

    if($pidname==$pidnamecur) $curclass=' style="color:#fff;background:red;padding:3px;" ';
    else $curclass=' ';


 $previewlink = $userurl.'previewofndlist&tov='.$pidnamecur.'='.LANG;

       $namev = '<a '.$curclass.' href="'.$jumpv.'&pidname='.$pidnamecur.'&file=list&act=list"><strong>'.$name.'</strong></a>';
       //$namev = '<a '.$curclass.' href="'.$jumpv.'&pidname='.$pidnamecur.'&file=mainedit&act=edit"><strong>'.$name.'</strong></a>';
  
     ?>
    <tr class="subregion_<?php echo $sta_sub;?>">
    <td align="center"><input type="text" name="<?php echo $tidmain;?>"  value="<?php echo $vcat['pos'];?>" size="5" /></td>
     <td>  <?php   echo $namev.'<br />标识: '.$pidnamecur;
     echo '<br /><span class="cgray">是否全宽: '.$sta_width_cnt.'</span>';
       if($cssname<>'') echo '<br /><span class="cgray">css名称: '.$cssname.'</span>';


     ?>



     </td>

     <td>
 
 <a style="color:#666" href="<?php echo $previewlink;?>" target="_blank">预览<i class="fa fa-link"></i></a> 

     </td>
    </tr>
    <?php 
    } 
    ?>
  

    <?php }
    else echo '<tr><td colspan="3"> 暂无内容，请添加。<td><tr>';



//----------------
//}
//---------------



?>
</table>
  <div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
  </form>

</div><!-- end pro_album_left-->



<div class="pro_album_right" style="width:70%">

<?php
if($pidname<>'') {
echo '<div class="menusub"  style="margin-bottom:10px;">';

  echo "<a class='bg22 fr'  href=javascript:del('delregion','$pidname','$jumpv')><span  class='bg22' >删除组合区块</span></a>";


  echo '<a class="bg22'.$blocklist_cur.'" href="'.$jumpvp.'&file=list"><span  class="bg22">管理列表</span></a>'; 
  echo '<a class="bg22'.$blockedit_cur.'"  href="'.$jumpvp.'&file=mainaddedit&act=edit"><span  class="bg22">修改组合区块</span></a>';
 


echo '</div>';
}
?>




<?php
if($file=='') echo '<p class="pad8 f14b cred">请先在左边选择。 </p>';
else  require_once HERE_ROOT.'mod_region/tpl_regcommon_'.$file.'.php';
 


?> 


</div>
 
<div class="c"></div>

