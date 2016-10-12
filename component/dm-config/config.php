<?php
  
$stadir='DM-static/';
$uploaddir='1/';
 
 date_default_timezone_set('Asia/Shanghai'); //设置时区
 // echo date('d-m-Y H:i:s');
 
//$stapath=$baseurl.$stadir;
//define('STAPATH', $stapath);  //  all move to indexDM_load.php
 
$PHP_SELF=$_SERVER['PHP_SELF'];

//------------
$attach_type=array('jpg','gif','jpeg','png','swf','rar','ico');
$attach_img=array('jpg','gif','jpeg','png');
$attach_size=630200;
$format_t=implode(' .',$attach_type);
$format_t=  '支持的格式：.'.$format_t.'  ，附件不能大于'.intval($attach_size/1024).'K。';

$album_s_w=280;
$album_s_h=280;

//---------

//----------------------
$salt = '00';
$sespshou='5633da';//num geshu is important

$norr2='没有找到相关内容，请添加。';
$filenotexist='文件不存在，请检查填写是否正确。';
$var404='404.html';

$bshou=date("Ymd_His").rand(1000,9999);//is pidname
$dateall = date("Y-m-d H:i:s");
$dateday = date("Y-m-d");

$arr_order = array('ing'=>'刚下单',
                    'fa'=>'已发货',
                    'good'=>'已成交',
    'tui'=>'退货',
    'bad'=>'废单'    
    );
?>