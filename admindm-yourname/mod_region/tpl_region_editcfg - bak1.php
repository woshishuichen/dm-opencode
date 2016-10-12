<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}



  if($act=='update')
 {

    if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}

 
  $bscnt22 = '';
  if(count($_POST)>1){
          foreach ($_POST as  $k=>$v) {
            if(strtolower($k)=='submit') break;
            $bscnt22 .= $k.':##'.htmlentities(trim($v)).'==#==';
             
          }
      }
       $bscnt22 = substr($bscnt22,0,-5);


//usr linkcss,not use linkstyle
 $ss = "update ".TABLE_REGION." set arr_cfg='$bscnt22'  where   id='$tid' $andlangbh limit 1";
			iquery($ss); 	
     // echo $ss;exit;
			$jumpvp = $jumpvpf.'&act=edit&tid='.$tid;		
			 jump($jumpvp);			
 }
 

 
 if($act=='edit')
 {
	$jumpv_insert = $jumpvpf.'&act=update&tid='.$tid;
	$titleh2='修改区块';
	$sql = "SELECT arr_cfg from ".TABLE_REGION."  where  id='$tid' $andlangbh order by id limit 1";
$row = getrow($sql);
 
$cssname=$cssstyle=$bgcolor=$bgimg=$bgeffect ='';
$sta_allwidth_box='';
$sta_allwidth_cnt='n';

$titleboxcssname=$titlestyle=$titleimg='';

$titlelinewrap=$titlestylesub='';
$titleline='background:#333';

$linkurl=$linktitle=$linkcss=$linkposi='';



$arr_cfg=$row['arr_cfg'];

$bscntarr = explode('==#==',$arr_cfg); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
    



 

 }
 
?>



<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
  
<tr>
<td colspan="2" class="trbg">
  区域盒子样式
</td></tr>

 <tr style="background:#fcf6ee">
      <td class="tr"> css名称：</td>
      <td>  <input name="cssname" type="text" value="<?php echo $cssname?>" class="inputcss" size="60">
<?php echo $xz_maybe;?>  

    <br />
    说明：定义好css名称后，可以使用css文件的样式。
<br />参考：<span class="cgray">绝对层:poa | 相对层:por | 左对齐:fl | 右对齐:fr  | 
清浮动:c  |
隐藏标题:hdhide | 仅pc端显示:pcshow | 仅移动端显示:mobshow | 
更多请参考当前模板的用到的css文件<br />
onlytext_p ,  bgboxcontent 
</span>
      </td>
      </tr>
       <tr style="background:#fff">
      <td class="tr"> style样式：</td>
      <td>  <input name="cssstyle" type="text" value="<?php echo $cssstyle?>" class="inputcss" size="80">
<?php echo $xz_maybe;?>  
 

      </td>
      </tr>



	<tr style="background:#fff">
      <td class="tr">盒子样式 </td>
      <td> 
   
 
          盒子的背景色：<input name="bgcolor" type="text" value="<?php echo $bgcolor?>" size="15">
          <?php spancolor($bgcolor);?>
           (<a target="_blank" href="http://www.demososo.com/color.html">配色方案</a>)
        <div class="inputclear"> </div>
         盒子的背景图片：<input name="bgimg" type="text" value="<?php echo $bgimg?>" size="50">
                <?php  //echo  check_blockid($bgimg); 
               echo p2030_imgyt($bgimg,'y','y');  
               ?>                
          <div class="inputclear"> </div>
           背景图片的效果：<select name="bgeffect"> <?php select_from_arr($arr_bgeffect,$bgeffect,'plsno');?>
     </select>

</div>
        </td>
    </tr>

  
   <tr  style="background:#fff">
      <td  class="tr"> 盒子宽度：</td>
      <td >   
      盒子是否全宽：  
<select name="sta_allwidth_box"> <?php select_from_arr($arr_yn,$sta_allwidth_box,'');?>
     </select>
       <div class="c5"> </div>
      内容是否全宽： 
        
<select name="sta_allwidth_cnt"> <?php select_from_arr($arr_yn,$sta_allwidth_cnt,'');?>
     </select>
     <p class="cgray">如果不需要固定宽度1200px，则选择'是'</p>
        </td>
    </tr> 
 
  
<tr>
<td colspan="2" class="trbg">
  标题盒子样式
</td></tr>


 <tr  style="background:#fff">
      <td  class="tr">标题盒子的css名称：</td>
     <td >   
  <input  name="titleboxcssname" class="inputcss"  type="text" value="<?php echo $titleboxcssname?>" size="85">
     <span class="cgray">试下 titlelineawe </span>
       </td>
    </tr>
    

 <tr  style="background:#fff">
      <td  class="tr">标题修改：</td>
     <td >   
 标题的样式：<input class=" " name="titlestyle" type="text" value="<?php echo $titlestyle?>" size="85">

     <div class="inputclear"> </div>
     标题用图片代替：<input name="titleimg" type="text" value="<?php echo $titleimg?>" size="50"> 
 <?php echo  p2030_imgyt($titleimg,'y','y');
 ?> 
        </td>
    </tr>
    
 <tr>
      <td  class="tr">标题下划线：</td>
      <td >      <div class="inputclear"> </div>
   长的样式：<input class=" " name="titlelinewrap" type="text" value="<?php echo $titlelinewrap?>" size="85"> 
<span class="cgray">使用 border:0;  来隐藏 </span>
     <div class="inputclear"> </div>
   短的样式：<input class=" " name="titleline" type="text" value="<?php echo $titleline?>" size="85"> 
<span class="cgray">使用 background:red; 来显示</span>

        </td>
    </tr> 

   

 
 <tr  style="background:#fff">
      <td  class="tr">副标题的样式：</td>
      <td ><input class=" " name="titlestylesub" type="text" value="<?php echo $titlestylesub?>" size="85"> 

 </td>
    </tr>


<tr>
<td colspan="2" class="trbg">
  链接的样式
  <a href="http://www.demososo.com/detail-99.html" target="_blank">什么是更多的链接?</a> 
</td></tr>





<tr style="background:#fcf6ee"> <td  class="tr">关于更多链接：</td>
      <td width="78%">
      链接网址： <input name="linkurl" type="text" value="<?php echo $linkurl?>" size="60">
<?php echo $xz_maybe;?> （ 如果有值，则会出现 链接）

 <div class="inputclear"> </div>
 链接的字样：<input name="linktitle" type="text" value="<?php echo $linktitle?>" size="80">
<?php echo $xz_maybe;?> （ 可以填写‘查看详情’，如果不填，则为 ‘更多’）
 <div class="inputclear"> </div>
 链接的css名称：<input class="inputcss" name="linkcss" type="text" value="<?php echo $linkcss?>" size="60">
<?php echo $xz_maybe;?> 
<p class="cgray">默认是蓝色，其他选择：more1 透明  , more2 白色，more3 黑色，more4 红色，more5 橙色，more6 绿色，more7 紫色</p>
 

 
 <div class="inputclear"> </div> 
 链接的位置：<select name="linkposi">  
   <?php select_from_arr($arr_linkposi,$linkposi,'plsno');?>
     </select> 

 

        </td>
    </tr>





 
<tr>
      <td></td>
      <td>
      <input  class="mysubmitnew" type="submit" name="Submit" value="<?php echo $titleh2;?>"></td>
    </tr>
  </table>

    <?php echo $inputmust;?>

</form>
 
 

 
<script>
function checkhere(thisForm) {
   

 
   // return;

}
 

</script>

