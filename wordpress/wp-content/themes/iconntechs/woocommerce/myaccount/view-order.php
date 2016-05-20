<?php
	global $wpdb;
	global $user_ID;
	$order_id = $order_id;

	$order_item_id = $wpdb->get_results("select order_item_id,order_item_name from wp_woocommerce_order_items where order_id=$order_id");


	foreach ($order_item_id as $key) {
		$orderdata[$p]['product_name'] = $key->order_item_name;
		$oid = $key->order_item_id;
		$detail = $wpdb->get_results("select * from wp_woocommerce_order_itemmeta where order_item_id=$oid 
			");
	
		foreach ($detail as $k) {
			if($k->meta_key=='_qty'){
				$orderdata[$p]['quantity'] = $k->meta_value;
			}	
			if($k->meta_key == '_product_id'){
				$post_id = $k->meta_value;
				$orderdata[$p]['product_id'] = $post_id;
				$orderdata[$p]['pimg'] = wp_get_attachment_url(get_post_thumbnail_id($post_id));
				
				$pdata = $wpdb->get_results( "select * from wp_postmeta where post_id = $post_id",ARRAY_A );
				
				foreach ($pdata as $kk) {
					if($kk['meta_key']=='_sale_price'){
							$orderdata[$p]['sprice'] = $kk['meta_value'];
					}
					if($kk['meta_key']=='_regular_price'){
							$orderdata[$p]['rprice'] = $kk['meta_value'];
						}
					}
				
			
			}
			
						
		}

		$p++;
	}

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
	    	<form id="headImgUpload"  enctype="multipart/form-data">
	    		<div class="headImg">
	    		     <img src="<?php bloginfo('template_url');?>/img/headImg1.png"/>
	    		
	    	    </div>
	         	<input type="file" id="seeFile" style="display: none;">
	    	</form>
	    	<p class="name"><strong><?php echo get_the_author_meta( 'user_nicename', $user_ID );?></strong></p>
	    	<p><?php echo get_the_author_meta( 'billing_country', $user_ID );?>,<?php echo get_the_author_meta( 'billing_city', $user_ID );?></p>
	    	<p class="personDesc">I think it is really great with the product iconntechs</p>
	    	<div class="col-lg-3">
	    		<a href="<?php bloginfo('home');?>/index.php/my-account/">
	    			<div><i class="iconfont">&#xe63b;</i></div>
	    			<p>Personal</p>
	    		</a>
	    	</div>
	    	<div class="col-lg-3  activeDiv ">
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
	    	<div class="col-lg-3">
	    		<a href="<?php bloginfo('home');?>/index.php/reward/">
	    			<div><i class="iconfont">&#xe624;</i></div>
	    			<p>Rewards</p>
	    		</a>
	    	</div>
	    </div>
	    <div class="container container3">
	    	<p class="orderti"><a>order</a> &nbsp;>&nbsp;<a style="color: #FF5550;">Orders <?php echo $order_id;?> </a></p>
	    	<p class="huicolor">
	    		<label>Order</label>  <span>OrderStatus: <?php echo wc_get_order_status_name( $order->get_status() ); ?></span>
	    	</p>
	    	<p> Order ID: <?php echo $order_id;?> </p>
	    	<p> Order Date: <?php echo $order->order_date;?> </p>
	    	<p> Order Total:<?php echo sprintf( _n( '%s', '%s', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ); ?> </p>
	    	<P class="items"><label>Items</label></P>
	    	<p class="items1">Delivery method: By Amazon Shipping</p>
	    	

	    	<?php foreach ($orderdata as $kkv):?>
	    		<div class="product-Box">
		    		<div class="product-img">
		    			<img src="<?php echo $kkv['pimg'];?>" />
		    		</div>
		    		<div class="product-desc">
		    		  <p><?php echo $kkv['product_name'];?></p>
		    		 <!--  <p>Color : Black</p> -->
		    		  <p>Quantity : <?php echo $kkv['quantity'];?></p>
		    		</div>
		    		<div class="product-price">
		    			<p>$<?php echo !empty($kkv['sprice'])?$kkv['sprice']:$kkv['rprice'];?></p>
		    		</div>
	    	    </div>
		<?php endforeach;?>

	    	<P class="items">&nbsp;<label>Shipping Address</label></P>
	    	<p class="hui"><?php echo get_the_author_meta( 'billing_first_name', $user_ID ).' '.get_the_author_meta( 'billing_last_name', $user_ID );?></p>
	    	<p class="hui">Address : <?php echo get_the_author_meta( 'billing_country', $user_ID ).' '.get_the_author_meta( 'billing_city', $user_ID ).' '.get_the_author_meta( 'billing_state', $user_ID ).' '.get_the_author_meta( 'billing_address_1', $user_ID );?></p>
	    	<p class="hui">Phone number : <?php echo get_the_author_meta( 'billing_phone', $user_ID );?></p>
	    	<p class="hui">Zip code : <?php echo get_the_author_meta( 'billing_postcode', $user_ID );?></p>
	    	<hr />
	    	<div class="totalNum">
	    		<div class="totalLeft">
	    			<p class="hui">Subtotal : <?php echo sprintf( _n( '%s', '%s', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ); ?> </p>
	    			<p class="hui">Shipping : $0.00 </p>
	    			<p class="hui">Taxes : $0.00 </p>
	    			<!-- <P class="hui">Free Shipping : -$6.40</P> -->
	    			<p><strong>Total: <?php echo sprintf( _n( '%s', '%s', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ); ?></strong></p>
	    		</div>
	    		<div class="totalRight">
	    			<!-- <a class="abtn">COMPLETE PURCHASE</a><br/>
	    			<a class="abtn abtn1">CANCEL</a> -->
	    		</div>
	    	</div>
	    	
	    </div>
	    
	   
	   
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：foot
        -->

		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/jquery-1.11.0.js"></script>
		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/headImgUplad.js" ></script>
		<script>
			
				
			
		</script>
	</body>
</html>
