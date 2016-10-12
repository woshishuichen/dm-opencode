<?php //这是单行的首页新闻滚动效果
   
       $pidshort = substr($pid,0,4);  
       if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
       else  $sqlv=" pid='$pid' ";
       
      // if($sta_tj=='y') $statjsql=" and sta_tj='y' ";
      //  else  $statjsql="  ";

   $sqlall="select * from ".TABLE_NODE." where $sqlv  $andlangbh   and sta_visible='y' and sta_noaccess='n'   order by pos desc,id desc limit $maxline";
   //echo $sqlall;
   if(getnum($sqlall)>0){
      $result = getall($sqlall);
?>


<div class="news_scroll">
<ul>        
<?php 
 foreach($result as $v){

     $tid = $v['id'];
     $title = $v['title'];  $pidname = $v['pidname']; 
     $dateday = $v['dateday'];   
     $despjj = $v['despjj']; 
       
         // $url = getlink($pidname,'node','noadmin','title');
     $alias = alias($pidname,'node');
      $url = url('node',$alias,$tid,'');

       $desp= web_despdecode($v['desp']);
      $desptext= web_despdecode($v['desptext']);
      $despv='';
      if($desptext<>'') $despv = $desptext;
      else  $despv = $desp;

      if($despjj<>'') $despvv = $despjj;
      else $despvv = $despv;

      $despvv2 = mb_substr(strip_tags($despvv),0,160,'utf-8');


 $arrdate = explode("-",$dateday);
 $year = @$arrdate[0];
 $month = intval(@$arrdate[1]);
 


$Month_E = array(1 => "Jan",
        2 => "Feb",
        3 => "Mar",
        4 => "Apr",
        5 => "May",
        6 => "Jun",
        7 => "Jul",
        8 => "Aug",
        9 => "Sep",
        10 => "Oct",
        11 => "Nov",
        12 => "Dec");

    $monthen = @$Month_E[$month];
     
 
   ?>


<li>
     <div class="w1">         
            <div class="circle">
            <div class="date"><?php echo $year?><br /><?php echo $monthen?>             
            </div>    
            </div>
          </div>
          <div class="w2">
             <a class="title" href="<?php echo $url?>"><?php echo $title?></a> 
            <div class="desp"><?php echo $despvv2?> </div>
          </div>      
  </li> 
   <?php
        }
   ?>    

</ul>
</div> 



<?php
    }
    else{echo '暂无内容。';}
?>

<script>
$(function(){
      $(".news_scroll").jCarouselLite({
        btnNext: ".next1",
        btnPrev: ".prev1", scroll: 1,//滚动多少个。default is 1.
  //  mouseWheel: true Note: You need the Mouse Wheel plugin for this to work.
   speed: 1000,start: 0,visible:3,//visible default is 3
   //vertical: true
   auto: 800, vertical: true,
   
    });
      //-------------
});

 
</script>