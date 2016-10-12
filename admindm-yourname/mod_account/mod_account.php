<?php
/*
	 
    //act:list edit del delimg updatetime submit(update add )
*/
require_once '../config_a/common.inc2010.php';
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

zb_insert($_POST);

$jumpv='mod_account.php?lang='.LANG.'&pid='.$pid.'&type='.$type;
$jumpv_file=$jumpv.'&file='.$file;
 
//
$title = '帐号管理'; 
 


require_once HERE_ROOT.'mod_common/tpl_header.php';

require_once HERE_ROOT.'mod_account/tpl_account.php';
require_once HERE_ROOT.'mod_common/tpl_footer.php';


?>