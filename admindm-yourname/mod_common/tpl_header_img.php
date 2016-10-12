<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title>
<meta name="author" content="" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="robots" content="all" />
<link rel="shortcut icon" href="../cssjs/ico/favicon2_<?php echo LANG?>.ico" />
<link href="../cssjs/a_css.css" rel=stylesheet type=text/css>
<link href="../cssjs/a_responsive.css" rel="stylesheet" type="text/css" />
<link href="<?php echo STAPATH?>app/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

 
<script src="../cssjs/jquery.js" type="text/javascript" ></script>
<script src="../cssjs/a_js.js" type="text/javascript" ></script>
<style>body{background:none; }</style>
</head>
<body>

<div class="newcnt new_w1 iframeheader">

<div class="tit_biao"><h1 ><?php echo $title?> </h1>
 
 <a href='javascript:this.location.reload()' style='margin-left:100px;display:inline-block'>刷新页面</a>
 <a href='javascript:window.close()' style='margin-left:100px;display:inline-block'>关闭窗口</a>
 
 <a href='../mod_common/index-welcome.php?lang=<?php echo LANG?>' style='float:right;margin-right:10px'>后台首页</a>
  <a href='<?php echo $fronturl?>' target="_blank" style='float:right;margin-right:10px'>前台首页</a>

</div>
<div class="tit_biao_bot">

<?php
//if($ifh2tit<>'no'){
  //  echo '<div class="menu">'.$menulink.'</div>';
 // echo '<h2 class="h2tit_biao">'.$h2tit.'</h2>';

//}
?>


