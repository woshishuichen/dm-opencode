<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/

echo 'no use ...2016.3,index move to page.';
exit;
require_once '../config_a/common.inc2010.php';
ifhave_lang(LANG);//TEST if have lang,if no ,then jump
 $submenu='layout';


$title = '首页布局设置';

 require_once HERE_ROOT.'mod_common/tpl_header.php'; 
?>
 
<?php
 
$framesrc='../mod_layout/mod_layout.php?pid=index&lang='.LANG.'&type=index&file=index';
	echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1000" scrolling="no" frameborder="0"></iframe>';


require_once HERE_ROOT.'mod_common/tpl_footer.php'; 
?>
<div class="c"></div>
 

 
</body>
</html>