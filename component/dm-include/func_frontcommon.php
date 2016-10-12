<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<?php
function seo($arr,$type){
  if(is_array($arr)){
  //pre($arr);
	 global $websitename;global $alias;
	 $seov='';
	//  echo '<pre>aaaa'.count($arr).'aaa'.print_r($arr,1).'</pre>';
	  if(count($arr)>0){
	   
		   foreach($arr as $i=>$v){
                $v= strip_tags($v);//not use decode in seo,but in select option is ok
		   		if($i==0)  $seov= $v;
		   		else  $seov= $seov.' '.$v;
		     
		   }
		}
 


		 if($type=='seo1' and $alias<>'index')  {   echo $seov.' - '.$websitename;
    }
     else  echo $seov;
   }
   else  echo 'seo must be array';
}




function requirefile($requirefile,$pidname_custom) {
		 $requirefile2 = HTMLROOT.$requirefile;
		 if (file_exists($requirefile2))  
			require_once $requirefile2; 
	   else {echo $requirefile.'is not exist!文件不存在';}
}

function require_lang($file) {
		 $requirefile2 = HTMLROOT.'lang/'.$file.'.php';
		  $requirefile_def = HTMLROOT.'lang/'.'lang_cn.php';
      //echo $requirefile2;
		 if (file_exists($requirefile2))   require_once $requirefile2; 
	   else  require_once $requirefile_def; 
}
function fnoid() { //global $var404;
//alert("sorry, id is not exist! 对不起，此ID不存在！"); 
//jump($var404);
require(HTMLROOT.'page_404.php');
exit;

}

function fnoaccess() { //global $var404;
// alert("sorry,prohabit access! 对不起，禁止访问！"); 
// //jump($var404);
// jump('index.html');
  require(HTMLROOT.'page_404.php');
exit;
}




/*-----------about category -------------------------  */
 
 function get_sqlwhile($curcatepidname,$pid,$cate_level,$cate_last){
 //Global $curcatepidname;  //not use pidname,conflict to sidebar pidname
 //Global $pid;
 // Global $cate_level;
  // Global $cate_last;
 if($pid=='0')  {
 $sqlin=' '; //main cate,then use ppid
 }
 else{
     if($cate_level==2){
		$sqlin=" and pid='$curcatepidname' ";
	 }
	 else if($cate_level==1){
			if($cate_last=='y')$sqlin=" and pid='$curcatepidname' ";
			else{
			 $sqlin=get_sqlwhile2($curcatepidname);
			}		
	 }
 
 }
 return $sqlin;
}//end func 
 function get_sqlwhile2($curcatepidname){
 Global $andlangbh;
 // Global $curcatepidname;
  
    $sql_sub = "SELECT  pidname  from ".TABLE_CATE." where  pid='$curcatepidname' and  sta_visible='y' and sta_noaccess='n' $andlangbh order by pos desc,id";
	 $nums = getnum($sql_sub);
	    if($nums==0)     $sqlin=" and pid='$curcatepidname' ";
		else if($nums==1) {
                             $row_sub = getrow($sql_sub);
                              $vpidname = $row_sub['pidname'];
                             $sqlin=" and pid in('$curcatepidname','$vpidname') ";
                           }
		elseif($nums>1) {
                                $rowall_sub = getall($sql_sub);
								$vpidname2='';
                                 foreach($rowall_sub as $vcat_sub){// in('a','b')
                                    $vpidname = $vcat_sub['pidname'];
                                    $vpidname2=$vpidname2." '$vpidname',";

                                 }//end foreach
                                    $vpidname2=substr($vpidname2,0,-1);
                                    $sqlin=" and pid in ('$curcatepidname',$vpidname2 )";
                           } //end nums;
  return $sqlin;
  
}//end func 

/*-----------end  about category -------------------------  */
 


