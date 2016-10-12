<?php

 //$backlist = '<a class="imgbg_blue" href='.$jumpvback.'?act=list><span>返回管理列表</span></a>';
$sort_ads='(排序规则：数字由大到小排序，数字相同，则先添加的排前面。)';
$sort_ads_f='(排序规则：数字由大到小排序，数字相同，则后添加的排前面。)';
$blank='<div class="blank"></div>';
$xz_maybe='(可不填)';
$xz_must='<span class=cred>(必填)</span>';
$xz_solebs='<span class=cred>(必填,不能有相同，且英文字母，如index 或者 sideblock)</span>';
$xz_num='<span class=cred>(必填,为数字)</span>';
$actsuccess='操作成功';

$text_usetext='<span class="cgray">(如果为空，则采用主分类的值)</span>';
$text_edit_nothisid='出错，没有此id';
$text_chao='超出限制数!';
$text_sm_wh='(为数字，在60-600之间)';
$text_trigger='<span class="cgray">(用于js效果的一个id，比如flexslider1。但不能和其他区块的相同。)</span>';
$text_adminhide='<span class="cgray">(本选项不影响前台，只是方便后台管理。)</span>';
$text_adminhide2='这里的切换状态(显示或隐藏)只是方便后台管理。不影响前台。) ';
$text_outlink='<span class="cgray">(外部链接要以http开头。)</span>';
$text_imgfjlink = '<div style="padding:5px"><a class="needpopup" href="../mod_imgfj/mod_imgfj.php?pid=name&lang='.LANG.'" class=""  >名称附件管理</a></div>';
$text_imgfjlink_bjq = '<a href="../mod_imgfj/mod_imgfj.php?pid=common&lang='.LANG.'"  class="needpopup"  >公共编辑器附件管理</a>';
  
 
 
/*******************************************/

//


/************************/
$h2tit = ' - 管理列表';
 $maxline=12;//list and pos use maxline;pos do not use before.
 
$chao_rec = '超出了记录范围，请联系技术支持';
//$biaoimgsm = '(可以不填，如果要填，请在附件管理里拷贝图片名称到这里，<br />如果是Flash，则格式：宽|高|flash值(用|隔开) 如 <span class=cblue>980|50|201002/20100329_1529286.swf &nbsp;&nbsp;<a href="">查看说明。</a>';
$biaoimgsm ='请在附件管理里拷贝 图片名称 到这里';
//$flash_sm = '';
$norr2='<p style="padding:20px">没有找到相关内容，请添加。</p>';
$note_taibs='<span class="cred">(如果这里有值，则轮换图片标识不起作用。)</span>';
$note_addafter='<span class="cred">(请添加完成后再去修改内容和其他选项。)</span>';
//$note_lunherror='<span class="cred">(提示：此处无效，因为下面抬头图片框里有值。)</span>';
$backlist='<div style="margin:20px;padding:20px;background:#A0B4DC"><a href="javascript:history.back(-1)"><b class="cred"  style="font-size:20px">[<<点击这里返回](或点击退后按钮)</b></a><br /><br /><span style="font-size:18px">(如果返回时出错，请刷新页面。)</span></div>';

$inputmust = '<input  type="hidden" name="inputmust" value="inputmust" />';
$inputmusterror  = '<p style="color:red;font-size:20px">网络问题。</p>';
 
$text_jump='<p class="f14bgred">如果跳转，那么这里的选项会无效。会直接跳到指定的页面。<br /><span class="cblue">(提示：如果是外网链接，必须以http开头，比如 http://www.demososo.com，而demososo.com会出错。)</span></p>'; 
$link_tip = '<p class="cred">(提示：如果是外网链接，必须以http开头，比如 http://www.demososo.com。)</p>';
$text_jump_cate='<p class="f14bgred">链接跳转</p>';

 $aliasjumptext = '';//(外部链接要以 http:// 开头)'; no use,because inner jump not need http://

 /*use in product*/
 



