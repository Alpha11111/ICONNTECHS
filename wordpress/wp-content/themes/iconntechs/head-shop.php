<?php
header("Access-Control-Allow-Origin: *");
$carnum = WC()->cart->get_cart();
$carnum = count($carnum);
?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="google-signin-client_id" content="155913334949-rjvjklmhr6cjbe7r8d4arlle016la4o2.apps.googleusercontent.com">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' | '; } ?> <?php bloginfo('name'); ?></title>

		<!-- Bootstrap -->
		
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/head.css" />
		<link rel="icon" type="image/png" href="<?php bloginfo('template_url');?>/img/logoIcon.png">
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		
		<script src="https://apis.google.com/js/api:client.js"></script>

         <style type="text/css">
		

  </style>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	  var _gaq = _gaq || [];
	  ga('create', 'UA-74879058-2', 'auto');
	  ga('send', 'pageview');

	</script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	</head>
	<?php flush(); ?>
	
	<body >	
		<div class="container-fluid" id="navMenu">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
				      </button>
							<a class="navbar-brand" href="<?php echo home_url();?>/index.php/shop/"><img src="<?php bloginfo('template_url');?>/img/logo.png" class="img-responsive"></a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav  navbar-right">
								<!-- <li class=""><a href="<?php echo home_url();?>/index.php/product-list/">PRODUCTS<span class="sr-only">(current)</span></a></li> -->
								<!-- <li><a href="<?php echo get_option('home');?>?blog=blog">BLOG</a></li>
								<li><a href="<?php echo get_option('home');?>/index.php/privacy-policy/">SUPPORT</a></li> -->
								<li><a href="<?php echo home_url();?>/index.php/referral-program/">REFERRAL PROGRAM</a></li>
								<li><a href="<?php echo home_url();?>/index.php/contact-us/">CONTACT US</a></li>
								<li class="dropdown">
									<a href="<?php bloginfo('home');?>/index.php/my-account/" class="dropdown-toggle" data-toggle="dropdown"  role="button" aria-haspopup="true" aria-expanded="false"><img id="headPic" src="<?php bloginfo('template_url');?>/img/flag.png" /></a>
									<ul class="dropdown-menu">
										<li><a href="<?php bloginfo('home');?>/index.php/my-account/">Settings</a></li>
										<li><a href="<?php bloginfo('home');?>/index.php/my-order-list/">Orders </a></li>
										<li><a href="<?php bloginfo('home');?>/index.php/my-account/edit-address/edit/">Address </a></li>
										<li><a href="<?php bloginfo('home');?>/index.php/reward/">Rewards </a></li>
										<li><a href="<?php bloginfo('home');?>/index.php/my-account/customer-logout">Log &nbsp;Out</a></li>
									</ul>
									<li><a href="<?php echo home_url();?>/index.php/shop-cart/"><i class="iconfont">&#xe611;</i> <span><?php echo $carnum;?></span></a></li>
								</li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</div>
					<!-- /.container-fluid -->
				</nav>
			</div>
		</div>
	
		

		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/jquery-1.11.0.js"></script>

		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
		<script>

		</script>

	
