<?php 

/* 
Template Name: product-list
*/  


 $data = get_posts(array(
 	'product_cat'=>'camera',
 	'post_type'=>'product',
 	'showposts'=>4,
 	'order'=>DESC
 	),ARRAY_A);
$chtml = "";
foreach ($data as $post) {
		$id = $post->ID;
		$mdata = $wpdb->get_results( "select * from wp_postmeta where post_id=$id ",ARRAY_A );
			foreach ($mdata as $key) {
				if($key['meta_key']=='_regular_price'){
					$price = $key['meta_value'];
			
				}
			}

		$chtml .= "<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
					<div class='goods-Box'>
						<div >
						<img src='".wp_get_attachment_url( get_post_thumbnail_id($id) )."' alt='img1'  class='img-responsive center-block'/>
							
						</div>
						<p><a href='".$post->guid."'>".get_the_title()."</a>　</p>
					</div>
					<div class='otherBox'>
						<p><a  href='".$post->guid."' class='btn1'>learn more</a><a onclick='_gaq.push(['_trackEvent', 'add_to_cart','insert']);' class='btn2' href='". site_url()."/index.php/product-list/?add-to-cart=". $id."'>ADD TO CART</a></p>
					</div>
				</div>";
	}


 $data = get_posts(array(
 	'product_cat'=>'sound',
 	'post_type'=>'product',
 	'showposts'=>4,
 	'order'=>DESC
 	),ARRAY_A);
$shtml = "";
foreach ($data as $post) {
		$id = $post->ID;
		$mdata = $wpdb->get_results( "select * from wp_postmeta where post_id=$id ",ARRAY_A );
			foreach ($mdata as $key) {
				if($key['meta_key']=='_regular_price'){
					$price = $key['meta_value'];
			
				}
			}

		$shtml .= "<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
					<div class='goods-Box'>
						<div >
						<img src='".wp_get_attachment_url( get_post_thumbnail_id($id) )."' alt='img1'  class='img-responsive center-block'/>
							
						</div>
						<p><a href='".$post->guid."'>".get_the_title()."</a>　</p>
					</div>
					<div class='otherBox'>
						<p><a  href='".$post->guid."' class='btn1'>learn more</a><a onclick='_gaq.push(['_trackEvent', 'add_to_cart','insert']);' class='btn2' href='". site_url()."/index.php/product-list/?add-to-cart=". $id."'>ADD TO CART</a></p>
					</div>
				</div>";
	}

	$data = get_posts(array(
 	'product_cat'=>'headset',
 	'post_type'=>'product',
 	'showposts'=>4,
 	'order'=>DESC
 	),ARRAY_A);
$hhtml = "";
foreach ($data as $post) {
		$id = $post->ID;
		$mdata = $wpdb->get_results( "select * from wp_postmeta where post_id=$id ",ARRAY_A );
			foreach ($mdata as $key) {
				if($key['meta_key']=='_regular_price'){
					$price = $key['meta_value'];
			
				}
			}

		$hhtml .= "<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
					<div class='goods-Box'>
						<div >
						<img src='".wp_get_attachment_url( get_post_thumbnail_id($id) )."' alt='img1'  class='img-responsive center-block'/>
							
						</div>
						<p><a href='".$post->guid."'>".get_the_title()."</a>　</p>
					</div>
					<div class='otherBox'>
						<p><a  href='".$post->guid."' class='btn1'>learn more</a><a onclick='_gaq.push(['_trackEvent', 'add_to_cart','insert']);' class='btn2' href='". site_url()."/index.php/product-list/?add-to-cart=". $id."'>ADD TO CART</a></p>
					</div>
				</div>";
	}



	$data = get_posts(array(
 	'product_cat'=>'charger',
 	'post_type'=>'product',
 	'showposts'=>4,
 	'order'=>DESC
 	),ARRAY_A);
$cahtml = "";
foreach ($data as $post) {
		$id = $post->ID;
		$mdata = $wpdb->get_results( "select * from wp_postmeta where post_id=$id ",ARRAY_A );
			foreach ($mdata as $key) {
				if($key['meta_key']=='_regular_price'){
					$price = $key['meta_value'];
			
				}
			}

		$cahtml .= "<div class='col-lg-3 col-md-3 col-sm-6 col-xs-12'>
					<div class='goods-Box'>
						<div >
						<img src='".wp_get_attachment_url( get_post_thumbnail_id($id) )."' alt='img1'  class='img-responsive center-block'/>
							
						</div>
						<p><a href='".$post->guid."'>".get_the_title()."</a>　</p>
					</div>
					<div class='otherBox'>
						<p><a  href='".$post->guid."' class='btn1'>learn more</a><a onclick='_gaq.push(['_trackEvent', 'add_to_cart','insert']);' class='btn2' href='". site_url()."/index.php/product-list/?add-to-cart=". $id."'>ADD TO CART</a></p>
					</div>
				</div>";
	}


