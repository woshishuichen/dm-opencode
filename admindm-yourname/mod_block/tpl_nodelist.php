<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}
//echo 'no use';exit;
?>

<h2 class="h2tit_biao">效果区块管理  &nbsp;&nbsp;&nbsp;  
<a href="<?php echo $jumpv?>&file=addedit&act=add">添加列表区块 ></a>
 </h2>

<ul class="diviso_filter">
<li><a href="#" data-filter="*" class="active">所有</a></li>

<?php global $andlangbh;
              foreach($arr_blocknd_type as $k=>$v){
               ?>
              <li><a href="#" data-filter=".<?php echo $k?>"><?php echo $v?></a></li>  
                <?php
              }
 
  ?>
</ul>
 
<div class="nodelistgird gridimghover">

<ul>
<?php
 
$sql = "SELECT id,name,pidname,pos,kv,effect,typeadmin from ".TABLE_BLOCK." where    type='nd'   $andlangbh  order by id desc"; //no pos order 
   // echo $sql;
$rowlist = getall($sql);
 if($rowlist<>'no')  {
 
foreach($rowlist as $vcat){
   $tid=$vcat['id']; //tidmain ,not use tid,for conflict in subedit.php
   $name=$vcat['name']; 
   $pidnamecur=$vcat['pidname'];  
   $effect=$vcat['effect'];$typeadmin=$vcat['typeadmin'];
 
 $kv=$vcat['kv'];
 //$imgsmall2 = p2030_imgyt($kv, 'y', 'n');
$kv = '<img src='.get_img($kv, '', '').' alt="" width="150" height="150" />';


 //  $namev = '<a '.$curclass.' href="'.$jumpv.'&pidname='.$pidnamecur.'&file=sublist&act=list">'.$name.'</a>'.$sta_visiblev;
  $editv = '<a class="but1" target="_blank" href="'.$jumpv.'&pidname='.$pidnamecur.'&file=addedit&act=edit">修改</a>';
 
  $previewlink = $userurl.'previewofndlist&tov='.$pidnamecur.'='.LANG;
 
 ?>

<li class="<?php echo $typeadmin;?> ">
<div class="img">
<?php 
echo '<a href="'.$previewlink.'" title="预览"  target="_blank">';
  echo $kv;
 echo '</a>';
?>
</div>
<h3  style="height:30px;overflow:hidden;padding:3px 0;font-size:12px;"><?php echo $name;?></h3>

<div style="height:20px;color:#999">
<?php //、echo '效果：'.select_return_string($arr_blocknd,0,'',$effect);
echo '效果：'.$effect;
?>
</div>
<?php 
if($superadmin=='y') echo '<div>'.$typeadmin.'</div>';
?>
<div class="cgray" style="padding:5px 0;color:#FF6600">标识： <?php echo $pidnamecur;?></div>



<!--
<div style="height:30px">
 排序号：<input type="text" name="<vhp //echo $tid;?>"  value="<vhp //echo $vcat['pos'];?>" size="5" />
  </div>
-->
<div class="edit"  style="height:30px">
 <?php   echo $editv;   ?>
</div>
 

</li>


<?php 
    }  //end foreach
 
?>
</ul>
<div class="c"></div>
</div>

<?php
  }
  else { echo '<p>暂无内容</p>';
        }

 
?>

 
 
 
<div class="c"></div>
 


 <style>
 /*.isotope-item*/
.isotope-item{z-index:2}
.isotope-hidden.isotope-item{pointer-events:none;z-index:1}
.isotope,.isotope .isotope-item{-webkit-transition-duration:0.8s;-moz-transition-duration:0.8s;-ms-transition-duration:0.8s;-o-transition-duration:0.8s;transition-duration:0.8s}
.isotope{-webkit-transition-property:height,width;-moz-transition-property:height,width;-ms-transition-property:height,width;-o-transition-property:height,width;transition-property:height,width}
.isotope .isotope-item{-webkit-transition-property:-webkit-transform,opacity;-moz-transition-property:-moz-transform,opacity;-ms-transition-property:-ms-transform,opacity;-o-transition-property:-o-transform,opacity;transition-property:transform,opacity}
.isotope.no-transition,.isotope.no-transition .isotope-item,.isotope .isotope-item.no-transition{-webkit-transition-duration:0s;-moz-transition-duration:0s;-ms-transition-duration:0s;-o-transition-duration:0s;transition-duration:0s}
.isotope-item{z-index:2}
.isotope-hidden.isotope-item{pointer-events:none;z-index:1}*/
</style>
<script src="../cssjs/jquery.isotope.min.js" type="text/javascript" ></script>

<script>
$(window).load(function() {
              
  // cache container
var diviso_items = $('.nodelistgird>ul');
// initialize isotope
diviso_items.isotope({
  itemSelector : '.nodelistgird>ul>li',
  layoutMode : 'fitRows'
});

// filter items when filter link is clicked
$('.diviso_filter a').click(function(){
  $('.diviso_filter a').removeClass('active');
  $(this).addClass('active');
  var selector = $(this).attr('data-filter');
  diviso_items.isotope({ filter: selector });
  return false;
});




}); //end window load
</script>