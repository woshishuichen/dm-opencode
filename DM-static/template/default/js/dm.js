//技术支持 DM建站系统 www.demososo.com
 
jQuery(function(){


 if($('.needheaderfixed').length>0) $(".needheaderfixed").sticky({topspacing: 0});

  
 //alert($(document).width());

if($('body').width()>800)  {
	superfish();
// STICKY MENU
	
	//jQuery(".nav-bar").sticky({ topSpacing: 0, className: 'sticky', wrapperClassName: 'main-menu-wrapper' });
	//jQuery(".needheaderfixed").sticky({ topSpacing: 0, className: 'sticky', wrapperClassName: 'menu-sticky-wrapper'   });
	//$('.menu-sticky-wrapper').height($('.menu').height());
	// END STICKY MENU
	sidermenutop();
	}
else{dmmobjs();
 $(".nav-button").click(function () {
			$(".nav-button").toggleClass("open");
			 if($(".menu").hasClass('show'))  $(".menu").hide().removeClass('show'); 
 	 else $(".menu").show().addClass('show'); 
			}); 
//-----
}
 

			
$("[data-type='imgpara']").each(function(){
     $(this).css({
		  "background-position":"center -50px"
		  });
     
});

 $("[data-type='imgpara']").parallax({
		speed: 0.20
	});
$('.detailfontsize a').click(function(){
    var thisv = $(this).data('size');
	$('.detailfontsize a').removeClass('cur');
	$(this).addClass('cur');
	$('.content_desp p').css({'font-size':thisv,'line-height':'30px'});
	 
});
/*-----newstab toggledesp----------*/
$(".toggledesp .despjj").eq(0).show();
  $(".toggledesp li").hover(function(){
        $(this).siblings().find(".despjj").hide();
         $(this).find(".despjj").show();
        },function(){
       
        });
//-----------------
		

//http://www.bluesdream.com/blog/build-a-jquery-parallax-scrolling-website.html
/*
$("[data-type='imgpara']").parallax({
		speed: 0.20
	});
$(".imgpara_home").parallax({
    speed: 1.35
  });
  */
//$(window).resize(function(){
  // var width = $(document).width();    
//});
//-------------------
mobile_perimg();

  //$('.searchbtn').click(function(){

   // alert('搜索功能暂无。');
   // return false;
 // });
  //---------
  /*use fancybox
$('.homenotice .cnt').click(function() {
	var v = $('.homenotice .desp').html();
	popup(v);
});
$('.popclose').live("click",function(){
	  $('.popcontent,.bgmask').remove();
});*/

if($('.homenotice .cnt').length>0){
	 popcookie = getCookie('popcookie');
	 if(!popcookie){
	 	  $.fancybox.open("#homenoticedesp")
			// var v = $('.homenotice .desp').html();
			// popup(v,'');
		}
	setCookie('popcookie',true);	 
}


  
onlineqq();  
 $(".popup").fancybox();
 
 dmedit();
 tabs_switch();tabs_switchbyid();
 hidetabechocontent();
 headermobsearch();
 
 //--------end ready---
   
});
//-----------------------------



 

 function headermobsearch(){ 
	 	$('.headermobsearch').click(function(){ 
	 		 $(".topsearchbox").slideToggle();
			 
			 // if($(".menu").hasClass('show'))  $(".menu").hide().removeClass('show'); 
			 // $(".nav-button").toggleClass("open");
  
	 
	 	}); 		
 	}

 function dmedit(){ 
	$('.block').hover(function(){ 
	        $(this).find('.dmedit').show();
		},function(){
		      $(this).find('.dmedit').hide();
		});
	$('.blockregion').hover(function(){ 
	        $(this).find('.dmeditregion').show();
		},function(){
		      $(this).find('.dmeditregion').hide();
		});



	
 }
 
 function mobile_perimg(){ 
	 $('.content_desp img,.albumupdown img,.caseright img,.perimgwrap img').each(function(){
  
	 		if(!$(this).hasClass('noperimg')){
	 		      $(this).attr('style','');
	 		      /*
	 				if($('body').width()<600){                      
	 				    $(this).addClass('perimg');
	 				}
	 				else{
	 					 if($(this).width()>780){//img width
	 					 	$(this).addClass('perimg');
	 					 }
	 				}*/
	 				var bodywidth = $('body').width();
	 				var imgwidth = $(this).width();
	 				if(imgwidth>bodywidth) $(this).addClass('perimg');


	 				//-----------------
	 		}
	 });
}







//-----------------------------
function superfish(){ 
	jQuery('ul.m').superfish({
				//useClick: true
			});

}
//-----------------
function dmmobjs(){
	$(".menu").find("li ul.sub").each(function() {
			$(this).parent().prepend('<span class="sub-nav-toggle plus"></span>')
		});			
	$('.sub-nav-toggle').click(function(){
	      $(this).toggleClass("plus");
		  //if($(this).siblings("ul.sub").hasClass('show'))  $(this).siblings("ul.sub").removeClass('show');
		 // else $(this).siblings("ul.sub").addClass('show');
		// $(this).siblings("ul.sub").toggleClass('show');
		 if($(this).siblings("ul.sub").css("display") == "none")  {$(this).siblings("ul.sub").slideDown(500);}
		  else $(this).siblings("ul.sub").slideUp(500);		 
	});		

//------------
}
//-----------------------------
function onlineqq(){ 
	$('.onlineopen').click(function(){
			 $(this).hide();
				 $('.onlinecontent').show(); $('.onlineclose').show();
	});
	$('.onlineclose').click(function(){
			 $(this).hide();
				 $('.onlinecontent').hide(); $('.onlineopen').show();
	});

}
 
