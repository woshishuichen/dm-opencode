<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
  if($dhtrigger=='')  $dhtrigger = 'bxbanner'.rand(1000,9999); 
 
?>
<div  id="<?php echo $dhtrigger?>" class="bxcarousel <?php if($cssname<>'') echo ' '.$cssname?>">
 
<?php 

    //$boxtitle = get_field(TABLE_CATE,'name',$pid,'pidname');
    

      $pidshort = substr($pid,0,4);  
       if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
       else  $sqlv=" pid='$pid' ";
       
      // if($sta_tj=='y') $statjsql=" and sta_tj='y' ";
       // else  $statjsql="  ";


   $sqlall="select * from ".TABLE_NODE." where $sqlv  $andlangbh   and sta_visible='y' and sta_noaccess='n'   order by pos desc,id desc limit $maxline";
   if(getnum($sqlall)>0){
      $result = getall($sqlall);

  
   ?>
<ul>
<?php

 //
 //echo $rgcont_list; // --it is rowall
 //pre($result);
 foreach($result as $v){
 $tid = $v['id'];
 $title = $v['title']; 
 $kv=$v['kv'];$kvsm=$v['kvsm'];
  $pidname = $v['pidname'];
  $alias=alias($pidname,'node'); 
   $dateday = $v['dateday']; 
  //$titlecss = $v['titlecss'];  
  $url = url('node',$alias,$tid,'');       
 

  if($kvsm<>'') $imgv =  get_thumb($kvsm,$title,'nodiv');//when grid,first kvsm,then kv,then noimg
  else{ 
     if($kv<>'') $imgv = UPLOADPATHIMAGE.$kv; 
     else $imgv = DEFAULTIMG;
  }
   

 
 ?> 
	
<li><a class="img<?php if(strpos($cssname, 'video')>1) echo ' bgvideowrap';?>" href="<?php echo $url?>"><img src="<?php echo $imgv?>" alt="<?php echo $title?>">
<?php if(strpos($cssname, 'gvideo')>0) echo '<div class="bgvideoarrow"></div>';
//no use bgvideo,because wrap is bgvideo too.

?>

</a>
<?php 
if(strpos($cssname, 'otitle')>0){}
else    echo  '<a href="'.$url.'" class="title">'.$title.'</a>'; 
?>
    
    </li>
<?php
}
?>
 </ul>

<?php 
 }
    else { echo '暂无内容。';}
 


    ?>
    </div>
<?php 
if(strpos($cssname,'xautono')>0) $bxauto= 'false';
else $bxauto= 'true';

if($dhpara=='') $dhparav= 'pager:false,moveSlides : 3,minSlides: 2, maxSlides: 7,slideWidth: 188, slideMargin: 36,';
else $dhparav= $dhpara;

 ?>
     <script>
$(function(){
  // var bxcarouselid = '#<?php echo $dhtrigger?>>ul';
   
   $('#<?php echo $dhtrigger?>>ul').bxSlider({ 
 
     auto:<?php echo $bxauto?>,
     <?php echo $dhparav?>
       // pager:false,
       // nextText: '<i class="fa fa-angle-right"></i>',
       // prevText: '<i class="fa fa-angle-left"></i>',
       // moveSlides : 3,
        //minSlides: 2,
       // maxSlides: 7,
       // slideWidth: 188,
       // slideMargin: 36,
        pause:3000,
   autoHover:true,
        infiniteLoop: true,
         hideControlOnEnd: true

 });


});
</script>



   