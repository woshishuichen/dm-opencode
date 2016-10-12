
 <?php 

  $pidshort = substr($pid,0,4);  
      if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
      else  $sqlv=" pid='$pid' ";
//if($pidshort=='csub')  echo '<h5>出错，此效果只限于主分类，不能用子分类。 </h5>';

 $sqlall="select * from ".TABLE_NODE." where sta_visible='y'  and $sqlv  $andlangbh  order by pos desc,id desc limit $maxline";

 //  echo $sqlall;
    if(getnum($sqlall)>0){
        $result = getall($sqlall);

  //cssname ,dhtrigger in group func
  //css : gridcol gridcol4

     
        ?>

<div class="gridcol <?php echo $cssname;?>">
<ul>
<?php 
 foreach($result as $v){
     $tid = $v['id'];
     $title = $v['title']; 
      $linktitle = $v['linktitle']; 
   
      $pidname=$v['pidname']; 
      $kv=$v['kv']; 
      $kvsm=$v['kvsm'];  
      $modtype=$v['modtype'];  

        

       

if($modtype=='node') {
    $alias=alias($pidname,'node');  
     $linkurl = url('node',$alias,$tid,'');
}
else{
  $linkurl=$v['linkurl']; 
}
      

  if($linkurl<>'') {
   $linkfirst = ' <a target="_blank" title="'.$title.'" href="'.$linkurl.'">';
   $linklast = '</a>';
 }
 else{
  $linkfirst = $linklast = '';
 }

 
if($linktitle=='') $effmore2=$effmore;
else $effmore2=$linktitle;


 $iconimg=$v['iconimg']; 

 
      if($kvsm<>'') $imgv =  get_thumb($kvsm,$title,'nodiv');//when grid,first kvsm,then kv,then noimg
      else{ 
         if($kv<>'') $imgv = UPLOADPATHIMAGE.$kv; 
         else $imgv = DEFAULTIMG;
      }
 
   
$despjj= $v['despjj'];
if($despjj=='') {
    $desp= web_despdecode($v['desp']);
      $desptext= web_despdecode($v['desptext']);
      $despv='';
      if($desptext<>'') $despv = $desptext;
      else  $despv = $desp;
    }
    else    $despv = $despjj;

  $despv = mb_substr(strip_tags($despv),0,110,'UTF-8').'......';
 


      ?>
<li>
 <div class="img">
<?php echo $linkfirst?>
<?php if(strpos($cssname, 'seiconimg')>0){ echo  web_despdecode($iconimg);}
else{?>
 <img src="<?php echo $imgv?>"  alt="<?php echo $title?>">
 <?php }?>
<?php echo $linklast?>
 </div>

<div class="text">
  <h4><a href="<?php echo $linkurl?>"><?php echo $title?></a></h4>

  <?php if(!strpos($cssname, 'nodesp')){?>
  <div class="desp"><?php echo $despv?></div>
  <?php }?>

<?php if($effmore2<>'' and $linkurl<>'' and $modtype=='blockdh') echo '<div class="more"><a href="'.$linkurl.'">'.$effmore2.' <i class="fa fa-angle-right"></i></a></div>';?>
<div class="c"> </div>
</div>

</li>
<?php
}
?>
</ul>
</div>
<div class="c"> </div>
<?php }

else { echo ' 暂无内容，请在后台确定内容是否处于隐藏状态。 ';}
?>

 