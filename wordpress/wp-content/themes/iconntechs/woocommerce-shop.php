<?php 


$car = WC()->cart->get_cart();
foreach ( $car as $cart_item_key => $cart_item ) {
		//var_dump($cart_item['data']->post->post_date);
	}

/*获取产品各种属性*/
$data = $wpdb->get_results( "select * from wp_postmeta where post_id=42 ",ARRAY_A );
foreach ($data as $key) {
	if($key['meta_key']=='_regular_price'){
		$price = $key['meta_value'];
		
	}
}


//var_dump($info);die;
/*获取产品图*/
$data = $wpdb->get_results( "select guid from wp_posts where post_parent=42",ARRAY_A );
$thumbnail = $data[0]['guid'];

$data = get_post(42,ARRAY_A);
$data['thumbnail'] = $thumbnail;
$data['price'] = $price;

/*获取首页四个产品*/
/*$finfo_id = $wpdb->get_results("select m.object_id from wp_terms t  left join wp_term_relationships m on t.term_id=m.term_taxonomy_id where t.name='camera'",ARRAY_A );*/

/*$fdata = get_posts(array(
	'post_type'=>'product',
	'order'=>ASC
	),ARRAY_A);

$arr = '';
$i = 0;
foreach ($fdata as $post) {
	$id = $post->ID;

	if($id!=42){
		$link = get_permalink();
		$arr[$i]['thumbnail'] =  the_post_thumbnail();
		$arr[$i]['id'] = $id;
		$arr[$i]['name'] = get_the_title();
		$mdata = $wpdb->get_results( "select * from wp_postmeta where post_id=$id ",ARRAY_A );
		foreach ($mdata as $key) {
			if($key['meta_key']=='_regular_price'){
				$arr[$i]['price'] = $key['meta_value'];
			
			}
		}
		
		
		
	}
	$i++;	
}*/


	/*$posts = get_posts('numberposts=4&orderby=post_date&post_type=product');

	foreach($posts as $post) {
	                   // setup_postdata($post);
	                    the_post_thumbnail('large');
	                    echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
	                }*/
	//var_dump($arr);die;
$carnum = WC()->cart->get_cart();
$carnum = count($carnum);

?>

