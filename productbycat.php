<?php 
	include('inc/header.php');
	include('inc/slider.php');
 ?>
 <?php 
 	 if (!isset($_GET['catId']) || $_GET['catId']==NULL) {
            echo "<script>window.location ='404.php'</script>";
            
        }else{
            $id =$_GET['catId'];
        }
   
	     //    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	     //    # //Kiểm tra phương thức gửi dữ liệu của form
	     //    $catName = $_POST['catName'];
	     //    $updateCat =$cat->update_category($catName,$id);
	    	// }
  ?>
  <?php 
  		$category_name = $category->getcatbyId($id);
  		$result_get_cat_name = $category_name->fetch_assoc();
   ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3><?php echo $result_get_cat_name['catName']; ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      		$productbycat = $category->get_product_by_cat($id);
	      		if ($productbycat) {
	      			while ($result = $productbycat->fetch_assoc()) {
	      					
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details-3.php"><img src="admin/upload/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><?php echo $result['product_desc'] ?></p>
					 <p><span class="price"><?php echo $result['price']; ?>.VNĐ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']; ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
					}
	      		}else {
	      			echo "Không có sản phẩm theo loại cần tìm.";
	      		}
				 ?>
			</div>

	
	
    </div>
 </div>
 <?php 
 		include('inc/footer.php');
  ?>