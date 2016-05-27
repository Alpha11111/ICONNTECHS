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
		
		<title>ICONNTECHS</title>
		
	</head>

	<body>
		<p class="propmt">Register Now to Get 25% off Coupon for Purchase Before 10th Jun</p>
		<div>
			<img src="<?php bloginfo('template_url');?>/img/samllPic.png" />
		</div>
		<form id="regform" name="regform" action="<?php bloginfo('home');?>/index.php/land-register/" method="post">
			<p><input type="email" name="email" placeholder="Email" /></p>
			<p><input type="password" name="password" placeholder="Password" /></p>
			<p><input type="submit" value="SUBMIT" /></p>
		</form>
		<p>
			<a class="faceBook"></a> &nbsp; &nbsp; &nbsp;
			<a class="Google"></a> &nbsp; &nbsp; &nbsp;
			<a class="instagram"></a>
		</p>
		<p class="copy">© &nbsp;2016 ICONNTECHS.com</p>
	</body>

</html>