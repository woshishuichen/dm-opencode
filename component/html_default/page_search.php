<?php
/*
	欢迎使用DM企业建站系统，本系统由www.demososo.com开发。
*/

if(strlen($searchkey)>30){alert(SEARCH_ALERTLONG);jump('search.php');}
//对不起，搜索内容过长！
 

if(!defined('IN_DEMOSOSO')) {
	exit('this is wrong page,please back to homepage');
}
 require_once DISPLAYROOT.'a_meta.php'; 
?>
 <div class="pagewrap">
  <?php   require_once DISPLAYROOT.'a_header.php';  ?> 


 <div class="area areacontent"><div class="bgarea container">
 



<div class="content container">
	<div class="content_header"><h3><?php echo SEARCH_RESULT?>：</h3></div>
	<div class="content_def">
	
 
	 <div class="c searcharea">
		<div class="searchresult" style="padding:20px">
		<?php
		 

			if($searchkey=='') echo '<p class="nokey">'.SEARCH_ALERTKEYWORDS.'!</p>';
            else{
						
	  $sqlsearch = "SELECT * from ".TABLE_NODE."  where sta_search='y'  and  title  like  '%$searchkey%'   $andlangbh order by id desc";	
	 // echo $sqlsearch;//exit; 
	  //sta_search='y' -- bec blockdh in node also
	  if(getnum($sqlsearch)>0){
        	   echo '<p class="key">'.SEARCH_KEYWORDS.'：<span style="color:#666;font-size:18px"> '.$searchkey.'</span></p>';
	 
		$result = getall($sqlsearch); 
		  $targetv = ' target="_blank"';
		   require_once EFFECTROOT.'list_text.php';		   
		
		}
		else{
		 echo '<p class="mt30 noresult">'.SEARCH_NORESULT.'： <span style="color:#666;font-size:20px">'.$searchkey.'</span></p>';
		}//对不起，没有找到相关内容
		
	}
	?>
	</div>
</div>	 

	</div><!--end content_def-->
			 
</div>









<!--end container-->
 </div></div>



<!-- end content -->
  <?php   require_once DISPLAYROOT.'a_footer.php';  ?> 

</div><!--end pagewrap-->
<?php  
		 require_once DISPLAYROOT.'a_footer_last.php';	
?>

 

</body>
</html>