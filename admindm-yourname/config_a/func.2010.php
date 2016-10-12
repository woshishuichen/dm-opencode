<?php
/*
powder by JASON.ZHANG
    
*/
if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}

/*********************************************************/
function p2030_imgyt($addr,$w_h='y',$linkbig='n') { //sure is img,use p2030_imgyt($bgimg,'y','y');,or use check_blockid($bgimg); 
               
  if($addr=='') return;
Global $attach_img;
	 $imgtype = gl_imgtype($addr);$imgfirstpart=gl_img_s($addr);
	  $addr_small=UPLOADPATHIMAGE.$imgfirstpart.'_s.'.$imgtype;
	  
	$addr_v = UPLOADROOTIMAGE.$addr;  
 
	$addr_vwww = UPLOADPATHIMAGE.$addr.'?v='.rand(1000,9999);	
        //echo $w_h;exit;
		
if(strpos($addr,'://')>1){
	 return '<div><a target=_blank href='.$addr.' ><img src='.$addr.' alt="查看原图" width="120" height="70" /><br />查看原图</a></div>';
}
else{		 
        if(is_file($addr_v))//file_exists = is_dir + is_file
        {
		  
            if($imgtype=='swf') return '<a class="vieflash" target=_blank href='.$addr_vwww.' >查看Flash</a>';
			if(!in_array($imgtype,$attach_img)) return '<a href='.$addr_vwww.' target="_blank">'.$imgtype.'格式[下载]</a>';
      
      // if($w_h=='y')  return '<div><a class="needpopup" target=_blank href='.$addr_vwww.' ><img src='.$addr_vwww.' alt="显示图片" width="120" height="70" /><br />查看原图</a></div>';
      //       else  {
      //   				if($linkbig=='y') return '<div><a   target=_blank href='.$addr_vwww.' ><img src='.$addr_small.' alt="显示图片" width="120" height="70" /><br />查看大图</a></div>';
        				
      //           return '<img src='.$addr_vwww.' alt="显示图片"/>';
        			
      //   			}
 return '<div style="padding:5px;text-align:center"><a   target=_blank href='.$addr_vwww.' ><img src='.$addr_vwww.' alt="显示图片" width="120" height="70" /><br />查看原图</a></div>';

        }
        else return '<span class="cred">文件不存在，请检查是否填写正确</span>';
}	
}
/*********************************************************/
function p2030_delimg($addr,$delbig,$delsmall){
$imgtype = gl_imgtype($addr);
if($delsmall=='y'){
            $imgfirstpart=gl_img_s($addr);
            $addr2 =UPLOADROOTIMAGE.$imgfirstpart.'_s.'.$imgtype;
         if(is_file($addr2)) unlinkdm($addr2);//when use in test,temp not delete
         }//else only del big img.
if($delbig=='y'){ $addrbig =UPLOADROOTIMAGE.$addr;
            if(is_file($addrbig))  unlinkdm($addrbig);
}
}

/******************************************************************************/

function menu_changesta($v,$jumpv,$tid,$act) {
Global $sta_visible;Global $tr_hide;
    if($v=="n")
            {
             $menusta="<a href='$jumpv&act=$act&v=y&tid=$tid' class='but3'>切换状态</a>";
                $sta_visible="<span class=cred>隐藏</span> $menusta";
             $tr_hide=' class="tr_hide" ';
            }
            else {
                 $menusta="<a href='$jumpv&act=$act&v=n&tid=$tid' class='but3'>切换状态</a>";
                 $sta_visible="显示 $menusta";
            $tr_hide='';
            }
            return ;

}

function menu_changesta22($v,$jumpv,$tid,$act) { //use in sta_big5
    if($v=="n")
            {
             $changev="<a href='$jumpv&act=$act&v=y&tid=$tid' class='but3'>切换状态</a>";
            }
            else {
                 $changev="<a href='$jumpv&act=$act&v=n&tid=$tid' class='but3'>切换状态</a>";
                
            }
            return $changev;

}

