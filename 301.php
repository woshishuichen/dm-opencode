<?php 
header('HTTP/1.1 301 Moved Permanently');

$url='';
 
if(isset($_GET['url']))   $url=$_GET['url'];
 
 //echo $url;exit;
	
if($url=='en')  header('Location:en/index.html');
if($url=='en/')  header('Location:index.html');	


?>
