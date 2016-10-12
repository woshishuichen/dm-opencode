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

	    		else block($banner);

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
<div class="area">
<div class="bgarea container">
   
   <?php require_once DISPLAYROOT.'b_area.php'; ?>



 </div>
</div><!-- end content -->
  <?php   require_once DISPLAYROOT.'a_footer.php';  ?> 
</div>
</div><!--end pagewrap-->
<?php  
		 require_once DISPLAYROOT.'a_footer_last.php';	
?>

</body>
</html>
