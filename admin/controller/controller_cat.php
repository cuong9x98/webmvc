<
<?php 
	include('../../classes/cart.php');
    $cat = new category();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        # //Kiểm tra phương thức gửi dữ liệu của form
        $catName = $_POST['catName'];
        $insertCat =$cat->insert_category($catName);
        echo "Cuong";
    }
 ?>