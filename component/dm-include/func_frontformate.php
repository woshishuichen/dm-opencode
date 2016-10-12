<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/

function blockcnt($blockid,$arr){
// pre($arr);
      $echohere=$w1text =$w2text ='';

 if($blockid=='bkcnt_imgleft'  || $blockid=='bkcnt_imgrg'){
        if($blockid=='bkcnt_imgleft') {$w1text = '<img class="perimg100" src="'.$arr['imgv'].'" alt="'.$arr['name'].'" />';
                                        $w2text = $arr['despv'];
                                      }
        if($blockid=='bkcnt_imgrg') {$w1text = $arr['despv'];
                                        $w2text = '<img class="perimg100" src="'.$arr['imgv'].'" alt="'.$arr['name'].'" />';
                                      }



            $echohere.= '<div class="c col2 bkcntbox '.$arr['cssname'].'">';
            $echohere.= '<div class="w1">'.$w1text.'</div><div class="w2 ">'.$w2text.'</div>';
            $echohere.= '</div>';

       }
       //-----------
 // if($blockid=='bkcnt_normal'){ 

 //   $echohere.= '<div class="bkcntbox '.$arr['cssname'].'">';
 //  if($arr['sta_name']=='y')    $echohere.= '<h3 class="bktitle">'.$arr['linkfirst'].$arr['name'].$arr['linklast'].'</h3>';
 //  if($arr['imgv']<>'')  $echohere.= '<div class="img"><img class="per480" src="'.$arr['imgv'].'" alt="'.$arr['name'].'" /></div>';       
            
 //  if($arr['despjj']<>'')  $echohere.= '<div class="bksubtitle">'.$arr['despjj'].'</div>';
 //  if($arr['despv']<>'')     $echohere.= '<div class="bkdesp">'.$arr['despv'].'</div>';
 //  if($arr['linkurl']<>'' && $arr['more']<>'')  $echohere.='<div class="bkmore dmbtn"><a class="more" href="'.$arr['linkurl'].'">'.$arr['more'].'</a></div>';
 //            $echohere.='</div>';
           

 // }

 // if($blockid=='bkcnt_onlydesp'){ 

 //       $echohere.=$arr['despv'];
           

 // }

 //pre($echohere);
   
       //-----------
 echo $echohere;

}
//--------------------
  ?>