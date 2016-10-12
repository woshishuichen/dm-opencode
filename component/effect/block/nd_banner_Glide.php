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
<div id="Glide" class="glide">

    <div class="glide__arrows">
        <button class="glide__arrow prev" data-glide-dir=">">prev</button>
        <button class="glide__arrow next" data-glide-dir=">">next</button>
    </div>

    <div class="glide__wrapper">
        <div class="glide__track" >

         <?php 

        foreach($result as $v){
 $title = $v['title'];  
 $kv = $v['kv'];   $linkurl = $v['linkurl'];  
 
  if($kv<>'') $imgv =  get_img($kv,$title,'nodiv');
  else $imgv = DEFAULTIMG;
 

   if($linkurl<>'') {
   $linkfirst = ' <a target="_blank" title="'.$title.'" href="'.$linkurl.'">';
   $linklast = '</a>';
 }
 else{
  $linkfirst = $linklast = '';
 }
 ?>  
 
<div class="glide__slide">
 <?php echo $linkfirst;?><img src="<?php echo $imgv;?>" alt="<?php echo $title;?>"/> <?php echo $linklast;?>
 </div>
  <?php } 
  ?>
          <!--   
          <div class="glide__slide">
                <div class="box" style="background-color: #77A7FB;">1</div>
            </div>
            <div class="glide__slide">
                <div class="box" style="background-color: #FBCB43;">2</div>
            </div>
            <div class="glide__slide">
                <div class="box" style="background-color: #34B67A;">3</div>
            </div> -->
        </div>
    </div>

    <div class="glide__bullets"></div>

</div>

<?php  
}
else {echo '暂无内容，请在后台确定内容是否处于隐藏状态。';}
global $cssversion;
?>
<link href="<?php echo STAPATH;?>app/libs/banner_Glide/glide.core.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<link href="<?php echo STAPATH;?>app/libs/banner_Glide/glide.theme.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<script src="<?php echo STAPATH;?>app/libs/banner_Glide/glide.min.js?v=<?php echo $cssversion;?>" type="text/javascript"></script> 
 
<script type="text/javascript">
 
 var carousel = $('#Glide').glide({
        type: 'carousel',
        paddings: '19%',
        startAt: 1,
      });

 </script>
