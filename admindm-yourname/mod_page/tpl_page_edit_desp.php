<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}


 if($act=='update'){
// pre($_POST);

  if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}


  if($abc1=='') $abc1 = 'pls input title';
 
   $desp = zbdesp_onlyinsert($_POST['despcontent']); //note: desp and addr not use variable abc1.
    $desptext = zbdesp_onlyinsert($_POST['editor1text']);

		 $ss = "update ".TABLE_PAGE." set name='$abc1',alias_jump='$abc4',desptext='$desptext',desp='$desp' where id='$tid' $andlangbh limit 1";
	 // echo $ss;exit;
	 	iquery($ss);
  
	jump($jumpv_back);
 }
 else
 {
    $alias_jump=$row['alias_jump'];

  $desp=zbdesp_imgpath($row['desp']);
   $desptext=zbdesp_imgpath($row['desptext']);
  
  $jump_imgfj='../mod_imgfj/mod_imgfj.php?pid='.$pidname.'&lang='.LANG;
  
 
 ?>
 <div class="menu">
 <a  href="<?php echo $jumpv;?>&file=edit_can&act=edit">修改参数</a>

 </div>
  <form  action="<?php echo $jumpv_file; ?>&act=update" method="post" enctype="multipart/form-data">
 
  <table class="formtab" >
   <tr>
     
      <td>

 <div style="padding:10px"><strong style="font-size:16px"> 标题：</strong> <input style="padding:3px;border:1px solid #999"  name="title" type="text" value="<?php echo $row['name']?>" size="120" />
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
  
      <td>
 
      <?php require_once('../plugin/editor_textarea.php');//textarea is in this file?>

        </td>
    </tr>
 
    
   
    
     <tr>   <td>
      页面跳转网址： 
      <input name="alias_jump" type="text"  value="<?php echo $alias_jump?>" size="80">
 
       <?php echo $xz_maybe;?>
      <br /><?php echo $text_outlink;?> 


 <?php if($alias_jump<>'') { echo $text_jump;
      }?>
      

        </td>
    </tr>



 
<table>
 
 
 

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
 <div class="c tc" style="height:100px"> </div>