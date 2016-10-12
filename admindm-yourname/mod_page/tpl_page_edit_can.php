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

  $bscnt22 = '';
  if(count($_POST)>1){
          foreach ($_POST as  $k=>$v) {
            if(strtolower($k)=='submit') break;
            $bscnt22 .= $k.':##'.htmlentities(trim($v)).'==#==';
             
          }
      }
       $bscnt22 = substr($bscnt22,0,-5);


	//	 $ss = "update ".TABLE_PAGE." set name='$abc1',desptext='$desptext',desp='$despcontent',downloadurl='$abc4',videourl='$abc5',videotitle='$abc6',seo1='$abc7',seo2='$abc8',seo3='$abc9',sta_noaccess='$abc10',album='$abc11',pagelayout='$abc12',alias_jump='$abc13' where id='$tid' $andlangbh limit 1";


     $ss = "update ".TABLE_PAGE." set arr_can='$bscnt22'  where id='$tid' $andlangbh limit 1";

	 // echo $ss;exit;
	 	iquery($ss);
  
	jump($jumpv_back);
 }
 else
 {

  $sta_noaccess=$pagelayout='n';
  $seocus1=$seocus2=$seocus3=$downloadurl=$videourl=$videotitle='';

 
  $sql = "SELECT arr_can from ".TABLE_PAGE."  where  id='$tid' $andlangbh   order by id limit 1";
$row = getrow($sql);
 
$arr_can=$row['arr_can'];

$bscntarr = explode('==#==',$arr_can); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
    



 ?>
  <form  action="<?php echo $jumpv_file; ?>&act=update" method="post" enctype="multipart/form-data">

<div style="background:#e2e2e2;padding:10px;font-size:16px;font-weight:bold">其他参数：</div> 
 
  <table class="formtab" >
 

  <tr>
      <td  class="tr" width="80">禁止访问：</td>
      <td  >
 
      <select name="sta_noaccess">
    <?php select_from_arr($arr_yn,$sta_noaccess,'');?>
     </select>
	 <?php
	 if($sta_noaccess=='y') echo '<span style="color:red">禁止访问</span>';
	 ?>
        </td>
    </tr>

 
 <tr>
      <td class="tr">页面的内容 是否全宽：</td>
      <td><select name="pagelayout">
    <?php select_from_arr($arr_pagelayout,$pagelayout,'plsno');?>
     </select>
   <br /> 
   
        </td>
    </tr>
  


 


 <tr>
      <td class="tr">资料下载链接：</td>
      <td ><input name="downloadurl" type="text"  value="<?php echo $downloadurl?>" size="80"> <?php echo $xz_maybe;?>
      <br /><?php echo $text_outlink;?>
        </td>
    </tr>
     <tr>
      <td class="tr">视频：</td>
      <td >
    视频地址：
      <input name="videourl" type="text"  value="<?php echo $videourl?>" size="80"> <?php echo $xz_maybe;?>
      <br /><?php echo $text_outlink;?> 
      <a href="http://www.demososo.com/detail-92.html" target="_blank">添加视频教程</a>
      <div class="c5"></div> 
      视频标题： <input name="videotitle" type="text"  value="<?php echo $videotitle?>" size="80"> <?php echo $xz_maybe;?>
        </td>
    </tr>



 <tr>
    <td width="12%" class="tr">搜索引擎优化：</td>
    <td width="88%"> SEO标题：<input name="seocus1" type="text" id="page_seo1" value="<?php echo $seocus1;?>" size="100">
      <?php echo $xz_maybe;?>
     <div class="c5"></div>SEO关键字：
      <input name="seocus2" type="text" id="page_seo2" value="<?php echo $seocus2;?>" size="100">
      <?php echo $xz_maybe;?><br />多个关键字，请以空格隔开。
      <div class="c5"></div>
SEO描述：
<textarea  name="seocus3" cols="100" rows="3" ><?php echo $seocus3 ;?></textarea>
      <?php echo $xz_maybe;?>
      </td>
  </tr>
 




</table>


    

  

<div class="c tc"> 
 
 <input class="mysubmitnew"     type="submit" name="Submit" value="提交" /> 
     
<?php echo $inputmust;?>
 </div>

 </form>
<?php
  }
  ?>
  
 