<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath."/../lib/database.php");
include_once ($filepath."/../helper/format.php");
?>

<?php
class product{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data,$files){
      
        $product_name = mysqli_real_escape_string($this->db->link,$data['product_name']);
        $cate_id = mysqli_real_escape_string($this->db->link,$data['cate_id']);
        $brand_id = mysqli_real_escape_string($this->db->link,$data['brand_id']);
        $product_content = mysqli_real_escape_string($this->db->link,$data['product_content']);
        $product_price = mysqli_real_escape_string($this->db->link,$data['product_price']);
        $product_type = mysqli_real_escape_string($this->db->link,$data['product_type']);
        //Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited = array('jpg','jpeg','png','gif');
		$file_name = $_FILES['product_image']['name'];
		$file_size = $_FILES['product_image']['size'];
		$file_temp = $_FILES['product_image']['tmp_name'];
			
		$div =explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;

        if($product_name =="" || $cate_id == "" || $brand_id=="" || $product_content =="" ||  $product_price == "" || $file_name=="" || $product_type=="" ){
            
            $alert ="<span style='color:red'>Bạn không được bỏ trống</span>";
            return $alert;
        }else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_product(product_name,cate_id,brand_id,product_content,product_price,product_image,product_type) VALUES ('$product_name','$cate_id','$brand_id','$product_content','$product_price','$unique_image','$product_type')";
            $result = $this->db->insert($query);
            
            
            if($result==true){
                $alert = "<span style='color:green'>Thêm sản phẩm thành công</span>";
                return $alert;
            }else{ 
                $alert ="<span style='color:red'>Thêm sản phẩm thất bại</span>";
                return $alert;
            }
        }
    }

    public function show_product(){
            // $query = "SELECT * FROM  tbl_product ORDER BY product_id DESC ";
            $query = "SELECT tbl_product.*,tbl_category.cate_name,tbl_brand.brand_name 
             FROM  tbl_product INNER JOIN tbl_category ON tbl_product.cate_id = tbl_category.cate_id
             INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
             ORDER BY tbl_product.product_id DESC ";
            $result = $this->db->select($query);
            return $result;
    }
    public function getproductId($id){
            $query = "SELECT * FROM  tbl_product WHERE product_id = '$id' ";
            $result = $this->db->select($query);
            return $result;
    }
    public function update_product($data,$files,$id){
        
        $product_name = mysqli_real_escape_string($this->db->link,$data['product_name']);
        $cate_id = mysqli_real_escape_string($this->db->link,$data['cate_id']);
        $brand_id = mysqli_real_escape_string($this->db->link,$data['brand_id']);
        $product_content = mysqli_real_escape_string($this->db->link,$data['product_content']);
        $product_price = mysqli_real_escape_string($this->db->link,$data['product_price']);
        $product_type = mysqli_real_escape_string($this->db->link,$data['product_type']);
        //Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
        $permited = array('jpg','jpeg','png','gif'); // cho phép lưu file ảnh dưới đuôi .jpg,.png,....
		$file_name = $_FILES['product_image']['name']; // lấy tên file ảnh($files khi upload file ảnh)
		$file_size = $_FILES['product_image']['size']; // lấy kích thước file ảnh
		$file_temp = $_FILES['product_image']['tmp_name']; //upload hình ảnh
			
		$div =explode('.', $file_name); // tách thành 2 phần thông qua dấu chấm
		$file_ext = strtolower(end($div)); // lấy đuôi của file
		$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;
        
        if($product_name =="" || $cate_id == "" || $brand_id=="" || $product_content =="" ||  $product_price == ""|| $product_type=="" ){

            $alert ="<span style='color:red'>Bạn không được bỏ trống</span>";
            return $alert;
        }else{
            if(!empty($file_name)){
                //Nếu người dùng chọn ảnh
                if($file_size > 204800){
                    
                    $alert = "<span style='color:red'>Dung lượng ảnh phải nhỏ hơn 2MB</span>";
                return $alert;

                }elseif(in_array($file_ext,$permited)==false){
                    
                 $alert = "<span style='color:red'>Bạn chỉ có thể tải lên:-".implode(',',$permited)."</span>";
                return $alert;
                }
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "UPDATE tbl_product SET 
                product_name = '$product_name',
                cate_id = '$cate_id',
                brand_id = '$brand_id',
                product_content = '$product_content',
                product_price = '$product_price',
                product_image = '$unique_image',
                product_type = '$product_type'
                
                WHERE product_id = '$id'";

            }else{
                //Nếu người dùng không chọn ảnh
                $query = "UPDATE tbl_product SET 
                product_name = '$product_name',
                cate_id = '$cate_id',
                brand_id = '$brand_id',
                product_content = '$product_content',
                product_price = '$product_price',
                product_type = '$product_type'
                
                WHERE product_id = '$id'";
            }
        }
            $result = $this->db->insert($query);
            if($result==true){
                $alert = "<span style='color:green'>Chỉnh sửa thành công</span>";
                return $alert;
            }else{
                $alert ="<span style='color:red'>Chỉnh sửa thất bại</span>";
                return $alert;
            }
        }
        
    
    public function delete_product($id){
            $query = "DELETE  FROM  tbl_product WHERE product_id = '$id' ";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span style='color:green'>Xóa sản phẩm thành công</span>";
                return $alert;
            }else{
                $alert ="<span style='color:red'>Xóa sản phẩm thất bại</span>";
                return $alert;
            }
    }
    //End Backend

    //Start Frontend
    public function getproduct_feathered(){
           
            $query = "SELECT * FROM  tbl_product WHERE product_type = '1' ";
            $result = $this->db->select($query);
            return $result;

        }
    public function getproduct_new(){
        $sp_tungtrang = 4;
        if(!isset($_GET['trang'])){
            $trang = '1';
        }else{
            $trang = $_GET['trang'];
        }
        $tung_trang = ($trang-1)*$sp_tungtrang;
        $query = "SELECT * FROM  tbl_product ORDER BY product_id DESC LIMIT $tung_trang,$sp_tungtrang  ";
            $result = $this->db->select($query);
            return $result;
        }
    public function get_all_product(){
        $query = "SELECT * FROM  tbl_product ORDER BY product_id  ";
            $result = $this->db->select($query);
            return $result;
        }
    public function get_details($id){

            $query = "SELECT tbl_product.*,tbl_category.cate_name,tbl_brand.brand_name 
            FROM  tbl_product INNER JOIN tbl_category ON tbl_product.cate_id = tbl_category.cate_id
            INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
            WHERE tbl_product.product_id = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
    public function get_lastest_intel(){
        $query = "SELECT * FROM  tbl_product WHERE brand_id = '8' ORDER BY product_id DESC LIMIT  1";
        $result = $this->db->select($query);
        return $result;
        }
    public function get_lastest_asus(){
        $query = "SELECT * FROM  tbl_product WHERE brand_id = '1' ORDER BY product_id DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
        }
    public function get_lastest_corsair(){
        $query = "SELECT * FROM  tbl_product WHERE brand_id = '11' ORDER BY product_id DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
        }
    public function get_lastest_edra(){
        $query = "SELECT * FROM  tbl_product WHERE brand_id = '13' ORDER BY product_id DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
        }
    public function insert_compare($product_id,$customer_id){
        $product_id =mysqli_real_escape_string($this->db->link,$product_id);
        $customer_id = mysqli_real_escape_string($this->db->link,$customer_id);
        $check_compare = "SELECT * FROM tbl_compare WHERE product_id='$product_id' AND customer_id='$customer_id'";
        $result_check_compare = $this->db->select($check_compare);
        if($result_check_compare){
            $msg = "<span style='color:red'>Sản phẩm đã được thêm vào trước đó</span>";
            return $msg;
        }else{
            
        $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id' ";
        $result = $this->db->select($query)->fetch_assoc();
        //return $result;

        $product_name = $result['product_name'];
        $product_price = $result['product_price'];
        $product_image = $result['product_image'];


        $query_insert = "INSERT INTO tbl_compare(product_id,customer_id,product_name,product_price,product_image) VALUES('$product_id','$customer_id','$product_name','$product_price','$product_image') ";
        $result_insert = $this->db->insert($query_insert);
        if($result_insert){
            $alert = "<span style='color:green'>Lưu vào so sánh sản phẩm thành công</span>";
            return $alert;
        }else{
            $alert ="<span style='color:red'>Lưu vào so sánh sản phẩm thất bại</span>";
            return $alert;
                }
            }
        }

        public function get_compare_product($customer_id){
            $query = "SELECT * FROM  tbl_compare WHERE customer_id = '$customer_id' ORDER BY id DESC ";
            $result = $this->db->select($query);
            return $result;
        }

        public function insert_wishlist($product_id,$customer_id){
            $product_id =mysqli_real_escape_string($this->db->link,$product_id);
            $customer_id = mysqli_real_escape_string($this->db->link,$customer_id);
            $check_wishlist = "SELECT * FROM tbl_wishlist WHERE product_id='$product_id' AND customer_id='$customer_id'";
            $result_check_wishlist = $this->db->select($check_wishlist);
            if($result_check_wishlist){
                $msg = "<span style='color:red'>Sản phẩm đã được thêm vào trước đó</span>";
                return $msg;
            }else{
                
            $query = "SELECT * FROM tbl_product WHERE product_id = '$product_id' ";
            $result = $this->db->select($query)->fetch_assoc();
            //return $result;
    
            $product_name = $result['product_name'];
            $product_price = $result['product_price'];
            $product_image = $result['product_image'];
    
    
            $query_insert = "INSERT INTO tbl_wishlist(product_id,customer_id,product_name,product_price,product_image) VALUES('$product_id','$customer_id','$product_name','$product_price','$product_image') ";
            $result_insert = $this->db->insert($query_insert);
            if($result_insert){
                $alert = "<span style='color:green'>Lưu vào sản phẩm yêu thích thành công</span>";
                return $alert;
            }else{
                $alert ="<span style='color:red'>Lưu vào sản phẩm yêu thích thất bại</span>";
                return $alert;
                    }
                }
            }
            public function get_wishlist($customer_id){
                $query = "SELECT * FROM  tbl_wishlist WHERE customer_id = '$customer_id' ORDER BY id DESC ";
                $result = $this->db->select($query);
                return $result;
            }
            public function delete_wishlist($product_id,$customer_id){
                $query = "DELETE  FROM  tbl_wishlist WHERE product_id = '$product_id' AND customer_id = '$customer_id' ";
                $result = $this->db->delete($query);
                if($result){
                    $alert = "<span style='color:green'>Xóa sản phẩm thành công</span>";
                    return $alert;
                }else{
                    $alert ="<span style='color:red'>Xóa sản phẩm thất bại</span>";
                    return $alert;
                }
            }

        public function insert_slider($data,$files){
            
            $slider_name = mysqli_real_escape_string($this->db->link,$data['slider_name']);
            $slider_type = mysqli_real_escape_string($this->db->link,$data['slider_type']);

            //Kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
            $permited = array('jpg','jpeg','png','gif'); // cho phép lưu file ảnh dưới đuôi .jpg,.png,....
            $file_name = $_FILES['slider_image']['name']; // lấy tên file ảnh($files khi upload file ảnh)
            $file_size = $_FILES['slider_image']['size']; // lấy kích thước file ảnh
            $file_temp = $_FILES['slider_image']['tmp_name']; //upload hình ảnh
                
            $div =explode('.', $file_name); // tách thành 2 phần thông qua dấu chấm
            $file_ext = strtolower(end($div)); // lấy đuôi của file
            $unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;
            
            if($slider_name =="" || $slider_type == ""){
    
                $alert ="<span style='color:red'>Bạn không được bỏ trống</span>";
                return $alert;
            }else{
                if(!empty($file_name)){
                    //Nếu người dùng chọn ảnh
                    if($file_size > 2048000){
                        
                        $alert = "<span style='color:red'>Dung lượng ảnh phải nhỏ hơn 2MB</span>";
                    return $alert;
    
                    }elseif(in_array($file_ext,$permited)==false){
                        
                     $alert = "<span style='color:red'>Bạn chỉ có thể tải lên:-".implode(',',$permited)."</span>";
                    return $alert;
                    }
                    move_uploaded_file($file_temp,$uploaded_image);
                   
                    $query = "INSERT INTO tbl_slider(slider_name,slider_type,slider_image) VALUES ('$slider_name','$slider_type','$unique_image')";
                    $result = $this->db->insert($query);
                    
                    
                    if($result==true){
                        $alert = "<span style='color:green'>Thêm slider thành công</span>";
                        return $alert;
                    }else{ 
                        $alert ="<span style='color:red'>Thêm slider thất bại</span>";
                        return $alert;
                    }
    
                }
                
            }
                

        }
        public function show_slider(){
			$query = "SELECT * FROM tbl_slider where slider_type='1' order by slider_id desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_slider_list(){
			$query = "SELECT * FROM tbl_slider order by slider_id desc";
			$result = $this->db->select($query);
			return $result;
		}
        public function update_type_slider($slider_id,$slider_type){
         
			$slider_type = mysqli_real_escape_string($this->db->link, $slider_type);
			$query = "UPDATE tbl_slider SET slider_type = '$slider_type' where slider_id='$slider_id'";
			$result = $this->db->update($query);
			return $result;
        }
        public function del_slider($slider_id){
            $query = "DELETE  FROM  tbl_slider WHERE slider_id = '$slider_id' ";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span style='color:green'>Xóa slider thành công</span>";
                return $alert;
            }else{
                $alert ="<span style='color:red'>Xóa slider thất bại</span>";
                return $alert;
            }
        }
        public function search_product($key_word){
            $key_word = $this->fm->validation($key_word); 
            $query = "SELECT * FROM tbl_product WHERE product_name LIKE '%$key_word%'";
			$result = $this->db->select($query);
			return $result;
        }
        public function get_all_product_list(){
            $query = "SELECT * FROM tbl_product WHERE brand_id='8' ORDER BY product_id DESC LIMIT  4 ";
			$result = $this->db->select($query);
			return $result;
        }
        public function get_all_product_list2(){
            $query = "SELECT * FROM tbl_product WHERE brand_id='1' ORDER BY product_id  ";
			$result = $this->db->select($query);
			return $result;
        }

    }

?>