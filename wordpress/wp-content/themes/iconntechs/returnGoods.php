<?php
/*
Template Name:returnGoods
*/
$path = getcwd().'/wp-content/uploads/';
$extArr = array("jpg", "png", "gif");

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST" ){

	if(!empty($_POST['re-Email'])){
		$title = 'ICONNETCHS';
		$user_email = $_POST['re-Email'];
		$user_name = $_POST['re-name'];
		$orderDetail = $_POST['re-Order1'];
		$Issue = $_POST['Issue'];
		$iimage = $_POST['iimage'];
		$headers = "MIME-Version: 1.0\n" . "Content-Type: text/html;"; 
		$message .= "<p>".$user_email.'('.$user_name.')'.'通过售后服务：'."</p>";
		$message .= "<p>".$orderDetail."</p>";
		$message .= "<p>".$Issue."</p>";
		$message .= "<p><img src='".$iimage."'></p>";
		wp_mail($user_email,$title,$message,$headers);
		
}else{
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
			$message = 'Upload Success';
			$img = site_url('wp-content/uploads/').$image_name;
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
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/returnGoods.css" />
		<script type="text/javascript" src="http://libs.useso.com/js/jquery/1.7.2/jquery.min.js"></script>
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
        <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

	</head>

	<body>
		
		<?php get_template_part('head','shop');?>
		
		<div class="container container1">
			<div class="col-lg-3 activeDiv">
				<div>
					<i class="iconfont iconfeature02">&#xe61d;</i>
					<p>Refunds & Exchanges</p>
				</div>
			
			</div>
			<div class="col-lg-3">
				<div>
					<i class="iconfont">&#xe63e;</i>
					<p>Privacy Policy</p>
				</div>
			
			</div>
			<div class="col-lg-3">
				<div>
					<i class="iconfont">&#xe636;</i>
					<p>Term of Use</p>
				</div>
			
			</div>
			<div class="col-lg-3">
				<div>
					<i class="iconfont ">&#xe61c;</i>
					<p>Warranty</p>
				</div>
			
			</div>
		</div>	
		<div class="container container2">
			<div class="col-lg-6">
				<h1>support center</h1>
				<p><i class="iconfont">&#xe643;</i> <span>30 - Day Return for Any Reason</span></p>
				<p><i class="iconfont">&#xe609;</i> <span>12-Month Warranty</span></p>
				<p><i class="iconfont">&#xe623;</i> <span>Lifetime Technical Support</span></p>
			</div>
			<div class="col-lg-6">
				<h1>REFUNDS & EXCHANGES</h1>
					<p class="otherDESC">
						Thank you for visiting our after-sales self-service web page. Here, 
						we hope that you will be able to resolve whatever problems you are experiencing. 
						We're very sorry for whatever inconvenience your purchase may have caused you. 
						Please kindly be advised that all of our Anker products have a full 18-month warranty.
						If your product does not meet your needs within this period, feel free to contact us by
						 submitting a feedback form below in order to let us know what we can do to help you. 
						Moreover, as a reminder, if you are having trouble using one of our products, you can 
						always refer to the FAQ or Instruction Manuals section on our website, where you may
						 be able to resolve the issue yourself. 
						Thank you in advance for all of the information you are providing.
				    </P>
			</div>
		</div>
		<div class="container container3">
			<h2>IOCNNTECHS STORE</h2>
			<form id="form11" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
				<p class="ptit">Contact Information</p>
				<div class="input-Box">
				  
				  <input type="text"  id="re-Email" name="re-Email" required/>
				  <p class="inputPropmt">Email Address <span class="mark2">*</span></p>
				</div>
				<div class="input-Box">
				  
				  <input type="text" id="re-name" name="re-name" required/>
				  <p class="inputPropmt">Name <span class="mark2">*</span></p>
				</div><br />
				<p class="ptit">Order Details</p>
				<div class="input-Box">
				  <input type="text" id="re-Order1" name="re-Order1" required/>
				  <p class="inputPropmt">Please select  <span class="mark2">*</span></p>
				</div><br />
				<p class="ptit">Issue Details</p>
				<textarea id="Issue" name="Issue"></textarea>
				<input type="hidden" id="iimage" name="iimage" value="" >			
			</form>

		      <div>
               <p class="ptit">Images</p>
				<form id="imageform" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<img src="<?php bloginfo('template_url');?>/img/add.png"  id="uploadImg"/>
					<span id="message"></span>
				 	<input type="file" id="photoimg" name="photoimg" style="visibility: hidden;" onchange="upload()"/>		 	
				 	
				 </form>

				</div>
				<div>
				    <input type="reset" value="RESET" />	<input type="submit" onclick="$('#form11').submit();"  value="SUBMIT"/>
				</div>
				
			<div class="clearfix"></div><br /><br /><br />
		</div>
			
	
		<!--
        	作者：1164365204@qq.com
        	时间：2016-04-22
        	描述：尾部
        -->
	   <?php get_template_part('foot','shop');?>
	   <script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/jquery-1.11.0.js"></script>
	   <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.wallform.js"></script>	
	   <script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
		
	   <script>

	   function upload(){
				$("#imageform").ajaxForm({
							beforeSubmit:function(){
							
						}, 
						success:function(){
							$('#message').text('Upload success');

						}, 
						error:function(){
							$('#message').text('Upload failure');
						}
							 }).submit();
	   			}


             $(function(){
         
             	     
             
				
			    
             	
               //页面刷新初始化
               if($("input[type=text]").val()!=null||$("input").val()!=''){
               	   $("input[type=text]").val('');
               }
             	$("#uploadImg").click(function(){
             		$("input[type=file]").click();
             	});
              
                
             	//键盘按下事件
             	$("input").keydown(function(){
             		
             		$(this).next(".inputPropmt").css("margin-top","-50px");
             		
             	});
             	//键盘释放事件
             	$("input").keyup(function(){
             		if($(this).val()==''||$(this).val()==null||$(this).val()==undefined){
             			$(this).next(".inputPropmt").css("margin-top","-35px");
             		}
             		
             		
             	});
             });
		  
		</script>

	</body>

</html>