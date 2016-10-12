<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 require_once DISPLAYROOT.'a_meta.php'; 
?>
 <div class="pagewrap">
  <?php   require_once DISPLAYROOT.'a_header.php';  ?> 

 <div class="areacontent">

<?php
 
 //if($banner<>''){
 ?>
	 <div class="banner wrap">

	    <?php 
	   
	    	if($banner<>'') {

	    		   $pidifimg = gl_imgtype($banner);
	    		  
				   if(in_array($pidifimg,$attach_type)){ 
				 
				    if(isdmmobile()) echo '<div class="bannerimg perimgwrap"><img src="'.UPLOADPATHIMAGE.$banner.'" alt="" /></div>';
				    else echo '<div class="bannerimg" style="background:url('.UPLOADPATHIMAGE.$banner.') center center no-repeat"></div>';
				  } 

	    		else block($banner); //when mobie.value reset in funclayout.php

	    	} 
	    	else{
	    			 if($alias<>'index'){ 
	    			 	?>
	    			 	 <div class="breadtitle">
						     <div class="container">
						     <?php breadtitle()//in frontcommon,breadtitle def hide by css?>
						     </div>
					     </div>
	    			 	<?php
	    			 }
	    	}
		 ?>
	</div><!-- end bannerwrap -->
<?php
//}
 ?>
<?php 
if($pagelayout=='allwidth')  { //areacontent use danye page,need paddint-top:...
	echo '<div class="areaAllwidth">';
	  if($content<>'') block($content);//only content is use. use in homepage
	  else{echo '在单页面管理里，这个页面设置为了全宽，则要在布局里设置content的值。或者设置为非全宽。';}
	 echo '</div>';
	// if($alias<>'index') require_once DISPLAYROOT.'b_area.php';
}
else {
		echo '<div class="area"><div class="bgarea container">';
		 require_once DISPLAYROOT.'b_area.php';
		 echo '</div></div>';
}
?>
<!-- end content -->
 
  <?php   require_once DISPLAYROOT.'a_footer.php';  ?> 
</div><!--end areacontent-->
</div><!--end pagewrap-->
<?php  
		 require_once DISPLAYROOT.'a_footer_last.php';	
?>

 
</body>
</html>