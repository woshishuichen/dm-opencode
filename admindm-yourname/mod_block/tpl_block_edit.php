<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
 */
if (!defined('IN_DEMOSOSO')) {
    exit('this is wrong page,please back to homepage');
}
if ($act == 'update') {

     if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}


    // pre($_POST);
   //  exit;
//if($abc1==''){echo '对不起，标题或名称不能为空。'.$backlist;exit;}
   $jump_insertimg = $jumpv . '&file=edit&act=edit&tid=' . $tid;
   if($abc1=="") {alert('请输入标题！');  jump($jump_insertimg); }

       $sql = "SELECT kv from ".TABLE_BLOCK." where  type='vblock' and id='$tid' $andlangbh   limit 1";
                           $row = getrow($sql);
                           $imgsqlname =$row['kv'];  
                       
     $delimg = zbdesp_onlyinsert($_POST['delimg']);                            
    if($delimg=='y'){
        if($imgsqlname<>'') p2030_delimg($imgsqlname,'y','y');
        $kv_v = ",kv = ''";
    }
    else{
         $imgname = $_FILES["addr"]["name"];
       $imgsize = $_FILES["addr"]["size"];
       if (!empty($imgname)) {
           //make thumb
          //  $sql = "SELECT sm_w,sm_h from ".TABLE_BLOCK." where pidname='$pidname'  $andlangbh   limit 1";
           //                $row = getrow($sql);
           //                $up_w_s =$row['sm_w'];$up_h_s =$row['sm_h'];   
                        //  echo $up_w_s.'-'.$up_h_s;
          // if( $up_w_s==0 ||  $up_h_s == 0) $up_small = 'n';
           //else $up_small = 'y';  
            
            $up_small = 'n';           
           $imgtype = gl_imgtype($imgname);
          // $up_small = 'y';
           $up_delbig = 'n';//not del,just override
           $up_water = 'n';           
           $i = '';
           require_once('../plugin/upload_img.php'); //need get the return value,then upimg part turn to easy.
           $kv_v = ",kv = '$return_v'";
       }
       else  $kv_v = "";
    
    }

 
//$desp = zbdespadd2($abc3);	

    $desp = zbdesp_onlyinsert($_POST['despcontent']); //note: desp and addr not use variable abc1.
    $desptext = zbdesp_onlyinsert($_POST['editor1text']);
    //[editor1text] => 
    //  [despcontent] =>     
 
   $ss = "update " . TABLE_BLOCK . " set name='$abc1',cssname='$abc2',blockcntid='$abc3',linkurl='$abc4',more='$abc5' $kv_v,desptext='$desptext',desp='$desp',dateedit='$dateall' where type='vblock' and id='$tid' $andlangbh limit 1";
    //echo $ss;exit;
    iquery($ss);
    //alert("修改成功");
    
    
     $jump_insertimg = $jumpv . '&file=edit&act=edit&tid=' . $tid.'&stylebh=' . $abc3;

    jump($jump_insertimg);
}



