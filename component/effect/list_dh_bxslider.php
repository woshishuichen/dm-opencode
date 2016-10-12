<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/

	?>
<div  id="dhtriggerbx"  class="bxcarousel bxgridPro bxhomeproduct">
 
  
 
<ul>
<?php

 //
 //echo $rgcont_list; // --it is rowall
 //pre($result);
 foreach($result as $v){
 $tid = $v['id'];
 $title = $v['title']; $kvsm=$v['kvsm'];
  $pidname = $v['pidname'];
  $alias=alias($pidname,'node'); 
   $dateday = $v['dateday']; 
  //$titlecss = $v['titlecss'];  
  $url = url('node',$alias,$tid,'');       
 
	if($kvsm=='') $imgv=DEFAULTIMGDIV;
			else{
				
				$imgv = get_thumb($kvsm,$title,'div');
				}
            $url = url('node',$alias,$tid,'');

 
 ?> 
	
<li><a class="img" href="<?php echo $url?>"><?php echo $imgv?></a>
    <a href="<?php echo $url?>" class="title"><?php echo $title?></a>
    </li>
<?php
}
?>
 </ul>
 </div>

 <script>
$(function(){
    $('#dhtriggerbx>ul').bxSlider({ 
 
    auto:true,
        pager:false,
       // nextText: '<i class="fa fa-angle-right"></i>',
       // prevText: '<i class="fa fa-angle-left"></i>',
        moveSlides : 3,
        minSlides: 2,
        maxSlides: 7,
        slideWidth: 178,
        slideMargin: 20,
        infiniteLoop: true,
         hideControlOnEnd: true

 });


});
</script>



   