<?php
$filepath = realpath(dirname(__FILE__));

include ($filepath."/../lib/session.php");
session::checkLogin();
include ($filepath."/../lib/database.php");
include ($filepath."/../helper/format.php");
?>

<?php
class AdminLogin{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function login_admin($admin_user, $admin_pass){
        $admin_user = $this->fm->validation($admin_user); //gọi ham validation từ file Format để ktra
        $admin_pass = $this->fm->validation($admin_pass); 

        $admin_user = mysqli_real_escape_string($this->db->link,$admin_user);
        $admin_pass = mysqli_real_escape_string($this->db->link,$admin_pass);

        if(empty($admin_user) || empty($admin_pass)){

            $alert ="Bạn cần phải nhập tên đăng nhập và mật khẩu";
            return $alert;
        }else{
            $query = "SELECT * FROM tbl_admin WHERE admin_user = '$admin_user' AND admin_pass = '$admin_pass' LIMIT 1";
            $result = $this->db->select($query);

            if($result == true){

                $value = $result->fetch_assoc();
                session::set('adminlogin', true); // set adminlogin đã tồn tại
                // gọi function Checklogin để kiểm tra true.
                session::set('admin_id', $value['admin_id']);
                session::set('admin_user', $value['admin_user']);
                session::set('admin_name', $value['admin_name']);
                header('location:index.php');


            }else{
                $alert ="Tên đăng nhập hoặc mật khẩu sai";
                return $alert;

            }
        }
    }

}



?>