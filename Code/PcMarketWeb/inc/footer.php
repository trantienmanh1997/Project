</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Giới thiệu</h4>
						<ul>
						<li><a href="#">Giới thiệu công ty</a></li>
						<li><a href="#">Customer Service</a></li>
						<li><a href="#">Thông tin liên hệ</a></li>
						<li><a href="#">Tin tức</a></li>
						<li><a href="#">Thông tin tuyển dụng</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Hỗ trợ khách hàng</h4>
						<ul>
						<li><a href="about.php">Hướng dẫn mua hàng trực tuyến</a></li>
						<li><a href="faq.php">Hướng dẫn thanh toán</a></li>
						<li><a href="#">In hóa đơn điện tử</a></li>
						<li><a href="contact.php">Yêu cầu bảo hành</a></li>
						<li><a href="preview.php">Góp ý,khiếu nại</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Chính sách chung</h4>
						<ul>
							<li><a href="contact.php">Chính sách vận chuyển</a></li>
							<li><a href="index.php">Chính sách bảo hành</a></li>
							<li><a href="#">Chính sách hàng chính hãng</a></li>
							<li><a href="#">Chính sách cho doanh nghiệp</a></li>
							<li><a href="faq.php">Bảo mật thông tin khách hàng</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Liên hệ</h4>
						<ul>
							<li><span>Hotline: 0772999798</span></li>
							<li><span>Địa chỉ: Số 2 Đường Bưởi,Cầu Giấy,Hà Nội</span></li>
						</ul>
						<div class="social-icons">
							
					   		  <ul>
							      <li class="facebook"><a href="#" target="_blank"> </a></li>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
								  
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>Training with live project &amp; All rights Reseverd </p>
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>