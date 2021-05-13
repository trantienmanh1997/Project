<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'; ?>
<?php
$product = new product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

	$insertSlider = $product->insert_slider($_POST,$_FILES);
}

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm slider</h2>
        <?php
            if(isset($insertSlider)){
                echo $insertSlider;
            }
        ?>
    <div class="block">               
         <form action="slideradd.php" method="post" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="slider_name" placeholder="Nhập tên slider" class="medium" />
                    </td>
                </tr>           
    
                <tr>
                    <td>
                        <label>Ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="slider_image"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Loại</label>
                    </td>
                    <td>
                       <select name="slider_type" id="">
                        <option value="1">On</option>
                        <option value="1">Off</option>
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