<?php 
include 'inc/header.php';
 include 'inc/sidebar.php';
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../helper/format.php');
 include_once ($filepath.'/../classes/customer.php');

if(isset($_GET["customer_id"]) && $_GET["customer_id"]!=NULL){
    
    $id = $_GET["customer_id"]; // Lấy cateid trên host
    
}
$customer = new customer();

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
               <div class="block copyblock"> 

               <?php
               $get_customer = $customer->show_customer($id);
               
                if($get_customer){
                    while($result = $get_customer->fetch_assoc()){

             
               ?>
                 <form action ="" method ="post">
                    <table class="form">					
                        <tr>
                            <td>Tên</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result["cus_name"]?>" name = "cus_name" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result["cus_phone"]?>" name = "cus_name" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result["cus_address"]?>" name = "cus_name" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result["cus_email"]?>" name = "cus_name" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Zipcode</td>
                            <td>:</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result["cus_zipcode"]?>" name = "cus_name" class="medium" />
                            </td>
                        </tr>
                        
                    </table>
                    </form>
                    <?php
                       }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>