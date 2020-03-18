<?php 
	include('inc/header.php');
	include('inc/slider.php');
 ?>
 <?php  
 	if (isset($_GET['cartid'])) {
			$id = $_GET['cartid'];
			$del=$ct->del_cart($id);
		}
 	if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    	$cartId= $_POST['cartId'];
    	$quarity= $_POST['quarity'];	
    	if ($quarity<=0) {
    		$del=$ct->del_cart($cartId);
    	}
       	$update_quarity_Cart = $ct->update_quarity_Cart($quarity,$cartId);
    }
  ?>
 <?php 
 	if (!isset($_GET['id'])) {
 		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
 	}
  ?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ Hàng</h2>
			    	<?php 
			    		if (isset($update_quarity_Cart)) {
			    			echo $update_quarity_Cart;
			    		}
			    	 ?>

						<table class="tblone">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Tổng giá</th>
								<th width="10%">Xóa</th>
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
								<td><img width="50px" height="80px" src="admin/upload/<?php echo $result['image'];?>" alt=""/></td>
								<td><?php echo $result['price']; ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['carId']; ?>" />
										<input type="number" name="quarity" value="<?php echo $result['quarity']; ?>" min="1" max="100"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php 
									$total = $result['price']*$result['quarity'];
									echo $total;
								 ?></td>
								<td><a href="?cartid=<?php echo $result['carId'] ?>">Xóa</a></td>
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

									echo $subtotal;
									
								 ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Thành Tiền :</th>
								<td><?php echo $subtotal*1.1 ?></td>
							</tr>
					   </table>
					   <?php 
					   		}else{
					   			echo "Cart Emty! Now Shopping :)";
					   		}
					    ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php 
	include('inc/footer.php');
 ?>