<?php
/*
	Template Name:Sound
*/


include("headphp.php");

?>

<?php if(isMobile()):?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		 <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		 <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/moveLand.css" />
		 <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/animate.css" />
		<title>ICONNTECHS</title>
		<script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-74879058-2', 'auto');
      ga('send', 'pageview');

    </script>
	</head>
	<body>
		<div>
	  	  <div class="top">
	  	  	  <img src="<?php bloginfo('template_url');?>/img/pro1.jpg" alt="sound" title="sound"/>
	  	  </div>
	  	 <div class="bottom">
	  	  	  <h2>Sign Up & Get Your $200 Credit</h2>
	  	  	  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="form">
	  	  	  	<input type="hidden" value="<?php echo $invite_id;?>" name="invite_id">
	  	  	  	 <input type="email" name="email" placeholder="Enter Email" required/><a id="submit" onclick="document.getElementById('form').submit()">step inside</a>
	  	  	  </form>
	  	  	  	<?php get_template_part('footer','land');?>
	  	  </div>
	  	  
	  </div>
	</body>
</html>


<?php else:?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>ICONNTECHS</title>
		<link rel="icon" type="image/png" href="<?php bloginfo('template_url');?>/img/logoIcon.png">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/land.css" />
		<!--[if lt IE 9]>
	      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-74879058-2', 'auto');
      ga('send', 'pageview');

    </script>
	</head>
	<body>
	  <div>
	  	  <div class="top">
	  	  	  <img src="<?php bloginfo('template_url');?>/img/sound1.jpg" alt="sound" title="sound"/>
	  	  </div>
	  	   <div class="bottom">
	  	  	  <h2>Sign Up & Get Your $200 Credit</h2>
	  	  	  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	  	  	  	<input type="hidden" value="<?php echo $invite_id;?>" name="invite_id">
	  	  	  	 <input type="text" name="email" placeholder="Enter Email" /><input type="submit" value="step inside" />
	  	  	  </form>
	  	  	  	<?php get_template_part('footer','land');?>
	  	  	  	
	  	  </div>
	  	  
	  </div>
		<div id="mask">
		     <div id="content">
		     	 <p id="error"></p>
		     </div>
		</div>
			<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/land.js" ></script>
	</body>
</html>

<?php endif;?>