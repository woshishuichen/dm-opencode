<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
  if($dhtrigger=='')  $dhtrigger = 'bxbanner'.rand(1000,9999); 
?>
<div id="<?php echo $dhtrigger?>" class="loadingbig <?php if($cssname<>'') echo ' '.$cssname;?>"> 
<?php 
$sqlall="select * from ".TABLE_NODE." where pid='$pid'  and sta_visible='y' $andlangbh  order by pos desc,id desc";
 //echo $sqlall;exit;
if(getnum($sqlall)>0){
  $result = getall($sqlall);
      ?>
<a href="#firstanchor"   title="" class="jumpdownarrow"><span></span>   </a>
<ul class="slides-container ">  
<?php
// pre($result);
 
 foreach($result as $v){
 $tid = $v['id'];
 $name = $v['title']; 
 $imgsmall = $v['kv'];
  
$imgv = UPLOADPATHIMAGE.$imgsmall;
 
 $linkurl = $v['linkurl'];
 
 if($linkurl<>'') {
   $linkfirst = ' <a target="_blank" title="'.$name.'" href="'.$linkurl.'">';
   $linklast = '</a>';
 }
 else{
  $linkfirst = $linklast = '';
 }


echo '<li>'.$linkfirst.'<img     src="'.$imgv.'" alt="'.$name.'" />'.$linklast.'</li>';

 
  }?>

 </ul>
    <nav class="slides-navigation">
      <a href="#" class="next">Next</a>
      <a href="#" class="prev">Previous</a>
    </nav>
  </div>

 
<?php }
else echo '暂无内容，请在后台确定内容是否处于隐藏状态。';
global $cssversion;
?> 
 </div>
 <link href="<?php echo STAPATH;?>app/libs/fullscreen_superslides/superslide.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<script src="<?php echo STAPATH;?>app/libs/fullscreen_superslides/jquery.superslides.min.js?v=<?php echo $cssversion;?>" type="text/javascript"></script>

 <script>
$(function(){
   // var bxcarouselid = '#<?php echo $dhtrigger?>>ul';
 
  $('#<?php echo $dhtrigger?>').superslides({
   // slide_easing: 'easeInOutCubic',
    slide_speed: 800,
    pagination: true,
    hashchange: false,
    scrollabe: true
  });

   //----------------
});
</script>

