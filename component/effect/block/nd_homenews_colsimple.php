
 <?php 

  $pidshort = substr($pid,0,4);  
      if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
      else  $sqlv=" pid='$pid' ";
//if($pidshort=='csub')  echo '<h5>出错，此效果只限于主分类，不能用子分类。 </h5>';

 $sqlall="select * from ".TABLE_NODE." where sta_visible='y'  and $sqlv  $andlangbh  order by pos desc,id desc limit $maxline";

 //  echo $sqlall;
    if(getnum($sqlall)>0){

        $result = getall($sqlall);
   ?>
    <div class="newscolsimple newstab ">
    <?php 
   foreach ($result as $k22 => $v22) {
                           $tid=$v22['id'];
                            $title=$v22['title'];  
                             $pidname=$v22['pidname'];
                              $kv=$v22['kv'];   
                            $alias=alias($pidname,'node');  
                            $url = url('node',$alias,$tid,'');

                             
                            if($kv=='') $addr2 = DEFAULTIMG;
                            else $addr2 =  get_img($kv,$title,'nodiv');

          $dateday=substr($v22['dateedit'],0,10);

                                      $despjj= web_despdecode($v22['despjj']);

                                      $desp= web_despdecode($v22['desp']);
                                      $desptext= web_despdecode($v22['desptext']);
                                      $despv='';
                                      if($desptext<>'') $despv = $desptext;
                                      else  $despv = $desp; 

                                      if($despjj==''){
                                        
                                        $despv22 = mb_substr(strip_tags($despv),0,110,'UTF-8').'......';
 
                                      }
                                        else {$despv22 = $despjj;}

                     

if($k22==0){
    ?>

      <div class="mainleft fl col40">
           <div class="img">
             
             <a href="<?php echo $url?>"><img class="perimg100" src="<?php echo $addr2?>" alt="<?php echo $title?>" /></a>
           </div>
           <div class="title">
                   <span class="dateday"><?php echo $dateday ?></span>
                   <a href="<?php echo $url?>"><?php echo $title?></a>
           </div>
          <p class="despjj"><?php echo $despv22?></p>
      </div>

      <div class="sublist fr col55">
        <ul>
        <?php } else { ?>

           <li>
             <span class="dateday"><?php echo $dateday ?></span>
             <a href="<?php echo $url?>"><?php echo $title?></a>
              <p class="despjj" style="display:block"><?php echo $despv22?></p>
           </li>
           <?php } 

           }
           ?>
        </ul>

      </div>
 </div>   <!--end newscolsimple-->
 <?php 

     }
 else { echo ' 子分类 ----- 暂无内容，请在后台确定内容是否处于隐藏状态。 ';}
    
     ?>
     