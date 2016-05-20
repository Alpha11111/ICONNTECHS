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
	    	<div class="col-lg-3 activeDiv  ">
	    		<a href="<?php bloginfo('home');?>/index.php/my-account/">
	    			<div><i class="iconfont">&#xe63b;</i></div>
	    			<p>Personal</p>
	    		</a>
	    	</div>
	    	<div class="col-lg-3 ">
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