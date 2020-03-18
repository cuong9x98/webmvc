<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<div class="grid_10">
	<?php 
		$product = new product();
		if (isset($_GET['productid'])) {
			$id = $_GET['productid'];
			$del=$product->del_product($id);
		}
	 ?>
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
        	<?php 
        		if (isset($del)) {
        			echo $del;
        		}
        	 ?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên sản phẩm</th>
					<th>Giá</th>
					<th>Ảnh</th>
					<th>Loại sản phẩm</th>
					<th>Thương hiệu</th>
					<th>Mức độ</th>
					<th>Mô tả</th>
					<th>Chức năng</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$list = new product();
					$pdlist = $list->show_product();
					if (isset($pdlist)) {
						while ($result = $pdlist->fetch_assoc()) {
				 ?>
				<tr style="font-size: 11px" class="gradeU">
					<td><?php echo $result['productId'] ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['price']?></td>
					<td><img width="80px" src="upload/<?php echo $result['image'] ?>" alt=""></td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td><?php 
						if ($result['type']=="0") {
							echo 'Hàng mới';
						}else{
							echo 'Hàng cũ';
						}
					?>
					<td><?php echo $result['product_desc'] ?></td>
					<td><a href="productedit.php?productid=<?php echo $result['productId']?>">Edit</a> || <a href="?productid=<?php echo $result['productId']?>">Delete</a></td>
				</tr>
				<?php 
						}
					}
				 ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