//----
/**
**array.............
**
************************************************************************************************
*****
*****
********/
$arr_yn=array('y'=>'是','n'=>'不是');
$arr_ynall=array('a'=>'不选','y'=>'是','n'=>'不是');//use block pro...
$arr_pagelayout=array('noallwidth'=>'非全宽，页面两边有空余(默认)','allwidth'=>'页面全宽(适合首页)(内容只采用默认内容的值)');//use block pro...
/*
$arr_big5=array('y'=>'自动切换','n'=>'手动建立另一版本');

$arr_blockpro_type = array('node'=>'内容列表','cate'=>'分类列表');
$arr_blockpro = array(
	'nd_homenews'=>'首页新闻列表/nd_homenews.php | node',
	'nd_homeproduct'=>'首页产品列表/nd_homeproduct.php | node',  
	'nd_homecatelist'=>'首页分类列表-nd_homecatelist.php | cate');

*/


$arr_bread = array('h'=>'隐藏','r'=>'右侧','t'=>'顶部');
$arr_column = array('n'=>'全宽，无侧边栏','l'=>'位于内容左侧','r'=>'位于内容右侧','t'=>'位于内容上面','b'=>'位于内容下面');




$arr_field=array('text'=>'简短文本text',
	'select'=>'下拉select',
	'radio'=>'单选按钮radio',
	'checkbox'=>'复选框checkbox',
	'textarea'=>'内容框textarea');
//,'attach'=>'附件'

$arr_mod = array('node'=>'内容管理模块');//,'blockdh'=>'效果区块管理模块'

$arr_album = array('album_fancybox'=>'fancybox相册 - album_fancybox.php',
	'album_jssor'=>'jssor相册 - album_jssor.php',
	'album_updown'=>'无效果相册由上到下排列 - album_updown.php'
	);
 
$arr_listfg = array('list_text'=>'列表 - list_text.php',
'list_grid'=>'图文 - list_grid.php',
'list_grid2ceng'=>'图文2 - list_grid2ceng.php',
'list_dh_bxslider'=>'图文(bxslider滚动) - list_dh_bxslider.php'
);

$arr_detailfg = array('detail_normal'=>'详情页 - detail_normal.php',
	);

$arr_menu= array('custom'=>'自定义菜单','page'=>'单页面','cate'=>'分类');
//$arr_blockposi= array('header'=>'头部','footer'=>'底部','index'=>'首页','other'=>'其他位置');
$arr_blockeffect= array('block_no'=>'无效果，只输出内容 block_no',
                        'block_title'=>'带标题栏 block_title',
                         'block_titlecenter'=>'带标题栏居中 block_titlecenter',   
                       // 'block_sidebar'=>'侧边栏 block_sidebar'
						);
 

	
$arr_singleblock = array(	
	// 'vblock_normal'=>'区块通用模板(包括内容，图片和链接)/vblock_normal.php',
	//'single_onlytext'=>'只输出内容/single_onlytext.php',
	'vblock_notice'=>'首页公告/vblock_notice.php',
	//'single_onetextlink'=>'一段文字加链接的效果/single_onetextlink.php',
	);
	 
$arr_blockcnt = array(	//use  dh effect,no vblock  
   'bkcnt_onlydesp'=>'只是内容/bkcnt_onlydesp',
    //'bkcnt_normal'=>'普通(默认)/bkcnt_normal',
	'bkcnt_imgleft'=>'图片在左，内容在右/bkcnt_imgleft',
	'bkcnt_imgrg'=>'图片在右，内容在左/bkcnt_imgrg',
	);


$arr_linkposi = array(	
	'belowtitle'=>'位于标题下面',	
	'belowtext'=>'位于内容下面',
	'righttext'=>'位于标题右边',
	
	);
