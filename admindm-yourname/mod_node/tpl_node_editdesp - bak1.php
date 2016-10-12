<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}


 if($act=='update'){
 //pre($_POST);


   if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}



  if($abc1=='') $abc1 = 'pls input title';
 $despjj=zbdespadd2($abc2); 
  $desptext=$abc3; 
 $despcontent = zbdesp_onlyinsert($_POST['despcontent']);

		 $ss = "update ".TABLE_NODE." set title='$abc1',despjj='$despjj',desptext='$desptext',desp='$despcontent',stock='$abc5',priceold='$abc6',price='$abc7',linktitle='$abc8',linkurl='$abc9',downloadurl='$abc10',videourl='$abc11',videotitle='$abc12',linkmore='$abc13',seo1='$abc14',seo2='$abc15',seo3='$abc16',titlecss='$abc17',pid='$abc18',dateedit='$abc19',author='$abc20',authorcompany='$abc21',sta_noaccess='$abc22',sta_tj='$abc23',sta_new='$abc24',alias_jump='$abc25' where id='$tid' $andlangbh limit 1";
		//  echo $ss;exit;
	  	iquery($ss);
  
	  jump($jumpv_file);
 
 
 }
 else
 {
  $desp=zbdesp_imgpath($row['desp']);
   $desptext=zbdesp_imgpath($row['desptext']);
  
  $jump_imgfj='../mod_imgfj/mod_imgfj.php?pid='.$pidname.'&lang='.LANG;
  
 
 ?>
  <div class="menu">
 <a  href="<?php echo $jumpv;?>&file=editcan&act=edit">修改参数</a>

 </div>
  <form  action="<?php echo $jumpv_file; ?>&act=update" method="post" enctype="multipart/form-data">


 <div style="float:left;width:70%">
  <table class="formtab" >
   <tr>
     
      <td>

 <div style="padding:10px"><strong style="font-size:16px"> 标题：</strong> <input style="padding:3px;border:1px solid #999"  name="title" type="text" value="<?php echo $row['title']?>" size="120" />
</div>

   <div style="background:#e2e2e2;padding:10px;font-size:16px;font-weight:bold">内容：</div>   
 <div class="" style="margin:0px;padding:6px;border:0px solid blue">
 内容里的图片操作：①如果内容里只有一张图片，上传kv图片即可。 <br />
 ②如果内容里有多张图片，请点击<a href="<?php echo $jump_imgfj; ?>"  class="needpopup">私有编辑器附件管理(<?php echo num_imgfj($pidname);?>)  </a> 或  <?php echo $text_imgfjlink_bjq ?> <br />
 ③如果是相册，请点击上面的内容相册管理 <br />
 
 </div>

        </td>
    </tr>

 <tr>
       
      <td  style="background:#DCF2FF">


      <p>内容简介： (一般不用填)</p>
      <textarea cols="150" rows="3" id="despjj" name="despjj">
<?php
echo  zbdespedit($row['despjj']);
?>
</textarea>
        </td>
    </tr>
   <tr>
  
      <td>
 
      <?php require_once('../plugin/editor_textarea.php');//textarea is in this file?>

        </td>
    </tr>
 <tr>
  
      <td>
  <div style="background:#e2e2e2;padding:10px;font-size:16px;font-weight:bold">其他参数：</div>   

<table class="formtab">


<tr>
      <td class="tr">
        电商：
<br />
<?php echo $xz_maybe;?>
      </td>
      <td> 
      库存：
      <input name="stock" type="text"  value="<?php echo $row['stock']?>" size="10"> （为数字）
      <div class="c5"></div> 
     
      原价：<input name="priceold" type="text"  value="<?php echo $row['priceold']?>" size="10">元 （为数字）
      <div class="c5"></div>
      现价：<input name="price" type="text"  value="<?php echo $row['price']?>" size="10">元 （为数字）

      <div class="c5"></div> 

      <?php if($row['price']>$row['priceold'])  echo '<p class="cred">提示：亲，错了吧，为什么现价更高呢？</p>'?>
      
      <br />

产品购买链接字样：<input name="linktitle" type="text"  value="<?php echo $row['linktitle']?>" size="10"> 
<?php echo $text_usetext;?>
 <div class="c5"></div>
 产品购买链接网址：<input name="linkurl" type="text"  value="<?php echo $row['linkurl']?>" size="80">
    <br /><?php echo $text_outlink;?>
      <?php 
  if($row['linkurl']<>''){
      if(substr($row['linkurl'],0,4)<>'http') echo '<p class="cred">提示:产品外部链接没有以http开头</p>';
      }?>
     
        </td>
    </tr>

  <tr>
      <td class="tr">资料下载链接：</td>
      <td ><input name="downloadurl" type="text"  value="<?php echo $row['downloadurl']?>" size="80"> <?php echo $xz_maybe;?>
      <br />资料地址，可以传到百度云 或 用ftp传您的网站。
      <br /><?php echo $text_outlink;?>
        </td>
    </tr>
     <tr>
      <td class="tr">视频：</td>
      <td >
      视频地址：<input name="videourl" type="text"  value="<?php echo $row['videourl']?>" size="80"> <?php echo $xz_maybe;?>
      <br /><?php echo $text_outlink;?> 
      <a href="http://www.demososo.com/detail-92.html" target="_blank">添加视频教程</a>
 <div class="c5"></div>
      视频文字说明： <input name="videtitle" type="text"  value="<?php echo $row['videotitle']?>" size="80"> <?php echo $xz_maybe;?>

        </td>
    </tr>

 <tr>
      <td class="tr">查看全文链接：</td>
      <td ><input name="linkmore" type="text"  value="<?php echo $row['linkmore']?>" size="80"> <?php echo $xz_maybe;?>
      
      <br /><?php echo $text_outlink;?>
        </td>
    </tr>


      <tr>
    <td width="12%" class="tr">搜索引擎优化：</td>
    <td width="88%"> SEO标题：<input name="page_seo1" type="text"  value="<?php echo $row['seo1'];?>" size="100">
      <?php echo $xz_maybe;?>
     <div class="c5"></div>SEO关键字：
      <input name="page_seo2" type="text"   value="<?php echo $row['seo2'];?>" size="100">
      <?php echo $xz_maybe;?> 多个关键字，请以空格隔开。
      <div class="c5"></div>
SEO描述：
<textarea id="page_seodesp" name="page_seodesp" cols="100" rows="3" ><?php echo $row['seo3'] ;?></textarea>
      <?php echo $xz_maybe;?>
      </td>
  </tr>
  


</table>


        </td>
    </tr>




 

 

  </table>

</div><!--end left-->

<div style="float:right;width:25%">
  <?php require_once HERE_ROOT.'mod_node/tpl_node_editdesp_rg.php'; ?>
  <?php require_once HERE_ROOT.'mod_node/tpl_node_editcan_popup.php'; ?>


</div><!--end right-->

<div class="c tc"> 
 
 <input class="mysubmitnew"     type="submit" name="Submit" value="提交" /> 
     
 <?php echo $inputmust;?>

 </div>

 </form>
<?php
  }
  ?>
 
 <script>
 $(function(){

    $('.mysubmitnew').click(function(){


 var titlev =  $("input[name='title']").val().trim();
    if(titlev=='') {
      alert('请输入标题');
      $("input[name='title']").focus();
      return false;

    }

  
  //-------------
}

      );

 });
 
 </script>
 