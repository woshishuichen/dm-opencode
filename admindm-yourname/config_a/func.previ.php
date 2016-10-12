<?php 
//require by common.inc

//echo $mod_previ;  -- admin,normal, other. welcome,and previ_no are other
//echo $usertype;
if($usertype=='normal'){
		if($mod_previ=='admin'){
				 jump('../mod_common/previ_no.php?lang='.LANG);
		}
		else if($mod_previ=='normal'){

			//echo $catpid; 
			$strpos = strpos($arrayprevi,$catpid);
			 if(!is_int($strpos)) jump('../mod_common/previ_no.php?lang='.LANG);


		}
		//else if ($mod_previ=='other') --- use in previ_no.php

}
 

?>