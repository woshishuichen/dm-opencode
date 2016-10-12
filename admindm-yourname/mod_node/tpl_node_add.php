<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

/************************************************/

$jumpv_insert= $jumpv_catid.'&act=insert';
if($act=='insert')
{
 ifhaspidname(TABLE_CATE,$abc2);
 
$pidname = 'node'.$bshou;

$arr_can = 'titlecss:##==#==author:##==#==authorcompany:##==#==sta_noaccess:##n==#==sta_tj:##y==#==sta_new:##y==#==stock:##10000==#==detpriceold:##0==#==detprice:##0==#==detlinktitle:##==#==detlinkurl:##==#==downloadurl:##==#==videourl:##==#==videotitle:##==#==linkmore:##==#==seocus1:##==#==seocus2:##==#==seocus3:##';

$ss = "insert into ".TABLE_NODE." (ppid,pid,pidname,pbh,title,lang,arr_can,dateday,dateedit,dateadd) values ('$catpid','$abc2','$pidname','$user2510','$abc1','".LANG."','$arr_can','$dateday','$dateall','$dateall')";
// echo $ss;exit;
iquery($ss);
alert("添加成功");
 $jump_back = $jumpv.'&catid='.$abc2;
 
jump($jump_back);
}
?>
<h2 class="h2tit_biao">添加</h2>
<form  onsubmit="javascript:return checkformself(this)" action="<?php echo $jumpv_insert; ?>" method="post">
  <table class="formtab">
    <tr>
      <td width="12%" class="tr">标题：</td>
      <td width="88%"> <input name="name" type="text" value="" size="70">
        </td>
    </tr>
  <tr>
      <td  class="tr">分类：</td>
      <td>
<?php  
 //------------
 $sqlcatlist = "SELECT * from ".TABLE_CATE." where  pid='$catpid' $andlangbh order by pos desc,id";
  //echo $sqlcatlist;
$rowcatlist= getall($sqlcatlist);
 
    select_cate($rowcatlist,'分类',$catid);//in list left menu php
   ?>
</td></tr>
 
<tr>
      <td></td>
      <td> <br />
      <input class="mysubmit" type="submit" name="Submit" value="添加">
      <br /><br /><?php echo $note_addafter;?>
      </td>
    </tr>
  </table>
</form>
<script>
function  checkformself(thisForm)
{if (thisForm.name.value==""){
		alert("请输入名称或标题");
		thisForm.name.focus();
		return (false);
        }
        if (thisForm.pcla.value==""){
		alert("请选择分类");
		thisForm.pcla.focus();
		return (false);
        }
}
    </script>

