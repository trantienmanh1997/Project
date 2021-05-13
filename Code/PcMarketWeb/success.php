<?php 
	include_once 'inc/header.php';
	include_once 'inc/slider.php';
 ?>	
 <?php
 if(isset($_GET['order_id']) && $_GET['order_id']=='order'){
	 $customer_id = session::get('customer_id');
	 $insertOrder = $cart->insert_order($customer_id);
	 $dellAllCart = $cart->dell_all_data_cart();
	 header('location:success.php');
 }
 ?>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
				<div class="section-group">
				<?php
				 $customer_id = session::get('customer_id');
				$getAmountPrice = $cart->get_amount_price($customer_id);
				if($getAmountPrice){
					$amount= 0;
					while($result=$getAmountPrice->fetch_assoc()){

					}
				}
				?>
					<h style="color:green;text-align:center">Đặt hàng thành công!!!</h3>
					<p style="text-align:center;color:black">Xem lại đơn hàng của bạn tại <a href="orderdetail.php">đây</a></p>
				</div>
					
			</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
	include 'inc/footer.php';
 ?>