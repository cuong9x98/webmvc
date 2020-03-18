<?php 
	include('inc/header.php');
	
 ?>
 <?php 
	$login_check = Session::get('customer_login');
	if ($login_check==false) {
	  	header('Location:login.php');
	}
?>
 <?php 
 	// if (!isset($_GET['proid']) || $_GET['proid']==NULL) {
  //           echo "<script>window.location ='404.php'</script>";
            
  //       }else{
  //           $id =$_GET['proid'];
  //       }
    $id = Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['save'])) {
    	$UpdateCustomer = $cs->UpdateCustomer($_POST,$id);
    }
  ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    			<div class="heading">
    				<h3>Sửa Thông Tin Khách</h3>
    			</div>
    			<div class="clear"></div>
    		</div>
        <?php 
            if (isset($UpdateCustomer)) {
              echo $UpdateCustomer;
            }
         ?>
    		<form action="" method="post">
            <table class="tblone">
          <tr>
            <td colspan="" rowspan="" headers="">Tên Khách</td>
            <td colspan="" rowspan="" headers="">Thành Phố</td>
            <td colspan="" rowspan="" headers="">Mã Bưu Chính</td>
            <td colspan="" rowspan="" headers="">Điện Thoại</td>
            <td colspan="" rowspan="" headers="">Chức năng</td>
          </tr>
          <?php 
            $id = Session::get('customer_id');
        
            $get_customer = $cs->show_customer($id);
            if ($get_customer) {
              $result = $get_customer->fetch_assoc();
           ?>
          <tr>
            <td colspan="" rowspan="" headers=""><?php echo $result['name'] ?></td>
            <td colspan="" rowspan="" headers=""><?php echo $result['city'] ?></td>
            <td colspan="" rowspan="" headers=""><?php echo $result['zipcode'] ?></td>
            <td colspan="" rowspan="" headers=""><?php echo $result['phone'] ?></td>
            <td colspan="" rowspan="" headers=""><a href="editprofile.php?id=<?php echo $id ?>"></a></td>
          </tr>
          <?php 
              }
           ?>
           <tr>
            <td colspan="" rowspan="" headers=""><input type="text" name="name"></td>
            <td colspan="" rowspan="" headers=""><input type="text" name="city"></td>
            <td colspan="" rowspan="" headers=""><input type="text" name="zipcode"></td>
            <td colspan="" rowspan="" headers=""><input type="text" name="phone"></td>
            <td colspan="" rowspan="" headers=""><input type="submit" name="save" value="Cập nhật"></td>
          </tr>
        </table>  
        </form>
 		</div>
 	</div>
	 <?php 
 		include('inc/footer.php');
  ?>