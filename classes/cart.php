<?php 
	$filepath =realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
 ?>
<?php 
	/**
	 * 
	 */
	class cart 
	{
		private $db;// Khai báo biến chỉ dc dùng trong file này
		private $fm;
		function __construct()
		{
			$this->db = new Database();//Khai báo biến db trong lớp Database
			$this->fm = new Format();//Khai báo biến db trong lớp Format
		}
		
		public function add_to_cart($quarity,$id)
		{
			$id = mysqli_real_escape_string($this->db->link,$id);
			$quarity = mysqli_real_escape_string($this->db->link,$quarity);
			$sId = session_id();

			$query = "select * from product where productId = '$id'";
			$result = $this->db->select($query)->fetch_assoc();

			$productName = $result['productName'];
			$price = $result['price'];
			$image = $result['image'];

			$check_cart="select * from cart where productId = '$id' and sId ='$sId'";
			$getpro = $this->db->select	($check_cart);
			if ($getpro) {
				$msg ="Sản phẩm đã có trong giỏ";
				return $msg;
			}else{

			$query_insert = "insert into cart(productId,sId,productName,price,quarity,image) values('$id','$sId','$productName','$price','$quarity','$image')";
				$insert_cart = $this->db->insert($query_insert);
				if ($result) {
					header("Location:cart.php");
				}else{
					header("Location:404.php");
				}
			}
		}
		public function get_product_cart()
		{
			$sId = session_id();
			$query ="select * from cart where sId ='$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		 function update_quarity_Cart($quarity,$cartId)
		{
			$cartId = mysqli_real_escape_string($this->db->link,$cartId);
			$quarity = mysqli_real_escape_string($this->db->link,$quarity);

			$query="update cart set
					quarity ='$quarity'
					where carId='$cartId'";
					
			$result = $this->db->update($query);
			if ($result) {
				$alter = "<span class='error'>Sửa thành công. </span>";
				return $alter;
			}else{
				$alter = "<span class='error'>Sửa thất bại. </span>";
				return $alter;
			}
		}
		public function del_cart($id)
		{
			$query = "delete from cart where carId ='$id'";
			$result = $this->db->delete($query);
			if ($result) {
					$alter = "<span class='success'>Xóa thành công. </span>";
					return $alter;
				}else{
					$alter = "<span class='error'>Xóa thất bại. </span>";
					return $alter;
				}
		}
		public function check_cart()
		{
			$sId = session_id();
			$query ="select * from cart where sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_all_data_cart()//Xóa thông tin giỏ hàng theo id
		{
			$sId = session_id();
			$query ="DELETE FROM cart where sId = '$sId'";
			$result = $this->db->delete($query);
			return $result;
		}
		public function insertOrder($customer_id)//Hàm thêm hóa đơn và bảng order
		{
			$sId = session_id();
			$query ="SELECT * FROM cart WHERE sId ='$sId'";
			$get_product = $this->db->select($query);
			if ($get_product) {
				while($result = $get_product->fetch_assoc()) {
					$productid = $result['productId'];
					$productName = $result['productName'];
					$quarity = $result['quarity'];
					$price = $result['price']*$quarity;
					$image = $result['image'];
					$customer_id = $customer_id;
					$query_order = "INSERT INTO orders(productId,productName,customer_id,quarity,price,image) VALUES('$productid','$productName','customer_id','$quarity','$price','$image')";
					$insert_order = $this->db->insert($query_order);
				}
			}
		}
		public function getAmountPrices($customer_id)//Hàm tính tổng tiền hiện ra trang success
		{
			$query = "SELECT * FROM orders WHERE customer_id='$customer_id' AND date_order = now()";
			$get_price = $this->db->select($query);
			return $get_price;
		}
		public function get_cart_ordered($customer_id)
		{
			$query = "SELECT price FROM orders WHERE customer_id ='$customer_id'";
			$get_cart_ordered = $this->db->select($query);
			return $get_cart_ordered;
		}
		public function get_inbox_cart()
		{
			$query = "SELECT * FROM orders ORDER BY date_order";
			$get_inbox_cart = $this->db->select($query);
			return $get_inbox_cart;
		}
		public function shitfed($id, $time, $price)
		{
			$id = mysqli_real_escape_string($this->db->link,$id);
			$time = mysqli_real_escape_string($this->db->link,$time);
			$price = mysqli_real_escape_string($this->db->link,$price);

			$query="update orders set
					status ='1'
					where id='$id' and date_order='$time' and price='$price'";
					
			$result = $this->db->update($query);
			if ($result) {
				$alter = "<span class='error'>Sửa thành công. </span>";
				return $alter;
			}else{
				$alter = "<span class='error'>Sửa thất bại. </span>";
				return $alter;
			}
		}
		public function del_shitfed($delid,$time,$price)
		{
			$query ="DELETE FROM orders where id='$delid' and date_order='$time' and price='$price'";
			$result = $this->db->delete($query);
			if ($result) {
				$alter = "<span class='error'>Xóa thành công. </span>";
				return $alter;
			}else{
				$alter = "<span class='error'>Xóa thất bại. </span>";
				return $alter;
			}
		}
}
 ?>