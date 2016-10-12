<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
  if($dhtrigger=='')  $dhtrigger = 'bxbannerPJ'.rand(1000,9999); 
?>
<div id="<?php echo $dhtrigger;?>" class="bxpingjia  bxcarousel<?php if($cssname<>'') echo ' '.$cssname?>">
 

<?php 
$sqlall="select * from ".TABLE_NODE." where pid='$pid'  and sta_visible='y' $andlangbh  order by pos desc,id desc";
 //echo $sqlall;exit;
if(getnum($sqlall)>0){
  $result = getall($sqlall);
      ?>


<ul>
<?php
// pre($result);
foreach($result as $k=>$v){
  $k++;
 $tid = $v['id'];
 $title = $v['title']; 
 $kv = $v['kv'];
  $kvsm = $v['kvsm'];
  if($kvsm<>'') $imgv =  get_thumb($kvsm,$title,'nodiv');//when grid,first kvsm,then kv,then noimg
  else{ 
     if($kv<>'') $imgv = UPLOADPATHIMAGE.$kv; 
     else $imgv = DEFAULTIMG;
  }
 
 $desp= web_despdecode($v['desp']);
                      $desptext= web_despdecode($v['desptext']);
                      $despv='';
                      if($desptext<>'') $despv = $desptext;
                      else  $despv = $desp; 

//if(!is_int($k/2)) echo '<li>';
?>
<li> 
<div class="img col35 fl"><img src="<?php echo $imgv?>" alt="<?php echo $title?>" /></div>
<div class="desp col60 fr"><?php echo $despv?></div>
 
</li>
<?php 
 
//if(is_int($k/2)) echo '</li>';
 

 }
  ?>


  
 </ul>

 
<?php }
else echo '暂无内容，请在后台确定内容是否处于隐藏状态。';?> 
 </div>

 <?php 
if(strpos($cssname,'xauto')>0) $bxauto= 'true';
else $bxauto= 'false';
 ?>


 <script>
$(function(){
   // var bxcarouselid = '#<?php echo $dhtrigger?>>ul';
   
   $('#<?php echo $dhtrigger?>>ul').bxSlider({ 
 
      auto:<?php echo $bxauto?>,
        pager:true,
       // nextText: '<i class="fa fa-angle-right"></i>',
       // prevText: '<i class="fa fa-angle-left"></i>',
        moveSlides : 2,
        minSlides: 1,
        maxSlides: 2,
        slideWidth: 500,
        slideMargin: 50,
        infiniteLoop: true,
         hideControlOnEnd: true
 });
});
</script>

