window.onload =function(){
	     var screenheight = window.screen.availHeight; //��ȡ��Ļ��  
	     var  bodyheight = document.body.clientHeight;
		 window.onscroll=function(){
		 
		 	 //��ȡ��������������Ķ���λ�õľ���
		    var scrollTop=document.body.scrollTop||document.documentElement.scrollTop;
		 	if(scrollTop+screenheight>document.body.clientHeight-230){
		 		document.getElementsByClassName("hoverBox")[0].style.display="none";
		 	}else{
		 		document.getElementsByClassName("hoverBox")[0].style.display="block";
		 	}
		 }
	
		 
	   
}
