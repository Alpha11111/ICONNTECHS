<?php
/*
	Template Name:custom checkout
*/
/*$totals = $order->get_order_item_totals();
var_dump($totals);die;*/
?>


<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>orderInfo</title>

		<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/orderInfo.css" />

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
	    <form   action="<?php bloginfo('home');?>/index.php/payment/" method="post" name="checkout">
		<div class="container container1">
			
			<div class="col-lg-6">
				<h1><i class="iconfont">&#xe64c;</i>&nbsp;&nbsp;Order Details</h1>
				<h5>Shipping address</h5>
				<div>
				
						<div class="input-Box">
				    			<div class="num2">
					    			<input type="text" name="billing_first_name" id="billing_first_name"/>
					    			<p class="inputPropmt">First name  <span class="mark2">*</span></p>
				    			</div>
				    			<div class="num2">
					    			<input type="text" name="billing_last_name" id="billing_last_name" />
					    			<p class="inputPropmt">Last name <span class="mark2">*</span></p>
				    			</div>
	    		        </div>
	    		        <div class="input-Box">
			    			<div class="num1">
				    			<input type="text" name="billing_address_1" id="billing_address_1"   />
				    			<p class="inputPropmt">Address line 1<span class="mark2">*</span></p>
			    			</div>
	    			
	    	        	</div>
	    	        	<div class="input-Box">
			    			<div class="num1">
				    			<input type="text" name="billing_address_2" id="billing_address_2"  />
				    			<p class="inputPropmt">Address line 2</p>
			    			</div>
	    			
	    	        	</div>
	    	        	<div class="input-Box">
			    			<div class="num3">
				    			<input type="text" name="billing_country" id="billing_country"   />
				    			<p class="inputPropmt">Country <span class="mark2">*</span></p>
			    			</div>
			    			<div class="num3">
				    			<input type="text" name="billing_state" id="billing_state"   />
				    			<p class="inputPropmt">State <span class="mark2">*</span></p>
			    			</div>
			    			<div class="num3">
				    			<input type="text" name="billing_city" id="billing_city"   />
				    			<p class="inputPropmt">City <span class="mark2">*</span></p>
			    			</div>
	    	        	</div>
	    	        	<div class="input-Box">
			    			<div class="num1">
				    			<input type="text" name="billing_phone" id="billing_phone"   />
				    			<p class="inputPropmt">Phone number <span class="mark2">*</span></p>
			    			</div>
	    	        	</div>
	    	        	<div class="input-Box">
			    			<div class="num1">
				    			<input type="text" name="billing_postcode" id="billing_postcode"   />
				    			<p class="inputPropmt">Zip code <span class="mark2">*</span></p>
			    			</div>
	    	        	</div>
	    	        	
					
				</div>
			</div>
			<div class="col-lg-6">
<?php
		$tdata = WC()->cart->get_cart();
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
			$pimg = wp_get_attachment_url( get_post_thumbnail_id($cart_item['product_id']));
			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>

				<div class="product-Box">
					<div class="product-img">
						<a><img src="<?php echo $pimg; ?>"/></a>
					</div>


					<div class="product-desc">
						<a><h4><?php
							if ( ! $_product->is_visible() ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $_product->get_permalink( $cart_item ) ), $_product->get_title() ), $cart_item, $cart_item_key );
							}

							// Meta data
							echo WC()->cart->get_item_data( $cart_item );

							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
							}
						?></h4></a>
						<p>Price: <?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?></p>
						<!-- <p>Color: blue </p> -->
						<h4><?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?></h4>
					</div>


					
				</div>
<?php }}?>
				<hr />
				<div class="calculationBox">
					<div class="calculationBox-left">
						<p>Subtotal:</p>
						<p>Shipping:</p>
						<p>Taxes:</p>
					</div>
					<div class="calculationBox-right">
						<p><?php wc_cart_totals_subtotal_html();?></p>
						<p>$0.00</p>
						<p>$0.00</p>
					</div>
				</div>
				<hr />
				<p class="TotalPrice"><label class="Total1">Total:</label><label class="price1"><?php wc_cart_totals_subtotal_html();?></label></p>
			</div>
		</div>
		<div class="container container2">
			<input type="submit" value="CONTINUE TO PAYMENT" />
		</div>
	</form>
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
		<script>
		 $(".inputPropmt").click(function(){
				 	$(this).prev("input").focus();
				 });
			$(function(){
				 if($("input[type=text]").val()!=null||$("input").val()!=''){
               	   $("input[type=text]").val('');
                 }
				$("form").validate({
						rules: {
							billing_first_name: "required",
							billing_last_name: "required",
							billing_address_1:"required",
							
							billing_country: "required",
							billing_state:"required",
							billing_city:"required",
							billing_phone: "required",
							billing_postcode:"required",
						},
						messages: {
							billing_first_name: "Please enter your Firstnames",
							billing_last_name: "Please enter your Lastname",
							billing_address_1:"Please enter your Address1",
							
							billing_country: "Please enter your  Country",
							billing_state:"Please enter your  State",
							billing_city:"Please enter your  City",
							billing_phone: "Please enter your email Zipcode",
							billing_postcode: "Please enter your Phonenumber"
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
