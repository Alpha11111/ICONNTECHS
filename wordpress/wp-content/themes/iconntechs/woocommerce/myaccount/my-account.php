<?php
global $wpdb;
global $user_ID;


if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" ){

if(!empty($_POST['UserName'])){
	$account['username'] = $_POST['UserName'];
	$account['user_birth'] = $_POST['birth'];
	$account['user_gender'] = $_POST['Gender'];
	$account['billing_phone'] = $_POST['Phonenumber'];
	$account['billing_country'] = $_POST['Conutry'];
	$account['billing_state'] = $_POST['State'];
	$account['billing_city'] = $_POST['City'];
	$account['billing_postcode'] = $_POST['Zipcode'];


	foreach ($account as $key=>$value){
		$value = isset($value)?$value:'';
		$name = $key;
		$isa = $wpdb->query("select * from wp_usermeta where user_id=$user_ID and meta_key='$key' limit 1"); 
		if($isa){
			$uarry = array('meta_value' => $value);
			$wcl = array('user_id'=>$user_ID,'meta_key'=>$name);
			$wpdb->update('wp_usermeta',$uarry,$wcl);
		}else{
			$iarry = array('meta_key'=>$key,'meta_value'=>$value,'user_id'=>$user_ID);
			$wpdb->insert('wp_usermeta',$iarry);
		}
		
	}
	
}else{
	$path = getcwd().'/wp-content/uploads/head/';
	$extArr = array("jpg", "png", "gif");
		$name = $_FILES['photoimg']['name'];
		$size = $_FILES['photoimg']['size'];
		$message = "";
		if(empty($name)){
			$message = 'Please choose to upload the picture';
			exit;
		}
		$ext = extend($name);
		if(!in_array($ext,$extArr)){
			$message = 'Image format error!';
			exit;
		}
		if($size>(1024*1024)){
			$message = 'Picture size can not exceed 1M';
			exit;
		}
		$image_name = time().rand(100,999).".".$ext;
		$tmp = $_FILES['photoimg']['tmp_name'];
		if(move_uploaded_file($tmp, $path.$image_name)){
			
			$img = site_url('wp-content/uploads/head/').$image_name;

			$isaa = $wpdb->query("select * from wp_usermeta where user_id=$user_ID and meta_key='headimg' limit 1"); 
			if($isaa){
				$uarry = array('meta_value' => $img);
				$wcl = array('user_id'=>$user_ID,'meta_key'=>'headimg');
				$wpdb->update('wp_usermeta',$uarry,$wcl);
			}else{
				$iarry = array('meta_key'=>'headimg','meta_value'=>$img,'user_id'=>$user_ID);
				$wpdb->insert('wp_usermeta',$iarry);
			}
			echo $img;
			
		}else{
			$message = 'Upload Error';
			die;
		}
		exit;
	}
}

function extend($file_name){
	$extend = pathinfo($file_name);
	$extend = strtolower($extend["extension"]);
	return $extend;
}


$headimg = get_the_author_meta( 'headimg', $user_ID );

?>
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：head
        -->
	    <div class="container container1">
	    	
	    	<form id="accountform" name="accountform" enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	    		<div class="headImg">
				<?php if(!empty($headimg)):?>
					 <img id="head" name="head" src="<?php echo $headimg;?>"/>
				<?php else:?>
	    		     <img id="head" name="head" src="<?php echo bloginfo('template_url');?>/img/headImg1.png"/>
	    		<?php endif;?>

	    	    </div>
	         	<input type="file" id="photoimg" name="photoimg" style="display: none;" onchange="upload()">
	    	</form>

	    	<p class="name"><strong><?php echo get_the_author_meta( 'user_nicename', $user_ID );?></strong></p>
	    	<p><?php echo get_the_author_meta( 'billing_country', $user_ID ).' ';?><?php echo get_the_author_meta( 'billing_city', $user_ID );?></p>
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
	    
	    <div class="container container5">
	    	<form class="personForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	    		<div class="input-Box">
	    			<div class="num1">
		    			<input type="text" value="<?php echo get_the_author_meta('username', $user_ID );?>" name="UserName"  id="UserName"  placeholder="Uesr Name" />
	    			</div>
	    			
	    		</div>
	    		<div class="input-Box">
	    			<div class="num1">
		    			<input  type="email" name="Email"  id="Email" value="<?php echo get_the_author_meta( 'user_email', $user_ID );?>" disabled="disabled" />
	    		
	    			</div>
	    			
	    		</div>
	    		<div class="input-Box">
	    			<div class="num2">
		    			<input type="text" name="birth"   value="<?php echo get_the_author_meta( 'user_birth', $user_ID );?>" id="birth" placeholder="Date of birth"/>
	    			</div>
	    			<div class="num2">
		    			<input type="text" name="Gender"  value="<?php echo get_the_author_meta( 'user_gender', $user_ID );?>" id="Gender" placeholder="Gender" />
	    			</div>
	    		</div>
	    		<div class="input-Box">
	    			<div class="num1">
		    			<input type="text" name="Phonenumber" value="<?php echo get_the_author_meta( 'billing_phone', $user_ID );?>" id="Phonenumber"  placeholder="Phone number" />
	    			</div>
	    			
	    		</div>
	    		<div class="input-Box">
	    			<div class="num4">
		    			<input type="text" name="Conutry" value="<?php echo get_the_author_meta( 'billing_country', $user_ID );?>" id="Conutry" placeholder="Conutry" />
	    			</div>
	    			<div class="num4">
		    			<input type="text" name="State" value="<?php echo get_the_author_meta( 'billing_state', $user_ID );?>" id="State"  placeholder="State" />
	    			</div>
	    			<div class="num4">
		    			<input type="text" value="<?php echo get_the_author_meta( 'billing_city', $user_ID );?>"  name="City"  id="City" placeholder="City" />
	    			</div>
	    			<div class="num4">
		    			<input type="text" value="<?php echo get_the_author_meta( 'billing_postcode', $user_ID );?>" name="Zipcode"  id="Zipcode" placeholder="Zipcode" />
	    			</div>
	    		</div>
	    		<p><input type="submit" value="SUBMIT"/></p>
	    	</form>
	    </div>
	   
	   
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：foot
        --> 
	
	<script>
		function upload(){
				$("#accountform").ajaxForm({
							beforeSubmit:function(){
							
						}, 
						success:function(){
							window.location.reload();

						}, 
						error:function(){
							$('#message').text('Upload failure');
						}
							 }).submit();
	   			}

	</script>
	</body>
</html>
