<?php 
	$filepath =realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
 ?>

<?php 
	/**
	 * 
	 */
	class category 
	{
		private $db;// Khai báo biến chỉ dc dùng trong file này
		private $fm;
		function __construct()
		{
			$this->db = new Database();//Khai báo biến db trong lớp Database
			$this->fm = new Format();//Khai báo biến db trong lớp Format
		}
		public function insert_category($catName)//Hàm trả về kết quả insert data.
		{
			$catName = $this->fm->validation($catName);// 
			$catName = mysqli_real_escape_string($this->db->link,$catName);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			
			if (empty($catName)) {
				$alter = "<span>Category must be not empty</span>";
				return $alter;
			}else{
				$query = "insert into category(catName) values('$catName')";
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
		public function show_category()//Hàm show tất cả dữ liệu trong danh sách loại sản phẩm
		{
			$query ="select * from category order by catId desc";//Chọn từ bảng category sắp xếp theo catId giảm dần trong category
			$result = $this->db->select($query);
			return $result;
		}
		public function getcatbyId($id)//Hàm lấy dữ liệu category theo catId trong category
		{
			$query = "select * from category where catId ='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_category($catName,$id)//Hàm sửa loại sản phẩm trong category
		{
			$catName = $this->fm->validation($catName);// 
			$catName = mysqli_real_escape_string($this->db->link,$catName);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',.... 
			$id = mysqli_real_escape_string($this->db->link,$id);
			if (empty($catName)) {
				$alter = "<span>Category must be not empty</span>";
				return $alter;
			}else{
				$query = "update category set catName ='$catName' where catId = '$id'";
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
		public function del_category($id)// Hàm dùng xóa loại sản phẩm trong danh sách sản phẩm
		{
			$query = "delete from category where catId ='$id'";
			$result = $this->db->delete($query);
			if ($result) {
					$alter = "<span class='success'>Xóa thành công. </span>";
					return $alter;
				}else{
					$alter = "<span class='error'>Xóa thất bại. </span>";
					return $alter;
				}
		}
		public function showdetail_category()//Hàm show data trong danh mục loại 2 tránh trường hợp 2 admin sử dụng
		{
			$query ="select * from category order by catId desc";//Chọn từ bảng category sắp xếp theo catId giảm dần.
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_cat($id)// Lấy dữ liệu của product từ catId
		{
			$query ="select * from product  where catId ='$id' order by catId desc limit 8";//Chọn từ bảng category sắp xếp theo catId giảm dần.
			$result = $this->db->select($query);
			return $result;
		}
	}

 ?>