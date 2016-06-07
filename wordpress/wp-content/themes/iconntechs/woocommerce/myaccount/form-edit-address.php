<?php 
global $wpdb;
global $user_ID;

if(!$user_ID){
	$aurl = get_permalink();
	wp_redirect( site_url("/wp-login.php?redirect_to=$aurl"));
	//header("Location:".bloginfo('home')."/wp-login.php?redirect_to=$aurl");die;
}
$account = array();
if(!empty($_GET)){
	if($_GET['remove']=='yes'){
	$account['billing_first_name'] = '';
	$account['billing_last_name'] = '';
	$account['billing_address_1'] = '';
	$account['billing_address_2'] = '';
	$account['billing_country'] = '';
	$account['billing_state'] = '';
	$account['billing_city'] = '';
	$account['billing_postcode'] = '';
	$account['billing_phone'] = '';
	foreach ($account as $key => $value) {
			$name = $key;
			$uarry = array('meta_value' => $value);
			$wcl = array('user_id'=>$user_ID,'meta_key'=>$name);
			$wpdb->update('wp_usermeta',$uarry,$wcl);
		}
	}
}

if(!empty($_POST)){
	$account['billing_first_name'] = $_POST['Firstname'];
	$account['billing_last_name'] = $_POST['Lastname'];
	$account['billing_address_1'] = $_POST['Address1'];
	$account['billing_address_2'] = $_POST['Address2'];
	$account['billing_country'] = $_POST['Conutry'];
	$account['billing_state'] = $_POST['State'];
	$account['billing_city'] = $_POST['City'];
	$account['billing_postcode'] = $_POST['Zipcode'];
	$account['billing_phone'] = $_POST['Phonenumber'];

	foreach ($account as $key => $value) {
			$name = $key;
			$uarry = array('meta_value' => $value);
			$wcl = array('user_id'=>$user_ID,'meta_key'=>$name);
			$wpdb->update('wp_usermeta',$uarry,$wcl);
		}
	}
	$headimg = get_the_author_meta( 'headimg', $user_ID );

