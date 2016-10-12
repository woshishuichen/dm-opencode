
 <?php 
 global $andlangbh;global $curstyle;
    $sqlall="select * from ".TABLE_BLOCK." where pidname='$pidname'   and type='vblock'    $andlangbh  order by id desc limit 1";
  // echo $sqlall;
    if(getnum($sqlall)>0){
        $v = getrow($sqlall);
 
     $tid = $v['id'];//$effect = $v['effect'];
     $name = $v['name'];//$sta_name = $v['sta_name'];
      $cssname = $v['cssname']; $more = $v['more'];
     $blockcntid = $v['blockcntid'];
       $imgsmall = $v['kv'];
       if($imgsmall=='') {$imgv=$imgv2='';}
       else{
           $imgv = UPLOADPATHIMAGE.$imgsmall; 
          $imgv2 = '<img class="perimgmax100" src="'.$imgv.'" alt="'.$name.'" />'; //use onledesp...

      }

$morev = $more<>''?$more:TEXTMORE;

$linkurl = $v['linkurl'];  
$linkurlv ='';
if($linkurl<>'')  $linkurlv ='<div class="bkmore dmbtn"><a  '.linktarget($linkurl).' class="more" title="'.$name.'" href="'.$linkurl.'">'.$morev.'</a></div>';

    
 
    $despjj = $v['despjj'];
    $desp= web_despdecode($v['desp']);
      $desptext= web_despdecode($v['desptext']);
      $despv='';
      if($desptext<>'') $despv = $desptext;
      else  $despv = $desp;

 $despv='<div class="bkdesp">'.$despv.$linkurlv.'</div>';

  //$effectname = get_fieldnolang(TABLE_BLOCK,'effect',$blockcntid,'pidname');

   //   if($blockid=='' || $blockid =='single_normal')   $blockid2 = 'single_normal_mb'; 
     // else  $blockid2 = $blockid; 
     // echo '<!--effect:'.$blockcntid.'-->'; 
$arrblockdata=array(
  'name'=>$name,
  'cssname'=>$cssname,
  'imgv'=>$imgv,
  'despv'=>$despv,
  );
     if(substr($blockcntid, 0,6)=='bkcnt_'){
      if($blockcntid<>'bkcnt_onlydesp') blockcnt($blockcntid,$arrblockdata);
      else echo '<div class="c '.$cssname.'">'.$imgv2.$despv.'</div>';

    }
     else{ 
       $reqfile=EFFECTROOT.'block/'.$blockcntid.'.php';
       if(is_file($reqfile)) require $reqfile;
       else echo '<p style="background:#ccc;color:red">没有此文件: '.$reqfile.' </p>';
      }


           
}
else { echo '<p>暂无内容，找不到区块： '.$pidname.'</p>';}
?>


