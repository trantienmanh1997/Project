<?php
include "lib/session.php";
 session::init(); // check session admin tồn tại hay ko,ko cho người khác vào thẳng đường dẫn index mà phải qua login

?>
<?php

include_once "lib/database.php";
include_once "helper/format.php";

spl_autoload_register(function($class){
	include_once "classes/".$class.".php";
});
$db= new Database();
$fm = new Format();
$cart = new cart();
$user = new user();
$cate = new category();
$brand = new brand();
$product = new product();
$customer = new customer();

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>
<head>
<title>Store Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
<style>
.img{
	max-width:35%;
}
</style>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img class="img" src="images/logo2.jpg" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form action="search.php" method="post">
				    	<input type="text" placeholder ="Nhập thông tin tìm kiếm" name="keyword"><input type="submit" name="search_product" value="Tìm kiếm">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product"><?php
								$checkCart = $cart->check_cart();
								if($checkCart){
								$sum = session::get("sum");
								$qtt = session::get("quantity");
  								echo "$sum VNĐ";
								
								}else{
									echo "Empty";
								}
								
								?></span>
							</a>
						</div>
			      </div>
			
		   <div class="login">
		   <?php
		 	$check_login = session::get('customer_login');
			 if($check_login==false){
				 echo ' <a href="login.php">Login</a></div>';
			 }else{
				echo '<a href="?customer_id='.session::get('customer_id').'">Logout</a></div>';
			 }
		   ?>
		   <?php
				  if(isset($_GET['customer_id'])){
					$delAllCart = $cart->dell_all_data_cart();
					  session::destroy();
					  
				  }
			?>
		   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">Trang chủ</a></li>
	  <li><a href="products.php">Sản phẩm</a> </li>

	  <?php
	  
	 	$check_cart = $cart->check_cart(); 
		 if($check_cart==true){
			 echo '';
		 }else{
			echo '<li><a href="cart.php">Giỏ hàng</a></li>';
		 }
	  ?>
	  <?php
	  	$customer_id = Session::get('customer_id');
	 	$checkOrder = $cart->check_order($customer_id); 
		 if($checkOrder==true){
			echo '<li><a href="orderdetail.php">Đặt hàng</a></li>';
		 }else{
			echo '';
		 }
	  ?>
	  
	  <?php
	 	$check_login = session::get('customer_login'); 
		 if($check_login==false){
			 echo '';
		 }else{
			echo '<li><a href="profile.php">Profile</a></li>';
		 }
	  ?>
	  <?php
	 	$check_login = session::get('customer_login'); 
		 if($check_login){
			echo '<li><a href="compare.php">Compare</a> </li>' ;
		 }else{
			 echo ''; 
		 }
	  ?>
	  <?php
	 	$check_login = session::get('customer_login'); 
		 if($check_login){
			echo '<li><a href="wishlist.php">Wishlist</a> </li>' ;
		 }else{
			 echo ''; 
		 }
	  ?>
	  
	  <li><a href="contact.php">Liên hệ</a> </li>
	  <div class="clear"></div>
	</ul>
</div>