flush();
?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title><?php the_title();?></title>

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
	    	<div class="col-lg-3   ">
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
	    	<div class="col-lg-3 activeDiv">
	    		<a href="<?php bloginfo('home');?>/index.php/my-account/edit-address/edit/">
	    			<div><i class="iconfont">&#xe612;</i></div>
	    			<p>Address</p>
	    		</a>
	    	</div>
	    	<div class="col-lg-3">
	    		<a href="<?php bloginfo('home');?>/index.php/reward/">
	    			<div><i class="iconfont">&#xe624;</i></div>
	    			<p>Rewards</p>
	    		</a>
	    	</div>
	    </div>

	    <div class="container container2">
	    	<h4>Update Address</h4>
	    	<form class="addressForm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	    		<div class="input-Box">
	    			<div class="num2">
		    			<input type="text" name="Firstname" value="<?php echo get_the_author_meta( 'billing_first_name', $user_ID );?>"  id="Firstname"/>
		    			<p class="inputPropmt">First name  <span class="mark2">*</span></p>
	    			</div>
	    			<div class="num2">
		    			<input type="text" name="Lastname" value="<?php echo get_the_author_meta( 'billing_last_name', $user_ID );?>" id="Lastname" />
		    			<p class="inputPropmt">Last name <span class="mark2">*</span></p>
	    			</div>
	    		</div>
	    		<div class="input-Box">
	    			<div class="num2">
		    			<input type="text" name="Address1" value="<?php echo get_the_author_meta( 'billing_address_1', $user_ID );?>" id="Address1"/>
		    			<p class="inputPropmt">Address line 1  <span class="mark2">*</span></p>
	    			</div>
	    			<div class="num2">
		    			<input type="text" name="Address2" value="<?php echo get_the_author_meta( 'billing_address_2', $user_ID );?>" id="Address2" />
		    			<p class="inputPropmt">Address line 2 <span class="mark2">*</span></p>
	    			</div>
	    		</div>
	    		<div class="input-Box">
	    			<div class="num4">
		    			<input type="text" name="Conutry" value="<?php echo get_the_author_meta( 'billing_country', $user_ID );?>" id="Conutry" />
		    			<p class="inputPropmt">Conutry <span class="mark2">*</span></p>
	    			</div>
	    			<div class="num4">
		    			<input type="text" name="State" value="<?php echo get_the_author_meta( 'billing_state', $user_ID );?>" id="State"   />
		    			<p class="inputPropmt">State<span class="mark2">*</span></p>
	    			</div>
	    			<div class="num4">
		    			<input type="text"  name="City" value="<?php echo get_the_author_meta( 'billing_city', $user_ID );?>" id="City"  />
		    			<p class="inputPropmt">City <span class="mark2">*</span></p>
	    			</div>
	    			<div class="num4">
		    			<input type="text" name="Zipcode" value="<?php echo get_the_author_meta( 'billing_postcode', $user_ID );?>"  id="Zipcode"  />
		    			<p class="inputPropmt">Zip code <span class="mark2">*</span></p>
	    			</div>
	    		</div>
	    		<div class="input-Box">
	    			<div class="num1">
		    			<input type="text" name="Phonenumber" value="<?php echo get_the_author_meta( 'billing_phone', $user_ID );?>"  id="Phonenumber"   />
		    			<p class="inputPropmt">Phone number<span class="mark2">*</span></p>
	    			</div>
	    			
	    		</div>
	    		<p><input type="submit" value="SUBMIT"/></p>
	    	</form>
	    	<h4>Address Book</h4>
	    	<div class="addressBox">
	    		<p><?php echo get_the_author_meta( 'billing_first_name', $user_ID ).' '.get_the_author_meta( 'billing_last_name', $user_ID );?></p>
	    		<p>Phone number:<?php echo get_the_author_meta( 'billing_phone', $user_ID );?></p>
	    		<p>Address:<?php echo get_the_author_meta( 'billing_country', $user_ID ).' '.get_the_author_meta( 'billing_city', $user_ID );?></p>
	    		<p><?php echo get_the_author_meta( 'billing_city', $user_ID ).' '.get_the_author_meta( 'billing_state', $user_ID ).' '.get_the_author_meta( 'billing_country', $user_ID );?></p>
	    		<p>Zip code: <?php echo get_the_author_meta( 'billing_postcode', $user_ID );?></p>
	    	</div>
	    	<p class="operateIcon">
	    		<!-- <a><i class="iconfont">&#xe63c;</i></a>&nbsp;&nbsp;&nbsp;&nbsp; -->
	    		<a href="<?php echo $_SERVER['PHP_SELF'].'?remove=yes';?>"><i class="iconfont">&#xe639;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
	    		<!-- <a><i class="iconfont">&#xe60a;</i></a>&nbsp;&nbsp;&nbsp;&nbsp; -->
	    	</p>
	    </div>
	   
	   
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：foot
        -->
		
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
			$(function(){
				 
				 $(".inputPropmt").click(function(){
				 	$(this).prev("input").focus();
				 });

				$(".addressForm").validate({
						rules: {
							Firstname: "required",
							Lastname: "required",
							Address1:"required",
							Address2: "required",
							Conutry: "required",
							State:"required",
							City:"required",
							Zipcode: "required",
							Phonenumber:"required",
						},
						messages: {
							Firstname: "Please enter your Firstnames",
							Lastname: "Please enter your Lastname",
							Address1:"Please enter your Address1",
							Address2: "Please enter your email Address2",
							Conutry: "Please enter your Conutry",
							State:"Please enter your State",
							City:"Please enter your City",
							Zipcode: "Please enter your email Zipcode",
							Phonenumber: "Please enter your Phonenumber"
						},
						errorPlacement: function(error, element) {  
							error.appendTo(element.parent());  
							
						}						
					});
					
             	//键盘按下事件
             	$("input").keydown(function(){
             		
             		$(this).next(".inputPropmt").css("margin-top","-42px");
             		
             	});
             	//键盘释放事件
             	$("input").keyup(function(){
             		if($(this).val()==''||$(this).val()==null||$(this).val()==undefined){
             			$(this).next(".inputPropmt").css("margin-top","-30px");
             		}
             	});
			});
				
			
		</script>
	</body>
</html>
