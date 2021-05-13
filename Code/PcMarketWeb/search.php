<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php 
	        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
                $key_word = $_POST['keyword'];
                $search_product = $product -> search_product($key_word); // hàm check catName khi submit lên
            }
            
	      		
	      	 ?>
    		<div class="heading">
    		<h3>Từ khóa tìm kiếm: <?php echo $key_word ; ?></h3>
    		</div>

    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 

	      	if ($search_product) {
	      		while ($result = $search_product->fetch_assoc()) {
	      			# code...
	      		
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview-3.php"><img src="admin/uploads/<?php echo $result['product_image'] ?>" width="150px" alt="" /></a>
					 <h2><?php echo $result['product_name'] ?></h2>
					 <p><?php echo $fm->textShorten($result['product_content'],50) ?></p>
					 <?php
					 $num = $result['product_price'];
					 $priceFm =number_format($num);
					 ?>
					 <p><span class="price"><?php echo $priceFm.' VND' ?></span></p>
				     <div class="button"><span><a href="details.php?product_id=<?php echo $result['product_id']; ?>" class="details">Details</a></span></div>
				</div>
				<?php 
				}
	      	}else {
	      		echo "Sản phẩm này hiện chưa có trong danh mục";
	      	}
				 ?>
			</div>

	
	
    </div>
 </div>

<?php 
	include 'inc/footer.php';
 ?>