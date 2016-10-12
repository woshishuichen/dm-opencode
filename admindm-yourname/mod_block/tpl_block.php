<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 if($act=='update')
 {
     	
 }
 
 

 if($act=='list')
 {
 
?>

 
<h2 class="h2tit_biao">管理列表  </h2>



<?php
    //and stylebh= '$stylebh' ---cancel

        $sqlimg = "SELECT * from ".TABLE_BLOCK." where pid='vblock'  $andlangbh order by pos desc,id desc";
		//echo $sqlimg;exit;
        $rowimglist = getall($sqlimg);
        if($rowimglist=='no') {echo '<p style="padding:10px">还没有内容，请添加</p>';
        }
        else{

?>
<form method=post action="<?php echo $jumpvpf;?>&act=possub">
<table class="formtab">
  <tr><td width="100">排序</td>
      <td width="150"> 图片</td>
       <td width="400"> 信息</td>
 
         <td width=""> 操作</td>
        
  </tr>


  <?php
foreach($rowimglist as $v){
 $tid = $v['id'];
 $name = $v['name'];  $sta_name = $v['sta_name']; 
 $imgsmall = $v['kv'];
 
 $dateedit = $v['dateedit'];
 $linkurl = $v['linkurl'];
  $blockcntid = $v['blockcntid'];  
  $pidnamehere = $v['pidname'];

  if($v['sta_visible']=='n') $staclass=' style="background:#ddd;"';
 else $staclass=''; 
  menu_changesta($v['sta_visible'],$jumpvpf,$tid,'sta_lunh');
  
 
 
$edit_text= '<a class="but1" href="'.$jumpv.'&file=edit&act=edit&tid='.$tid.'">修改</a>';
$del_text= "<a href=javascript:delimg('delimg','$tid','$imgsmall','$jumpv')  class='but2'>删除</a>";
//$movelink='<a class=but1  href='.$jumpvp.'&file=move&act=edit&tid='.$tid.'>转移</a>';
 	

if(substr($dateedit,0,10)==$dateday){
$nameday='color:red';
//$dateedit="<span class=cred>$dateedit</span>";
}else $nameday='';
 
if($imgsmall=='') $imgsmall2 = '无图片';
else  $imgsmall2 = p2030_imgyt($imgsmall,'y','n');
    ?>
    <tr <?php echo $staclass;?>>
      <td>  <input type="text" name="<?php echo $tid;?>"  value="<?php echo $v['pos'];?>" size="3" /></td>  
    
          <td style="background: #f1f1df">  
              <?php echo $imgsmall2;?></td>
          
          <td> 标题：<span style="<?php echo $nameday?>"><?php echo $name;?></span><br />
           链接：<?php echo $linkurl;?><br />
          <?php //if($pidname=='group_i20160101_0932453193') echo '模板：';
                //else echo '标识：';
          ?>           

          模板： 
          <span class="cgray">
          <?php 
            if($sta_name=='y') echo '(显示标题) ';
            else echo '(不显示标题) ';


         if(substr($blockcntid, 0,6)=='bkcnt_') echo select_return_string($arr_blockcnt,0,'',$blockcntid);
           else echo select_return_string($arr_singleblock,0,'',$blockcntid);
           // echo get_fieldnolang(TABLE_BLOCK,'name',$effect,'pidname');
          ?></span><br />
 

      
           <?php 
         //   if($pidname == 'group_i20160101_0932453193'){
               echo '标识：<span class="cblue">'.$pidnamehere.'</span>';
         //  }
           ?>
     
       </td>  
    

        <td> <?php echo $edit_text.' | '.$del_text ;?></td>
        
  </tr>
  
 
<?php
    } ?> 
</table>
 

<div style="padding-bottom:22px"><input class="mysubmit" type="submit" name="Submit" value="修改排序" /><?php echo $sort_ads_f;?><br /><br /> <span class="cred">(红色标题表示今日修改)</span></div>
</form>
 

<?php
}
}
?>
 