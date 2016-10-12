<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
$imgsmall='';$delimg='';
$imgsqlname = $row['kv'];
 
 
 if($act=='update'){
	$imgname=$_FILES["addr"]["name"] ;
	 $imgsize=$_FILES["addr"]["size"] ;
	
	if(!empty($imgname)){
		$imgtype = gl_imgtype($imgname);	
		
		$up_small='n';		
		$up_delbig='n'; 
		$i='';
		$up_water= 'n';
		 require('../plugin/upload_img.php');//need get the return value,then upimg part turn to easy.
		 $updateimgaddr=" kv='$return_v'";
		 
		if($imgsqlname==''){//add img
			$ss = "update ".TABLE_NODE." set  $updateimgaddr  where id=$tid  $andlangbh limit 1";
			iquery($ss);
			}

	 

	}//end not empty
 
   jump($jumpv_file); 
 }
 else if($act=='list'){
		 if($imgsqlname<>''){
		 $imgsmall =  p2030_imgyt($imgsqlname,'y','n');
		//p2030_imgyt($addr,$w_h='y',$linkbig='n')
		$delimg= "<br /> <a href=javascript:delimg('delimg','$tid','$imgsqlname','$jumpv_file')  class='but2'>删除kv图</a><br /> <br /> ";
		
		 }
		 
		 
		 
  }
else if($act=='delimg'){
		p2030_delimg($imgsqlname,'y','n');//p2030_delimg($addr,$delbig,$delsmall)	  
	$ss = "update ".TABLE_NODE." set  kv=''  where id=$tid $andlangbh limit 1";
	iquery($ss);
	jump($jumpv_file);
}  
 ?>
 

<form  onsubmit="javascript:return addtitandcat--(this)" action="<?php echo $jumpv_file; ?>&act=update" method="post" enctype="multipart/form-data">
  <table class="formtab" style="width:1000px">
<tr><td class="tr" width="250">kv图片：
<?php
echo  '<br />'.$delimg;
?>
</td>
      <td><input name="addr" type="file" size="50" />
      <?php
       echo '<br /><span class="cred">'.$format_t.'</span><br />';
   echo $imgsmall;
      ?>
      </td>
    </tr>
	
	 
<tr>
      <td></td>
      <td>
      <input class="mysubmit" type="submit" name="Submit" value="提交"></td>
    </tr>	
	 
	

  </table>
</form>
