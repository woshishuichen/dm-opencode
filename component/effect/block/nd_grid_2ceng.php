 <?php 

//   $pidshort = substr($pid,0,4);  
//       if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
//       else  $sqlv=" pid='$pid' ";
// if($pidshort=='csub')  echo '<h5>出错，此效果只限于主分类，不能用子分类。 </h5>';

//  $sqlall="select * from ".TABLE_NODE." where sta_visible='y'  and ppid='$pid'  $andlangbh  order by pos desc,id desc limit $maxline";
 //  echo $sqlall;

   $pidshort = substr($pid,0,4);  
      if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
      else  $sqlv=" pid='$pid' ";
//if($pidshort=='csub')  echo '<h5>出错，此效果只限于主分类，不能用子分类。 </h5>';

 $sqlall="select * from ".TABLE_NODE." where sta_visible='y'  and $sqlv  $andlangbh  order by pos desc,id desc limit $maxline";


    if(getnum($sqlall)>0){
        $result = getall($sqlall);


$gcoverlayv = 'jia';
if(strpos($cssname,'g2cengkuo')>0)  $gcoverlayv = 'kuo';
else if(strpos($cssname,'g2cengarrow')>0)  $gcoverlayv = 'arrow';



  //cssname ,dhtrigger in group func
  //css : gridcol gridcol4
 if($dhtrigger=='')  $dhtrigger = 'grid2ceng'.rand(1000,9999); 
  ?>

<div <?php if($dhtrigger<>'') echo "id=$dhtrigger";?>  class="gridcol grid2ceng <?php if($cssname<>'') echo ' '.$cssname?>">
  <ul>
<?php 
 foreach($result as $v){
     $tid = $v['id'];
     $title = $v['title']; 
         $pidname=$v['pidname'];
         

    $kv = $v['kv'];
  $kvsm = $v['kvsm'];
  if($kvsm<>'') $imgv =  get_thumb($kvsm,$title,'nodiv');//when grid,first kvsm,then kv,then noimg
  else{ 
     if($kv<>'') $imgv = UPLOADPATHIMAGE.$kv; 
     else $imgv = DEFAULTIMG;
  }

  if(strpos($cssname, 'ridbigimg')>0) {//thumb use kv
    if($kv<>'') $imgv = UPLOADPATHIMAGE.$kv; 
     else $imgv = DEFAULTIMG;

  }//thumb use big
      else $imgv=$imgv;


 if($kv<>'') $imgvbig = UPLOADPATHIMAGE.$kv; 
     else $imgvbig = DEFAULTIMG;

 
       $alias=alias($pidname,'node');  
        $linkurl = url('node',$alias,$tid,'');
 

if(strpos($cssname,'ancybox')>0) { 
  //$caption = ' caption="'.strip_tags($desp).'"';
  $caption = '  ';//no consider caption
  $linkurl = $imgvbig; $classv= 'class="fancybox" data-fancybox-group="buttons"';}
else {$linkurl = $linkurl; $classv='';$caption = '';}

  $linkhref = 'href="'.$linkurl.'" '. $classv.' title="'.$title.'"'. $caption;
 


 $despjj= $v['despjj'];
if($despjj=='') {
    $desp= web_despdecode($v['desp']);
      $desptext= web_despdecode($v['desptext']);
      $despv='';
      if($desptext<>'') $despv = $desptext;
      else  $despv = $desp;
    }
    else    $despv = $despjj;

  $despvjj = mb_substr(strip_tags($despv),0,110,'UTF-8').'......';

  ?>


<?php 
if($gcoverlayv=='jia') { 
?>

 <li class="gcoverlayjia">
     <a  <?php echo $linkhref?>>
    <div class="overlay"><span>+</span></div>
      <div class="img">
              <img src="<?php echo $imgv?>" alt="<?php echo $title?>">
            </div>
      <h3><?php echo $title?></h3>
    </a> </li>


<?php
}
if($gcoverlayv=='kuo') {  
?>

 <li class="gcoverlaykuo">
     
  <div class="text transition5">
     <div class="textinc transition5">
     <h3><?php echo $title?></h3>
  <a  <?php echo $linkhref?>>
          查看详情</a>
</div>
</div>
      <div class="img">
              <img src="<?php echo $imgv?>" alt="<?php echo $title?>">
             <?php if(strpos($cssname,'cengkuotitle')>0) { ?>
              <h4><?php echo $title?></h4>
              <?php } ?>
            </div>
      </li>

<?php
}
if($gcoverlayv=='arrow') { 
?>
 <li class="gcoverlayarrow">
  <a  <?php echo $linkhref?>>
      <div class="img">
             <img src="<?php echo $imgv?>" alt="<?php echo $title?>"> 
            </div>

            <div  class="text transition5">
           <h3><?php echo $title?></h3>

              <p><?php echo $despvjj?></p>
            </div>

</a>
<a href="<?php echo $linkurl?>" class="linkarrow transition5"><i class="fa fa-mail-forward"></i></a>


      </li>

<?php
} 
?>








<?php
}
?>
 
</div>
<div class="c"> </div>
<?php }

else { echo ' 暂无内容，请在后台确定内容是否处于隐藏状态。 ';}
?>



<?php 
if(strpos($cssname,'ancybox')>0){
?>
   <script>
$(document).ready(function() {
      $('#<?php echo $dhtrigger?> .fancybox').fancybox({
       
        openEffect  : 'none',
        closeEffect : 'none',

        prevEffect : 'none',
        nextEffect : 'none',

        closeBtn  : true,

      
       afterLoad : function() {
          var caption = $(this.element).attr('caption');
        //  this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '')+(caption ? ' <p class="fdesp"> ' + caption+'</p>' : '');
        this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '')+(caption ? '  ' : '');
           ;
        }
      });
      
});
      
</script>
<?php
}

?>
