<?php
include_once "inc/header.php";
include_once "inc/slider.php";

?>

<?php
if(isset($_GET["cart_id"])){
	$cart_id = $_GET["cart_id"];
	$delCart = $cart->delete_cart($cart_id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$cart_id = $_POST['cart_id'];
	$quantity = $_POST['quantity'];
	$updateQuantityCart = $cart->update_quantity_cart($quantity,$cart_id);
	if($quantity <= 0){
		$delCart = $cart->delete_cart($cart_id);
	}
}	

?>


 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ hàng</h2>
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
								<th width="20%">Tên</th>
								<th width="10%">Ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
					 			<th width="20%">Tổng giá</th>
								<th width="10%">Hành động</th>
							</tr>
							<?php
                            $getproduct_cart = $cart->get_product_cart();
							if($getproduct_cart){
								$subTotal = 0;
								$quantity = 0;
								
								while ($result = $getproduct_cart->fetch_assoc()) {
                            ?>
								<td><?php echo $result['product_name']?></td>
								<td><img src="admin/uploads/<?php echo $result['product_image']?>" alt=""/></td>
								<?php
								$num = $result['product_price'];
								$priceFm = number_format($num );
				
								?>
								<td><?php echo $priceFm. " ". "VNĐ"?></td>
								<td>
									<form action="" method="post">
									<input type="hidden" name="cart_id" min ="0" value="<?php echo $result['cart_id']?>"/>
										<input type="number" name="quantity" min ="0" value="<?php echo $result['quantity']?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td><?php
								$total = $result['product_price']*$result['quantity'];
								$num = $total;
								$totalFm = number_format($num);
								echo $totalFm;
								?></td>
								<td><a href="?cart_id=<?php echo $result['cart_id']?>">Xóa</a></td>
								
							</tr>
						<?php
						
							$subTotal += $total;
							
                                }
                            }
                        ?>
						</table>
						<?php
						$checkCart = $cart->check_cart();
						if($checkCart){
						
						?>
						<table style="float:right;text-align:left;" width="40%">
						
							<tr>
								<th>Tổng tiền : </th>
								<td><?php
									$num = $subTotal;
									$subTotalFm = number_format($num);
									echo $subTotalFm;
									
									
								?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Tổng cộng :</th>
								<td><?php
								$vat = $subTotal * 0.1;
								$grandTotal = $subTotal + $vat;
								$num = $grandTotal;
								$grandTotalFm = number_format($num);
								echo $grandTotalFm;
								session::set('sum',$grandTotalFm);
								?></td>
							</tr>
					   </table>
					   <?php
						}  else{
							echo "Giỏ hàng trống ";
						}
					   ?>
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




