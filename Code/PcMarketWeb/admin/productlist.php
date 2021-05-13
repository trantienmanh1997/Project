<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include_once '../classes/product.php';?>
<?php
$product = new product();
if(isset($_GET["product_id"]) && $_GET["product_id"]!=NULL){
	$id = $_GET["product_id"];
	$delProduct = $product->delete_product($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">  
		<?php
				if(isset($delProduct)){
					echo $delProduct;
				}
		?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Tên sản phẩm</th>
					<th>Danh mục</th>
					<th>Hãng</th>
					<th>Mô tả</th>
					<th>Giá</th>
					<th>Ảnh</th>
					<th>Loại</th>
					<th>Hành động</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$product = new product();
			$fm = new Format();
			$productList = $product->show_product();
			if($productList){
				$i = 0;
				while($result = $productList->fetch_assoc()){
					$i++;
			?>
				<tr class="odd gradeX">
					<td><?php echo $i?></td>
					<td><?php echo $result['product_name']?></td>
					<td><?php echo $result['cate_name']?></td>
					<td><?php echo $result['brand_name']?></td>
					<!-- <td><?php var_dump(trim($result['product_content'])); ?></td> -->
					<td><?php echo $fm->textShorten($result['product_content'],50) ?></td>
					<td><?php echo $result['product_price']?></td>
					<td><img src="uploads/<?php echo $result['product_image']?>" width ="80"></td>
					<td>
					<?php
					if($result['product_type'] ==1){
						echo 'Nổi bật';
					}else{
						echo 'Không nổi bật';
					}
					?>
					
					</td>
					<td><a href="productedit.php?product_id=<?php echo $result['product_id']?>">Edit</a> || <a href="?product_id=<?php echo $result['product_id']?>">Delete</a></td>
				</tr>
				<?php
				}
			}
				
				?>
				
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
