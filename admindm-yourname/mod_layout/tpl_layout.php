<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
//-------------
 if($act=="update"){
     if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}
 
  		 $ss = "update ".TABLE_LAYOUT." set banner='$abc1',sta_bread_posi='$abc2',bread='$abc3',sta_sidebar='$abc4',sidebartop='$abc5',sidebar='$abc6',sidebarbot='$abc7',contentheader='$abc8',contenttop='$abc9',content='$abc10',contentbot='$abc11',pagetop='$abc12',pagebot='$abc13',dateedit='$dateall' where id='$tid' $andlangbh limit 1";
		     //echo $ss;exit;
			 iquery($ss);   	
			 jump($jumpv);
	 	
		
 }
 
 


else{ 
 
 $jumpv_update_buju = $jumpv.'&act=update&tid='.$tid;
  $jumpv_update_buju_bs = $jumpv.'&act=updatebs&tid='.$tid;
 


$bscntarr = explode('==#==',$bscnt);  
 if(count($bscntarr)>1){
    foreach ($bscntarr as   $bsvalue) {
       $bsvaluearr = explode(':##',$bsvalue);
       $bsccc = $bsvaluearr[0];
       $$bsccc=$bsvaluearr[1];
    }
}
else{
$bsbanner=$bsbannermob=$bsindex=$bsindexmob=$bsmenu=$bsheadertop=$bsheader=$bsfooterbegin=$bsfooter=$bsfooterlast=$bsfooternavmob='';
}

 ?>


<form   action="<?php  echo $jumpv_update_buju;?>"   method="post" enctype="multipart/form-data">
<table class="formtab">


 <tr>
    <td width="15%" class="tr"><b>banner标识：</b></td>
    <td width="80%" >  <input  name="banner" type="text" value="<?php echo $banner?>" size="40">
     <?php echo $xz_maybe;
   
    echo check_blockid($banner);?></td>

  </tr>

  <tr>
    <td  class="tr">面包屑：</td>
    <td  style="background:#DBF2FF">

    面包屑的位置：  
<select name="sta_bread">
	  <?php select_from_arr($arr_bread,$sta_bread,'pls');?>
     </select>
       
     <div style="margin:6px 0;border-bottom:1px solid #999"></div>
自定义面包屑
<br /><textarea rows="6" cols="110" name="bcb_text">
<?php echo $row['bread'];?>
</textarea>
     <br /> <?php echo $xz_maybe;?>
 

      </td>
  </tr>
  
   <tr> 
    <td   class="tr">设置侧边栏菜单：</td>
    <td   style="background:#fff">
 
<select name="sta_sidebar">
    <?php select_from_arr($arr_column,$sta_sidebar,'pls');?>
     </select>  
 
      </td>
  </tr>



 <tr> 
    <td   class="tr">侧边栏标识：</td>
    <td   style="background:#fff">
 
	 
侧边栏标识--上面：
 <input name="sidebartop" type="text" value="<?php echo $row['sidebartop']?>" size="55">
      <?php echo $xz_maybe;?> <?php echo check_blockid($row['sidebartop']);?>
<div class="c5"></div>
   
默认侧边栏菜单：&nbsp;&nbsp;&nbsp;
<input name="sidebar" type="text" value="<?php echo $row['sidebar']?>" size="55">
      <?php echo $xz_maybe;?>(默认有侧边栏,若要隐藏请填：hide) <?php echo check_blockid($row['sidebar']);?>
<div class="c5"></div>

侧边栏标识--下面： <input name="sidebarbot" type="text" value="<?php echo $row['sidebarbot']?>" size="55">
      <?php echo $xz_maybe;?> <?php echo check_blockid($row['sidebarbot']);?>
 


      </td>
  </tr>

<tr>
    <td   class="tr">内容区标识：</td>
    <td   style="background:#E3DEBE">

  内容标题的标识：&nbsp;&nbsp;<input name="contentheader" type="text"  value="<?php echo $row['contentheader'];?>" size="55"> <?php echo $xz_maybe;?>
  <br /> (默认是文字，如果隐藏，用 hide ， 如果是图片，请用名称附件。)

<br /><br />
   
 内容区标识--上面：<input name="contenttop" type="text"  value="<?php echo $row['contenttop'];?>" size="55"> <?php echo $xz_maybe;?> &nbsp; &nbsp;  <?php echo check_blockid($row['contenttop']);?>

<div class="c5"></div>
默认内容： 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input name="rbight3" type="text"  value="<?php echo $row['content'];?>" size="55"> <?php echo $xz_maybe;?>
 (默认为列表和详细内容。 若要隐藏请填：hide) <?php echo check_blockid($row['content']);?>
<div class="c5"></div>
 内容区标识--下面：<input name="contentbot" type="text"  value="<?php echo $row['contentbot'];?>" size="55"> <?php echo $xz_maybe;?> <?php echo check_blockid($row['contentbot']);?>

      </td>
  </tr>
  
  
   <tr>
    <td   class="tr">其他标识：</td>
    <td   style="background:#DBF2FF">
页面上部： <input name="pagetop" type="text"  value="<?php echo $row['pagetop'];?>" size="55"> <?php echo $xz_maybe;?> &nbsp;
<?php echo check_blockid($row['pagetop']);?>

<div class="c5"></div>
页面底部： <input name="pagebot" type="text"  value="<?php echo $row['pagebot'];?>" size="55"> <?php echo $xz_maybe;?> &nbsp;
 <?php echo check_blockid($row['pagebot']);?>

  </td>
  </tr>

  <tr>
    <td></td>
    <td> <input class="mysubmitnew" type="submit" name="Submit" value="提交"></td>
  </tr>
 </table>

   <?php echo $inputmust;?>

</form>
 

<?php } 
?>