/************************************/
function f2030_pagelink_from_cat($catname) {//$catname is catid
Global $user2510;
 $sql = "SELECT pagelink from zmoo_menu where pbh='".USERBH."' and  bs_cat='$catname'  order by id desc";
  $row = getrow($sql);
      $pagelink = $row['pagelink'];
  if($pagelink <>'')  return $pagelink;else 'unknown';

}
/********************/
function f2030_menuname_from_cat($catname) {//$catname is catid,then get menuname;menuname is pagelink
Global $user2510;
 $sql = "SELECT name from zmoo_menu where pbh='".USERBH."' and  bs_cat='$catname' and sta_cmp='y' order by id desc";
  $row = getrow($sql);
      $menuname = $row['name'];
  if($menuname <>'')  return $menuname;else 'unknown';

}

/******************************************************************************/

function p20_edit_text($v,$phpself,$tid,$catid,$page) {
  return "<a class='but1' href='$phpself?act=edit&tid=$tid&catid=$catid&page=$page'>$v</a>";
}
function p20_del_text($v,$phpself,$tid,$catid,$page,$pidname) {
  return "<a href=javascript:del5('$phpself','$tid','del','$catid','$page','$pidname')  class=but2>$v</a>";
}

/*********************************************/
function chao_red($table,$ppid,$nums,$jumpv,$jumpif='y') {
     GLOBAL  $user2510; GLOBAL  $chao_rec;
     if($ppid<>'') {$ppid=" and ppid='$ppid' ";
     }
 $sql = "SELECT id from $table where pbh='".USERBH."'  $ppid order by id desc";
        $num_rows = get_numrows($sql);
        if($num_rows>=$nums){
            $chao_rec=$chao_rec.'  - (允许数为:'.$nums.')';
            if($jumpif=='y'){  alert($chao_rec); jump($jumpv);}
            else{
                $chao_rec=$chao_rec.' - 请点击浏览器的后退键返回';
              alert($chao_rec);
            }
            exit;
        }
}
function chao_red_imgsm($table,$rec,$jumpv,$pid,$lx) {
     GLOBAL  $user2510; GLOBAL  $chao_rec;
 $sql = "select id from  $table  where pbh='".USERBH."' and  pid='$pid' and lx='$lx' order by  id desc ";
        $num_rows = get_numrows($sql);
        if($num_rows>$rec){
            alert($chao_rec);
            jump($jumpv.'?pid='.$pid);
        }

}

/******category function part********************************************************/
function left_cate($rowlist_cat,$name,$catid,$catpid) {//catid use for cur class
     GLOBAL  $user2510; GLOBAL  $art_cat_id;
  echo '<h3>'.$name.'</h3><ul>';
if($rowlist_cat=='no'){//if have not cate,then add first one.
alert('出错，请先初始化分类，请联系技术支持');
}//echo '<li><a href='.$php_self.'>'.$name.'</a></li>';
   else{
        foreach($rowlist_cat as $vcat){
          $pidname=$vcat['pidname'];
          if($pidname==$catid) $cur='class="cur"'; else $cur='';
          if($vcat['sta_visible']<>'y') $catname_hide='(已隐藏)';else $catname_hide='';
             echo '<li><a '.$cur.' href='.$PHP_sELF.'?catid='.$pidname.'>'.$vcat['name'].$catname_hide.'</a>';
     $sql = "SELECT pidname,name,sta_visible from zme_cate where  pid='$pidname' and pbh='".USERBH."' order by pos desc,id";
                $rowlist_cat_sub = getall($sql);
                if($rowlist_cat_sub<>'no') {
                    echo '<ul>';
                        foreach($rowlist_cat_sub as $vcat_sub){
                                    $subpidname=$vcat_sub['pidname'];
                                    if($subpidname==$catid) $cur='class="cur"'; else $cur='';
                                    if($vcat_sub['sta_visible']<>'y') $subname_hide='(已隐藏)';else $subname_hide='';
                            echo '<li><a '.$cur.' href='.$PHP_sELF.'?catid='.$subpidname.'>'.$vcat_sub['name'].$subname_hide.'</a></li>';
                        }

                    echo '</ul>';


                }

             echo '</li>';

            }}
   echo '</ul><p><a class="but1" href="pro-category.php?catid='.$clapid.'" target="_blank">分类管理</a></p>';
}
function left_cate_new($rowlist_cat,$name,$catpid,$defcat,$urlcan) {//catid use for cur class
     GLOBAL  $user2510; GLOBAL  $art_cat_id;
  echo '<h3>'.$name.'</h3><ul>';

        foreach($rowlist_cat as $vcat){
          $pidname=$vcat['pidname'];
          if($pidname==$defcat) $cur='class="cur"'; else $cur='';
          if($vcat['sta_visible']<>'y') $catname_hide='(已隐藏)';else $catname_hide='';
             echo '<li><a '.$cur.' href='.$PHP_SELF.'?catid='.$pidname.'&'.$urlcan.'>'.$vcat['name'].$catname_hide.'</a>';
     $sql = "SELECT pidname,name,sta_visible from zme_cate where  pid='$pidname' and pbh='".USERBH."' order by pos desc,id";
                $rowlist_cat_sub = getall($sql);
                if($rowlist_cat_sub<>'no') {
                    echo '<ul>';
                        foreach($rowlist_cat_sub as $vcat_sub){
                                    $subpidname=$vcat_sub['pidname'];
                                    if($subpidname==$defcat) $cur='class="cur"'; else $cur='';
                                    if($vcat_sub['sta_visible']<>'y') $subname_hide='(已隐藏)';else $subname_hide='';
                            echo '<li><a '.$cur.' href='.$PHP_SELF.'?catid='.$subpidname.'&'.$urlcan.'>'.$vcat_sub['name'].$subname_hide.'</a></li>';
                        }

                    echo '</ul>';


                }

             echo '</li>';

            } 
   echo '</ul>';
}


