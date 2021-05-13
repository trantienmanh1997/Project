<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>
<?php include_once '../classes/cart.php';?>
<?php include_once '../helper/format.php';?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số thứ tự</th>
							<th>Thời gian đặt hàng</th>
							<th>Sản phẩm</th>
							<th>Số lượng</th>
							<th>Giá</th>
							<th>Customer_id</th>
							<th>Khách hàng</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$cart = new cart();
					$fm = new Format();
					$getInboxCart = $cart->get_inbox_cart();
					if($getInboxCart){
						$i =0;
						while($result = $getInboxCart->fetch_assoc()){
							$i ++;
					
					?>
						<tr class="odd gradeX">
							<td><?php echo $i?></td>
							<td><?php echo $fm->formatDate($result['order_date'])?></td>
							<td><?php echo $result['product_name']?></td>
							<td><?php echo $result['quantity']?></td>
							<?php 
							$num = $result['product_price'];
							$priceFm = number_format($num);
							?>
							<td><?php echo $priceFm."VNĐ"?></td>
							<td><?php echo $result['customer_id']?></td>
							<td><a href="customer.php?customer_id=<?php echo $result['customer_id']?>">Chi tiết</a></td>
							<td>
							<?php
							if($result['order_status'] ==0){
								?>
								<a href="shiftid=<?php echo $result['order_id']?>&product_price=<?php echo $result['product_price']?>&order_date=<?php echo $result['order_date']?>">Đang xử lý</a>
								<?php
							}else{?>
								<a href="shiftid=<?php echo $result['order_id']?>&product_price=<?php echo $result['product_price']?>&order_date=<?php echo $result['order_date']?>">Đã xử lý</a>
							<?php
							}
							?>
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
