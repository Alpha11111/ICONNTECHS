<?php 
get_header();

?>

	    <div class="container-fluid container1">
	    	<img src="<?php bloginfo('template_url');?>/img/blogCover.png"  class="img-responsive"/>
	    </div>
	    <div class="container-fluid container2">
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
			    	<div class="blogContent">
			    		<div class="left">			    			
			    			<?php if(have_posts()):while(have_posts()):the_post();?>
			    			<div class="bolgContentBox">
			    				<p class="title">
			    					<a href="<?php the_permalink();?>"><?php the_title();?> </a>
			    				</p>
			    				<p class="bolgIcon">
			    				  <span><?php the_time('Y/m/d');?> </span>&nbsp; &nbsp; &nbsp; &nbsp;By:<span style="text-decoration: underline;"><?php  the_author(); ?></span> 
			    				  <span class="move1"><i class="iconfont">&#xe62a;</i>&nbsp;<?php post_views();?></span>&nbsp; &nbsp;
			    				  <span><i class="iconfont">&#xe625;</i>&nbsp;<?php comments_popup_link('0', '1', '%'); ?></span>
			    				</p>
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
			    					<p><a><?php the_excerpt();?></a> </p>
			    				</div>
			    				
			    				<div class="blog-iocn-Box">
			    					<a style="width:150px" href="<?php the_permalink();?>">READ MORE>></a>
			    					<!-- <a><i class="iconfont">&#xe63d;</i></a>
			    					<a><i class="iconfont">&#xe615;</i></a>
			    					<a><i class="iconfont">&#xe631;</i></a> -->
			    				</div>
			    			</div>
			    			<?php endwhile;?>
			    			<div class="navigation">
								<?php posts_nav_link();?>
							</div>
							<?php else:?>
							<h3 class="title">
								<a href="#" rel="bookmark"><?php _e('Not Found');?></a>
							</h3>
						       
							<?php endif;?>
			    			
			    			<!-- <div class="loadMore">
			    				MORE...
			    			</div> -->
			    			
			    			
			    		</div>

			    		<?php get_sidebar();?>

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
		<script>
				$(function(){
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
				});
			
		</script>
	</body>
</html>
