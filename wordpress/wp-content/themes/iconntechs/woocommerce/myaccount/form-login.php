<?php
	

?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>Login</title>

		<link rel="stylesheet" href="<?php bloginfo('template_url')?>/css/login.css" />

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



		<div class="container loginBox">		
			<div>				
				<form method="post" class="login" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<h1>Welcome Back</h1>
					<p><input type="text"  placeholder="Email or name" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>"/>
					</p>
					<p><input type="password"  placeholder="Password" name="password" id="password"/>
					</p>
					
					<div class="other-box">
						<span class="checkBox">
							<i class="iconfont" style="visibility: hidden;">&#xe61f;</i>
						</span>&nbsp;&nbsp;&nbsp;Remember me 
						<a href="#" class="forgetPwd">Forgot your passworrd? </a>
					</div>

					<?php do_action( 'woocommerce_login_form' ); ?>
					<p>
						<?php wp_nonce_field( 'woocommerce-login' ); ?>
						<input type="submit"  value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>"/>
					</p>

					<p class="xian-box"><span class="xiantiao"></span><span class="or">OR</span><span class="xiantiao"></span></p>
					<p><a class="register">CREATE ACCOUNT</a></p>
					<p><a class="Google"><i class="iconfont" style="font-size: 23px;">&#xe629;</i>Sign In with Google</a></p>
					<p><a class="facebook"><i class="iconfont" style="font-size: 23px;">&#xe626;</i>Sign In with Facebook</a></p>											
				</form>				
			</div>
		</div>
		
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：foot
        -->

		<script src="<?php bloginfo('template_url')?>/bootstrap-3.3.5-dist/js/jquery-1.11.0.js"></script>
		<script src="<?php bloginfo('template_url')?>/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/jquery.validate.min.js" ></script>
		<script type="text/javascript" src="<?php bloginfo('template_url')?>/js/validate_myexpand.js" ></script>
		<script>
			$(function(){
				$("form").validate({
					rules: {
						username: "required",
						password: {
							required:true,
							minlength:6,
							maxlength:16
							}
					},
					messages: {
						username: "Please enter your Email or Name",
						password: {
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
