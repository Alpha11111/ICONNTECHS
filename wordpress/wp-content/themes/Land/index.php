<?php
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

<!DOCTYPE html>
<html id="body">
	<head>
		<meta charset="utf-8"/>
		<title>
			
		</title>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/land.css" />
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
			<img src="<?php bloginfo('template_url');?>/img/1.jpg" />
			<a class="btn" href="www.amazon.com/dp/B01FS65MCG">View details</a>
		</div>
		<div class="product2">
			<img src="<?php bloginfo('template_url');?>/img/2.jpg" />
			<a class="btn" href="http://www.amazon.com/dp/B01F70Q236">View details</a>
		</div>
		<div class="product3">
			<img src="<?php bloginfo('template_url');?>/img/3.jpg" />
			<a class="btn" href="http://www.amazon.com/dp/B01F759GKC">View details</a>
		</div>
		<div class="product4">
			<img src="<?php bloginfo('template_url');?>/img/4.jpg" />
			<a class="btn" href="http://www.amazon.com/dp/B01FS16U9A ">View details</a>
		</div>
		<footer>
			<p><a class="faceBook"></a> &nbsp; &nbsp; &nbsp;<a class="Google"></a> &nbsp; &nbsp; &nbsp;<a class="instagram"></a></p>
			<p class="copy">© 2016 by ICONNTECHS.com</p>
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
			 	 	 	<p><input type="email" id="email" name="email" placeholder="Email or name" required="required" /></p> 
			 	 	 	<p><input type="password" id="password" name="password" placeholder="Password" required="required" /></p> 
			 	 	 	<p><input type="submit" value="SUBMIT"/></p>
			 	 	 </form>
			 	</div>
			 </div>
		</div>
		
	</body>
	<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/land.js" ></script>
</html>
