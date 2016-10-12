<?php 

//这是多列的效果， 显示个数决定几列，class决定样式。。。。。...。DM企业建站系统 www.demososo.com

  //$pidshort = substr($pid,0,4);  
      // if($pidshort=='cate')  $sqlv=" ppid='$pid' ";
      // else  $sqlv=" pid='$pid' ";
//if($pidshort=='csub')  echo '<h5>出错，此效果只限于主分类，不能用子分类。--now ok</h5>';


$sqlall="select * from ".TABLE_CATE." where pid='$pid'  and sta_visible='y' and alias_jump='' $andlangbh  order by pos desc,id limit $maxline";
  //  echo $sqlall;
    if(getnum($sqlall)>0){
        $result = getall($sqlall);

     ?>

        <div class="newstab tabs_wrapper  <?php echo $cssname?>">

                        <div class="tabs_switch tabs_switchcss">
                            <?php 
                            	foreach ($result as $k => $v) {
                            		if($k=='0') $active = ' active';
                            		else $active = '';
 
                            		echo '<div class="tabs_item'.$active.'">'.$v['name'].'</div>';
                            		 
                            	}
                            ?>
                        </div>
                        <div class="tabs_content">

						  <?php 
                            	foreach ($result as $k => $v) {
                            		if($k=='0') $display = 'display:block';
                            		else $display = 'display:none';

                                  $alias_jump = $v['alias_jump'];
                               

                            		 $name = $v['name'];

                            		 $cateimg = $v['cateimg']; 
                                 $tid = $v['id'];
                                 $pidname = $v['pidname'];
                                 $cate_level = $v['level'];
                                 $cate_last = $v['last'];
                                 $pid = $v['pid'];
 
                $aliascc = alias($pidname,'cate');
                  $linkurl = url('cate',$aliascc,$tid,$alias_jump);

								        $imgv = get_img($cateimg ,$name,'');
								      

								   

                       $col1 = 'fl col40';$col2 = 'fr col55';

                            ?>

                        <div style="<?php echo $display?>" class="tabs_container">
                             
                                <div class="<?php echo $col1?>">
                                   
										<a href="<?php echo $linkurl?>"><img class="perimg" src="<?php echo $imgv?>" alt="<?php echo $name?>"></a>
										 
								 </div>
                                <div class="desp <?php echo $col2?>">
                                      

                                      <ul class="sublist toggledesp">
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
                                                        $dateday=substr($v22['dateedit'],0,10);

                                      $despjj= web_despdecode($v22['despjj']);

                                      $desp= web_despdecode($v22['desp']);
                                      $desptext= web_despdecode($v22['desptext']);
                                      $despv='';
                                      if($desptext<>'') $despv = $desptext;
                                      else  $despv = $desp; 

                                      if($despjj==''){
                                        
                                        $despv22 = mb_substr(strip_tags($despv),0,110,'UTF-8').'......';
 
                                      }
                                        else {$despv22 = $despjj;}


                                                         
                                                ?>
                                    <li>
                                    <span class="dateday"><?php echo $dateday ?></span>
                                    <a href="<?php echo $url?>"><?php echo $title?></a>
                                    <p class="despjj"><?php echo $despv22?></p>

                                    </li>
                                    <?php  


                                                }
                                                
                                            }
                                            else echo '<li>sorry,no result sub.</li>';

                                                ?>
                                     </ul> 

                                </div>
                               
                        </div>
                        <?php }//end foreeach
                         
                        ?>
                        </div>
                    </div>
<?php } 
else { echo ' 子分类 ----- 暂无内容，请在后台确定内容是否处于隐藏状态。 ';}

?>
 