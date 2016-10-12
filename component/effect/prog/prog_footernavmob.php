
<div class="ftmobnav">

    <nav>
        <div id="ftmobnav_ul" class="box">
            
               <?php //block('vblock20160523_0903441450');?>
            
            <ul>
<li class="sm"><a href="index.html"><i class="fa fa-home"></i><span  class="hide480">首页</span></a>
</li>
<li><a href="javascript:;"><span  class="di">关于我们</span></a>
                    <dl>
                        <dd><a href="about.html"><span>集团介绍</span></a></dd>
                        <dd><a href="page-7.html"><span>集团文化</span></a></dd>
                        <dd><a href="page-7.html"><span>企业资质</span></a></dd>
                         
                    </dl>
                </li>




                <li>
                    <a href="javascript:;"><span class="di">产品中心</span></a>
                    <dl>
                        <dd><a href="category-2.html"><span>平板电视</span></a></dd>
                        <dd><a href="category-3.html"><span>手机</span></a></dd>
                        <dd><a href="category-4.html"><span>笔记本</span></a></dd>
                         
                    </dl>
                </li>
                <li>
                    <a href="contact.html"><span  class="di">联系我们</span></a>
                     
                </li>

    <li class="sm"><a href="#"><i class="fa fa-arrow-circle-up"></i><span class="hide480">Top</span></a>
</li>
</ul>
 

        </div>
    </nav>
    
    <div id="ftmobnav_masklayer" class="masklayer_div on">&nbsp;</div>

</div>
<script type="text/javascript">



var ftmobnav =(function(){
    bindClick = function(els, mask){
        if(!els || !els.length){return;}
        var isMobile = "ontouchstart" in window;
        for(var i=0,ci; ci = els[i]; i++){
            ci.addEventListener("click", evtFn, false);
        }

        function evtFn(evt, ci){
            ci =this;
            for(var j=0,cj; cj = els[j]; j++){
                if(cj != ci){
                   // console.log(cj);
                    cj.classList.remove("on");
                }
            }
            if(ci == mask){mask.classList.remove("on");return;}
            switch(evt.type){
                case "click":
                    var on = ci.classList.toggle("on");
                    mask.classList[on?"add":"remove"]("on");
                break;
            }
        }
        mask.addEventListener(isMobile?"touchstart":"click", evtFn, false);
    }
    return {"bindClick":bindClick};
})();

//if($('body').width()<800){  //use php 
    $('.ftmobnav').show();
ftmobnav.bindClick(document.getElementById("ftmobnav_ul").querySelectorAll("li>a"), document.getElementById("ftmobnav_masklayer"));
//}
</script>

 