<?php
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
?>
<?php
function block($pidname){
if($pidname<>''){
	global $attach_type;global $reqfile;global $curstyle;	global $andlangbh;
 
//block,dhvh,chpr
//custom/devp_***.php
//2013/***/.jpg or .swf
  $pidstring = substr($pidname,0,4);
   $pidifimg = gl_imgtype($pidname);
   if($pidstring=='hide') {
		return '';
	}
   // else if($pidstring=='bloc') {
		//return block2($pidname);	
	//}
	elseif($pidstring=='grou') {
		return group($pidname);
	}
	elseif($pidstring=='vblo') {
		 
		//$reqfile=EFFECTROOT.'block/single_normal.php';
		// if(is_file($reqfile)) require $reqfile;
   		// else echo '<p style="background:#ccc;color:red">没有此文件: '.$reqfile.' </p>';
   		$reqfile = 'block/vblock.php';
   		 $effect ='vblock';
   		//echo $reqfile;
   		 $edittype = 'vblock'; //use for edit linktype
   		require(EFFECTROOT.'block_otherlay.php');
	}


	elseif($pidstring=='prog') {
		//block_reqfile('p',$pidname);
        $reqfile = 'prog/'.$pidname.'.php';  $effect ='prog';
         $edittype = 'prog'; //use for edit linktype
   		require(EFFECTROOT.'block_otherlay.php');
		//$reqfile=EFFECTROOT.'prog/'.$pidname.'.php';
		// if(is_file($reqfile)) require $reqfile;
   		// else echo '<p style="background:#ccc;color:red">没有此文件: '.$reqfile.' </p>';
		
	}

   elseif($pidstring=='ndli') {
		return ndli($pidname);		
	}
	  elseif($pidstring=='regi') {
	  			return region($pidname);
	  	// $sqlre = "SELECT id from ".TABLE_REGION." where pidname='$pidname'   $andlangbh order by pos desc,id";
	  	 //and stylebh='$curstyle'   -- cancel temp,bec index and common
	  	// if(getnum($sqlre)>0) 		return region($pidname);	
	  	// else {echo '区域和模板不统一。';}	
	}
	  elseif($pidstring=='regc') {
	  			return regcommon($pidname);
	}

	elseif($pidstring=='bloc') { //no cancel. for admin preview...
		 return regionblock($pidname);			
	 }
	
	elseif(in_array($pidifimg,$attach_type)){
		//echo '<div class="bannerimg"><img src="'.UPLOADPATHIMAGE.$pidname.'" alt="" /></div>';
		 $reqfile = 'imgfj'; $effect = 'imgfj';
		  $edittype = 'imgfj'; //use for edit linktype
   		require(EFFECTROOT.'block_otherlay.php');		
	}
	
	
	else{echo 'error  block -- '.$pidname;}
	// $menu_kz = substr($menu,-3);
       // if($menu_kz=='swf') {
      //      get_flash($menu,'transparent');//opaque
      // }
}//pidname not null
}//end func


function group($pidname){   
	//echo 'no group dh...';return;
		Global $andlangbh;
   $sqllunh="select * from ".TABLE_BLOCK." where pidname='$pidname' and pid='0' $andlangbh limit 1";
    //echo $sqllunh;
	if(getnum($sqllunh)>0){

		$row_lunh = getrow($sqllunh);		
		$effect=$row_lunh['effect']; //this pidname;

		//---------
		//$effectvv=get_field(TABLE_BLOCK,'effect',$effect,'pidname');
  $sqleff="select effect from ".TABLE_BLOCK." where pidname='$effect' and type='effect_dh'  limit 1";// no $andlangbh
    $roweff = getrow($sqleff);
    $effectvv = $roweff['effect'];

		$effect = $effectvv;//for data-effect

		//--------------------------------------------------
		$dhtrigger=$row_lunh['dhtrigger'];  
		$cssname=$row_lunh['cssname']; 
		$effmore=$row_lunh['more'];  
		  $blockimg_w=$row_lunh['sm_w'];$blockimg_h =$row_lunh['sm_h'];  

		if($effect=='') echo '出错，后台里没有选择效果effect';
		else {			
			// $reqfile = EFFECTROOT.'block/'.$effect.'.php';			
			//  if(is_file($reqfile)) require $reqfile;
    		 // else echo '<p style="background:#ccc;color:red">没有此文件: '.$reqfile.' </p>';
			 $reqfile = 'block/'.$effectvv.'.php';
			  $edittype = 'group'; //use for edit linktype
			  $editpidname = $pidname;//bec override pidname variable
   		    
   		     require(EFFECTROOT.'block_otherlay.php');	
		}
				 
	}
	else echo '出错，没有这个标识符 '.$pidname;
 
		
}//end func

