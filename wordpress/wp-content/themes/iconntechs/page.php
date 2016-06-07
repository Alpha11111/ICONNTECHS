<?php 

/*$mdata = $wpdb->get_results("select * from wp_usermeta where user_id=5",ARRAY_A );*/

/*var_dump(is_page('My Accoun'));die;*/
$show = 0;
if(is_checkout() || is_page('My Account')){
	$show = 1;
}
if(is_page('My Account') and !$user_ID){
	$aurl = get_permalink();
	wp_redirect( site_url("/wp-login.php?redirect_to=$aurl"));
	//header("Location:".bloginfo('home')."/wp-login.php?redirect_to=$aurl");die;
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
		
		<?php if($show==0){wp_head();} ?>		
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<?php if($show==0):?>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/blog.css" />
		<?php endif;?>
		<?php if(is_page('My Account')):?>
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/address.css" />
		<?php endif;?>
		<style type="text/css">
		.redsubmit{
		    background: #ff5550 none repeat scroll 0 0;
		    border: 1px solid #ff5550;
		    color: #fff;
		    cursor: pointer;
		    display: block;
		    font-size: 18px;
		    height: 40px;
		    line-height: 40px;
		    text-align: center;
		    text-decoration: none;
		    width: 100%;
		}
		</style>
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

<?php if(is_page('My Account')):?>
	<?php if(have_posts()):while(have_posts()):the_post();?>
			<?php the_content();?>
			<?php endwhile;?>
	<?php endif;?>

<?php else:?>		
	<?php if($show==0):?>
	    <div class="container-fluid container1">
	    	<img src="<?php bloginfo('template_url');?>/img/blogCover.png"  class="img-responsive"/>
	    </div>
	<?php endif;?>

		<?php if(is_page('checkout')):?>
 			<div class="container-fluid ">
		<?php else:?>
	    <div class="container-fluid container2">
	    <?php endif;?>
	    	 <div class="container container3">
			    	<p class="labBox">
			    		<?php if(have_posts()):while(have_posts()):the_post();?>
			    		<?php the_tags('<label class="lab">',' ','</label>&nbsp;&nbsp;&nbsp; ');?>
			    		<?php endwhile;?>
			    		<?php endif;?>
			    		<!-- <label class="lab">Featured</label>&nbsp;&nbsp;&nbsp;
			    		<label class="lab">News</label>&nbsp;&nbsp;&nbsp;
			    		<label class="lab">Tech Talk</label>&nbsp;&nbsp;&nbsp;
			    		<label class="lab">Lifestyle</label>&nbsp;&nbsp;&nbsp; -->
			    	</p>
			    	<div class="blogContent" >
			    		<div class="left">			    			
			    			<?php if(have_posts()):while(have_posts()):the_post();?>
			    			<div class="bolgContentBox" >
			    				<?php if($show==0):?>
			    				<p class="title">
			    					<a href="<?php the_permalink();?>"><?php the_title();?> </a>
			    				</p>
			    				<?php endif;?>
			    				<div>
			    					<a href="<?php the_permalink();?>">
			    						<?php $full_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
										?>
										<?php if(empty($full_image_url)):?>
										<?php else:?>
			    						<img src="<?php echo $full_image_url[0];?>" alt="pic" class="img-responsive"/>
			    						<?php endif;?>
			    					</a>
			    				</div>
			    				<div class="text-box">
			    					<p><a><?php the_content();?></a> </p>
			    				</div>
			    				
			    				
			    			</div>
			    			<?php endwhile;?>
			    			
							<?php else:?>
							<h3 class="title">
								<a href="#" rel="bookmark"><?php _e('Not Found');?></a>
							</h3>
						       
							<?php endif;?>
			    			
			    			<!-- <div class="loadMore">
			    				MORE...
			    			</div> -->
			    			
			    			
			    		</div>
						<?php 
						if(is_home()){
							get_sidebar();
						}
					?>
						
			    	</div>
			    	
	        </div>
	    </div>

	<?php endif;?>   
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：foot
        -->

		<?php get_template_part('foot','shop');?>


		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.wallform.js"></script>	
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.validate.min.js" ></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/validate_myexpand.js" ></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/headImgUplad.js" ></script>
		<script>
				/*$(function(){
					$(".loadMore").click(function(){
					
						var text ="<div class='bolgContentBox'>"
			    				+"<p class='title'><a>Week 010: Bacon Breathes, Calling All Henchmen, and Open Sales </a></p>"
			    				+"<p class='bolgIcon'>"
			    				+"<span>2016/05/01 </span>&nbsp; &nbsp; &nbsp; &nbsp;By:<span style='text-decoration: underline;'>Baiyanglin Team</span> "
			    				+"<span class='move1'><i class='iconfont'>&#xe62a;</i>&nbsp;12306</span>&nbsp; &nbsp;"  
			    				+"<span><i class='iconfont'>&#xe625;</i>&nbsp;12580</span></p>"
			    				+"<div ><a href='#'><img src='<?php bloginfo('template_url');?>/img/blogPic.png' alt='pic' class='img-responsive'/></a></div>"
			    				+"<div class='text-box'>"
			    				+"<p><a>t’s been one hell of a week – the last seven days passed in the blink of an eye. "
                                +"The year may still be young, but we’re back to firing on all cylinders. We feel confident in saying we’ve</a> </p></div></div>";
						
						$(".left").find(".bolgContentBox").last().after(text);
					});
				});*/
			

		

			$(function(){
				
				$("#checkout").validate({
						rules: {
							billing_first_name: "required",
							billing_last_name: "required",
							billing_address_1:"required",
							
							billing_country: "required",
							
							billing_city:"required",
							billing_phone: "required",
							billing_postcode:"required",
						},
						messages: {
							billing_first_name: "Please enter your Firstnames",
							billing_last_name: "Please enter your Lastname",
							billing_address_1:"Please enter your Address1",
							
							billing_country: "Please enter your  Country",
							
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
