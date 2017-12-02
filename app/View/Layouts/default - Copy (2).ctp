<!DOCTYPE html>
<html>
  <head>
	<title>Hệ thống theo dõi vi phạm giao thông thành phố Đà Nẵng</title>
	<?php
		echo $this->Html->charset('utf-8');
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('styles','jquery-ui','jquery-ui-timepicker-addon','/uploadify/uploadify'));
		echo $this->Html->Script(array('jquery-1.9.1','jquery-ui','datepicker','jquery-ui-timepicker-addon','jquery-ui-sliderAccess','/uploadify/jquery.uploadify'));
	?>

	<meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.png">
	
    <!-- CSS -->
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
	<link rel="stylesheet" type="text/css" href="css/slide.css" />
	<link rel="stylesheet"  href="css/jquery.mobile-1.3.0-rc.1.css" />
	
	<link rel="stylesheet" href="css/magnific-popup.css">  
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		
	<!-- Magnific Popup core JS file -->
	
</head>
<body>
    <div id="container">
		<div id="head">
			<!--logo-->
			
			<div class="row1" >
				
				<div  class="row1_text">
					<h1>HỆ THỐNG QUẢN LÝ TÀI LIỆU</h1>
					<h2>CẢNG HÀNG KHÔNG QUỐC TẾ ĐÀ NẴNG</h2>
				</div>
				<!--user_info-->
				<div class="top_head_right">
					<div style="margin-bottom:5px;">Xin chào : <?php echo $this->Session->read('username');?></div>
					<div>
						<a href="<?php echo $this->webroot.'user/password'; ?>">Đổi mật khẩu</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;
						<?php echo $this->Html->link(__('Thoát',true),array('controller'=>'login','action'=>'logout')); ?>
					</div>
				</div>
				<!--end user_info-->
			</div>	
			<!--tab_menu-->
			<div style="float:left; height:32px;  margin-left:12px; border: solid 0px; margin-top:20px;">
			<ul style="border: solid 0px;" id="menu">
            		 <li id="/cakephp/vanban">
						<?php echo $this->Html->link(__('Quản lý Văn Bản ', true),'/vanban',array('title'=>'Quản lý Văn Bản '));?>
                    </li>
					<li id="/cakephp/tailieu">
						<?php echo $this->Html->link(__('Quản lý Tài liệu ', true),'/tailieu',array('title'=>'Quản lý tài liệu '));?>
                    </li>
                     <li id="/cakephp/quanly_to">
						<?php echo $this->Html->link(__('Quản lý Tổ', true),'/quanly_to',array('title'=>'Quản lý tổ '));?>
                    </li>
						<li id="/cakephp/user">
						<?php echo $this->Html->link(__('Quản lý Người dùng', true),'/user',array('title'=>'Quản lý user '));?>
                    </li>
				</ul>	
			</div>
		<!--end tab_menu-->	
        				
		</div>
		<script language="javascript">
			document.getElementById("<?php echo $_SERVER['REQUEST_URI'];?>").className = "active";
		</script>


		<?php echo $content_for_layout; ?>
	<? //echo $permission;?>
	</div>
	<div id="footer">
    	<div style="line-height:50px; text-align:left; margin:10px 15px; padding:0; font-size:16px; color:#06C; font-weight:lighter;"></div>
    </div>
</body>
</html>
