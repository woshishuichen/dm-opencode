<?php
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<?php



/*-----------layout---------layout---------layout---------layout-----
------layout--------layout--------layout---------*/

function layoutcommon(){
global $test;
global $andlangbh; global $curstyle;

GLOBAL $banner2; //2 is common...
GLOBAL $bread2; GLOBAL $sta_bread_posi2;
GLOBAL $sta_sidebar2; GLOBAL $sidebar2;GLOBAL $sidebartop2;GLOBAL $sidebarbot2;
GLOBAL $contentheader2;GLOBAL $content2;GLOBAL $contenttop2;GLOBAL $contentbot2;
GLOBAL $pagetop2;GLOBAL $pagebot2;

 
	$sql2="select * from ".TABLE_LAYOUT." where pid='common' and type='common' and stylebh='$curstyle'  $andlangbh limit 1";
		if(getnum($sql2)>0){
		$row2=getrow($sql2);
	
		$banner2=$row2['banner'];		
		$bread2=$row2['bread'];
		$sta_bread_posi2=$row2['sta_bread_posi'];		
		$sta_sidebar2=$row2['sta_sidebar'];
		$sidebar2=$row2['sidebar'];
		$sidebartop2=$row2['sidebartop'];
		$sidebarbot2=$row2['sidebarbot'];	 	
		
		$content2=$row2['content'];
		$contentheader2=$row2['contentheader'];
		$contenttop2=$row2['contenttop'];
		$contentbot2=$row2['contentbot'];
		
		$pagetop2=$row2['pagetop'];
		$pagebot2=$row2['pagebot'];	

	  

	}	 
		if($test=='y'){	
	echo '<div style="background:#ddd"><strong>--func_layout.php ... common--:</strong> layout variable: | banner:'.$banner2.' | bread: '.$bread2.' | breadcrumb-sta_bread_posi: '.$sta_bread_posi2;
	echo '<br> | sta_sidebar: '.$sta_sidebar2.' | sidebar: '.$sidebar2.' | sidebartop: '.$sidebartop2.' | sidebarbot:'.$sidebarbot2;
	echo ' <br> | contentheader:'.$contentheader2.' content:'.$content2.' | contenttop:'.$contenttop2.' | contentbot:'.$contentbot2;
	echo ' <br> | pagetop:'.$pagetop2.' | pagebot:'.$pagebot2;

	//echo ' <br> <br> | bsbanner:'.$bsbanner.' | bsbannermob:'.$bsbannermob;
	//echo ' <br> | bsindex:'.$bsindex.' | bsindexmob:'.$bsindexmob.' | bsmenu:'.$bsmenu; 
	//echo ' <br> | bsheadertop:'.$bsheadertop.' | bsheader:'.$bsheader;
	//echo ' <br> | bsfooter:'.$bsfooter.' | bsfooterlast:'.$bsfooterlast.' | bsfooternavmob:'.$bsfooternavmob;
	
	echo '</div>';
	}
}//end func



