<?php 
/*
	Template Name:Mobile Submit
*/
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/moveSubmit.css" />
		<link rel="icon" type="image/png" href="<?php bloginfo('template_url');?>/img/logoIcon.png">
		<title>ICONNTECHS</title>
		<script>
		    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		    document,'script','https://connect.facebook.net/en_US/fbevents.js');
		    fbq('init', '1556841547944169');
		    fbq('track', "PageView");
		</script>
	<noscript>
		<img height="1" width="1" style="display:none"src="https://www.facebook.com/tr?id=1160998803951999&ev=PageView&noscript=1"
		    />
	</noscript>
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
		<p class="propmt">More Referrals,More Products, Sign Up Before 18th June</p>
		<div>
			<img src="<?php bloginfo('template_url');?>/img/samllPic.png" />
		</div>
		<form id="regform" name="regform" action="<?php bloginfo('home');?>/index.php/registrationcompletion/" method="post">
			 <input type="hidden" value="<?php echo $_GET['invite'];?>" name="invite_id">
			<p><input type="email" name="email" placeholder="Email" required/></p>
		<!-- 	<p><input type="password" name="password" placeholder="Password" required/></p> -->
			<p><input type="submit" value="SUBMIT" /></p>
		</form>
		<p><a class="faceBook"  href="https://business.facebook.com/iconntechs/?business_id=159600407712495" target="_blank"></a> &nbsp; &nbsp; &nbsp;<a class="Google" href="https://twitter.com/Iconntechs1" target="_blank"></a> </p>
		<p class="copy">© &nbsp;2016 ICONNTECHS.com</p>
	</body>

</html>