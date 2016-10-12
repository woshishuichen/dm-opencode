<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
 */
if (!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
if ($act == 'insert') {
    // pre($_POST);
    //   exit;
    $pidnamecur = 'vblock' . $bshou;
    /*     * ***************** */
//$desp = zbdespadd2($abc3);	
 
    if ($abc1 == '')   $abc1 = '请输入标题';
//group_i20160101_0932453193 change vblock
    $ss = "insert into " . TABLE_BLOCK . " (pbh,pid,pidname,lang,name,type,blockcntid,sta_visible,dateedit) values ('$user2510','vblock','$pidnamecur','" . LANG . "','$abc1','vblock','$abc2','y','$dateall')"; 
    ////no pos,because pos is auto,is to next and prev page
     // echo $ss;exit;
    iquery($ss);
    alert("添加成功");
     jump($jumpv);
}



if ($act == 'add') {
    $titleh2 = '添加';
    $jump_insertimg = $jumpv . '&file=add&act=insert';
    $imgsmall2 = '';    $imgsqlname = '';    $name = '';    $linkurl = '';    $desp = '';    $desptext = '';    $kvsm = ''; 
       $bgcolor = '';
    $maxline = 0;    $effect = '';
}


?>
<h2 class="h2tit_biao"><?php echo $titleh2; ?></h2>
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_insertimg; ?>" method="post" enctype="multipart/form-data">
    <table class="formtab">
        <tr>
            <td width="12%" class="tr">标题：</td>
            <td width="88%"> 
                <input name="title" type="text"   value="<?php echo $name; ?>" size="90">  <?php echo $xz_must; ?> 
                <br />添加后，再进行详细修改。  
            </td>
        </tr>
        

   <tr>
            <td class="tr">模板：</td>
            <td>  <select name="singlemb">
            <!--   <option value="">请选择</option> -->
                  <?php 
                
$arr_newblock = array_merge($arr_blockcnt,$arr_singleblock);  
                  select_from_arr($arr_newblock,'','');?>
                   </select> 
            </td>
        </tr>

 


        <tr>
            <td></td>
            <td>
                <input  class="mysubmit" type="submit" name="Submit" value="<?php echo $titleh2; ?>"></td>
        </tr>
    </table>
</form>




<script>
    function checkhere(thisForm) {
        if (thisForm.title.value == "")
        {
            alert("请输入标题。");
            thisForm.title.focus();
            return (false);
        }

 if (thisForm.singlemb.value == "")
        {
            alert("请选择模板。");
            thisForm.singlemb.focus();
            return (false);
        }


        // return;

    }


</script>
