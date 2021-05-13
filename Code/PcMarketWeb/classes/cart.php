<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath."/../lib/database.php");
include_once ($filepath."/../helper/format.php");
?>

<?php
class cart
{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_to_cart($quantity,$id){
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link,$quantity);
        $id = mysqli_real_escape_string($this->db->link,$id);
        $sid = session_id();

        $query = "SELECT * FROM tbl_product WHERE product_id = '$id'";
        $result = $this->db->select($query)->fetch_assoc();
        $product_name = $result['product_name'];
        $product_image = $result['product_image'];
        $product_price = $result['product_price'];
        // $check_cart = "SELECT * FROM tbl_product WHERE product_id = '$id' AND sid ='$sid' ";
        // if($check_cart){
        //     $msg = "Sản phẩm đã được thêm vào trước đó";
        //     return $msg;
        // }else{
            
        $query_insert = "INSERT INTO tbl_cart(product_id,product_name,quantity,sid,product_price,product_image) VALUES('$id','$product_name','$quantity','$sid','$product_price','$product_image' ) ";
        $result = $this->db->insert($query_insert);
    
        if($result==true){
           header("location:cart.php");
           
        }else{ 
            header("location:404.php");
           
            }
        //  }
    }

    public function get_product_cart(){
        $sid = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sid = '$sid'";
        $result = $this->db->select($query);
        // var_dump($result);
        return $result;
    }

    public function update_quantity_cart($quantity,$cart_id){
        $quantity = mysqli_real_escape_string($this->db->link,$quantity);
        $cart_id = mysqli_real_escape_string($this->db->link,$cart_id);
       $query = "UPDATE tbl_cart SET
                quantity = '$quantity'
                WHERE cart_id = $cart_id";

				$result = $this->db->update($query);
        $result = $this->db->update($query);
        if($result){
            $msg = "<span style='color:green'>Số lượng sản phẩm cập nhật thành công</span>";
            return $msg;
        }else{
            $msg = "<span style='color:red'>Số lượng sản phẩm cập nhật thất bại</span>";
            return $msg;
        }
    }
    public function delete_cart($cart_id){
        $cart_id = mysqli_real_escape_string($this->db->link,$cart_id);
        $query = "DELETE  FROM  tbl_cart WHERE cart_id = '$cart_id' ";
        $result = $this->db->delete($query);
        if($result){
            //header('location:cart.php');
            
        }else{
            $msg ="<span style='color:red'>Xóa sản phẩm thất bại</span>";
            return $alert;
        }
    }
    public function check_cart(){
        $sid = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sid = '$sid'";
        $result = $this->db->select($query);
        // var_dump($result);
        return $result;
    }
    public function dell_all_data_cart(){
        $sid = session_id();
        $query = "DELETE  FROM tbl_cart WHERE sid = '$sid'";
        $result = $this->db->select($query);
        
        return $result;
    }
    public function insert_order($customer_id){
        $sid = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sid = '$sid'";
        $get_product = $this->db->select($query);
        if($get_product){
            while($result =$get_product->fetch_assoc()){
                $product_name = $result['product_name'];
                $product_id = $result['product_id'];
                $quantity = $result['quantity'];
                $product_price = $result['product_price'] * $quantity;
                // $customer_id = $result['customer_id'];
                $product_image = $result['product_image'];

                $query_order = "INSERT INTO tbl_order(product_name,product_id,product_price,quantity,customer_id,product_image) VALUES('$product_name','$product_id','$product_price','$quantity','$customer_id','$product_image')";
                $insert_order = $this->db->insert($query_order);
            }
        }
    }
    public function get_amount_price($customer_id){
        $query = "SELECT product_price FROM tbl_order WHERE customer_id = '$customer_id'";
        $get_amount_price = $this->db->select($query);
        return $get_amount_price;
    }
    public function get_cart_ordered($customer_id)
    {
        $query = "SELECT * FROM tbl_order WHERE customer_id = $customer_id ";
        $get_cart_ordered = $this->db->select($query);
        return $get_cart_ordered;
    }
    public function check_order($customer_id){
        // $sid = session_id();
        // $query = "SELECT * FROM tbl_order WHERE customer_id = $customer_id ";
        // $get_ordered = $this->db->select($query);
        // return $get_ordered;
    }
    public function get_inbox_cart(){
        $query = "SELECT * FROM tbl_order ORDER BY order_date";
        $get_inbox_cart = $this->db->select($query);
        return $get_inbox_cart;
    }

}

?>