
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

<div class="c gridkf <?php echo $cssname;?>">
<ul>
<?php 
 foreach($result as $v){
     $tid = $v['id'];
     $title = $v['title']; 
   
      $pidname=$v['pidname']; 
      $kv=$v['kv']; 
      $kvsm=$v['kvsm'];  
       $alias=alias($pidname,'node');  
        $linkurl = url('node',$alias,$tid,'');
        $iconimg=$v['iconimg']; 

 
      if($kvsm<>'') $imgv =  get_thumb($kvsm,$title,'nodiv');//when grid,first kvsm,then kv,then noimg
      else{ 
         if($kv<>'') $imgv = UPLOADPATHIMAGE.$kv; 
         else $imgv = DEFAULTIMG;
      }
 
   
// $despjj= $v['despjj'];
// if($despjj=='') {
//     $desp= web_despdecode($v['desp']);
//       $desptext= web_despdecode($v['desptext']);
//       $despv='';
//       if($desptext<>'') $despv = $desptext;
//       else  $despv = $desp;
//     }
//     else    $despv = $despjj;

//   $despv = mb_substr(strip_tags($despv),0,110,'UTF-8').'......';
 
 if($linkurl<>'') {
   $linkfirst = ' <a target="_blank" title="'.$title.'" href="'.$linkurl.'">';
   $linklast = '</a>';
 }
 else{
  $linkfirst = $linklast = '';
 }



      ?>
<li>
 <?php echo $linkfirst?>
 <img src="<?php echo $imgv?>"  alt="<?php echo $title?>">
 <?php echo $linklast?>
 
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

 