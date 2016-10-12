<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

 
 

 if($act=='insert')
 {
	
  if(strlen($abc1)<2) {alert('请输入区块说明！');  jump($jumpvpf.'&act=add'); }
			 
 $pidnamesub='block'.$bshou;
$ss = "insert into ".TABLE_REGION." (pid,pidname,pbh,name,lang,dateedit) values ('$pidname','$pidnamesub','$user2510','$abc1','".LANG."','$dateall')";
			//echo $ss;exit;
			iquery($ss);	

			$jumpvp = $jumpvp.'&file=list';		
			jump($jumpvp);			
 }
  if($act=='update')
 {
  if($abc1=="" or strlen($abc1)<2) {alert('请输入区块说明！');  jump($jumpvpf.'&act=edit&tid='.$tid); }
			 
       $despcontent = zbdesp_onlyinsert($_POST['despcontent']);

 $despjj=zbdespadd2($abc12); 


//usr linkcss,not use linkstyle
 $ss = "update ".TABLE_REGION." set name='$abc1',cssname='$abc2',bgcolor='$abc3',bgimg='$abc4',sta_bgpara='$abc5',wrap='$abc6',linkurl='$abc7',linktitle='$abc8',linkcss='$abc9',linkposi='$abc10',effect='$abc11',despjj='$despjj',titlestyle='$abc13',titleimg='$abc14',titlestylesub='$abc15',blockid='$abc16',desptext='$abc17',desp='$despcontent',dateedit='$dateall' where id='$tid' $andlangbh limit 1";
			iquery($ss); 	
			$jumpvp = $jumpvpf.'&act=edit&tid='.$tid;		
			jump($jumpvp);			
 }
 


 
  if($act=='add')
 {
	$jumpv_insert = $jumpvpf.'&act=insert';
	$titleh2='添加区块';

	$name='';
$cssname='';
$clear='';
$linkurl='';$effect='';
$blockid='';
 

 }
 
 if($act=='edit')
 {
	$jumpv_insert = $jumpvpf.'&act=update&tid='.$tid;
	$titleh2='修改区块';
	$sql = "SELECT * from ".TABLE_REGION."  where id='$tid' $andlangbh order by id limit 1";
$row = getrow($sql);

$pidnamesub=$row['pidname'];
$name=$row['name'];
$cssname=$row['cssname'];$sta_bgpara=$row['sta_bgpara'];
$wrap=$row['wrap'];
$linkurl=$row['linkurl'];$linkcss=$row['linkcss'];$linkposi=$row['linkposi'];$linktitle=$row['linktitle'];

$effect=$row['effect'];
$blockid=$row['blockid'];
$despjj=zbdespedit($row['despjj']);
$bgcolor=$row['bgcolor'];
$bgimg=$row['bgimg'];
$titlestyle=$row['titlestyle'];$titleline=$row['titleline'];$titleimg=$row['titleimg'];
$titlestylesub=$row['titlestylesub'];

$desp=zbdesp_imgpath($row['desp']);
$desptext=zbdesp_imgpath($row['desptext']);

 }
 
?>


<h2 class="h2tit_biao"> <?php echo $titleh2?> </h2>

<form  onsubmit="javascript:return checkhere(this)" action="<?php echo $jumpv_insert;?>" method="post">
  <table class="formtab">
    <tr>
      <td width="20%" class="tr">区块说明：</td>
      <td width="78%"> <input name="name" type="text" value="<?php echo $name?>" size="80">
<?php echo $xz_must;?>(当标题用)
        </td>
    </tr>

	

