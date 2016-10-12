<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
?>
<?php
$modtype='page';
$sql="select * from ".TABLE_PAGE." where id='$routeid'  $andlangbh limit 1";	 
	if(getnum($sql)>0){
		$row_page=getrow($sql); 

		 	 $arr_can=$row_page['arr_can'];
	$bscntarr = explode('==#==',$arr_can); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }
    
		
		//-------------	



		if($sta_noaccess=='y') {fnoaccess();exit;}

		//$alias=$row['alias'];
		$curpidname = $pidname=$row_page['pidname']; 
	

		 layoutcur($pidname,'page');//layoutcur($pid,$type);

		$pid=$row_page['pid'];$tid=$row_page['id'];			
		$title=decode($row_page['name']);	

		//-------
		 
		 
		$alias_jump =  $row_page['alias_jump'];
		$alias = alias($pidname,'page');
		$cururl = url('page',$alias,$tid,$alias_jump);
		$curlink = l($cururl,$title,'','');
		$breadarr[0] = $curlink;
 
		 
 		//--seo----
		$seo1v=$seocus1;
		$seo2v=$seocus2;
		$seo3v=$seocus3;
		//unset($seo1)
		//array_unshift($seo1, $curseo1);
		if($seo1v<>''){ $seo1[0] =$seo1v;} else  $seo1[0] =$title;
		if($seo2v<>''){ $seo2[0] =$seo2v;} else  $seo2[0] =$title;
		if($seo3v<>''){ $seo3[0] =$seo3v;} else  $seo3[0] =$title;
			
		  
	$bodycss = "$modtype page$tid page_$alias $pagelayout";	 
	
	}
	else{ fnoid();
		  
	}



?>
<?php 

 $sqlmenu="select * from ".TABLE_MENU." where pidname='$pidname' and stylebh='$curstyle'  $andlangbh limit 1";	 
 //echo $sqlmenu;
if(getnum($sqlmenu)>0){
    $rowmenu = getrow($sqlmenu);
    $pidmenu = $rowmenu['pid'];
    if($pidmenu=='0'){
    		 	$maintitle= $title;
 				$mainpidname= $pidname;
    }
    else{
    	 $sqlmenu="select * from ".TABLE_MENU." where pidname='$pidmenu'  and stylebh='$curstyle' $andlangbh limit 1";	 
    	 // echo $sqlmenu;
		$rowmenu = getrow($sqlmenu);
		$namemenu = $rowmenu['name'];
		 $typemenu = $rowmenu['type'];
		 $linkurlmenu = $rowmenu['linkurl'];
		// echo $typemenu;
		 if($typemenu =='page'){
		 		 $subpagearr = get_fieldarr(TABLE_PAGE,$pidmenu,'pidname');   
		 		 pre($subpagearr);
             if($subpagearr=='no') {$namemenu='单页面不存在';
                  $pidmenu = '-';
                }
                else {
                   $namemenu=decode($subpagearr['name']); 
                  
                }
                $linkmenu =  getlink($mainpidname,'page','noadmin');
               } 
              else{
              	$linkmenu = l($linkurlmenu,$namemenu,'','');
              } 
//----------------------------------------
                $maintitle= $namemenu;	
 				$mainpidname= $pidmenu;
 				array_unshift($breadarr, $linkmenu);



		 }



}
else {
	 	$maintitle= $title;//when menu is cust,and link is page,so not in menu,solve is when link is page,so use pagemenu.
     	$mainpidname= $curpidname;
}

// if($pid<>'0'){
//      $sql="select * from ".TABLE_PAGE." where pidname='$pid'  $andlangbh limit 1";	 
// 		if(getnum($sql)>0){
// 			$row = getrow($sql);
// 			$maintitle= decode($row['name']);	
// 			$mainpidname= $row['pidname'];
// 			array_unshift($breadarr, getlink($mainpidname,'page','noadmin'));

// 		}



// }
// else{

// 	$maintitle= $title;
// 	$mainpidname= $pidname;

// } 
?>
<?php 
 require_once HTMLROOT.'page_page.php';

?>