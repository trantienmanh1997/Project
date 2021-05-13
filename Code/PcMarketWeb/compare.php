<?php
include_once "inc/header.php";
include_once "inc/slider.php";

?>

<?php
// if(isset($_GET["cart_id"])){
// 	$cart_id = $_GET["cart_id"];
// 	$delCart = $cart->delete_cart($cart_id);
// }
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
// 	$cart_id = $_POST['cart_id'];
// 	$quantity = $_POST['quantity'];
// 	$updateQuantityCart = $cart->update_quantity_cart($quantity,$cart_id);
// 	if($quantity <= 0){
// 		$delCart = $cart->delete_cart($cart_id);
// 	}
// }	

?>


 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h3 style="font-size:30px;color:#666;font-weight:bold">So sánh sản phẩm</h3>
					<?php
					if(isset($updateQuantityCart)){
						 echo $updateQuantityCart;
					
					}	
					
					?>
					<?php
						if(isset($delCart)){
							echo $delCart;
					   }
					?>
						<table class="tblone">
							<tr>
					   			<th width="10%">ID</th>
								<th width="30%">Tên</th>
								<th width="30%">Ảnh</th>
								<th width="20%">Giá</th>
								<th width="10%">Hành động</th>


							</tr>
							<?php
							$customer_id = session::get('customer_id');
                            $getCompareProduct = $product->get_compare_product($customer_id);
							if($getCompareProduct){
								$subTotal = 0;
								$quantity = 0;
								$i = 0;
								while ($result = $getCompareProduct->fetch_assoc()) {
									$i++; 
                            ?>
								<td><?php echo $i?></td>
								<td><?php echo $result['product_name']?></td>
								<td><img src="admin/uploads/<?php echo $result['product_image']?>"  alt=""/></td>
								<?php
								$num = $result['product_price'];
								$priceFm = number_format($num );
				
								?>
								<td><?php echo $priceFm. " ". "VNĐ"?></td>

								<td><a href="details.php?product_id=<?php echo $result['product_id']?>">View</a></td>
								
							</tr>
						<?php
 
                                }
                            }
                        ?>
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
include_once "inc/footer.php";

?>




