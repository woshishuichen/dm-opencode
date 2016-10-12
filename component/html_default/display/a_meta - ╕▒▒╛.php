<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php seo($seo1,'seo1') ?></title>
<meta name="description" content="<?php seo($seo3,'seo3') ?>" />
<meta name="keywords" content="<?php echo seo($seo2,'seo2') ?>" />
<meta name="author" content="DM建站系统 www.demososo.com" />
<?php if(dm_is_mobile()) echo '<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0, user-scalable=no, width=device-width">'; ?>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="<?php echo UPLOADPATHIMAGE.$ico;?>?v=<?php echo $cssversion;?>" />
<link href="<?php echo CSSPATH;?>css/dmcommon.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<link href="<?php echo STAPATH;?>app/compress/compress.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<link href="<?php echo CSSPATH;?>css/grid.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<link href="<?php echo CSSPATH;?>css/component.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<?php  if(@$_COOKIE["coo_color"]<>''){?>
<link href="<?php echo CSSPATH;?>css/<?php echo $_COOKIE["coo_color"];?>.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<?php  }else {?>
<link href="<?php echo CSSPATH;?>css/color.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<?php } ?>
<?php  if(@$_COOKIE["coo_color"]<>''){?>
<link href="<?php echo CSSPATH;?>css/<?php echo $_COOKIE["coo_box"];?>.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<?php  }else {?>
<link href="<?php echo CSSPATH;?>css/box.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<?php } ?>
<link href="<?php echo CSSPATH;?>css/responsive.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<link href="<?php echo CSSPATH;?>css/custom.css?v=<?php echo $cssversion;?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo STAPATH;?>app/fontawesome/css/font-awesome.min.css"> 
<script src="<?php echo STAPATH;?>app/jq/jquery.js" type="text/javascript"></script>
<script src="<?php echo CSSPATH;?>js/dm.js?v=<?php echo $cssversion;?>" type="text/javascript"></script>
<script src="<?php echo STAPATH;?>app/compress/compress3.js?v=<?php echo $cssversion;?>" type="text/javascript"></script>
<script src="<?php echo STAPATH;?>app/compress/compress.js?v=<?php echo $cssversion;?>" type="text/javascript"></script>
<script src="<?php echo STAPATH;?>app/compress/compress2.js?v=<?php echo $cssversion;?>" type="text/javascript"></script> 

<!--[if (gte IE 6)&(lte IE 8)]>
  <script type="text/javascript" src="<?php echo STAPATH;?>app/modernizr.js"></script>
  <script type="text/javascript" src="<?php echo STAPATH;?>app/selectivizr-min.js"></script>
<![endif]-->
</head>
<?php
if(isdmmobile()) $mobilecss=' page_mobile';
else $mobilecss=' ';
 
?>
<body class="<?php echo $bodycss.$mobilecss;?>">
<?php
//pre($seo1);pre($seo2);pre($seo3);
if($test=='y'){
 	
	echo '<p style="background:blue;color:#fff">...meta.php....curtitle: '.$title.'| modtype: '.$modtype.'| listfg: '.$listfg;
	echo '<br> | tid: '.$tid.' | alias: '.$alias.' | pidname: '.$pidname;
	
	echo '<br> | maintitle: '.$maintitle. '| mainpid: '.$mainpid.' | mainpidname: '.$mainpidname.' | mainalias: '.$mainalias;
	echo '<p>';
}

?>

 
