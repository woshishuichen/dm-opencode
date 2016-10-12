<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

?>
<div class="menu">
<a href="<?php echo $jumpv?>&file=add&act=add">添加管理员</a>

</div>
<div class="pro_album_left">

<h3>区块说明  </h3>
<?php
$sql = "SELECT * from ".TABLE_USER." where type='normal'  order by pos desc,id desc";
   //echo $sql;
$rowlist = getall($sql);
 if($rowlist=='no') echo $norr2;
 else{

?>
<form method=post action="<?php echo $jumpvpf;?>&act=pos">
<table class="formtab">
<tr style="background:#3498DB;">
<td width="10%">排序</td> <td width="88%">名称</td>
</tr>
<?php

foreach($rowlist as $vcat){
   $tidcur=$vcat['id']; //tidmain ,not use tid,for conflict in subedit.php
   $email=$vcat['email']; 

   if($tidcur==$tid) $curclass=' style="color:#fff;background:red;padding:3px;" ';
else $curclass=' ';

  $emailv = '<a '.$curclass.' href="'.$jumpv.'&file=edit&act=edit&tid='.$tidcur.'"><strong>'.$email.'</strong></a>';
   
 ?>
<tr>
<td align="center"><input type="text" name="<?php echo $tidcur;?>"  value="<?php echo $vcat['pos'];?>" size="5" /></td>
 <td>  <?php   echo $emailv ;?></td>
</tr>
<?php 
} 
?>
</table>
<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="排序" /><?php echo $sort_ads?></div>
</form>
<?php }?>
</div><!-- end pro_album_left-->
<div class="pro_album_right"> 

<?php
if($file=='' or $file=='list' ) echo '<p class="pad8 f14b cred">请先在左边选择。 </p>';
else  require_once HERE_ROOT.'mod_account/tpl_user_'.$file.'.php';
 

?>
</div>
<div class="c"></div>
