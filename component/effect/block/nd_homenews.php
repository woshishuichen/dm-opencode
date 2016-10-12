<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>


<?php 
   
     $pidshort = substr($pid,0,4);  
       if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
       else  $sqlv=" pid='$pid' ";
       
      // if($sta_tj=='y') $statjsql=" and sta_tj='y' ";
      //  else  $statjsql="  ";


   $sqlall="select * from ".TABLE_NODE." where $sqlv  $andlangbh   and sta_visible='y' and sta_noaccess='n'   order by pos desc,id desc limit $maxline";
   if(getnum($sqlall)>0){
      $result = getall($sqlall);

  
   ?>
<ul class="homenews">
<?php

 //
 //echo $rgcont_list; // --it is rowall
 //pre($result);
 foreach($result as $v){
 $tid = $v['id'];
 $title = $v['title'];  $pidname = $v['pidname']; 
 $dateday = $v['dateday'];   
   $url = getlink($pidname,'node','noadmin');
  
  //if($titlecss=='') $titlecssv='class="'.$titlecss.'"';  IN FUNCTION L
  //else $titlecssv='';
 
  //if($sta_showdate=='y') $sta_showdatev ='<span class="date">['.$dateday.']</span>';
 // else $sta_showdatev='';
 
 /*
 $strlen_cur='10';// admin set the num;
 $titlelen =strlen($title);   
   if($titlelen>$strlen_cur){ 
		$title=mb_substr($title,0,$strlen_cur/2,'utf-8').'...';
     }
*/
// echo '<li>'.$sta_showdatev. $url.'</li>';
  echo '<li><span>'.$dateday.'</span>'.$url.'</li>';
 } 

 ?> 
	
 </ul>

<?php 
 }
    else { echo '暂无内容。';}
 


    ?>

   