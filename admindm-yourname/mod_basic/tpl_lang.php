<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

$sqlmain = "SELECT * from ".TABLE_LANG." where   sta_main='y' and pbh='".USERBH."' order by id limit 1";
//echo $sqlmain;
		//echo getnum($sqlmain);
		if(getnum($sqlmain)==0){
		  $errortextlang = '提示：目前没有主语言，网站必须要有一个主语言，请在 “语言设置” 里选一个。';
		   alert($errortextlang);
		   echo '<p style="background:red;color:#fff">'.$errortextlang.'</p>';	
		}
		
		
	
?>
<h2 class="h2tit_biao">管理列表</h2>
<div style="padding:10px 30px;width:1200px">

<?php if($superadmin=='y'){?>
<div class="menu"><a style="display:none2" href="<?php echo $jumpv.'&file=addedit&act=add'?>">添加多语言</a></div>
<?php }?>

 <?php 
    if(mainlangnum()>1) echo '<p class="box_hint">出错提示：只能设置一个语言为主语言。请把其它的修改为非主语言。</p>';
 
 
 ?>
 
<!-- <p class="patb10">中文时，如果繁体值为"是"，则表明会自动生成繁体网站。
<br /><span class="cred fb">提示：后台已经实现了多语言功能，但是前台需要定制才能实现。</span>
 -->
</p>
<form method=post action="<?php echo $jumpv;?>&act=pos">
 <table class="formtab">    
<tr class="formtitle">
<td width="100" align="center">排序号</td>
<td width="100" align="center">语言说明</td>
<td width="100">语言标识<br />(不能修改)</td>
<td width="80" align="center">是否主语言</td>
<td width="180">网站设置内容</td>
<td width="150">修改</td>
<td>状态</td>
</tr>
<?php
 $sql = "SELECT * from ".TABLE_LANG." where pbh='".USERBH."' order by pos desc,id";
$rowlist = getall($sql);
if($rowlist=='no') echo '暂无内容';
else{
foreach($rowlist as $v){
$name=$v['name'];
$tid=$v['id'];
$lang=$v['lang']; $pidname=$v['pidname']; 
$path=$v['path']; 
$sta_visi_v=$v['sta_visible']; 
$sta_big5=$v['sta_big5']; 
$sta_main=$v['sta_main']; 
$cssdir=$v['cssdir']; 
$htmldir=$v['htmldir']; 
 
if($lang=='cn'){
	//$sta_big5_v = '<br />繁体：'.select_return_string($arr_yn,0,'',$sta_big5).'<br />'.menu_changesta22($sta_big5,$jumpv,$tid,'sta_big5');;
	$sta_big5_v = '';
}
else $sta_big5_v='';

if($sta_main=='y'){
	$sta_main_v = '<span class="cred">主语言</span>';
	$setdefault='';
}
else {$sta_main_v='';
$jumpv_file = 'mod_lang.php?lang='.$lang;
 $setdefault= " <a href=javascript:setdefault('setdefault','$tid','$jumpv_file','一个网站只能有一个主语言！确认要设置此语言为主语言？')  class=but2>设为主语言</a>";
}

 
 $siteinfo = '网站名称：<span class="cgray">'.$v['sitename'].'</span>'; 
 // $siteinfo .= '<br />css目录：<span class="cgray">'.$cssdir.'</span>'; 
   //$siteinfo .= '<br />html目录：<span class="cgray">'.$htmldir.'</span>'; 
   // $siteinfo .= '<br />SEO标题：<span class="cgray">'.$v['seo1'].'</span>'; 
      //$siteinfo .= '<br />SEO关键字：<span class="cgray">'.$v['seo2'].'</span>';  
       // $siteinfo .= '<br />SEO描述：<span class="cgray">'.$v['seo3'].'</span>'; 


//$urlcan='type='.$type;

 menu_changesta($sta_visi_v,$jumpv,$tid,'sta');

 $edit_desp = '<a class="but1" href="'.$jumpv.'&file=set&act=edit&tid='.$tid.'">网站设置</a>  | ';
 $edit_desp2 = '<a class="but2" href="'.$jumpv.'&file=addedit&act=edit&tid='.$tid.'">语言设置</a>';

 
 echo '<tr '.$tr_hide.'>';
echo '<td align="center"><input type="text" name="'.$tid.'"  value="'.$v['pos'].'" size="5" /></td>';
  echo '<td>'.$name.$sta_big5_v;
  echo '<br />访问路径：<span class="cgray">'.$path.'</span></td>';
 
echo '<td>'.$lang.'</td>';

 echo '<td align="center">'.$sta_main_v.$setdefault.'</td>';
   echo '<td>'.$siteinfo.'</td>';
  echo '<td>'.$edit_desp.$edit_desp2.'</td>';
   echo '<td>'.$sta_visible.'</td>';
 echo '</tr>';
}
}
?>
</table>
<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
</form>
 