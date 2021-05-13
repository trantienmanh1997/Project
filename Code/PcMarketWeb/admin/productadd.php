<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/product.php';?>
<?php
$product = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    // var_dump($_POST['product_content']); exit;

	$insertProduct = $product->insert_product($_POST,$_FILES);
}

?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm</h2>
            <?php
				if(isset($insertProduct)){
					echo $insertProduct;
				}
            ?>
        <div class="block">               
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input type="text" name = "product_name" placeholder="Enter Product Name..." class="medium" />
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
                                <option value="<?php echo $result['cate_id']?>"><?php echo $result['cate_name']?></option>
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
                           
                            <option value="<?php echo $result['brand_id']?>"><?php echo $result['brand_name']?></option>
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
                        <textarea class="tinymce" name = "product_content"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="product_price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Ảnh</label>
                    </td>
                    <td>
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
                            <option value="1">Nổi bật</option>
                            <option value="0">Không nổi bật</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


