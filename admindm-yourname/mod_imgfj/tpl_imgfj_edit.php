<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}


if($act=="update"){ 
			$imgname=$_FILES["addr"]["name"] ;
			$imgsize=$_FILES["addr"]["size"] ;
	
		if(!empty($imgname)){
			$imgtype = gl_imgtype($imgname);		
			//
			//$up_water='y';	
			//$up_water='y';	//water value is in inc_logcheck.php of lang talbe
			   $ifwater=@$_POST['water'];
				if($ifwater=='y'){$up_water='y';}
					else $up_water='n';
					//-------------
			$up_small='n';
			$up_delbig='n'; 
			$i='';			
			//$imgsqlname='';//alway change img name,because the kv img
			require_once('../plugin/upload_img.php');//need get the return value,then upimg part turn to easy.

		
	}//end not empty

	//-------------------------
		$ss = "update ".TABLE_IMGFJ." set  title='$abc1',dateedit='$dateall'  where id=$tid  $andlangbh limit 1";
		iquery($ss);
		
		jump($jumpv_file.'&act=edit&tid='.$tid);

}
if($act=="edit"){ 
 
 $imgsmall2 = p2030_imgyt($imgsqlname,'y','n');  //$imgsmall2 is in pro.php
?>



<h2 class="h2tit_biao"> 修改附件
<!-- 
    modify by kinn start
    多了一个“<”
    没有改，原因是他给留下的Bug，或许对修改程序有帮助
    其他的都改
    modify by kinn end
 -->
 <a href='<?php echo $jumpv;?>'><返回附件管理</a>
 
</h2>

<form action="<?php echo $jumpv_file; ?>&act=update&tid=<?php echo $tid?>" method="post" enctype="multipart/form-data">
  <table class="formtab">
    <tr>
      <td width="12%" class="tr">附件说明：</td>
      <td width="88%"> <input name="name" type="text" value="<?php echo $row['title']?>" size="70">
        </td>
    </tr>

   <tr>
      <td width="12%" class="tr">上传附件：</td>
      <td width="88%"> <input name="addr" type="file" size="50" />
	   <br /><br />加上水印<input type="checkbox"   name="water" size="10" value="y"> &nbsp;&nbsp;&nbsp;

	  <p class="cred" style="padding:5px">
	  <span style="color:#666">提示：修改附件后，原文件名(扩展名)是不是改变的。<br />
如果把.docx修改成.jpg就会出错。但.gif可以修改成.jpg.因为它们都是图片。<br />
如果要把..docx修改成.jpg，可以先删除再添加。</span><br /><br />
         <?php
			echo $imgsmall2.'<br /><br /><br />';
			echo $format_t.'<br />';
		 ?>
</p>
       </td>
    </tr>
    
<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="<?php echo '修改';?>"></td>
    </tr>
  </table>
</form>

<?php } ?>

 