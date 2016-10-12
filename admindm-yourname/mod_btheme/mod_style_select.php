<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
  if($act <> "pos") zb_insert($_POST);
  echo 'no use............';
 exit;

 
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
ifhave_lang(LANG);//TEST if have lang,if no ,then jump



$jumpv='mod_style_select.php?lang='.LANG;
$jumpv_p=$jumpv.'&pidname='.$pidname;
$jumpv_f=$jumpv.'&file='.$file;
$jumpv_pf=$jumpv_p.'&file='.$file;

$jumpvmb='mod_style.php?lang='.LANG;
//----
$submenu='';
$title = '模板设置';

if($act=='insert') {

    $ss = "update ".TABLE_LANG." set curstyle='$abc1' where pidname='".LANG."' limit 1";
    //,curstyledebug='$abc2'  -- no debug temp....
  // echo $ss;exit;
    iquery($ss);
 //alert("修改成功");
      jump($jumpvmb);


}

else{
//-----------

require_once HERE_ROOT.'mod_common/tpl_header.php'; 
?>

<div class="menu">
 <a href="mod_style.php?lang=<?php echo  LANG;?>">返回模板管理</a>


</div>
<h2 class="h2tit_biao">模板设置</h2>

 <form    action="<?php echo $jumpv;?>&act=insert" method="post">
  <table class="formtab">
 <tr>
      <td class="tr">请选择要切换的模板</td>
      <td> 
     
      <select name="curstyle">
        <?php sele_style($curstyle);?>
     </select> 
 
       </td>
    </tr>

 

<tr>
      <td></td>
      <td>
      <p class="cred">注意：一旦切换，就会影响前台的显示效果。</p>
      <input  class="mysubmitnew" type="submit" name="Submit" value="提交"></td>
    </tr>

</table>
</form>



<?php

require_once HERE_ROOT.'mod_common/tpl_footer.php';

}

?>


 