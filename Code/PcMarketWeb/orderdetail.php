<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php
 //    if(isset($_GET['cartid'])){
 //        $cartid = $_GET['cartid']; 
 //        $delcart = $ct->del_product_cart($cartid);
 //    }
        
	// if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
 //        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
 //        $cartId = $_POST['cartId'];
 //        $quantity = $_POST['quantity'];
 //        $update_quantity_Cart = $ct -> update_quantity_Cart($cartId, $quantity); // hàm check catName khi submit lên
 //    	if ($quantity <= 0) {
 //    		$delcart = $ct->del_product_cart($cartId);
 //    	}
 //    } 
 ?>
<?php 
	// $login_check = Session::get('customer_login');
	//   if ($login_check==false) {
	//   	header('Location:login.php');
	//   }
 ?>
 <?php
	// if(isset($_GET['confirmid'])){
    //  	$id = $_GET['confirmid'];
    //  	$time = $_GET['time'];
    //  	$price = $_GET['price'];
    //  	$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
    // }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			<h3 style="font-weight:bold;color:#666;font-size:30px">Chi tiết đơn hàng</h3><br>

						<table class="tblone">
							<tr>
								<th width="10%">Tên </th>
								<th width="15%">Hình ảnh</th>
								<th width="15%">Giá</th>
								<th width="15%">Số lượng</th>
								<th width="10%">Ngày</th>
								<th width="10%">Trạng thái</th>

							</tr>
							<?php
							$customer_id = Session::get('customer_id');  
							$get_cart_ordered = $cart->get_cart_ordered($customer_id);
							if($get_cart_ordered){
								$qty = 0;
								while ($result = $get_cart_ordered->fetch_assoc()) {
							 ?>
							<tr>
								<td><?php echo $result['product_name'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['product_image'] ?>" alt="" width="100px"/></td>
								<td><?php echo $result['product_price'].' VND' ?></td>
								<td><?php echo $result['quantity'] ?></td>
								<td><?php echo $fm->formatDate($result['order_date'])  ?></td>
								<td>
								<?php 
								if($result['order_status'] =='0'){
									echo 'Đang chờ xử lý';
								}else{
									echo 'Đã gửi hàng';
								}
								?>
								</td>

								<?php 
									}
								}
								 ?>
							</tr>

	
						</table>
						
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>
