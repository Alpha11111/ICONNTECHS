 window.onload=function(){
		  	
		  	  document.getElementsByTagName("input")[2].onclick=function(){
		  	  	 if(validate()==false){
		  	  	 	setTimeout(function(){
		  	  	 	
		  	  	 		document.getElementById("mask").style.display="none";
		  	  	 	},3000)
		  	  	 	return false;
		  	  	 }
		  	  };
		  	 
		  }
		  
		  
		  function validate(){
		  	var val = document.getElementsByTagName("input")[1].value;
		  	var filter =/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		  	if(val==null||val==undefined||val==''){
		  		error("Please enter your email address.");
		  		return false;
		  	}
		  	if(!filter.test(val)){
		  		error("The mailbox format you entered is not correct.");
		  		val='';
		  		return false;
		  	}

		  }
		  
		  function error(error){
		  	   document.getElementById("mask").style.display="block";
		  	   document.getElementById("content").setAttribute("class","animated bounceInDown");
		  	   document.getElementById("error").innerHTML=error;
		  }