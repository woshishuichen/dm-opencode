<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
跳转中。。。。。。

<?php 
//use for color select,use cookie

   //echo '<pre>'.print_r($_POST,1).'</pre>';
//setcookie("coo_color",$_POST['color']);

//echo '<pre>'.print_r($_GET,1).'</pre>';
//echo '<pre>'.print_r($_COOKIE,1).'</pre>';



$type='color';
if(isset($_GET['type'])) $type = $_GET['type'];

//echo $type;
 
if($type=='color'){

			if(isset($_GET['color'])) setcookie("coo_color",$_GET['color']);
			else echo  '<br />no choose color;exit;';

			if(!isset($_COOKIE['coo_menu']))   setcookie("coo_menu",'menu');
			if(!isset($_COOKIE['coo_box']))   setcookie("coo_box",'box-宽屏');


echo '<script>window.location.href="index.html"</script>';

}

 
if($type=='colorddorder'){

			if(isset($_GET['color'])) setcookie("coo_color",$_GET['color']);
			else echo  '<br />no choose color;exit;';

			if(!isset($_COOKIE['coo_menu']))   setcookie("coo_menu",'menu');
			if(!isset($_COOKIE['coo_box']))   setcookie("coo_box",'box-宽屏');

		
echo '<script>window.location.href="ddorder.php"</script>';

}


else if($type=='menu'){

			if(isset($_GET['menu'])) setcookie("coo_menu",$_GET['menu']);
			else echo  '<br />no choose menu;exit;';

			if(!isset($_COOKIE['coo_color']))   setcookie("coo_color",'color_blue');
			if(!isset($_COOKIE['coo_box']))   setcookie("coo_box",'box-宽屏');

echo '<script>window.location.href="index.html"</script>';
}
else if($type=='box'){

			if(isset($_GET['box'])) setcookie("coo_box",$_GET['box']);
			else echo  '<br />no choose box;exit;';

			if(!isset($_COOKIE['coo_color']))   setcookie("coo_color",'color_blue');
			if(!isset($_COOKIE['coo_menu']))   setcookie("coo_menu",'menu');
echo '<script>window.location.href="index.html"</script>';

}

else  {echo 'no type';exit;}





//setcookie("coo_menu",$_POST['menu']);
//setcookie("coo_box",$_POST['box']);



//echo '<script>window.location.href="index.html"</script>';
?>