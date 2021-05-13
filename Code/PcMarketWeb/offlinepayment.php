<?php
include_once "inc/header.php";
//include_once "inc/slider.php";


?>
<?php
if(isset($_GET['order_id']) && $_GET['order_id']=='order' ){
    $customer_id = session::get('customer_id');
	$insertOder = $cart->insert_order($customer_id);
	$delAllCart = $cart->dell_all_data_cart();
	header('location:success.php');
}


?>
<style>
.box_product{
	width:52%;
	border:2px solid black;
	float:left;
	padding:4px;
}
.box_customer{
	width:44%;
	border:2px solid black;
	float:right;
	padding:4px;
}
.submit_order{
	background-color:red;
	color:white;
	padding:10px;
	position:relative;
	top:110px;
	left:200px
}



</style>
<form action="" method="post" enctype="multipart/form-data">
 <div class="main">
    <div class="content">
    	<div class="section group">
			<div class="heading">
                    <h3>Thanh toán trực tiếp</h3>
                	</div>
                <div class="clear"></div>
					<div class="box_product">
					<div class="cartpage">
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
								<th width="15%">Tên</th>
								<th width="20%">Ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
					 			<th width="10%">Tổng giá</th>

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
								
									<?php echo $result['quantity']?>

								</td>
								<td><?php
								$total = $result['product_price']*$result['quantity'];
								$num = $total;
								$totalFm = number_format($num);
								echo $totalFm;
								?></td>

								
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
						<table style="float:right;text-align:left;width=40%;border: 2px solid black" >
						
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
					</div>
					<div class="box_customer">
					<div class="profile">
					<h3 style="color:black;font-size:18px;weight:bold">Thông tin khách hàng</h3>
                    <table class="tblone">
                    <?php
                    $id = session::get('customer_id');
                    $getCustomer = $customer->show_customer($id);
                    if($getCustomer){
                        while($result=$getCustomer->fetch_assoc()){
                   
                    ?>
                        <tr>
                            <td>Tên</td>
                            <td>:</td>
                            <td><?php echo $result['cus_name']?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>:</td>
                            <td><?php echo $result['cus_address']?></td>
                        </tr>
                        <tr>
                            <td>Thành phố</td>
                            <td>:</td>
                            <td><?php echo $result['cus_city']?></td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td><?php echo $result['cus_zipcode']?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $result['cus_email']?></td>
                        </tr>
                        <tr>
                            <td>Quê quán</td>
                            <td>:</td>
                            <td><?php echo $result['cus_country']?></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>:</td>
                            <td><?php echo $result['cus_phone']?></td>
                        </tr>
                        <tr>
                           <td colspan="3"><button type="submit" name="update" style="font-size:17px"><a href="editprofile.php">Cập nhập</a></button></td>
                           
                        </tr>
                        
                        <?php
                                 
                                }
                            }
                        ?>
                    </table>
				</div>
					</div>
						<a href="?order_id=order" class="submit_order">Đặt hàng</a>
						<!-- <button>Đặt hàng</button> -->
 				</div>
				
 		</div>
 	</div>
</form>
	 <?php
include_once "inc/footer.php";

?>

