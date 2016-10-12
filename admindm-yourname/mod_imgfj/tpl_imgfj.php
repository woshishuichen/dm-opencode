<?php
/*
	power by JASON.ZHANG  DM建站  www.demososo.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>


 
<h2 class="h2tit_biao"><?php echo $title;?></h2>
 <p style="padding:5px;display:none"><span class="cred">(提示：在IE下，点击框里一下即已复制其内容。)</span><p>
<?php if($act=="list"){
//$maxline=50;
  
    
     $sqlall = "SELECT * from ".TABLE_IMGFJ." where pid='$pid' $andlangbh order by id desc";
	 $rowall = getall($sqlall);
	 //echo $sqlall; 
 /*begin page roll*/	 
	 /*
	  $num_rows = get_numrows($sql);
     if($num_rows>0){
         $offset=5;
        $page_total=ceil($num_rows/$maxline);
        if (!isset($page)||($page<=0)) $page=1;
        if($page>$page_total) $page=$page_total;
        $start=($page-1)*$maxline;

        $sql="$sql  limit $start,$maxline";
        $rowlist = getall($sql);

     }  */
 
//-----------

if($rowall=='no') {
  echo '<p style="padding:99px">暂无内容</p>';
}
    else {
	
 ?>

<table class="formtab">
  <tr>

    <td >
   
  <?php
 foreach($rowall as $v){
$tid = $v['id'];$title = $v['title'];
$imgsmall = $v['kv'];
$dateedit = $v['dateedit'];
$pid= $v['pid'];
 
 
$imgsmall_big=UPLOADPATHIMAGE.$imgsmall;
$imgsmall2 = p2030_imgyt($imgsmall,'y','n');
 //
//menu_changesta($v['sta_visible'],$PHP_SELF,$tid,$catid,$page);
//edit_text= p20_edit_text('修改',$PHP_SELF,$tid,$catid,$page); 
 
$edit_text='<a class="but1" href="'.$jumpv.'&file=edit&act=edit&tid='.$tid.'">修改</a>';
$del_text= "<a href=javascript:delimg('delimg','$tid','$imgsmall','$jumpv')  class='but2'>删除</a>";
		  
		  

//$edit_desp='<a class=but1 href='.$PHP_SELF.'?act=edit&tid='.$tid.'>修改</a>  | <a href=javascript:del("'.$PHP_SELF.'",'.$tid.',"del")  class=but2>删除</a>';
if(substr($dateedit,0,10)==$dateday){

$namesm="<span class=cred>(红色标题表示今日修改)</span>";
$nameclass=' class="cred" ';
}
else {$namesm='';$nameclass='';}

if($pid=='name') $namefj='名称附件';
else $namefj='编辑器附件';
 

    ?><ul style="float:left;width:170px;height:210px;margin:5px;border:1px solid #9BACD7;padding:8px">
 <li <?php echo $nameclass;?> style='height:20px;line-height:18px;overflow:hidden;padding:0'><?php echo $namefj;?></li>
  <li <?php echo $nameclass;?>  style='height:20px;line-height:18px;overflow:hidden;padding:0'><?php echo $title;?></li>
 <li style="height:100px"><?php echo $imgsmall2;?></li>
  <li><?php echo $edit_text.' | '.$del_text;?></li>
   <li>
    <?php if($pid=='name'){?>
    <span class="cred">复制框里内容：</span><input style="background:#C2E8FF" onclick="this.select();document.execCommand('Copy');" type="text" value="<?php echo $imgsmall?>" size="23"><br />
    <?php }else{ ?>
    复制框里内容：<input onclick="this.select();document.execCommand('Copy');" type="text" value="<?php echo $imgsmall_big?>" size="23">
        <?php } ?> </li>

</ul>

<?php

    } //end foreach
	
	?> 
	
	<div class="c"></div> </td></tr>
</table>

<p><?php echo $namesm;?><p>

 
<?php 
}
}
 
?>