function left_cate_main($rowlist_cat,$name,$catid,$phpself) {//use imgfj or cate
Global $user2510;
  echo '<h3>分类管理</h3><ul>';
    //echo $rowlist_cat;
       if($rowlist_cat=='no') echo '<li><a href='.$php_self.'>'.$name.'</a></li>';
   else{
        foreach($rowlist_cat as $vcat){
          $id=$vcat['0'];
            if($id==$catid) $cur='class="cur"'; else $cur='';


          $sql="select id from zme_cate where pid='$id' and pbh='".USERBH."'  order by id LIMIT 0 , 30 ";
$num=get_numrows($sql);if($num>0) {$num='<span class="cred">有子分类</span>';}
 //
 $sql="select name from zmoo_menu where bs_cat='$id' and pbh='".USERBH."'  and sta_cmp='y' order by id LIMIT 1 ";
$row=getrow($sql);
if($row=="no") echo '';
else {
    $catname=$row["name"];
    echo '<li><a '.$cur.' href='.$phpself.'?catid='.$id.'>'.decode($catname).'</a> ('.$id.') ('.$num.')</li>';
}

//
            }}
   echo '</ul>';
}

/*
function left_cate_nosub($rowlist_cat,$name,$catid,$phpself) {//use imgfj or cate
Global $user2510;
  echo '<h3>'.$name.'</h3><ul>';
    //echo $rowlist_cat;
       if($rowlist_cat=='no') echo '<li><a href='.$php_self.'>'.$name.'</a></li>';
   else{
        foreach($rowlist_cat as $vcat){
          $id=$vcat['0'];
            if($id==$catid) $cur='class="cur"'; else $cur='';

if($name=="附件管理"){
      $catname=$vcat['1'];
      $sql="select id from zmoo_imgfj where pid='$id' and pbh='".USERBH."'  order by id";
$num='<span class="cred">'.get_numrows($sql).'</span>';
echo '<li><a '.$cur.' href='.$phpself.'?catid='.$id.'>'.$catname.'</a> ('.$id.') (有'.$num.'个)</li>';
}else{
          $sql="select id from zme_cate where pid='$id' and pbh='".USERBH."'  order by id LIMIT 0 , 30 ";
$num=get_numrows($sql);if($num>0) {$num='<span class="cred">有子分类</span>';}
 //
 $sql="select name from zmoo_menu where bs_cat='$id' and pbh='".USERBH."'  and sta_cmp='y' order by id LIMIT 1 ";
$row=getrow($sql);
if($row=="no") echo '';
else {
    $catname=$row["name"];
    echo '<li><a '.$cur.' href='.$phpself.'?catid='.$id.'>'.decode($catname).'</a> ('.$id.') ('.$num.')</li>';
}
}//end if($name=="附件")
//
            }}
   echo '</ul>';
}
*/

