<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php
     
    if(!isset($_GET['cate_id']) || $_GET['cate_id'] == NULL){
        echo "<script> window.location = '404.php' </script>";
        
    }else {
        $id = $_GET['cate_id']; // Lấy catid trên host
    }
    // gọi class category
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //     // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    //     $catName = $_POST['catName'];
    //     $updateCat = $cat -> update_category($catName,$id); // hàm check catName khi submit lên
    // }
    
  ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<?php 
	      	$name_cate = $cate->get_name_by_cate($id);
	      	if ($name_cate) {
	      		while ($result= $name_cate->fetch_assoc()) {
	      			# code...
	      		
	      	 ?>
    		<div class="heading">
    		<h3>Danh mục: <?php echo $result['cate_name'] ; ?></h3>
    		</div>
    		<?php 
				}
	      	}
			?>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      	$productbycat = $cate->get_product_by_cate($id);
	      	if ($productbycat) {
	      		while ($result = $productbycat->fetch_assoc()) {
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