<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if($dhtrigger=='')  $dhtrigger = 'bxbanner'.rand(1000,9999); 
?>
<div id="<?php echo $dhtrigger?>" class="bxslidercontent bxarrow1<?php if($cssname<>'') echo ' '.$cssname;?>"> 
<?php 
$sqlall="select * from ".TABLE_NODE." where pid='$pid' and sta_visible='y' $andlangbh  order by pos desc,id desc";
if(getnum($sqlall)>0){
  $result = getall($sqlall);
 
      ?>


<ul>
<?php

//$rowall_lunh  --it is rowall
//pre($rowall_lunh);
 
 
 foreach($result as $v){
 $tid = $v['id'];
 $title = $v['title']; 
 $kv = $v['kv'];
 // $kvsm = $v['kvsm'];
    //  if($kvsm<>'') $imgv =  get_thumb($kvsm,$title,'nodiv');//when grid,first kvsm,then kv,then noimg
    //  else{ 
     //    if($kv<>'') $imgv = UPLOADPATHIMAGE.$kv; 
     //    else $imgv = DEFAULTIMG;
   //   }
//
  if($kv<>'') $imgv = UPLOADPATHIMAGE.$kv; 
         else $imgv = DEFAULTIMG;
 
 $linkurl = $v['linkurl'];
 
$despjj= $v['despjj'];
if($despjj=='') {
    $desp= web_despdecode($v['desp']);
      $desptext= web_despdecode($v['desptext']);
      $despv='';
      if($desptext<>'') $despv = $desptext;
      else  $despv = $desp;
    }
    else    $despv = $despjj;

  //$despv = mb_substr(strip_tags($despv),0,110,'UTF-8').'......';
 


 if($linkurl<>'') {
   $linkfirst = ' <a target="_blank" title="'.$title.'" href="'.$linkurl.'">';
   $linklast = '</a>';
 }
 else{
  $linkfirst = $linklast = '';
 }

if(strpos('cc'.$cssname,'noimg100')>0) $noimg100= '';
else $noimg100= ' style="width:100%;height:auto"';

echo '<li class="img">'.$linkfirst.'<img src="'.$imgv.'" alt="'.$title.'" '.$noimg100.' />'.$linklast;
if(strpos('cc'.$cssname,'showtitle')){
echo '<div class="text"><h3>'.$title.'</h3><p>'.$despv.'</p></div>';
}
echo '</li>';

 }?>


  
 </ul>

 
<?php }
else echo '暂无内容，请在后台确定内容是否处于隐藏状态。';?> 
 </div>

<?php 
if(strpos('cc'.$cssname,'noauto')>0) $bxauto= 'false';
else $bxauto= 'true';

if($dhpara=='') $dhparav= 'pager:true,moveSlides : 1,minSlides: 1, maxSlides: 1,';
else $dhparav= $dhpara;

 ?>


<script>
$(function(){
    $('#<?php echo $dhtrigger?>>ul').bxSlider({ 
      // auto:false, //when tab ,must false
      auto:<?php echo $bxauto?>, 
        <?php echo $dhparav?>      
       // nextText: '<i class="fa fa-angle-right"></i>',
       // prevText: '<i class="fa fa-angle-left"></i>',
       // moveSlides : 1,
       // minSlides: 1,
      //  maxSlides: 1,
       // slideWidth: 200,
       // slideMargin: 20,
        pause:3000,
   autoHover:true,
        infiniteLoop: true,
         hideControlOnEnd: true

 });


});
</script>