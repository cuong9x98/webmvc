<?php 
	include('inc/header.php');
	include('inc/slider.php');

 ?> 
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm nổi bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      		$getFpd = $product->getFeatureProducts();
	      		if ($getFpd) {
	      			while ($result = $getFpd->fetch_assoc()) {
	      				
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId']; ?>"><img src="admin/upload/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?> </h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],60); ?></p>
					 <p><span class="price"><?php echo $result['price']." "."VND"; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
						}
	      			}
				 ?>
			</div>
			<div>
				<?php 
					$product_new = $product->get_all_product_new();
					$product_count_new = mysqli_num_rows($product_new);
					$product_button_new = ceil($product_count_new/4);
					for ($j=1; $j <=$product_button_new; $j++) { 
						echo '<a style="margin:0 10px" href="index.php?trang_new='.$j.'" title="">'.$j.'</a>';
					}
				 ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Tất cả sản phẩm</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
		      		$getNpd = $product->getNewProducts();
		      		if ($getFpd) {
		      			while ($result_new = $getNpd->fetch_assoc()) {
	      				
	      	 	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result_new['productId']; ?>"><img src="admin/upload/<?php echo $result_new['image']; ?>" alt="" /></a>
					 <h2><?php echo $result_new['productName']; ?> </h2>
					 <p><?php echo $fm->textShorten($result_new['product_desc'],60); ?></p>
					 <p><span class="price"><?php echo $result_new['price']." "."VND"; ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId']; ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
					}
				}
				 ?>
			</div>
			<div>
				<?php 
					$product_all = $product->get_all_product();
					$product_count = mysqli_num_rows($product_all);
					$product_button = ceil($product_count/4);
					$i = 1;
					for ($i=1; $i <=$product_button; $i++) { 
						echo '<a style="margin:0 10px" href="index.php?trang='.$i.'" title="">'.$i.'</a>';
					}
				 ?>
			</div>
    </div>
 </div>
<?php 
	include('inc/footer.php');
 ?>