<?php 
	$filepath =realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
 ?>
<?php 
	/**
	 * 
	 */
	class customer 
	{
		private $db;// Khai báo biến chỉ dc dùng trong file này
		private $fm;
		function __construct()
		{
			$this->db = new Database();//Khai báo biến db trong lớp Database
			$this->fm = new Format();//Khai báo biến db trong lớp Format
		}
		public function insert_customer($data)
		{
			$name = mysqli_real_escape_string($this->db->link,$data['name']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$city = mysqli_real_escape_string($this->db->link,$data['city']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$zipcode = mysqli_real_escape_string($this->db->link,$data['zipcode']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$email = mysqli_real_escape_string($this->db->link,$data['email']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$address = mysqli_real_escape_string($this->db->link,$data['address']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$country = mysqli_real_escape_string($this->db->link,$data['country']);
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);
			$password = mysqli_real_escape_string($this->db->link,md5($data['password']));

			if ($name=="" || $city=="" || $zipcode=="" || $email=="" || $address=="" || $country=="" || $phone=="" || $password=="") {
				$alter = "<span>File must be not empty</span>";
				return $alter;
			}else{
				$query = "SELECT * FROM customer WHERE email='$email' LIMIT 1";
				$result =$this->db->select($query);
				if ($result) {
					$alter = "<span>Email này đã đăng kí rồi.</span>";
					return $alter;
				}else{
				$query = "insert into customer(name,address,city,country,zipcode,phone,email,password) values('$name','$address','$city','$country','$zipcode','$phone','$email','$password')";
				$result = $this->db->insert($query);
				if ($result) {
					$alter = "<span class='success'>Đăng kí mới thành công. </span>";
					return $alter;
				}else{
					$alter = "<span class='error'>Đăng kí thất bại. </span>";
					return $alter;
				}
				}
			}
		}
		public function login_customer($data)
		{
			$email = mysqli_real_escape_string($this->db->link,$data['email']);
			$password = mysqli_real_escape_string($this->db->link,md5($data['password']));

			if ($email=="" || $password=="") {
				$alter = "<span>File must be not empty</span>";
				return $alter;
			}else{
				$query = "SELECT * FROM customer WHERE email='$email' AND password='$password'LIMIT 1";
				$result =$this->db->select($query);
				if ($result!==false) {
					$values =$result->fetch_assoc();
					Session::set('customer_login',true);
					Session::set('customer_id',$values['id']);
					Session::set('customer_name',$values['name']);
					header("Location:order.php");
				}else{
					$alter = "<span>Email hoặc password không đúng.</span>";
					return $alter;
				}
			}
		}
		public function show_customer($id)
		{
			$query ="select * from customer where id='$id' limit 1";//Chọn từ bảng customer sắp xếp theo catId giảm dần trong customer
			$result = $this->db->select($query);
			return $result;
		}
		public function UpdateCustomer($data,$id)
		{
			$id = mysqli_real_escape_string($this->db->link,$id);
			$name = mysqli_real_escape_string($this->db->link,$data['name']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$city = mysqli_real_escape_string($this->db->link,$data['city']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$zipcode = mysqli_real_escape_string($this->db->link,$data['zipcode']);//Kết nối cdsl ,Loại bỏ các kí tự đặc biệt vd: div, '',....
			$phone = mysqli_real_escape_string($this->db->link,$data['phone']);//K


			if ($name=="" || $city=="" || $zipcode=="" || $phone=="") {
				$alter = "<span>Files must be not empty</span>";
				return $alter;
			}else{
				
					$query="update customer set
					name = '$name',
					city = '$city',
					zipcode ='$zipcode',
					phone = '$phone'
					where id='$id'";

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
	}