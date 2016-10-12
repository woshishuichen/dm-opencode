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
<a href="<?php echo $jumpv?>&file=mainaddedit&act=add">添加区域</a>

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
 


<div class=" ">
 
<form method=post action="<?php echo $jumpv;?>&act=posmain">
<table class="formtab formtabhovertr">
<tr style="background:#B3C0E0">
<td>排序</td>
 <td>标题</td>
  <td>标识</td>
  <td>pidstyle</td>
<td>管理</td>
<td>操作</td>
 </tr>


<?php
 
//foreach($arr_regiontype as $ktype=>$vtype){
  //   echo '<tr>  <td colspan="2" style="background:#539ee9;text-align:center;font-weight:bold">'.$vtype.'</td></tr>';
 
 //----------------------------
if($superadmin=='y') $pidnotlike ='';
else  $pidnotlike =" and pidstyle not like '%style%'";

$sql = "SELECT id,name,pidname,pidstyle,pos from ".TABLE_REGION." where pid='0' and type='index' $pidnotlike  $andlangbh  order by pos desc,id desc";
  // echo $sql;
if(getnum($sql)>0){
$rowlist = getall($sql);
    foreach($rowlist as $vcat){
       $tidmain=$vcat['id']; //tidmain ,not use tid,for conflict in subedit.php
      $name=$vcat['name'];
       $pidnamecur=$vcat['pidname']; $pidstyle=$vcat['pidstyle']; 
    if($pidname==$pidnamecur) $curclass=' style="color:#fff;background:red;padding:3px;" ';
    else $curclass=' ';

 $pidstylev = substr($pidstyle,0,5);
 
//if($pidstylev=='style') $name = '<span class="cyel">'.get_field(TABLE_STYLE,'title',$pidstyle,'pidname').'</span>';
 //when edit mb, also edit region name.so not use above code
if($pidstylev=='style') $name = '<span class="cyel">'.$name.'</span>';

 
// $namev = '<a '.$curclass.' href="'.$jumpv.'&pidname='.$pidnamecur.'&file=list&act=list"><strong>'.$name.'</strong></a>';
       //$namev = '<a '.$curclass.' href="'.$jumpv.'&pidname='.$pidnamecur.'&file=mainedit&act=edit"><strong>'.$name.'</strong></a>';
  




$edit =  '<a class="but2"  href="'.$jumpv.'&pidname='.$pidnamecur.'&file=mainaddedit&act=edit"><span  class="bg22">修改区域</span></a> | ';
  $del ="<a class='but1'  href=javascript:del('delregion','$pidnamecur','$jumpv')><span  class='bg22' >删除区域</span></a>";


$gl =  '<a  class="but3" target="_blank"  href="'.$jumpv.'&pid='.$pidnamecur.'&file=sub"><span  class="bg22">区域管理</span></a>'; 




     ?>
    <tr>
    <td align="center"><input type="text" name="<?php echo $tidmain;?>"  value="<?php echo $vcat['pos'];?>" size="5" /></td>
     <td>  <?php  // echo $sta_subv.$namev.'<br />标识: '.$pidnamecur;

     ?>
<h1><?php echo $name;?></h1>
 
     </td>
<td>
<?php echo $pidnamecur;
if($pidstyle==$curstyle) echo '<br><span class="cred">(正在使用)</span>';
?>


</td>

<td> <?php echo $pidstyle;?></td>
<td> <?php echo $gl;?></td>
 <td>
 <?php
if($pidstylev<>'style') echo $edit.$del;?>
   
 </td>


    </tr>
    <?php 
    } 
    ?>
  

    <?php }
    else echo '<tr><td></td><td>暂无内容，请添加。<td><tr>';



//----------------
//}
//---------------



?>
</table>
  <div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
  </form>

</div><!-- end pro_album_left-->



 
 
<div class="c"></div>

