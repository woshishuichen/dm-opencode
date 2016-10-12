<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
//only use in dh effect,no use vblock......... 'bkcnt_imgleft'=>'图片在左，内容在右',
 //some templage use it ,just search arrblockdata ,like nd_tab_content ... bec linkfirst need add .more
function blockcnt($blockid,$arr){
 //pre($arr);
      $echohere='';
 if($blockid=='bkcnt_imgleft'  || $blockid=='bkcnt_imgrg'){
        if($blockid=='bkcnt_imgleft') {$divfl = ' style="float:left"';$divfr = ' style="float:right"';}
        else  {$divfl = ' style="float:right"';$divfr = ' style="float:left"';}

            $echohere.= '<div class="c col2 bkcntbox '.$arr['cssname'].'">';
            $echohere.= '<div class="w1"'.$divfl.'><img class="perimg100" src="'.$arr['imgv'].'" alt="'.$arr['name'].'" /></div>';
            $echohere.= '<div class="w2"'.$divfr.'>';
  if($arr['sta_name']=='y')  $echohere.= '<h3 class="bktitle">'.$arr['linkfirst'].$arr['name'].$arr['linklast'].'</h3>';
            $echohere.= '<div class="bksubtitle">'.$arr['despjj'].'</div>';
            $echohere.= '<div class="bkdesp">'.$arr['despv'].'</div>';
//if($arr['more']<>'')  $echohere.='<div class="bkmore dmbtn">'.$arr['linkfirst'].$arr['more'].$arr['linklast'].'</div>';
            //not use more,use linkurl
      if($arr['linkurl']<>''  && $arr['more']<>'')  $echohere.='<div class="bkmore dmbtn"><a class="more" href="'.$arr['linkurl'].'">'.$arr['more'].'</a></div>';

            $echohere.='</div></div>';
           

       }
       //-----------
 if($blockid=='bkcnt_normal'){ 

   $echohere.= '<div class="bkcntbox '.$arr['cssname'].'">';
  if($arr['sta_name']=='y')    $echohere.= '<h3 class="bktitle">'.$arr['linkfirst'].$arr['name'].$arr['linklast'].'</h3>';
  if($arr['imgv']<>'')  $echohere.= '<div class="img"><img class="per480" src="'.$arr['imgv'].'" alt="'.$arr['name'].'" /></div>';       
            
  if($arr['despjj']<>'')  $echohere.= '<div class="bksubtitle">'.$arr['despjj'].'</div>';
  if($arr['despv']<>'')     $echohere.= '<div class="bkdesp">'.$arr['despv'].'</div>';
  if($arr['linkurl']<>'' && $arr['more']<>'')  $echohere.='<div class="bkmore dmbtn"><a class="more" href="'.$arr['linkurl'].'">'.$arr['more'].'</a></div>';
            $echohere.='</div>';
           

 }
 if($blockid=='bkcnt_onlydesp'){ 

       $echohere.=$arr['despv'];
           

 }


   
       //-----------
 echo $echohere;

}
//--------------------
  ?>