<?php 
	include('inc/header.php');
	// include('inc/slider.php');
 ?>
  <?php 
	$login_check = Session::get('customer_login');
		if ($login_check) {
		 header("Location:payment.php");
		}
	?>
 <?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        # //Kiểm tra phương thức gửi dữ liệu của form
        $insertCustomer  = $cs->insert_customer($_POST);
    }
 ?>
 <?php 
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        # //Kiểm tra phương thức gửi dữ liệu của form
        $login_Customer  = $cs->login_customer($_POST);
    }
 ?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Khách Hàng Hiện tại</h3>
        	<p>Điền thông tin vào mẫu để đăng nhập</p>
        	<?php 
        		if (isset($login_Customer)) {
        			echo $login_Customer;
        		}
        	 ?>
        	<form action="" method="post" id="member">
                	<input  type="text" name="email" class="field" placeholder="Enter email...">
                    <input  type="password" name="password" class="field" placeholder="Enter password...">
                 <p class="note">Nếu bạn quên mật khẩu chỉ cần nhập email và click vào đây<a href="#">here</a></p>
                    <div class="buttons"><input style="background: black;color: white;font-size:20px;" type="submit" name="login" class="grey" value="Đăng nhập"></div></form></div></div>

                    </div>
    	<div class="register_account">
    		<h3>Đăng kí tài khoản</h3>
    		<form action="" method="post">
    			<?php 
    				if (isset($insertCustomer)) {
    					echo $insertCustomer;
    				}
    			 ?>
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name" >
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Tên thành phố">
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="zip-code">
							</div>
							<div>
								<input type="text" name="email" placeholder="E-mail">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Địa chỉ">
						</div>
		    		<div>
						<select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Chọn đất nước</option>         
							<option value="AF">Afghanistan</option>
							<option value="AL">Albania</option>
							<option value="DZ">Algeria</option>
							<option value="AR">Argentina</option>
							<option value="AM">Armenia</option>
							<option value="AW">Aruba</option>
							<option value="AU">Australia</option>
							<option value="AT">Austria</option>
							<option value="AZ">Azerbaijan</option>
							<option value="BS">Bahamas</option>
							<option value="BH">Bahrain</option>
							<option value="BD">Bangladesh</option>
							<option value="VN">Việt Nam Vô Địch</option>

		         		</select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Số điện thoại">
		          </div>
				  
				  <div>
					<input type="password" name="password" placeholder="Mật khẩu">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input style="background: black;color: white;font-size:20px;" type="submit" name="submit" class="grey" value="Tạo tài khoản"></div></div>
		    <p class="terms">Click và 'Tạo tài khoản' khi bạn đồng ý các điều khoản.<a href="#">Điều khoản &amp; Điều kiện</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
 		include('inc/footer.php');
  ?>