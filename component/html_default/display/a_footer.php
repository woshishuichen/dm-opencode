<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?> 
<?php 
if($bsfootercols<>'')  {echo '<div class="footercols block"><div class="container">';block($bsfootercols); echo '</div></div>';}
if($bsfooterlinks<>'')  {echo '<div class="footerlinks block"><div class="container">';block($bsfooterlinks); echo '</div></div>';}
 
 ?>
 
<footer class="footerwrap block"> 
<?php   //no need add div container ,will by admin decide
 block($bsfooter);
?>
</footer>	
<?php 
 
//  if(isdmmobile()){ //except ipad  --cancel temp...
//  	block($bsfooternavmob);  //prog_footernavmob or prog_footernavmob_en
	 
// }
?>


<?php 
$jsfile_style = EFFECTROOT.'ndconfig/js_'.$curstyle.'.php';
if(is_file($jsfile_style))  require_once($jsfile_style); 

?>