function layoutcur($pid,$type){ // //invoke is in page
global $test;global $curstyle;
global $detailid;
global $andlangbh;
GLOBAL $banner2; //2 is current...
GLOBAL $bread2; GLOBAL $sta_bread_posi2;
GLOBAL $sta_sidebar2; GLOBAL $sidebar2;GLOBAL $sidebartop2;GLOBAL $sidebarbot2;
GLOBAL $contentheader2;GLOBAL $content2;GLOBAL $contenttop2;GLOBAL $contentbot2;
GLOBAL $pagetop2;GLOBAL $pagebot2;

GLOBAL $banner;
GLOBAL $bread; GLOBAL $sta_bread_posi;
GLOBAL $sta_sidebar; GLOBAL $sidebar;GLOBAL $sidebartop;GLOBAL $sidebarbot;
GLOBAL $contentheader;GLOBAL $content;GLOBAL $contenttop;GLOBAL $contentbot;
GLOBAL $pagetop;GLOBAL $pagebot;

	$sql2="select * from ".TABLE_LAYOUT." where pid='$pid' and type='$type' and stylebh='$curstyle' $andlangbh limit 1";
	// echo $sql2;//exit;
		if(getnum($sql2)>0){ 		
		$row2=getrow($sql2);
		$banner=$row2['banner'];		
		$bread=$row2['bread'];
		$sta_bread_posi=$row2['sta_bread_posi'];		
		$sta_sidebar=$row2['sta_sidebar'];
		$sidebar=$row2['sidebar'];
		$sidebartop=$row2['sidebartop'];
		$sidebarbot=$row2['sidebarbot'];	 	
		
		$contentheader=$row2['contentheader'];
		$content=$row2['content'];
		$contenttop=$row2['contenttop'];
		$contentbot=$row2['contentbot'];
		
		$pagetop=$row2['pagetop'];
		$pagebot=$row2['pagebot'];		
	 
		//=====================begin replace====
		 
			if($banner=='') $banner=$banner2;			
			if($bread=='') $bread =$bread2;
			if($sta_bread_posi=='') $sta_bread_posi=$sta_bread_posi2;
			
			if($sta_sidebar=='') $sta_sidebar=$sta_sidebar2;
			if($sidebar=='') $sidebar=$sidebar2;
			if($sidebartop=='') $sidebartop=$sidebartop2;
			if($sidebarbot=='') $sidebarbot=$sidebarbot2;		
			
			if($contentheader=='') $contentheader =$contentheader2;
			if($content=='') $content =$content2;
			if($contenttop=='') $contenttop =$contenttop2;
			if($contentbot=='') $contentbot =$contentbot2;
			
			if($pagetop=='') $pagetop =$pagetop2;
			if($pagebot=='') $pagebot=$pagebot2;
			
		
		//=====================end replace====		
	}	 
	else{
             $banner=$banner2;			
			 $bread =$bread2;
			 $sta_bread_posi=$sta_bread_posi2;
			
			 $sta_sidebar=$sta_sidebar2;
			 $sidebar=$sidebar2;
			 $sidebartop=$sidebartop2;
			 $sidebarbot=$sidebarbot2;		
			
			 $contentheader =$contentheader2;
			  $content =$content2;
			 $contenttop =$contenttop2;
			 $contentbot =$contentbot2;
			
			 $pagetop =$pagetop2;
			 $pagebot=$pagebot2;

	}
	 //$bsbanner=$bsbannermob=$bsindex=$bsindexmob=$bsmenu=$bsfooter=$bsfootermob=$bsfooternavmob='';
Global $bsbanner;Global $bsbannermob;Global $pidregion;Global $bsindexmob;
Global $alias;
 
if($alias=='index'){
	 
	//default is pc:
	if($bsbanner<>'') $banner= $bsbanner;
	$content= $pidregion; //pidregion in load.php  //if($bsindex<>'') $content= $bsindex;  
	//then judge mobile
	if(isdmmobile()){ //except ipad
		 if($bsbannermob<>'') $banner= $bsbannermob;
	      if($bsindexmob<>'') $content= $bsindexmob;
	}

	 

}

if($test=='y'){	
	echo '<div style="background:yellow">func_layout.php ...<strong>cur</strong> layout variable: | banner:'.$banner.' | bread: '.$bread.' | breadcrumb-sta_bread_posi: '.$sta_bread_posi;
	echo '<br> | sta_sidebar: '.$sta_sidebar.' | sidebar: '.$sidebar.' | sidebartop: '.$sidebartop.' | sidebarbot:'.$sidebarbot;
	echo ' <br> | contentheader:'.$contentheader.' | content:'.$content.' | contenttop:'.$contenttop.' | contentbot:'.$contentbot;
	echo ' <br> | pagetop:'.$pagetop.' | pagebot:'.$pagebot;
	echo '</div>';
	}

}//end func
?>