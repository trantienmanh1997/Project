<?php
include_once "inc/header.php";
include_once "inc/slider.php";

?>
<?php
		 	$check_login = session::get('customer_login');
			 if($check_login==false){
				//header('location:login.php');
			 }
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm nổi bật</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  <?php
		 $product_feathered = $product->getproduct_feathered() ;
			if($product_feathered){
				while($result =$product_feathered->fetch_assoc() ){

		 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result['product_image']?>" width ="150px" alt="" /></a>
					 <h2><?php echo $result['product_name']?> </h2>
					 <p><?php echo $fm->textShorten($result['product_content'],20)?></p>
					 <?php
					 $num = $result['product_price'];
					 $pricefm = number_format($num)
					 ?>
					 <p><span class="price"><?php echo $pricefm." "."VNĐ"?></span></p>
				     <div class="button"><span><a href="details.php?product_id=<?php echo $result['product_id']?>" class="preview">details</a></span></div>
				</div>
				<?php
						}
					}
				?>
			
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
		 $product_new = $product->getproduct_new() ;
			if($product_new){
				while($result_new =$product_new->fetch_assoc() ){

		 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result_new['product_image']?>" width ="150px" alt="" /></a>
					 <h2><?php echo $result_new['product_name']?> </h2>
					 <p><?php echo $fm->textShorten($result_new['product_content'],20)?></p>
					 <?php
					 $num = $result_new['product_price'];
					 $pricefm = number_format($num)
					 ?>
					 <p><span class="price"><?php echo $pricefm." "."VNĐ"?></span></p>
				     <div class="button"><span><a href="details.php?product_id=<?php echo $result_new['product_id']?>" class="preview">details</a></span></div>
				</div>
				<?php
				}
			}
				
				?>
			</div>
			<div class="">
				<?php
				$product_all = $product->get_all_product() ;
				$product_count = mysqli_num_rows($product_all);
				$product_button = ceil($product_count /4);
 
				$i = 0;
				echo '<span>Trang: </span>';
				for($i=1;$i<$product_button;$i++){
					 echo '<a style="margin:0 5px" href="index.php?trang='.$i.'">'.$i.'</a>';
					
				}
				?>
			</div>
    </div>
 </div>
<?php
include_once "inc/footer.php";

?>


