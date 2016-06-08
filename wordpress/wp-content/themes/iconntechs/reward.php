<?php 
/*
	Template Name:Reward
*/
if(!$user_ID){
	$aurl = get_permalink();
	wp_redirect( site_url("/wp-login.php?redirect_to=$aurl"));
	//header("Location:".bloginfo('home')."/wp-login.php?redirect_to=$aurl");die;
}
	$headimg = get_the_author_meta( 'headimg', $user_ID );
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>reward</title>

		<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/address.css" />

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
        <?php get_template_part('head','shop');?>
		   <div class="container container1">
	    	<form id="headImgUpload"  enctype="multipart/form-data" method="post" action="<?php bloginfo('home');?>/index.php/my-account/">
	    		<div class="headImg">
				<?php if(!empty($headimg)):?>
					 <img id="head" name="head" src="<?php echo $headimg;?>"/>
				<?php else:?>
	    		     <img id="head" name="head" src="<?php echo bloginfo('template_url');?>/img/headImg1.png"/>
	    		<?php endif;?>

	    	    </div>
	         	<input type="file" id="photoimg" name="photoimg" style="display: none;" onchange="upload()">
	    	</form>
	    	<p class="name"><strong><?php echo get_the_author_meta( 'user_nicename', $user_ID );?></strong></p>
	    	<p><?php echo get_the_author_meta( 'billing_country', $user_ID ).' ';?><?php echo get_the_author_meta( 'billing_city', $user_ID );?></p>
	    	<p class="personDesc">I think it is really great with the product iconntechs</p>
	    	<div class="col-lg-3  ">
	    		<a href="<?php bloginfo('home');?>/index.php/my-account/">
	    			<div><i class="iconfont">&#xe63b;</i></div>
	    			<p>Personal</p>
	    		</a>
	    	</div>
	    	<div class="col-lg-3 ">
	    		<a href="<?php bloginfo('home');?>/index.php/my-order-list/">
	    			<div><i class="iconfont">&#xe62d;</i></div>
	    			<p>Order</p>
	    		</a>
	    	</div>
	    	<div class="col-lg-3">
	    		<a href="<?php bloginfo('home');?>/index.php/my-account/edit-address/edit/">
	    			<div><i class="iconfont">&#xe612;</i></div>
	    			<p>Address</p>
	    		</a>
	    	</div>
	    	<div class="col-lg-3 activeDiv ">
	    		<a href="<?php bloginfo('home');?>/index.php/reward/">
	    			<div><i class="iconfont">&#xe624;</i></div>
	    			<p>Rewards</p>
	    		</a>
	    	</div>
	    </div>

	    <div class="container container6">
	    	<p class="ptitle"><label>New Reward</label></p>
	    	<p><input type="text" placeholder="Discount code *"/> <input type="submit" value="APPLY CODE"></p><br /><br />
	    	<p class="ptitle"><label>My Rewards</label></p>
	    	<p style="color: #999999;">No exchange items</p>
	    </div>
	   
	   
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：foot
        -->
		<?php get_template_part('foot','shop');?>
		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/jquery-1.11.0.js"></script>
		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.validate.min.js" ></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/validate_myexpand.js" ></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/headImgUplad.js" ></script>
		<script>
			function upload(){
				$("#accountform").ajaxForm({
							beforeSubmit:function(){
							
						}, 
						success:function(){
							window.location.reload();

						}, 
						error:function(){
							$('#message').text('Upload failure');
						}
							 }).submit();
	   			}
			
		</script>
	</body>
</html>
