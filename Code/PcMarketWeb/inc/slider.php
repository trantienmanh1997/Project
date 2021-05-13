
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
			<?php
			$getLastestIntel = $product->get_lastest_intel();
			if($getLastestIntel){
				while($resultIntel =$getLastestIntel->fetch_assoc() ){

			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $resultIntel['product_image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Intel</h2>
						<p><?php echo $resultIntel['product_content']?></p>
						<div class="button"><span><a href="details.php?product_id=<?php echo $resultIntel['product_id']?>">Mua hàng</a></span></div>
				   </div>
			   </div>	
			   <?php
					}
				}  
			   ?>	
			   <?php
			   $getLastestAsus = $product->get_lastest_asus();
			   if($getLastestAsus){
				   while($resultAsus =$getLastestAsus->fetch_assoc() ){
			 
			 ?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="admin/uploads/<?php echo $resultAsus['product_image']?>" alt=""  /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Asus</h2>
						  <p><?php echo $resultAsus['product_content']?></p>
						  <div class="button"><span><a href="details.php?product_id=<?php echo $resultAsus['product_id']?>">Mua hàng</a></span></div>
					</div>
				</div>
			</div>
			<?php
				   }
				}
			?>
			<div class="section group">
			<?php
			$getLastestCorsair = $product->get_lastest_corsair();
			if($getLastestCorsair){
				while($resultCorsair =$getLastestCorsair->fetch_assoc() ){
			?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="admin/uploads/<?php echo $resultCorsair['product_image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Corsair</h2>
						<p><?php echo $resultCorsair['product_content']?></p>
						<div class="button"><span><a href="details.php?product_id=<?php echo $resultCorsair['product_id']?>">Mua hàng</a></span></div>
				   </div>
			   </div>	
			   <?php
					}
				}  
			   ?>	
			   <?php
			   $getLastestEdra = $product->get_lastest_edra();
			   if($getLastestEdra){
				   while($resultEdra =$getLastestEdra->fetch_assoc() ){
			 
			 ?>	
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="admin/uploads/<?php echo $resultEdra['product_image']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Edra</h2>
						  <p><?php echo $resultEdra['product_content']?></p>
						  <div class="button"><span><a href="details.php?product_id=<?php echo $resultEdra['product_id']?>">Mua hàng</a></span></div>
					</div>
				</div>
			</div>
			<?php
				   }
				}
			?>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
					<?php
						$getSlider = $product->show_slider();
						if($getSlider){
							while($result =$getSlider->fetch_assoc() ){
					
					?>
						<li><img src="admin/uploads/<?php echo $result['slider_image']?>" alt="<?php echo $result['slider_name']?>"/></li>
					<?php
						}
					}
					
					?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	