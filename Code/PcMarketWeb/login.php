<?php
include_once "inc/header.php";
//include_once "inc/slider.php";
?>
<?php
		 	$check_login = session::get('customer_login');
			 if($check_login){
				 header('location:index.php');
			 }
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

// var_dump($_POST['product_content']); exit;

$insertCustomer = $customer->insert_customer($_POST);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {

// var_dump($_POST['product_content']); exit;

$loginCustomer = $customer->login_customer($_POST);
}

?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng nhập</h3>
			<?php
				if(isset($loginCustomer)){
					echo $loginCustomer;
				}
			
			?>
        	<form action="" method="post" id="member">
                	<input type="text" name="cus_email" placeholder="Vui lòng điền email">
                    <input type="password" name="cus_password" placeholder="Vui lòng điền mật khẩu">
                 
                 <p class="note">Nếu như bạn quên mật khẩu hãy điền email và nhấp vào <a href="#">đây</a></p>
                    <div class="buttons"><div><input style="font-size:19px;background:white;color:white;background-color:black" type="submit" name ="login" value="Đăng nhập"></div></div>
					</form>
                    </div>
    	<div class="register_account">
    		<h3>Đăng ký</h3>
			<?php
				if(isset($insertCustomer)){
					echo $insertCustomer;
				}
			
			?>
    		<form action = "" method = "post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="cus_name" placeholder = "Vui lòng nhập tên" >
							</div>
							
							<div>
							   <input type="text" name="cus_city" placeholder = "Vui lòng nhập thành phố">
							</div>
							
							<div>
								<input type="text" name="cus_zipcode" placeholder = "Vui lòng nhập code">
							</div>
							<div>
								<input type="text" name="cus_email" placeholder = "Vui lòng nhập email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="cus_address" placeholder = "Vui lòng nhập địa chỉ" >
						</div>
		    		<div>
						<select id="country" name="cus_country" onchange="change_country(this.value)" class="frm-field required">
							<option value="null">Quê quán</option>         
							<option value="VN">Việt Nam</option>
							<option value="SG">Singapore</option>
							<option value="HK">HongKong</option>
							<option value="AM">Mỹ</option>
							<option value="TQ">Trung Quốc</option>
							<option value="NB">Nhật Bản</option>
							<option value="RS">Nga</option>
							<option value="GM">Đức</option>
							

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="cus_phone" placeholder = "Vui lòng nhập số điện thoại" >
		          </div>
				  
				  <div>
					<input type="text" name="cus_password" placeholder = "Vui lòng nhập mật khẩu">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input style="font-size:19px;background:white;color:white;background-color:black" type="submit" name ="submit" value="Tạo tài khoản"></div></div>
		   
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
include_once "inc/footer.php";

?>

