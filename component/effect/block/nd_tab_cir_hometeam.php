 <?php 
   
  $pidshort = substr($pid,0,4);  
      if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
      else  $sqlv=" pid='$pid' ";
if($pidshort=='csub')  echo '<h5>出错，此效果只限于主分类，不能用子分类。 </h5>';



  $sqlall="select * from ".TABLE_NODE." where sta_visible='y'  and ppid='$pid'  $andlangbh  order by pos desc,id desc limit $maxline";

  //  echo $sqlall;
    if(getnum($sqlall)>0){
        $result = getall($sqlall);
 $rand = rand(1000,9999);
     ?>

        <div <?php if($dhtrigger<>'') echo "id=$dhtrigger";?>  class="tabs_wrapper bxcarousel tabs_cirimg">

                        <div class="tabs_switchbyid">
                            <?php 
                              foreach ($result as $k => $v) {
                                if($k=='0') $active = ' active';
                                else $active = '';
                                    $kvsm = $v['kvsm'];
                                    $name = $v['title'];
                                  
                               if($kvsm=='') $imgv = DEFAULTIMG;
                              else $imgv =  get_thumb($kvsm,$name,'nodiv');

 

                                echo '<a href="#" id="item'.$rand.$k.'" class="tabs_item'.$active.'"><img   src="'.$imgv.'" alt="'.$name.'" /></a>';
                                 
                              }
                            ?>
                        </div>
                        <div class="tabs_content">

              <?php 
                              foreach ($result as $k => $v) { 
                                if($k=='0') $display = 'display:block';
                                else $display = 'display:none';

                                 $name = $v['title'];
                                 $namedesp = $v['despjj'];
                                 $kvsm = $v['kvsm'];
                      if($kvsm=='') $imgv = DEFAULTIMG;
                              else $imgv =  get_thumb($kvsm,$name,'nodiv');

 

                      //  $linkurl = $v['linkurl'];  
                     
                      // if($linkurl<>''){
                      // $linkfirst ='<a target="_blank" title="'.$name.'" href="'.$linkurl.'">';
                      // $linklast ='</a>';}
                      // else {
                      // $linkfirst ='';
                      // $linklast ='';
                      // }

                      $desp= web_despdecode($v['desp']);
                      $desptext= web_despdecode($v['desptext']);
                      $despv='';
                      if($desptext<>'') $despv = $desptext;
                      else  $despv = $desp; 
                     // if(is_int($k/2)){$col1 = 'fl col35';$col2 = 'fr col55';}
                    //  else {$col1 = 'fr col35';$col2 = 'fl col55';}
                                      $col1 = 'fl col35';$col2 = 'fr col55';
                            ?>

                        <div style="<?php echo $display?>" class="tabs_container item<?php echo  $rand.$k?>">
                             
                                <div class="dn480 bigimg <?php echo $col1?>">
                                   <?php //echo $linkfirst?>
                    <img class="perimg" src="<?php echo $imgv?>" alt="<?php echo $name?>">
                    <?php //echo $linklast?>
                 </div>
                                <div class="desp <?php echo $col2?>">
                                        <h3><?php echo $name?></h3>
                                        <h4><?php echo $namedesp?></h4>
                                       <?php echo $despv?>
                                </div>
                               
                        </div>
                        <?php }?>

                        </div>



                    </div>
<?php } 
else{
  echo '暂无内容，请在后台确定内容是否处于隐藏状态。 cate:'.$pid;
  }?>

<script>
$(function(){
    // $('.tabs_cirimg>.tabs_switch').bxSlider({
         $('#<?php echo $dhtrigger?>>.tabs_switchbyid').bxSlider({ 
      auto:false,
        pager:false,
      //  nextText: '<i class="fa fa-angle-right"></i>',
       // prevText: '<i class="fa fa-angle-left"></i>',
        moveSlides : 1,
        minSlides: 2,
        maxSlides: 7,
        slideWidth: 140,
        slideMargin: 15,
        infiniteLoop: false,
        hideControlOnEnd: true
 });


});
</script>
