<?php
include_once "inc/header.php";
//include_once "inc/slider.php";


?>
<?php
if(!isset($_GET['product_id']) || $_GET['product_id']==NULL ){
    echo "<script>window.location='404.php'</script>";
}else{
    $id = $_GET['product_id'];
}
$customer_id = session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
	$product_id = $_POST['product_id'];
	$insertCompare = $product->insert_compare($product_id,$customer_id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {
	$product_id = $_POST['product_id'];
	$insertWishlist = $product->insert_wishlist($product_id,$customer_id);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	$quantity = $_POST['quantity'];
	$insertCart = $cart->add_to_cart($quantity,$id);
}

?>
<style>
.buysubmit1{
	background: #602d8d url("../images/large-button-overlay.png") repeat scroll 0 0;
	border: 1px solid rgba(0, 0, 0, 0.1);
	border-radius: 5px;
	color: #fff;
	font-family: Arial,"Helvetica Neue","Helvetica",Tahoma,Verdana,sans-serif;
	font-size: 0.8em;
	padding: 7px 15px;
	text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
	cursor:pointer;
	outline:none;
}
.buysubmit2{
	background: #602d8d url("../images/large-button-overlay.png") repeat scroll 0 0;
	border: 1px solid rgba(0, 0, 0, 0.1);
	border-radius: 5px;
	color: #fff;
	font-family: Arial,"Helvetica Neue","Helvetica",Tahoma,Verdana,sans-serif;
	font-size: 0.8em;
	padding: 7px 15px;
	text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
	cursor:pointer;
	outline:none;
	float:right;
	position: relative;
	top:-31px;
	left:-78px;
}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
		<?php
		$getproduct_details = $product->get_details($id);
		if($getproduct_details){
			while($result_details = $getproduct_details->fetch_assoc() ){

		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['product_image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['product_name']?></h2>
					<p><?php echo $result_details['product_content']?></p>					
					<div class="price"> 
					<?php
					 $num = $result_details['product_price'];
					 $pricefm = number_format($num)
					 ?>
						<p>Giá: <span><?php echo $pricefm." "."VNĐ"?></span></p>
						<p>Danh mục: <span><?php echo $result_details['cate_name']?></span></p>
						<p>Hãng:<span><?php echo $result_details['brand_name']?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Mua hàng"/><br><br>
						 <?php

						?> 
					</form>				
				</div>
				<div class="add-cart">
					<div class="button_details">
					<form action="" method="post">
						<!-- <a href="?wishlist=<?php echo $result_details['product_id']?>" class="buysubmit">Yêu thích sản phẩm</a>		 -->
						<!-- <a href="?compare=<?php echo $result_details['product_id']?>" class="buysubmit">So sánh sản phẩm</a> -->
						<input type="hidden" class="product_id" name="product_id" value="<?php echo $result_details['product_id']?>"/>

						<?php
							$check_login = session::get('customer_login'); 
							if($check_login){
								echo '<input type="submit" class="buysubmit1" name="compare" value="So sánh sản phẩm"/>.   ';
								 
							}else{
								echo ''; 
							}
						?>
							
						<?php
							if(isset($insertCompare)){
								echo $insertCompare;
							}
						?>	
					</form>


					<form action="" method="post">
						<!-- <a href="?wishlist=<?php echo $result_details['product_id']?>" class="buysubmit">Yêu thích sản phẩm</a>		 -->
						<!-- <a href="?compare=<?php echo $result_details['product_id']?>" class="buysubmit">So sánh sản phẩm</a> -->
						<input type="hidden" class="product_id" name="product_id" value="<?php echo $result_details['product_id']?>"/>

						<?php
							$check_login = session::get('customer_login'); 
							if($check_login){
								 
								echo '<input type="submit" class="buysubmit2" name="wishlist" value="Sản phẩm yêu thích" />';
							}else{
								echo ''; 
							}
						?>
							
						<?php
							if(isset($insertWishlist)){
								echo $insertWishlist;
							}
						?>	
						</form>
					</div>
				</div>
			</div>
			<div class="product-desc">
			<h2>Trạng thái</h2>
			<p><?php echo $result_details['product_content']?></p>
	    </div>
				
	</div>
	<?php
		}
	}

	?>
				<div class="rightsidebar span_3_of_1">
					<h2>Danh mục</h2>
					<ul>
					<?php
						$getAllCate = $cate->show_category_fontend();
						if($getAllCate){
							while($result =$getAllCate->fetch_assoc()){

					?>
					
				      <li><a href="productbycat.php?cate_id=<?php echo $result['cate_id']?>"><?php echo $result['cate_name']?></a></li>
				      <?php
							}
						} 
					  ?>
    				</ul>
    	
 				</div>
				
 		</div>
 	</div>

	 <?php
include_once "inc/footer.php";

?>