<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>home</title>

		<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/index.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-74879058-2', 'auto');
	  ga('send', 'pageview');
	</script>
	</head>

	<body>
		
		<div class="container-fluid" id="navMenu">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
				      </button>
							<a class="navbar-brand" href="#"><img src="<?php bloginfo('template_url');?>/img/logo.png" class="img-responsive"></a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav  navbar-right">
								<li class=""><a href="<?php echo home_url();?>/index.php/product-list/">Products<span class="sr-only">(current)</span></a></li>
								<li><a href="<?php echo get_option('home');?>">Blog</a></li>
								<li><a href="<?php echo get_option('home');?>/index.php/return-goods/">Support</a></li>
								<li><a href="<?php echo home_url();?>/index.php/contact-us/">Contact us</a></li>
								<li class="dropdown">
									<a href="<?php bloginfo('home');?>/index.php/my-account/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img id="headPic" src="<?php bloginfo('template_url');?>/img/flag.png" /></a>
									<ul class="dropdown-menu">
										<li><a href="<?php bloginfo('home');?>/index.php/my-account/">Personal</a></li>
										<li><a href="<?php bloginfo('home');?>/index.php/my-order-list/">Order </a></li>
										<li><a href="<?php bloginfo('home');?>/index.php/my-account/edit-address/edit/">Address </a></li>
										<li><a href="<?php bloginfo('home');?>/index.php/reward/">Reward </a></li>
										<li><a href="<?php bloginfo('home');?>/index.php/my-account/customer-logout">Logout </a></li>
									</ul>
									<li><a href="<?php echo home_url();?>/index.php/shop-cart/"><i class="iconfont">&#xe611;</i> <span><?php echo $carnum;?></span></a></li>
								</li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</div>
					<!-- /.container-fluid -->
				</nav>
			</div>
		</div>
		<div class="container-fluid">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					<li data-target="#carousel-example-generic" data-slide-to="3"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="<?php bloginfo('template_url');?>/img/carousel1.png" alt="carousel" class="imgh">
						<div class="carousel-caption">
							<h1 class="whiteBorder1">
			             	ICONNETCHS
			             </h1>
							<h3>Products as Resilient as You Are</h3>
							<p class="bottomWord">ENRICH YOUR EXPERIENCES</p>
						</div>
					</div>
					<div class="item">
						<img src="<?php bloginfo('template_url');?>/img/carousel2.png" alt="carousel2" class="imgh">
						<div class="carousel-caption">
							<h1 class="whiteBorder1">
			             	ICONNETCHS
			        </h1>
							<h3>Products as Resilient as You Are</h3>
							<p class="bottomWord">ENRICH YOUR EXPERIENCES</p>

						</div>
					</div>
					<div class="item">
						<img src="<?php bloginfo('template_url');?>/img/carousel3.png" alt="carousel3" class="imgh">
						<div class="carousel-caption">
							<h1 class="whiteBorder1">
			             	ICONNETCHS
			             </h1>
							<h3>Products as Resilient as You Are</h3>
							<p class="bottomWord">ENRICH YOUR EXPERIENCES</p>
						</div>
					</div>
					<div class="item">
						<img src="<?php bloginfo('template_url');?>/img/carousel4.png" alt="carousel4" class="imgh">
						<div class="carousel-caption">
							<h1 class="whiteBorder1">
			             	ICONNETCHS
			             </h1>
							<h3>Products as Resilient as You Are</h3>
								<p class="bottomWord">ENRICH YOUR EXPERIENCES</p>
						</div>
					</div>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<i class="iconfont fanyeleft" aria-hidden="true">&#xe60e;</i>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<i class="iconfont fanyeleft" aria-hidden="true">&#xe60d;</i>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<section id="section1">
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<h2 class="whiteBorder2">
			   	         	NEW RELEASES
			   	         </h2>
				</div>
			</div>
			<div class="container">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<label class="labBtn">$<?php echo $data['price'];?></label>

				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

					<img src="<?php echo $data['thumbnail'];?>" class="img-responsive" />
					<p class="product-title"><?php echo $data['post_title'];?></p>

				</div>
				<div class="col-lg-3  col-md-3 col-sm-3 col-xs-12 offset">
					<label class="labBtn"><a href="<?php echo $data['guid'];?> ">BUY</a></label>
				</div>
			</div>
		</section>
		<section id="section2">
			<div class="container-fluid">

<?php 

