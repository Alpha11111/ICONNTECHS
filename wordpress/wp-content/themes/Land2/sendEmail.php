<?php
	/*
		Template Name:Send email

	*/
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


if(!empty($_POST['emailto'])){
	if(!filter_var($_POST['emailto'], FILTER_VALIDATE_EMAIL))
	 {
	 	$message = 'Email is not valid';
	 	
	 
	 }else{
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
				line-height: 25px;
				margin: 5px 0px;
				font-size: 14px;
			}
			#emailBox label{
				color: #FF5550;
				font-size: 18px;
				
			}
			ul li{
				list-style: square;
				font-size: 14px;
				line-height: 25px;
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
			<h1>ICONNTECHS</h1>
			<p>Hello Buddy!</p>
			<p>Iconntechs is giving away coupon!</p>
			<p>All you need to do is:</p>
			<p>1, Click the link below, you will then be taken to Iconntechs registration page</p>
			<p><a href='$_GET[share_url]'>$_GET[share_url]</a></p>
			<p>2, Registered on Iconntechs website and you will get your unique link</p>
			<p>3, Share your unique link to your friends and earn Iconntechs coupon</p><br />
			<p>With the coupon,    you can purchase many types of fashionable and advanced electronics from Iconntechs Amazon store <a href='http://amzn.to/25Ckbs0'>http://amzn.to/25Ckbs0</a></p>
		
			<hr />
			<p class='webSite'><a href='http://www.iconntechs.com'>http://www.iconntechs.com</a></p>
		</div>";



	 	wp_mail($_POST['emailto'],$_POST['emailtitle'],$msg);
	 	
	 }
}

?>

<?php if(isMobile()):?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		 <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		 <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/sendEmail.css" />
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
		<form id="send" method="post" action="<?php bloginfo('home');?>.'/index.php/send-email?share_url='.<?php echo $_GET['share_url'];?>">
		<div class="white">
			
			 <p class="input"><label>To :</label><input name="emailto" type="text"></p>
		       <p class="input"><label>Subject :</label><input type="text" name="emailtitle" value="Share and get free products!!!"></p>
		       <div class="textarea">
		       	  <p>Hello Buddy!</p>
		       	  <p>Iconntechs is giving away coupon!</p>
		       	  <p>All you need to do is:</p>
		       	  <p>1, Click the link below, you will then be taken to Iconntechs registration page <a href="<?php echo $_GET['share_url'];?>"><?php echo $_GET['share_url'];?></a></p>
		       	  <p>2, Registered on Iconntechs website and you will get your unique link</p>
		       	  <p>3, Share your unique link to your friends and earn Iconntechs coupon</p>
		       	  <p>With the coupon, you can purchase many types of fashionable and advanced electronics from Iconntechs Amazon store <a href="http://amzn.to/25Ckbs0">http://amzn.to/25Ckbs0</a></p>
		       </div>
		   
		</div>
		      
		<p class="submitBox"><input type="submit" value="Send"/></p> 
		</form>
	</body>
	<script>
		window.onload=function(){
			var content ="Hello Buddy!"
			document.getElementById("text").value=content;
		}
	</script>
</html>
<?php else:?>

<?php wp_redirect($_SERVER['HTTP_REFERER']);?>

<?php endif;?>