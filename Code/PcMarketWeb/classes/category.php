<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath."/../lib/database.php");
include_once ($filepath."/../helper/format.php");
?>

<?php
class category{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_category($cate_name){
        $cate_name = $this->fm->validation($cate_name); //gọi ham validation từ file Format để ktra
       

        $cate_name = mysqli_real_escape_string($this->db->link,$cate_name);
        

        if(empty($cate_name)){

            $alert ="<span style='color:red'>Bạn không được bỏ trống</span>";
            return $alert;
        }else{
            $query = "INSERT INTO tbl_category(cate_name) VALUES ('$cate_name')";
            $result = $this->db->insert($query);
            if($result==true){
                $alert = "<span style='color:green'>Thêm danh mục thành công</span>";
                return $alert;
            }else{
                $alert ="<span style='color:red'>Thêm danh mục thất bại</span>";
                return $alert;
            }
        }
    }

    public function show_category(){
            $query = "SELECT * FROM  tbl_category ORDER BY cate_id DESC ";
            $result = $this->db->select($query);
            return $result;
    }
    public function getcateId($id){
            $query = "SELECT * FROM  tbl_category WHERE cate_id = '$id' ";
            $result = $this->db->select($query);
            return $result;
    }
    public function update_category($cate_name,$id){
        $cate_name = $this->fm->validation($cate_name); //gọi ham validation từ file Format để ktra
        $cate_name = mysqli_real_escape_string($this->db->link,$cate_name);
        $id = mysqli_real_escape_string($this->db->link,$id);
        if(empty($cate_name)){

            $alert ="<span style='color:red'>Bạn không được bỏ trống</span>";
            return $alert;
        }else{
            $query = "UPDATE tbl_category SET cate_name = '$cate_name' WHERE cate_id = '$id'";
            $result = $this->db->insert($query);
            if($result==true){
                $alert = "<span style='color:green'>Chỉnh sửa thành công</span>";
                return $alert;
            }else{
                $alert ="<span style='color:red'>Chỉnh sửa thất bại</span>";
                return $alert;
            }
        }
    }
    public function delete_category($id){
            $query = "DELETE  FROM  tbl_category WHERE cate_id = '$id' ";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span style='color:green'>Xóa thành công</span>";
                return $alert;
            }else{
                $alert ="<span style='color:red'>Xóa thất bại</span>";
                return $alert;
            }
    }
    public function show_category_fontend(){
        $query = "SELECT * FROM  tbl_category ORDER BY cate_id DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_product_by_cate($id){
        $query = "SELECT * FROM  tbl_product WHERE cate_id= '$id' ORDER BY cate_id DESC LIMIT 8 ";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_name_by_cate($id){
        $query = "SELECT tbl_product.*,tbl_category.cate_id,tbl_category.cate_name FROM tbl_product,tbl_category WHERE tbl_product.cate_id
        =tbl_category.cate_id AND tbl_product.cate_id ='$id' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }


}

?>