function ndli($pidname){ 
	  

		Global $andlangbh;Global $userurl;global $edittype;global $curstyle;
    $sqllunh="select * from ".TABLE_BLOCK." where pidname='$pidname'   $andlangbh limit 1";
	  //echo $sqllunh;
	if(getnum($sqllunh)>0){
		$row_lunh = getrow($sqllunh);
		//pre($row_lunh);
		$effect=$row_lunh['effect'];  
		$pid=$row_lunh['pid'];	 
		$maxline=$row_lunh['maxline'];
		if($maxline<1) $maxline=1;		

		$dhtrigger=$row_lunh['dhtrigger']; $dhpara=$row_lunh['dhpara'];   

		$cssname=$row_lunh['cssname']; $effmore=$row_lunh['more'];  

		
		if($effect=='') echo '出错，后台里没有选择效果effect';
		else  {

			 //$effectname = get_fieldnolang(TABLE_BLOCK,'effect',$effect,'pidname');
			 //$reqfile = EFFECTROOT.'block/'.$effect.'.php';
			 //if(is_file($reqfile)) require $reqfile;
    		//else echo '<p style="background:#ccc;color:red">没有此文件: '.$reqfile.' </p>';
    		 $reqfile = 'block/'.$effect.'.php';
    		  //echo $effectname;
    		// echo $reqfile;
    		 $edittype = 'ndli'; //use for edit linktype
    		 $editpidname = $pidname;//bec override pidname variable
   		     require(EFFECTROOT.'block_otherlay.php');	
		}	
		 		 
	}
	else echo '出错，没有这个标识符 '.$pidname;
 
		
}//end func





function region($region){
// pre($region);
Global $andlangbh;Global $curstyle;

  $sqlbuju = "SELECT * from ".TABLE_REGION." where pid='$region'  and sta_visible='y'  $andlangbh order by pos desc,id";
	//  echo $sqlbuju;
	  echo '<div class="blockregion" data-effect="regionidnex">';
  //no use edit in region
	 if(getnum($sqlbuju)>0){
		 $result = getall($sqlbuju);
		 // pre($result);	
		
			foreach($result as $v){
				 // $pidname = $v['pidname'];
			 // echo $pidname;
				//  if(strpos('cc'.$region,'nindex')>0 && $regsta_sub=='n'){
				// 		  if(strpos('cc'.$rgindex_design,$pidname)>0){

				// 	     regionblockecho($v);
				// 		 } 
				// }
				// else 
				 regionblockecho($v);

		// echo $region.'<Br>';
			}//end foreach
		
		}
		else { echo  '出错，没有这个区域： '.$region.'，或者是它的区块都隐藏了。(至少要有一个是显示的)';
				}
 
	 	echo '</div>';	
 
}//end func
 