$fdata = get_posts(array(
	'post_type'=>'product',
	'order'=>ASC
	),ARRAY_A);

	$arr = '';
	$i = 0;
	foreach ($fdata as $post) {
		$id = $post->ID;
		if($id!=42){ ?>

		 <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
					<div class="product-Box">
						<br /> <br />
						<a href="<?php echo get_permalink();?>" class="imgBox">
							<img src="<?php echo $ppimg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>" class="img-responsive center-block" />


						</a>
						<a>
							<p><?php echo get_the_title();?></p>
						</a>
						<label class="mark1"><i class="iconfont">&#xe602;</i></label>
					</div>
					<div class="user-operation">
			<label>$<?php $mdata = $wpdb->get_results( "select * from wp_postmeta where post_id=$id ",ARRAY_A );
			foreach ($mdata as $key) {
				if($key['meta_key']=='_regular_price'){
					echo $key['meta_value'];
			
				}
		}?></label>
		<a href="<?php echo get_permalink();?>">
			<i class="iconfont">&#xe640;</i>
		</a> 
		<a rel="nofollow"  href="<?php bloginfo('home');?>/index.php/shop?add-to-cart=<?php echo $id;?>"   class="cart">
			
			<i class="iconfont">&#xe606;</i>
			<i class="iconfont true">&#xe6a2;</i>
		</a>
					</div>
		</div>
					
	<?php } }?>
				
			</div>
		</section>
		<!--
        	作者：1164365204@qq.com
        	时间：2016-04-22
        	描述：尾部
        -->
		<footer>
			<div class="container">
				<ul class="col-lg-3">
					<li><a href="#">Our Comepany</a></li>
					<li><a href="#">Press Center</a></li>
					<li><a href="#">Contact Iconnetchs</a></li>
					<li><a href="#">Wholesale</a></li>
					<li><a href="#">PowerIQ </a></li>
					<li><a href="#">WEEE inforn ation</a></li>
				</ul>

				<ul class="col-lg-3">
					<li><a href="#">Drivers downloads</a></li>
					<li><a href="#">Refund Exchange</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="#">Warranly</a></li>
					<li><a href="#">Terms of Ues </a></li>
				</ul>
				<ul class="col-lg-3">
					<li><a href="#">Subscribe</a></li>
					<li><a href="#">Be the first to knows about our latest products</a></li>
					<input type="text" placeholder="Enter your email address" /><br />
					<input type="submit" value="SUBMIT" />
					<p class="social-contact">
						<a href="#"><i class="iconfont">&#xe63f;</i></a>
						<a href="#"><i class="iconfont">&#xe608;</i></a>
						<a href="#"><i class="iconfont">&#xe60c;</i></a>
						<a href="#"><i class="iconfont">&#xe622;</i></a>
						<a href="#"><i class="iconfont">&#xe629;</i></a>
					</p>
				</ul>
				<ul class="col-lg-3">
					<li><a href="#">Our Comepany</a></li>
					<li><a href="#">Press Center</a></li>
					<li><a href="#">Contact Iconnetchs</a></li>
					<li><a href="#">Wholesale</a></li>
					<li><a href="#">PowerIQ </a></li>
					<li><a href="#">WEEE inforn ation</a></li>
				</ul>

			</div>
			<div class="container">
				<hr />
				<div class="col-lg-6 col-md-6 col-sm-12">Copyright     2016 ICONNTECHS Technology Co.Limited</div>
				<div class="col-lg-6 col-md-6 col-sm-12"><a class="text-right"><img src="<?php bloginfo('template_url');?>/img/flag.png" class="img-responsive" />china shenzhen</a></div>
				
			</div><br />
			<div class="container">
				<div class="col-lg-12 text-center"><img  src="<?php bloginfo('template_url');?>/img/logo.png"/></div>
			</div>

		</footer>

		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/jquery-1.11.0.js"></script>

		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
		<script>
		    window.onload=function(){
		   
		    	if(window.innerWidth>=1350){
		    		ScreenCover();
		    	}

		    	$(".cart").click(function(){
		    		var index =$(this)
		    		index.find(".true").css("display","inline-block");
		    		setTimeout(function(){
		    			
		    			index.find(".true").css("display","none");
		    		},3000);
		    	});
		    }
		  
		    window.onresize=function(){
		    	if(window.innerWidth>=1350){
		    		ScreenCover();
		    	}else{
			    	document.getElementById("carousel-example-generic").style.width="100%";
			    	document.getElementById("carousel-example-generic").style.height="inherit";
				    var names =document.getElementsByClassName("imgh");
				    for (var i=0;i<names.length;i++) {
				    	  names[i].style.width="100%";
				    	  names[i].style.height="inherit";
				    }
			    }
		    }
		    
		    function ScreenCover(){
		    	 document.getElementById("carousel-example-generic").style.height=window.innerHeight+"px";
		    	 document.getElementById("carousel-example-generic").style.width=(window.innerWidth-17)+"px";
			     var names =document.getElementsByClassName("imgh");
			     for (var i=0;i<names.length;i++) {
			    	 names[i].style.height=window.innerHeight+"px";
			    	  names[i].style.width=(window.innerWidth-17)+"px";
			     }
		    }
		</script>

	</body>

</html>