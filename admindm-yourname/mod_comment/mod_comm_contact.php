<?php
/*	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
require_once '../config_a/common.inc2010.php';
//
 if($act <> "pos") zb_insert($_POST);
 
 if($pidname<>'') {ifhaspidname(TABLE_BLOCK,$pidname);}
 
//ifhaspidname(TABLE_NODE,$pid);
//ifhaspidname(TABLE_CATE,$catpid);
ifhave_lang(LANG);//TEST if have lang,if no ,then jump

$jumpv='mod_comm_contact.php?lang='.LANG;
$jumpv_pidname=$jumpv.'&pidname='.$pidname;
$jumpv_file=$jumpv.'&file='.$file;
$jumpv_pidnamefile=$jumpv_pidname.'&file='.$file;


//----
$submenu='module';
$title = '留言管理 ';

 if($act == "del")
{     
  
     ifsuredel_field(TABLE_COMMENT,'id',$tid,'eq',$jumpv.'&page='.$page);
       
 
}


//-----------

require_once HERE_ROOT.'mod_common/tpl_header.php'; 

$keyV = 'and type=contact';
$sqltextlist = "SELECT * from ".TABLE_COMMENT." where $noandlangbh  and type='contact' order by pos desc,id desc";
 //echo $sqltextlist;
//$rowlist = getall($sql);
   $num_rows = get_numrows($sqltextlist);        
 if($num_rows==0) {
  echo $norr2;
 $page_total= 1;
 }
else{    
       $offset=5;$maxline = 20; $key='';
        $page_total=ceil($num_rows/$maxline); //maxline is in mod_node.php

        if (!isset($page)||($page<=0)) $page=1;
        if($page>$page_total) $page=$page_total;
        $start=($page-1)*$maxline;
        $sqltextlist2="$sqltextlist  limit $start,$maxline";  
        //echo $sqltextlist2;
        $rowlist = getall($sqltextlist2);
        
        //echo $maxline;

 foreach($rowlist as $v){
    $tid=$v['id'];
   $ip=$v['ip'];
   $desp=$v['desp'];   
   $dateedit=$v['dateedit'];   
   $del_text= " <a href=javascript:delid('del','$tid','$jumpv&page=$page')  class=but2>删除</a>";

echo '<div class="contactlist">IP:'.$ip.' 发布时间:'.$dateedit. $del_text.'<br />内容：<p>'.web_despdecode($desp).'<p></div>';
 }
 ?>


<div class="c"></div>
<?php 
require_once HERE_ROOT.'plugin/page_2010.php';
?>


 <?php

}

require_once HERE_ROOT.'mod_common/tpl_footer.php';

?>