?>
<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>product-list</title>

		<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/product.css" />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
		
	</head>

	<body>
	<?php get_template_part('head','shop');?>
	<div class="container-fluid carousel">
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
						<img src="<?php bloginfo('template_url');?>/img/carousel2_2.png" alt="carousel" class="imgh">
						<div class="carousel-caption">
						<div id="buy">
					<a>BUY</a>
				</div>
						</div>
					</div>
					<div class="item">
						<img src="<?php bloginfo('template_url');?>/img/carousel3_3.png" alt="carousel2" class="imgh">
						<div class="carousel-caption">
							<div id="buy">
					<a>BUY</a>
				</div>

						</div>
					</div>
					<div class="item">
						<img src="<?php bloginfo('template_url');?>/img/carousel4_4.png" alt="carousel3" class="imgh">
						<div class="carousel-caption">
							<div id="buy">
					<a>BUY</a>
				</div>
						</div>
					</div>
					<div class="item">
						<img src="<?php bloginfo('template_url');?>/img/carousel3_3.png" alt="carousel4" class="imgh">
						<div class="carousel-caption">
							<div id="buy">
					<a>BUY</a>
				</div>
						</div>
					</div>
				</div>
				<!-- Controls -->
			</div>
		</div>
		<section id="section1">
			<div class="container-fluid">

				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="iconBack">
						<i class="iconfont">&#xe627;</i>
					</div>
					<p class="typeId">CAMERA</p>
					<p class="borderColor"></p>
					<p class="sanjiao"><i class="iconfont">&#xe641;</i></p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> 
					<div class="iconBack">
						<i class="iconfont">&#xe633;</i>
					</div>
					<p class="typeId">SOUND</p>
					<p class="sanjiao"><i class="iconfont">&#xe641;</i></p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="iconBack">
						<i class="iconfont">&#xe616;</i>
					</div>
					<p class="typeId">HEADSET</p>
					<p class="sanjiao"><i class="iconfont">&#xe641;</i></p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="iconBack">
						<i class="iconfont">&#xe610;</i>
					</div>
					<p class="typeId">CHARGER</p>
					<p class="sanjiao"><i class="iconfont">&#xe641;</i></p>
				</div>
				
			</div>
			
		</section>
		<section id="section2">
			
			<div class="container-fluid goodsBox" id="camera" style="display:block">			
			<?php echo $chtml;?>				
			</div>

			<div class="container-fluid goodsBox" id="sound" style="display:none">			
			<?php echo $shtml;?>				
			</div>

			<div class="container-fluid goodsBox" id="headset" style="display:none">			
			<?php echo $hhtml;?>				
			</div>

			<div class="container-fluid goodsBox" id="charger" style="display:none">			
			<?php echo $cahtml;?>				
			</div>

			<!-- <div class="container-fluid more">
			      <a>more</a>
			</div> -->
		</section>

        <div id="top"> <i class="iconfont">&#xe64a;</i></div>
      
        
	
		<!--
        	作者：1164365204@qq.com
        	时间：2016-04-22
        	描述：尾部
        -->
		<?php get_template_part('foot','shop');?>
		
		<script>
		  window.onload=function(){
		   
		    	if(window.innerWidth>=1350){
		    		ScreenCover();
		    	}
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
		    	 document.getElementById("carousel-example-generic").style.height=(window.innerHeight-50)+"px";
		    	 document.getElementById("carousel-example-generic").style.width=(window.innerWidth-17)+"px";
			     var names =document.getElementsByClassName("imgh");
			     for (var i=0;i<names.length;i++) {
			    	 names[i].style.height=(window.innerHeight-50)+"px";
			    	  names[i].style.width=(window.innerWidth-17)+"px";
			     }
		    }
		   $(function(){
		   	
		   	
		   	$("#section1 .col-lg-3").click(function(){
		   		$("#section1 .col-lg-3").css({"border-bottom":"0px solid #FF5550"});
		   		$("#section1 .col-lg-3").find(".sanjiao").css("display","none");
		   		$(this).css({"border-bottom":"3px solid #FF5550","border-width":"4px","transition":"width 0.2s ease 0s"});
		   		$(this).find(".sanjiao").css("display","block");
		   		$(this).find(".typeId").text();
		   		$name = $(this).find(".typeId").text();
		   	
		   		if($name=='CAMERA'){
		   			$('#camera').attr('style','display:block');
					$('#sound').attr('style','display:none');
					$('#headset').attr('style','display:none');
					$('#charger').attr('style','display:none');
		   		}else if($name=='SOUND'){	   			
		   			$('#camera').attr('style','display:none');
					$('#sound').attr('style','display:block');
					$('#headset').attr('style','display:none');
					$('#charger').attr('style','display:none');
		   		}else if($name=='HEADSET'){
		   			$('#camera').attr('style','display:none');
					$('#sound').attr('style','display:none');
					$('#headset').attr('style','display:block');
					$('#charger').attr('style','display:none');
		   		}else if($name=='CHARGER'){
		   			$('#camera').attr('style','display:none');
					$('#sound').attr('style','display:none');
					$('#headset').attr('style','display:none');
					$('#charger').attr('style','display:block');
		   		}else{

		   		}
		   		

		   	});


		   	
		   	$("#top").hide();
		   	  window.onscroll =function(){
					var scrollTop=document.body.scrollTop||document.documentElement.scrollTop;  
					 if(scrollTop>600){
					 	$("#top").show();
					 }
					 if(scrollTop<600){
					 	$("#top").hide();
					 }
				}
		   });
		        
	        //返回顶部
	     	$("#top").click(function(){
				$('body,html').animate({scrollTop:0},1000);
				return false;
			}); 
				
		</script>

	</body>

</html>
