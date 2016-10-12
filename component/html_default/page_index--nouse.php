<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 require_once DISPLAYROOT.'a_meta.php';
//require_once HTMLROOT.'vinc_meta.php';
?>

<script src="<?php echo STAPATH;?>app/jquery.hoverdir.js" type="text/javascript"></script>
<div class="pagewrap">
  <?php   require_once DISPLAYROOT.'a_header.php';  ?> 


<?php
 if($banner<>''){
 ?>
	 <div class="banner wrap">
		 <?php 	
		  block($banner); 
		 ?>	 
	</div> <!-- end bannerwrap -->
<?php
}
 ?>

<div class="area homearea">
<div class="containerper">
 

<?php
  if($contentbot=='prog_index' or $contentbot=='')  require_once EFFECTROOT.'prog_index.php';
  else block($contentbot); 
?> 




</div><!-- end homearea -->
</div><!-- end homewrap -->

	<?php  
		 require_once DISPLAYROOT.'a_footer.php';	
	?>

</div><!--end pagewrap-->

<?php  
		 require_once DISPLAYROOT.'a_footer_last.php';	
?>

<script type="text/javascript">
	$(document).ready(function() {
 
    /* 最基本的，使用了默认配置 */
     
    $(".popup").fancybox();
     
    /* 使用了自定义配置 */
     
    //$("a#inline").fancybox({
      //  'hideOnContentClick': true
  //  });
 });

</script>
</body>
</html>
