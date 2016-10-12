<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
trigger id put here,bec avoid repeat,so add bxbanner as prefix
  */
  if($dhtrigger=='')  $dhtrigger = 'bxbanner'.rand(1000,9999); 
?>
<div id="<?php echo $dhtrigger?>" class="bxsliderbg bxarrow1<?php if($cssname<>'') echo ' '.$cssname;?>"> 
<?php 
$sqlall="select * from ".TABLE_NODE." where pid='$pid' and sta_visible='y' $andlangbh  order by pos desc,id desc";
if(getnum($sqlall)>0){
  $result = getall($sqlall);
  // pre($result);
      ?>


<ul>
<?php
 

 
 
 foreach($result as $v){
 $tid = $v['id'];
 $name = $v['title']; 
 $imgsmall = $v['kv'];
  
$imgv = UPLOADPATHIMAGE.$imgsmall;
 
 $linkurl = $v['linkurl'];
 
 
 ?> 



  <li style="background:url(<?php echo $imgv?>) center center no-repeat;background-size:cover">

 <?php if($linkurl<>'') {?>

 <a  <?php if(strpos($linkurl, 'ttp://')>0) echo 'target="_blank"'?> title="<?php echo $name?>" href="<?php echo $linkurl?>"> </a> 
  <?php } ?>

 </li>
 <?php }?>


  
 </ul>

 
<?php }
else echo '暂无内容，请在后台确定内容是否处于隐藏状态。';?> 
 </div>

<?php 
 

if($dhpara=='') $dhparav= '';
else $dhparav= $dhpara;

 ?>


<script>
$(function(){
  // $('.homebanner>ul').bxSlider({
     $('#<?php echo $dhtrigger?>>ul').bxSlider({
  auto: true,
   <?php echo $dhparav?>
   pause:3000,
   autoHover:true,
 controls:true //如果是false，可以把左右箭头取消


 });


});
</script>