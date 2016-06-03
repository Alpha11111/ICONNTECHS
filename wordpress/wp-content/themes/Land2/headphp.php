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




$password = rand(100000,999999);


global $wpdb;

$invite_id = $_GET['invite'];

if(!empty($_POST['email'])){
	$invite_id = $_POST['invite_id'];
	if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	 {
	 	$message = 'Email is not valid';
	 	
	 
	 }
	 else{
		$isaa = $wpdb->get_results("select * from wp_users where user_email='$_POST[email]' limit 1",ARRAY_A); 
		
		if($isaa){
			$share_id = $isaa[0]['ID'];
			$share_url = site_url().'/index.php/?invite='.$share_id;
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
				$share_url = site_url().'/index.php/?invite='.$uid;
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