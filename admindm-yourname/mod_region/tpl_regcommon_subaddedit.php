<div class="menu">
<a href="<?php echo $jumpvp?>&file=list&act=list">返回列表</a>
</div>
<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

if($act=='insert')
 {
  if($abc1=="") {$abc1='pls input title'; }

  $pidnamesub='block'.$bshou; 
    $despcontent = zbdesp_onlyinsert($_POST['despcontent']);


   $ss = "insert into ".TABLE_REGION." (pid,pidname,pbh,name,sta_name,cssname,blockid,desptext,desp,lang,dateedit) values ('$pidname','$pidnamesub','$user2510','$abc1','$abc2','$abc3','$abc4','$abc5','$despcontent','".LANG."','$dateall')";
       //echo $ss;exit;
      iquery($ss);
      alert('添加成功！');
      //jump($jumpvf.'&act=edit&pidname='.$pidname);
      jump($jumpvp.'&act=list&file=list');
      
 
 }
 if($act=='update')
 {
    if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}

    if($abc1=="") {$abc1='pls input title'; }


  $despcontent = zbdesp_onlyinsert($_POST['despcontent']);


       $ss = "update ".TABLE_REGION." set name='$abc1',sta_name='$abc2',cssname='$abc3',blockid='$abc4',desptext='$abc5',desp='$despcontent' where id='$tid' $andlangbh limit 1";
      iquery($ss);  
     
       jump($jumpvpf.'&act=edit&tid='.$tid);
    
 }
 
 
 if($act=='add')
 { $titleh2= '添加';
 
 $jumpv_insert = $jumpvpf.'&act=insert';

 $name=$cssname=$blockid=$desp=$desptext='';
 $sta_width_cnt =$sta_name = 'n';
 
 }
 
 if($act=='edit')
 {
 $titleh2= '修改';
  $jumpv_insert =  $jumpvpf.'&act=update&tid='.$tid;
   $sta_sub = 'y';
 
$sql = "SELECT * from ".TABLE_REGION."  where id='$tid' $andlangbh order by id limit 1";
$row222 = getrow($sql);

//$desp=zbdesp_imgpath($row['desp']);
$name= $row222['name']; $cssname= $row222['cssname']; 
$type= $row222['type']; $blockid= $row222['blockid'];  
$sta_width_cnt= $row222['sta_width_cnt'];
$sta_name= $row222['sta_name'];
 
 $desp=zbdesp_imgpath($row222['desp']);
$desptext=zbdesp_imgpath($row222['desptext']);


}

 if($act=='add' or $act=='edit')
 {
?>
<h2 class="h2tit_biao"><?php echo $titleh2;?></h2>
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert?>" method="post">
  <table class="formtab">
    <tr>
      <td width="22%" class="tr">标题：</td>
      <td width="77%"> <input name="name" type="text" value="<?php echo $name?>" size="60">
       </td>
    </tr>


 <tr>
      <td width="22%" class="tr">前台是否显示标题：</td>
      <td width="77%">
          <select name="sta_name">
         <?php select_from_arr($arr_yn,$sta_name,'plsno');?>
     </select>
       </td>
    </tr>


 <tr>
      <td width="22%" class="tr">css名称：</td>
      <td width="77%">
           <input name="cssname" type="text" value="<?php echo $cssname?>" class="inputcss" size="60">
            
<br />参考：<span class="cgray">绝对层:poa | 相对层:por | 左对齐:fl | 右对齐:fr  | 
清浮动:c  | onlytext_p ,  bgboxcontent 
<br />
更多请参考 当前模板 用到的css文件<br />
 
</span>

       </td>
    </tr>
 

  
   <tr>
      <td class="tr">内容：


      </td>
      <td> 
标识：<input name="blockid" type="text" value="<?php echo $blockid?>" size="40">
<?php echo $xz_maybe;?>  
 
<br />
<?php echo check_blockid($blockid);?>



 
  <p class="cred">提示，如果上面 <strong>标识</strong> 有内容，则这里编辑器的内容在前台不会显示。</p>

  <?php if($blockid<>'')
        echo '<p class="f14bgred">因为有标识，编辑器内容不会在前台显示</p>';
  ?>

    <p>
  <!--
    <a href="../mod_imgfj/mod_imgfj.php?pid=<?php //echo $pidnamesub;?>&lang=<?php //echo LANG;?>" target="_blank">私有编辑器附件管理(<?php //echo num_imgfj($pidnamesub);?>)</a>
|
-->

<?php echo $text_imgfjlink_bjq;?>
     </p>
 
 <?php require_once('../plugin/editor_textarea.php');//textarea is in this file?>
  
</td> 
    </tr>



 
<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="<?php echo $titleh2;?>"></td>
    </tr>
  </table>

    <?php echo $inputmust;?>

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
   

   // return;

}
 

</script>
