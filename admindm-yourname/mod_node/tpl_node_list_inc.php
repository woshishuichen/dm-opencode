<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<?php
 
  $key = @htmlentities($_POST['searchword']); 
 if($key == "") $keyV="" ;
     else $keyV="and title like '%$key%'" ;   

 if($catid=="") $catid_v="ppid='$catpid' ".$keyV ;
     else $catid_v="ppid='$catpid' and pid='$catid' ".$keyV ;
	 
     $sqltextlist = "SELECT * from ".TABLE_NODE." where $catid_v  $andlangbh order by pos desc,id desc"; //pos desc,id desc
	//echo $sqltextlist;
    /*begin page roll*/
     $num_rows = get_numrows($sqltextlist);
     if($num_rows>0){
 
        $offset=5;
        $page_total=ceil($num_rows/$maxline); //maxline is in mod_node.php

        if (!isset($page)||($page<=0)) $page=1;
        if($page>$page_total) $page=$page_total;
        $start=($page-1)*$maxline;
        $sqltextlist2="$sqltextlist  limit $start,$maxline";  
        $rowlisttext = getall($sqltextlist2); 
     }//end $num_rows>0

/*end page roll*/
/*begin list news*/
if($num_rows==0) {echo '<br><br>没有找到相关内容，请添加。<br><br>注意：<br>这里和前台不一样，只显示当前分类的内容，不会显示子分类的内容。<br><br>如果要显示所有子分类的内容，请点击左侧的 管理列表 链接<br><br>';
echo '</div><div class=blank></div>';
}
    else {
 ?>
 <script>
 /*
function  delself(vlink,tid){
    b="<?php //echo $urlcan ;?>";
    //  alert(b);
    if (confirm("确定删除?不能恢复")){
       window.location=vlink+'?act=del&tid='+tid+'&'+b;
    }
}*/
</script>
<div style="padding:5px">
  <form id="search_form" action="mod_node.php?lang=<?php echo LANG?>&catpid=<?php echo $catpid?>&catid=<?php echo $catid?>&page=<?php echo $page?>" method="post" accept-charset="UTF-8">         
  <input class="navsearch_input" type="text" name="searchword" value="请输入文章标题" style="width:350px;padding:5px;" onfocus="javascript:this.value='';" /> 
  <input type="submit" name="Submit" value="搜索" class="searchgo" style="padding:5px 10px;cursor:pointer" />
  </form> 
  </div>
  
<form method=post action="<?php echo $jumpv_catid;?>&act=pos">
  <table class="formtab formtabhovertr">
  <tr style="font-weight:bold;background:#eeefff">
  <td width="80" align=center>排序号</td>
   <td width="80" align=center>缩略图</td>
    <td width="460" align=center>标题</td>
    <td width="220" class=proname></td>

    <td width="100">状态</td>
  <td width="120">时间</td>
  </tr>
  <?php

        foreach($rowlisttext as $v){
		//echo print_r($rowlist,1);
		
            $tid = $v['id'];
			$name = '<strong>'.$v['title'].'</strong>';
			$titlecss = $v['titlecss'];
			$dateedit = $v['dateedit'];
			$day =' ['.$v['dateday'].']';
			$pid = $v['pid'];
			$pidname = $v['pidname'];$alias_jump = $v['alias_jump'];
      $downloadurl = $v['downloadurl'];$videourl = $v['videourl'];
            $kv = $v['kv']; $kvsm = $v['kvsm']; $kvsm2 = $v['kvsm2'];
			$alias = alias($pidname,'node');
			
			$sta_noaccess = $v['sta_noaccess']; 
      $sta_new = $v['sta_new'];$sta_tj = $v['sta_tj'];
			
//$url = url('node',$alias,$tid,$alias_jump);
 
//$urlname = '<a style="color:#999" target="_blank" href="'.$userurl.$url.'">前台预览:'.$url.'</a>';
$urlname = getlink($pidname,'node','admin',$class='');

if($kvsm<>""){
	   $imgsmall_src= get_thumb($kvsm,$name,'div');
//$imgsmall ='<span class="fl nodekvsm"><a target="_blank"  href="mod_node_edit.php?lang=cn&tid='.$tid.'&act=list&file=editkvsm">'. $imgsmall_src.'</a></span>';
     $imgsmall ='<span class="fl nodekvsm">'. $imgsmall_src.'</span>';

}
else $imgsmall='<span class="cgray">无缩略图</span>';

 

$sta_access_v = $sta_noaccess=='y'?'<span class="cred">(禁止访问)</span>':'';
$sta_new_v = $sta_new=='y'?'<span class="cred">(最新)</span>':'';
$sta_tj_v = $sta_tj=='y'?'<span class="cred">(推荐)</span>':'';
 

if($titlecss=="y"){
	   $titlecss_v= '';
}
else   $titlecss_v= ' style="'.$titlecss.'"';

// if($kv<>""){
//      $kv2= ' | <a target="_blank" href="mod_node_edit.php?lang=cn&tid='.$tid.'&act=list&file=editkv"><span class="cred">(有kv)</span></div>';

// }
// else   $kv2= '';

//
 
$sqlalbum = "SELECT id from ".TABLE_ALBUM." where pid='$pidname' $andlangbh order by id desc";//$pidname is in pro-modnews.php 
$num_abm = ' | <a target="_blank" href="mod_node_edit.php?lang=cn&tid='.$tid.'&act=list&file=editalbum">[相册图片有<span class="cred">'.getnum($sqlalbum).'</span>个]</a>';
//
 
$num_imgfj = ' | [编辑器附件有'.num_imgfj($pidname).'个]';

//----------------------

 menu_changesta($v['sta_visible'],$jumpv_catid,$tid,'sta_node');
 
//$edit_text= "<a class='but1' href='mod_node_edit.php?lang=".LANG."&act=editcan&tid=$tid&file=editcan' target='_blank'>修改标题</a>";
$edit_text2= "<a class='but1' href='mod_node_edit.php?lang=".LANG."&act=editdesp&tid=$tid&file=editdesp' target='_blank'>修改</a>";
 
 //$del_text= "<a href=javascript:delself('$PHP_SELF','$tid')  class=but2>删除</a>";
$del_text= " <a href=javascript:del('delnode','$pidname','$jumpv_catid')  class=but2>删除</a>";

if(substr($dateedit,0,10)==$dateday){
$name="<span class=cred $titlecss_v>$name</span>";
$namesm="<br /><br /> <span class=cred>(红色标题表示今日修改)</span>";
$dateedit="<span class=cred>$dateedit</span>";
}
    ?>
  <tr <?php echo $tr_hide?>>
  <td align="center">
  <input type="text" name="<?php echo $tid;?>"  value="<?php echo $v['pos'];?>" size="5" />
<?php //if($sta_sticky=='y') echo '<p class="cgray">置顶</p>'?>
  </td>
<td align="center"><?php echo $imgsmall?> </td>
    <td align="left"><?php
     //   $pidname=decode(web_getcatname2($pid));
        $catname = get_field(TABLE_CATE,'name',$pid,'pidname');
        $pidlink="<a href='$jumpv&catid=$pid' title='显示这个分类'>[$catname]</a>";
    echo $pidlink.' '.$name.'<br />'.$day.$num_imgfj.$num_abm.$sta_access_v.$sta_new_v.$sta_tj_v;
    if($kv<>"") echo '<span class="cred">(有kv)</span>';
    if($kvsm2<>"") echo '<span class="cred">(有小图2)</span>';
    echo '<br />'.$urlname;

if($downloadurl<>'') echo ' <span class="cgray">[有资料下载]</span>';
if($videourl<>'') echo ' <span class="cgray">[有视频地址]</span>';

 
    ?>



    </td>
    <td ><?php echo  $edit_text2.' | '.$del_text;?></td>

    <td> <?php   echo $sta_visible;?></td>
    <td> <?php echo $dateedit;?></td>

  </tr>
<?php

    } ?>
</table>


<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="修改排序" /><?php echo $sort_ads_f.$namesm?></div>
</form>

<?php 

require_once HERE_ROOT.'plugin/page_2010.php';
    }
?>

 