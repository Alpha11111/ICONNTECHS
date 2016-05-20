<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>address</title>

		<!-- Bootstrap -->
		<link href="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/fonts/iconfont.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/address.css" />

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
		
	      <?php get_template_part('myaccount','head');?>

	    <div class="container container2">
	    	<h4>Update Address</h4>
	    	<form class="addressForm">
	    		<div class="input-Box">
	    			<div class="num2">
		    			<input type="text" name="Firstname"  id="Firstname"/>
		    			<p class="inputPropmt">First name  <span class="mark2">*</span></p>
	    			</div>
	    			<div class="num2">
		    			<input type="text" name="Lastname"  id="Lastname" />
		    			<p class="inputPropmt">Last name <span class="mark2">*</span></p>
	    			</div>
	    		</div>
	    		<div class="input-Box">
	    			<div class="num2">
		    			<input type="text" name="Address1"  id="Address1"/>
		    			<p class="inputPropmt">Address line 1  <span class="mark2">*</span></p>
	    			</div>
	    			<div class="num2">
		    			<input type="text" name="Address2"  id="Address2" />
		    			<p class="inputPropmt">Address line 2 <span class="mark2">*</span></p>
	    			</div>
	    		</div>
	    		<div class="input-Box">
	    			<div class="num4">
		    			<input type="text" name="Conutry"  id="Conutry" />
		    			<p class="inputPropmt">Conutry <span class="mark2">*</span></p>
	    			</div>
	    			<div class="num4">
		    			<input type="text" name="State"  id="State"   />
		    			<p class="inputPropmt">State<span class="mark2">*</span></p>
	    			</div>
	    			<div class="num4">
		    			<input type="text"  name="City"  id="City"  />
		    			<p class="inputPropmt">City <span class="mark2">*</span></p>
	    			</div>
	    			<div class="num4">
		    			<input type="text" name="Zipcode"  id="Zipcode"  />
		    			<p class="inputPropmt">Zip code <span class="mark2">*</span></p>
	    			</div>
	    		</div>
	    		<div class="input-Box">
	    			<div class="num1">
		    			<input type="text" name="Phonenumber"  id="Phonenumber"   />
		    			<p class="inputPropmt">Phone number<span class="mark2">*</span></p>
	    			</div>
	    			
	    		</div>
	    		<p><input type="submit" value="SUBMIT"/></p>
	    	</form>
	    	<h4>Address Book</h4>
	    	<div class="addressBox">
	    		<p>Paulboy93</p>
	    		<p>Phone number:12345678910</p>
	    		<p>Address:China,Shenzhen</p>
	    		<p>Shenzhen,guangdong,China</p>
	    		<p>Zip code: 513000</p>
	    	</div>
	    	<p class="operateIcon">
	    		<a><i class="iconfont">&#xe63c;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
	    		<a><i class="iconfont">&#xe639;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
	    		<a><i class="iconfont">&#xe60a;</i></a>&nbsp;&nbsp;&nbsp;&nbsp;
	    	</p>
	    </div>
	   
	   
		<!--
        	作者：1164365204@qq.com
        	时间：2016-05-05
        	描述：foot
        -->
		
		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/jquery-1.11.0.js"></script>
		<script src="<?php bloginfo('template_url');?>/bootstrap-3.3.5-dist/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php bloginfo('template_url');?>/js/jquery.validate.min.js" ></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/validate_myexpand.js" ></script>
	    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/headImgUplad.js" ></script>
		<script>
			$(function(){
				 if($("input[type=text]").val()!=null||$("input").val()!=''){
               	   $("input[type=text]").val('');
                 }
				 $(".inputPropmt").click(function(){
				 	$(this).prev("input").focus();
				 });

				$(".addressForm").validate({
						rules: {
							Firstname: "required",
							Lastname: "required",
							Address1:"required",
							Address2: "required",
							Conutry: "required",
							State:"required",
							City:"required",
							Zipcode: "required",
							Phonenumber:"required",
						},
						messages: {
							Firstname: "Please enter your Firstnames",
							Lastname: "Please enter your Lastname",
							Address1:"Please enter your Address1",
							Address2: "Please enter your email Address2",
							Conutry: "Please enter your Conutry",
							State:"Please enter your State",
							City:"Please enter your City",
							Zipcode: "Please enter your email Zipcode",
							Phonenumber: "Please enter your Phonenumber"
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
