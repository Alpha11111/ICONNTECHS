<?php
	/*
	Template Name:Contact Us Success
	*/
	
?>
<?php get_template_part('head','shop');?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>contact Us</title>

		<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/contactUsSuccess.css" />
	</head>
	<body>
		
		<div class="container container1" >
		
				<div id="imgBox">
					<img src="<?php bloginfo('template_url');?>/img/msg.png" />
				</div>
				<div id="text">
					<p>Thanks for your message,we will </p>
					<p>get in touch in less than 8 huors. </p>
					<br />
					<a class="back" href="<?php bloginfo('home')?>/index.php/contact-us/">Back</a>
				</div>
			
		</div>
		
	</body>
	
<?php get_template_part('foot','shop');?>
<script>
		 window.onload=function(){
		 	setTimeout(function(){
		 		location.href="<?php echo bloginfo('home').'/index.php/contact-us/';?>";
		 	},5000);
		 }
	</script>
</html>
