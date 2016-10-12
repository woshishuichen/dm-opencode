   <?php 
    $sqlall="select * from ".TABLE_NODE." where pid='$pid'  and sta_visible='y'  $andlangbh  order by pos desc,id desc";
  //  echo $sqlall;
    if(getnum($sqlall)>0){
        $result = getall($sqlall);
 
 
if($dhtrigger=='')  $dhtrigger = 'bxchoose'.rand(1000,9999); 
?>
<div id="<?php echo $dhtrigger;?>" class="whychooseus bxarrow1<?php if($cssname<>'') echo ' '.$cssname?>">
 <ul>
 
 <?php 
   
     foreach($result as $v){
       $tid = $v['id'];
       $title = $v['title']; 
       $kv = $v['kv'];
  $kvsm = $v['kvsm'];
  if($kvsm<>'') $imgv =  get_thumb($kvsm,$title,'nodiv');//when grid,first kvsm,then kv,then noimg
  else{ 
     if($kv<>'') $imgv = UPLOADPATHIMAGE.$kv; 
     else $imgv = DEFAULTIMG;
  }


       $linkurl = $v['linkurl'];  
     
      if($linkurl<>''){
      $linkfirst ='<a target="_blank" title="'.$title.'" href="'.$linkurl.'">';
      $linklast ='</a>';}
      else {
      $linkfirst ='';
      $linklast ='';
      }

      $desp= web_despdecode($v['desp']);
      $desptext= web_despdecode($v['desptext']);
      $despv='';
      if($desptext<>'') $despv = $desptext;
      else  $despv = $desp;



      ?>
<li>
<div class="whyimg">
<?php echo $linkfirst?>
<img src="<?php echo $imgv?>" alt="<?php echo $title?>">
<?php echo $linklast?>
</div>

<div class="whycnt">
        <div class="hd">
         <h3><?php echo $title?></h3>
        </div>
        <div class="bd">
              <?php echo $despv?>
              </div>
    </div>


</li>

   <?php 
 }
     ?>

      </ul>
     </div>
      <?php 
 }
     ?>

   <?php 
if(strpos($cssname,'xauto')>0) $bxauto= 'true';
else $bxauto= 'false';
 ?>


<script>
$(function(){
  $('#<?php echo $dhtrigger?>>ul').bxSlider({ 
 auto:<?php echo $bxauto?>,
 controls:true //如果是false，可以把左右箭头取消

 });


});
</script>