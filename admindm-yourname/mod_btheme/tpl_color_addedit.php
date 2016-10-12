<?php

if($act=='insert'){

  if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}
  if(@$_POST['title']=='') {
    alert('请输入标题。');
    jump($jumpvf.'&act=add');
  }

  $bscnt22 = '';
//pre($_POST);
  if(count($_POST)>1){
          foreach ($_POST as  $k=>$v) {
            if(strtolower($k)=='submit') break;
            $bscnt22 .= $k.':@@'.htmlentities(trim($v)).'==@==';
             
          }
      }
       $bscnt22 = substr($bscnt22,0,-5);

   $ss = "insert into ".TABLE_BLOCK." (type,desp) values ('stylecolor','$bscnt22')";
   //echo $ss;exit;    
   iquery($ss); 
  jump($jumpv);

}
 
 if($act=='update'){

   if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}

 
  $bscnt22 = '';
  if(count($_POST)>1){
          foreach ($_POST as  $k=>$v) {
            if(strtolower($k)=='submit') break;
            $bscnt22 .= $k.':@@'.htmlentities(trim($v)).'==@==';
             
          }
      }
       $bscnt22 = substr($bscnt22,0,-5);
  
  $ss = "update ".TABLE_BLOCK." set  desp='$bscnt22' where type='stylecolor' and id=$tid limit 1";

   //echo $ss;exit;    
   iquery($ss);   
  
   jump($jumpvf.'&tid='.$tid.'&act=edit');


}


 
 
 if($act=='add')
 {
   $titleh2 = '添加配色';
 $jumpv_insert = $jumpvf.'&act=insert';

  $title=$color='';
      $style_normal=$style_hf=$style_menu=$style_boxtitle='';
      


}

 if($act=='edit')
 {
   $titleh2 = '修改配色';
 $jumpv_insert = $jumpvf.'&act=update&tid='.$tid;


  $sql = "SELECT * from ".TABLE_BLOCK."  where type='stylecolor' and id=$tid  order by id limit 1";
$row = getrow($sql);
 $desp = $row['desp'];

   $bscntarr = explode('==@==',$desp); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':@@')){

               $bsvaluearr = explode(':@@',$bsvalue);
               //pre($bsvaluearr);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
      else{
      $title=$color='';
      $style_normal=$style_hf=$style_menu=$style_boxtitle='';
      
      }





}


 if($act=='add' or $act=='edit')
 {


?>
 
<h2 class="h2tit_biao">
<a href="<?php echo $jumpv?>"> 返回配色管理</a> | 
<?php echo $titleh2?></h2>
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post"  enctype="multipart/form-data">
  <table class="formtab">
   <tr>
      <td width="12%" class="tr">标题：</td>
      <td width="88%">
        
      <input name="title" type="text"  value="<?php echo $title;?>" size="50" />


   </td>
   </tr>
    <tr>
      <td width="12%" class="tr">颜色：</td>
      <td width="88%">
       <input name="color" type="text"  value="<?php echo $color;?>" size="50" />
       (比如： #197de1 )

   </td>
   </tr>

    <tr>
      <td width="12%" class="tr">常用样式：</td>
      <td width="88%">
       <textarea name="style_normal" rows="5"  cols="150"><?php echo $style_normal;?></textarea>
      
   </td>
   </tr> 
      <tr>
      <td width="12%" class="tr">页头和页尾样式：</td>
      <td width="88%">
       <textarea name="style_hf" rows="5"  cols="150"><?php echo $style_hf;?></textarea>
      
   </td>
   </tr> 
      <tr>
      <td width="12%" class="tr">菜单样式：</td>
      <td width="88%">
       <textarea name="style_menu" rows="5"  cols="150"><?php echo $style_menu;?></textarea>
       
   </td>
   </tr> 
      <tr>
      <td width="12%" class="tr">传统盒子：</td>
      <td width="88%">
       <textarea name="style_boxtitle" rows="5"  cols="150"><?php echo $style_boxtitle;?></textarea>
      
   </td>
   </tr> 

 

  <tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="<?php echo $titleh2?>"></td>
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
}

</script>
