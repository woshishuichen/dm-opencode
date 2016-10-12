<?php 
$arr_formcolor = array('color-蓝色'=>'蓝色(默认)',
	'color-绿色'=>'绿色',
	'color-红色'=>'红色',
	'color-橙色'=>'橙色',
	'color-黑色'=>'黑色',
	'color-紫色'=>'紫色',

	);
$arr_formcolor2 = array('blue'=>'蓝色(默认)',
	'green'=>'绿色',
	'red'=>'红色','orange'=>'橙色',
	'black'=>'黑色',
	'purple'=>'紫色',
	);

$arr_formmenu = array('menu'=>'logo下面(默认)',
	'menuright'=>'logo右边',
	);


$arr_formbox = array('box-宽屏'=>'宽屏(默认)',
	'box-窄屏'=>'窄屏',
	);


function select_from_arr_color($arr,$curpid,$pls){//select_from_arr($arr_yn,0,'',$status);

    if($pls=='pls')  echo '<option  value="">请选择</option>' ; 
	 foreach ($arr as $k=>$v){	 
		 // if((int)$curpid==(int)$k) $select=' selected '; else $select='';	
		    if($curpid==$k) $select=' selected '; else $select='';	    
 echo '<option '.$select.'value="'.$k.'">'.$v.'</option>' ;			
	 }
}//end func


?>

<div class="sitecolorchange" style="display:none">
 
 <div class="sitecolor_title">选择配色：</div>

<div class="color">
<?php// foreach ($arr_formcolor2 as $k=>$v) {
	//echo '<a href="color.php?type=colorddorder&color=color_'.$k.'" class="'.$k.'" title="'.$v.'"></a>';
 
//}
?>
 

</div>


 

  
</div>

 