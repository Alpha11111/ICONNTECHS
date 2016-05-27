<?php
/*
	Template Name:Prompt
*/
global $wpdb;
if(!empty($_POST['email']) && !empty($_POST['password'])){
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	 {
	 	$message = 'E-mail is not valid';
	 }else{
	$isaa = $wpdb->get_results("select * from wp_users where user_email='$_POST[email]' limit 1",ARRAY_A); 
		
		if($isaa){
			$message = 'This emailbox is already registered. Please choose another one. ';				
		}else{
			
			$usate = wp_create_user($_POST['email'], $_POST['password'], $_POST['email'] );
			$coupon = 'UB86EXMY';
			$message = 'success';
			/*$headers = "MIME-Version: 1.0\n" . "Content-Type: text/html;"; 
			$message .= "<p>".$user_email.'('.$user_name.')'.'通过售后服务：'."</p>";
			$message .= "<p>".$orderDetail."</p>";
			$message .= "<p>".$Issue."</p>";
			$message .= "<p><img src='".$iimage."'></p>";
			wp_mail($_POST['email'],$title,$message,$headers);*/
					
		}
		}
}
 function isMobile()
{ 
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
    {
        return true;
    } 
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
    { 
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    } 
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT']))
    {
        $clientkeywords = array ('nokia',
            'sony',
            'ericsson',
            'mot',
            'samsung',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'iphone',
            'ipod',
            'blackberry',
            'meizu',
            'android',
            'netfront',
            'symbian',
            'ucweb',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp',
            'wap',
            'mobile'
            ); 
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT'])))
        {
            return true;
        } 
    } 
    // 协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT']))
    { 
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html'))))
        {
            return true;
        } 
    } 
    return false;
} 
?>
<?php if(isMobile()):?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/movePrompt.css" />
		<link rel="icon" type="image/png" href="<?php bloginfo('template_url');?>/img/logoIcon.png">
	</head>
	<body>
		<div class="box">
			<?php if($message=='success'):?>
			<div class="successBox">
				<label class="success"></label><br /><br />
				<p>Your email Registration is successful, </p>
				<p>click the button below to return</p>
				<p><label>Preferential code: </label><label class="Preferential-code"><?php echo $coupon;?></label></p>
				<p><a class="backLand"   href="<?php bloginfo('home');?>">BACK LAND</a></p>
			</div>
		<?php else:?>
			<div class="errorBox" >
				<label class="error"></label><br /><br />
				<p><?php echo $message;?> </p>
				<p><a class="backLand" href="<?php bloginfo('home');?>">BACK LAND</a></p>
			</div>
		<?php endif;?>
		</div>
		<p>
			<a class="faceBook"></a> &nbsp; &nbsp; &nbsp;
			<a class="Google"></a> &nbsp; &nbsp; &nbsp;
			<a class="instagram"></a>
		</p>
		<p class="copy">© &nbsp;2016 ICONNTECHS.com</p>
	</body>
</html>
<?php else:?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/prompt.css" />
		<link rel="icon" type="image/png" href="<?php bloginfo('template_url');?>/img/logoIcon.png">
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
			<p><?php echo $message;?></p>
			<p><a class="back" href="<?php bloginfo('home');?>">Back Land</a></p>
		</div>
	<?php endif;?>

		<footer>
			<p><a class="faceBook" href="https://business.facebook.com/iconntechs/?business_id=159600407712495"></a> &nbsp; &nbsp; &nbsp;<a class="Google" href="https://plus.google.com/?hl=en"></a> &nbsp; &nbsp; &nbsp;<a class="instagram" href="https://www.instagram.com/iconntechs1/"></a></p>
			<p class="copy">© &nbsp;2016 ICONNTECHS.com</p>
		</footer>
	</body>
</html>
<?php endif;?>