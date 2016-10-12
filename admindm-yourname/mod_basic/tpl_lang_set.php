<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<?php
if($act=="update"){	 
$jump_back = $jumpv_file.'&act=edit&tid='.$tid;
      if($abc1=="" or strlen($abc1)<1) {alert('请输入网站名称');  jump($jump_back); }
	  
    //   $cssdir = STAROOT.'template/'.$abc2;
    //   if(!is_dir($cssdir)) {alert('出错，模板目录 '.$abc2.'不存在！');  jump($jump_back); }

 	  // $htmldir = WEB_ROOT.'component/'.$abc3;
    //   if(!is_dir($htmldir)) {alert('出错，html目录 '.$abc3.'不存在！');  jump($jump_back); }
 

     $ss = "update ".TABLE_LANG." set sitename='$abc1',water='$abc2',cdn='$abc3',sta_cdn='$abc4',editor='$abc5',ico='$abc6',sta_frontedit='$abc7',cssversion='$abc8' where id='$tid' limit 1";
	// echo $ss;exit;
iquery($ss);
 //alert("修改成功");
      jump($jump_back);                      
}
   
 
if($act=='edit') {	
 $sql = "SELECT * from ".TABLE_LANG."  where  id='$tid' and pbh='".USERBH."'    order by id limit 1"; 
$row = getrow($sql); 
$sta_editor = $row['editor'];$sta_cdn = $row['sta_cdn'];
$sta_frontedit = $row['sta_frontedit'];


$jump_update=$jumpv_file.'&act=update&tid='.$tid;
		 
		 
?>

<h2 class="h2tit_biao">网站设置  
</h2>
 <?php echo $text_imgfjlink; 
       ?> 
 
 <form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jump_update;?>" method="post">
  <table class="formtab">
  

 <tr>
      <td class="tr">网站名称：</td>
      <td>  <input  type="text" name="sitename" value="<?php echo $row['sitename'];?>" size="55"><?php echo $xz_must;?>
        </td>
    </tr>



	<tr>
      <td class="tr"> 水印图片：</td>
      <td>  <input  type="text" name="water" value="<?php echo $row['water'];?>" size="55"><?php echo $xz_maybe;?>
	       <br /> (请输入名称附件)
		   <br />
		   <?php
		   $biaoshi = $row['water'];

		  echo  check_blockid($biaoshi);
		  
			?>
		   
        </td>
    </tr>
	 


  <tr>
      <td class="tr">前台图片使用七牛CDN加速：</td>
      <td> 
   七牛域名：<input  type="text" name="cdn" value="<?php echo $row['cdn'];?>" size="55"><?php echo $xz_maybe;?>
          <br />
          比如：  7xoo1b.com1.z0.glb.clouddn.com
          <div style="border-top: 1px solid #ccc;padding:10px 0">
          开启CDN ：<select name="sta_cdn">
    <?php select_from_arr($arr_yn,$sta_cdn,'');?>
     </select>
          <br /><span class="cgray">当后台上传新的图片时，要先关闭CDN，不然前台看不到效果。等新图片同步到七牛后，再开启。</span>
          </div>
          <a href="http://www.demososo.com/dmcdn.html" target="_blank">具体请看教程></a>
 </td>
    </tr>
    
  <tr>
      <td class="tr">请选择编辑器：</td>
      <td> 
      <select name="sta_editor">
    <?php select_from_arr($arr_editor,$sta_editor,'');?>
     </select>
          <br /><span class="cgray">如果选择其他编辑器，需要下载相关文件，<a href="http://www.demososo.com/editor.html" target="_blank">具体请看教程></a></span>
 </td>
    </tr>





    <tr>
      <td class="tr">ico图片：</td>
      <td>  <input  type="text" name="ico" value="<?php echo $row['ico'];?>" size="55"><?php echo $xz_must;?>
     
   </td>
    </tr> 
      <tr>
      <td class="tr">前台是否开启编辑功能：</td>
      <td>  <select name="sta_frontedit">
    <?php select_from_arr($arr_yn,$sta_frontedit,'');?>
     </select>
      <a href="http://www.demososo.com/detail-97.html" target="_blank">什么是前台编辑</a>
   </td>
    </tr> 
      <tr>
      <td class="tr">样式缓存：</td>
      <td>  <input  type="text" name="cssversion" value="<?php echo $row['cssversion'];?>" size="10">
        <br /><span class="cgray">随便填个数字，和上一次不一样即可。</span>
   </td>
    </tr> 

	 
<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="提交"></td>
    </tr>
  </table>
</form>

</div>
	
<?php } ?>
 
<script>
function  checkhere(thisForm){
	 
		if ($.trim(thisForm.sitename.value)==""){
		alert("请输入网站名称");
		thisForm.sitename.focus();
		return (false);
        } 
		
		
}

</script>

