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
$id = session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
	$updateCustomer = $customer->update_customer($_POST,$id);
}

?>

<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
				<div class="profile">
					<h3 style="color:black;font-size:18px;weight:bold">Cập nhật thông tin </h3>
                    <?php
                        if(isset($updateCustomer)){
                            echo $updateCustomer;
                        }
                    ?>
                    <form action="" method="post">
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
                            <td><input type="text" name="cus_name" value="<?php echo $result['cus_name']?>"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>:</td>
                            <td><input type="text" name="cus_address" value="<?php echo $result['cus_address']?>"></td>
                            
                        </tr>
                        <!-- <tr>
                            <td>Thành phố</td>
                            <td>:</td>
                            <td><input type="text" name="cus_city" value="<?php echo $result['cus_city']?>"></td>
                        </tr> -->
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td><input type="text" name="cus_zipcode" value="<?php echo $result['cus_zipcode']?>"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="text" name="cus_email" value="<?php echo $result['cus_email']?>"></td>
                        </tr>
                        <!-- <tr>
                            <td>Quê quán</td>
                            <td>:</td>
                            <td><input type="text" name="cus_country" value="<?php echo $result['cus_country']?>"></td>
                        </tr> -->
                        <tr>
                            <td>Số điện thoại</td>
                            <td>:</td>
                            <td><input type="text" name="cus_phone" value="<?php echo $result['cus_phone']?>"></td>
                        </tr>
                        <tr>
                           <td colspan="3"><input type="submit" name="save" value="Lưu " class="grey" style="font-size:20px"></td>
                        </tr>
                        
                        <?php
                                 
                                }
                            }
                        ?>
                    </table>
                    </form>  
				</div>
					
			</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
	include 'inc/footer.php';
 ?>