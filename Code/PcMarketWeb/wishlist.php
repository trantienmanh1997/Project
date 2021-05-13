<?php
include_once "inc/header.php";
include_once "inc/slider.php";

?>
<?php
   if(isset($_GET['product_id'])){
        $customer_id = session::get('customer_id');
        $product_id = $_GET['product_id']; 
        $delWishList = $product->delete_wishlist($product_id,$customer_id);
    }
?>

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
    
			    	<h3 style="font-size:30px;color:#666;font-weight:bold">Sản phẩm yêu thích</h3>
					<?php
                        if(isset($delWishList)){
                            echo $delWishList;
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
                            $getWishlist = $product->get_wishlist($customer_id);
							if($getWishlist){
								$subTotal = 0;
								$quantity = 0;
								$i = 0;
								while ($result = $getWishlist->fetch_assoc()) {
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

								<td>
                                <a href="?product_id=<?php echo $result['product_id']?>" style="color:red">Xóa |</a>
                                <a href="details.php?product_id=<?php echo $result['product_id']?>" style="color:red">Mua</a>
                                
                                </td>
								
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




                            