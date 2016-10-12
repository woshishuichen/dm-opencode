<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
 */
if (!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
if ($act == 'update') {

//$desp = zbdespadd2($abc3);  
//if($abc1==''){echo '对不起，标题或名称不能为空。'.$backlist;exit;}

  if($abc3<>$catid) $jump_insertimg= $jumpv=$jumpv . '&file=edit&act=edit&tid=' . $tid.'&catid=' . $abc3;
     else $jump_insertimg = $jumpv_edit . '&act=edit&tid=' . $tid;
     
     
   if($abc1=="" or strlen($abc1)<2) {alert('请输入标题！');  jump($jump_insertimg); }


    $desp = zbdesp_onlyinsert($_POST['despcontent']); //note: desp and addr not use variable abc1.
    $desptext = zbdesp_onlyinsert($_POST['editor1text']);
    //[editor1text] => 
    //  [despcontent] =>     
if ($abc1 == '')   $abc1 = '请输入标题';
   // $ss = "insert into " . TABLE_BLOCK . " (pbh,pid,pidname,lang,name,linkurl,kv,type,desptext,desp,dateedit) values ('$user2510','$pidname','$pidnamecur','" . LANG . "','$abc1','$abc2','$return_v','dhsub','$text1','$desp','$dateall')"; 
    $ss = "update " . TABLE_NODE . " set title='$abc1',despjj='$abc2',pid='$abc3',linkurl='$abc4',linktitle='$abc5',sta_title='$abc6',blockcntid='$abc7',blockid='$abc8',iconimg='$abc9',desptext='$desptext',desp='$desp',dateedit='$dateall' where id='$tid' $andlangbh limit 1";
    // echo $ss;exit;
    iquery($ss);
    //alert("修改成功");
  
    jump($jump_insertimg);
}



if ($act == 'edit') {
    $titleh2 = '修改';
    $sqlsub = "SELECT * from " . TABLE_NODE . "  where id='$tid' $andlangbh order by id limit 1";
    //echo $sqledit;exit;
    $rowsub = getrow($sqlsub);
    //pre($rowsub);
    //$desp=zbdesp_imgpath($row['desp']);
    $kv = $rowsub['kv']; $pid = $rowsub['pid']; 
    $kvsm = $rowsub['kvsm'];
    $kvsm2 = $rowsub['kvsm2'];

    $title = $rowsub['title']; 
    $sta_title = $rowsub['sta_title']; 
    //$cssname = $rowsub['cssname']; //cssname in main
     $pidnamehere = $rowsub['pidname'];
    $linkurl = $rowsub['linkurl'];   
     $linktitle = $rowsub['linktitle'];//linkurl and linktitle in node ,use for link to taobao or jd.com


    $blockid = $rowsub['blockid'];
    $blockcntid = $rowsub['blockcntid'];
    $iconimg = $rowsub['iconimg']; 
    
     $despjj = $rowsub['despjj'];
    $desp = zbdesp_imgpath($rowsub['desp']);
    $desptext = zbdesp_imgpath($rowsub['desptext']);
    


    $jump_insertimg = $jumpv_edit . '&act=update&tid=' . $tid;
   
 

?>

<h2 class="h2tit_biao"><?php echo $titleh2; ?>   <a href="<?php echo $jumpv_list?>">返回列表></a>

<div class="fr" style="margin-right:100px">
<span class="cp editmenuother cirbtn">编辑其他 &#8595; </span>
</div><!--end fr-->

</h2>


<div class="editmenuother_cnt">
<?php 
 require_once('plugin_blockdh_list_edit.php');
?>
</div><!--end editmenuother_cnt-->

<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_insertimg; ?>" method="post" enctype="multipart/form-data">
    <table class="formtab">
        <tr>
            <td width="12%" class="tr">标题：</td>
            <td width="88%"> 
                <input name="title" type="text"   value="<?php echo $title; ?>" size="90"><?php echo $xz_must; ?>  
            </td>
        </tr>

           <tr>
            <td width="12%" class="tr">副标题：</td>
            <td width="88%"> 
                <textarea cols="120" rows="3" name="despjj"><?php echo $despjj; ?></textarea> <?php echo $xz_maybe; ?>  
            </td>
        </tr>
         <tr>
      <td  class="tr">分类：</td>
      <td>
<?php  
 $sqlcatlist = "SELECT * from ".TABLE_CATE." where  pid='$catpid' $andlangbh order by pos desc,id";
  //echo $sqlcatlist;
$rowcatlist= getall($sqlcatlist);

    select_cate($rowcatlist,'分类',$pid);//in list left menu php
   ?>
</td></tr>
       
        <tr>
            <td width="12%" class="tr">链接：</td>
            <td width="88%">
            链接网址：<input name="linkurl" type="text"  value="<?php echo $linkurl; ?>" size="70"><?php echo $xz_maybe; ?>  
<?php echo $link_tip; ?>

链接字样：<input name="linktitle" type="text"  value="<?php echo $linktitle; ?>" size="20"><?php echo $xz_maybe; ?> <br /><br />
            </td>
        </tr>
 
        <tr>
            <td class="tr">内容格式：</td>
            <td>  
<div>显示标题：<select name="sta_title">
  <?php  select_from_arr($arr_yn,$sta_title,'');?>
                   </select> 
  </div>
  <div class="c5"></div>

           格式： <select name="singlemb">
            <?php  select_from_arr($arr_blockcnt,$blockcntid,'');?>
                   </select> 
                   <br /><span class="cred">(仅作用于部分效果模板)</span>
            </td>
        </tr>


 
     <tr>
            <td class="tr">标识：</td>
            <td> <input name="blockid" type="text" value="<?php echo $blockid ?>" size="40">
<?php echo $xz_maybe; ?>  
                <br />
<?php echo check_blockid($blockid); ?>
                
                  <p class="cred">提示，如果上面 <strong>标识</strong> 有内容，则这里编辑器的内容一般在前台不会显示。（具体情况取决于模板文件的写法。）</p>

                  
            </td>
        </tr>

            <tr>
            <td width="12%" class="tr">图标：</td>
            <td width="88%">  <input name="iconimg" type="text"  value="<?php echo $iconimg; ?>" size="70"> 
<?php echo $xz_maybe; ?> 

<a href="http://www.demososo.com/fontawesome.html" target="_blank">fontawesome图标使用</a>

<?php if($iconimg<>'') echo '<p>'.web_despdecode($iconimg).'</p>'; ?> 


             </td>
        </tr>


  <tr>
    <td class="tr">内容： </td>
  <td>               
   
    <p>
             
  <!--
    <a href="../mod_imgfj/mod_imgfj.php?pid=<?php //echo $pidnamehere;?>&lang=<?php //echo LANG;?>" target="_blank">私有编辑器附件管理(<?php //echo num_imgfj($pidnamehere);?>)</a>
|
-->
 <?php echo $text_imgfjlink_bjq;?>
   </p>

<?php require_once('../plugin/editor_textarea.php'); //textarea is in this file ?>

            </td> 
        </tr>


  <tr>
            <td></td>
            <td>
                <input  class="mysubmit" type="submit" name="Submit" value="<?php echo $titleh2; ?>"></td>
        </tr>
    </table>
</form>

<?php } ?>


<script>
    function checkhere(thisForm) {
        if (thisForm.title.value == "")
        {
            alert("请输入标题。");
            thisForm.title.focus();
            return (false);
        }

          if (thisForm.pcla.value==""){
    alert("请选择分类");
    thisForm.pcla.focus();
    return (false);
        }

        // return;

    }


</script>
