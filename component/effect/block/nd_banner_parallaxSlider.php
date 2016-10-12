  <?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/

$sqlall="select * from ".TABLE_NODE." where pid='$pid'  and sta_visible='y' $andlangbh  order by pos desc,id desc";
 //echo $sqlall;exit;
if(getnum($sqlall)>0){
  $result = getall($sqlall);

if($dhtrigger=='')  $dhtrigger = 'bxbanner'.rand(1000,9999); 
?>
<div id="<?php echo $dhtrigger?>" class="pxs_container <?php if($cssname<>'') echo ' '.$cssname;?>">
 
      <div class="pxs_bg">
        <div class="pxs_bg1"></div>
        <div class="pxs_bg2"></div>
        <div class="pxs_bg3"></div>
      </div>
      <div class="pxs_loading">Loading images...</div>
      <div class="pxs_slider_wrapper">
        <ul class="pxs_slider">
        <?php 

        foreach($result as $v){
 $title = $v['title'];  
 $imgsmall = $v['kv'];  
$imgv = UPLOADPATHIMAGE.$imgsmall;
 
 $linkurl = $v['linkurl'];

  // $desp= web_despdecode($v['desp']);
  //     $desptext= web_despdecode($v['desptext']);
  //     $despv='';
  //     if($desptext<>'') $despv = $desptext;
  //     else  $despv = $desp;

 if($linkurl<>'') {
   $linkfirst = ' <a target="_blank" title="'.$title.'" href="'.$linkurl.'">';
   $linklast = '</a>';
 }
 else{
  $linkfirst = $linklast = '';
 }
 ?>  
 
<li>
 <?php echo $linkfirst;?>
 <img src="<?php echo $imgv;?>" alt="<?php echo $title;?>"/>
 <?php echo $linklast;?>
 </li>
  <?php } 
  ?>
 
        </ul>
        <div class="pxs_navigation">
          <span class="pxs_next"></span>
          <span class="pxs_prev"></span>
        </div>
        <ul class="pxs_thumbnails">
           <?php 

        foreach($result as $v){
 $title = $v['title'];  
 $kvsm = $v['kvsm'];  
 
  if($kvsm<>'') $imgv2 =  get_thumb($kvsm,$title,'nodiv');
  else $imgv2 = DEFAULTIMG;
 

?> 
 
<li>
 <img src="<?php echo $imgv2;?>" alt="<?php echo $title;?>"/>
 </li>
  <?php } 
  ?>
         
        </ul>
      </div>
    </div>

<?php  
}
else {echo '暂无内容，请在后台确定内容是否处于隐藏状态。';}
global $cssversion;
?>
<link href="<?php echo STAPATH;?>app/libs/parallaxSlider/parallaxSlider.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<script src="<?php echo STAPATH;?>app/libs/parallaxSlider/parallaxSlider.js?v=<?php echo $cssversion;?>" type="text/javascript"></script> 
 
<script type="text/javascript">
      $(function() {
        var $pxs_container  = $('.pxs_container');
        $pxs_container.parallaxSlider();
      });
 </script>