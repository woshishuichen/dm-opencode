
<textarea id="kindeditor_id" name="despcontent" style="width:1100px;height:450px;">
<?php  
echo $desp;
?>
</textarea>
 
<script charset="utf-8" src="<?php echo STAPATH;?>app/editor/kindeditor/kindeditor-all.js"></script>
<script charset="utf-8" src="<?php echo STAPATH;?>app/editor/kindeditor/lang/zh_CN.js"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#kindeditor_id',{
                		allowFileManager : true


                });
        });
</script>
 



<div class="cgray">kind编辑器： http://kindeditor.net/</div> 

 

