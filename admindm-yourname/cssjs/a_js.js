//add..............
$(document).ready(function(){
   
	 xiala_show('navlang');xiala_show('navblock');xiala_show('navcate');
tab();	 
//stopsubmit();
editmenuother();
//popup();
popclose();
$('.bgmask').click(function(event) {
	    $('.bgmask').hide();
            $('.popcontent').hide();
});

	$('.formtabhovertr tr').hover(function(){
	   $(this).addClass('hovertr');
	},function(){
	    $(this).removeClass('hovertr');
	});

$('.needpopup').click(function(e) {
	  e.preventDefault(); 
	  //alert($(this).attr('href'));
	  popup($(this).attr('href'));
	  return false;
});
//---------end ready----------------------------------------
}); //end ready

function editmenuother(){   
		   $(".editmenuother").click(function(){ 
			  $(".editmenuother_cnt").slideToggle();
			});
}

function stopsubmit(){
     $('input[type=submit]').click(function(){

       // alert(0);

     });
}//end func


function xiala_show(classname){
$("."+classname).hover(
	  function () {  
		//$(".navlang ul").addClass("hover");
		$(this).children(".xialabox").show();
	  },
	  function () {
		//$(".navlang ul")removeClass("hover");
		$(this).children(".xialabox").hide();
	  }
	);
//
}//end func

function tab(){ 
$(".tab span").click(function(){
thisindex =$(this).index()+1;
$(".tab span").toggleClass('cur');
$(".tabarea>div").hide();
$(".tabarea .tab"+thisindex).show();
 

});
//
}//end func



 function  setdefault(actgo2,tid,backpage,text){  
    if (confirm(text)){
      golink  = backpage+'&act='+actgo2+'&tid='+tid;
	//alert(golink);
       window.location=golink;
    }
}


function  del(actgo2,pidname,backpage){  
    if (confirm("确定删除?不能恢复")){
      golink  = backpage+'&act='+actgo2+'&pidname='+pidname;
	//alert(golink);
       window.location=golink;
    }
}
function  del2(actgo2,pidname,pidname2,backpage){  //when del region sub
    if (confirm("确定删除?不能恢复")){
      golink  = backpage+'&act='+actgo2+'&pidname='+pidname+'&pidname2='+pidname2;
	//alert(golink);
       window.location=golink;
    }
}
function  delid(actgo2,id,backpage){  
    if (confirm("确定删除?不能恢复")){
      golink  = backpage+'&act='+actgo2+'&tid='+id;
	//alert(golink);
       window.location=golink;
    }
}

function  delimg(actgo2,tid,imgv,backpage){  
    if (confirm("确定删除?不能恢复")){
      golink  = backpage+'&act='+actgo2+'&tid='+tid+'&v='+imgv;//imgv no use
	//alert(golink);
       window.location=golink;
    }
}

function  isnum(v){  //alert(v);
    if(!isNaN(v)){return true;
  			// alert("是数字");
		}
	else{return false;
		   //alert("不是数字");
		}

	/*
	    var pos=thisForm.pos.value;
    //正则表达式，需要注意的是这里并没有引号，而是用//
    var reg=/^[0-9]*$/;
    if(!reg.test(pos)){
	   alert("pos必须是数字");	
		thisForm.pos.focus();
		return (false);
   
   }
   */	 
		 
}
 
// gosele
function gosele(sobj,can,jumpv) {
	var thevalue =sobj.options[sobj.selectedIndex].value;
	if (thevalue != "") {
	//alert(docurl);
	var gov =  jumpv+can+'='+thevalue;
	//alert(gov);
	 location.href=gov;
	  // open(docurl,'_blank');
	  // sobj.selectedIndex=0;
	  // sobj.blur();
	}
}


 function popup(iframev){
 	// var popcontent  = '<div class="popcontent" style="display:none"> <span onclick="javascript:popclose()"   class="popclose"></span><iframe width="100%" id="popiframe" height="100%" frameborder="0"  scrolling="auto"  src="../mod_common/iframeblank.php" /></div>';
 	// var bgmask  = '<div class="bgmask"> </div>';

// if($('.popcontent').length==0){
// 	  $('body').append(bgmask);
//       $('body').append(popcontent);
// }

  $('.bgmask').show();
  $('.popcontent').show();

if(iframev=='') var iframev = '../mod_common/iframeblank.php';
 $('#popiframe').attr('src',iframev);

 
  popupName = $('.popcontent');
 var _scrollHeight = $(document).scrollTop(),//»ñÈ¡µ±Ç°´°¿Ú¾àÀëÒ³Ãæ¶¥²¿¸ß¶È
     _windowH = $(window).height(),//»ñÈ¡µ±Ç°´°¿Ú¸ß¶È
     _windowW = $(window).width(),//»ñÈ¡µ±Ç°´°¿Ú¿í¶È
     _popupH = popupName.height(),//»ñÈ¡µ¯³ö²ã¸ß¶È
     _popupW = popupName.width()+40;//»ñÈ¡µ¯³ö²ã¿í¶È
     _posiTop = (_windowH - _popupH)/2 + _scrollHeight;
     _posiLeft = (_windowW - _popupW)/2;
 popupName.css({"left": _posiLeft + "px","top":_posiTop + "px","display":"block"});//ÉèÖÃposition
  
  bgH = $(document).height();

   $('.bgmask').css({height:bgH+'px'}); 

 }

function popclose(){
	$('.popclose').click(function (){
		    $('.bgmask').hide();
            $('.popcontent').hide();
		});
 }
     

