<?php
/*
Template Name:Contact-Us
*/
if(!empty($_POST['Email'])){
		$title = 'ICONNETCHS Contact Us';
		$user_email = $_POST['Email'];
		$message = $user_email.'通过联系我们：'.$_POST['message'];
		wp_mail($user_email,$title,$message);
		
}

//wp_mail( $user_email, wp_specialchars_decode( $title ), $message )


?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>contact Us</title>

		<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/contactUs.css" />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>http://s.ap.wps.cn/ciba/mini/index.9d49951b.html?mode=lnp#
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		
	</head>

	<body>
	<?php get_template_part('head','shop');?>
	<!--
    	作者：1164365204@qq.com
    	时间：2016-05-03
    	描述：图片切换
    -->
	<section  id="section2">
		<div class="container">
				<h2>CONTACT US</h2>
		<div>
			<p class="propmt">Please fill in the form below, we will respond within 8 hours </p>
	    	<form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
	    		<p class="p2"><input type="text" placeholder="Name" id="name1" name="name1"/></p>
	    		<p class="p2"><input type="text" placeholder="Email"  name="Email" id="Email"/></p>
	    		<p class="p2"><input type="text" placeholder="Phone Number" id="Phone" name="Phone" /></p>
	    		<p class="p3"><textarea placeholder="message" name="message" id="message"></textarea></p>
	    		<p><input type="submit" value="SEND"/></p>
	    	</form>
	    </div>
		</div>
	 
	</section>
      
        
	
		<!--
        	作者：1164365204@qq.com
        	时间：2016-04-22
        	描述：尾部
        -->
		<?php get_template_part('foot','shop');?>
		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/jquery-1.11.0.js"></script>
		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.validate.min.js" ></script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/validate_myexpand.js" ></script>
		<script>
	 window.onload=function(){
		   
		    if(window.innerWidth>=1350){
		    		ScreenCover();
		    }
		    
		   
      }
		  /** add validate **/
		$(function(){
			$("form").validate({
				 
				rules: {
					name1: "required",
					Email: "required",
					Phone:"required",
					message:"required"
				},
				messages: {
					name1: "Please enter your name",
					Email: "Please enter your email address",
					Phone:"Please enter your phone",
					message:"Please enter your message"
				}
			
			});

		});
		    window.onresize=function(){
		    	if(window.innerWidth>=1350){
		    		ScreenCover();
		    	}else{
			    	document.getElementById("box1").style.width="100%";
			    	document.getElementById("box1").style.height="inherit";
				    var names =document.getElementsByClassName("imgh");
				    for (var i=0;i<names.length;i++) {
				    	  names[i].style.width="100%";
				    	  names[i].style.height="inherit";
				    }
			    }
		    }
		    
		    function ScreenCover(){
		    	 document.getElementById("box1").style.height=(window.innerHeight-50)+"px";
		    	 document.getElementById("box1").style.width=(window.innerWidth-17)+"px";
			     var names =document.getElementsByClassName("imgh");
			     for (var i=0;i<names.length;i++) {
			    	 names[i].style.height=(window.innerHeight-50)+"px";
			    	 console.log( names[i].style.height);
			    	  names[i].style.width=(window.innerWidth-17)+"px";
			     }
		    }
			
		
		</script>

	</body>

</html>