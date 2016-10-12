<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/

require_once '../config_a/common.inc2010.php';
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

$submenu='product';
 
if($tid <> "")  {ifhasid(TABLE_CATE,$tid);
  $sqlcate = "select * from  ".TABLE_CATE." where id='$tid' $andlangbh order by pos desc,id limit 1";
     $rowcate22 = getrow($sqlcate);
     $sub_pidname=$rowcate22['pidname']; 
     $sub_pid=$rowcate22['pid'];  
}

if($act <> "pos") zb_insert($_POST);

if($catid <> ""){
  ifhaspidname(TABLE_CATE,$catid);

  $catarr = get_fieldarr(TABLE_CATE,$catid,'pidname');
$catname = $catarr['name']; 
$modtype = $catarr['modtype']; 
//$mainalias= alias($catid,'cate');
}

 
/********************************************/
$title = '主分类管理';
//
/************************/
//$sql = "SELECT id from ".TABLE_MENU." where pbh='".USERBH."'  order by id desc";
 // $num = getnum($sql);
 // $limitnum='菜单限制数：'.$num_menu.' / 已用数：'.$num;
$jumpv='mod_category.php?lang='.LANG;
$jumpv_back=$jumpv.'&catid='.$catid;
$jumpv_file=$jumpv_back.'&file='.$file;

$jumpv_addmain = $jumpv.'&file=mainadd&act=add';
$jumpv_editmain = $jumpv_back.'&file=mainedit&act=edit';
$jumpv_maineditcan = $jumpv_back.'&file=maineditcan&act=edit';
//$jumpv_editmain_blockdh = $jumpv_back.'&file=mainedit_blockdh&act=editmain';



$jumpv_addsub = $jumpv_back.'&file=subedit&act=addsub';
$jumpv_editsub = $jumpv_back.'&file=subedit&act=editsub&tid='.$tid;

   
/*-----------
*/
 $catsublist_cur=''; $field_cur=''; $mainedit_cur=$maineditdh_cur=''; 
 $editalias_cur=''; $buju_cur=''; $bujuread_cur='';

 if($file==""  or $file=="subedit")   $catsublist_cur=' cur';
 elseif($file=="field" or $file=="fieldedit")   $field_cur=' cur';
 elseif($file=="mainedit" || $file=="maineditcan")   $mainedit_cur=' cur';
  elseif($file=="mainedit_blockdh")   $maineditdh_cur=' cur'; 
  elseif($file=="edit_alias")   $editalias_cur=' cur';
 elseif($file=="buju")   $buju_cur=' cur';
 elseif($file=="bujuread")   $bujuread_cur=' cur';
  

 //----------
 

if($act == "sta_catesub")
{
     $ss = "update ".TABLE_CATE." set sta_visible='$v' where id=$tid $andlangbh limit 1";
	// echo $ss;exit;
    iquery($ss);
    jump($jumpv_back);
}

  

if($act == "pos")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_CATE." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv_back);
}
 


if($act == "posleft")
{
    foreach ($_POST as $k=>$v){
         $ss = "update ".TABLE_CATE." set  pos='$v' where id='$k'  $andlangbh  limit 1";
         iquery($ss);
        }
      jump($jumpv_back);
}
 


if($act == "delmaincate")
{ 
 $ifdel1 = ifcandel(TABLE_CATE,$pidname,'出错，有子分类不能删除，请先删除它的子分类！',$jumpv_back);// back is fail 
 $ifdel2 = ifcandel(TABLE_FIELD,$pidname,'分类里有字段！请先在字段管理里删除字段！',$jumpv_back);
 $ifdel3 = ifcandel(TABLE_NODE,$pidname,'分类里有内容，请先在内容管理里删除内容！',$jumpv_back);
 $ifdel4 = ifcandel(TABLE_MENU,$pidname,'此分类有子菜单，请先在菜单管理 里删除。！',$jumpv_back);

 if($ifdel1 and $ifdel2 and $ifdel3 and $ifdel4) {

  ifsuredel_field(TABLE_LAYOUT,'pid',$pidname,'eq','noback');
   ifsuredel_field(TABLE_ALIAS,'pid',$pidname,'eq','noback');
	//ifcandel_bypid(TABLE_LAYOUT,$pidname,'noback');
	//ifcandel_bypid(TABLE_ALIAS,$pidname,'noback');

	ifsuredel(TABLE_MENU,$pidname,'noback'); //DEF IS BY PIDNAME
	ifsuredel(TABLE_CATE,$pidname,$jumpv);
 }
	
}
if($act == "delsubcate")
{ 
 $ifdel1 = ifcandel(TABLE_CATE,$pidname,'出错，有子分类不能删除，请先删除它的子分类！',$jumpv_back);// back is fail 
 $ifdel2 = ifcandel(TABLE_NODE,$pidname,'分类里有内容，请先在内容管理里删除内容！',$jumpv_back);
 if($ifdel1 and $ifdel2 ) ifsuredel(TABLE_CATE,$pidname,$jumpv_back);	
}


//-------------------

require_once HERE_ROOT.'mod_common/tpl_header.php';
require_once HERE_ROOT.'mod_category/tpl_category_list.php';
require_once HERE_ROOT.'mod_common/tpl_footer.php';

?>