function regionblock($v){ //only echo the block 

Global $andlangbh;
	 $sqlbuju = "SELECT * from ".TABLE_REGION." where pidname='$v' $andlangbh order by id limit 1";
	// echo $sqlbuju;
	 if(getnum($sqlbuju)>0){
	 	  $result = getrow($sqlbuju);
	 	  regionblockecho($result);

		}
		else  echo  '出错，没有这个标识符 '.$v;
}//end func
 

 function regcommon($region){
Global $andlangbh;
$sql2 = "SELECT cssname,sta_width_cnt from ".TABLE_REGION." where pidname='$region'  $andlangbh order by id limit 1";
 
if(getnum($sql2)>0){
	$row2 = getrow($sql2); 
	$cssname =  $row2['cssname'];
	$sta_width_cnt = $row2['sta_width_cnt'];
	//$cssnamev = $cssname<>''?' class="'.$cssname.'"':'';
echo '<div class="blockregion '.$cssname.'">';
if($sta_width_cnt=='n') echo '<div class="container">';
//-----------------------
$sqlbuju = "SELECT id,name,sta_name,cssname,blockid,desptext,desp from ".TABLE_REGION." where pid='$region'  and sta_visible='y'  $andlangbh order by pos desc,id";
	//  echo $sqlbuju;
	 // echo '<div class="blockregion" data-effect="mainregion">';
  //no use edit in region
	 if(getnum($sqlbuju)>0){
		 $result = getall($sqlbuju);
		 // pre($result);	
		
			foreach($result as $v){
				$tid = $v['id'];
				 $name = $v['name'];$sta_name = $v['sta_name'];$cssname = $v['cssname'];
				 $blockid = $v['blockid'];

				 
				 $desptext= web_despdecode($v['desptext']);
				 $desp= web_despdecode($v['desp']);			
			if($desptext<>'') $despv = $desptext;
			else  $despv = $desp;
 
			 
				echo '<div class="block '.$cssname.'">'; //block for hover edit link
				if($sta_name=='y') echo '<h3>'.$name.'</h3>';
				 if($blockid==''){
				 	if($despv<>''){//except clear css,no desp
						 if(dmlogin()){ //is in func_block. bec declare.bec this file repeat require		 
				               dmeditlink($region,$tid,'regcommonblock');		//here is $pid,not pidnmae	
						  } 
					}
		  			echo $despv;}
				 else {block($blockid);}
				echo '</div>'; 
				


			}//end foreach
		
		}
		else {  echo  '出错，没有这个公共区域： '.$region.'，或者是它的区块都隐藏了。(至少要有一个是显示的)';

		   }
 
	 	//echo '</div>';	
if($sta_width_cnt=='n') echo '</div>';	

 echo '</div>';		   
  }
 
else{ echo  '出错，没有这个公共区域： '.$region;
}

}//end func



