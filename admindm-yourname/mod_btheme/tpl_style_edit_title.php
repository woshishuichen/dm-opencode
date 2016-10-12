<?php
if($act=='update'){

 if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}


 $jump_back = $jumpv_pf.'&act=edit';

 
    $cssdir = STAROOT.'template/'.$abc2;
      if(!is_dir($cssdir)) {alert('出错，模板目录 '.$abc2.'不存在！');  jump($jump_back); }

    $htmldir = WEB_ROOT.'component/'.$abc3;
      if(!is_dir($htmldir)) {alert('出错，html目录 '.$abc3.'不存在！');  jump($jump_back); }





   $sql = "SELECT kv from ".TABLE_STYLE." where pidname='$pidname'  $andlangbh   limit 1";
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
           $imgtype = gl_imgtype($imgname);
           $up_small = 'n';
           $up_delbig = 'n';
           $up_water = 'n';           
           $i = '';
           require_once('../plugin/upload_img.php'); //need get the return value,then upimg part turn to easy.
           $kv_v = ",kv = '$return_v'";
       }
       else  $kv_v = "";
    
    }




 
  $ss = "update ".TABLE_STYLE." set title='$abc1',cssdir='$abc2',htmldir='$abc3'$kv_v where pidname='$pidname' $andlangbh limit 1";
  //echo $ss;exit;    
   iquery($ss);  

     $ss = "update ".TABLE_REGION." set name='$abc1'  where pidstyle='$pidname' $andlangbh limit 1";
  //echo $ss;exit;    
   iquery($ss);   
  

  
   jump($jump_back);


}
else{
  $sql = "SELECT * from ".TABLE_STYLE."  where  pidname='$pidname' $andlangbh   order by id limit 1";
$row = getrow($sql);
$title=$row['title'];
$kv=$row['kv'];
 //$imgsmall2 = p2030_imgyt($kv, 'y', 'n');
$imgsmall2 = '<img src='.get_img($kv, '', '').' alt=""  height="200" />';

$jumpv_insert = $jumpv_pf.'&act=update';

?>


<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post" enctype="multipart/form-data">
  <table class="formtab">

      <tr>
      <td   class="tr">模板标题：</td>
      <td > <input name="title" type="text"  value="<?php echo $title;?>" size="50" /> </td>
    </tr>

   <tr>
      <td class="tr">模板目录：</td>
      <td> 
      css目录：
      <input  type="text" name="cssdir" value="<?php echo $row['cssdir'];?>" size="25"><?php echo $xz_must;?>

      <span class="cgray">(默认为default)</span>
      <br />
        html目录：
      <input  type="text" name="htmldir" value="<?php echo $row['htmldir'];?>" size="25"><?php echo $xz_must;?>

      <span class="cgray">(默认为html_default)</span>

        </td>
    </tr>
 
  

    <tr>
            <td width="12%" class="tr">图片：</td>
            <td width="88%"> <input name="addr" type="file" id="addr" size="50" /><?php echo $xz_maybe;?>  
<?php
echo '<br /><span class="cred">' . $format_t . '</span><br />';
// echo gl_showsmallimg($fo_bef,$imgsmall,'y');
   if($kv<>'')    echo $imgsmall2;
?>
             
    <?php  if($kv<>'')    {
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
              
              <br />  <br />  
</td></tr>


    
  <tr>
      <td></td>
      <td>
      <input  class="mysubmitnew" type="submit" name="Submit" value="提交" /></td>
    </tr>
    </table>
<?php echo $inputmust;?>

</form>
<?php }
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
