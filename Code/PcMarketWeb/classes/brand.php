<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath."/../lib/database.php");
include_once ($filepath."/../helper/format.php");
?>

<?php
class brand{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_brand($brandname){
        $brandname = $this->fm->validation($brandname); //gọi ham validation từ file Format để ktra
       

        $brandname = mysqli_real_escape_string($this->db->link,$brandname);
        

        if(empty($brandname)){

            $alert ="<span style='color:red'>Bạn không được bỏ trống</span>";
            return $alert;
        }else{
            $query = "INSERT INTO tbl_brand(brand_name) VALUES ('$brandname')";
            $result = $this->db->insert($query);
            if($result==true){
                $alert = "<span style='color:green'>Thêm hãng thành công</span>";
                return $alert;
             }else{
                $alert ="<span style='color:red'>Thêm hãng thất bại</span>";
                return $alert;
            }
        }
    }

    public function show_brand(){
            $query = "SELECT * FROM  tbl_brand ORDER BY brand_id DESC ";
            $result = $this->db->select($query);
           
            return $result;
    }
    public function getbrandId($id){
            $query = "SELECT * FROM  tbl_brand WHERE brand_id = '$id' ";
            $result = $this->db->select($query);
            return $result;
    }
    public function update_brand($brand_name,$id){
        $brand_name = $this->fm->validation($brand_name); //gọi ham validation từ file Format để ktra
        $brand_name = mysqli_real_escape_string($this->db->link,$brand_name);
        $id = mysqli_real_escape_string($this->db->link,$id);
        if(empty($brand_name)){

            $alert ="<span style='color:red'>Bạn không được bỏ trống</span>";
            return $alert;
        }else{
            $query = "UPDATE tbl_brand SET brand_name = '$brand_name' WHERE brand_id = '$id'";
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
    public function delete_brand($id){
            $query = "DELETE  FROM  tbl_brand WHERE brand_id = '$id' ";
            $result = $this->db->delete($query);
            if($result){
                $alert = "<span style='color:green'>Xóa thành công</span>";
                return $alert;
            }else{
                $alert ="<span style='color:red'>Xóa thất bại</span>";
                return $alert;
            }
    }


}

?>