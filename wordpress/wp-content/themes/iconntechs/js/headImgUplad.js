$(".headImg img").click(function(){
					$("input[type=file]").click();
					
				});
				$("#seeFile").change(function(){
		
					if(check(this)==true){
						var src=getUrl(this);
						$("#imageform").ajaxForm({
						target: '#preview', 
						beforeSubmit:function(){
							status.show();
							btn.hide();
						}, 
						success:function(){
							status.hide();
							btn.show();
						}, 
						error:function(){
							status.hide();
							btn.show();
					} }).submit();
						if(src!=''){
							$(".headImg img")[0].src = src;
							
					   }
					}
				
			  });
						
			//判断上传文件的格式是否是图片所支持的格式
			function check(fileObj){
				var name = fileObj.value;
				name = name.substring(name.lastIndexOf('.')+1).toLowerCase();
				
				if(name=='png'||name=='jpg'|| name=='jpeg'||name=='gif' ){
					return true;
				}else{
					alert("上传图片格式只能为jpg,jpeg,gif,png");
					return false;
				}
				
			}
			//根据不同的浏览器来获取本地图片的地址
			function  getUrl(fileObj){
			 	var src ="";
				if(fileObj.files &&fileObj.files[0])
				{
					//火狐，IE10或者以上版本，谷歌等主流浏览器获取的方式
					src= window.URL.createObjectURL(fileObj.files[0]);
				}
				else
				{
					alert("如果你是IE浏览器，请使用10及以上的版本");
					/*	//IE下，使用滤镜
						fileObj.select();
						src= document.selection.createRange().text;
					*/
				}
				return src;
			}