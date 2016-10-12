<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
if($type=='node') ifhaspidname(TABLE_NODE,$pid);
elseif($type=='page') ifhaspidname(TABLE_PAGE,$pid);
else {echo '出错，相册类型不存在！';exit;}
//目前相册只有 node and page，其他自定义，暂时不需要。

ifhave_lang(LANG);//TEST if have lang,if no ,then jump
if($act <> "pos") zb_insert($_POST);
//
$jumpv='mod_album.php?lang='.LANG.'&pid='.$pid.'&type='.$type;
$jumpv_file=$jumpv.'&file='.$file;


//-----------
 if($act=="pos"){
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_ALBUM." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv);
}

if($act == "sta_sub")
{
     $ss = "update ".TABLE_ALBUM." set sta_visible='$v' where id=$tid $andlangbh limit 1";
	// echo $ss;exit;
    iquery($ss);
    jump($jumpv);
}



if($act=="delimg"){
p2030_delimg($v,'y','y');//p2030_delimg($addr,$delbig,$delsmall)	  
	$ss = "delete from ".TABLE_ALBUM."  where id=$tid $andlangbh limit 1";
	//echo $ss;exit;
	iquery($ss);
jump($jumpv);
}


//-----------
 $title='相册';

require_once HERE_ROOT.'mod_common/tpl_header_iframe.php';

?>
<div class="menu"><a href="<?php echo $jumpv; ?>">图片列表</a>
<a href="<?php echo $jumpv; ?>&file=add&act=add">添加图片</a>
</div>
<div class="pro_album" style="border:1px solid #ccc;padding:20px">

<?php
if($file=='')
require_once HERE_ROOT.'mod_album/tpl_album.php';
else require_once HERE_ROOT.'mod_album/tpl_album_'.$file.'.php';


?>
<div class="c"></div>
</div>

 
</body>
</html>