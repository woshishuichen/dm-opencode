<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
 if($act <> "pos") zb_insert($_POST);
 
 if($pidname<>'') {ifhaspidname(TABLE_BLOCK,$pidname);}
 
 //no use
 exit;
 
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

$jumpv='mod_sqcode.php?lang='.LANG;
$jumpv_pidname=$jumpv.'&pidname='.$pidname;
$jumpv_file=$jumpv.'&file='.$file;
$jumpv_pidnamefile=$jumpv_pidname.'&file='.$file;


//----
$submenu='module';
$title = '系统授权代码 ';

 
//-----------

require_once HERE_ROOT.'mod_common/tpl_header.php'; 

$sql = "SELECT sqcode from ".TABLE_USER."  where id='77' order by id limit 1";
$row22 = getrow($sql);
$sqcode=$row22['sqcode'];
 
$jumpv_insert = $jumpv.'&act=update';

if($act=='update'){

	 $ss = "update ".TABLE_USER." set sqcode='$abc1'  where id='77' limit 1";
	 iquery($ss); 	

  jump($jumpv);

}
else{
?>


<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
    <tr>
      <td width="12%" class="tr">系统授权代码：</td>
      <td width="88%">
       代码由官方提供给您。<br />
       <input name="sqcode" type="text"  value="<?php echo $sqcode;?>" size="50">
      <a href="http://www.demososo.com/sq.html" target="_blank">官网授权查询</a> 
    

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