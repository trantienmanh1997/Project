<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
$brand = new brand();
if(isset($_GET["del_id"]) && $_GET["del_id"]!=NULL){
	$id = $_GET["del_id"];
	$delBrand = $brand->delete_brand($id);	
}
	


?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách hãng</h2>
                <div class="block">   
				<?php
				if(isset($delBrand)){
					echo $delBrand;
				}
				
				?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên hãng</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$show_brand = $brand->show_brand();
					
					if($show_brand){
						$i = 0;
						while($result = $show_brand->fetch_assoc()){
							$i++ ;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['brand_name']?></td>
							<td><a href="brandedit.php?brand_id=<?php echo $result['brand_id']?>">Edit</a> || <a onclick ="return confirm('Bạn chắc chắn muốn xóa ?')" href="?del_id=<?php echo $result['brand_id']?>">Delete</a></td>
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

 