
<?php 
// kvimg and thumb,for pop up



?>

<div style="text-align:center;border:1px solid #ccc;padding:8px;margin-bottom:20px">
<?php 
echo  p2030_imgyt($kv,'y','n');

?>

<p><a class="needpopup but1 pad8lr" style="width:auto"  href="mod_node_edit_popup.php?lang=<?php echo LANG?>&tid=<?php echo $tid?>&file=editkv">修改kv图片</a></p>
</div>





<div style="text-align:center;border:1px solid #ccc;padding:8px;margin-bottom:20px">
<?php 
if($kvsm<>'')
echo   get_thumb($kvsm,'','div');
?>
<p><a class="needpopup but1 pad8lr" style="width:auto" href="mod_node_edit_popup.php?lang=<?php echo LANG?>&tid=<?php echo $tid?>&file=editkvsm">修改缩略图片</a></p>
</div>





<div style="text-align:center;border:1px solid #ccc;padding:8px;margin-bottom:20px">
<?php 
if($kvsm2<>'')
echo   get_thumb($kvsm2,'','div');
?>
<p><a class="needpopup but1 pad8lr" style="width:auto" href="mod_node_edit_popup.php?lang=<?php echo LANG?>&tid=<?php echo $tid?>&file=editkvsm2">修改缩略图片(张二张)</a></p>
<p class="cgray">第二张很少用，只适用于个别的效果模板</p>
</div>

