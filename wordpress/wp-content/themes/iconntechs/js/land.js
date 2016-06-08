window.onload =function(){
	     var screenheight = window.screen.availHeight; //获取屏幕高  
	     var  bodyheight = document.body.clientHeight;
		 window.onscroll=function(){
		 
		 	 //获取滚动条离浏览器的顶部位置的距离
		    var scrollTop=document.body.scrollTop||document.documentElement.scrollTop;
		 	if(scrollTop+screenheight>document.body.clientHeight-230){
		 		document.getElementsByClassName("hoverBox")[0].style.display="none";
		 	}else{
		 		document.getElementsByClassName("hoverBox")[0].style.display="block";
		 	}
		 }
	
		 
	   
}
