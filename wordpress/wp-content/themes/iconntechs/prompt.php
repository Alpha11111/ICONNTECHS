<?php
/*
	Template Name:Prompt
*/

$msg = "<div id='emailBox'>
			<style>
			#emailBox{
				width: 900px;
				margin: 0px auto;
				font-family: arial;
				
			}
			#emailBox h1{
				text-align: center;
				color:#323232;
				border-bottom: 3px solid #ff5550;
				padding-bottom: 10px;
			}
			#emailBox p{
				word-break:break-all;
				line-height: 30px;
			}
			#emailBox label{
				color: #FF5550;
				font-size: 18px;
				
			}
			ul li{
				list-style: disc;
			}
			ul li a{
				color: #FF5550;
			}
			hr{
					border: 2px solid #ff5550;
					color:#ff5550 ;
			}
			.webSite{
				text-align: center;
				
			}
			.webSite a{
				font-size: 20px;
			}
		</style>
			<h1>ICONNTECHS IT</h1>
			<p>Greetings from ICONNTECHS IT,</p>
			<p>Here is the promotional code <label>UB86EXMY</label></a></p>
			
			<p>You can use the code to get 25% discount off any products you purchase in our Amazon store:</p>
			<ul>
				<li>VR Glasses &nbsp;<a href='https://www.amazon.com/dp/B01F70Q236'>https://www.amazon.com/dp/B01F70Q236</a></li>
				<li>Action Camera &nbsp;<a href='https://www.amazon.com/dp/B01F759GKC'>https://www.amazon.com/dp/B01F759GKC </a></li>
				<li>Bluetooth Speaker &nbsp;<a href='https://www.amazon.com/dp/B01FS65MCG'>https://www.amazon.com/dp/B01FS65MCG </a></li>
				<li>Bluetooth Earbuds  &nbsp;<a href='https://www.amazon.com/dp/B01FS16U9A'>https://www.amazon.com/dp/B01FS16U9A  </a></li>
			</ul>
			<p>Just apply the code before you pay at the check, make sure the seller is ICONNTECHS IT.</p>
			<p>Thanks again for choosing us, our website will officially be launched on June 6th , we hope you have a great shopping experience here and enjoy your day!</p>
			<p>Warm Regards,</p>
			<p>The ICONNTECHS IT Team </p><br />
			<hr />
			<p class='webSite'><a href='https://www.iconntechs.com'>https://www.iconntechs.com</a></p>
		</div>";

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
			wp_mail($_POST['email'],'ICONNTECHS',$msg);
					
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
		<title>ICONNTECHS</title>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/movePrompt.css" />
		<script>
		    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		    document,'script','https://connect.facebook.net/en_US/fbevents.js');
		    fbq('init', '1160998803951999');
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

	<script>
	(function() {
	  var _fbq = window._fbq || (window._fbq = []);
	  if (!_fbq.loaded) {
	    var fbds = document.createElement('script');
	    fbds.async = true;
	    fbds.src = 'https://connect.facebook.net/en_US/fbds.js';
	    var s = document.getElementsByTagName('script')[0];
	    s.parentNode.insertBefore(fbds, s);
	    _fbq.loaded = true;
	  }
	})();
	window._fbq = window._fbq || [];
	window._fbq.push(['track', '6043992170173', {'value':'0.00','currency':'USD'}]);
	</script>
<noscript>
	<img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6043992170173&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" />
</noscript>

	</head>

	<body>
		<?php if($message=='success'):?>
		<div class="box">
			<div class="successBox" >
				<label class="success" ></label><br /><br />
				<p>Thank you for registering with us! </p>
				<p>Below coupon code is also sent to your email.</p>
				<p><label>Coupon Code: </label><label class="Preferential-code"><?php echo $coupon;?></label></p>
				<p><a class="backLand" href="<?php bloginfo('home');?>">Continue Shopping</a></p>
			</div>
		<?php else:?>
			<div class="errorBox" >
				<label class="error"></label><br /><br />
				<p>This email address has been registered. </p>
				<p>Please try with another email address.</p>
				<p><a class="backLand" href="<?php bloginfo('home');?>">Continue Shopping</a></p>
			</div>
		<?php endif;?>
		</div>

		<p><a class="faceBook" href="https://business.facebook.com/iconntechs/?business_id=159600407712495" target="_blank"></a> &nbsp; &nbsp; &nbsp;
			<a class="Google" href="https://twitter.com/Iconntechs1" target="_blank"></a></p>
		<p class="copy">© &nbsp;2016 ICONNTECHS.com</p>

	</body>

</html>



<?php else:?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ICONNTECHS IT</title>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/prompt.css" />
		<script>
	    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
	    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
	    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
	    document,'script','https://connect.facebook.net/en_US/fbevents.js');
	    fbq('init', '1160998803951999');
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

	<!-- Facebook Conversion Code for Registration 1.3 -->
<script>
(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = 'https://connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6043992170173', {'value':'0.00','currency':'USD'}]);
</script>
<noscript>
	<img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6043992170173&amp;cd[value]=0.00&amp;cd[currency]=USD&amp;noscript=1" />
</noscript>



	</head>
	<body>
		<?php if($message=='success'):?>
		<div id="successBox">
			<label class="success"></label>
			<p>Thank you for registering with us! </p>
			<p>Below coupon code is also sent to your email.</p>
			<p><label>Coupon Code: </label><label class="Preferential-code"><?php echo $coupon;?></label></p>
			<p><a class="back"  href="<?php bloginfo('home');?>">Continue Shopping</a></p>
		</div>
		<?php else:?>
		<div id="errorBox" >
			<label class="error"></label>
			<p>This email address has been registered. </p>
				<p>Please try with another email address.</p>
			<p><a class="back"  href="<?php bloginfo('home');?>">Continue Shopping</a></p>
		</div>
		<?php endif;?>

		<footer>
			<p><a class="faceBook" href="https://business.facebook.com/iconntechs/?business_id=159600407712495" target="_blank"></a> &nbsp; &nbsp;<a class="Google" href="https://twitter.com/Iconntechs1" target="_blank"></a> </p>
			<p class="copy">© &nbsp;2016 ICONNTECHS.com</p>
		</footer>
	</body>
</html>


<?php endif;?>