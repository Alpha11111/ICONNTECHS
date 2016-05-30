<?php 

/*
	Template Name:Register Success
*/


?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>sendEmail</title>
		<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/sendEmail.css" />
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
        <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
	
	</head>

	<body>
		
		<?php get_template_part('head','shop');?>
		<div class="container container2">
			<h2>Your Account Has Been Created</h2>
			<p>Thank you for creating your account at ICONNTECHS.</p>
			<!-- <p>Thank you for creating your account at ICONNTECHS. Your account</p> -->
			<!-- <p>details have been emailed to your mailbox</p> -->
			
			<a class="sendEmail" href="<?php echo site_url( 'wp-login.php?' );?>">Click here to login</a>
		</div>
	 
			
			
	
		<!--
        	作者：1164365204@qq.com
        	时间：2016-04-22
        	描述：尾部
        -->
	   <?php get_template_part('foot','shop');?>
	   <script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/jquery-1.11.0.js"></script>
	   <script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
		


	</body>

</html>