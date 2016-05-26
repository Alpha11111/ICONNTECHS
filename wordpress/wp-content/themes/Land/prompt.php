<?php
/*
	Template Name:Prompt
*/
global $wpdb;
if(!empty($_POST['email']) && !empty($_POST['password'])){
	$isaa = $wpdb->get_results("select * from wp_users where user_email='$_POST[email]' limit 1",ARRAY_A); 
		//var_dump($isaa);die;
		if($isaa){
			$message = 'failure';				
		}else{
			//var_dump($_POST);die;
			$usate = wp_create_user($_POST['email'], $_POST['password'], $_POST['email'] );
			$coupon = 'UB86EXMY';
			$message = 'success';
			//var_dump($usate);die;			
		}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/prompt.css" />
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
	
	<?php if($message=='success'):?>
		<div id="successBox">
			<label class="success"></label>
			<p>Your email Registration is successful,  </p>
			<p> click the button below</p>
			<p><label>Preferential code: </label><label class="Preferential-code"><?php echo $coupon;?></label></p>
			<p><a class="back" href="<?php bloginfo('home');?>">Back Land</a></p>
		</div>
	<?php else:?>
		<div id="errorBox">
			<label class="error"></label>
			<p>This emailbox is already registered. Please choose another one. </p>
			<p><a class="back" href="<?php bloginfo('home');?>">Back Land</a></p>
		</div>
	<?php endif;?>

		<footer>
			<p><a class="faceBook"></a> &nbsp; &nbsp; &nbsp;<a class="Google"></a> &nbsp; &nbsp; &nbsp;<a class="instagram"></a></p>
			<p class="copy">© &nbsp;2016 ICONNTECHS.com</p>
		</footer>
	</body>
</html>
