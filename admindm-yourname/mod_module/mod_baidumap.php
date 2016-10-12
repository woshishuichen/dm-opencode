<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
 if($act <> "pos") zb_insert($_POST);
 
 if($pidname<>'') {ifhaspidname(TABLE_BLOCK,$pidname);}
 
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

$jumpv='mod_baidumap.php?lang='.LANG;
$jumpv_pidname=$jumpv.'&pidname='.$pidname;
$jumpv_file=$jumpv.'&file='.$file;
$jumpv_pidnamefile=$jumpv_pidname.'&file='.$file;


//----
$submenu='module';
$title = '百度地图参数 ';

 
//-----------

require_once HERE_ROOT.'mod_common/tpl_header.php'; 

$sql = "SELECT bdp1,bdp2,bdtitle,bddesp from ".TABLE_LANG."  where lang='".LANG."' order by id limit 1";
//echo $sql;//exit;

$row22 = getrow($sql);
$bdp1=$row22['bdp1'];
$bdp2=$row22['bdp2'];
$bdtitle=$row22['bdtitle'];
$bddesp=$row22['bddesp'];
$jumpv_insert = $jumpv.'&act=update';

if($act=='update'){

	 $ss = "update ".TABLE_LANG." set bdtitle='$abc1',bddesp='$abc2',bdp1='$abc3',bdp2='$abc4' where lang='".LANG."' limit 1";
	 iquery($ss); 	

  jump($jumpv);

}
else{
?>


<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
    <tr>
      <td width="12%" class="tr">地图的标题：</td>
      <td width="88%"> <input name="bdtitle" type="text"  value="<?php echo $bdtitle;?>" size="50">
      </td>
    </tr>
	  <tr>
      <td   class="tr">地图的内容：</td>
      <td  > <input name="name" type="bddesp"  value="<?php echo $bddesp;?>" size="80">
      </td>
    </tr>
      <tr>
      <td   class="tr">地图的经度：</td>
      <td  > <input name="bdp1" type="text"  value="<?php echo $bdp1;?>" size="30">
      </td>
    </tr>
      <tr>
      <td   class="tr">地图的纬度：</td>
      <td  > <input name="bdp2" type="text"  value="<?php echo $bdp2;?>" size="30">
       <a href="http://www.demososo.com/baidumap.html" target="_blank">具体查看教程</a> 
      </td>
    </tr>
  
        
	  
	<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="提交"></td>
    </tr>
	  </table>
</form>
 


<?php
}

require_once HERE_ROOT.'mod_common/tpl_footer.php';

?>