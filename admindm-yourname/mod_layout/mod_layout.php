<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
  
*/
require_once '../config_a/common.inc2010.php';
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

  // ECHO $LANG;exit;
  //if($type=='common' or $type=='index' or $type=='page' or $type=='cate' or $type=='csub' or  $type=='read' or  $type=='csubread'){}
 if($type=='common' or $type=='index' or $type=='page' or $type=='cate' or $type=='csub' or  $type=='read' or  $type=='csubread2233'){}
  else  {echo '出错的TYPE!';exit;}
//cusbread no use,because detail all use read.

  //index ,only set banner value;other is in buju.php like header or footer,not layout here.
  
  $pidstring = substr($pid,0,4);  
    if($pidstring=='comm') {$title ='公共页面布局';}
	else if($pidstring=='inde') {$title ='首页布局设置';}
 else if($pidstring=='page') {ifhaspidname(TABLE_PAGE,$pid);$title ='单页布局';}
  else if($pidstring=='cate' or $pidstring=='csub') {
  			ifhaspidname(TABLE_CATE,$pid);
  			if($type=='read' or $type=='csubread') $title ='详情页布局';
  			else   			$title ='分类布局';
  		}
    
 else {echo 'pid出错!';exit;}

 $stylebh = $curstyledebug;
 
$sqllayout = "SELECT * from ".TABLE_LAYOUT."  where pid='$pid' and type='$type' and stylebh='$stylebh' $andlangbh order by id limit 1";	
	  //echo $sqllayout; exit;	
	  if(getnum($sqllayout)>0){   
		$row = getrow($sqllayout); 
		$tid=$row['id'];  
		$sta_bread=$row['sta_bread_posi'];
		$sta_sidebar=$row['sta_sidebar'];
		$sta_contentbot=$row['contentbot'];//use for index
		$banner=$row['banner'];  
		$bscnt=$row['bscnt'];  
		}
	  else{ 
	     $ss = "insert into ".TABLE_LAYOUT." (pid,pbh,lang,type,stylebh,dateedit) values ('$pid','$user2510','".LANG."','$type','$stylebh','$dateall')";		
			 iquery($ss);
			$jumphere = '../mod_layout/mod_layout.php?pid='.$pid.'&lang='.LANG.'&type='.$type;
			jump($jumphere);
			 //echo $ss;exit;
			}
			
		
  

 if($act <> "pos") zb_insert($_POST);
//


$jumpv='mod_layout.php?lang='.LANG.'&pid='.$pid.'&type='.$type;
$jumpv_file=$jumpv.'&file='.$file;


require_once HERE_ROOT.'mod_common/tpl_header_iframe.php';

?>
<!-- &nbsp;&nbsp;后台模板编号: -->
<?php //、echo $curstyledebug.' -- '.get_field(TABLE_STYLE,'title',$curstyledebug,'pidname')?>

<br />

 <h2 class="h2tit_biao"><?php echo $title?></h2>
<div class="pro_album" style="border:1px solid #ccc;padding:20px">

<?php
require_once HERE_ROOT.'mod_layout/tpl_layout.php';
//   if($file=='list')  require_once HERE_ROOT.'mod_layout/tpl_layout.php';
// else require_once HERE_ROOT.'mod_layout/tpl_layout'.$file.'.php';


?>
<div class="c"></div>
</div>

 
</body>
</html>