<?php
$filepath = realpath(dirname(__FILE__));

include_once ($filepath."/../lib/database.php");
include_once ($filepath."/../helper/format.php");
?>

<?php
class customer
{
    private $db;
    private $fm;
    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_customer($data){
            $cus_name = mysqli_real_escape_string($this->db->link, $data['cus_name']);
			$cus_address = mysqli_real_escape_string($this->db->link, $data['cus_address']);
			$cus_city = mysqli_real_escape_string($this->db->link, $data['cus_city']);
			$cus_zipcode = mysqli_real_escape_string($this->db->link, $data['cus_zipcode']);
			$cus_email = mysqli_real_escape_string($this->db->link, $data['cus_email']);
			$cus_country = mysqli_real_escape_string($this->db->link, $data['cus_country']);
			$cus_phone = mysqli_real_escape_string($this->db->link, $data['cus_phone']);
			$cus_password = mysqli_real_escape_string($this->db->link, md5($data['cus_password']));

        if($cus_name =="" || $cus_address == "" || $cus_city=="" || $cus_zipcode =="" ||  $cus_email == "" || $cus_country=="" || $cus_phone=="" || $cus_password=="" ){
            
            $alert ="<span style='color:red'>Bạn không được bỏ trống</span>";
            return $alert;
        }else{
            $check_email = "SELECT * FROM tbl_customer WHERE cus_email='$cus_email' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if ($result_check) {
                $alert = "<span class='error'>Email đã có sẵn</span>";
                return $alert;
            }else {
                $query = "INSERT INTO tbl_customer(cus_name,cus_address,cus_city,cus_zipcode,cus_email,cus_country,cus_phone,cus_password) VALUES('$cus_name','$cus_address','$cus_city','$cus_zipcode','$cus_email','$cus_country','$cus_phone','$cus_password') ";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span style='color:green'>Đăng ký thành công</span>";
                    return $alert;
                }else {
                    $alert = "<span style='color:red'>Đăng ký thất bại</span>";
                    return $alert;
                }
            }

        }
    }
    public function login_customer($data){
        $cus_email = mysqli_real_escape_string($this->db->link, $data['cus_email']);
        $cus_password = mysqli_real_escape_string($this->db->link, md5($data['cus_password']));
        
        if($cus_email == "" || $cus_password=="" ){    
            $alert ="<span style='color:red'>Email hoặc Password không được bỏ trống</span>";
            return $alert;
        }else{
            $check_login = "SELECT * FROM tbl_customer WHERE cus_email='$cus_email' AND cus_password= '$cus_password' LIMIT 1";
            $result_check = $this->db->select($check_login);
            if($result_check ==true){
                    $value = $result_check->fetch_assoc();
                    session::set('customer_login',true);
                    session::set('customer_id',$value['id']);
                    session::set('customer_name',$value['cus_name']);
                    header('location:index.php');
                }else{
                    $alert = "<span style='color:red'>Email hoặc Password không đúng</span>";
                    return $alert;
                }
            }

        }
        public function show_customer($id){
            $query = "SELECT * FROM tbl_customer WHERE id='$id'";
            $result= $this->db->select($query);
            return $result;
        }
        public function update_customer($data,$id){
            $cus_name = mysqli_real_escape_string($this->db->link, $data['cus_name']);
			$cus_address = mysqli_real_escape_string($this->db->link, $data['cus_address']);
			$cus_zipcode = mysqli_real_escape_string($this->db->link, $data['cus_zipcode']);
			$cus_email = mysqli_real_escape_string($this->db->link, $data['cus_email']);
			$cus_phone = mysqli_real_escape_string($this->db->link, $data['cus_phone']);

        if($cus_name =="" || $cus_address == ""|| $cus_zipcode =="" ||  $cus_email == ""|| $cus_phone==""){
            
            $alert ="<span style='color:red'>Bạn không được bỏ trống</span>";
            return $alert;
        }else{
            $query = "UPDATE tbl_customer SET 
            cus_name = '$cus_name',
            cus_address = '$cus_address',
            cus_zipcode = '$cus_zipcode',
            cus_email = '$cus_email',
            cus_phone = '$cus_phone'
            WHERE id = '$id'";
                $result = $this->db->insert($query);
                if($result){
                    $alert = "<span style='color:green'>Đăng ký thành công</span>";
                    return $alert;
                }else {
                    $alert = "<span style='color:red'>Đăng ký thất bại</span>";
                    return $alert;
                }
            }

            }


        }


    

?>