function regionblockecho($v){ 
	// pre($v);
$pid=$v['pid'];$tid=$v['id'];

		   if(dmlogin()){ //is in func_block. bec declare.bec this file repeat require
               dmeditlink($pid,$tid,'regionblock');		//here is $pid,not pidnmae	   
             }
		 
      //  echo '<div class="blockregion" data-effect="'.$effect.'">';	
      //make simple,no use edit in sub region.------  
	      $effect = 'block_regionindex';
				$effectv = EFFECTROOT.$effect.'.php';  
				 if(is_file($effectv)) require ($effectv);
				 else echo '效果文件：'.$effectv.'.php不存在--'.$pid.'--'.$pidname.'<br />';
			 
	 
	//-----------------
	 

 
}//end func
?>
<?php 
function dmlogin(){
		if(ISADMIN=='y' &&STA_FRONGEDIT=='y') return true;
		else return false;
	
} 
 function dmeditlink($pidname,$tid,$type){ 
 	global $curstyle;global $curstylenow;
 	 
 if($curstyle==$curstylenow){ 	 
 	$urlhere = BASEURL.ADMINDIR;
   //mainregion
 	//mod_region/mod_region.php?lang=cn&pidname=region20160307_1119576083&file=list&act=list
 	// if($type=='mainregion'){
 	// 	$linkv = $urlhere.'/mod_region/mod_region.php?lang='.LANG.'&pidname='.$v.'&file=list&act=list';
 		
 	// 	  echo  '<a target="_blank" href="'.$linkv.'" class="dmedit dmeditregion">编辑区域</a>';

 	// 	//return $_SESSION['isadmin'];
 	// 	//return $_SESSION['admindir'];
 	// }

 	if($type=='regionblock'){  
 			$typefirst=substr($pidname,0,11);
 		  $typereg='common'; 
      if($typefirst=='regionindex') $typereg='index';

 		  $linkv = $urlhere.'/mod_region/mod_region_edit.php?lang='.LANG.'&pidname='.$pidname.'&file=editcan&act=edit&tid='.$tid.'&type='.$typereg;
 	   
 		  echo  '<div style="position:relative"><a style="display:none" target="_blank" href="'.$linkv.'" class="dmedit dmeditregion">编辑区域</a></div>';

 		//return $_SESSION['isadmin'];
 		//return $_SESSION['admindir'];
 	}
 
 	if($type=='regcommonblock'){

//mod_region/mod_regcommon.php?lang=cn&type=common&pidname=regcommon20160527_1137076152&file=subaddedit&act=edit&tid=163

 $linkv = $urlhere.'/mod_region/mod_regcommon.php?lang='.LANG.'&type=common&pidname='.$pidname.'&file=subaddedit&act=edit&tid='.$tid;
 	   
 		  echo  '<div style="position:relative"><a style="display:none" target="_blank" href="'.$linkv.'" class="dmedit dmeditregion">编辑公共区域</a></div>';

 		//return $_SESSION['isadmin'];
 		//return $_SESSION['admindir'];
 	}


 	if($type=='vblock'){
         $tid =  get_field(TABLE_BLOCK,'id',$pidname,'pidname');
	 	 ///mod_block/mod_block.php?lang=cn&pidname=&file=edit&act=edit&tid=101
 		$linkv = $urlhere.'/mod_block/mod_block.php?lang='.LANG.'&file=edit&act=edit&tid='.$tid;
 		
 		  echo  '<a style="display:none" target="_blank" href="'.$linkv.'" class="dmedit">编辑区块</a>';

	 }
	 	if($type=='imgfj'){
       $tid =  get_field(TABLE_IMGFJ,'id',$pidname,'kv');
	 	 ///mod_imgfj/mod_imgfj.php?lang=cn&pid=name&file=edit&act=edit&tid=51
 		$linkv = $urlhere.'/mod_imgfj/mod_imgfj.php?lang='.LANG.'&pid=name&file=edit&act=edit&tid='.$tid;
 		 echo  '<a style="display:none" target="_blank" href="'.$linkv.'" class="dmedit">编辑附件</a>';

	 }
	 if($type=='ndli'){
         //mod_block/mod_nodelist.php?lang=cn&pidname=ndlist20151219_0900015030&file=addedit&act=edit
 		$linkv = $urlhere.'/mod_block/mod_nodelist.php?lang='.LANG.'&pidname='.$pidname.'&file=addedit&act=edit';
 		 echo  '<a style="display:none" target="_blank" href="'.$linkv.'" class="dmedit">编辑文章列表</a>';

	 }
	 //  if($type=='group'){
	 //  	//no use
  //        //mod_block/mod_nodelist.php?lang=cn&pidname=ndlist20151219_0900015030&file=addedit&act=edit
 	// 	 $linkv = $urlhere.'/mod_block/mod_img.php?lang='.LANG.'&pidname='.$pidname.'&file=sublist&act=list';
 	// 	// echo  '<a target="_blank" href="'.$linkv.'" class="dmedit">编辑效果</a>';
 	// 	 echo  '<a target="_blank" href="'.$linkv.'" class="dmedit">no use group</a>';

	 // }
	   if($type=='prog'){
         echo  '<a style="display:none" target="_blank" href="javascript:void(0)" style="cursor:default" class="dmedit">请编辑'.$pidname.'</a>';

	 }	
	 //-----------
	 } 
//------------------
}


function editlink($v,$type){
global $curstyle;global $curstylenow;
 
 if($curstyle==$curstylenow){ 

    $urlhere = BASEURL.ADMINDIR;
	 if(dmlogin()){  
	 echo '<div class="dmeditnode">';
		    if($type=='node'){
				///mod_node/mod_node_edit.php?lang=cn&act=editcan&tid=47&file=editcan
				$linkv = $urlhere.'/mod_node/mod_node_edit.php?lang='.LANG.'&tid='.$v.'&file=editdesp&act=editcan';
				 echo  '<a target="_blank" href="'.$linkv.'">编辑内容</a>';

			}
			 if($type=='page'){
				///mod_menu/mod_menu_edit.php?lang=cn&file=edit_can&act=edit&tid=6
				$linkv = $urlhere.'/mod_page/mod_page_edit.php?lang='.LANG.'&file=edit_desp&act=edit&tid='.$v;
				 echo  '<a target="_blank" href="'.$linkv.'">编辑内容</a>';

			}
		echo '</div>';	
	 }
//------------------------
}	
//-------------------
}//end func


?>