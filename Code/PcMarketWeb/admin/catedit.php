<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php
$cate = new category();
if(isset($_GET["cate_id"]) && $_GET["cate_id"]!=NULL){
    
    $id = $_GET["cate_id"]; // Lấy cateid trên host
    
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$cate_name = $_POST["cateName"];
	$insertCate = $cate->insert_category($cate_name);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$cate_name = $_POST["cateName"];
	$updateCate = $cate->update_category($cate_name,$id);
}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>
               <div class="block copyblock"> 
               <?php if(isset($updateCate)){
                   echo $updateCate;
               }
               ?>
               <?php
               $get_cate_name = $cate->getcateId($id);
               
                if($get_cate_name){
                    while($result = $get_cate_name->fetch_assoc()){

             
               ?>
                 <form action ="" method ="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result["cate_name"]?>" name = "cateName" placeholder="Sửa danh mục sản phẩm" class="medium" />
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