$arr_bgeffect = array(	
	'n'=>'默认无效果',
	'para'=>'视觉差效果',	
	'fix'=>'固定在底部',	
	);


	
	$arr_blocknd = array( 
//'nd_banner_Glide'               =>'首页幻灯片Glide/nd_banner_Glide',
'nd_banner_sequencejs'          =>'首页幻灯片sequencejs/nd_banner_sequencejs.php',
//'nd_banner_parallaxSlider'      =>'首页幻灯片parallaxSlider/nd_banner_parallaxSlider.php',
'nd_banner_elastic'             =>'首页幻灯片效果elastic/nd_banner_elastic.php',
'nd_banner_fullscreenslide'     =>'全屏的幻灯片效果/nd_banner_fullscreenslide.php',
'no==---11'        =>'-----',
//'nd_banner_bxslider_bg'         =>'幻灯片bxslider--背景图片/nd_banner_bxslider_bg.php',
'nd_banner_bxslider_content'    =>'幻灯片bxslider--图片/nd_banner_bxslider_content.php',

'nd_homeproductbxslider'        =>'图文--单行滚动/nd_homeproductbxslider.php',
'no==--'        =>'-----',
'nd_grid'        =>'grid图文效果/nd_grid.php',
'nd_grid_2ceng'        =>'grid图文效果2-移上去有加号/nd_grid_2ceng.php',
'nd_grid_hoverdir'        =>'grid图文hoverdir效果/nd_grid_hoverdir.php',  
'nd_grid_hover2img'        =>'grid图文效果，鼠标移上去换图片/nd_grid_hover2img.php',
'nd_grid_kf'        =>'grid客户列表/nd_grid_kf.php',

'no==--2'        =>'-----',

'nd_tab_content'        =>'（tab切换）内容切换/nd_tab_content.php',
'nd_tab_nodecate'        =>'（tab切换）首页内容(新闻)分类/nd_tab_nodecate.php',
'nd_tab_cir_hometeam'        =>'（tab切换）首页团队圆角图片/nd_tab_cir_hometeam.php',
'no==--3'        =>'-----',

'nd_homenews'=>'简单的新闻列表/nd_homenews.php',
'nd_homenewsgd'=>'单行滚动新闻/nd_homenewsgd.php', 
'nd_homenewsgd_lines'=>'多行滚动新闻/nd_homenewsgd_lines.php', 
'nd_homenews_col'=>'多列新闻/nd_homenews_col.php', 
'nd_homenews_colsimple'=>'新闻 - 左图 右列表/nd_homenews_colsimple.php',

'no==--4'        =>'-----',

'nd_bxslider_whychooseus'=>'为什么 选择我们/nd_bxslider_whychooseus.php', 
'nd_bxslider_whychooseus2'=>'为什么 选择我们2/nd_bxslider_whychooseus2.php', 

'no==--5'        =>'-----',

'nd_bxslider_pj'=>'客户评价 bxslider滚动/nd_bxslider_pj.php',

//'nd_jssor_carousel'=>'首页客户jssor滚动效果/nd_jssor_carousel.php',

'nd_accord'=>'手风琴效果accord/nd_accord.php', 

	); 
	
$arr_blocknd_type = array( 
              'banner' =>'幻灯片','news' =>'新闻',
			  'product' =>'产品','case' =>'案例',
			  'team' =>'团队','kf' =>'客户','service' =>'服务',
'about' =>'关于我们','album' =>'图片相册',  'other' =>'其他', 
	); 
/*
$arr_group_img= array('dh_bxslider_homebanner'=>'首页幻灯片bxslider - dh_bxslider_homebanner.php',
		'dh_bxslider_kefu'=>'客户bxslider - dh_bxslider_kefu.php',
	'dh_jssor_kefu'=>'客户jssor - dh_jssor_kefu.php',
	'dh_cirimg'=>'首页圆形图片 - dh_cirimg.php'

	);
*/

//$arr_css= array('no'=>'无类型','fl'=>'左对齐','fr'=>'右对齐','poa'=>'绝对层','por'=>'相对层','clear'=>'分隔清行');
$arr_wrap = array('normal'=>'普通','clear'=>'分隔清行','divbegin'=>'div开头','divend'=>'div结尾');

$arr_editor = array('ck'=>'CK编辑器(默认)','baidu'=>'百度编辑器ueditor','kind'=>'kindeditor编辑器');
$arr_body_bgset = array('norepeat'=>'不平铺','repeatx'=>'从左到右平铺','repeaty'=>'从上到下平铺');
$arr_bsfooternavmob = array('a1'=>'移动端底部导航效果1','a2'=>'移动端底部导航效果2','no'=>'无内容');
//$arr_regiontype = array('indexcnt'=>'首页内容','header'=>'头部','footer'=>'底部','other'=>'其他');


/*******************************************/

 $arr_search = array('productname'=>'产品名称','name'=>'姓名',
                    'cellphone'=>'手机',
                    'address'=>'详细地址',
    'ly'=>'客户留言',
    'bz'=>'备注'    
    );
 
?>