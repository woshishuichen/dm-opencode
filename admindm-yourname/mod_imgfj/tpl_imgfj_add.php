<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

$jumpv_insert = $jumpv.'&act=insert';
//-----------

if($act=='insert'){
	$imgname=$_FILES["addr"]["name"] ;
	 $imgsize=$_FILES["addr"]["size"] ;
	
	if(!empty($imgname)){
			$imgtype = gl_imgtype($imgname);		
			//
			//$up_water='y';	//water value is in inc_logcheck.php of lang talbe
			   $ifwater=@$_POST['water'];
				if($ifwater=='y'){$up_water='y';}
					else $up_water='n';
				//-------------------
			$up_small='n';
			$up_delbig='n'; 
			$imgsqlname='';//alway change img name,because the kv img
			$i='';
			require_once('../plugin/upload_img.php');//need get the return value,then upimg part turn to easy.

		/********************/
	$ss = "insert into ".TABLE_IMGFJ." (pbh,pid,lang,title,kv,size,dateedit) values ('$user2510','$pid','".LANG."','','$return_v',$imgsize,'$dateall')";//no pos,because pos is auto,is to next and prev page
 

	 iquery($ss);
	  alert("添加成功");

	}//end not empty
	else {alert('请选择附件！');}

 	 jump($jumpv);	



}//end insert
 
 
 
?>

 
<p style="border:1px solid #ccc;padding:5px;margin-bottom:15px;">
<strong>附件说明：</strong><br />
附件分为名称附件和编辑器附件两种。<br />
<strong>名称附件：</strong>可以用在类似"布局管理"里的输入框里，<span class="cred">不可以用在编辑器里</span><br />
<strong>编辑器附件：</strong>是以http://开头，<span class="cred">而且只可以用在编辑器里</span>
</p>
<?php if($file<>'edit'){?>
<h2 class="h2tit_biao"> 添加附件（图片或Flash等）</h2>
<div class="" style="border:1px solid #ccc;padding:5px 22px;margin-bottom:15px;">
<!--  onsubmit="javascript:return -proalbum_add-(this)" -->
        <form  action="<?php echo $jumpv_insert;//here only insert ?>" method="post" enctype="multipart/form-data">
        图片或Flash名称： <input name="name" type="text" id="name" value="" size="55" />
		 
         <input type="file" size="30" id="addr" name="addr" />

       加上水印<input type="checkbox"   name="water" size="10" value="y">  &nbsp;&nbsp;&nbsp;
        <input class="mysubmit" type="submit" name="Submit" value="添加" /></td>
        </form>
<p class="cred" style="padding:5px">说明：可以添加图片,Flash等。
<?php
 echo $format_t;
?>
</p> 

</div>
<?php  } ?>