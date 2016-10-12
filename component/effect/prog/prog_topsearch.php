<div class="topsearchbox"><form class="topsearch" action="search.php" method="post" accept-charset="UTF-8">				 
	<input class="text" type="text" name="searchword"> 
	<input type="submit" name="Submit" value="<?php echo SEARCH_BTN?>" class="searchbtn"></form>
</div>
	<script>
$(function(){
    $('.searchbtn').click(function(){ //searchbtn1 for conflict in search list
    	var searchV = $(this).prev().val();
    	if($.trim(searchV)==''){     		 
    		alert('<?php echo SEARCH_ALERTKEYWORDS?>');//请输入关键字
    		 return false;

   			 }
    	
    });

});
	</script>
