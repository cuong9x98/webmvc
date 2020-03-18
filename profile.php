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
  //   if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
  //   	$quarity = $_POST['quarity'];
  //      	$AddtoCart = $ct->add_to_cart($quarity,$id);
  //   }
  ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="content_top">
    			<div class="heading">
    				<h3>Thông Tin</h3>
    			</div>
    			<div class="clear"></div>
    		</div>
    		<table class="tblone">
    			<tr>
    				<td colspan="" rowspan="" headers="">Tên Khách</td>
    				<td colspan="" rowspan="" headers="">Thành Phố</td>
    				<td colspan="" rowspan="" headers="">Mã Bưu Chính</td>
    				<td colspan="" rowspan="" headers="">Điện Thoại</td>
    				<td colspan="" rowspan="" headers="">Email</td>
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
    				<td colspan="" rowspan="" headers=""><?php echo $result['email'] ?></td>
    				<td colspan="" rowspan="" headers=""><a href="editprofile.php">Sửa</a></td>
    			</tr>
    			<?php 
    					}
    			 ?>
    			 
    		</table>
 		</div>
 	</div>
	 <?php 
 		include('inc/footer.php');
  ?>