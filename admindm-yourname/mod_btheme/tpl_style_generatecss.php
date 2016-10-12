

<?php 
//  $sql = "SELECT cssdir from ".TABLE_LANG."  where   $noandlangbh   order by id limit 1";
// $row = getrow($sql);
// $cssdir = $row['cssdir'];---in common.inc.php
 
//-----------------------------------
if($type=='all'){ //generate all style;

 $ssall = "select * from ".TABLE_STYLE." where  $noandlangbh  limit 100";
    $rowall = getall($ssall); 
    foreach ($rowall as $vall) {

      $pidname = $vall['pidname']; 
     generatecss($pidname,$cssdir);
 }
    

}
else {generatecss($pidname,$cssdir);}
  //---------------------
 

function generatecss($pidname,$cssdir){
 // echo $pidname;
  global $andlangbh;global $bshou;global $superadmin;

   $cssfile = STAROOT.'template/'.$cssdir .'/css/'.$pidname.'.css';
   
   $cssfilebak =  WEB_ROOT.'cache/customcss/'.$pidname.'_bak_'.$bshou.'.css';
   $cssfilebak_daoexname = $pidname.'_bak_'.$bshou.'_daoex.htm';
   $cssfilebak_daoex =  WEB_ROOT.'cache/customcss/'.$cssfilebak_daoexname;
  if(is_file($cssfile)){ 

        if (!copy($cssfile,$cssfilebak)) {
        echo  '<p style="padding:20px;font-size:16px;color:red">对不起，'.$cssfile.'备份不成功。failed to copy $cssfile...</p>';
        }
  

  }
    else{echo '<p style="padding:20px;font-size:16px;color:red">对不起，出错。template/'.$cssdir .'/css/'.$pidname.'.css不存在，需要在当前样式里有这个css文件。</p>';return;}

//------------------------------
    $ss = "select * from ".TABLE_STYLE."   where pidname='$pidname' $andlangbh limit 1";
    $row = getrow($ss); 
    if($row=='no'){ echo 'no result , pidname is wrong.'.$pidname;}
      else{
           $title = $row['title'];

            $style_normal = $row['style_normal'];  
            $style_hf = $row['style_hf'];
           $style_menu = $row['style_menu'];
           $style_boxtitle = $row['style_boxtitle']; 
            $desp = $row['desp'];
          //  $desp=str_replace("[csspath]",CSSPATH.'css/',$desp);
            $desp=str_replace("[uploadpath]",UPLOADPATHIMAGE,$desp);
            

  /*----------------style_normal------------*/
$bscntarr = explode('==#==',$style_normal); 
//pre($bscntarr);
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
              if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
      else{
      $body_bgcolor=$body_bgimg=$body_bgimgset=$pagewidth='';
      $color_body=$color_a=$color_ahover='';
      }


 /*-----------------style_hf----------*/
$bscntarr = explode('==#==',$style_hf); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
      else{
      $header_bgcolor=$header_bgimg='';
      $header_color=$header_color_a=$header_color_ahover='';
      $footer_bgcolor=$footer_bgimg=$footer_color=$footer_color_a=$footer_color_ahover='';
      $sta_header_width='';
      }

 /*---------------style_menu----------*/
$bscntarr = explode('==#==',$style_menu); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
      else{
      $menu_bgcolor=$menu_bgimg=$menu_color='';
      $menu_bgcolor_h=$menu_bgimg_h=$menu_color_h='';
      $menu_height=$menu_border='';

      $msub_bgcolor=$msub_color='';
      $msub_bgcolor_h=$msub_color_h='';
      $msub_height=$msub_border='';

      $sta_menuright=''; 

      }


 /*----------------style_boxtitle----------*/

$bscntarr = explode('==#==',$style_boxtitle); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
      else{
      $boxtitle_height=$boxtitle_bgcolor='';
      $boxtitle_bgimg=$boxtitle_color='';
      }

/*-------------------desp------------------------*/
          
           $desp = $row['desp'];
          //  $desp=str_replace("[csspath]",CSSPATH.'css/',$desp);
            $despv=str_replace("[uploadpath]",UPLOADPATHIMAGE,$desp);
            
/**************begin generate*************************************/
            switch ($body_bgimgset)
                  {
                  case 'norepeat':
                     $body_bgimgset = 'center 0 no-repeat';
                    break;  
                  case 'repeatx':
                    $body_bgimgset = '0 0 repeat-x';
                    break;
                  case 'repeaty':
                    $body_bgimgset = 'center 0 repeat-y';
                    break;  
                  //default:
                   // code to be executed                     
                  }
                  /*

               background-image:url('a.jpg');
               background-repeat    : repeat;
               background-attachment: fixed;
               background-position  : right top;
                  */
if($body_bgimg<>'')  $body_bgimg =  "url('".genercss_orhttpimg($body_bgimg)."') $body_bgimgset";
if($header_bgimg<>'')  $header_bgimg =  "url('".genercss_orhttpimg($header_bgimg)."') 0 0 repeat-x";
if($footer_bgimg<>'')  $footer_bgimg =  "url('".genercss_orhttpimg($footer_bgimg)."') 0 0 repeat-x";
if($menu_bgimg<>'')  $menu_bgimg =  " url('".genercss_orhttpimg($menu_bgimg)."') 0 0 repeat-x";
if($menu_bgimg_h<>'')  $menu_bgimg_h =  "url('".genercss_orhttpimg($menu_bgimg_h)."') center center no-repeat";
if($boxtitle_bgimg<>'')  $boxtitle_bgimg =  "url('".genercss_orhttpimg($boxtitle_bgimg)."') 0 0 repeat-x";

              $bodybgcss =  "body{background:$body_bgcolor $body_bgimg;color:$color_body} \n .container{width: $pagewidth; margin-left:auto;margin-right:auto;position:relative; }"; 
 $color_a = "\n a{color:$color_a;text-decoration:none; } a:hover{color:$color_ahover}";


 $menucss = "\n.menu{background:$menu_bgcolor $menu_bgimg;height: $menu_height ;line-height:$menu_height;border-bottom:$menu_border;z-index:99;    } \n .menu li.m{background:$menu_bgcolor;border-bottom:$menu_border;}  \n .menu a{color:$menu_color} \n .menu a:hover,.menu a.active{background:$menu_bgcolor_h $menu_bgimg_h;color:$menu_color_h}";
 $msubcss = "\n.menu li li{background:$msub_bgcolor;height: $msub_height ;line-height:$msub_height;border-bottom:$msub_border;z-index:99;    } \n .menu li li a{color:$msub_color} \n .menu li li a:hover,.menu li li a.active{background:$msub_bgcolor_h;color:$msub_color_h}";
 $othercolor = " \n .sidebar a.active{font-weight:bold;color:$boxtitle_bgcolor}\n .topsearch .searchbtn{background:$boxtitle_bgcolor;color:#fff }\n .pageroll a,.pageroll span{border:1px solid #ddd;background:#e2e2e2;color:$menu_bgcolor;}\n.pageroll span{color:#bbb}\n.pageroll a.cur,.pageroll a:hover{color:$menu_color;background:$menu_bgcolor}\n .bx-wrapper .bx-pager.bx-default-pager a:hover,
.bx-wrapper .bx-pager.bx-default-pager a.active{background:$boxtitle_bgcolor;}";


$titlebox = "\n.boxheader{height: $boxtitle_height;background:$boxtitle_bgcolor $boxtitle_bgimg;}\n.boxheader h3{color:$boxtitle_color;border-left:5px solid $boxtitle_color}\n.boxheader .more{color:$boxtitle_color}.boxheader .more:hover{color:$boxtitle_color}\n.content_header h3{border-left: 5px solid $boxtitle_bgcolor;}.content_header{border-bottom: 1px solid $boxtitle_bgcolor;}\n.sdheader{height:$boxtitle_height;line-height:$boxtitle_height; background:$boxtitle_bgcolor; color: $boxtitle_color;}.newsgridlist h3{background}";

            // if($sta_widthscreen=='y')   {
            //  $sta_widthscreen ="";
             // }
            // else {
             // $sta_widthscreen =".pagewrap{width: 1200px;border:0px solid red;margin:0 auto;  } ";
         //  }  

 $header = "\n.header{background:$header_bgcolor $header_bgimg;color:$header_color} \n .header a{color:$header_color_a} \n .header a:hover{color:$header_color_ahover}";
 $footer = "\n.footerwrap{background:$footer_bgcolor $footer_bgimg;color:$footer_color} \n .footer a{color:$footer_color_a} \n .footer a:hover{color:$footer_color_ahover}";

$csscontent="/*----当前的样式名：$title  ------ 技术支持：DM企业建站 www.demososo.com---------------*/\n $bodybgcss $color_a   $othercolor $header $footer $titlebox \n /*----------仅限pc端样式---------*/\n@media (min-width: 801px) {\n $menucss $msubcss \n}\n\n /*----------custom css textarea---------*/\n\n $despv";
         //   echo $csscontent;
             file_put_contents($cssfile,$csscontent);

 $cssfile_daoexvv = '<strong>'.$title.' -- '.$pidname.'</strong><p>style normal:</p><textarea rows="5" cols="150">'.$style_normal.'</textarea><p>style_hf:</p><textarea rows="5" cols="150">'.$style_hf.'</textarea><p>style_menu:</p><textarea rows="5" cols="150">'.$style_menu.'</textarea><p>style_boxtitle:</p><textarea rows="5" cols="150">'.$style_boxtitle.'</textarea><p>desp:</p><textarea rows="5" cols="150">'.$desp.'</textarea>';
             file_put_contents($cssfilebak_daoex,$cssfile_daoexvv);

  
   $cssfilelink = '<a target="_blank" href="'.STAPATH.'template/'.$cssdir .'/css/'.$pidname.'.css?v='.rand(1000,9999).'">template/'.$cssdir .'/css/'.$pidname.'.css</a>';


if($superadmin=='y')
   $daoex = '<a target="_blank" href="'.BASEURL.'cache/customcss/'.$cssfilebak_daoexname.'">查看导出的样式</a>';
 else $daoex = '';


             echo '<p style="padding:20px 0;font-size:16px;color:blue">操作成功。'.$cssfilelink.' 已更新。<br /><br />'.$daoex.'<br /> <br />同时会在cache/customcss目录创建一个备份文件。<br />如果cache/customcss里的备份文件太多了，可以删除一些不用的。</p><p class="cred">提醒：这里的每次修改 ，都要点生成样式才能生效。</p>';

 

    }
}//end func


function genercss_orhttpimg($addr){
    if(strpos($addr,'://')>1) return $addr;
    else return UPLOADPATHIMAGE.$addr;

}
?>
