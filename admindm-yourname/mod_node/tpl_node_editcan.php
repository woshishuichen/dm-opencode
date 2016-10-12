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


  $bscnt22 = '';
  if(count($_POST)>1){
          foreach ($_POST as  $k=>$v) {
            if(strtolower($k)=='submit') break;
            $bscnt22 .= $k.':##'.htmlentities(trim($v)).'==#==';
             
          }
      }
       $bscnt22 = substr($bscnt22,0,-5);


     $ss = "update ".TABLE_NODE." set arr_can='$bscnt22'  where id='$tid' $andlangbh limit 1";
    //  echo $ss;exit;
      iquery($ss);
  
    jump($jumpv_file);
 
 
 }
 else
 {
 
$stock=10000;
$detpriceold=$detprice=0;
$sta_noaccess='n';
$detlinktitle=$detlinkurl=$downloadurl=$videourl=$videotitle=$linkmore=$seocus1=$seocus2=$seocus3=$titlecss=$dateedit=$author=$authorcompany=$sta_tj=$sta_new='';

   $sql = "SELECT arr_can from ".TABLE_NODE."  where  id='$tid' $andlangbh   order by id limit 1";
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
    
$detpriceold = floatval($detpriceold);
$detprice = floatval($detprice);

 ?>
 
  <form  action="<?php echo $jumpv_file; ?>&act=update" method="post" enctype="multipart/form-data">


 <div style="width:90%">
 <div style="background:#e2e2e2;padding:10px;font-size:16px;font-weight:bold">其他参数：</div>   
  <table class="formtab" >
   

 
 <tr>
      <td style="width:80px" class="tr">标题样式</td>
      <td  > <input name="titlecss" type="text"  value="<?php echo $titlecss;?>" size="80">
       <br /> (如：color:red;font-size:22px)
       </td>
    </tr>

      <tr>
      <td class="tc">
    发布 ：
      </td>
      <td>  
     发 布 人：&nbsp;&nbsp;&nbsp;<input name="author" type="text"  value="<?php echo $author;?>" size="30">
 <span class="cgray">(如果发布人为hide,则发布人和来源都不会在前台显示)</span> 
    <div class="c5"></div>
    来源：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="authorcompany" type="text"  value="<?php echo $authorcompany;?>" size="30">
     
      
      <?php echo $text_usetext;?>
        </td>
    </tr>
 

        <tr>
      <td class="tr">禁止访问：</td>
      <td ><select name="sta_noaccess">
    <?php select_from_arr($arr_yn,$sta_noaccess,'');?>
     </select>
     <?php
   if($sta_noaccess=='y') echo '<span style="color:red">禁止访问</span>';
   ?>
        </td>
    </tr>
     <tr>
      <td class="tr">是否推荐：</td>
      <td ><select name="sta_tj">
    <?php select_from_arr($arr_yn,$sta_tj,'');?>
     </select>
        </td>
    </tr>
   <tr>
      <td class="tr">是否最新：</td>
      <td ><select name="sta_new">
    <?php select_from_arr($arr_yn,$sta_new,'');?>
     </select>
        </td>
    </tr>


<tr>
      <td class="tr">
        电商：
<br />
<?php echo $xz_maybe;?>
      </td>
      <td> 
      库存：
      <input name="stock" type="text"  value="<?php echo $stock;?>" size="20"> （为数字）
      <div class="c5"></div> 
     
      原价：<input name="detpriceold" type="text"  value="<?php echo $detpriceold;?>" size="20">元 （为数字）
      <div class="c5"></div>
      现价：<input name="detprice" type="text"  value="<?php echo $detprice;?>" size="20">元 （为数字）

      <div class="c5"></div> 

      <?php if($detprice>$detpriceold)  echo '<p class="cred">提示：亲，错了吧，为什么现价更高呢？</p>';?>
      
      <br />

产品购买链接字样：<input name="detlinktitle" type="text"  value="<?php echo $detlinktitle;?>" size="10"> 
<?php echo $text_usetext;?>
 <div class="c5"></div>
 产品购买链接网址：<input name="detlinkurl" type="text"  value="<?php echo $detlinkurl;?>" size="80">
    <br /><?php echo $text_outlink;?>
      <?php 
  if($detlinkurl<>''){
      if(substr($detlinkurl,0,4)<>'http') echo '<p class="cred">提示:产品外部链接没有以http开头</p>';
      }?>
     
        </td>
    </tr>

  <tr>
      <td class="tr">资料下载链接：</td>
      <td ><input name="downloadurl" type="text"  value="<?php echo $downloadurl;?>" size="100"> <?php echo $xz_maybe;?>
      <br />资料地址，可以传到百度云 或 用ftp传您的网站。
      <br /><?php echo $text_outlink;?>
        </td>
    </tr>
     <tr>
      <td class="tr">视频：</td>
      <td >
      视频地址：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input name="videourl" type="text"  value="<?php echo $videourl;?>" size="100"> <?php echo $xz_maybe;?>
      <br /><?php echo $text_outlink;?> 

      <a href="http://www.demososo.com/detail-92.html" target="_blank">添加视频教程</a>
 <div class="c5"></div>
      视频文字说明： <input name="videotitle" type="text"  value="<?php echo $videotitle;?>" size="80"> <?php echo $xz_maybe;?>

        </td>
    </tr>

 <tr>
      <td class="tr">查看全文链接：</td>
      <td ><input name="linkmore" type="text"  value="<?php echo $linkmore;?>" size="80"> <?php echo $xz_maybe;?>
      
      <br /><?php echo $text_outlink;?>
        </td>
    </tr>


      <tr>
    <td width="12%" class="tr">搜索引擎优化：</td>
    <td width="88%">

    seo标题：&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="seocus1" type="text"  value="<?php echo $seocus1;?>" size="100">
      <?php echo $xz_maybe;?>
     <div class="c5"></div>

     seo关键字：
      <input name="seocus2" type="text"   value="<?php echo $seocus2;?>" size="100">
      <?php echo $xz_maybe;?> 多个关键字，请以空格隔开。
      <div class="c5"></div>

seo描述：&nbsp;&nbsp;&nbsp;&nbsp;
<textarea  name="seocus3" cols="100" rows="3" ><?php echo $seocus3;?></textarea>
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
 