if ($act == 'edit') {
    $titleh2 = '修改';
    $sqlsub = "SELECT * from " . TABLE_BLOCK . "  where  type='vblock' and id='$tid' $andlangbh order by id limit 1";
    if(getnum($sqlsub)>0){
    //echo $sqledit;exit;
    $rowsub = getrow($sqlsub);
    //$desp=zbdesp_imgpath($row['desp']);
    $kv = $rowsub['kv'];
    $name = $rowsub['name']; 
    // $sta_title = $rowsub['sta_name'];  
      $cssname = $rowsub['cssname']; 
    $pidnamehere = $rowsub['pidname'];
    $linkurl = $rowsub['linkurl'];$more = $rowsub['more'];
     $blockcntid = $rowsub['blockcntid']; //is effect

    $jump_insertimg = $jumpv . '&file=edit&act=update&tid=' . $tid;
    $imgsmall2 = p2030_imgyt($kv, 'y', 'n');
    $kvsm = zbdesp_imgpath($rowsub['kvsm']);

    $effect = $rowsub['effect'];
    

//$despjj = $rowsub['despjj'];
    $desp = zbdesp_imgpath($rowsub['desp']);
    $desptext = zbdesp_imgpath($rowsub['desptext']);
    



?>
<h2 class="h2tit_biao"><?php echo $titleh2; ?> </h2>
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_insertimg; ?>" method="post" enctype="multipart/form-data">
    <table class="formtab">
        <tr>
            <td width="12%" class="tr">标题：</td>
            <td width="88%"> 
                <input name="title" type="text"   value="<?php echo $name; ?>" size="90"><?php echo $xz_must; ?>  
            </td>
        </tr>

  
      

         <tr>
            <td width="12%" class="tr">样式名称：</td>
            <td width="88%"> 
                <input name="cssname" type="text"  class="inputcss" value="<?php echo $cssname; ?>" size="60"><?php echo $xz_maybe; ?>
                <p class="cgray">参考： col2_37,col2_73,col2_46,col2_64,moresm,moresm2,moresmw,moresmw2,morenocir,onlytext_p </p>  
            </td>
        </tr>
    <tr>
            <td class="tr">内容格式：</td>
            <td>  
          
  <select name="singlemb">
                  <?php 
                  $arr_newblock = array_merge($arr_blockcnt,$arr_singleblock); 
                  select_from_arr($arr_newblock,$blockcntid,'');?>
                   </select> 
            </td>
        </tr>



        <tr>
            <td width="12%" class="tr">更多链接：</td>
            <td width="88%"> 
链接的网址：<input name="linkurl" type="text"  value="<?php echo $linkurl; ?>" size="70"><?php echo $xz_maybe; ?>  

<div class="c5"> </div>

链接的字样：<input name="more" type="text"  value="<?php echo $more; ?>" size="20"><?php echo $xz_maybe; ?> <br /><br />
            </td>
        </tr>
 
     
        
        <tr>
            <td width="12%" class="tr">上传图片：</td>
            <td width="88%"> <input name="addr" type="file" id="addr" size="50" /><?php echo $xz_maybe;?>  
<?php
echo '<br /><span class="cred">' . $format_t . '</span><br />';
// echo gl_showsmallimg($fo_bef,$imgsmall,'y');
echo $imgsmall2;
?>
             
          <?php  if($kv<>'') 
			  {
              ?>
				  <span class="cred"> <br />是否要删除图片？ </span>
				  
				  <select name="delimg">
					<?php select_from_arr($arr_yn,'n','');?>
					</select>
          <?php } 
          else{ //use for : Undefined index: delimg 
              ?>          
				 <select name="delimg" style="display:none">
					  <option value=""></option>
				</select>
          <?php
          }?>
                   
            </td>
        </tr>


        

        <tr>
            <td class="tr">内容：


            </td>
            <td> 
              
                <p>
                
  
    <!--
    <a href="../mod_imgfj/mod_imgfj.php?pid=<?php //echo $pidnamehere;?>&lang=<?php //echo LANG;?>" target="_blank">私有编辑器附件管理(<?php //echo num_imgfj($pidnamehere);?>)</a>
|
-->

 <a href="../mod_imgfj/mod_imgfj.php?pid=common&lang=<?php echo LANG; ?>" target="_blank">公共编辑器附件管理</a>

                </p>



<?php require_once('../plugin/editor_textarea.php'); //textarea is in this file ?>

            </td> 
        </tr>






        <tr>
            <td></td>
            <td>
                <input  class="mysubmitnew" type="submit" name="Submit" value="<?php echo $titleh2; ?>"></td>
        </tr>
    </table>

      <?php echo $inputmust;?>

</form>

<?php 

} 
else{echo '区块不存在 ';}

}

?>


<script>
    function checkhere(thisForm) {
        if (thisForm.title.value == "")
        {
            alert("请输入标题。");
            thisForm.title.focus();
            return (false);
        }

        // return;

    }


</script>
