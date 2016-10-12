<?php

$to = &$_GET['to'];
$mb = &$_GET['mb'];
$tov = &$_GET['tov'];

if($to=='colordemo') $to = 'dmpostform.php?type=colordemo&mb='.$mb;
else if($to=='previewofndlist') {
	//adminfrom.php?to=previewofndlist&tov=ndlist20160713_0526137228=en
	//ndlist20160713_0526137228=en
 // echo $tov;
 // exit;


  $toarr = explode('=', $tov);
  if($toarr[1]=='cn') 	$to = 'dmpostform.php?type=previewofndlist&pidname='.$toarr[0];
  else $to = $toarr[1].'/dmpostform.php?type=previewofndlist&pidname='.$toarr[0].'&lang='.$toarr[1];

}
else {

if($to=='') $to='index.html';

}

?>
<script>
window.location.href='<?php echo $to?>';
</script>
 
