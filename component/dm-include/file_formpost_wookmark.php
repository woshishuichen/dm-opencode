
<?php

 
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
       //pre($result);
    ?>

    
    
   <?php
 
         foreach($result as $v){
               
                 $tid=$v['id'];
            $title=$v['title'];
            $titlecss=$v['titlecss'];
            $pidname=$v['pidname'];
           // $dateday=$v['dateday'];//echo $listdate;
              $alias=alias($pidname,'node'); 
            $kvsm=$v['kvsm'];
            $alias_jump=$v['alias_jump'];
           // $despjj=$v['despjj'];
            
            

      if($kvsm<>'') $imgv =  get_thumb($kvsm,$title,'nodiv');//when grid,first kvsm,then kv,then noimg
      else{   $imgv = DEFAULTIMG;
      }
 
            $url = url('node',$alias,$tid,$alias_jump);

          if($titlecss<>'') $titlecssv='style="'.$titlecss.'"';
          else $titlecssv='';
          
           // $height = rand(90,300);

              echo '<li>';
                echo '<div class="img"><a '.linktarget($url).' href="'.$url.'" '.$titlecssv.'><img src="'.$imgv.'"   alt="'.$title.'" /></a></div>';
                echo '<div class="title"><a '.linktarget($url).' href="'.$url.'" '.$titlecssv.'>'.$title.'</a></div>';
            
                echo '</li>';  
            }//end foreach
 
?>


<?php
 
}


?>
 


 
