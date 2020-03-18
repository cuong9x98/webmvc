<?php 
	$filepath =realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
 ?>

<?php 
	/**
	 * 
	 */
	class product 
	{
		private $db;// Khai báo biến chỉ dc dùng trong file này
		private $fm;
		function __construct()
		{
			$this->db = new Database();//Khai báo biến db trong lớp Database
			$this->fm = new Format();//Khai báo biến db trong lớp Format
		}
		public function insert_product($data,$file)//Hàm trả về kết quả insert data.
		{
			
			$productName = mysqli_real_escape_string($this->db->link,$data['productName']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$brand = mysqli_real_escape_string($this->db->link,$data['brand']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$category = mysqli_real_escape_string($this->db->link,$data['category']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$price = mysqli_real_escape_string($this->db->link,$data['price']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$type = mysqli_real_escape_string($this->db->link,$data['type']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',.... 
			// Kiểm tra hình ảnh và lấy hình ảnh cho vào foder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			$div = explode('.',$file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;
			if ($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="" || $file_name=="") {
				$alter = "<span>Product must be not empty</span>";
				return $alter;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);
				$query = "insert into product(productName,catId,brandId,product_desc,type,price,image) values('$productName','$category','$brand','$product_desc','$type','$price','$unique_image')";
				$result = $this->db->insert($query);
				if ($result) {
					$alter = "<span class='success'>Thêm mới thành công. </span>";
					return $alter;
				}else{
					$alter = "<span class='error'>Thêm mới thất bại. </span>";
					return $alter;
				}
			}
		}
		public function show_product()//Hàm show data trong danh mục 
		{
			$query ="select product.*,category.catName,brand.brandName
			from product inner join category on product.catId = category.catId
			inner join brand on product.brandId = brand.brandId
			order by product.productId desc";//Chọn từ bảng category sắp xếp theo catId giảm dần.
			$result = $this->db->select($query);
			return $result;
		}
		public function getproductbyId($id)
		{
			$query = "select * from product where productId ='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_product($data,$file,$id)
		{
			$id = mysqli_real_escape_string($this->db->link,$id);
			$productName = mysqli_real_escape_string($this->db->link,$data['productName']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$brand = mysqli_real_escape_string($this->db->link,$data['brand']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$category = mysqli_real_escape_string($this->db->link,$data['category']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$product_desc = mysqli_real_escape_string($this->db->link,$data['product_desc']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$price = mysqli_real_escape_string($this->db->link,$data['price']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$type = mysqli_real_escape_string($this->db->link,$data['type']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',.... 
			// Kiểm tra hình ảnh và lấy hình ảnh cho vào foder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			$div = explode('.',$file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()),0,10).'.'.$file_ext;
			$uploaded_image = "upload/".$unique_image;
			
			if ($productName=="" || $brand=="" || $category=="" || $product_desc=="" || $price=="" || $type=="") {
				$alter = "<span>Product must be not empty</span>";
				return $alter;
			}else{
				if (!empty($file_name)) {//Nếu mục ảnh không chống ->Người dùng chọn ảnh
					if (file_size>2048) {
						$alter="<span class	='success'>Ảnh phải có kích thước nhỏ hơn 2M</span>";
						return $alter;
					}elseif(in_array($file_ext, $permited)===flase) {
						$alter="<span class='success'>Bạn chỉ có thể upload file sau: <".implode(', ',$permited)."</span>";
						return $alter;
					}
					$query="update product set
					productName = '$productName',
					catId = '$category',
					brandId ='$brand',
					product_desc = '$product_desc',
					type = '$type',
					price ='$price',
					image = '$unique_image'
					where productId='$id'";
					

				}else{
					$query="update product set
					productName = '$productName',
					catId = '$category',
					brandId ='$brand',
					product_desc = '$product_desc',
					type = '$type',
					price ='$price'
					where productId='$id'";
					}
					$result = $this->db->update($query);
					if ($result) {
						$alter = "<span class='success'>Sửa thành công. </span>";
						return $alter;
					}else{
						$alter = "<span class='error'>Sửa thất bại. </span>";
						return $alter;
					}
			}
		}
		public function del_product($id)
		{
			$query = "delete from product where productId ='$id'";
			$result = $this->db->delete($query);
			if ($result) {
					$alter = "<span class='success'>Xóa thành công. </span>";
					return $alter;
				}else{
					$alter = "<span class='error'>Xóa thất bại. </span>";
					return $alter;
				}
		}
		public function getFeatureProducts($value='')// hàm show thông tin sản phẩm nổi bật
		{
			if (!isset($_GET['trang_new'])) {
				$trang_new = 1;
			}else {
				$trang_new = $_GET['trang_new'];
			}
			$tung_trang_new = ($trang_new-1)*4;
			$query = "select * from product where type='0'order by productId desc limit $tung_trang_new,4";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_all_product()// 
		{
			$query = "select * from product ";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_all_product_new()// 
		{
			$query = "select * from product where type='0' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getNewProducts($value='')// hàm show thông tin sản phẩm
		{
			if (!isset($_GET['trang'])) {
				$trang = 1;
			}else {
				$trang = $_GET['trang'];
			}
			$tung_trang = ($trang-1)*4;
			$query = "select * from product order by productId desc limit $tung_trang,4";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_detail($id)
		{
			$query ="select product.*,category.catName,brand.brandName
			from product inner join category on product.catId = category.catId
			inner join brand on product.brandId = brand.brandId
			where product.productId='$id' ";//Chọn từ bảng category sắp xếp theo catId giảm dần.
			$result = $this->db->select($query);
			return $result;
		}
		public function search_product($tukhoa)//Hàm tìm kiếm sản phẩm
		{
			$tukhoa = $this->fm->validation($tukhoa);

			$query = "SELECT * FROM product WHERE productName LIKE '%$tukhoa%'";
			$result = $this->db->select($query);
			return $result;
		}

}
 ?>