/***********************************/
function p2030_waterjudge() {
    global $waterv;
  //  Global $imgtype_img;//echo $waterv;
   // $imgtype=gl_imgtype($waterv_addr);
    //if(is_file($waterv) && in_array($imgtype,$imgtype_img)) return 'y';
	if(is_file($waterv)) return 'y';
    else return 'n';

}
/*****************************
function switch_cat($catid) {
 switch ($catid)
{
case 'cat1':  $catname='新闻分类';  break;case 'cat2':  $catname='产品分类';  break;case 'cat3':  $catname='文章分类';  break;
case 'cat4':  $catname='相册分类';  break;case 'cat5':  $catname='视频分类';  break;case 'cat6':  $catname='留言分类';  break;
case 'cat7':  $catname='其他分类1';  break;case 'cat8':  $catname='其他分类2';  break;case 'cat9':  $catname='其他分类3';  break;
case 'cat10':  $catname='其他分类4';  break;case 'cat11':  $catname='其他分类5';  break;case 'cat12':  $catname='其他分类6';  break;
}
return $catname;
}*/
/******************************/
function tongbu_pidname($table) {
    Global $user2510;
 $ss = "select id from $table where pbh='".USERBH."' order by id desc  limit 1";
 $row = getrow($ss);$tid=$row['id']; $pidname=date("YmdHis").'_'.rand(1000,9999) ;//char 19
 $ss = "update $table set pidname='$pidname' where id='$tid' and pbh='".USERBH."' limit 1";
iquery($ss);
}

/*****************************


function gl_showsmallimg($imgsmall,$link='',$blank='_blank') {//user album click small img to big img.//$fo_bef is lunh/ or abm_pro/

if($imgsmall=='') $imgsmall='请上传图片';
else
    {
            $imgtype = gl_imgtype($imgsmall);$imgfirstpart=gl_img_s($imgsmall);
         
$imgaddr=$stadirwww.'/'.$imgfirstpart.'_s.'.$imgtype;
$imgaddr_big=$stadirwww.'/'.$imgsmall;
    $imgsmallv='<img src="'.$imgaddr.'" alt="图片" />';
	
            if($link=='y')//use for abm_sm to show big pic.
               $returnV = '<a href="'.$imgaddr_big.' "  target="_blank">'.$imgsmallv.'</a>';         
            else $returnV = $imgsmallv;

   }
return $returnV;
}
*/
function gl_abmimglist_bg($fo_bef,$imgsmall,$link='',$blank='_blank') {//front end,qian tai use in abm list,for verticle center,
    Global $imgpath; Global $admin_img_dir;
if($imgsmall=='') $imgsmall='请上传图片';
else
    {$imgadd_jd = $admin_img_dir.$fo_bef.$imgsmall;//jd--juedui path.
    // if(is_file($imgadd_jd))//file_exists = is_dir + is_file
        //{
            $imgtype = gl_imgtype($imgsmall);$imgfirstpart=gl_img_s($imgsmall);
            $imgsmall_jd = $admin_img_dir.$fo_bef.$imgfirstpart.'_s.'.$imgtype;//jd--juedui path.
           //echo $imgsmall_jd;exit;
if(is_file($imgsmall_jd)){
    // .abmlist li dl dt a img{display:inline-block;width: 120px;height: 120px;  }
//<img src="../image/pixel.gif" style="background-image:url(http://127.0.0.150/images/up_abm/abm1/20100523_1136129654_s.jpg);" />
$imgaddr=$imgpath.$fo_bef.$imgfirstpart.'_s.'.$imgtype;
$imgtm=$imgpath.'img/tm.gif';
    $imgsmallv='<img src="'.$imgtm.'" style="background-image:url('.$imgaddr.')" alt="图片" />';

               $imgsmall = '<a href="'.$link.'" target="'.$blank.'">'.$imgsmallv.'</a>';

 }else $imgsmall='<span class="cred">文件不存在</span>';
   }//end $imgsmall==''
return $imgsmall;
}