//-----------------------------//nrg  themes
function tabs_switch(){ 
 
   $('.tabs_switch .tabs_item').click(function(){
		var $t = $(this);
		var curVal = $t.parent().find('.tabs_item').index(this);			
		$t.closest('.tabs_wrapper').find('.tabs_container:visible').fadeOut(300, function(){		 
			$t.closest('.tabs_wrapper').find('.tabs_container').eq(curVal).fadeIn(300);
		});

		$t.parent().find('.active').removeClass('active');
		$t.addClass('active');
		return false;
		//$t.parent().parent().find('.tabs-select-text .text').text($t.text());
	});
}
function tabs_switchbyid(){ 
 
   $('.tabs_switchbyid .tabs_item').click(function(){
		var $t = $(this);
		//var curVal = $t.parent().find('.tabs_item').index(this);		
		var tabitemid = $(this).attr('id');  //use id replace curval..	bec bxslide maybe repeat loop.

		$t.closest('.tabs_wrapper').find('.tabs_container:visible').fadeOut(300, function(){		 
			//$t.closest('.tabs_wrapper').find('.tabs_container').eq(curVal).fadeIn(300);
			
			  $('.tabs_content .'+tabitemid).fadeIn();
		});

		$t.parent().find('.active').removeClass('active');
		$t.addClass('active');
		return false;
		//$t.parent().parent().find('.tabs-select-text .text').text($t.text());
	});
}
//-------------
function sidermenutop(){ 
     if($('.sidermenutop').length>0){
	    //$('.sidermenutop .subcatemenu').hide();
		//------------------
		 
		 $('.sidermenutop .maincatemenu').hover(function(){
				$(this).find('.subcatemenu').show();
			},function(){
				//$(this).find('.subcatemenu').hide();
		});

		
		
		//------------------
	 }

}
//--------------
 
function hidetabechocontent(){ //when tab content is bxslider,no hide,need overhide
 
  // var theheight = $('.tabs_echocontent .tabs_container').eq(0).height();
 // alert(theheight);
  //$('.tabs_echocontent .tabs_content').height(theheight);
}

//-------------
 

 //JS操作cookies方法!
//写cookies
function setCookie(name,value)
{
	var Days = 1;
	var exp = new Date();
	exp.setTime(exp.getTime() + Days*24*60*60*1000);
	document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}

function getCookie(name)
{
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");
	if(arr=document.cookie.match(reg))
	return unescape(arr[2]);
	else
	return null;
}
function delCookie(name)
{
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval=getCookie(name);
	if(cval!=null)
	document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}
/*menufixed*/

   
$(window).scroll(function(){ 
 var scrolldistance = $(document).scrollTop(); 
    changehomemenu(scrolldistance);
 //var scrolldistance=(document.compatMode && document.compatMode!="CSS1Compat")? document.body.scrollTop:document.documentElement.scrollTop||window.pageYOffset;//actually use window.pageYOffset

 //scrolldistance= window.pageYOffset; 
 
	// var scrolldistance = $(document).scrollTop();//will affect iframe when baidumap.so use other way
	         //  console.log(scrolldistance);
			//  var width = $(document).width();  
			 // if(width<801) return false;
			 
			// console.log($('.needheaderfixed').offset().top);
			  
			 
			 // if($('.needheaderfixed').length>0){
				 // if(scrolldistance>needheaderfixed_init) {
				   
						 // $('.needheaderfixed').addClass('headerfixed');return false;  //---------use sticky plugin
					//}
				   
				 // else {	// $('.needheaderfixed').removeClass('headerfixed');	return false;		 
						 
				 // }
			  //}
	 
	 });
function changehomemenu(scrolldistance){
//console.log(scrolldistance);
   
     if(scrolldistance>500) $('.page_index').addClass('changehomemenu');//when fullsecreen.
	 if(scrolldistance<100) $('.page_index').removeClass('changehomemenu');//when fullsecreen.
}
 
	
/*	 
	 
 function popup(v,box){ // use fancybox
 	var popcontent  = '<div class="popcontent popcontentbox1"> <span class="cp popclose fancybox-item fancybox-close"></span> '+v+'</div>';
 	var bgmask  = '<div class="bgmask fancybox-overlay fancybox-overlay-fixed"> </div>';

    $('body').append(bgmask);
     $('body').append(popcontent);
 
  popupName = $('.'+box);
 var _scrollHeight = $(document).scrollTop(),//获取当前窗口距离页面顶部高度
     _windowH = $(window).height(),//获取当前窗口高度
     _windowW = $(window).width(),//获取当前窗口宽度
     _popupH = popupName.height(),//获取弹出层高度
     _popupW = popupName.width()+40;//获取弹出层宽度
     _posiTop = (_windowH - _popupH)/2 + _scrollHeight;
     _posiLeft = (_windowW - _popupW)/2;
 popupName.css({"left": _posiLeft + "px","top":_posiTop + "px","display":"block"});//设置position
  bgH = $("body").height();
   $('.bgmask').css({height:bgH+'px'}).show(); 

 }
 */

