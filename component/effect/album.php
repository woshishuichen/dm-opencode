<?php 
    $sqlabm = "SELECT * from ".TABLE_ALBUM."  where  pid='$pidname' and sta_visible='y'   $andlangbh  order by pos desc,id desc";
      //echo '==============='.$sqlabm;
    if(getnum($sqlabm)>0){
         echo '<div class="content_album">';
         $row_abm=getall($sqlabm);
         $reqfile = EFFECTROOT.$album.'.php';       
         if(is_file($reqfile))  require $reqfile;
         else echo '相效效果 '.$album.' 不存在';
          echo '</div>';     
    }
?>