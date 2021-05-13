<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'; ?>
<?php
$product = new product();
if(isset($_GET['del_slider'])){
	$slider_id = $_GET['del_slider'];
	
	$delSlider = $product->del_slider($slider_id);
}
if(isset($_GET['del_slider'])&& isset($_GET['slider_type'])){
	$slider_id = $_GET['del_slider'];
	$slider_type = $_GET['slider_type'];
 	$updateSlider = $product->update_type_slider($slider_id,$slider_type);

}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách slider</h2>
		<?php
		if(isset($delSlider)){
			echo $delSlider;
		}
		
		?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					
					<th>Tên </th>
					<th>Ảnh</th>
					<th>Loại</th>
					<th>Hành động</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$product = new product();
				$showSliderList = $product->show_slider_list();
				if($showSliderList){
					while($result =$showSliderList->fetch_assoc()){

				
				?>
				<tr class="odd gradeX">
				
					<td><?php echo $result['slider_name']?></td>
					<td><img src="uploads/<?php echo $result['slider_image']?>" height="40px" width="60px"/></td>	
					<td>
					<?php
						if($result['slider_type']==1){ ?>
							<a href="?slider_type=<?php echo $result['slider_id']?>&slider_type=1">On</a>
						<?php
						}else{
						?>
							<a href="?slider_type=<?php echo $result['slider_id']?>&slider_type=0">Off</a>
							<?php
						}
						
					?>
					</td>			
				<td>
					<a href="">Sửa</a> || 
					<a href="?del_slider=<?php echo $result['slider_id']?>" onclick="return confirm('Bạn chắc chắn muốn xóa!');" >Xóa</a> 
				</td>
				
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
