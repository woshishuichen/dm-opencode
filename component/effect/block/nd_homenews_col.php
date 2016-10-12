 <?php 

//这是多列的效果， 显示个数决定几列，class决定样式。。。。。...。DM企业建站系统 www.demososo.com

  //$pidshort = substr($pid,0,4);  
      // if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
      // else  $sqlv=" pid='$pid' ";
//if($pidshort=='csub')  echo '<h5>出错，此效果只限于主分类，不能用子分类。---now ok</h5>';



    $sqlall="select * from ".TABLE_CATE." where pid='$pid'  and sta_visible='y'  and alias_jump='' $andlangbh  order by pos desc,id limit $maxline";
 // echo $sqlall;
    if(getnum($sqlall)>0){
        $result = getall($sqlall);
     //  pre($result);
 
    //gridcol gridcol4
    ?>
<ul class="newsgridlist gridcol <?php echo $cssname?>">
<?php 
 foreach($result as $v){
      $tid = $v['id'];
     $name = $v['name']; 
     $pidname = $v['pidname']; 
     $pid = $v['pid'];
      $cate_level = $v['level'];
        $cate_last = $v['last'];
  
    $alias_jump = $v['alias_jump'];
                $aliascc = alias($pidname,'cate');
                  $linkurl = url('cate',$aliascc,$tid,$alias_jump);

      ?>
      <li class="main"><div class="boxheader">     
      <a class="more" href="<?php echo $linkurl?>"><?php echo TEXTMORE?></a>
       <h3><?php echo $name?></h3> 
       </div>
 
        <ul class="sublist">
                                        <?php 
             if(havesub(TABLE_CATE,'pid',$pidname)) { //havesub($table,$field,$v)

                $sqlwhere=get_sqlwhile($pidname,$pid,$cate_level,$cate_last);
             } 
              else $sqlwhere = " and pid='$pidname'";

                   $sqlall22="select * from ".TABLE_NODE." where sta_visible='y'  $sqlwhere  $andlangbh  order by pos desc,id desc limit 0,6";
                                       // echo $sqlall22;
                if(getnum($sqlall22)>0){
                    $result22 = getall($sqlall22);
                    foreach ($result22 as $k22 => $v22) {
                           $tid=$v22['id'];
                            $title=$v22['title'];  
                             $pidname=$v22['pidname']; $kvsm=$v22['kvsm'];   
                            $alias=alias($pidname,'node');  
                            $url = url('node',$alias,$tid,'');

                             
                            if($kvsm=='') $addr2 = DEFAULTIMG;
                            else $addr2 =  get_thumb($kvsm,$title,'nodiv');
                           if($k22==0) 
                           { 
                            ?>
                            <li class="first">
                            <a href="<?php echo $url?>">
                            <img class="zoomimg" src="<?php echo $addr2?>" alt="<?php echo $title?>" />
                            <div class="text"><?php echo $title?></div></a></li>
                                <?php
                            }
                            else {?>
                                 <li><a href="<?php echo $url?>"><?php echo $title?></a></li>
                            <?php } 

                    }
                    
                }
                else echo '<li>sorry,no result sub.</li>';

                    ?>
         </ul> 
    </li> 

 
<?php
}
?>


 

</ul>
<div class="c"> </div>
<?php }

else { echo ' 子分类 ----- 暂无内容，请在后台确定内容是否处于隐藏状态。 ';}
?>
 

