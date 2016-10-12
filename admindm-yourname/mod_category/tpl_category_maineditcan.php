<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

 
	if($act=='edit'){	

$shop_priceold=$shop_price=$shop_currency=$shop_currencycn=$shop_linktitle=$authorcate=$authorcompanycate=$news_title=$news_moretitle=$field_title=$seocus1=$seocus2=$seocus3=$albumcssname='';

$sta_fontsize=$sta_sharebtn='y';
$sta_field='n';
 $album='album_fancybox'; $inputcss=''; $albumposi='y';

	$ss = "select arr_can from ".TABLE_CATE." where pidname= '$catid' $andlangbh limit 1";
		$row = getrow($ss);


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
    


  
		$jump_insertupdatesub = $jumpv_file.'&act=update';
	}
	
 
	
	if($act=='update'){ 
       if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}


  $bscnt22 = '';
  if(count($_POST)>1){
          foreach ($_POST as  $k=>$v) {
            if(strtolower($k)=='submit') break;
            $bscnt22 .= $k.':##'.htmlentities(trim($v)).'==#==';
             
          }
      }
       $bscnt22 = substr($bscnt22,0,-5);


    $ss = "update ".TABLE_CATE." set arr_can='$bscnt22'  where pidname='$catid' $andlangbh limit 1";
   
 //echo $ss;exit;
			iquery($ss); 	
		jump($jumpv_maineditcan);

	 

	
	}
	
if($act=='edit')	{



?>	
 
 <h2 class="h2tit_biao">修改参数</h2>
<form  onsubmit="javascript:return checkhere(this)" action="<?php  echo $jump_insertupdatesub;?>" method="post" enctype="multipart/form-data">
<table class="formtab">


   <tr  style="background:#dde7ff">
      <td class="tr">相册设置：</td>
      <td>
      相册类型：
      <select name="album">
    <?php select_from_arr($arr_album,$album,'');?>
     </select>
   <?php echo $xz_must;?>  
    <div class="inputclear"></div>

  
     相册的样式名称： 
      <input name="albumcssname" class="inputcss"  type="text" value="<?php echo $albumcssname?>" size="60"><?php echo $xz_maybe; ?> 
     <div class="inputclear"></div>

      相册位置：<br />
位于内容的下面：<select name="albumposi">
    <?php select_from_arr($arr_yn,$albumposi,'');?>
     </select>
    <br />
    <span class="cgray">(默认相册位于内容的下面，否则位于内容的上面。)</span>
 
    


        </td>
    </tr>
 <tr>
    <td class="tr">电商：
    <?php echo $xz_maybe;?>
    </td>
    <td>
   原价字样： <input name="shop_priceold" type="text"  value="<?php echo $shop_priceold;?>" size="30"> 
 <span class="cgray">(比如：零售价：) ，如果值为 hide，则在前台可以隐藏此功能。</span>
   <div class="c5"> </div>
    现价字样： <input name="shop_price" type="text"  value="<?php echo $shop_price;?>" size="30">
  
   <span class="cgray"> (比如：促销价：)</span>

   <div class="c5"> </div>
  货币符号： <input name="shop_currency" type="text"  value="<?php echo $shop_currency;?>" size="10">(比如¥或$)
  <div class="c5"> </div>

    中文货币符号： <input name="shop_currencycn" type="text"  value="<?php echo $shop_currencycn;?>" size="10">(比如元或美元)<br />
   <div class="c5"> </div>
   
    产品外链的字样： <input name="shop_linktitle" type="text"  value="<?php echo $shop_linktitle;?>" size="30"> 


     </td>
  </tr>
  <tr>
    <td class="tr">发布：
    <?php echo $xz_maybe;
 
    ?>
    </td>
    <td>
  发布人： <input name="authorcate" type="text"  value="<?php echo $authorcate;?>" size="30"> 
  <span class="cgray">(如果发布人为hide,则发布人和来源都不会在前台显示)</span>
<div class="c5"> </div>
  发布来源：<input name="authorcompanycate" type="text"  value="<?php echo $authorcompanycate;?>" size="30"> 
     </td>
  </tr>


      <tr>
    <td class="tr">一些值：
    <?php echo $xz_maybe;?>
    </td>
    <td>
  

    内容标题的字样:<input name="news_title" type="text"  value="<?php echo $news_title;?>" size="30"> 
   <div class="c5"> </div>
    查看全文的字样:<input name="news_moretitle" type="text"  value="<?php echo $news_moretitle;?>" size="30"> 

 <div class="c5"> </div>
    显示字体增减:
     <select name="sta_fontsize">
    <?php select_from_arr($arr_yn,$sta_fontsize,'');?>
     </select>

     <div class="c5"> </div>
    显示社交分享按钮:
   <select name="sta_sharebtn">
    <?php select_from_arr($arr_yn,$sta_sharebtn,'');?>
     </select>
     </td>
  </tr>



  <!--
 <tr>
    <td  class="tr">Tab选项：</td>
    <td> <select name="selxe22tabpro">
    <?php  
    //select_from_tab($sta_tabpro);?>
     </select>
  此项在术语里管理
     </td>
  </tr>
   
-->
  
  <tr>
      <td class="tr">开启字段属性：</td>
      <td><select name="sta_field">
    <?php select_from_arr($arr_yn,$sta_field,'');?>
     </select>
    <div class="c5"> </div>
    属性标题的字样：<input name="field_title" type="text"  value="<?php echo $field_title;?>" size="30">
    

        </td>
    </tr>


  
   <tr>
    <td class="tr">搜索引擎优化：</td>
    <td> SEO标题：<input name="seocus1" type="text" id="page_seo1" value="<?php echo $seocus1;?>" size="100">
      <?php echo $xz_maybe;?>
     <div class="c5"></div>SEO关键字：
      <input name="seocus2" type="text" id="page_seo2" value="<?php echo $seocus2;?>" size="100">
      <?php echo $xz_maybe;?> 多个关键字，请以空格隔开。
      <div class="c5"></div>
SEO描述：
<textarea name="seocus3" cols="100" rows="3" ><?php echo $seocus3;?></textarea>
      <?php echo $xz_maybe;?>
      </td>
  </tr>
  
    

  
  
  <tr>
    <td></td>
    <td style="padding:10px"> <input class="mysubmitnew" type="submit" name="Submit" value="提交"></td>
  </tr>
 </table>
  <?php echo $inputmust;?>
</form>
<?php
}
?>

 