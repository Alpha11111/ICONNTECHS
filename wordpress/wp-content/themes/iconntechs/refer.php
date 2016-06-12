<?php 
/*
	Template Name:Refer
*/
	global $wpdb;
	$page = !empty($_POST['page'])?$_POST['page']:1;
	$order = !empty($_POST['order'])?$_POST['order']:1;
	//var_dump($page);die;
	$pagesize = 20;
	$pagestart = ($page-1)*$pagesize;
	$item = $wpdb->get_results('select count(*) as total from wp_users',ARRAY_A);
	$totalitem = $item[0]['total'];
	$totalpage = ceil($totalitem/$pagesize);
	$info = $wpdb->get_results("select ID,user_email,user_registered from wp_users limit $pagestart,$pagesize ",ARRAY_A);
	$data = array();
	foreach ($info as $key => $value) {
		$data[$key] = $value;
		$data[$key]['invite_number'] = get_the_author_meta('invite_number',$value['ID']);
		if(empty($data[$key]['invite_number'])){
			$data[$key]['invite_number'] = 0;
		}
	}
	if($order==1){
		$by = 'SORT_DESC';
	}else{
		$by = 'SORT_ASC';
	}
	$sort = array(  
	        'direction' => $by, //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序  
	        'field'     => 'invite_number',       //排序字段  
		);  
	$arrSort = array();  
	foreach($data AS $uniqid => $row){ 
	    foreach($row AS $key=>$value){  
	        $arrSort[$key][$uniqid] = $value;  
	    }  
	}  
	if($sort['direction']){  
	    array_multisort($arrSort[$sort['field']], constant($sort['direction']), $data);  
	}  

?>

<html>
<head>
<script type="text/javascript" src="https://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-2.0.0.min.js"></script>
<script type="text/javascript" src="https://www.francescomalagrino.com/BootstrapPageGenerator/3/js/jquery-ui"></script>
<link href="https://www.francescomalagrino.com/BootstrapPageGenerator/3/css/bootstrap-combined.min.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="https://www.francescomalagrino.com/BootstrapPageGenerator/3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="page-header">
				<h1>
					Referral Program
				</h1>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>
							ID
						</th>
						<th>
							邮箱
						</th>
						<th>
							注册时间
						</th>

						<th onclick="order(<?php echo $order;?>)">
							受邀请人数
						</th>
					</tr>
				</thead>
				<tbody>
				<?php  foreach($data as $k=>$v):?>
					<?php if($k%2==0):?>
						<tr class="success">
					<?php else:?>
						<tr class="info">
					<?php endif;?>
						<td <?php echo $k;?>>
							<?php echo $v['ID'];?>
						</td>
						<td>
							<?php echo $v['user_email'];?>
						</td>
						<td>
							<?php echo $v['user_registered'];?>
						</td>
						<td>
							<?php echo $v['invite_number'];?>
						</td>
					</tr>
				<?php endforeach;?>
					
				</tbody>
			</table>
			<form id="form1" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
			<div class="pagination pagination-right">
				<ul>
					<?php if($page>1):?>
					<li>
						<a onclick="tijiao(<?php echo $page-1;?>)" >上一页</a>
					</li>
					<?php endif;?>

					<?php if($page-1>1):?>
					<li>
						<a onclick="tijiao(<?php echo $page-1;?>)"><?php echo $page-1;?></a>
					</li>
					<?php endif;?>

					<li>
						<a href="javascript:;" class="btn btn-info"><?php echo $page;?></a>
					</li>
					
					<?php if($page+1<$totalpage || $page+1==$totalpage):?>
					<li>
						<a  onclick="tijiao(<?php echo $page+1;?>)"><?php echo $page+1;?></a>
					</li>
					<?php endif;?>

					<input type="hidden" name="page" id="page" value="<?php echo $page;?>">
					<input type="hidden" name="order" id="order" value="1" >
					<?php if($page+1<$totalpage || $page+1==$totalpage):?>
					<li>
						<a onclick="tijiao(<?php echo $page+1;?>)">下一页</a>
					</li>
					<?php endif;?>
				</ul>
			</div>
		</form>
		</div>
	</div>
</div>
<script>

		function tijiao(page){
				$('#page').val(page);
				$('#form1').submit();
			}

		function order(obj){
				
				if(obj=='1'){
					$('#order').val('2');
				}else{
					$('#order').val('1');
				}
				
				$('#form1').submit();
		}
</script>
</body>
</html>