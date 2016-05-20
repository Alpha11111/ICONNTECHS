<?php 



if(is_shop()){
	get_template_part('woocommerce', 'shop' );
	die;
}

/*获取产品名称*/
/*$current_url = home_url(add_query_arg(array()));
$start = strpos($current_url,"product");
$name = substr($current_url,$start);
$name = str_replace('/', '', (str_replace('product', '', $name)));

if($name=='list'){
	
	get_template_part('product', 'list' );
	die;
}*/

/*$info = $wpdb->get_results(" select * from wp_posts where post_name='$name' ",ARRAY_A);
$post_id = $info[0]['ID'];*/
global $post, $woocommerce, $product;



//获取底部相关产品
$post_id = $post->ID;
$post_parent = $post->post_parent;

$redata = $wpdb->get_results("select post_excerpt,post_title,id,guid from wp_posts where post_parent=$post_parent and post_type='product' and post_status='publish' limit 5",ARRAY_A );
$rek = 0;

foreach ($redata as $key) {
	$pimg = wp_get_attachment_url( get_post_thumbnail_id($key['id']) );
	//$pimg = str_replace('.', '-300x300.', $pimg);
	$redata[$rek]['pimg'] = $pimg;
	$rek++;
}

//分页获取产品评论
$page = !empty($_POST['page'])?$_POST['page']:1;
$pagelimit = 5;
$startpage = ($page-1)*$pagelimit;
$total = $wpdb->get_results("select count(*) as total from wp_comments where comment_post_ID=1");
$totalitem = $total[0]->total;
$totalpage = ceil($total[0]->total/$pagelimit);
$comdata = $wpdb->get_results("select * from wp_comments where comment_post_ID=1 limit $startpage,$pagelimit",ARRAY_A);


//获取产品一些属性
$data = $wpdb->get_results( "select * from wp_postmeta where post_id=$post_id ",ARRAY_A );
foreach ($data as $key) {
	if($key['meta_key']=='_sale_price'){
		$sprice = $key['meta_value'];
		
	}
	if($key['meta_key']=='_regular_price'){
		$rprice = $key['meta_value'];
		
	}
	if($key['meta_key']=='_product_image_gallery'){
		$photo_str = $key['meta_value'];
	}
}

/*获取产品相册*/
$info = "";

if(!empty($photo_str)){
	$info = $wpdb->get_results("select guid from wp_posts where id in ($photo_str)",ARRAY_A);

	$kk = 0;
	$gallery = array();
	foreach ($info as $ky) {
		$info[$kk]['thumbnail'] = str_replace('.', '-82x82.', $ky['guid']);
		$kk++;
	}

}
//var_dump($info);die;
/*获取产品图*/
$data = $wpdb->get_results( "select guid from wp_posts where post_parent=$post_id",ARRAY_A );
$thumbnail = $data[0]['guid'];


$data = get_post($post_id,ARRAY_A);
$data['thumbnail'] = $thumbnail;//产品图
if(!empty($sprice)){
	$data['price'] = $sprice;//产品价格
}else{
	$data['price'] = $rprice;//产品价格
}


if(!empty($_POST['pnum'])){
	$pnum = $_POST['pnum'];
	//var_dump(site_url());die;
	 //add_to_cart( $product_id = 0, $quantity = 1, $variation_id = 0, $variation = array(), $cart_item_data = array() )
	WC()->cart->add_to_cart($post_id,$pnum);
}


?>