<?php if($act=='edit') {?>


   

	<tr style="background:#fcf6ee">
      <td class="tr">区块的样式 </td>
      <td> 
      css名称： 
    <input name="cssname" type="text" value="<?php echo $cssname?>" class="inputcss" size="40">
<?php echo $xz_maybe;?>     
 
	  <br />
    说明：定义好css名称后，可以使用css文件的样式。
<br />参考：<span class="cgray">绝对层:poa | 相对层:por | 左对齐:fl | 右对齐:fr  | 清浮动:c  |更多请参考当前模板的用到的css文件</span>
<div style="border-top:1px solid #ccc;padding:5px 0">

	 
         框的背景色：<input name="bgcolor" type="text" value="<?php echo $bgcolor?>" size="15">(<a target="_blank" href="http://www.demososo.com/color.html">配色方案</a>)
        <div class="inputclear"> </div>
        框的背景图片：<input name="bgimg" type="text" value="<?php echo $bgimg?>" size="50">
          (<a href="../mod_imgfj/mod_imgfj.php?pid=name&lang=<?php echo LANG?>" target="_blank">上传图片</a>)
          <div class="inputclear"> </div>
           是否视觉差：<select name="imgpara"> <?php select_from_arr($arr_yn,$sta_bgpara,'plsno');?>
     </select>

</div>
        </td>
    </tr>

  <tr>
      <td class="tr">区块类型：</td>
      <td>
    
       <select name="wrap">

         <?php select_from_arr($arr_wrap,$wrap,'plsno');?>
     </select> 
<br /> （默认情况下类型为"普通"）

<?php  
if($wrap=='clear') echo '<br /> 当前选择：<span class="cyel">分隔清行</span> ，则下面的选项会无效。';
if($wrap=='divbegin') echo '<br /> 当前选择：<span class="fb cred">div开头</span> ，则下面的选项会无效。';
if($wrap=='divend') echo '<br /> 当前选择：<span class="fb cred">div结尾</span> ，则下面的选项会无效。';
 
?>
 
        </td>
    </tr>


<tr style="background:#fcf6ee"> <td  class="tr">关于更多链接：</td>
      <td width="78%">
      链接网址： <input name="linkurl" type="text" value="<?php echo $linkurl?>" size="60">
<?php echo $xz_maybe;?> （ 如果有值，则会出现 链接）

 <div class="inputclear"> </div>
 链接的字样：<input name="linktitle" type="text" value="<?php echo $linktitle?>" size="80">
<?php echo $xz_maybe;?> （ 可以填写‘查看详情’，如果不填，则为 ‘更多’）
 <div class="inputclear"> </div>
 链接的css名称：<input class="inputcss" name="linkcss" type="text" value="<?php echo $linkcss?>" size="30">
<?php echo $xz_maybe;?> 
 

 <div class="inputclear"> </div> 
 链接的位置：<select name="linkposi">  
   <?php select_from_arr($arr_linkposi,$linkposi,'plsno');?>
     </select> 

        </td>
    </tr>

 
  <tr  style="background:#DBF2FF">
      <td  class="tr">效果：</td>
      <td > 
    <select name="effect">  
   <?php select_from_arr($arr_blockeffect,$effect,'plsno');?>
     </select> 
     <?php echo $xz_must?>
    

        </td>
    </tr>
   

 <tr  style="background:#DBF2FF">
      <td  class="tr">其他：</td>
      <td > 
       <div style="background:#E3DEBE;">如果上面<span class="cred">选择居中的效果</span>，可以再加这些属性：</div>

       
        <div>副标题：</div> 
        <textarea name="despjj" cols="130" rows="3"><?php echo $despjj?></textarea>
      
 
 <div style="background:#E3DEBE;margin-top:10px">标题修饰：</div>
 
     标题的样式：<input class="inputstyle" name="titlestyle" type="text" value="<?php echo $titlestyle?>" size="85">    
     <div class="inputclear"> </div>
     标题用图片代替：<input name="titleimg" type="text" value="<?php echo $titleimg?>" size="50"> 
         (<a href="../mod_imgfj/mod_imgfj.php?pid=name&lang=<?php echo LANG?>" target="_blank">上传图片</a>)
 
  <div class="inputclear"> </div>
   副标题的样式：<input class="inputstyle" name="titlestylesub" type="text" value="<?php echo $titlestylesub?>" size="85"> 

        </td>
    </tr>
    





	<tr>
      <td class="tr">标识：</td>
      <td> <br /><input name="blockid" type="text" value="<?php echo $blockid?>" size="40">
<?php echo $xz_maybe;?>  
<br />
<?php echo check_blockid($blockid);?>
        </td>
    </tr>



   <tr>
      <td class="tr">内容：


      </td>
      <td> 
      <p class="cred">提示，如果上面 <strong>标识</strong> 有内容，则这里编辑器的内容在前台不会显示。</p>

	  <p><a href="../mod_imgfj/mod_imgfj.php?pid=<?php echo $pidnamesub;?>&lang=<?php echo LANG;?>" target="_blank">编辑器附件管理(<?php echo num_imgfj($pidnamesub);?>)</a></p>
 
 <?php require_once('../plugin/editor_textarea.php');//textarea is in this file?>
	
</td> 
    </tr>


<?php } ?>
 
<tr>
      <td></td>
      <td>
      <input  class="mysubmit" type="submit" name="Submit" value="<?php echo $titleh2;?>"></td>
    </tr>
  </table>
</form>
 
 

 
<script>
function checkhere(thisForm) {
   if (thisForm.name.value==""){
		alert("请输入区块说明。");
		thisForm.name.focus();
		return (false);
	}

     
  

 
   // return;

}
 

</script>

