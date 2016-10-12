 <?php 

//   $pidshort = substr($pid,0,4);  
//       if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
//       else  $sqlv=" pid='$pid' ";
// if($pidshort=='csub')  echo '<h5>出错，此效果只限于主分类，不能用子分类。 </h5>';

//  $sqlall="select * from ".TABLE_NODE." where sta_visible='y'  and ppid='$pid'  $andlangbh  order by pos desc,id desc limit $maxline";
 //  echo $sqlall;

   $pidshort = substr($pid,0,4);  
      if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
      else  $sqlv=" pid='$pid' ";
//if($pidshort=='csub')  echo '<h5>出错，此效果只限于主分类，不能用子分类。 </h5>';

 $sqlall="select * from ".TABLE_NODE." where sta_visible='y'  and $sqlv  $andlangbh  order by pos desc,id desc limit $maxline";

    if(getnum($sqlall)>0){
        $result = getall($sqlall);

  //cssname ,dhtrigger in group func
  //css : gridcol gridcol4
if($dhtrigger=='')  $dhtrigger = 'accord'.rand(1000,9999); 
  ?>
<div <?php if($dhtrigger<>'') echo "id=$dhtrigger";?>  class="accord <?php if($cssname<>'') echo ' '.$cssname?>">
<dl>
<?php 
 foreach($result as $v){
     $tid = $v['id'];
     $title = $v['title']; 

 $kv = $v['kv'];
  $kvsm = $v['kvsm'];
  if($kvsm<>'') $imgv =  get_thumb($kvsm,$title,'nodiv');//when grid,first kvsm,then kv,then noimg
  else{ 
     if($kv<>'') $imgv = UPLOADPATHIMAGE.$kv; 
     else $imgv = DEFAULTIMG;
  }

    $desp= web_despdecode($v['desp']);
      $desptext= web_despdecode($v['desptext']);
      $despv='';
      if($desptext<>'') $despv = $desptext;
      else  $despv = $desp;

      ?>    
    <dt><?php echo $title;?></dt>
    <dd>
        <?php 
           if($kv<>'' || $kvsm<>'') echo '<p><img src="'.$imgv.'" alt="" /></p>';
          echo $despv;
          ?>
    </dd>
 <?php
}
 ?>

    </dl>
</div>
 <?php
}
  else{
    echo 'no result ';
  }
 ?>


<script type="text/javascript">
  (function(){

    $('.accord dd').filter(':nth-child(n+4)').addClass('hide');

    $('.accord dl').on('click', 'dt', function() {
      $(this).next().slideToggle(200);
    });
    
   })();
</script> 