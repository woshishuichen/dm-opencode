<title>del</title>
 
<?php
/*  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
 
require_once '../config_a/common.inc2010.php';
//

 exit;

//exit;

//echo 'no use temp';
//exit;

  
    $ss3 = "select * from ".TABLE_REGION." where pid = '0' and  type='index'  ";
    $rowall3 = getall($ss3);
    if(getnum($ss3)>0){
      foreach($rowall3 as $v2){
        $title2 = $v2['name'];
        $pidname2 = $v2['pidname'];
       $pidname2v = 'reginindex'.substr($pidname2,6);
        
       echo '<br>'.$title2.' --- '.$pidname2 ;

     
      $ss = "update ".TABLE_REGION." set pidname = '$pidname2v' where pidname = '$pidname2'  ";
  //iquery($ss);




//------------------
    
    $ss = "select * from ".TABLE_REGION." where pid = '$pidname2'  ";
    $rowall = getall($ss);
      if(getnum($ss)>0){
      foreach($rowall as $v){
                $title = $v['name'];
        $pidname = $v['pidname'];

        $pidname2v = 'reginindex'.substr($pidname2,6);

 $ss = "update ".TABLE_REGION." set pid = '$pidname2v' where pidname = '$pidname'  ";
 //iquery($ss);

       echo '<br>------'.$title.' --- '.$pidname.' --- '.$pidname2.' --- '.$pidname2v;


      }  }


    //---------------
        
        
      }
      
      
    }
       
   // $delsql2 = "delete  from ".TABLE_CATE." where  pidname = '$v'";
    //iquery($delsql2);
   
   
 


 
 
 
?>