
 <?php 
// echo 'no use';
// exit;     --------------when menu is top
 ?>
<div class="sidermenutop"> 

<?php 

$sqlmenu = "SELECT * from ".TABLE_MENU." where pid='$mainpidname' and stylebh='$curstyle' and sta_visible='y' $andlangbh order by pos desc,id";
//echo $sqlmenu;
if(getnum($sqlmenu)>0){
	echo '<ul>';
	$menulist = getall($sqlmenu);	
	//pre($menulist);
		foreach($menulist as $v){	
	$pidname=$v['pidname']; 
	$linkurl=$v['linkurl'];
	$menu_xiala=$v['menu_xiala'];
	$type=$v['type'];
			 $name=decode($v['name']);
 if($type=='page'){

 		 $subpagearr = get_fieldarr(TABLE_PAGE,$pidname,'pidname');   
             if($subpagearr=='no') {$name='单页面不存在';
                   
                }
                else {
                   $name=decode($subpagearr['name']);
                   $tid=$subpagearr['id'];	  
                    $alias_jump=$subpagearr['alias_jump'];

				$aliascc = alias($pidname,'page');
			 		$linkurl = url('page',$aliascc,$tid,$alias_jump); 
                  
                }



 }


			  
			
			 //-------------------
			 	if($curpidname==$pidname) $active=' active"';
   				 else $active= '';

	
  echo '<li class="m"><a class="m'.$active.'" '.linktarget($linkurl).' href="'.$linkurl.'">'.$name.'</a></li>';
        

			 //---------------------
                }//end foreach
echo '</ul>';
	} //if(getnum($sqlmenu)>0)
	else echo '<ul><li class="m"><a class="m" href="">'.$maintitle.'</a></li></ul>';

?> 

</div>
 