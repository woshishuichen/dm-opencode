<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}

?>


<?php 
 

if($act == "update"){

 
$ss = "update ".TABLE_PAGE." set album='$abc1',albumcssname='$abc2',albumposi='$abc3'  where id='$tid' $andlangbh limit 1";
  //echo $ss;exit;
iquery($ss); 

 jump($jumpv_back);
}



if($act=="edit"){ 

$albumposi =  $row['albumposi'];
$albumcssname =  $row['albumcssname'];

    ?>
 
<h2 class="h2tit_biao">修改菜单参数</h2>
<form  onsubmit="javascript:return menupageadd(this)" action="<?php  echo $jumpv_file.'&act=update';?>" method="post" enctype="multipart/form-data">
<table class="formtab">

  <tr>
    <td width="12%" class="tr">菜单名称：</td>
    <td width="88%">  <?php echo $row['name']?></td>
  </tr>
  
 


 <tr>
      <td class="tr">相册模板：</td>
      <td><select name="selxeal2abm">
    <?php select_from_arr($arr_album,$album,'');?>
     </select>
   <br />（后面表示所在文件的位置）
   
        </td>
    </tr>
  
 
      <tr>
      <td width="22%" class="tr">样式名称：</td>
      <td width="77%"> <input name="albumcssname" class="inputcss"  type="text" value="<?php echo $albumcssname?>" size="60"><?php echo $xz_maybe; ?> 
          </td>
    </tr>
   <tr>
      <td width="22%" class="tr">相册位置：</td>
      <td width="77%">
位于内容的下面：
<select name="albumposi">
    <?php select_from_arr($arr_yn,$albumposi,'');?>
     </select>
<br />
      <span class="cgray">(默认相册位于内容的下面，否则位于内容的上面。)
 
       </td>
    </tr>

 
  <tr>
    <td></td>
    <td> <input class="mysubmit" type="submit" name="Submit" value="提交">
 
  </td>
  </tr>
 </table>


</form>
    <?php
 
}
  
 ?> 

 