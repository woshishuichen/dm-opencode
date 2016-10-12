
 <?php 
  $pidshort = substr($pid,0,4);  
      if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
      else  $sqlv=" pid='$pid' ";
if($pidshort=='csub')  echo '<h5>出错，此效果只限于主分类，不能用子分类。</h5>';


   $sqlall="select * from ".TABLE_NODE." where sta_visible='y'  and ppid='$pid'  $andlangbh  order by pos desc,id desc limit $maxline";

  //  echo $sqlall;
    if(getnum($sqlall)>0){
        $result = getall($sqlall);

        ?>
<ul class="gridnomag gridhoverdir  <?php echo $cssname;?>">
<?php 
 foreach($result as $v){
     $tid = $v['id'];
     $title = $v['title']; 
      $kv = $v['kv']; 
      $kvsm = $v['kvsm'];
     $alias_jump = $v['alias_jump']; 
    
      if($kvsm=='') $imgv = DEFAULTIMG;
      else $imgv =  get_thumb($kvsm,$title,'nodiv');

        if(strpos($cssname, 'ridbigimg')>0) {//thumb use kv
    if($kv<>'') $imgv = UPLOADPATHIMAGE.$kv; 
     else $imgv = DEFAULTIMG;

  }//thumb use big
      else $imgv=$imgv;


  $pidname=$v['pidname'];   
       $alias=alias($pidname,'node');  
        $linkurl = url('node',$alias,$tid,$alias_jump);

   
  $despjj= web_despdecode($v['despjj']);

     // $desp= web_despdecode($v['desp']);
     //    $desptext= web_despdecode($v['desptext']);
     //   $despv='';
     //    if($desptext<>'') $despv = $desptext;
     //  else  $despv = $desp;

// if($blockimg_w>0 && $blockimg_h>0){$imgv =  get_thumb($imgsmall,'','') ;}
// else $imgv = UPLOADPATHIMAGE.$imgsmall; 
  if($kv<>'') $imgvbig = UPLOADPATHIMAGE.$kv; 
         else $imgvbig = DEFAULTIMG;


if(strpos($cssname,'ancybox')>0) { 
  //$caption = ' caption="'.strip_tags($desp).'"';
  $caption = '  ';//no consider caption
  $linkurl = $imgvbig; $classv= 'class="fancybox" data-fancybox-group="buttons"';}
else {$linkurl = $linkurl; $classv='';$caption = '';}

  $linkhref = 'href="'.$linkurl.'" '. $classv.' title="'.$title.' - '.$despjj.'"'. $caption;
 


      ?>
      <li>
                  <a   <?php echo $linkhref;?>>
                     <img class="img" src="<?php echo $imgv?>" alt="<?php echo $title?>" /> 
                    <div class="text">
                      <h5><?php echo $title?></h5>
                      <p><?php echo $despjj?></p>
                    </div>                 
                  </a>                    
                </li>
 
<?php
}
?>


 

</ul>
<div class="c"> </div>
<?php }

else { echo ' 暂无内容，请在后台确定内容是否处于隐藏状态。cate: '.$pid;}
?>

<div id="teampop" class="popbox"></div>

<script type="text/javascript">
              $(function() {
              
                $('.gridhoverdir > li ').each( function() { $(this).hoverdir(); } );

              });
      //---------------------------
   
   //--------------------    


 
$(document).ready(function() {
  
      $('.gridhoverdir a').fancybox({
       
        openEffect  : 'none',
        closeEffect : 'none',

        prevEffect : 'none',
        nextEffect : 'none',

        closeBtn  : true,

        helpers : {
          title : {
            type : 'inside'
          },
           buttons  : {
         position: 'top'
          }//,
           //thumbs: {
          //  width: 50,
          //  height: 50
          //} 
        },

        afterLoad : function() {
          this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
        }
      });
      
      //----------------------
      
}); 
      
</script>


 <script>

// $(window).load(function() {   //must use it,not use ready
//   // cache container
// var diviso_items = $('.gridallwidth');
// // initialize isotope
// diviso_items.isotope({
//   itemSelector : '.gridallwidth>li',
//   layoutMode : 'fitRows'
// });

 


// }); //end window load

</script>
