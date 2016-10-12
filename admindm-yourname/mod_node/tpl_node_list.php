<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 ?>
 <div class="menu">
<a href="<?php echo $jumpv;?>">管理列表</a>  
 <a href='<?php echo $jumpv_add;?>'>添加内容</a>
</div>


 <div class="pro_album_left" style="width:18%">

 
 <h3><?php echo $maincate;?></h3>
 <ul>
    <?php
	$sqlcatlist = "SELECT * from ".TABLE_CATE." where  pid='$catpid' $andlangbh order by pos desc,id";
	//echo $sqlcatlist;
  if(getnum($sqlcatlist)>0){
$rowcatlist= getall($sqlcatlist);
 //left_cate_new($rowlist_cat,$title,$catpid,$defcat,$urlcannopagenocatid);
 
  if($catpid==$catid) $cur2='class="cur"'; else $cur2='';
  echo '<li><a '.$cur2.' href='.$jumpv.'&catid='.$catpid.'>'.$maincate.'</a><ul>';
 
        foreach($rowcatlist as $vcat){
          $pidname=$vcat['pidname'];		
          if($pidname==$catid) $cur='class="cur"'; else $cur='';		
          if($vcat['sta_visible']<>'y') $catname_hide='(已隐藏)';else $catname_hide='';
             echo '<li><a '.$cur.' href='.$jumpv.'&catid='.$pidname.'>'.decode($vcat['name']).$catname_hide.'</a>';
			 
     $sqlsubcatlist = "SELECT pidname,name,sta_visible from ".TABLE_CATE." where  pid='$pidname' $andlangbh  order by pos desc,id";
                $rowlist_cat_sub = getall($sqlsubcatlist);
                if($rowlist_cat_sub<>'no') {
                    echo '<ul>';
                        foreach($rowlist_cat_sub as $vcat_sub){
                                    $subpidname=$vcat_sub['pidname'];
                                    if($subpidname==$catid) $cur='class="cur"'; else $cur='';
                                    if($vcat_sub['sta_visible']<>'y') $subname_hide='(已隐藏)';else $subname_hide='';
                            echo '<li><a '.$cur.' href='.$jumpv.'&catid='.$subpidname.'>'.decode($vcat_sub['name']).$subname_hide.'</a></li>';
                        }

                    echo '</ul>';


                }

             echo '</li>';

            } //end foreach
		echo '</ul></li>'; 
     
?>
</ul>
 <p><a class="but1" href="../mod_category/mod_category.php?lang=<?php echo LANG?>&catid=<?php echo $catpid;?>">分类管理</a></p>

 <?php }
 else echo '暂无内容';?>
</div><!-- end pro_album_left-->
<div class="pro_album_right" style="width:80%">
<?php
//echo $catzj;//modlist_news.php
if($act=="list") require_once HERE_ROOT.'mod_node/tpl_node_list_inc.php';
elseif($act=="add" or $act=="insert") require_once HERE_ROOT.'mod_node/tpl_node_add.php';

 

?>
</div>

<div class="c"></div><!--end right-->
  