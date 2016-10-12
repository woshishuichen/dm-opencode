<div class="container c">

<?php
/*
  欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/
if(!defined('IN_DEMOSOSO')) {
  exit('this is wrong page,please back to homepage');
}
 if(dmlogin()){  
 echo '<title>预览</title>';

 require_once DISPLAYROOT.'a_meta.php'; 


$pidname = @htmlentities($_GET['pidname']);


//$pidname = 'ndlist20160712_1014264451';
block($pidname);

}
else {
  echo 'sorry,pls login...';
}

?>

</div>