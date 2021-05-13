<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php
$brand = new brand();
if(isset($_GET["brand_id"]) && $_GET["brand_id"]!=NULL){
    
    $id = $_GET["brand_id"]; // Lấy cateid trên host
    
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$brand_name = $_POST["brand_name"];
	$updateBrand = $brand->update_brand($brand_name,$id);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa hãng sản phẩm</h2>
               <div class="block copyblock"> 
               <?php if(isset($updateBrand)){
                   echo $updateBrand;
               }
               ?>
               <?php
               $get_brand_name = $brand->getbrandId($id);
               
                if($get_brand_name){
                    while($result = $get_brand_name->fetch_assoc()){

             
               ?>
                 <form action ="" method ="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result["brand_name"]?>" name = "brand_name" placeholder="Sửa hãng sản phẩm" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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