//------------
function field_value_front($mainpidname,$pidname){
Global $andlangbh;
 $sqlfield = "SELECT * from ".TABLE_FIELD." where  pid='$mainpidname' and sta_visible='y' $andlangbh order by pos desc,id";
 $rowlistfield = getall($sqlfield);  
    if($rowlistfield<>'no') {
 echo '<ul class="fieldlist">';
      foreach($rowlistfield as $vfield){ 
        $pidnamefield=$vfield['pidname'];  
        $namefield=$vfield['name']; 
         $typefield=$vfield['typeinput']; 
         $cssnamefield=$vfield['cssname']; 
   
      $sqlfievalue = "SELECT value from ".TABLE_FIELDVALUE." where  pid='$pidnamefield' and pidnode='$pidname' $andlangbh order by id limit 1";
       $rowfiev = getrow($sqlfievalue);
      // echo $sqlfievalue.'<Br>';
      if($rowfiev<>'no')  {
        $value=$rowfiev['value'];  
        if($typefield=='text' or $typefield=='textarea') $value2=$value;
        else {
        	 
        	$optv_arr = explode('|', $value);
        	// ksort($optv_arr);        	 
        	 // pre($optv_arr);
        	$value2 = '';
        	$i=0;
        	foreach($optv_arr as $optv_arr_v){        		
                 $optv_arr_v_s = get_field(TABLE_FIELDOPTION,'name',$optv_arr_v,'pidname');
               if($i==0) $value2 =  $optv_arr_v_s;
               else $value2 =  $value2.' , '.$optv_arr_v_s;
               $i++;

                 //get_field($table,$field,$v,$type)
        	}
        	//$value2 = substr($value2, 0,-2);
        }
       if($value2=='') $value2 = '&nbsp; ';
   	     
      } 
      else {
        $value2 ='&nbsp; ';
         
      }
       echo '<li class="'.$cssnamefield.'"><span class="name">'.$namefield.'</span><span class="value">'.web_despdecode($value2).'</span></li>';    

            
       }
       echo '</ul>';
    }


}
//---------------
function breadtitle(){//refer b_bread.php

 global $breadarr;  

               $divi = '<span class="breaddivi">></span>';
                //echo '<pre>aaaaaaa'.print_r($arr,1).'</pre>';
                if(count($breadarr)>0){
                   foreach($breadarr as $i=>$v){
                      if($i==0)  $bread_v= $v;
                      else  $bread_v= $bread_v.$divi .$v;
                     
                   }
                }
             //   echo $bread_home.$divi.strip_tags($bread_v);
                 echo  $bread_v;


}
//---------------

function publishtext(){
 global $authorcate;global $authorcompanycate;
 global $author;global $authorcompany;global $dateedit;
 //echo $authorcat.'---'.$authorcompanycat.'------'.$author.'------'.$authorcompany.'------'.$dateedit;

     $publishtext='';
      $authorv = $author<>''?$author:$authorcate;
      $authorcompanyv = $authorcompany<>''?$authorcompany:$authorcompanycate;
     if($authorv<>'hide'){
         $publishtext .='<div class="publishtext">';
         $publishtext .='<span class="author">作者：'.$authorv.'</span>';
       if($authorcompanyv<>'hide')  $publishtext .='<span class="authorcompany">来源：'.$authorcompanyv.'</span>';
         $publishtext .='<span class="author">发布日期：'.substr($dateedit,0,10).'</span>';
         $publishtext .='</div>';

         echo  $publishtext;

     }
//-------------
}
function detail_linkmore(){
   global $news_moretitle;global $linkmore;
 //echo $linkmoretitle.'---'.$linkmore;
 $linkmoretitlev = $news_moretitle==''?'查看全文>':$news_moretitle;

 if($linkmore<>''){
     echo '<div class="detaillinkmore ptb10 dmbtn moresm moresmw "><a class="more" '.linktarget($linkmore).' href="'.$linkmore.'">'.$linkmoretitlev.'</a></div>';
 }

//-------------
}

function detail_downloadurl($downloadurl){
   if($downloadurl<>'') echo '<div class="detaillinkurl ptb10 dmbtn moresm2 moresmw2"><a class="more" href="'.$downloadurl.'" target="_blank"><i class="fa fa-download"></i> 资料下载</a></div>';

//-------------
}
function detail_videourl(){
  global $videourl;global $videotitle;
    $detail_videourlv = '';
    if($videourl<>''){
         $detail_videourlv .= '<div class="videodetail">';
         $detail_videourlv .= '<div class="videodesp">';
         $detail_videourlv .= '<embed src="'.$videourl.'" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="opaque" width="100%" height="100%"></embed>';
         $detail_videourlv .= '</div>';
 if($videotitle<>'')  $detail_videourlv .='<div class="videotitle">'.$videotitle.'</div>';
         $detail_videourlv .= '</div>';

         echo $detail_videourlv;

    }
//-------------
}  
 

function detail_fontsize(){
  global $sta_fontsize;
  if($sta_fontsize=='y'){
   echo '<div class="detailfontsize"><a href="javascript:;" class="cur" data-size="16">A<sup class="fz-small">-</sup></a><a href="javascript:;" data-size="18">A<sup class="fz-big">+</sup></a></div>';
 }
  //-------------
}

function detail_sharebtn(){
  global $sta_sharebtn;        
     if($sta_sharebtn=='y') 
      {echo '<div class="ptb20 detailsharebtn">';
     require(EFFECTROOT.'prog/prog_btnshare.php');
     echo '</div>';
   }

  }

?>

 