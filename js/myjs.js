window.onload=function(){
	var i = 5;//初始化 首页显示条数
	//writetype
	$("#choosemode").children("li").mouseenter(function(){
		$(this).stop().animate({top:"-5px"});
    });
	$("#choosemode").children("li").mouseleave(function(){
		$(this).stop().animate({top:"0px"});
    });
	$("#choosemode").children("li").click(function(){
		$(this).find("span").addClass("typeactive");
		$(this).siblings().find("span").removeClass("typeactive");
		$("#writeform").children().css({"display":"none"});
		$("#pleaselect").css({"display":"none"});
		$("#writeform").children().eq($(this).index()).css({"display":"block"});
    });
	//sied
	function setSideHeight(){
		$('#side').css("height",$('#main').height()+'px');
		};
		setSideHeight();
	//time、delbtn
	function setimeline(){$('.timeline').css("height",$('#main').height()+'px');}
	setimeline();
	function setomanlist(){
    $(".omainlist").mouseenter(function(){
    	$(this).children("span.time").stop().fadeIn();
    	$(this).children("span.delbtn").stop().fadeIn();
    	$(this).children("span.dot").css({"border-color":"orange","background":"orange"});
    });
    $(".omainlist").mouseleave(function(){
    	$(this).children("span.time").stop().fadeOut();
    	$(this).children("span.delbtn").stop().fadeOut();
    	$(this).children("span.dot").css({"border-color":"white","background":"#D5D5D5"});
   });
    $(".delbtn").children("a").click(function(){
    	$(this).parent().parent().stop().slideUp(500,function(){setimeline();});
        i--; //ajax请求位置改变
    });
	}
	setomanlist();
    //main

    //index ajax
    
    $(window).scroll(function(){
    	
        var scrollBottom = $(document).height() - $(window).height() - $(window).scrollTop(); //获得scrollBottom值
    	if(scrollBottom==0){
    		$(".loading").show();
    		htmlobj= $.get("./ajax/indexmainlistload.php", { i:i },
    				  function(data){
    			$("#mainlist").append(data);
    			i=i+5;
    			setomanlist();
    			$(".loading").hide();
    			setimeline();
    			setSideHeight();
    		});
    	}
    	
    	
    });
	//toplist
    
	$("#probtn").click(function(){
    $("#prolistUl").stop().slideDown(100);
	});
	$("#toplist").mouseleave(function(){
		 $("#prolistUl").stop().slideUp();
    	});
	//sidetop
	 $(window).scroll(function(){
		 	if($(window).scrollTop()>80){
		 		$('#sidetop').css({"top":$(window).scrollTop()-80+"px"});	
		 	}
		 	if($(window).scrollTop()<80){
		 		$('#sidetop').css({"top":"0"});	
		 	}
	    	
	 });
	//获取css样式
	function getStyle(obj, attr)
	{
	 if(obj.currentStyle)
	 {
	  return obj.currentStyle[attr];
	 }
	 else
	 {
	  return getComputedStyle(obj, false)[attr];
	 }
	}
	
	//search color
	//alert($('.inputxt').value);
	// $('.title').innerHTML;
	
	
	
	
	//运动框架
	function startMove(obj, json, fn)
	{
	 clearInterval(obj.timer);
	 obj.timer=setInterval(function (){
	  var bStop=true;  //这一次运动就结束了——所有的值都到达了
	  for(var attr in json)
	  {
	       //1.取当前的值
	       var iCur=0;
	   
	       if(attr=='opacity')
	       {
	         iCur=parseInt(parseFloat(getStyle(obj, attr))*100);
	       }
	       else
	      {
	         iCur=parseInt(getStyle(obj, attr));
	      }
	   
	      //2.算速度
	      var iSpeed=(json[attr]-iCur)/2 ;
	      iSpeed=iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);
	   
	      //3.检测停止
	      if(iCur!=json[attr])
	      {
	       bStop=false;
	      }
	   
	       if(attr=='opacity')
	     {
	       obj.style.filter='alpha(opacity:'+(iCur+iSpeed)+')';
	       obj.style.opacity=(iCur+iSpeed)/100;
	     }
	      else
	     {
	       obj.style[attr]=iCur+iSpeed+'px';
	     }
	}
	  
	  if(bStop)
	  {
	   clearInterval(obj.timer);
	   
	   if(fn)
	   {
	    fn();
	   }
	  }
	 }, 30)
	}
	
	//class操作
	function hasClass(obj, cls) {  
	    return obj.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));  
	}  
	  
	function addClass(obj, cls) {  
	    if (!this.hasClass(obj, cls)) obj.className += " " + cls;  
	}  
	  
	function removeClass(obj, cls) {  
	    if (hasClass(obj, cls)) {  
	        var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');  
	        obj.className = obj.className.replace(reg, ' ');  
	    }  
	}  
	  
	function toggleClass(obj,cls){  
	    if(hasClass(obj,cls)){  
	        removeClass(obj, cls);  
	    }else{  
	        addClass(obj, cls);  
	    }  
	}  
	  
	function toggleClassTest(){  
	    var obj = document. getElementById('test');  
	    toggleClass(obj,"testClass");  
	}  
}

