
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>idcheck</title>
 
<script src="http://dream.demososo.com/CM-static/app/jq/jquery.js" type="text/javascript"></script>
 
  <script type="text/javascript">

  
  function chkid(id){ 
		var n=0;
				$('a').each(function(){
					  
					 if($(this).attr('id')==id) n++;
					 
					 //alert(n);
					 if(n>1) console.log('id: '+id+' --repeat: '+n); 
				});    
}
//------------------------
  function chkimgid(id){ 
		var n=0;
				$('img').each(function(){
					  
					 if($(this).attr('id')==id) n++;
					 
					 //alert(n);
					 if(n>1) console.log('imgid: '+id+' --repeat: '+n); 
				});    
}
//--------------------

$(function(){
 
			$('a').each(function(){
			var id = $(this).attr('id');
			//alert(typeof id);
			if(typeof id=='string') chkid(id);
			
		});
		//--------------
		$('img').each(function(){
			var id = $(this).attr('id');
			//alert(typeof id);
			if(typeof id=='string') chkimgid(id);
			
		});
		

	
//-------------------
});
  </script>
  
 <?php 
 require('checkid-repeat-inc.html');
 ?> 
  
  
  