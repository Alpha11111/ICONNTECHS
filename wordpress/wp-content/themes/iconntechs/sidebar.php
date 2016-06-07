<div class="right">
			    			<div class="share-box">
			    				<p>FOLLOW US</p>
			    				<p class="share-icon">
			    					<a href="https://business.facebook.com/iconntechs/?business_id=159600407712495" target="_blank"><i class="iconfont " >&#xe63f;</i></a>
			    					<a href="https://twitter.com/Iconntechs1" target="_blank"><i class="iconfont">&#xe608;</i></a>
			    					<a href="https://www.youtube.com/channel/UCDj-K547ibqeesndHs9gg_Q" target="_blank"><i class="iconfont">&#xe60c;</i></a>
			    					<a href="https://www.instagram.com/iconntechs1/" target="_blank"><i class="iconfont">&#xe622;</i></a>
			    					<a href="https://plus.google.com/?hl=en" target="_blank"><i class="iconfont ">&#xe629;</i></a>
			    					
			    				</p>
			    			</div>
			    			<div class="mailbox-box">
			    				<p>SUBSCRIBE TO OUR NEWSLETTER</p>
			    				<form onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=baiyanglin/gFdm', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" target="popupwindow" method="post" action="https://feedburner.google.com/fb/a/mailverify">
			    					<p><input type="text" name="email"  id="email" placeholder="Enter your e-mail address"/>&nbsp;&nbsp;&nbsp;
			    						<input type="hidden" name="uri" value="baiyanglin/gFdm">
										<input type="hidden" value="en_US" name="loc">
			    						<input type="submit" value="Submit"/>
			    					</p>
			    				</form>
			    			</div>
			    			<div class="contenList-box">
			    				<p>RECOMMENDED STORIES:</p>
			    				<ul>
			    					<?php
						                $posts = get_posts('numberposts=6&orderby=post_date');
						                foreach($posts as $post) {
						                    setup_postdata($post);
						             ?>
			    					<li>
			    						<div>
			    							<?php the_post_thumbnail();?>
			    						</div>
			    						<div>
			    							<p><a class="ptit"><?php the_title();?></a></p>
			    							<p><span class="time"><?php the_time('Y/m/d');?></span>&nbsp;&nbsp;<span class="author"> By: <?php the_author();?></span></p>
			    						</div>
			    					</li>

			    					  <?php  }
						                $post = $posts[0];
						            ?>
			    				</ul>
			    			</div>
			    			<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/" >
			    			<div class="search-Box">

			    				<p>
			    					<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" size="15"/>
			    					<a id="search" onclick="$('#searchform').submit();">
			    						<i class="iconfont" >&#xe601;</i>
			    					</a>
			    				</p>
			    			</div>
			    		</form>
			    		</div>