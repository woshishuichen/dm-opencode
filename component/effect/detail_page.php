<?php
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
  $album= $row_page['album']; $albumcssname= $row_page['albumcssname']; $albumposi= $row_page['albumposi'];
    $pidname= $row_page['pidname'];
 $desp=web_despdecode($row_page['desp']);
		$desptext=web_despdecode($row_page['desptext']);		
		$despv='';
		if($desptext<>'') $despv = $desptext;
		else  $despv = $desp;


if($albumposi<>'y') require_once EFFECTROOT.'album.php';
?>
<div class="content_desp">
<?php

//download
if($downloadurl<>'') detail_downloadurl($downloadurl);

//video 
detail_videourl();
//if($videourl<>'')require_once(EFFECTROOT.'plugin_detailvideo.php');

echo  $despv;

?>
</div>
<?php 
if($albumposi=='y') require_once EFFECTROOT.'album.php';
 
/* use for when has alias,then page-id not access,now it is not reasonable.so alias and page-id both use...
if($alias<>'')
{
if($page<>1)  jump($var404);
}*/
//page default is 1 by set in htaccess
?>