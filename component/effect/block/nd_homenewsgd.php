<?php //这是单行的首页新闻滚动效果
   
       $pidshort = substr($pid,0,4);  
       if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
       else  $sqlv=" pid='$pid' ";
       
      // if($sta_tj=='y') $statjsql=" and sta_tj='y' ";
      //  else  $statjsql="  ";

   $sqlall="select * from ".TABLE_NODE." where $sqlv  $andlangbh   and sta_visible='y' and sta_noaccess='n'   order by pos desc,id desc limit $maxline";
   if(getnum($sqlall)>0){
      $result = getall($sqlall);
?>


<div class="homenewsgd">
    <span class="w1">公司新闻</span>
  <div class="w2">
<?php 
 foreach($result as $v){
     $tid = $v['id'];
     $title = $v['title'];  $pidname = $v['pidname']; 
     $dateday = $v['dateday'];   
       
         // $url = getlink($pidname,'node','noadmin','title');
     $alias = alias($pidname,'node');
      $url = url('node',$alias,$tid,'');

   ?>
      <div class="alert"> 
        <a class="title" href="<?php echo $url?>" target=""><?php echo $title?></a>
        <a class="more" href="<?php echo $url?>" target="">查看详情</a>
       </div> 
   <?php
        }
   ?>    



    </div>
</div> 



<?php
    }
    else{echo '暂无内容。';}
?>


<script type="text/javascript">
  $(function(){
        $('.homenewsgd .alert').eq(0).show();

  });
  var homenewsgd_num = 1;

function  homenewsgd(){
 

 var alertlen = $('.homenewsgd .alert').length;
 //alert(alertlen);
    homenewsgd_num++;
 if(homenewsgd_num>alertlen) homenewsgd_num = 1;
 
   $('.homenewsgd .alert').stop().animate({"top":"-60px","opacity":"0"},500);
    $('.homenewsgd .alert').css("top","60px");
   
 $('.homenewsgd .alert').eq(homenewsgd_num-1).show().stop().animate({"top":"40px","opacity":"1"},500);
  $('.homenewsgd .alert').eq(homenewsgd_num-1).show().stop().animate({"top":"2px","opacity":"1"},1200);


} window.setInterval(homenewsgd,3000);



</script>