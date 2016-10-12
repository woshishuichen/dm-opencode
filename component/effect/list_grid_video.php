<?php
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<ul class="gridlist">
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
				
				$img = get_thumb($kvsm,$title,'div');
				}
            $url = url('node',$alias,$tid,'');

          if($titlecss<>'') $titlecssv='style="'.$titlecss.'"';
		  else $titlecssv='';
		  
		   

				echo '<li>';
				echo '<div class="img"><a '.LINKTARGET_F.' class="bgvideowrap" href="'.$url.'" '.$titlecssv.'>'.$img.'<div class="bgvideocnt"></div></a></div>';
				echo '<div class="title"><a '.LINKTARGET_F.' href="'.$url.'" '.$titlecssv.'>'.$title.'</a></div>';
			
				echo '</li>'; 
            }//end foreach
 
?>
</ul>