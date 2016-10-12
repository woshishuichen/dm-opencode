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
 
   $desp = zbdesp_onlyinsert($_POST['despcontent']); //note: desp and addr not use variable abc1.
    $desptext = zbdesp_onlyinsert($_POST['editor1text']);



$ss = "update ".TABLE_NODE." set title='$abc1',despjj='$despjj',desptext='$desptext',desp='$desp',pid='$abc5',dateedit='$abc6',alias_jump='$abc7' where id='$tid' $andlangbh limit 1";
		//  echo $ss;exit;
	  	iquery($ss);
  
	  jump($jumpv_file);
 
 
 }
 else
 {
  $desp=zbdesp_imgpath($row['desp']);
   $desptext=zbdesp_imgpath($row['desptext']);
  
  $pid=$row['pid'];
   $dateedit=$row['dateedit'];
$alias_jump=$row['alias_jump'];

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
 



  </table>

</div><!--end left-->

<div style="float:right;width:25%">
  <?php  require_once HERE_ROOT.'mod_node/tpl_node_editdesp_rg.php'; ?>
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
 