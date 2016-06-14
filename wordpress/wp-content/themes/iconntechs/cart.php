<?php
/*
Template Name:shop-cart
*/
 
$tdata = WC()->cart->get_cart();
$tr = WC()->cart->get_cart();
/*foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		//var_dump($cart_item_key);die;
		var_dump($cart_item);die;
		 //WC()->cart->remove_cart_item($cart_item_key);
	}*/
//var_dump($tr);die;
if(!empty($_POST)){
	$num = $_POST['num'];
	$product_id = $_POST['product_id'];
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		if($cart_item['product_id']==$product_id){
			 WC()->cart->remove_cart_item($cart_item_key);
		}
		
	}
	WC()->cart->add_to_cart($product_id = $product_id, $quantity = $num, $variation_id = 0, $variation = array(), $cart_item_data = array() );
}

?>
<?php get_template_part('head','shop');?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>cart</title>

		<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/cart.css" />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>http://s.ap.wps.cn/ciba/mini/index.9d49951b.html?mode=lnp#
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		<script>
			fbq('track', 'AddToCart');
		</script>
	</head>
	<body>
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：head
        -->


		
		<div class="container container1" <?php if(empty($tdata)):?>style="display:none"<?php endif;?>>
			<h1><i class="iconfont">&#xe60f;</i>&nbsp; Shopping Cart</h1>
			<hr />


<?php
		
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
			$pimg = wp_get_attachment_url( get_post_thumbnail_id($cart_item['product_id']) );
			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
			<div class="product-Box">			
				
				<div class="product-Box-left">
					<div class="product-img">
						<a>
							<img src="<?php echo $pimg; ?>" alt="cart1" class="img-responsive"/>
						</a>
					</div>
					<div class="product-desc">
						<p class="product-title"><?php
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
						?>
					</p>
						<p>Price: <?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?></p>
						<!-- <p>Color: blue </p> -->
					</div>
				</div>

				<div class="product-Box-right">
					<div>
						Quantity &nbsp;&nbsp;
						<p class="calculationBox">
							<label class="reduce" onclick="reduce(this)"><i class="iconfont">&#xe644;</i></label>
							<span class="num" id="<?php echo $product_id;?>"><?php
								echo $cart_item['quantity'];
						?>
							
							</span>
							<label class="add" onclick="add(this)"><i class="iconfont">+</i></label>
						</p>
						
						<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a hreff="%s" data-target="#myModal" data-toggle="modal"   title="%s" data-product_id="%s" data-product_sku="%s"><i class="iconfont">&#xe639;</i></a>',
								esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
								__( 'Remove this item', 'woocommerce' ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
						?>
						<!-- <a><i class="iconfont">&#xe670;</i></a> -->
					</div>
				</div>

			</div>

		<?php
			}}?>


			<hr />
			<!--
            	作者：1164365204@qq.com
            	时间：2016-05-06
            	描述：结算按钮
            -->
            <?php if(!empty($tdata)):?>   
			<p class="buyBtnBox">

		<?php if ( !$user_ID ) : ?>
		<a class="buyBtn" href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">Subtotal: <?php wc_cart_totals_subtotal_html();?>  |  CHECK OUT</a></p> 

		<?php else: ?>

				<a class="buyBtn"  href="<?php echo home_url();?>/index.php/checkout/">Subtotal: <?php wc_cart_totals_subtotal_html();?>  |  CHECK OUT
					</a>

				</p>
				<?php endif; ?>
			<?php endif;?>
		</div>
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：foot
        -->
        <?php if(empty($tdata)):?> 
        <div class="container container2">
			<h1><i class="iconfont">&#xe60f;</i></h1>
			<p>Your cart is empty</p>
			<p class="btn1"><a href="<?php bloginfo('home');?>/index.php/shop/"> SHOP NOW</a></p>
		</div>
		<?php endif; ?>
		<?php get_template_part('foot','shop');?>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
        
         <div class="modal-body">
            <h3>REMOVE ITEM</h3>
            <p>Are you sure you want to remove this item from your cart?</p>
         </div>
         <div class="modal-footer">
            <input type="button" class="btn1 fff" data-dismiss="modal" value="NO"/><input type="button" class="btn1 yes " value="YES"/>
            
           
           
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
		
		<script>
				$(function(){
					var id=0;
					$(".product-Box-right a").click(function(){
					   id=$(this).attr("hreff");
					 
					});
					$(".yes").click(function(){
						$('#myModal').modal('hide');
					    location.href=id;
						
					});
					//数量减少
					
				 });

				function reduce(obj){

					  var num = parseInt($(obj).next(".num").text());
					  var product_id = $(obj).next(".num").attr('id');
					  
					   num--;
					   $.post("<?php echo the_permalink();?>",{'num':num,'product_id':product_id},function(data){
					    		
					    });
					   if(num<=1){
					   	 $(obj).next(".num").text(1);
					   	 return;
					   	  
					   }
					    $(obj).next(".num").text(num);

					   
					   
					};
					//数量增加
			function add(obj){
						var num = parseInt($(obj).prev(".num").text());
						var product_id = $(obj).prev(".num").attr('id');
						num++;
						$.post("<?php echo the_permalink();?>",{'num':num,'product_id':product_id},function(data){
					    		
					    });
						$(obj).prev(".num").text(num);

						 
						
					};
			
		</script>
	</body>
</html>
