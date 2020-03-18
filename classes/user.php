<?php 
	$filepath =realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
 ?>
<?php 
	/**
	 * 
	 */
	class user 
	{
		private $db;// Khai báo biến chỉ dc dùng trong file này
		private $fm;
		function __construct()
		{
			$this->db = new Database();//Khai báo biến db trong lớp Database
			$this->fm = new Format();//Khai báo biến db trong lớp Format
		}
		

}
 ?>