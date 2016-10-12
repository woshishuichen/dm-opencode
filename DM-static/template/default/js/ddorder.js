//技术支持 DM建站系统 www.demososo.com

//-----------------------------
var danprice =0;
 $(function(){

     var cnthei = $('.orderform .form .content').height();
        var bodywidth = $('body').width();
        
if(bodywidth>600)  $('.orderform .success .content').height(cnthei);
else   $('.orderform .success .content').height(200);
  
  //----------------
  
$('.formproduct .inpradio').change(function(){
      danprice =  $(this).parents('.formproduct').find('.danprice').text();
     // var productname = $(this).siblings('.pname').text();
     // alert(productname);
    //alert(danprice);
    $('.totalprice').text(danprice);
     $('.danprice').val(danprice);
  //   $('.productname').val(productname);
     $('.curnum').val(1);

});
  //---------------
 	$('.curnum').blur(function(){
 		 var curnum = $('.curnum').val();
             if(curnum<=0)  {alert('不能少于1');$('.curnum').val(1)}
   
		});


       $('.numjian').click(function(){
              
             var curnum = $('.curnum').val();
             if(curnum>=2)  curnum --;
             else {alert('不能少于1');}
            
               $('.curnum').val(curnum);
                totalprice(curnum);

       });
       $('.numjia').click(function(){       
             var curnum = $('.curnum').val();
             curnum ++;
             $('.curnum').val(curnum);
             totalprice(curnum);
       	
       });
      
totalprice(1);
 //-----------
  danprice3 =  $('.formproduct .danprice').eq(0).text();
  $('.danprice').val(danprice3);

 //   var productname = $('.formproduct label').eq(0).text();
  //   $('.productname').val(productname);

 //------------------
});


    function totalprice(num){
           // var danprice = $('.danprice').html();
           if(danprice==0) {
             var danprice2 =  $('.formproduct .danprice').eq(0).text();
               var totalprice =  danprice2*num;

           }
           else   var totalprice =  danprice*num;

           $('.totalprice').html(totalprice);
          

      }


 function mar(demo, demo1, demo2){
        var speed=40
        var demo=document.getElementById(demo);
        var demo2=document.getElementById(demo2);
        var demo1=document.getElementById(demo1);
        demo2.innerHTML=demo1.innerHTML;
        function Marquee(){
            if(demo2.offsetHeight<=demo.scrollTop)
                demo.scrollTop-=demo1.offsetHeight;
            else{
                demo.scrollTop++;
            }
      //console.log(demo2.offsetHeight);
      /*  if(demoheight-scrollTopheight<0){demo.scrollTop=0;}
        else demo.scrollTop++;*/
        }
        var MyMar=setInterval(Marquee,speed)
        demo.onmouseover=function() {clearInterval(MyMar)}
        demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
    }


     function valide(){
    
        var mobilePattern = /^(1[3568][0-9]{1})(-)?([0-9]{8})$/;

        fname = $.trim($('.fname').val());
        fcellphone = $.trim($('.fcellphone').val());
        farea1 = $.trim($('.farea1').val());
        farea2 = $.trim($('.farea2').val());
        farea3 = $.trim($('.farea3').val());
        faddress = $.trim($('.faddress').val());
        fcomment = $.trim($('.fcomment').val());
    
if(fname=='')  {alert('请输入姓名');
            $('.fname').focus();return false;
            }
 
else if(fcellphone=='') {alert('请输入手机号码');
            $('.fcellphone').focus();return false;
            }
  else if(!mobilePattern.test(fcellphone)) 
              {alert('手机格式不对');
               $('.fcellphone').focus();return false;
              }  
      
  else if(farea1=='请选择') {alert('请选择省份');
            $('.farea1').focus();return false;
            } 
    else if(farea2=='请选择') {alert('请选择市');
            $('.farea2').focus();return false;
            }  
    else if(farea3=='请选择') {alert('请选择区');
            $('.farea3').focus();return false;
            } 
     else if(faddress=='') {alert('请输入详细地址');
            $('.faddress').focus();return false;
            }          
 
//------
 }
  
