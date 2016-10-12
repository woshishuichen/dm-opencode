
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>responsive test --来自 DM企业建站系统 www.demososo.com</title>

  <!-- Mobile Specific -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="iframe.css">


<style type="text/css"></style></head>
<body>
<?php 
$url = @$_GET['url'];
$w = @$_GET['w'];
if($w=='') $wv= '100%';
else $wv= $w.'px';


if($url=='') $urlv= '../index.php';
else $urlv= $url;
 
?>
 

<div id="switcher">
    <div class="center">
              
                <ul>
                    <li id="theme_list">
           <a href="http://www.demososo.com"> DM企业建站系统  </a> <Br /> <Br />
          
                      <a href="http://www.demososo.com/mb.html">查看所有模板</a>
                    </li> 
                </ul>
                <div class="responsive">
                    <a href="iframe.php?url=<?php echo $urlv?>" class="desktop <?php if($w=='') echo 'active'?>" title="View Desktop Version"></a> 
                    <a href="iframe.php?url=<?php echo $urlv?>&w=1024" class="tabletlandscape <?php if($w=='1024') echo 'active'?>" title="View Tablet Landscape (1024x768)"></a> 
                    <a href="iframe.php?url=<?php echo $urlv?>&w=768" class="tabletportrait <?php if($w=='768') echo 'active'?>" title="View Tablet Portrait (768x1024)"></a> 
                    <a href="iframe.php?url=<?php echo $urlv?>&w=480" class="mobilelandscape <?php if($w=='480') echo 'active'?>" title="View Mobile Landscape (480x320)"></a>
                    <a href="iframe.php?url=<?php echo $urlv?>&w=320" class="mobileportrait <?php if($w=='320') echo 'active'?>" title="View Mobile Portrait (320x480)"></a>
                </div>
               
                <ul class="links">
                        
                    <li class="close">
                      <a href="<?php echo $urlv?>">
                        <img src="img/cross.png" alt=""> 
                       关闭
                      </a>
                    </li>   
                </ul>
        </div>
    </div>

    <iframe id="iframe" src="<?php echo $urlv?>" frameborder="0"   style="width: <?php echo $wv?>"></iframe>

   <!--
<script src="../DM-static/app/jq/jquery.js" type="text/javascript"></script>
--> 
    <script type="text/javascript">
    /*
      var IS_IPAD=navigator.userAgent.match(/iPad/i)!=null;
      $("#header-bar").hide();
      clicked="desktop";
      var t= {
        desktop:"100%",tabletlandscape:1040,tabletportrait:788,mobilelandscape:500,mobileportrait:340,placebo:0
      }
      ;
      jQuery(".responsive a").on("click",function() {
        var e=jQuery(this);
        for (device in t) {
          if(e.hasClass(device)) {
            clicked=device;
            jQuery("#iframe").width(t[device]);
            if(clicked==device) {
              jQuery(".responsive a").removeClass("active");
              e.addClass("active")
            }
          }
        }
        return false
      }
      );
      if(IS_IPAD) {
        $("#iframe").css("padding-bottom","60px")
      }*/
    </script>

    

  


</body></html>