<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>goodsInfo</title>

		<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/goodsInfo.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	</head>

	<body data-spy="scroll"  data-target="#navbar-example">
		
			<?php get_template_part('head','shop');?>
			<section>
				<div class="container con1">
					<p class="la">
						<a href="<?php bloginfo('home');?>/index.php/shop/">home</a>
						&nbsp;/&nbsp;<a href="<?php bloginfo('home');?>/index.php/product-list/">Products</a><!-- &nbsp;/&nbsp;
						<a href="<?php bloginfo('home');?>/index.php/product-list/">Audio</a> -->&nbsp;/&nbsp;
						<a><?php echo $product;?></a>
					</p>
				<div class="goodsInfoleft" >
					<div id="mainImg" > 

						<img src="<?php echo $pimg = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>" alt="good" class="img-responsive"/>
					</div>
					<?php if(!empty($info)):?>
					<div id="pic_list_2" class="scroll_horizontal">
					    <div class="box">
						<ul class="list">
						<?php foreach($info as $gk):?>
							<li><a href="#"><img src="<?php echo $gk['thumbnail'];?>"  alt="<?php echo $gk['guid'];?>"></a></li>
						<?php endforeach;?>
						
						</ul>
					    </div>
					</div>
					<?php endif;?>

				</div>
				<div class="goodsInfoRight">
					<p class="main-title"><?php echo $product;?></p>
					<p class="evaluate">
						<i class="iconfont">&#xe613;</i>
						<i class="iconfont">&#xe613;</i>
						<i class="iconfont">&#xe613;</i>
						<i class="iconfont">&#xe613;</i>
						<i class="iconfont">&#xe613;</i>
						<span><?php echo $totalitem;?> Reviews</span>
					</p>
					<p class="desc1"><?php echo $post->post_excerpt;?></p>
					<p class="price">$<?php echo $data['price'];?></p>

					<!-- <p class="boldFont">Color</p>
					<div class="chooseColor">
						<span style="background:#ff5550 ;"></span>&nbsp;&nbsp;
						<span style="background:#ffc350 ;"></span>&nbsp;&nbsp;
						<span style="background:#67c339 ;"></span>&nbsp;&nbsp;
						<span style="background:#3ecbc4 ;"></span>&nbsp;&nbsp;
						<span style="background:#4777ff ;"></span>&nbsp;&nbsp;
						<span style="background:#c774fc ;"></span>&nbsp;&nbsp;
					</div> -->

					<p class="boldFont">Quantity</p>
					<form id="ppform" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
					<div>
						 <label class="clickBtn " id="reduce">-</label><input type="button" name="ppnum" id="ppnum" value="1" readonly="readonly"/><label class="clickBtn" id="add">+</label>
					</div>
					<div>
						<input type="hidden" name="pnum" id="pnum">
						<a class="addCart1 cart" onclick="checknum()">ADD TO CART</a>
						<!-- <a class="addCart1 amazon">BUY AT AMAZON US</a> -->
						<script>
							function checknum(){
							$zhi = $('#ppnum').val();
							$('#pnum').val($zhi);
							$('#ppform').submit();
							}
						</script>
					</div>
					</form>
					<div class="product-rule">
						
						<!-- <p>Bluetooth Version :4.0</p>
						<p>Driver output :3W×2 Playt</p>
						<p>Playtime :Estimated 24+hrs @80% volume</p>
						<p>Battery Capacity :4400mAh</p>
						<p>Input :5V / 1A</p>
						<p>Charging time :5 hours</p>
						<p>Bass Boost :Passive radiator</p>
						<p>Handsfree function :Y</p>
						<p>Volume/Track control :Y</p> -->
					</div>
					<div >

						<label class="social">
						<a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php the_permalink();?>">
							<img src="<?php bloginfo('template_url');?>/img/facebook4.png" style="width: 20px ;height: 20px;"/>
						</a>
						<a href="https://twitter.com/intent/tweet?url=<?php the_permalink();?>"  target="_blank">
							<img src="<?php bloginfo('template_url');?>/img/twitter2.png" style="width: 20px ;height: 20px;"/>
						</a>
						<!-- <a href="#"><img src="<?php bloginfo('template_url');?>/img/instagram2.png" style="width: 20px ;height: 20px;"/></a>
						<a href="#"><img src="<?php bloginfo('template_url');?>/img/youtube2.png" style="width: 20px ;height: 20px;"/></a>
						<a href="#"><img src="<?php bloginfo('template_url');?>/img/google2.png" style="width: 20px ;height: 20px;"/></a> -->
						</label>
					</div>
					
					
				</div>
			</div>
			</section>
			<section id="section2">
                   <div class="container con2">
                   	   <div class="tabchoose">
                   	    <div class="middle " id="navbar-example"><a href="#Highlights" class="active2">Highlights</a> 	<a href="#Reviews">Reviews</a> 	<a href="#Related">Related</a> </div> 	
                   	   </div>
                   	   <br />
                   	   <div class="goodsInfoPic" id="Highlights">
								<?php echo $post->post_content;?>
                   	   	  
                   	   </div>
                   </div>
				
		
			
			</section>
			<!--
            	作者：1164365204@qq.com
            	时间：2016-04-28
            	描述：评论展示
            -->
			<section>
				<?php if(!empty($comdata)):?>
				<div class="container container7" id="Reviews">
					<h1>Reviews</h1>
					<div class="col-lg-12 ">

					<?php foreach($comdata as $comkey):?>	
					  <div class="ReviewsBox">
								<div class="ReviewPersonInfo">
									<div>
										<img src="<?php bloginfo('template_url');?>/img/headImg1.png"  />
									</div>
									<div>
										<p><label><?php echo get_the_author_meta('user_nicename',$comkey['user_id']);?></label>&nbsp;&nbsp;&nbsp; <span>Verified Buyer </span></p>
										<!-- <p>
											<i class="iconfont">&#xe613;</i>
											<i class="iconfont">&#xe613;</i>
											<i class="iconfont">&#xe613;</i>
											<i class="iconfont">&#xe613;</i>
											<i class="iconfont">&#xe613;</i>
										</p> -->
										<p class="ptime"><?php echo $comkey['comment_date'];?></p>
										
									</div>
								</div>
								<div>
									<!-- <p>Second Fugoo Purchase</p> -->
									<p><?php echo $comkey['comment_content'];?></p>
								</div>			
						</div>
					<?php endforeach;?>
					
						<ul id="Page">
							<li id="prevPage"><i class="iconfont">&#xe60e;</i></li>
							
							<form id="comform" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
							<?php if($page>1):?>
							<li><a onclick="tijiao(<?php echo 1;?>)" href="javascript:;" >1</a></li>
							<?php endif;?>

							<li><a onclick="tijiao(<?php echo $page;?>)" href="javascript:;" class="active1" ><?php echo $page?></a></li>
							
							<?php if($page+1<$totalpage):?>
							<li><a onclick="tijiao(<?php echo $page+1;?>)" href="javascript:;"><?php echo $page+1;?></a></li>
							<?php endif;?>

							<?php if($page+2<$totalpage):?>
							<li><a onclick="tijiao(<?php echo $page+2;?>)" href="javascript:;"><?php echo $page+2;?></a></li>
							<?php endif;?>
								
							<?php if($page<$totalpage):?>
							<li><a onclick="tijiao(<?php echo $totalpage;?>)" href="javascript:;"><?php echo $totalpage;?></a></li>
							<?php endif;?>

							<input type="hidden" id="page" name="page" value="">
							</form>
							
							<script>
								function tijiao(page){
									$('#page').val(page);
									$('#comform').submit();
								}

							</script>
	
							<li id="nextPage"><i class="iconfont">&#xe60d;</i></li>
						</ul>
					</div>
				</div>
				<?php endif;?>

				<div class="container container8" id="Related">
					  <h1>Related</h1>
					  <p class="yu">Customers Who Bought This Item Also Bought</p>
					  
					  <div id="pic_list_1" class="scroll_horizontal">
						<div class="box">
							<ul class="list">
								
								<?php foreach($redata as $rkey):?>
								<li><a href="<?php echo $rkey['guid'];?>"><img src="<?php echo $rkey['pimg'];?>" class="img-responsive"></a>
									<div>
										<p class="ptitle"><a href="<?php echo $rkey['guid'];?>"><?php echo $rkey['post_title'];?></a></p>
										<p><?php echo $rkey['post_excerpt'];?></p>
									</div>
								</li>
								<?php endforeach;?>
								

							</ul>
						</div>
	                </div>

				</div>
			</section>
			<div id="top"> <i class="iconfont">&#xe64a;</i></div>
			
	
		<!--
        	作者：1164365204@qq.com
        	时间：2016-04-22
        	描述：尾部
        -->
		<?php get_template_part('foot','shop');?>

		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/jquery-1.11.0.js"></script>

		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.cxscroll.js" ></script>
		
		<script>
			$(function(){
				$("#pic_list_2").cxScroll();
				$("#pic_list_1").cxScroll();
				
				
			  $("#top").hide();
			   	  window.onscroll =function(){
						var scrollTop=document.body.scrollTop||document.documentElement.scrollTop;  
						 if(scrollTop>600){
						 
						 	$("#top").show();
						 	if(scrollTop>790){
						 		$(".tabchoose").addClass("tabchooseFixed");
						 	}
						 	
						 }
						 if(scrollTop<790){
						 		$(".tabchoose").removeClass("tabchooseFixed");
						 }
						 if(scrollTop<600){
						 	$("#top").hide();
						 }
					}
			   	  
			$("#pic_list_2 img").click(function(){
				
				var url = $(this).attr("alt");
				$("#mainImg img").attr("src",url);
			});
			//数量减少
			$("#reduce").click(function(){
			  var num = parseInt($("input[type=button]").val());
			   num--;
			   if(num<=1){
			   	 $("input[type=button]").val(1);
			   	 return;
			   	  
			   }
			   $("input[type=button]").val(num);
			});
			//数量增加
			$("#add").click(function(){
				 var num = parseInt($("input[type=button]").val());
				num++;
				 $("input[type=button]").val(num);
			});
			   	         
	        //返回顶部
	     	$("#top").click(function(){
				$('body,html').animate({scrollTop:0},1000);
				return false;
			}); 
				$("#Page li a").click(function(){
				
			       $("#Page li a").removeClass("active1");
			  	   $(this).addClass("active1");
		        });
		        
		       $("#prevPage").click(function(){
		       	  var index = parseInt($("#Page li .active1").text()) ;
		       	  if(index==1){
		       	  	retrun;
		       	  }
		       	  $("#Page li a").removeClass("active1");
		       	  $("#Page li a:eq("+(index-2)+")").addClass("active1");
		       	  
		       });
		       
		       $("#nextPage").click(function(){
		       	  var index = parseInt($("#Page li .active1").text()) ;
		       	  //获取最后一个元素
		       	  var lastIndex = parseInt($("#Page li a").last().text());
		       	  if(index==lastIndex){
		       	  	retrun;
		       	  }
		       	    
		       	  $("#Page li a").removeClass("active1");
		       	  $("#Page li a:eq("+(index)+")").addClass("active1");
		       	  
		       });
			});
			
			$(function(){
				window.onresize=function(){
				
				};
			});
		  
		</script>

	</body>

</html>