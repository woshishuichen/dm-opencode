<?php 
$name=$v['name'];
$namebz=$v['namebz'];
$effect=$v['effect']; 
$blockid=$v['blockid'];

$despjj=$v['despjj'];
$desptext= web_despdecode($v['desptext']);
$desp= web_despdecode($v['desp']);
if($desptext<>'') $despv = $desptext;
else  $despv = $desp;

$arr_cfg=$v['arr_cfg']; //sta_title in here,sta_name for regcommon

$bscntarr = explode('==#==',$arr_cfg); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
//--------bgimg---------------
    $bgsize = $bgposi = $sta_bgparav = '';
			if($bgeffect=='fix') $bgposi = 'fixed bottom center';
			else $bgposi = 'center center';

	if($bgimg<>''){ 
				//$posv = $sta_bgpara<>''?'-20px':'center';  //no use ,judge by js
				// $bgimgvvv = substr($bgimg,0,4)=='http'?$bgimg:UPLOADPATHIMAGE.$bgimg;		
				// $bgimgv = ' url('.$bgimgvvv.') center center no-repeat';

					if(substr($bgimg,0,4)=='http') 
					  {$bgimgv = ' url('.$bgimg.') '.$bgposi.' no-repeat;';					
					}
					 else {
					 	$bgimgv = ' url('.UPLOADPATHIMAGE.$bgimg.') '.$bgposi.' no-repeat;';					 	 
					}
					$bgsize = 'background-size:cover;';
					 
			 
			}
			else $bgimgv = '';


if($bgcolor<>'' || $bgimg<>''){
   $stylev =' style="background:'.$bgcolor.$bgimgv.$bgsize.';'.$cssstyle.'"';
}
else {$stylev = '';}

//------------------------
	if($titleimg<>''){ 
				$titleimgv = '<img src="'.UPLOADPATHIMAGE.$titleimg.'" alt="" />';
			}
			else { 
			    // $titleimgv = $titlebox<>''?$titlebox:$name;
			     $titleimgv = $name;
			}

//--------------------
$titlestylev = $titlestyle<>''?' style="'.$titlestyle.'"':'';
$titlestylesubv = $titlestylesub<>''?' style="'.$titlestylesub.'"':'';
$titlelinelongv = $titlelinelong<>''?' style="'.$titlelinelong.'"':'';
$titlelineshortv = $titlelineshort<>''?' style="'.$titlelineshort.'"':'';

$titlelineawev = $titlelineawe<>''?' titlelineawe':'';
//---------------------	
$linktitlev = $linktitle<>''?$linktitle:'更多>';
$linkurlv = $linkurl<>''?'<div class="'.$linkposi.' dmbtn boxmore '.$linkcss.'"><a class="more"  href="'.$linkurl.'">'.$linktitlev.'</a></div>':'';



//-------------		
      ?>


<?php // class  block is for js or hover edit link?>
 <div id="block<?php echo $tid?>" class="block <?php echo $cssname;?>" <?php echo $stylev?>>
 <?php if($sta_title=='y'){?>
 <div class="boxheadercenter<?php if($sta_width_title<>'y') echo ' container';?>"> 
 <h3<?php echo $titlestylev?>><?php echo $titleimgv?></h3>


 <div class="titleline<?php echo $titlelineawev;?>" <?php echo $titlelinelongv; ?>>	
    <?php if($titlelineawe==''){?>
	 <span class="titlelineshort"  <?php echo $titlelineshortv?>></span>
	 <?php } else {?>	 
	 <span class="awe"><i class="fa <?php echo $titlelineawe?>"></i></span>
	 <?php }?>	 

 </div>


<?php if($despjj<>'') {?>
 <div class="subtitle"<?php echo $titlestylesubv?>><?php echo web_despdecode($despjj)?></div>
<?php }?> 

 <?php   if($linkposi<>'belowtext') echo $linkurlv;   	?>

</div>
<?php }?>
 
 <div class="boxcontent<?php if($sta_width_cnt<>'y') echo ' container';?>">   
  <?php 
  //echo $allwidth_cntlast; 
  				if($blockid<>'') block($blockid);
                else echo  $despv;
				?>
	</div>
	 <?php   if($linkposi=='belowtext') echo $linkurlv;  
	// echo $allwidth_cntlast; 
	  	?>
 
  </div>
