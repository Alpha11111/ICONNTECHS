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
		
	</head>

	<body>
		<p class="propmt">Register Now to Get 25% off Coupon for Purchase Before 10th June</p>
		<div>
			<img src="<?php bloginfo('template_url');?>/img/samllPic.png" />
		</div>
		<form id="regform" name="regform" action="<?php bloginfo('home');?>/index.php/land-register/" method="post">
			<p><input type="email" name="email" placeholder="Email" required/></p>
			<p><input type="password" name="password" placeholder="Password" required/></p>
			<p><input type="submit" value="SUBMIT" /></p>
		</form>
		<p><a class="faceBook"  href="https://business.facebook.com/iconntechs/?business_id=159600407712495" target="_blank"></a> &nbsp; &nbsp; &nbsp;<a class="Google" href="https://plus.google.com/?hl=en" target="_blank"></a> </p>
		<p class="copy">© &nbsp;2016 ICONNTECHS.com</p>
	</body>

</html>