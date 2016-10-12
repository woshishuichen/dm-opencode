<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 if($act=='insert')
 {

    $pidregion = @$_POST['pidregion'];
 
$wherepidregion = '';
if(count($pidregion>0)){
       $v3='';
       if(is_array($pidregion)) {
           foreach ($pidregion as $k2=>$v2){
            $v3=$v3.$v2.'|';
            }
         }   
        //$wherepidregion = ",pidregion= '$v3'";

}



    if ($abc1 == '')   $abc1 = '请输入标题';	 
			$pidname='ndlist'.$bshou;

			  $imgsqlname = '';  
       $imgname = $_FILES["addr"]["name"];
       $imgsize = $_FILES["addr"]["size"];
       if (!empty($imgname)) {         
         $imgtype = gl_imgtype($imgname);
           $up_small = 'n';
           $up_delbig = 'n';
           $up_water = 'n';           
           $i = '';           
           require_once('../plugin/upload_img.php'); //need get the return value,then upimg part turn to easy.
           $kv_v = ",kv = '$return_v'";
       }
       else  
       {$kv_v = "";$return_v ='';       
       }


			$ss = "insert into ".TABLE_BLOCK." (pidname,pbh,type,pid,name,effect,maxline,dhtrigger,cssname,more,kv,lang,dateedit,pidregion) values ('$pidname','$user2510','nd','$abc2','$abc1','$abc3','$abc4','$abc5','$abc6','$abc7','$return_v','".LANG."','$dateall','$v3')";
			// echo $ss;exit;
			iquery($ss);
			alert("添加成功");
			jump($jumpv_file.'&act=edit&pidname='.$pidname);
	 	
 }
 
  if($act=='update')
 {

   $pidregion = @$_POST['pidregion'];
 
$wherepidregion = '';
if(count($pidregion>0)){
       $v3='';
       if(is_array($pidregion)) {
           foreach ($pidregion as $k2=>$v2){
            $v3=$v3.$v2.'|';
            }
         }   
        $wherepidregion = ",pidregion= '$v3'";

}



  if ($abc1 == '')   $abc1 = '请输入标题';


        $sql = "SELECT kv from ".TABLE_BLOCK." where pidname='$pidname'  $andlangbh   limit 1";
                           $row = getrow($sql);
                           $imgsqlname =$row['kv'];  
       
       $delimg = zbdesp_onlyinsert($_POST['delimg']);                            
    if($delimg=='y'){
        if($imgsqlname<>'') p2030_delimg($imgsqlname,'y','y');
        $kv_v = ",kv = ''";
    }
    else{

         $imgname = $_FILES["addr"]["name"];
       $imgsize = $_FILES["addr"]["size"];
       if (!empty($imgname)) {
           $imgtype = gl_imgtype($imgname);
           $up_small = 'n';
           $up_delbig = 'n';
           $up_water = 'n';           
           $i = '';
           require_once('../plugin/upload_img.php'); //need get the return value,then upimg part turn to easy.
           $kv_v = ",kv = '$return_v'";
       }
       else  $kv_v = "";
    
    }




			 $ss = "update ".TABLE_BLOCK." set name='$abc1',pid='$abc2',effect='$abc3',maxline='$abc4',dhtrigger='$abc5',cssname='$abc6',more='$abc7',dhpara='$abc8'$kv_v,dateedit='$dateall'$wherepidregion where pidname='$pidname' $andlangbh limit 1";
			iquery($ss); 	
			 // echo $ss;exit;
			  jump($jumpv_pidnamefile.'&act=edit');	 	
 }
 
 
  if($act=='add')
 {
 $titleh2 = '添加区块内容';
 $jumpv_insert = $jumpv_file.'&act=insert';
$effect ='';
$name = '';$more = '';
$maxline = '1';

$trigger=$dhpara=''; $cssname=''; $kv= $pidregion= '' ; 


 }
   if($act=='edit')
 {
  $titleh2 = '修改区块内容';
  $jumpv_insert = $jumpv_pidnamefile.'&act=update';
  $sql = "SELECT * from ".TABLE_BLOCK."  where pidname='$pidname' $andlangbh order by id limit 1";
$row22 = getrow($sql);
$effect = $row22['effect']; 
$name = $row22['name'];$more = $row22['more'];
$maxline = $row22['maxline']; 
if($maxline <1) $maxline = 1;

$pidregion = $row22['pidregion']; 
 
 $pid= $row22['pid']; 
$trigger= $row22['dhtrigger'];$dhpara= $row22['dhpara'];
$cssname= $row22['cssname'];
  $kv= $row22['kv'];
 $imgsmall2 = p2030_imgyt($kv, 'y', 'n');

 }
 
 
 if($act=='add' or $act=='edit')
 {
?>

<h2 class="h2tit_biao"><?php echo $titleh2?></h2>
<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post"  enctype="multipart/form-data">
  <table class="formtab">
    <tr>
      <td width="12%" class="tr">区块说明：</td>
      <td width="88%"> <input name="name" type="text"  value="<?php echo $name;?>" size="50">
      <?php echo $xz_must?>
	   <?php
	  if($act=='edit')
 {
	  $del_text= " <a href=javascript:del('delblock','$pidname','$jumpv')  class=but2>删除区块</a>";
	  echo $del_text;
	  }
	  ?>
	  
        </td>
    </tr>
	 <tr>
      <td width="12%" class="tr">分类标识：</td>
      <td width="88%"> 
	  
	  <input name="bs" type="text"  value="<?php echo $pid;?>" size="50"><?php echo $xz_must?>
	   <?php
if($act=='edit'){ 
	  $ssacte = "select * from ".TABLE_CATE." where pidname= '$pid' and modtype='node' $andlangbh limit 1";
	 if(getnum($ssacte)<=0) echo '<span class="cred">注意，此分类标识不存在，请检查。</span>';
   else {
     $catearr = get_fieldarr(TABLE_CATE,$pid,'pidname');
   
     $catepid = $catearr['pid'];
     if(substr($pid,0,4)=='csub') {
      //get main cate
      if(substr($catepid,0,4)=='csub')   $maincatepidname = get_field(TABLE_CATE,'pid',$catepid,'pidname');
      else  $maincatepidname = $catepid;
 
     }
     else $maincatepidname = $pid;


       $catearr2 = get_fieldarr(TABLE_CATE,$maincatepidname,'pidname');
       $modtype = $catearr2['modtype'];
       $maincatename = $catearr2['name'];

    
    $catelink = '<a target="_blank" href="../mod_category/mod_category.php?lang='.LANG.'&catid='.$maincatepidname.'">(查看分类)</a>';
    $nodelink = '<a target="_blank" href="../mod_node/mod_'.$modtype.'.php?lang='.LANG.'&catpid='.$maincatepidname.'&page=0&catid='.$pid.'">(管理内容)</a>';
 
    echo '<p>主分类：'.$maincatename.$catelink.'&nbsp;&nbsp; -> &nbsp;&nbsp;当前分类：'.$catearr['name'].$nodelink.'</p>';
   }


	 
	}
  else {
	echo ' &nbsp; &nbsp; | &nbsp;<a target="_blank" href="../mod_category/mod_category.php?lang='.LANG.'">选择分类</a>';
}
 ?>
	  
        </td>
    </tr>


	 <tr>
      <td width="12%" class="tr">效果模板文件：</td>
      <td width="88%"> 
	   <select name="effect" class="staeffect">
<option  value="">请选择</option> 
	 
 <?php  //select_from_arr($arr_group_img,$effect,'');
       
                  $sql = "SELECT * from ".TABLE_BLOCK."  where type='effect_nd' and sta_visible='y'  order by pos desc,id desc";
                  //  $sql = "SELECT * from ".TABLE_BLOCK."  where type='effect' $andlangbh order by pos desc,id desc"; 
                  // no lang when effect
                    $rowall = getall($sql);
                    if($rowall=='no') echo '<option value=""></option>';
                    else{
                        foreach ($rowall as $v){
                            $effectV = $v['effect'];$sta_visible22 = $v['sta_visible'];
                            $effpidname = $v['pidname'];
                            $nameV =  $v['name'];

                            $sta_visiblev='';
if($sta_visible22<>'y') $sta_visiblev= '[隐藏] ';

                            
                            $nameV2 = $sta_visiblev.$nameV.'-'.$effectV.'.php';
                             if($effect == $effpidname) $selectV = ' selected ';
                            else $selectV = '';

            echo  '<option value="'.$effpidname.'" '.$selectV.'>'.$nameV2.'</option>';
                              //must use pidname as pid,not use effect,because effect is change.it is important
                        }
                        
                    }
                    ?>


     </select> 

   <a  class="needpopup"   href="../mod_block/mod_effect.php?lang=<?php echo LANG?>&type=nd">模板管理></a>


        </td>
    </tr>
    <tr>
      <td width="12%" class="tr">显示个数：</td>
      <td width="88%"> 
	   <input name="num" type="text"  value="<?php echo $maxline;?>" size="10"><span class="cgray">（为数字，且大于0）</span>
	   <?php echo $xz_must?>
        </td>
    </tr>
	  


    <tr>
      <td width="22%" class="tr">触发器id：</td>
      <td width="77%"> <input name="trigger" type="text" value="<?php echo $trigger?>" size="30"><?php echo $xz_maybe; ?> 
      <br /><?php echo $text_trigger;?>
       </td>
    </tr>
    
      <tr>
      <td width="22%" class="tr">样式名称：</td>
      <td width="77%"> <input name="cssname" type="text" class="inputcss" value="<?php echo $cssname?>" size="60"><?php echo $xz_maybe; ?> 
       </td>
    </tr>
 <tr>
      <td width="22%" class="tr">更多链接的字样：</td>
      <td width="77%"> <input name="more" type="text" value="<?php echo $more?>" size="20"><?php echo $xz_maybe; ?> 
      <br /><span class="cgray">(比如 查看详情 ， 课程详情等。)</span>
       </td>
    </tr>
 <tr>
      <td width="22%" class="tr">动画参数：</td>
      <td width="77%">
      <textarea cols="100" name = "dhpara" rows="10"><?php echo $dhpara; ?></textarea>
 <?php echo $xz_maybe; ?> 
      
       </td>
    </tr>





 <tr>
      <td width="22%" class="tr">分配给样式：</td>
      <td width="77%">  

      <?php

           $sqlcatlist = "SELECT * from ".TABLE_REGION." where  type='indexcnt' and sta_sub='n' $andlangbh order by pos desc,id";
  //echo $sqlcatlist;
        $rowcatlist= getall($sqlcatlist);
        //pre($rowcatlist);
        if($rowcatlist<>'no'){
           foreach ($rowcatlist as $k => $v) {

            $c_pidname = $v['pidname'];
             $c_name = $v['name'];
              $c_id = $v['id'];
              //-----------
              //strpos(haystack, needle)
               $strpos = strpos($pidregion,$c_pidname); //只有checkbox会有连接字符串          
            //if(in_array($pidname,$value22)){    $checked='checked="checked"';$class='class="cur"';}
              if(is_int($strpos)){ $checked='checked="checked"';$class='class="cur"';}
            else{ $checked='';$class='';}
            //--------------
              echo '<input type="checkbox" '.$checked.' value="'.$c_pidname.'" name="pidregion[]" id="'.$c_id.'" size="80"><label style="padding-right:20px" for="'.$c_id.'">'.$c_name.'</label>';
           }
              


        }

 

      ?>

 
       </td>
    </tr>
 



   <tr>
            <td width="12%" class="tr">效果的图片示例：</td>
            <td width="88%"> <input name="addr" type="file" id="addr" size="50" /><?php echo $xz_maybe;?>  
<?php
echo '<br /><span class="cred">' . $format_t . '</span><br />';
// echo gl_showsmallimg($fo_bef,$imgsmall,'y');
   if($kv<>'')    echo $imgsmall2;
?>
             
    <?php  if($kv<>'')    {
              ?>
          <span class="cred"> <br />是否要删除图片？ </span> 
          <select name="delimg">
    <?php select_from_arr($arr_yn,'n','');?>
     </select>
          <?php } 
          else{ //use for : Undefined index: delimg 
              ?>          
          <select name="delimg" style="display:none">
              <option value=""></option>
     </select>
          <?php
          }?>
              
              <br />  <br />  
</td></tr>


	<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="<?php echo $titleh2?>"></td>
    </tr>
	  </table>
</form>
 

<?php
}
?>

