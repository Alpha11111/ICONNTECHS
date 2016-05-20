<?php     
/* 
Template Name: Custom WordPress Registration
*/  
require_once(ABSPATH . WPINC . '/registration.php');  
global $wpdb, $user_ID;  
if (!$user_ID) {  
   //All code goes in here.  
}  
else {  
   wp_redirect( home_url() ); exit;  
}    
?>  
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>login</title>

		<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/login.css" />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>http://s.ap.wps.cn/ciba/mini/index.9d49951b.html?mode=lnp#
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		
	</head>
	<body>
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：head
        -->
		<?php get_template_url('head','shop');?>
		<div class="container container1">
			<div>
				
				<form>
					<h1>Create Account</h1>
					<p><input type="text"  placeholder="Email address" name="Email" id="Email"/></p>
					<p><input type="password"  placeholder="Password" name="pwd" id="pwd"/></p>
					<div class="other-box">
						<span class="checkBox">
							<i class="iconfont" style="visibility: hidden;">&#xe686;</i>
						</span>&nbsp;&nbsp;&nbsp;Subscribe to the Iconntechs Newsletter
						
					</div>
					<p><input type="submit"  value="REGISTER "/></p>
				    <p><a>< Sign in</a></p>
				</form>
			</div>
		</div>
		
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：foot
        -->
		<?php get_template_url('foot','shop');?>
		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/jquery-1.11.0.js"></script>
		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.validate.min.js" ></script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/validate_myexpand.js" ></script>
		<script>
			$(function(){
				$("form").validate({
					rules: {
						Email: "required",
						pwd: {
							required:true,
							minlength:6,
							maxlength:16
							}
					},
					messages: {
						Email: "Please enter your Email ",
						pwd: {
							required:"Please enter your Password",
							minlength:"Password length is at least 6",
							maxlength:"Password length up to 16"
							}
					} 
			   });
				$(".checkBox").click(function(){
					if($(this).find("i").css("visibility")=="visible"){
						$(this).find("i").css("visibility","hidden");
						return;
					}
					$(this).find("i").css("visibility","visible");
				});
			});
		</script>
	</body>
</html>
