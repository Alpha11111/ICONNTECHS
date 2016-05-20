<?php
/*
	Template Name:Payment
*/
$fdata = $_POST;
$tdata = WC()->cart->get_cart();


?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>pay</title>

		<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/pay.css" />

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
			<h1><i class="iconfont">&#xe635;</i>&nbsp; Payment</h1>
			<div>
				

<?php
		$tdata = WC()->cart->get_cart();
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
			$pimg = wp_get_attachment_url( get_post_thumbnail_id($cart_item['product_id']));
			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<p class="product-title"><a><?php
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
						?></a></p>
				<div class="productList">
					<div class="img-box">
						<a><img src="<?php echo $pimg;?>" class="img-responsive"/></a>
					</div>
					<div class="other-desc">
						<p><?php $_product->post->post_title;?></p>
						<p>Quantity: <?php echo $cart_item['quantity'];?></p>
					</div>
				</div>


				<p class="price1"><?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?></p>
				<?php }}?>
				<hr />
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<p>Subtotal:</p>
					<p>Shipping:</p>
					<p>Taxes:</p>
					<p class="TotalPrice">Total:</p>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<p><?php wc_cart_totals_subtotal_html();?></p>
					<p>$0.00</p>
					<p>$0.00</p>
					<p class="TotalPrice"><?php wc_cart_totals_subtotal_html();?></p>
				</div>

				<div class="clearfix"></div>
				<hr />
				<div class="choosePayWay">
					<h3>Payment method</h3>
					<p>All transactions are secure and encrypted. Credit card informat</p>
					<p>
						<a><img src="<?php bloginfo('template_url');?>/img/pay1.png" alt="pay1"/></a>&nbsp;&nbsp;
						<a><img src="<?php bloginfo('template_url');?>/img/pay2.png" alt="pay2"/></a>&nbsp;&nbsp;
						<a><img src="<?php bloginfo('template_url');?>/img/pay3.png" alt="pay3"/></a>&nbsp;&nbsp;
						<a><img src="<?php bloginfo('template_url');?>/img/pay4.png" alt="pay4"/></a>&nbsp;&nbsp;
					</p>
					<p>You will be redirected to PayPal to complete </p>
					<p>your purchase securely.</p>
					<p><a class="payBtn">$05.39 |  PAY WITH PAYPAL</a></p>
				</div>
				
			</div>
		</div>
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：foot
        -->
		<?php get_template_part('foot','shop');?>
		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/jquery-1.11.0.js"></script>
		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
	</body>
</html>
