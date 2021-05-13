<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
$cate = new category();
if(isset($_GET["del_id"]) && $_GET["del_id"]!=NULL){
	$id = $_GET["del_id"];
	$delCate = $cate->delete_category($id);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh mục sản phẩm</h2>
                <div class="block">   
				<?php
				if(isset($delCate)){
					echo $delCate;
				}
				
				?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên danh mục</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$show_cate = $cate->show_category();
					if($show_cate){
						$i = 0;
						while($result = $show_cate->fetch_assoc()){
							$i++ ;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $result['cate_name']?></td>
							<td><a href="catedit.php?cate_id=<?php echo $result['cate_id']?>">Edit</a> || <a onclick ="return confirm('Bạn chắc chắn muốn xóa ?')" href="?del_id=<?php echo $result['cate_id']?>">Delete</a></td>
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

