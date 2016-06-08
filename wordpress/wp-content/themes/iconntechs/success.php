<?php
/*
	Template Name:Land Register Success

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

global $wpdb;
//var_dump($_GET);die;
$invite_id = $_GET['invite'];

if(!empty($_POST['email'])){
	$password = range(111111,999999);
	
	$invite_id = $_POST['invite_id'];
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	 {
	 	$message = 'Email is not valid';
	 	
	 
	 }
	 else{
		$isaa = $wpdb->get_results("select * from wp_users where user_email='$_POST[email]' limit 1",ARRAY_A); 
		
		if($isaa){
			$share_id = $isaa[0]['ID'];
			//$pre = rtrim($_SERVER['HTTP_REFERER'],'/');
			$share_url = site_url().'/index.php/referral-program?invite='.$share_id;
			$message = 'success';
			wp_mail($_POST['email'],'ICONNTECHS',$msg);
			wp_redirect(site_url('index.php/registrationcompletion/?share_url='.$share_url.'&share_id='.$share_id));	
					
		}else{

			$ip = $_SERVER["REMOTE_ADDR"];
			//var_dump($ip);die;
			$ipaddress = $wpdb->get_results("select meta_value from wp_usermeta where meta_key='$ip' limit 1",ARRAY_A); 
			
			if(empty($ipaddress) || $ipaddress[0]['meta_value']+1<11){
				
				if(empty($ipaddress)){
						$irry = array('meta_key'=>$ip,'meta_value'=>1,'user_id'=>1);
						$wpdb->insert('wp_usermeta',$irry);
				}else{
						$urry = array('meta_value' => $ipaddress[0]['meta_value']+1);
						$wcl = array('user_id'=>1,'meta_key'=>$ip);
						$wpdb->update('wp_usermeta',$urry,$wcl);
				}
				


				if(!empty($invite_id)){
					
					$invite_number = get_the_author_meta('invite_number',$invite_id);

					if($invite_number){
						
						$uarry = array('meta_value' => $invite_number+1);
						$wcl = array('user_id'=>$invite_id,'meta_key'=>'invite_number');
						$wpdb->update('wp_usermeta',$uarry,$wcl);
					}else{
						
						$iarry = array('meta_key'=>'invite_number','meta_value'=>1,'user_id'=>$invite_id);
						$wpdb->insert('wp_usermeta',$iarry);
					}
				}
				$uu = wp_create_user($_POST['email'], $password, $_POST['email'] );
			
				$uid = $uu;

				$share_id = $uid;
				$share_url = site_url().'/index.php/referral-program?invite='.$share_id;
				$message = 'success';
				
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
					
					<p>Greetings from Iconntechs,</p>
					<p>Thank you for registering on www.Iconntechs.com.</p>
					<p>Here is the account and password. You can log in our official website when it is launched. </p>
					<p>Email:$_POST[email]</p>
					<p>Password:$password</p>
					<p>Unique link:$share_url</p>
					<p>Share your unique link above to earn Iconntechs’s goods for each friend who signs up.</p>
					<p>Here is how it works:</p>
					<ul>
						<li>5 friends successfully registered, you will get $30 worth coupon</li>
						<li>10 friends successfully registered, you will get $80 worth coupon</li>
						<li>25 friends successfully registered, you will get $120 worth coupon</li>
						<li>50 of your friends successfully registered in our website, you will get $180 worth coupon</li>
					</ul>
					<p>The coupons can be used on any products you purchased from our Amazon store. Good news is our products are on sale now, and our promotion valid to June 18th . So hurry up!!! Once 10 of your friends registered, you can get a 4K action camera for free!</p>
					
					<p>Iconntechs amazon store: </p>
		            <p><a href='http://amzn.to/25Ckbs0'>http://amzn.to/25Ckbs0</a></p>
					<hr />
					<p class='webSite'><a href='http://www.iconntechs.com'>http://www.iconntechs.com</a></p>
				</div>";
				wp_mail($_POST['email'],' Invite Friends & Earn up to $200 coupon',$msg);
				wp_redirect(site_url('index.php/registrationcompletion/?share_url='.$share_url.'&share_id='.$share_id));
					
			}else{
				$error = 'IP address is limited';		
			}
		}
	}
}




?>


<?php if(isMobile()):?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title></title>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/moveSuccess.css" />
	</head>

	<body>
		<div id="body">
			<div id="top">
				<h5>INVITE FRIENDS & EARN <span style="color: #FF5550;">FREE</span> PRODUCTS</h5>
				<p>Share your unique link via email,Facebook</p>
				<P>or Twitter and earn Iconntechs’s goods for </P>
				<p>each friend who signs up.</p>
				<label class="linkBox"><?php echo $_GET['share_url'];?></label>
				<p class="shareBox">
					<a class="faceBook" target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo $_GET['share_url'];?>"></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="twitter" href="https://twitter.com/intent/tweet?url=<?php echo $_GET['share_url'];?>"  target="_blank"></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="emailBox" href="<?php bloginfo('home');?>/index.php/send-mail?share_url=<?php echo $_GET['share_url'];?>"></a>
				</p>
			</div>
			<div id="bottom">
				<h5>HERE’S HOW IT WORKS</h5>
				<p class="tit">NO. of Friends Joined</p>
				<div id="boxbox">
					<div class="product product1">
						<div class="imgBox">
							<p>$30 Credit&nbsp;</p>
							<img src="<?php bloginfo('template_url');?>/img/jiantou.png" />
						</div>
						<div class="desc">
							<br />
							<img src="<?php bloginfo('template_url');?>/img/movePro1.png" class="imgpro" />
							<p class="name">Earphone</p>
							<p class="price">19.99 $</p>
						</div>
					</div>
					<div class="product product2">
						<div class="imgBox">
							<p>$80 Credit&nbsp;</p>
							<img src="<?php bloginfo('template_url');?>/img/jiantou.png" />
						</div>
						<div id="product2Img" class="desc">
							<br />
							<img src="<?php bloginfo('template_url');?>/img/movePro2.png" class="imgpro" />
							<p class="name">Action Camera</p>
							<p class="price">79.99 $</p>
						</div>
					</div>
					<div class="product product3">
						<div class="imgBox">
							<p>$120 Credit</p>
							<img src="<?php bloginfo('template_url');?>/img/jiantou.png" />
						</div>
						<div class="desc">
							<br />
							<img src="<?php bloginfo('template_url');?>/img/movePro3.png" class="imgpro" />
							<p class="name">Action Camera</p>
							<p class="price">114.98 $</p>
						</div>
					</div>
					<div class="product product4">
						<div class="imgBox">
							<p>$200 Credit</p>
							<img src="<?php bloginfo('template_url');?>/img/jiantou.png" />
						</div>
						<div class="desc">
							<img src="<?php bloginfo('template_url');?>/img/movePro4.png" class="imgpro" />
							<p class="name">Action Camera</p>
							<p class="price"> 180.96 $ </p>
						</div>
					</div>
					<div id="cover" class="speed" data-num="<?php echo get_the_author_meta('invite_number',$_GET['share_id']);?>">
						<img src="<?php bloginfo('template_url');?>/img/1.png"  id="imgs"/>
					</div>
				</div>

				<p class="prompt"><label id="showNum"></label> &nbsp;Friends have joined...Yet! </p>
				<p >Keep checking</p>
				<p class="support">Support:info@iconntechs.com</p>
			</div>
		</div>
		<script>
						 window.onload=function(){
					         var num=document.getElementById("cover").getAttribute("data-num");
					         if(num==0){
					         	document.getElementById("showNum").innerHTML="NO";
					         }else{
					         	document.getElementById("showNum").style.color="#FF5550";
					         	document.getElementById("showNum").style.fontWeight="bold";
					         	document.getElementById("showNum").innerHTML=num;
					         }
					         if(num>=0&&num<5){
					         	document.getElementById("imgs").src="<?php bloginfo('template_url');?>/img/0.png"
					         }
					         if(num>=5&&num<10){
					         	document.getElementById("imgs").src="<?php bloginfo('template_url');?>/img/1.png"
					         }
					         if(num>=10&&num<25){
					         	document.getElementById("imgs").src="<?php bloginfo('template_url');?>/img/2.png"
					         }
					         if(num>=25&& num<50){
					         	document.getElementById("imgs").src="<?php bloginfo('template_url');?>/img/3.png"
					         }
					         if(num==50){
					         	document.getElementById("cover").src="<?php bloginfo('template_url');?>/img/4.png"
					         }
					    }
		</script>
	</body>

</html>


<?php else:?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>ICONNTECHS</title>
		<link rel="icon" type="image/png" href="<?php bloginfo('template_url');?>/img/logoIcon.png">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url');?>/css/success.css"/>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/animate.css" />
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
		<header>
			<div id="head">
				<img src="<?php bloginfo('template_url');?>/img/logo2.png"  alt="logo" title="logo"/> 
			</div>
			
		</header>
		<div id="body">
			<div class="top">
				<h1>INVITE FRIENDS & EARN <span style="color:#ff5500">FREE</span> PRODUCTS</h1>
				<br />
				<p>Share your unique link via email,Facebook</p>
				<p>or Twitter and earn Iconntechs’s goods for  </p>
				<p>each friend who signs up.</p>
				<br /><br />
				<div class="linkBox"><?php echo $_GET['share_url'];?></div><br /><br />
				<p class="shareBox"><a class="faceBook" href="https://business.facebook.com/iconntechs/?business_id=159600407712495" target="_blank"></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a class="twitter" href="https://twitter.com/Iconntechs1" target="_blank"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a class="emailBox" id="emailBox1"></a></p>
			</div>
			<div class="bottom">
				   <h2>HERE’S HOW IT WORKS</h2>
				   <ul class="speedHead">
					   	<li class="first">NO. of Friends Joined </li>
					   	<li><label>5</label></li>
					   	<li><label>10</label></li>
					   	<li><label>25</label></li>
					   	<li><label>50</label></li>
				   </ul>
				   <ul class="speedShow">
				   	<li></li>
				   	<li></li>
				   	<li></li>
				   	<li></li>
				   	<li></li>
				   	<p id="cover"  data-num = "<?php echo get_the_author_meta('invite_number',$_GET['share_id']);?>"></p>
				   </ul>
				    <ul class="speedFoot">
					   	<li class="first">
					   		<p class="p1">Equivalent to  </p>
					   		<p class="p2">ICONNTECHS’S PRODUCT</p>
					   	</li>
					   	<li>
					     	$30 Credit
					   		<div>
					   			<img src="<?php bloginfo('template_url');?>/img/combination1.png"/>
					   			<p>Earphone</p>
					   			<p> 19.99 $</p>
					   		</div>
					   	</li>
					   	<li>
					   		$80 Credit
					   		<div>
					   			<img src="<?php bloginfo('template_url');?>/img/combination2.png"/>
					   			<p>Action Camera</p>
					   			<p> 79.99 $</p>
					   		</div>
					   	</li>
					   	<li>
					   		$120 Credit
					   		<div>
					   			<img src="<?php bloginfo('template_url');?>/img/combination3.png"/>
					   			<p>Speaker+Action Camera</p>
					   			<p> 114.98 $</p>
					   		</div>
					   	</li>
					   	<li>
					      $200 Credit
					   	   <div>
					   			<img src="<?php bloginfo('template_url');?>/img/combination4.png"/>
					   			<p>VR+Earphone+Speaker+Action Camera</p>
					   			<p> 180.96 $ </p>
					   		</div>
					   	</li>
				   </ul>
				   <div class="clear">
				   	
				   </div>
				   <p class="prompt"><label id="showNum"></label> &nbsp;Friends have joined...Yet! </p>
				   <p>Keep checking</p><br/>
				   <p>Support:info@iconntechs.com</p>
				   
			</div>
		</div>
	<form method="post" action="<?php bloginfo('home');?>/index.php/send-mail?share_url=<?php echo $_GET['share_url'];?>">
		<div id="mask">
		     <div id="content">
		     	<p class="mTitle"><img src="<?php bloginfo('template_url');?>/img/colse.png" id="close"/></p>
		     	
		       <p class="input"><label>To :</label><input name="emailto" type="text"></p>
		       <p class="input"><label>Subject :</label><input type="text" name="emailtitle" value="Share and get free products!!!"></p>
		       <div  class="textarea">
		       	  <p>Hello Buddy!</p>
		       	  <p>Iconntechs is giving away coupon!</p>
		       	  <p>All you need to do is:</p>
		       	  <p>1, Click the link below, you will then be taken to Iconntechs registration page  <a href="<?php echo $_GET['share_url'];?>"><?php echo $_GET['share_url'];?></a></p>
		       	  <p>2, Registered on Iconntechs website and you will get your unique link</p>
		       	  <p>3, Share your unique link to your friends and earn Iconntechs coupon</p>
		       	  <p>With the coupon, you can purchase many types of fashionable and advanced electronics from Iconntechs Amazon store <a href="http://amzn.to/25Ckbs0">http://amzn.to/25Ckbs0</a></p>
		       </div>
		       	 
		      
		     	
		     	<input type="submit"  value="Send"/>
		     </div>
		</div>
	</form>
		<script>
		    window.onload=function(){
		    	 //弹出窗事件
		         document.getElementById("emailBox1").onclick =function(){
		         	document.getElementById("mask").style.display="block";
		         	document.getElementById("content").setAttribute("class","animated bounceInDown");
		         }
		         //关闭弹出窗
		         document.getElementById("close").onclick =function(){
		           close();
		         }
		         //监听键盘事件
		         document.onkeyup=function(event){
		         	switch(event.keyCode) {
							 	case 27:
							 		close();
							 	break;
				   }
		         }
		         var num=document.getElementById("cover").getAttribute("data-num");
		         if(num==0){
		         	document.getElementById("showNum").innerHTML="NO";
		         }else{
		         	document.getElementById("showNum").style.color="#FF5550";
		         	document.getElementById("showNum").style.fontWeight="bold";
		         	document.getElementById("showNum").innerHTML=num;
		         }
		         if(num>=0&&num<5){
		         	document.getElementById("cover").style.width="13%";
		         }
		         if(num>=5&&num<10){
		         	document.getElementById("cover").style.width="30%";
		         }
		         if(num>=10&&num<25){
		         	document.getElementById("cover").style.width="50%";
		         }
		         if(num>=25&& num<50){
		         	document.getElementById("cover").style.width="70%";
		         }
		         if(num==50){
		         	document.getElementById("cover").style.width="90%";
		         }
		         
		         
		    }
		    
		    function close(){
		    		document.getElementById("mask").style.display="none";
		    }
		</script>
	</body>
</html>

<?php endif;?>
