<?php
/*
	made by cmsmeng.com
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
} 
?>
<?php
$secondcatepidname ='';
$sta_maincate='n';
//----if come from detail--------
if($detailid<>''){
$sql_detail = "SELECT * from ".TABLE_NODE."  where  id='$detailid' $andlangbh  order by id limit 1";
				$row_detail=getrow($sql_detail);	//$row_detail for system/syst_content_article_detail.php	
				if($row_detail=='no') {fnoid();exit;}	

				//--------
$arr_candetail=$row_detail['arr_can']; 
$bscntarr = explode('==#==',$arr_candetail); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }

 //pre($bscntarr);
    $seo1_det = $seocus1; $seo2_det = $seocus2; $seo3_det = $seocus3;   
//-----------------


				$pid= $row_detail['pid'];
				$title= $row_detail['title'];$detail_pos= $row_detail['pos'];	
				$pidname= $row_detail['pidname'];
				$detailkv= $row_detail['kv'];

				
				$dateedit= $row_detail['dateedit'];

			
				if($sta_noaccess=='y') {fnoaccess();exit;}

				 layoutcur($pid,'read');//layoutcur($pid,$type);  

				//----------------
				$sql2 = "SELECT id,modtype from ".TABLE_CATE."  where  pidname='$pid' $andlangbh  order by id limit 1";
				$row2=getrow($sql2);
				$routeid= $row2['id'];
	}			
//------------------
$sql="select * from ".TABLE_CATE." where id='$routeid'  $andlangbh limit 1"; 
	if(getnum($sql)>0){
		$row=getrow($sql); 
		$pid=$row['pid']; 
		$tid=$row['id'];
		$cate_level=$row['level'];		$cate_last=$row['last'];
	 
		$catetitle=decode($row['name']); 
		$curcatepidname=$row['pidname'];//not use pidname,conflict to sidebar pidname

		$alias_jump =  $row['alias_jump'];
		$alias = alias($pidname,'cate');
		$cururl = url('cate',$alias,$tid,$alias_jump);
		$curlink = l($cururl,$catetitle,'','');
		$breadarr[0] = $curlink;

	 if($pid=='0'){
        	$mainpidname = $curcatepidname;   
        	$layouttype='cate';   $sta_maincate='y';
        	//echo $pid.'ss';   	 
        	       

        }
        else{
        	$layouttype='csub';    
//echo $pid.'aa';   	
        		$sql22="select * from ".TABLE_CATE." where pidname='$pid'  $andlangbh limit 1"; 
				 $row22=getrow($sql22); 
				 $pid22=$row22['pid']; 
				 //echo $pid22; 
				 $pidname22=$row22['pidname'];

				 

				 if($pid22=='0'){
			        	$mainpidname = $pidname22;  			        			        	 
			        	array_unshift($breadarr, getlink($mainpidname,'cate','noadmin')); 
			        	$secondcatepidname = $curcatepidname;
			        	
			        }  
			        else {

			        	$sql33="select * from ".TABLE_CATE." where pidname='$pid22'  $andlangbh limit 1"; 
						 $row33=getrow($sql33); 
						$mainpidname=$row33['pidname']; 
						$secondcatepidname = $pidname22;
						array_unshift($breadarr, getlink($pidname22,'cate','noadmin'));
						array_unshift($breadarr, getlink($mainpidname,'cate','noadmin'));
					
			        } 


        }
 //pre($breadarr);  
/*query maincate*/
$sql33="select * from ".TABLE_CATE." where pidname='$mainpidname'  $andlangbh limit 1"; 
$row33=getrow($sql33); 
//--------
$arr_cancate=$row33['arr_can']; 
$bscntarr = explode('==#==',$arr_cancate); 
     if(count($bscntarr)>1){
          foreach ($bscntarr as   $bsvalue) {
             if(strpos($bsvalue, ':##')){
               $bsvaluearr = explode(':##',$bsvalue);
               $bsccc = $bsvaluearr[0];
               $$bsccc=$bsvaluearr[1];
             }
          }
      }

 //pre($bscntarr);
//-----------------
$maintitle=decode($row33['name']);
$modtype=$row33['modtype']; //modetype only use in maincate or detail
$maxline=$row33['maxline'];  if($maxline<1) $maxline = 10;
$listfg=$row33['listfg'];$listcssname=$row33['listcssname'];  
$detailfg=$row33['detailfg'];

 $seo1_main = $seocus1; $seo2_main = $seocus2; $seo3_main = $seocus3;


$mainalias = alias($mainpidname,'cate');

$album=$row33['album'];$albumcssname=$row33['albumcssname'];$albumposi=$row33['albumposi'];
/* end query maincate*/

if($detailid=='')  	  layoutcur($curcatepidname,$layouttype);//layoutcur($pid,$type);


 
		
		//$cur_id = 'cate'.$tid;
		
		$cur_alias=alias($pidname,'cate');	//detail use this file,so need this code
		if($cur_alias<>'') $cur_href = $cur_alias.'.html';//routeid and alias in htaccess
		else $cur_href = 'category-'.$routeid.'.html';	 //use in plugin_pager.php
		//$cur_link = '<a href="'.$cur_href.'">'.$title.'</a>';

		
		$cur_sta_noaccess=$row['sta_noaccess'];
		if($cur_sta_noaccess=='y') {fnoaccess();exit;}
	
		//-------------		
		//---breadcurmb
		// breadcrumb('cate');//in func_breadcrumb.php 


 		//--seo----
		if($detailid<>''){ 
		$seo1v=$seo1_det;
		$seo2v=$seo2_det;
		$seo3v=$seo3_det;
		$seotitle= $title;
		 
		}
		else{
			if($sta_maincate=='y'){
				$seo1v=$seo1_main;
				$seo2v=$seo2_main;
				$seo3v=$seo3_main;

			}
				else{
				$seo1v=$row['seo1'];
				$seo2v=$row['seo2'];
				$seo3v=$row['seo3'];
			}

			$seotitle= $catetitle;
			  
			}

		 //array_unshift($seo1, $curseo1);

		if($seo1v<>''){ $seo1[0] =$seo1v;} else  $seo1[0] =$seotitle;
		if($seo2v<>''){ $seo2[0] =$seo2v;} else  $seo2[0] =$seotitle;
		if($seo3v<>''){ $seo3[0] =$seo3v;} else  $seo3[0] =$seotitle;
		//var_dump($seo1);
			

	}
	else{ fnoid();exit;
	}
?>
<?php 
$bodycss = "$modtype cate$tid cate_$mainalias";	 

//if($detailid=='') require_once HTMLROOT.'page_'.$modtype.'.php';
//else   require_once HTMLROOT.'page_'.$modtype.'_detail.php';
if($modtype=='blockdh'){fnoid();exit;}

 require_once HTMLROOT.'page_'.$modtype.'.php';
?>