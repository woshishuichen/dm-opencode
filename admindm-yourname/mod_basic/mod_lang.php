<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/
require_once '../config_a/common.inc2010.php';
//$andlangbh = '';// important,use for ifhasid function
if($tid<>'')    ifhasid_nolang(TABLE_LANG,$tid); //ifhasid(TABLE_LANG,$tid);
 
if($act <> "pos") zb_insert($_POST);
$title = '网站设置和多语言管理';


$submenu='basic';

//$jumpv ='pro-lang.php.'?lang='.LANG; //HERE IS NO LANG
$jumpv ='mod_lang.php?lang='.LANG;//use ?lang="",is for &,not ?
$jumpv_file =$jumpv.'&file='.$file;

/*************************************************/


if($act == "sta")
{
     $ss = "update ".TABLE_LANG." set sta_visible='$v' where id=$tid   limit 1";//$andlangbh
    iquery($ss);
    jump($jumpv);
}
if($act == "sta_big5")
{
     $ss = "update ".TABLE_LANG." set sta_big5='$v' where id=$tid   limit 1";
    iquery($ss);
    jump($jumpv);
}



if($act == "setdefault")
{  
$ss =" select id from  ".TABLE_LANG; 
$rowlist = getall($ss);
		if($rowlist<>'no') {
			foreach($rowlist as $v){
				  $tidhere=$v['id'];
				  $ss2 = "update ".TABLE_LANG." set sta_main='n' where id=$tidhere   limit 1";
				iquery($ss2); 
			}			
		}
     $ss3 = "update ".TABLE_LANG." set sta_main='y' where id=$tid   limit 1";
	// echo $andlangbh;exit;
      iquery($ss3);
    jump($jumpv);
}


if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_LANG." set  pos='$v' where id='$k'   limit 1";
         iquery($ss);
        }
      jump($jumpv);
}
  $lang1_cur = $lang2_cur ='';
 if($file=="addedit")   $lang1_cur=' cur';
 elseif($file=="set")    $lang2_cur=' cur';
 
/*************************************************/
require_once HERE_ROOT.'mod_common/tpl_header.php';

if($file=='') require_once HERE_ROOT.'mod_basic/tpl_lang.php';
else  {
?>
<div class="menu">
 <a    href="<?php echo $jumpv?>"><span  class='bg22' >返回管理列表</span></a>
</div>
 <div class="menusub"  style="margin-bottom:10px;"> 


<?php if($act=='edit') {?>

<a class='bg22 <?php echo $lang2_cur ?>' href="<?php echo $jumpv.'&file=set&act=edit&tid='.$tid;?>"><span  class='bg22' >网站设置</span></a> 
 
 <a class='bg22 <?php echo $lang1_cur ?>' href="<?php echo $jumpv.'&file=addedit&act=edit&tid='.$tid;?>"><span  class='bg22' >语言设置</span></a>
 <?php } ?>

 </div>	   
	 
   
		   
<?php
 require_once HERE_ROOT.'mod_basic/tpl_lang_'.$file.'.php';
 }

require_once HERE_ROOT.'mod_common/tpl_footer.php'; 
/*************************************************/

?>

 