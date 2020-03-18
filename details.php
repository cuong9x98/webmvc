<?php 
	include('inc/header.php');
	
 ?>
 <?php 
 	if (!isset($_GET['proid']) || $_GET['proid']==NULL) {
            // echo "<script>window.location ='404.php'</script>";
            
        }else{
            $id =$_GET['proid'];
        }
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    	$quarity = $_POST['quarity'];
       	$AddtoCart = $ct->add_to_cart($quarity,$id);
    }
  ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php  
    			$get_product_detail = $product->get_detail($id);
    			if ($get_product_detail) {
    				while ($result_detail=$get_product_detail->fetch_assoc()) {
    					
    		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img with="200px" height="200px" src="admin/upload/<?php echo $result_detail['image'] ?>" alt="" />
					</div>
					
				<div class="desc span_3_of_2">
					<h2><?php echo $result_detail['productName']; ?></h2>
					<p><?php echo $result_detail['product_desc']; ?></p>					
					<div class="price">
						<p>Price: <span><?php echo $result_detail['price']; ?></span></p>
						<p>Category: <span><?php echo$result_detail['catName']; ?></span></p>
						<p>Brand:<span><?php echo $result_detail['brandName']; ?></span></p>
					</div>
					
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quarity" value="1" min="1" max="100"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
					<?php 
							if (isset($AddtoCart)) {
								echo '<span style="color:red;font-size:18px">Sản phẩm đã được thêm vào giỏ.</span>';
							}
						 ?>
				</div>
				<div class="add-cart">
					<a href="?wlist=<?php echo $result_detail['productId']?>" class="buysubmit">Sản phẩm yêu thích</a>
					<a href="?compare=<?php echo $result_detail['productId']?>" class="buysubmit">So sánh sản phẩm</a>
				</div>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
	    </div>		
	</div>
			<?php 
	    			}
    			}
	    	?>
				<div class="rightsidebar span_3_of_1">
					<h2>Loại sản phẩm</h2>
					<ul>
						<?php 
							$list_category = $category->showdetail_category();
							if ($list_category) {
								while ($result_category =$list_category->fetch_assoc()) {
 
						 ?>
				      <li><a href="productbycat.php?catId=<?php echo $result_category['catId'] ?>"><?php echo $result_category['catName'] ?></a></li>
				      	<?php 
				      			}
							}
				      	 ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
	 <?php 
 		include('inc/footer.php');
  ?>