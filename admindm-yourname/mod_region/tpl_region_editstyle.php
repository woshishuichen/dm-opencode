<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}



  if($act=='update')
 {
//usr linkcss,not use linkstyle
 $ss = "update ".TABLE_REGION." set cssname='$abc1',cssstyle='$abc2',bgcolor='$abc3',bgimg='$abc4',bgeffect='$abc5',sta_allwidth_box='$abc6',sta_allwidth_cnt='$abc7',dateedit='$dateall' where id='$tid' $andlangbh limit 1";
			iquery($ss); 	
     // echo $ss;exit;
			$jumpvp = $jumpvpf.'&act=edit&tid='.$tid;		
			 jump($jumpvp);			
 }
 

 
 if($act=='edit')
 {
	$jumpv_insert = $jumpvpf.'&act=update&tid='.$tid;
	$titleh2='修改区块';
	$sql = "SELECT * from ".TABLE_REGION."  where id='$tid' $andlangbh order by id limit 1";
$row = getrow($sql);
 
$name=$row['name'];
$cssname=$row['cssname'];
$cssstyle=$row['cssstyle'];

$bgcolor=$row['bgcolor'];
$bgimg=$row['bgimg'];
$bgeffect=$row['bgeffect'];
$sta_allwidth_box=$row['sta_allwidth_box'];$sta_allwidth_cnt=$row['sta_allwidth_cnt'];

 

 }
 
?>



<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
  

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
           背景图片的效果：<select name="imgpara"> <?php select_from_arr($arr_bgeffect,$bgeffect,'plsno');?>
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
      <br />
      内容是否全宽： 
        
<select name="sta_allwidth_cnt"> <?php select_from_arr($arr_yn,$sta_allwidth_cnt,'');?>
     </select>
     <p class="cgray">如果不需要固定宽度1200px，则选择'是'</p>
        </td>
    </tr> 
 
  

 
<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="<?php echo $titleh2;?>"></td>
    </tr>
  </table>
</form>
 
 

 
<script>
function checkhere(thisForm) {
   

 
   // return;

}
 

</script>

