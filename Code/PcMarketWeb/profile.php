<?php
include_once "inc/header.php";
//include_once "inc/slider.php";


?>
 <?php
	 	$check_login = session::get('customer_login'); 
		 if($check_login==false){
			 header('location:login.php');
		 }
	  ?>
<?php
// if(!isset($_GET['product_id']) || $_GET['product_id']==NULL ){
//     echo "<script>window.location='404.php'</script>";
// }else{
//     $id = $_GET['product_id'];
// }
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
// 	$quantity = $_POST['quantity'];
// 	$addToCart = $cart->add_to_cart($quantity,$id);
// }

?>

<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
				<div class="profile">
					<h3 style="color:black;font-size:18px;weight:bold">Thông tin khách hàng</h3>
                    <table class="tblone">
                    <?php
                    $id = session::get('customer_id');
                    $getCustomer = $customer->show_customer($id);
                    if($getCustomer){
                        while($result=$getCustomer->fetch_assoc()){
                   
                    ?>
                        <tr>
                            <td>Tên</td>
                            <td>:</td>
                            <td><?php echo $result['cus_name']?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>:</td>
                            <td><?php echo $result['cus_address']?></td>
                        </tr>
                        <tr>
                            <td>Thành phố</td>
                            <td>:</td>
                            <td><?php echo $result['cus_city']?></td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td><?php echo $result['cus_zipcode']?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $result['cus_email']?></td>
                        </tr>
                        <tr>
                            <td>Quê quán</td>
                            <td>:</td>
                            <td><?php echo $result['cus_country']?></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>:</td>
                            <td><?php echo $result['cus_phone']?></td>
                        </tr>
                        <tr>
                           <td colspan="3"><button type="submit" name="update" style="font-size:17px"><a href="editprofile.php">Cập nhập</a></button></td>
                           
                        </tr>
                        
                        <?php
                                 
                                }
                            }
                        ?>
                    </table>
				</div>
					
			</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
	include 'inc/footer.php';
 ?>