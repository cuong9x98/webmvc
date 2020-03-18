<?php 
	$filepath =realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
 ?>

<?php 
	/**
	 * 
	 */
	class brand 
	{
		private $db;// Khai báo biến chỉ dc dùng trong file này
		private $fm;
		function __construct()
		{
			$this->db = new Database();//Khai báo biến db trong lớp Database
			$this->fm = new Format();//Khai báo biến db trong lớp Format
		}
		public function insert_brand($brandName)//Hàm trả về kết quả insert data.
		{
			$brandName = $this->fm->validation($brandName);// 
			$brandName = mysqli_real_escape_string($this->db->link,$brandName);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			
			if (empty($brandName)) {
				$alter = "<span>Brand must be not empty</span>";
				return $alter;
			}else{
				$query = "insert into brand(brandName) values('$brandName')";
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
		public function show_brand()//Hàm show data trong danh mục 
		{
			$query ="select * from brand order by brandId desc";//Chọn từ bảng category sắp xếp theo catId giảm dần.
			$result = $this->db->select($query);
			return $result;
		}
		public function getcatbyId($id)
		{
			$query = "select * from brand where brandId ='$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_brand($brandName,$id)
		{
			$brandName = $this->fm->validation($brandName);// 
			$brandName = mysqli_real_escape_string($this->db->link,$brandName);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',.... 
			$id = mysqli_real_escape_string($this->db->link,$id);
			if (empty($brandName)) {
				$alter = "<span>Category must be not empty</span>";
				return $alter;
			}else{
				$query = "update brand set brandName ='$brandName' where brandId = '$id'";
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
		public function del_brand($id)
		{
			$query = "delete from brand where brandId ='$id'";
			$result = $this->db->delete($query);
			if ($result) {
					$alter = "<span class='success'>Xóa thành công. </span>";
					return $alter;
				}else{
					$alter = "<span class='error'>Xóa thất bại. </span>";
					return $alter;
				}
		}
	}

 ?>