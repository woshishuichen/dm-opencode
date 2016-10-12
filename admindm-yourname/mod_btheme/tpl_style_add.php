<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

 if($act=='insert')
 {
    if ($abc1 == '')   $abc1 = '请输入标题';  
      $pidname='style'.$bshou;
       $pidnamereg='regionindex'.$bshou;

$style_blockid='bsbannertop:##==#==bsbanner:##ndlist20160817_0917453508==#==bsbannermob:##ndlist20160812_0847531869==#==bsheadertop:##==#==bsheaderlogo:##1/20160812_042415_1315.png==#==bsheadertext:##==#==bsheadersearch:##==#==bsfootercols:##vblock20160922_0645245528==#==bsfooterlinks:##vblock20160922_0645553509==#==bsfooter:##regcommon20160527_1137076152==#==bsfooterlast:##regcommon20160822_1126481127==#==bsblock404:##vblock20160510_1000376089==#==sta_narrowscreen:##n==#==sta_header_fullwidth:##n==#==sta_menuright:##y==#==sta_menufix:##y';

   $ss = "insert into ".TABLE_STYLE." (pidname,pbh,pid,pidregion,title,lang,dateedit,style_blockid) values ('$pidname','$user2510','0','$pidnamereg','$abc1','".LANG."','$dateall','$style_blockid')";
      // echo $ss;exit;
      iquery($ss);


$sql = "SELECT cssdir from ".TABLE_LANG."  where   $noandlangbh   order by id limit 1";
$row = getrow($sql);
$cssdir = $row['cssdir'];
 $cssfile = STAROOT.'template/'.$cssdir .'/css/'.$pidname.'.css';
 fopen("$cssfile", "w");

//----ndconfig
 //$ndconfig =  EFFECTROOTADMIN.'ndconfig/'.$pidname.'.php';
 //$ndconfigcopy =  EFFECTROOTADMIN.'ndconfig/bhall.php';
// copy($ndconfigcopy,$ndconfig);



 
$ss = "insert into ".TABLE_REGION." (pid,pidname,pbh,pidstyle,name,type,lang,dateedit) values ('0','$pidnamereg','$user2510','$pidname','abc1','index','".LANG."','$dateall')";
     // echo $ss;exit;
      iquery($ss);



      alert("添加成功");
     // jump($jumpv.'&file=edit_normal&pidname='.$pidname);
      jump($jumpv);
    
 }
  
 
 
 
 
 if($act=='add')
 {
   $titleh2 = '添加模板';
 $jumpv_insert = $jumpv_f.'&act=insert';

?>
 
<h2 class="h2tit_biao">
<a href="<?php echo $jumpv?>"> 返回模板管理</a> | 
<?php echo $titleh2?></h2>
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post"  enctype="multipart/form-data">
  <table class="formtab">
    <tr>
      <td width="12%" class="tr">模板的标题：</td>
      <td width="88%"> <input name="name" type="text"  value="<?php echo $name;?>" size="50">
      <?php echo $xz_must?>
   </td>
   </tr> 

 

  <tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="<?php echo $titleh2?>"></td>
    </tr>
    </table>
</form>
 

<?php
}
?>

<script>
function checkhere(thisForm) {
   if (thisForm.name.value=="")
  {
    alert("请输入标题。");
    thisForm.name.focus();
    return (false);
  } 
}

</script>
