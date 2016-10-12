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
	 
     $sqltextlist = "SELECT * from ".TABLE_NODE." where $catid_v and modtype='blockdh' $andlangbh order by pos desc,id desc"; 
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
if($num_rows==0) {echo '<br><br>没有找到相关内容。';
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
<div style="padding:5px;display:none">
  <form id="search_form" action="mod_node.php?lang=<?php echo LANG?>&catpid=<?php echo $catpid?>&catid=<?php echo $catid?>&page=<?php echo $page?>" method="post" accept-charset="UTF-8">         
  <input class="navsearch_input" type="text" name="searchword" value="请输入文章标题" style="width:350px;padding:5px;" onfocus="javascript:this.value='';" /> 
  <input type="submit" name="Submit" value="搜索" class="searchgo" style="padding:5px 10px;cursor:pointer" />
  </form> 
  </div>
  
<form method=post action="<?php echo $jumpv_catid;?>&act=pos">
  <table class="formtab formtabhovertr">
  <tr style="font-weight:bold;background:#eeefff">
  <td width="80" align=center>排序号</td>
    <td width="250" align=center>标题</td>
   <td width="100" align=center>kv图(大图)</td>
   <td width="100" align=center>缩略图(小图)</td>
   <td width="100" align=center>缩略图2(小图2)</td>
  <td width="100" align=center>icon图标</td>
    <td width="100" align=center></td>

    <td width="100">状态</td>
  
  </tr>
  <?php

        foreach($rowlisttext as $v){
		//echo print_r($rowlist,1);
		
            $tid = $v['id'];
			$name = '<strong>'.$v['title'].'</strong>';
			$cssname = $v['cssname'];
			$dateedit = $v['dateedit'];
      $desptext = $v['desptext'];$desp = $v['desp'];$despjj = $v['despjj'];
      
         $blockcntid = $v['blockcntid'];
       $iconimg = $v['iconimg'];
      $linkurl = $v['linkurl'];
			$day =' ['.$v['dateday'].']';
			$pid = $v['pid'];
			$pidname = $v['pidname'];
      
           $kv = $v['kv']; $kvsm = $v['kvsm'];  $kvsm2 = $v['kvsm2']; 
			$alias = alias($pidname,'node');
			
			$sta_noaccess = $v['sta_noaccess'];
			
$url = url('node',$alias,$tid,'');
 
 
// if($kvsm<>""){
// 	   $imgsmall_src= get_thumb($kvsm,$name,'div');
// $imgsmall ='<span class="fl nodekvsm"><a target="_blank"  href="mod_node_edit.php?lang=cn&tid='.$tid.'&act=list&file=editkvsm">'. $imgsmall_src.'</a></span>';
// }
// else $imgsmall='<span class="cgray">无缩略图</span>';




//
 


//----------------------

 menu_changesta($v['sta_visible'],$jumpv_catid,$tid,'sta_node');
 
$edit_text= "<a class='but1' href='$jumpv_edit&tid=$tid&act=edit'>修改参数</a>";
 
 
 //$del_text= "<a href=javascript:delself('$PHP_SELF','$tid')  class=but2>删除</a>";
$del_text= " <a href=javascript:del('delnode','$pidname','$jumpv_catid')  class=but2>删除</a>";

// if(substr($dateedit,0,10)==$dateday){
// $name="<span class=cred $titlecss_v>$name</span>";
// $namesm="<br /><br /> <span class=cred>(红色标题表示今日修改)</span>";
// $dateedit="<span class=cred>$dateedit</span>";
// }
    ?>
  <tr <?php echo $tr_hide?>>
  <td align="center"><input type="text" name="<?php echo $tid;?>"  value="<?php echo $v['pos'];?>" size="5" /></td>


    <td align="left">


     标题：<span style="<?php echo $nameday?>"><?php echo $name;?></span><br />
          副标题：<?php echo $despjj;?><br />
           链接：<?php echo $linkurl;?><br />
    
      内容格式：<span class="cgray">
        <?php
       // echo $blockcntid22;
       // pre($arr_blockcnt);
         //if(substr($blockcntid22, 0,6)=='bkcnt_' && $blockid22==''){
           //  echo  '模板： <span class="cgray">';
          echo select_return_string($arr_blockcnt,0,'',$blockcntid);
          //echo  '</span><br />';
        //}
          ?></span>

      <br />
  

  <?php
if($cssname<>'') echo 'css名称：<span class="cgray">'.$cssname.'</span>';
 
  // echo web_despdecode($desp);?> 
 <!--   内容：<div class="cgray"><?php //echo $desp;?></div>
   内容文本：<div class="cgray"><?php //echo $desptext;?></div><br />
 -->
    </td>


<td align="center">
<div class="imgbg1">
<?php 
echo  p2030_imgyt($kv,'y','n');


?>
</div>

<p><a class="needpopup but4 pad8lr" style="width:auto"  href="mod_node_edit_popup.php?lang=<?php echo LANG?>&tid=<?php echo $tid?>&file=editkv">修改kv图</a></p>
 </td>


<td align="center">
<div class="imgbg1">
<?php 
if($kvsm<>'')
echo   get_thumb($kvsm,'','div');
?>
</div>
<p><a class="needpopup but4 pad8lr" style="width:auto" href="mod_node_edit_popup.php?lang=<?php echo LANG?>&tid=<?php echo $tid?>&file=editkvsm">修改缩略图</a></p></td>

<td align="center">
<div class="imgbg1"><?php 
if($kvsm2<>'')
echo   get_thumb($kvsm2,'','div');
?>
</div>
<p><a class="needpopup but4 pad8lr" style="width:auto" href="mod_node_edit_popup.php?lang=<?php echo LANG?>&tid=<?php echo $tid?>&file=editkvsm2">修改缩略图2</a></p>
</td>

  <td align="center">
  <?php echo web_despdecode($iconimg)?>
  </td>


  <td align="center"><?php echo $edit_text.' |   '.$del_text;?></td>

    <td> <?php   echo $sta_visible;?></td>
    
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

 