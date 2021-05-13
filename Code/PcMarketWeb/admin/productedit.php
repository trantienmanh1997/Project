<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php
$product = new product();

if(!isset($_GET['product_id']) || $_GET['product_id']==NULL ){
    echo "<script>window.location='productlist.php'</script>";
}else{
    $id = $_GET['product_id'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

	$updateProduct = $product->update_product($_POST,$_FILES,$id);
}

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa sản phẩm</h2>
            
        <div class="block">    
        <?php
				if(isset($updateProduct)){
					echo $updateProduct;
				}
            ?>
            <?php
            $get_product_id = $product->getproductId($id);
            $result_product =$get_product_id->fetch_assoc() ;
          
                   

                  
            ?>
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input type="text" name = "product_name" value="<?php echo $result_product['product_name']?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="cate_id">
                            <option>--Chọn danh mục--</option>
                                <?php
                                $cate = new category();
                                $catelist = $cate->show_category();
                                if($catelist){
                                    while($result =$catelist->fetch_assoc()){

                                ?>
                                <option
                                <?php
                                if($result['cate_id']==$result_product['cate_id']){

                                    echo 'selected';
                                }
                                
                                ?>
                                
                                 value="<?php echo $result['cate_id']?>"><?php echo $result['cate_name']?></option>
                           <?php
                                    }
                           }
                           
                           ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Hãng</label>
                    </td>
                    <td>
                        <select id="select" name="brand_id">
                            <option>--Chọn hãng--</option>
                            <?php
                                $brand = new brand();
                                $brandlist = $brand->show_brand();
                                if($catelist){
                                    while($result =$brandlist->fetch_assoc()){

                                ?>
                           
                            <option
                            <?php
                            if($result['brand_id']==$result_product['brand_id']){
                                echo'selected';
                            }
                            
                            ?>
                            
                             value="<?php echo $result['brand_id']?>"><?php echo $result['brand_name']?></option>
                          <?php
                                    }
                                }
                               
                                
                          ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name = "product_content"><?php echo $result_product['product_content']?></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="product_price" value="<?php echo $result_product['product_price']?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Ảnh</label>
                    </td>
                    <td>
                        <img src="uploads/<?php echo $result_product['product_image']?>" width ="100"><br>
                        <input type="file" name="product_image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Loại Sản Phẩm</label>
                    </td>
                    <td>
                        <select id="select" name="product_type">
                            <option>Select Type</option>
                            <?php
                            if($result_product['product_type']==1){ 
                                ?>
                            <option selected value="1">Nổi bật</option>
                            <option value="0">Không nổi bật</option>
                            <?php
                            }else{
                                ?>
                            <option  value="1">Nổi bật</option>
                            <option selected value="0">Không nổi bật</option>
                                <?php
                            }
                            
                            
                            ?>
                            
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
      
         
        </div>
    </div>
</div>


<?php  include 'inc/footer.php';?>


