<?php 
 
$arr_formcolor2 = array('blue'=>'蓝色(默认)',
	'green'=>'绿色',
	'red'=>'红色','orange'=>'橙色',
	'black'=>'黑色',
	'purple'=>'紫色',
	);



//pre($_SERVER);
$url = @$_SERVER['REQUEST_URI'];
 
?>
 
<div class="sitecolorchange por">
 <div class="onlineclose cp onlineclosecolor" style="display: block;"> </div>
 <a href="http://www.demososo.com/demo.html" target="_blank" style="font-size:30px">更多官方模板&gt;</a>

  
</div>

<script>
$(function (){

	$('.onlineclosecolor').click(function(){

         $('.sitecolorchange').hide();

	});

})
 
</script>