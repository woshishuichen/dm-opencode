<div id="listnode" class="gridcol <?php echo $listcssname;?>">
<ul>
<?php
 
         foreach($result as $v){
               
			     $tid=$v['id'];
			$title=$v['title'];
			$titlecss=$v['titlecss'];
			$pidname=$v['pidname'];
			$dateday=$v['dateday'];//echo $listdate;
			$alias=alias($pidname,'node'); 
            $kvsm=$v['kvsm']; $alias_jump=$v['alias_jump'];
			$despjj=$v['despjj'];
			
			if($kvsm=='') $img=DEFAULTIMGDIV;
			else{
				
				$img = get_thumb($kvsm,$title,'div');
				}
            $url = url('node',$alias,$tid,$alias_jump);

          if($titlecss<>'') $titlecssv='style="'.$titlecss.'"';
		  else $titlecssv='';
		  
		   if(substr($alias_jump,0,4)=='http') $targetblank = ' target="_blank"';
		   else  $targetblank = '';
 
				// echo '<li>';
				// echo '<div class="img"><a '.LINKTARGET_F.' href="'.$url.'" '.$titlecssv.'>'.$img.'</a></div>';
				// echo '<div class="title"><a '.LINKTARGET_F.' href="'.$url.'" '.$titlecssv.'>'.$title.'</a></div>';
			
				// echo '</li>'; 
				?>

				<li>
 <div class="img"><a <?php echo $targetblank?> href="<?php echo $url?>"><?php echo $img?>
 <?php  if(strpos($listcssname, 'ideoarrow')>0) echo '<div class="bgvideoarrow"></div>'?>

 </a>

 </div>

<div class="text">
  <h4><a <?php  echo $targetblank?> href="<?php echo $url?>" <?php echo $titlecss?>><?php echo $title?></a></h4>  
	 
</div>
<?php  if(strpos($listcssname, 'ridcolbg')>0) echo '<a '.$targetblank.' href="'.$url.'" class="bggridcol"></a>'?>
</li>


				<?php
            }//end foreach
 
?>
</ul>
</div>
 