<?php
/*
	Template Name:My Order List
*/
$customer_orders = get_posts( apply_filters('woocommerce_my_account_my_orders_query', array(
	'numberposts' => $order_count,
	'meta_key'    => '_customer_user',
	'meta_value'  => get_current_user_id(),
	'post_type'   => wc_get_order_types( 'view-orders' ),
	'post_status' => array_keys( wc_get_order_statuses() )
) ) );
$p = 0;
$orderdata = "";
foreach($customer_orders as $customer_order){
	$order      = wc_get_order( $customer_order );
	$item_count = $order->get_item_count();//数量
	$order_id = $order->id;
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

}
//var_dump($orderdata);die;

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
		<?php get_template_part('head','shop');?>
	    
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
	    	<div class="col-lg-3   ">
	    		<a href="<?php bloginfo('home');?>/index.php/my-account/">
	    			<div><i class="iconfont">&#xe63b;</i></div>
	    			<p>Personal</p>
	    		</a>
	    	</div>
	    	<div class="col-lg-3  activeDiv">
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
	   
	   <?php if(!empty($customer_orders)):?>
	    <div class="container container4" >
	    	<!--
            	Awaiting Payment start
            -->

           <?php foreach ( $customer_orders as $customer_order ) :
				$order      = wc_get_order( $customer_order );
				$item_count = $order->get_item_count();
				?>
	    	<h4 style="background: #FF5550;color: #fff;"><?php echo wc_get_order_status_name( $order->get_status() ); ?></h4>
	    	<div class="productList">
	    		<?php $fi=0; foreach ($orderdata as $kv):?>
				<?php if($fi<$item_count):?>
	    		<?php $fi++;?>
	    		<div class="product-Box">
		    		<div class="product-img">
		    			<img src="<?php echo $kv['pimg'];?>" />
		    		</div>
		    		<div class="product-desc">
		    		  <p><?php echo $kv['product_name'];?></p>
		    		 <!--  <p>Color : Black</p> -->
		    		  <p>Quantity : <?php echo $kv['quantity'];?></p>
		    		</div>
		    		<div class="product-price">
		    			<p>$<?php echo !empty($kv['sprice'])?$kv['sprice']:$kv['rprice'];?></p>
		    		</div>
	    	    </div>
	    		<?php endif;?>
				<?php endforeach;?>
		    	<hr />
		    	<div class="totalNum">
		    		<div class="totalLeft">
		    			<p class="hui">Order ID : <?php echo $order_id;?> </p>
		    			<p class="hui">Order Date :<?php echo $order->order_date;?></p>
		    			<p class="hui">Order Total : <?php echo sprintf( _n( '%s', '%s', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ); ?> </p>
		    			
		    		</div>
		    		<div class="totalRight">
		    			<a href="<?php echo esc_url( $order->get_view_order_url() ); ?>" class="abtn">View Details</a><br/>
		    		</div>
		    	</div>
	    	</div>

	    	<?php endforeach; ?>
	    	<!--
            	Awaiting Payment end
            -->
	    	<!--
            	Cancelled Order start
            -->

	    	
	    </div>
	<?php else:?>
	    <div class="container container7" >
	    	<p>No order</p>
	    	<p><a href="wp_redirect( site_url('/index.php/shop/'));">Shop now</a></p>
	    </div>
	<?php endif;?>
	   
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：foot
        -->
		<?php get_template_part('foot','shop');?>

		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/headImgUplad.js" ></script>
		<script>
			
		</script>
		
	</body>
</html>
