<?php
if ($_SERVER["HTTPS"] <> "on") 
{ 
$xredir="https://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; 
header("Location: ".$xredir); 
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
    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/moveLand.css" />
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url');?>/img/logoIcon.png">
    <title></title> 
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
</head>
<body>
    <div class="product1">
            <img src="<?php bloginfo('template_url');?>/img/samml1.jpg" />
            <a class="btn" href="http://www.amazon.com/dp/B01FS65MCG" target="_blank">By On Amazon</a>
            <a class="btn2" href="<?php bloginfo('home');?>/index.php/submit/">Register</a>
        </div>
        <div class="product2">
            <img src="<?php bloginfo('template_url');?>/img/samll2.jpg" />
            <a class="btn" href="http://www.amazon.com/dp/B01F70Q236" target="_blank">By On Amazon</a>
            <a class="btn2" href="<?php bloginfo('home');?>/index.php/submit/">Register</a>
        </div>
        <div class="product3">
            <img src="<?php bloginfo('template_url');?>/img/samll3.jpg" />
            <a class="btn" href="http://www.amazon.com/dp/B01F759GKC" target="_blank">By On Amazon</a>
            <a class="btn2" href="<?php bloginfo('home');?>/index.php/submit/">Register</a>
        </div>
        <div class="product4">
            <img src="<?php bloginfo('template_url');?>/img/samll4.jpg" />
            <a class="btn" href="http://www.amazon.com/dp/B01FS16U9A " target="_blank">By On Amazon</a>
            <a class="btn2" href="<?php bloginfo('home');?>/index.php/submit/">Register</a>
        </div>
        <footer>
            <p>
                <a class="faceBook" href="https://business.facebook.com/iconntechs/?business_id=159600407712495" target="_blank"></a> &nbsp; &nbsp; &nbsp;
                <a class="Google" href="https://plus.google.com/?hl=en" target="_blank"></a> &nbsp; &nbsp; &nbsp;
                <a class="instagram" href="https://www.instagram.com/iconntechs1/" target="_blank"></a>
            </p>
        <p class="copy">© &nbsp;2016 ICONNTECHS.com</p>
        </footer>
</body>
</html>
<?php else:?>
<!DOCTYPE html>
<html id="body">
	<head>
		<meta charset="utf-8"/>
		<link rel="icon" type="image/png" href="<?php bloginfo('template_url');?>/img/logoIcon.png">
		<title>
			
		</title>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/land.css" />
        <link rel="icon" type="image/png" href="<?php bloginfo('template_url');?>/img/logoIcon.png">
	
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
	</head>
	<body >
        <div class="product1">
            <img src="<?php bloginfo('template_url');?>/img/Pctop.jpg" />
        </div>
		<div class="product2">
			<img src="<?php bloginfo('template_url');?>/img/1.jpg" />
			<a class="btn" href="http://www.amazon.com/dp/B01FS65MCG" target="_blank">By On Amazon</a>
		</div>
		<div class="product3">
			<img src="<?php bloginfo('template_url');?>/img/2.jpg" />
			<a class="btn" href="http://www.amazon.com/dp/B01FS16U9A" target="_blank">By On Amazon</a>
		</div>
		<div class="product4">
			<img src="<?php bloginfo('template_url');?>/img/3.jpg" />
			<a class="btn" href="http://www.amazon.com/dp/B01F759GKC" target="_blank">By On Amazon</a>
		</div>
		<div class="product5">
			<img src="<?php bloginfo('template_url');?>/img/4.jpg" />
			<a class="btn" href="http://www.amazon.com/dp/B01F70Q236 " target="_blank">By On Amazon</a>
		</div>
		<footer>
			<p><a class="faceBook" href="https://business.facebook.com/iconntechs/?business_id=159600407712495" target="_blank"></a> &nbsp; &nbsp; &nbsp;<a class="Google" href="https://plus.google.com/?hl=en" target="_blank"></a> &nbsp; &nbsp; &nbsp;<a class="instagram" href="https://www.instagram.com/iconntechs1/" target="_blank"></a></p>
			<p class="copy">© 2016  ICONNTECHS.com</p>
		</footer>
		<div class="hoverBox">
			 <div class="middleContentBox">
			 	 <div class="logoBox">
			 	 	<img src="<?php bloginfo('template_url');?>/img/ICONN.png" />
			 	 	<p >Register Now to Get 25% off Coupon for Purchase Before 10th June</p>
			 	 </div>
			 	 <div class="imgBox">
			 	 	<img src="<?php bloginfo('template_url');?>/img/tutu.png" />
			 	 </div>
			 	 <div class="formBox">
			 	 	 <form id="regform" name="regform" action="<?php bloginfo('home');?>/index.php/land-register/" method="post">
			 	 	 	<p><input type="text" id="email" name="email" placeholder="Email" required="required" /></p> 
			 	 	 	<p><input type="password" id="password" name="password" placeholder="Password" required="required" /></p> 
			 	 	 	<p><input type="submit" value="SUBMIT"/></p>
			 	 	 </form>
			 	</div>
			 </div>
		</div>
		
	</body>
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/land.js" ></script>
</html>
<?php endif;?>