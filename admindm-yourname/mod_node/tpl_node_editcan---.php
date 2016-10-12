<?php
/*
  power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}
//---------------
 if($act=='update'){
 //echo $abc2;exit;
  ifhaspidname(TABLE_CATE,$abc3);
     $ss = "update ".TABLE_NODE." set title='$abc1',titlecss='$abc2',pid='$abc3',dateday='$abc4',author='$abc5',priceold='$abc6',price='$abc7',linktitle='$abc8',linkurl='$abc9',downloadurl='$abc10',videourl='$abc11',videotitle='$abc12',sta_noaccess='$abc13',sta_tj='$abc14',sta_new='$abc15',seo1='$abc16',seo2='$abc17',seo3='$abc18',dateedit='$dateall' where id='$tid' $andlangbh limit 1";
       //echo $ss;exit;
      iquery($ss);
      jump($jumpv_file);
 }
 else
 {
 
$sta_noaccess=$row['sta_noaccess']; $sta_tj=$row['sta_tj'];$sta_new=$row['sta_new'];

 //------------
 $sqlcatlist = "SELECT * from ".TABLE_CATE." where  pid='$catpid' $andlangbh order by pos desc,id";
  //echo $sqlcatlist;
$rowcatlist= getall($sqlcatlist);
 
 //-------------- 

  
  
?>

 <div style="width:70%;float:left">
 
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_file; ?>&act=update"  method="post" >
  <table class="formtab" style="width:100%">
    <tr>
      <td width="15%" class="tr">名称或标题：</td>
      <td width="72%"> <input name="name" type="text" value="<?php echo $row['title']?>" size="110">
        </td>
    </tr>
 <tr>
      <td class="tr">标题样式</td>
      <td> <input name="namedengji34" type="text"  value="<?php echo $row['titlecss'];?>" size="100">
       <br /> (如：color:red;font-size:22px)
       </td>
    </tr>
 <tr>
      <td  class="tr">分类：</td>
      <td>
<?php  
    select_cate($rowcatlist,'分类',$pid);//in list left menu php
   ?>
</td></tr>
      <tr>
      <td class="tr">
        日期和发布人：
      </td>
      <td> 发布日期：<input name="date2" type="text"  value="<?php echo $date?>" size="20"> <br />
      发 布 人：<input name="date33" type="text"  value="<?php echo $row['author']?>" size="30">
      (如果为空，则采用主分类的值)
        </td>
    </tr>
       <tr>
      <td class="tr">
        价格和产品外部链接：
<br />
<?php echo $xz_maybe;?>
      </td>
      <td> 价格：<br /> 
      原价：<input name="priceold" type="text"  value="<?php echo $row['priceold']?>" size="10">元 （为数字）<br /> 
      现价：<input name="price" type="text"  value="<?php echo $row['price']?>" size="10">元 （为数字）<br /> 

      <?php if($row['price']>$row['priceold'])  echo '<p class="cred">提示：亲，错了吧，为什么现价更高呢？</p>'?>
      
      <br />
      产品购买链接字样：<input name="linktitle" type="text"  value="<?php echo $row['linktitle']?>" size="10"> 
   <br />产品购买链接网址：<input name="linkurl" type="text"  value="<?php echo $row['linkurl']?>" size="80">
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
      视频地址：<input name="video" type="text"  value="<?php echo $row['videourl']?>" size="80"> <?php echo $xz_maybe;?>
      <br /><?php echo $text_outlink;?> 
      <a href="http://www.demososo.com/detail-92.html" target="_blank">添加视频教程</a>


       <br />
       <br />
      视频标题： <input name="videtitle" type="text"  value="<?php echo $row['videotitle']?>" size="80"> <?php echo $xz_maybe;?>

        </td>
    </tr>


 
    <tr>
      <td class="tr">禁止访问：</td>
      <td ><select name="sele22">
    <?php select_from_arr($arr_yn,$sta_noaccess,'pls');?>
     </select>
        </td>
    </tr>
     <tr>
      <td class="tr">是否推荐：</td>
      <td ><select name="sele22tj">
    <?php select_from_arr($arr_yn,$sta_tj,'pls');?>
     </select>
        </td>
    </tr>
   <tr>
      <td class="tr">是否最新：</td>
      <td ><select name="sele22new">
    <?php select_from_arr($arr_yn,$sta_new,'pls');?>
     </select>
        </td>
    </tr>
  <!--
       <tr>
      <td  class="tr">品牌brand：</td>
      <td>
<?php  
    //select_taxo('taxo20140401_0900548658','品牌',$curbrand);//in list left menu php
   ?>
</td></tr>-->

   <tr>
    <td width="12%" class="tr">搜索引擎优化：</td>
    <td width="88%"> SEO标题：<input name="page_seo1" type="text"  value="<?php echo $row['seo1'];?>" size="100">
      <?php echo $xz_maybe;?>
     <div class="c5"></div>SEO关键字：
      <input name="page_seo2" type="text"   value="<?php echo $row['seo2'];?>" size="100">
      <?php echo $xz_maybe;?><br />多个关键字，请以空格隔开。
      <div class="c5"></div>
SEO描述：
<textarea id="page_seodesp" name="page_seodesp" cols="100" rows="3" ><?php echo $row['seo3'] ;?></textarea>
      <?php echo $xz_maybe;?>
      </td>
  </tr>
  
  
   <tr>
      <td></td>
      <td><br />
      <input class="mysubmit" type="submit" name="Submit" value="提交"> <br /><br /> </td>
    </tr>
  </table>
</form> 
</div>
<div style="width:26%;float:right">
<?php require_once HERE_ROOT.'mod_node/tpl_node_editcan_popup.php'; ?>
</div>
<div class="c"> </div>
<?php
  }
  ?>
  
  <script>
  function  checkhere(thisForm){
      if (thisForm.name.value==""){
      alert("请输入名称");
      thisForm.name.focus();
      return (false);
      }
      if (thisForm.pcla.value==""){
      alert("请选择分类");
      thisForm.pcla.focus();
      return (false);
      }
    }
  </script>