//-------------
function ifhave_cat($pidname){
global $user2510;
	$sql = "SELECT id from zme_cate  where  pidname='$pidname' and pbh='".USERBH."' order by id desc limit 1";
    $row= getrow($sql);
    if($row=='no'){alert('出错，此分类不存在。');jump('pro-category.php');}//this judge is important
    
}//end func

//-------------



//-----------
function num_imgfj($pidname){
  global $andlangbh;
	$sql = "SELECT id from ".TABLE_IMGFJ."  where  pid='$pidname' $andlangbh order by id";
	 
   return '<span class="cred">'.getnum($sql).'</span>';
	 
} 
//-----------
function string_staaccess($v){
   if($v=='y') return '<span class="cred"> (禁止访问)</span>';
  // else return $v;
    else return '';
} 
function string_stavisi($v){
   if($v=='n') return ' (隐藏)';//use for select in menu edit can.php
  // else return $v;
    else return '';
} 
//----------------------------------------------------
function check_blockid($biaoshi){ 
   global $andlangbh; global $attach_img;
   $editlink = '';
  $editlinkerror = '<span class="cred">标识'.$biaoshi.' 不存在，请仔细检查。</span>';
   
  $firstzm=substr($biaoshi,0,4);
  /*
$isimgfj = is_int(strpos($biaoshi,'/'));
*/
 $imgtype = gl_imgtype($biaoshi);
 $isimgfj = false;
if(in_array($imgtype,$attach_img)) $isimgfj = true;
        
if($biaoshi<>''){

if($isimgfj) {
	//echo strpos($biaoshi,'://');
	if(strpos($biaoshi,'://')>1) $addr2 = $biaoshi;
     else $addr2 = UPLOADPATHIMAGE.$biaoshi;
	//	echo $addr2;
	$editlink=' <div class="cgray"><a target="_blank"  href="'.$addr2.'"><img src="'.$addr2.'" height="50" width="100" alt="" /><br/ >(查看原图)</a></div>';
}
else{
  //----------------
//if($firstzm=='bloc') {   -- no use temp......
   //   $sql = "SELECT id,pid from ".TABLE_REGION."  where pidname='$biaoshi' $andlangbh order by id limit 1";
    //  $row = getrow($sql);  
    //  if($row<>'no'){
     //       $tid = $row['id'];
       //     $pid = $row['pid'];

      //    $editlink=' <a target="_blank" href="../mod_region/mod_region.php?lang='.LANG.'&file=editcan&pidname='.$pid.'&act=edit&tid='.$tid.'"  style="color:green">修改标识 '.$biaoshi.'</a>';
       //   mod_region_edit.php?lang=cn&pidname=region20151217_1144369667&file=editcan&act=edit&tid=109
       // }
      //  else  $editlink=' <span class="cred">(标识不存在'.$biaoshi.')</span>';
  //}


 if($firstzm=='ndli') {
				$sql = "SELECT id from ".TABLE_BLOCK." where pidname = '$biaoshi' $andlangbh   order by id limit 1";
				if(getnum($sql)==0) $editlink = $editlinkerror;
				else {	
			$editlink='<a target="_blank" href="../mod_block/mod_nodelist.php?lang='.LANG.'&pidname='.$biaoshi.'&file=addedit&act=edit" style="color:green">修改标识 '.$biaoshi.'</a>';
				}			
 }
  //elseif($firstzm=='grou') {
        //   if($biaoshi=='group_i20160101_0932453193') $editlink='这是一个系统标识，请不要调用它。';
        //  else  $editlink='<a target="_blank" href="../mod_block/mod_img.php?lang='.LANG.'&type=img&pidname='.$biaoshi.'&file=sublist&act=list" style="color:green">修改标识 '.$biaoshi.'</a>';}
   
    elseif($firstzm=='vblo'){		
				$sql = "SELECT id from ".TABLE_BLOCK." where pidname = '$biaoshi' $andlangbh   order by id limit 1";
				if(getnum($sql)==0) $editlink = $editlinkerror;
				else {		
				  $tid = get_field(TABLE_BLOCK,'id',$biaoshi,'pidname');  // get_field($table,$field,$v,$type){ 
				$editlink='<a target="_blank" href="../mod_block/mod_block.php?lang='.LANG.'&file=edit&act=edit&tid='.$tid.'" style="color:green">修改标识 '.$biaoshi.'</a>';				
				  }
} 
   //lang=cn&pidname=&file=edit&act=edit&tid=147

   elseif($firstzm=='regi') 
    {
      //$typefirst=substr($biaoshi,0,11);
     // $typev='common';
     // echo $typefirst;
      //if($typefirst=='regionindex') $typev='index';
				$sql = "SELECT id from ".TABLE_REGION." where pidname = '$biaoshi' $andlangbh   order by id limit 1";
				if(getnum($sql)==0) $editlink = $editlinkerror;
				else {
      $editlink='<a target="_blank" href="../mod_region/mod_region.php?lang='.LANG.'&pid='.$biaoshi.'&file=sub&type=index" style="color:green">修改标识 '.$biaoshi.'</a>';
				}
}
   elseif($firstzm=='regc') 
    {
				$sql = "SELECT id from ".TABLE_REGION." where pidname = '$biaoshi' $andlangbh   order by id limit 1";
				if(getnum($sql)==0) $editlink = $editlinkerror;
				else {	
      $editlink='<a target="_blank" href="../mod_region/mod_regcommon.php?lang='.LANG.'&pidname='.$biaoshi.'&file=sub&type=common&file=list" style="color:green">修改标识 '.$biaoshi.'</a>';
				}
}


  elseif($firstzm=='prog') {
    $profile = EFFECTROOTADMIN.'prog/'.$biaoshi.'.php';
    if(is_file($profile )) 
       $editlink=' <span class="cgray">(自定义文件 effect/'.$biaoshi.'.php)</span>';
     else  $editlink=' <span class="cred">(自定义文件 effect/'.$biaoshi.'.php 不存在！)</span>';
    }
     elseif($firstzm=='cate' or $firstzm=='csub') {$editlink='';}
	 elseif($firstzm=='hide') {$editlink='';}
 else  $editlink=' <span class="cred">(标识错误'.$biaoshi.')</span>';


  //-----------------
}

return  $editlink;
}
else return '<span class="cgray">无标识</span>';


} 
 
