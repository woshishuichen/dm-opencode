<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

?>
<?php
$ifalias='n';
$file='masonry';
 


 
 global $andlangbh; global $pagesql;global $page;
 global $offset;
 $maxline = 4;
 
 $page=@intval($_GET['page']);
 if($page==0) $page=1;

    $sqllist22 = "SELECT *  from ".TABLE_NODE." where  ppid='cate20150805_1125344029'   and sta_visible='y' and sta_noaccess='n' $andlangbh  order by pos desc,id desc";
  //echo $sqllist22; 
  /*begin page roll*/
     $num_rows = getnum($sqllist22);
      $page_total=ceil($num_rows/$maxline);//must put here,because when no data,we need the vaule of page_total 
     if($num_rows==0){ echo  NOARTICLE;}
     else{ 
        if($page>$page_total) $pagesql=$page_total;
        $start=($pagesql-1)*$maxline;
        $sqllist33="$sqllist22  limit $start,$maxline";
      //ECHO $sqllist33;         
        $result = getall($sqllist33);       
       // pre($result);
    ?>

        <ul id="masonrylist">
   <?php
 
         foreach($result as $v){
               
                 $tid=$v['id'];
            $title=$v['title'];
            $titlecss=$v['titlecss'];
            $pidname=$v['pidname'];
            $dateday=$v['dateday'];//echo $listdate;
            $alias=alias($pidname,'node'); 
            $kvsm=$v['kvsm'];
            $despjj=$v['despjj'];
            
            if($kvsm=='') $img=DEFAULTIMGDIV;
            else{
                
                $img = get_thumb($kvsm,$title,'nodiv');
                }
            $url = url('node',$alias,$tid,'');

          if($titlecss<>'') $titlecssv='style="'.$titlecss.'"';
          else $titlecssv='';
          
            $height = rand(90,300);

                echo '<li>';
                echo '<div class="img"><a '.LINKTARGET_F.' href="'.$url.'" '.$titlecssv.'><img src="'.$img.'" height="'.$height.'" alt="'.$title.'" /></a></div>';
                echo '<div class="title"><a '.LINKTARGET_F.' href="'.$url.'" '.$titlecssv.'>'.$title.'</a></div>';
            
                echo '</li>';  
            }//end foreach
 
?>
</ul>
<?php
 
}
 
echo $page;

echo $page_total;
?>
 


 