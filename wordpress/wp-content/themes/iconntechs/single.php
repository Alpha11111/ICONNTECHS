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
			    				  <span class="move1">
			    				  	<i class="iconfont">&#xe62a;</i>&nbsp;<?php post_views();?></span>&nbsp; &nbsp;
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
			    					<p><?php the_content();?> </p>
			    				</div>
			    				<div class="blog-iocn-Box">
			    					
			    					<div id="share-b1">
			    						<a class="share sharea"><i class="iconfont">&#xe631;</i></a>
				    					<a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php the_permalink();?>" class="share" ><img src="<?php bloginfo('template_url');?>/img/facebook.png"/></a>
				    					<a href="https://twitter.com/intent/tweet?url=<?php the_permalink();?>" class="share" target="_blank"><img src="<?php bloginfo('template_url');?>/img/twitter.png"/></a>
			    					</div>
			    				</div>
			    				
			    			</div>
								<?php
									$current_category = get_the_category();//获取当前文章所属分类ID
									
									$prev_post = get_previous_post($current_category->cat_ID,'');//与当前文章同分类的上一篇文章
									
									$next_post = get_next_post($current_category->cat_ID,'');//与当前文章同分类的下一篇文章
								?>
								<div class="turnPage">
								<?php if(!empty($prev_post)):?>
			                 	<a id="previous1" href="<?php echo $prev_post->guid;?>">Previous Article </a> 
			                 	<?php endif;?>
			                 	<?php if(!empty($next_post)):?>
			                 	<a id="next1" href="<?php echo $next_post->guid;?>">Next Article </a>
			                 	<?php endif;?>
			                 	</div>
							<?php comments_template();?>
			    			<?php endwhile;?>

			    			

							<?php else:?>
							<div class="post" id="post-<?php the_ID();?>">
								<h2><?php _e('Not Found');?></h2>
							</div>
						       
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
