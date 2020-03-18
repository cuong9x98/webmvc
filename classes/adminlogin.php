<?php 

	$filepath =realpath(dirname(__FILE__));
	include_once($filepath.'/../lib/session.php');
	Session::checkLogin();
	
	
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
 
 ?>

<?php 
	/**
	 * 
	 */
	class adminlogin 
	{
		private $db;// Khai báo biến chỉ dc dùng trong file này
		private $fm;
		function __construct()
		{
			$this->db = new Database();//Khai báo biến db trong lớp Database
			$this->fm = new Format();//Khai báo biến db trong lớp Format
		}
		public function login_admin($adminUser,$adminPass)
		{
			$adminUser = $this->fm->validation($adminUser);// Kiểm tra các dấu gạch chéo gạch ngang
			$adminPass = $this->fm->validation($adminPass);// Kiểm tra các dấu gạch chéo gạch ngang

			$adminUser = mysqli_real_escape_string($this->db->link,$adminUser);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$adminPass = mysqli_real_escape_string($this->db->link,$adminPass);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			//Kiểm tra use và pass có trống không
			if (empty($adminUser)|| empty($adminPass)) {
				$alter = "User or Password must bo not be empty";
				return $alter;
			}else{
				$query = "select * from admin where adminUser = '$adminUser' and adminPass = '$adminPass' limit 1";
				$result = $this->db->select($query);
				if ($result != false) {
					$value = $result->fetch_assoc();//Trả về dữ liệu.
					Session::set('adminlogin', true);
					Session::set('adminId',$value['adminId']);
					Session::set('adminUser',$value['adminUser']);
					Session::set('adminName',$value['adminName']);
					header('Location:index.php');
				}else{
					$alter = "User or Password not match";
					return $alter;
				}
			}
		}
	}
 ?>