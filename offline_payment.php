<?php 
	include('inc/header.php');
	
 ?>
 <?php 
 	if (isset($_GET['orderid']) && $_GET['orderid']=='order') {
           $customer_id = Session::get('customer_id');
           $insertOrder = $ct->insertOrder($customer_id);
           $delCart = $ct->del_all_data_cart();
           header('Location:success.php');
        }
  ?>
  <style type="text/css" media="screen">
  	.box_right{
  		width:47%;
  		border:1px solid #000;
  		float:right;
  		padding: 4px;
  	}
  	.box_left{
  		width:51%;
  		border:1px solid #000;
  		float:left;
  		padding: 4px;
  	}
  	a.a_order{
  		background: red;
  		padding:7px 20px;
  		color: #fff;
  		font-size:21px;
  
  	}
  </style>
  <form action="" method="post">
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
          	<div class="heading">
            	<h3>Thanh Toán Offline</h3>
          	</div>
          	<div class="clear"></div>
        </div>
        <div class="box_left">
        	<div class="cartpage">
			    	
			    	<?php 
			    		// if (isset($insertOrder)) {
			    		// 	echo $insertOrder;
			    		// }
			    	 ?>

						<table class="tblone">
							<tr>
								<th width="55%">Tên sản phẩm</th>
								<th width="15%">Giá</th>
								<th width="10%">Số lượng</th>
								<th width="20%">Tổng giá</th>
							</tr>
							<?php 
								$get_product_cart = $ct->get_product_cart();
								if ($get_product_cart) {
									$subtotal=0;
									$qty= 0;
									while ($result =$get_product_cart->fetch_assoc()) {


							 ?>
							<tr>
								<td><?php echo $result['productName'] ?></td>
								<td><?php echo $result['price'].'VNĐ'; ?></td>
								<td><?php echo $result['quarity']; ?></td>
								<td><?php 
									$total = $result['price']*$result['quarity'];
									echo $total.'VNĐ';
								 ?></td>
							</tr>
							<?php 
										$qty = $qty + $result['quarity'];
										$subtotal=$subtotal+$total;
										Session::set("sum",$subtotal);
										Session::set("qty",$qty);
									?>
							<?php } } ?>
						</table>
						<?php 
							$getData = $ct->check_cart();
							if ($getData) {
								
						 ?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Tổng cộng : </th>
								<td><?php 

									echo $subtotal.'VNĐ';
									
								 ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Thành Tiền :</th>
								<td><?php echo $subtotal*1.1.'VNĐ' ?></td>
							</tr>
					   </table>
					   <?php 
					   		}else{
					   			echo "Cart Emty! Now Shopping :)";
					   		}
					    ?>
					</div>
        </div>
        <div class="box_right">
        	<table class="tblone">
    			<tr>
    				<td colspan="" rowspan="" headers="">Tên Khách</td>
    				<td colspan="" rowspan="" headers="">Thành Phố</td>
    				<td colspan="" rowspan="" headers="">Mã Bưu Chính</td>
    				<td colspan="" rowspan="" headers="">Điện Thoại</td>
    				<td colspan="" rowspan="" headers="">Email</td>
    			</tr>
    			<?php 
    				$id = Session::get('customer_id');
    		
    				$get_customer = $cs->show_customer($id);
    				if ($get_customer) {
    					$result = $get_customer->fetch_assoc();
    			 ?>
    			<tr>
    				<td colspan="" rowspan="" headers=""><?php echo $result['name'] ?></td>
    				<td colspan="" rowspan="" headers=""><?php echo $result['city'] ?></td>
    				<td colspan="" rowspan="" headers=""><?php echo $result['zipcode'] ?></td>
    				<td colspan="" rowspan="" headers=""><?php echo $result['phone'] ?></td>
    				<td colspan="" rowspan="" headers=""><?php echo $result['email'] ?></td>
    			</tr>
    			<?php 
    					}
    			 ?>
    			 
    		</table>
        </div>
 		</div>

 		
 	</div>
			<center><a href="?orderid=order" class="a_order">Đặt Hàng Ngay</a></center>
 </div>
</form>
	 <?php 
 		include('inc/footer.php');
  ?>