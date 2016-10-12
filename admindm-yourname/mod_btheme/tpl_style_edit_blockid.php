<?php
/*
  power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}
//-------------

 if($act=="update"){
    
     if(@$_POST['inputmust']=='') {echo $inputmusterror.$backlist;exit;}

 

  $bscnt22 = '';
  if(count($_POST)>1){
          foreach ($_POST as  $k=>$v) {
            if(strtolower($k)=='submit') break;
            $bscnt22 .= $k.':##'.htmlentities(trim($v)).'==#==';
             
          }
      }
       $bscnt22 = substr($bscnt22,0,-5);
      //$bscnt22 = "header_bgcolor:##$abc1==#==header_bgimg:##$abc2==#==header_color:##$abc3==#==header_color_a:##$abc4==#==header_color_ahover:##$abc5==#==footer_bgcolor:##$abc6==#==footer_color:##$abc7==#==footer_color_a:##$abc8==#==footer_color_ahover:##$abc9==#==sta_header_width:##$abc10";



   //$ss = "update ".TABLE_STYLE." set header_bgcolor='$abc1',header_bgimg='$abc2',header_color='$abc3',header_color_a='$abc4',header_color_ahover='$abc5',footer_bgcolor='$abc6',footer_bgimg='$abc7',footer_color='$abc8',footer_color_a='$abc9',footer_color_ahover='$abc10',sta_header_width='$abc11' where pidname='$pidname' $andlangbh limit 1";
  
  $ss = "update ".TABLE_STYLE." set  style_blockid='$bscnt22' where pidname='$pidname' $andlangbh limit 1";

   iquery($ss);   
  $jumpv = $jumpv_pf.'&act=edit';
  jump($jumpv);
    
    
 }



else{ 

  $bsheaderlogo = $bsheadertext = $bsheadersearch='';
$bsbannertop=$bsbanner=$bsbannermob=$bsindex=$bsindexmob=$bsmenu=$bsheadertop=$bsheader=$bsfooterbegin=$bsfootercols=$bsfooterlinks=$bsfooter=$bsfooterlast=$bsfooternavmob=$bsblock404='';

 $sta_narrowscreen = $sta_header_allwidth = $sta_menuright=$sta_menufix='n';
 
 

$sql = "SELECT * from ".TABLE_STYLE."  where  pidname='$pidname' $andlangbh   order by id limit 1";
$row = getrow($sql);
$style_blockid=$row['style_blockid'];

    $bscntarr = explode('==#==',$style_blockid); 

     if(count($bscntarr)>1){
        foreach ($bscntarr as   $bsvalue) {
           $bsvaluearr = explode(':##',$bsvalue);
           $bsccc = $bsvaluearr[0];
           $$bsccc=$bsvaluearr[1];
        }
    }
     


 $jumpv_insert = $jumpv_pf.'&act=update';


 ?>


<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
 
 <tr>
    <td  colspan="2"   class="trbg"> 
 如果移动端没有值，就使用PC端。 
  </td>   
  </tr>
 <tr>
    <td  colspan="2" style="text-align:center">  
  <a class="needpopup" href="../mod_module/mod_showblockid.php?pidname=<?php echo $pidname?>&lang=<?php echo LANG?>">查看标识</a>
  </td>   
  </tr>

<tr>
      <td  width="20%" class="tr">首页banner：
          <br /><span class="cgray">位于菜单上面<br />(这个一般不大用)</span>
      </td>
      <td  width="70%">  
       &nbsp;&nbsp;&nbsp;&nbsp;<input name="bsbannertop" type="text"  value="<?php echo $bsbannertop;?>" size="50" />
       <?php echo $xz_maybe;?>
        <?php echo check_blockid($bsbannertop);?>

 
  </td>
    </tr>

<tr>
      <td  width="20%" class="tr">首页banner：
          <br /><span class="cgray">位于菜单下面</span>
      </td>
      <td  width="70%"> 
       pc端：&nbsp;&nbsp;&nbsp;&nbsp;<input name="bsbanner" type="text"  value="<?php echo $bsbanner;?>" size="50" />
      <?php echo $xz_maybe;?>
        <?php echo check_blockid($bsbanner);?>
       
 <div class="c5"></div> 
       移动端：<input name="bsbannermob" type="text"  value="<?php echo $bsbannermob;?>" size="50" /> 
      
       <?php echo $xz_maybe;?>
        <?php echo check_blockid($bsbannermob);?>
      <span class="cgray"> (但不作用于ipad)</span>
  </td>
    </tr>
 
 
 <tr style="background:#e4edf7">
      <td  width="20%" class="tr">头部最顶部内容：</td>
      <td  width="70%">  
  <input name="bsheadertop" type="text"  value="<?php echo $bsheadertop;?>" size="50" />
       <?php echo $xz_maybe;?>
        <?php echo check_blockid($bsheadertop);?> 
        
  </td>
    </tr>


    <tr style="background:#e4edf7">
      <td  width="20%" class="tr">头部内容 ：</td>
      <td  width="70%"> 


 <div class="c5"></div> 
       LOGO：&nbsp;&nbsp;&nbsp;&nbsp;
     
       <input name="bsheaderlogo" type="text"  value="<?php echo $bsheaderlogo;?>" size="50" />
       <?php echo $xz_must;?>
       <?php echo check_blockid($bsheaderlogo);?> 

       
  <div class="c5"></div>  
 
一段文字：
    <input name="bsheadertext" type="text"  value="<?php echo $bsheadertext;?>" size="50" />
       <?php echo $xz_maybe;?>
       <?php echo check_blockid($bsheadertext);?> 
 <div class="c5"></div> 

搜索框：&nbsp;&nbsp;&nbsp;&nbsp;
  <input name="bsheadersearch" type="text"  value="<?php echo $bsheadersearch;?>" size="50" />
       <?php echo $xz_maybe;?>
       <?php echo check_blockid($bsheadersearch);?> 
 <div class="c5"></div> 

  </td>
    </tr>

   <tr>
      <td  width="20%" class="tr">底部内容：</td>
      <td  width="70%"> 
底部  -- 多列内容：
  <input name="bsfootercols" type="text"  value="<?php echo $bsfootercols;?>" size="50" />
      <?php echo $xz_maybe;?>
       <span class="cgray">  </span><?php echo check_blockid($bsfootercols);?> 
 <div class="c5"></div> 

 底部  -- 导航链接内容：
  <input name="bsfooterlinks" type="text"  value="<?php echo $bsfooterlinks;?>" size="50" />
      <?php echo $xz_maybe;?>
       <span class="cgray">  </span><?php echo check_blockid($bsfooterlinks);?> 
 <div class="c5"></div>  

底部内容：
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <input name="bsfooter" type="text"  value="<?php echo $bsfooter;?>" size="50" />
       <?php echo $xz_must;?>
       <?php echo check_blockid($bsfooter);?>   
<div class="c5"></div>
底部内容 - 最后：
  <input name="bsfooterlast" type="text"  value="<?php echo $bsfooterlast;?>" size="50" />
      <?php echo $xz_maybe;?>
       <span class="cgray">（比如浮窗咨询等）</span> <?php echo check_blockid($bsfooterlast);?> 

  </td>
    </tr>
 

<!-- <tr>
      <td  width="20%" class="tr">移动端底部导航：</td>
      <td  width="70%"> 
      <input name="bsfooternavmob" type="text"  value="<?php //echo $bsfooternavmob;?>" size="50" />
       <?php //echo check_blockid($bsfooternavmob);?>
      <?php //echo $xz_maybe;?>
      <span class="cgray">（试下： prog_footernavmob）</span>
  </td>
    </tr> -->
 <tr><td colspan="2" class="trbg">其他</td></tr>
<tr>
      <td  width="20%" class="tr">404区块的标识：</td>
      <td  width="70%"> 
      <input name="bsblock404" type="text"  value="<?php echo $bsblock404;?>" size="50" />
      <?php echo $xz_must;?>
       <?php echo check_blockid($bsblock404);?>
      
  </td>
    </tr>

<tr>
      <td  width="20%" class="tr">一些设置：</td>
      <td  width="70%"> 


      <table class="formtab" style="width:350px">

      <tr>
      <td>是否窄屏：</td>
      <td> <select name="sta_narrowscreen">
    <?php select_from_arr($arr_yn,$sta_narrowscreen,'');?>
     </select> </td>
      </tr>

        <tr>
      <td>页头是否全宽：</td>
      <td> <select name="sta_header_fullwidth">
    <?php select_from_arr($arr_yn,$sta_header_fullwidth,'');?>
     </select> </td>
      </tr>

          <tr>
      <td>菜单是否在右边：</td>
      <td> <select name="sta_menuright">
    <?php select_from_arr($arr_yn,$sta_menuright,'');?>
     </select> </td>
      </tr>

      <tr>
      <td>菜单是否固定顶部：</td>
      <td> <select name="sta_menufix">
    <?php select_from_arr($arr_yn,$sta_menufix,'');?>
     </select> </td>
      </tr>



      </table>
 
   
  


  </td>
    </tr>



  <tr>
      <td></td>
      <td>
      <input  class="mysubmitnew" type="submit" name="Submit" value="提交" /></td>
    </tr>
    </table>

 

<?php echo $inputmust;?>

</form>
<?php }
?>
<script>
function checkhere(thisForm) {
   
}

</script>