<script>
function checkhere(thisForm) {
   if (thisForm.name.value=="")
	{
		alert("请输入区块说明。");
		thisForm.name.focus();
		return (false);
	}
    
	  if (thisForm.bs.value=="")
	{
		alert("请输入分类标识。");
		thisForm.bs.focus();
		return (false);
	}
	  if (thisForm.effect.value=="")
	{
		alert("请选择效果。");
		thisForm.effect.focus();
		return (false);
	}

	 
 
	 var reg=/^[0-9]*$/;
      if (thisForm.num.value=="")
	{
		alert("请输入显示个数。");
		thisForm.num.focus();
		return (false);
	}
	else{
	 var testnum = reg.test(thisForm.num.value);
	 if(!testnum){
	     alert(" 显示个数 要为数字。");
		thisForm.num.focus();
		return (false);
	 
	 }
	 
	}
      var num=thisForm.num.value;
	 
	
	
   // return;

}
 
/*
 $(function(){

  staeffect($('.statype').val(),'');

 	   $('.statype').change(function(){ 	   	 
 	   	  staeffect($(this).val(),'y');
 	   });
 });


 function staeffect(v,setfirst){
      $('.staeffect option').each(function(){
           var thistext = $(this).text();

           	if(thistext.indexOf(v)==-1) $(this).hide();
           	else $(this).show();


      });
    

       if(setfirst=='y')    $(".staeffect option:first").show().attr('selected','true');
    

 }*/

</script>
