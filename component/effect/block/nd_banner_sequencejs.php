  <?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/

$sqlall="select * from ".TABLE_NODE." where pid='$pid'  and sta_visible='y' $andlangbh  order by pos desc,id desc";
 //echo $sqlall;exit;
if(getnum($sqlall)>0){
  $result = getall($sqlall);

//if($dhtrigger=='')  $dhtrigger = 'bxbanner'.rand(1000,9999); 
?>
<div class="sequence-theme <?php if($cssname<>'') echo ' '.$cssname;?>">
      <div id="sequence">
        <img class="sequence-prev" src="<?php echo STAPATH;?>app/libs/banner_sequencejs/bt-prev.png" alt="" />
        <img class="sequence-next" src="<?php echo STAPATH;?>app/libs/banner_sequencejs/bt-next.png" alt="" />

        <ul class="sequence-canvas">
         

              <?php 

        foreach($result as $k=>$v){
 $title = $v['title'];  
 $imgsmall = $v['kv'];  
$imgv = UPLOADPATHIMAGE.$imgsmall;
 
 $linkurl = $v['linkurl'];

  $desp= web_despdecode($v['desp']);
      $desptext= web_despdecode($v['desptext']);
      $despv='';
      if($desptext<>'') $despv = $desptext;
      else  $despv = $desp;

 if($linkurl<>'') {
   $linkfirst = ' <a target="_blank" class="model" title="'.$title.'" href="'.$linkurl.'">';
   $linklast = '</a>';
 }
 else{
  $linkfirst = $linklast = '';
 }
 ?>  
 
<li >
<?php echo $despv;?>

 <?php echo $linkfirst;?><img  class="model"  src="<?php echo $imgv;?>" alt="<?php echo $title;?>"/><?php echo $linklast;?>
  <?php //echo $linkfirst;  no link the effect,bec affect the back arrow effect?>
 
 </li>
  <?php } 
  ?>

 
        </ul>

        <ul class="sequence-pagination">
      
       <?php 

        foreach($result as $k=>$v){
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
<link href="<?php echo STAPATH;?>app/libs/banner_sequencejs/banner_sequencejs.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<script src="<?php echo STAPATH;?>app/libs/banner_sequencejs/banner_sequencejs.js?v=<?php echo $cssversion;?>" type="text/javascript"></script> 
 
<script type="text/javascript">
      $(document).ready(function(){
    var options = {
        nextButton: true,
        prevButton: true,
        pagination: true,
        animateStartingFrameIn: true,
        autoPlay: true,
        autoPlayDelay: 3000,
        preloader: true,
        preloadTheseFrames: [1],
        // preloadTheseImages: [
        //     "images/tn-model1.png",
        //     "images/tn-model2.png",
        //     "images/tn-model3.png"
        // ]
    };
    
    // var mySequence = $("#sequence").sequence(options).data("sequence");
    var mySequence = $("#sequence").sequence(options);
});
 </script>
