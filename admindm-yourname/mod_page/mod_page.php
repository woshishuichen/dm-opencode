<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/

require_once '../config_a/common.inc2010.php';

ifhave_lang(LANG);//TEST if have lang,if no ,then jump

if($act <> "pos") zb_insert($_POST);
/********************************************/
$title = '单页面管理';
//
/************************/
//$sql = "SELECT id from ".TABLE_PAGE." where pbh='".USERBH."'  order by id desc";
 // $num = getnum($sql);
 // $limitnum='菜单限制数：'.$num_menu.' / 已用数：'.$num;
 

$jumpv='mod_page.php?lang='.LANG;
$jumpv_file='mod_page.php?lang='.LANG.'&file='.$file;


$jumpv_add=$PHP_SELF.'?lang='.LANG.'&file=add&act=add';
$jumpv_add_cate=$PHP_SELF.'?lang='.LANG.'&file=add_cate&act=add';
$jumpv_insert=$PHP_SELF.'?lang='.LANG.'&file=add&act=insert';
$jumpv_insert_cate=$PHP_SELF.'?lang='.LANG.'&file=add_cate&act=insert';

$jumpv_edit_custom=$PHP_SELF.'?lang='.LANG.'&file=edit_custom&act=edit';
$jumpv_update_custom=$PHP_SELF.'?lang='.LANG.'&file=edit_custom&act=update';

 
$jumpv_edit='mod_page_edit.php?lang='.LANG;//use for list link
 
if($act == "sta_menu")
{ 
     $ss = "update ".TABLE_PAGE." set sta_visible='$v' where id=$tid $andlangbh limit 1";	 
     iquery($ss);
    jump($jumpv);
}
if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_PAGE." set  pos='$v' where id='$k'  $andlangbh limit 1";
         iquery($ss);
        }
      jump($jumpv);
}
//-------------------
if($act == "delcate")
{ 
$sql = "delete from ".TABLE_PAGE." where pidname= '$pidname' and type='cate' $andlangbh limit 1";
	// echo $sql;exit;
	 iquery($sql);	
	 jump($jumpv);
	
}

 

require_once HERE_ROOT.'mod_common/tpl_header.php';
?>
<div class="menu">
<a href="<?php echo $jumpv;?>">管理列表</a>
<a href="<?php echo $jumpv_add;?>">添加单页</a>
 

<!-- <a href="<?php //echo $jumpv_edit_custom;?>">自定义菜单</a>
 -->
</div>
<?php
if($file=='') require_once HERE_ROOT.'mod_page/tpl_page_list.php';
elseif($file=='add') require_once HERE_ROOT.'mod_page/tpl_page_add.php';
 
require_once HERE_ROOT.'mod_common/tpl_footer.php';
//echo "$hotellist<pre>".print_r($_POST,1)."</pre><hr>";
//echo 'kk';
//echo substr($_FILES['addr']['name'],-3);
?>