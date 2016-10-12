<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
  if($dhtrigger=='')  $dhtrigger = 'bxbanner'.rand(1000,9999); 
?>
<div id="<?php echo $dhtrigger?>" class="<?php if($cssname<>'') echo ' '.$cssname;?>"> 
<?php 
$sqlall="select * from ".TABLE_NODE." where pid='$pid'  and sta_visible='y' $andlangbh  order by pos desc,id desc";
 //echo $sqlall;exit;
if(getnum($sqlall)>0){
  $result = getall($sqlall);
      ?>

<div class="eisliderwrap">
        <!---start-image-slider---->
        <div class="image-slider">
           
                <div id="ei-slider" class="ei-slider">
                    <ul class="ei-slider-large">
                    
<?php

//$rowall_lunh  --it is rowall
//pre($rowall_lunh);
 
 
 foreach($result as $v){
 $tid = $v['id'];
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
   $linkfirst = ' <a target="_blank" title="'.$title.'" href="'.$linkurl.'">';
   $linklast = '</a>';
 }
 else{
  $linkfirst = $linklast = '';
 }
 ?>  
            <li>
                            <?php echo $linkfirst;?><img src="<?php echo $imgv;?>" alt="<?php echo $title;?>"/>
                            <?php echo $linklast;?>
                            <div class="ei-title">
                              <?php echo $despv;?>
                            </div>
                        </li>
                        <?php }?>
                    
                       
                       
                    </ul><!-- ei-slider-large -->
                    <ul class="ei-slider-thumbs">
                        <li class="ei-slider-element">Current</li>
                        <?php 
                         foreach($result as $v){
               $tid = $v['id'];
               $title = $v['title'];  $despjj = $v['despjj']; 
               $kvsm = $v['kvsm'];               
               
  if($kvsm<>'') $imgv2 =  get_thumb($kvsm,$title,'nodiv');
  else $imgv2 = DEFAULTIMG;
 
             
               ?>  
            <li>
              <a href="#">
                <span><?php echo $title?></span>
                <p><?php echo $despjj?></p> 
              </a>
              <img src="<?php echo $imgv2?>" alt="<?php echo $title?>" />
            </li>
                      <?php 
                      }?>
                    </ul><!-- ei-slider-thumbs -->
                </div><!-- ei-slider -->
            
    </div>
    <!---End-image-slider---->  
</div>

<?php }
global $cssversion;
?>
<link href="<?php echo STAPATH;?>app/libs/eislideshow/eislideshow.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<script src="<?php echo STAPATH;?>app/libs/eislideshow/jquery.eislideshow.js?v=<?php echo $cssversion;?>" type="text/javascript"></script> 
 
 <script type="text/javascript">
            $(function() {
                $('#ei-slider').eislideshow({
          animation     : 'center', //sides  center
          autoplay      : true,
          slideshow_interval  : 3000,
          titlesFactor    : 0
                });
            });     

   </script>
