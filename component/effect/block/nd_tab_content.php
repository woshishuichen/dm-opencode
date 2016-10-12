 <?php 

    $sqlall="select * from ".TABLE_NODE." where pid='$pid'  and sta_visible='y'  $andlangbh  order by pos desc,id desc";
  //  echo $sqlall;
    if(getnum($sqlall)>0){
        $result = getall($sqlall);
 $rand = rand(10000,99999);
     ?>

        <div class="tabs_wrapper tabs_echocontent<?php if($cssname<>'') echo ' '.$cssname?>">

                        <div class="tabs_switchbyid tabs_switchcss">
                            <?php 
                              foreach ($result as $k => $v) {
                                if($k=='0') $active = ' active';
                                else $active = '';
                                echo '<div id="item'.$rand.$k.'" class="tabs_item'.$active.'">'.$v['title'].'</div>';
                                 
                              }
                            ?>
                        </div><div class="tabs_content">

              <?php 
                              foreach ($result as $k => $v) {
                                   if(strpos($cssname, 'playall')>1)  $display = '';//when tab content is bxslider,need block
                                   else {
                                  if($k=='0') $display = 'display:block';
                                  else $display = 'display:none';
                                    }                                   

                                  $name = $v['title'];//$sta_name = $v['sta_title'];
                                     // $blockid = $v['blockid'];
                                     $blockcntid = $v['blockcntid'];
                                     $more = $v['linktitle'];
                                     $cssname = $v['cssname'];//node cssname,not nodelist cssname

  $imgsmall = $v['kv'];
       if($imgsmall=='') $imgv='';
       else{
           $imgv = UPLOADPATHIMAGE.$imgsmall; 
          $imgv2 = '<img class="perimgmax100" src="'.$imgv.'" alt="'.$name.'" />'; //use onledesp...

      }
  

$morev = $more<>''?$more:TEXTMORE;

$linkurl = $v['linkurl'];  
$linkurlv ='';
if($linkurl<>'')  $linkurlv ='<div class="bkmore dmbtn"><a  '.linktarget($linkurl).' class="more" title="'.$name.'" href="'.$linkurl.'">'.$morev.'</a></div>';


                                

    $despjj= $v['despjj'];
                    $desp= web_despdecode($v['desp']);
    $desptext= web_despdecode($v['desptext']);
    $despv='';
    if($desptext<>'') $despv = $desptext;
    else  $despv = $desp; 


 $despv='<div class="bkdesp">'.$despv.$linkurlv.'</div>';

    ?>
 <div style="<?php echo $display?>" class="tabs_container item<?php echo $rand.$k?>">                             
  <?php    
$arrblockdata=array(
  'name'=>$name,
  'cssname'=>$cssname,
  'imgv'=>$imgv,
  'despv'=>$despv,
  );

 if(substr($blockcntid, 0,6)=='bkcnt_'){
      if($blockcntid<>'bkcnt_onlydesp') blockcnt($blockcntid,$arrblockdata);
      else echo '<div class="c '.$cssname.'">'.$imgv2.$despv.'</div>';

    }
  

 ?>
                               

 </div>
    <?php }?>
  </div><!--end tab_content-->

   </div>
<?php } ?>
 
 