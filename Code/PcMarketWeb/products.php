<?php
include_once "inc/header.php";
include_once "inc/slider.php";


?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Intel</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		  	<?php
			 $productList = $product->get_all_product_list();
			 if($productList) {
				 while($result = $productList->fetch_assoc()){

			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result['product_image']?>" alt="" /></a>
					 <h2><?php echo $result['product_name']?></h2>
					 <p><?php echo $result['product_content']?></p>
					 <?php
					 $num = $result['product_price'];
					 $pricefm = number_format($num)
					 ?>
					 <p><span class="price"><?php echo $pricefm." "."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?product_id=<?php echo $result['product_id']?>" class="preview">details</a></span></div>
				</div>
				<?php
					 }
					}
				?>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>Asus</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php
			 $productList = $product->get_all_product_list2();
			 if($productList) {
				 while($result = $productList->fetch_assoc()){

			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php"><img src="admin/uploads/<?php echo $result['product_image']?>" alt="" /></a>
					 <h2><?php echo $result['product_name']?></h2>
					 <p><?php echo $result['product_content']?></p>
					 <?php
					 $num = $result['product_price'];
					 $pricefm = number_format($num)
					 ?>
					 <p><span class="price"><?php echo $pricefm." "."VNĐ" ?></span></p>
				     <div class="button"><span><a href="details.php?product_id=<?php echo $result['product_id']?>" class="preview">details</a></span></div>
				</div>
				<?php
				 }
				}
				?>
				
			</div>
    </div>
 </div>
 <?php
include_once "inc/footer.php";

?>