//--------------
function spancolor($v){
    $whitecss = '';
	if($v=='white' || $v=='#fff' ||$v=='#ffffff') $whitecss = 'border:1px solid #ccc;';
    echo ' <span style="'.$whitecss.'display:inline-block;width:30px;height:15px;background:'.$v.'"> </span>';

}
//--------------
function stylebhcntlink($curstyle){
	 
	 $mbname = get_field(TABLE_STYLE,'title',$curstyle,'pidname');
	 
	 $linkbs = '<a class="needpopup" href="../mod_module/mod_showblockid.php?pidname='.$curstyle.'&lang='.LANG.'">查看标识</a>';
	 $linkfj = '<a class="needpopup"  href="../mod_imgfj/mod_imgfj.php?pid=name&lang='.LANG.'">名称附件</a>';
	 
  //$linkaff = '?lang='.LANG.'&stylebh='.$curstylebh;
  $linkaff = '?lang='.LANG;
 
   $linkv = '<div class="styleeditlink styleeditlink2">';
   $linkv .= '<a href="../mod_menu/mod_menu.php'.$linkaff.'" target="_self">菜单</a>';
  
   //$linkv .= '<a class="a2" href="../mod_region/mod_region.php'.$linkaff.'&type=index" target="_self">首页定制</a>';
   $linkv .= ' <a href="../mod_layout/mod_layoutcommon.php'.$linkaff.'" target="_self">公共布局</a>';
 
  //$linkv .= ' <a class="a2" href="../mod_block/mod_block.php'.$linkaff.'" target="_self">图文区块</a>';
 
   //$linkv .= '<a class="a2"  href="../mod_block/mod_nodelist.php'.$linkaff.'" target="_self">效果区块</a>';
   $linkv .= '当前模板： <span class="cred">'.$mbname.' -- '.$curstyle.'</span>';
  $linkv .=  $linkfj. $linkbs;
   $linkv .= '</div>';
echo $linkv;
 
 
 }
?>
