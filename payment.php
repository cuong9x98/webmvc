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
    				<h3 style="color: red">Chức năng Thanh Toán</h3>
    			</div>
    			<div class="clear"></div>
    		</div>
    		<a href="offline_payment.php">
          <div class="content_top">
          <div class="heading">
            <h3>Thanh Toán Offline</h3>
          </div>
          <div class="clear"></div>
        </div>  
        </a>
        <a href="">
          <div class="content_top">
          <div class="heading">
            <h3>Thanh Toán Online</h3>
          </div>
          <div class="clear"></div>
        </div>  
        </a>
 		</div>
 	</div>
	 <?php 
 		include('inc/footer.php');
  ?>