<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/


require_once '../config_a/common.inc2010.php';
ifhave_lang(LANG);//TEST if have lang,if no ,then jump
 //$submenu='layout';


$title = '公共页面布局';
 $stylebh = $curstyledebug;
 require_once HERE_ROOT.'mod_common/tpl_header.php'; 
?>
 
<?php //stylebhcntlink($stylebh);?>



<?php


$framesrc='../mod_layout/mod_layout.php?pid=common&lang='.LANG.'&type=common&file=list';
	echo '<Iframe name="tt" src="'.$framesrc.'" width="100%" height="1500" scrolling="no" frameborder="0"></iframe>';


require_once HERE_ROOT.'mod_common/tpl_footer.php'; 
?>
<div class="c"></div>
 

 
</body>
</html>