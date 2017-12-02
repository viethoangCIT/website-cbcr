<!DOCTYPE html>
<html>
  <head>
	<title>Hệ thống theo dõi vi phạm giao thông thành phố Đà Nẵng</title>
	<?php
		echo $this->Html->charset('utf-8');
		echo $this->Html->meta('icon');
		//echo $this->Html->css(array('styles','jquery-ui','jquery-ui-timepicker-addon','/uploadify/uploadify'));
		//echo $this->Html->Script(array('jquery-1.9.1','jquery-ui','datepicker','jquery-ui-timepicker-addon','jquery-ui-sliderAccess','/uploadify/jquery.uploadify'));
	?>

	<meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo $this->webroot;?>img/iconlogo.png" type="image/x-icon">
	<!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo $this->webroot;?>images/favicon.png">
	
    <!-- CSS -->
	
    <link href="<?php echo $this->webroot;?>css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/menu.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/slide.css" />
	<link rel="stylesheet"  href="<?php echo $this->webroot;?>css/jquery.mobile-1.3.0-rc.1.css" />
	
	<link rel="stylesheet" href="<?php echo $this->webroot;?>css/magnific-popup.css">  
    <link rel="stylesheet" href="<?php echo $this->webroot;?>js/jquery-ui/jquery-ui.css">
    <script src="<?php echo $this->webroot;?>js/jquery-1.9.1.min.js"></script> 
  	<script src="<?php echo $this->webroot;?>js/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo $this->webroot;?>js/jquery.mobile-1.3.0-rc.1.js"></script>
	
	<script src="<?php echo $this->webroot;?>js/bootstrap3.min.js"></script>
	<script src="<?php echo $this->webroot;?>js/jquery.magnific-popup.js"></script>
    
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
		
	<!-- Magnific Popup core JS file -->
	</head>
	
    <!-- CSS -->
	
   
	<!-- Magnific Popup core JS file -->
	
</head>
<body>
	<div id='page'>
		
			<!-- SLIDE -->
			<section class='header-container'> 
				<div class='row'>
					<div class='container' style="padding:0px !important">
                    	<div class="col-lg-12" style="padding:0px !important">
                            <h1 class="wrap-logo">
                                <a href="index.html" class="text-hide icon-ib icon-logo">Logo</a>
                            </h1>
                        </div>
                       
					</div>
				</div>
			</section>
				<!-- TOP HEADER -->
			<div class='top_min'>
				<div class='title_min col-xs-8' onclick='_menu();'><h4>Menu</h4></div>
				<h5 class='txt_min col-xs-4'>
				
				<div class='clear'></div>
			</div>
			<!-- MENU MOBILE -->
			<div id='menu_dt'>
				<ul id='sub_menu'>
					<a href='<?php echo $this->webroot;?>vipham'>
						<li>Danh sách vi phạm</li>
					</a>
					<a href='<?php echo $this->webroot;?>luuluonggiaothong.html'>
						<li>Lưu lượng giao thông</li>
					</a>
					<a href='<?php echo $this->webroot;?>thongke.html'>
						<li>Thống kê</li>
					</a>
					<a href='<?php echo $this->webroot;?>quanly.html'>
						<li>Quản lý</li>
					</a>
					<a href='<?php echo $this->webroot;?>cauhinh'>
						<li>Cấu hình</li>
						
					</a>
                    
					<div class='clear'></div>
				</ul>
			</div >
			<header class='company' >
				<div class='container'>
				<div class='row'>
				<nav class="navigation  ">
					<ul>
						<a href='<?php echo $this->webroot;?>vipham.html'>
							<li style='border-left:1px solid #d9d9d9' id='vipham'>
									
									<h5>Danh sách vi phạm</h5>
								
							</li>
						</a>
						<a href='<?php echo $this->webroot;?>luuluonggiaothong.html' >
							<li id='luuluong'>
									
									<h5>Lưu lượng giao thông</h5>
								
							</li>
						</a>
						<a href='<?php echo $this->webroot;?>thongke.html' >
							<li id='thongke'>
									
									<h5>Thống kê</h5>
								
							</li>
						</a>
						
					<?php 
					if ($this->Session->check('user_id') == true)
					{
					?>
						<a href='<?php echo $this->webroot;?>quanly.html' >
							<li id='quanly'>
									<h5>Quản lý</h5>
							</li>
						</a>
						<a href='<?php echo $this->webroot;?>cauhinh.html'>
							<li  id="cauhinh">
									<h5>Cấu hình</h5>
							</li>
						</a>
                        <a href='<?php echo $this->webroot;?>login/logout.html' style="float: right;margin-left: 226px;border-left: 1px solid #CCC;">
							<li  id="">
									<h5>Đăng Xuất</h5>
							</li>
						</a>
                     <?php 
					}
					 ?>   
					</ul>	
				</nav>
				</div>
				</div>
			</header>
			<div style='clear:both;'></div>
			
			<section class='container container2'>
		

		<?php echo $content_for_layout; ?>
        
	<? //echo $permission;?>
    <div style="height: 50px;"></div>
    	</section>
       
	<footer style="left: 0;right: 0;bottom: 0;position:fixed">
				<div id="goTop">
							<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ3Ni43MzcgNDc2LjczNyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDc2LjczNyA0NzYuNzM3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPGc+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0yMzguMzY5LDBDMTA2LjcyNiwwLDAsMTA2LjcyNiwwLDIzOC4zNjljMCwxMzEuNjc1LDEwNi43MjYsMjM4LjM2OSwyMzguMzY5LDIzOC4zNjkgICAgIGMxMzEuNjc1LDAsMjM4LjM2OS0xMDYuNjk0LDIzOC4zNjktMjM4LjM2OUM0NzYuNzM3LDEwNi43MjYsMzcwLjA0MywwLDIzOC4zNjksMHogTTM1Mi43MjIsMjg5LjIyMSAgICAgYy02LjE5OCw2LjE5OC0xNi4yNzMsNi4xOTgtMjIuNDcsMGwtOTEuODgzLTkxLjg4M2wtOTEuODgzLDkxLjg4M2MtNi4xOTgsNi4xOTgtMTYuMjczLDYuMTk4LTIyLjQ3LDAgICAgIGMtNi4xOTgtNi4xNjYtNi4xOTgtMTYuMjczLDAtMjIuNDdMMjI3LjA4NiwxNjMuNjhjMy4xMTUtMy4xMTUsNy4xODMtNC42NCwxMS4yODMtNC42NHM4LjE2OCwxLjUyNiwxMS4yODMsNC42NEwzNTIuNzIyLDI2Ni43NSAgICAgQzM1OC45MiwyNzIuOTQ4LDM1OC45MiwyODIuOTkxLDM1Mi43MjIsMjg5LjIyMXoiIGZpbGw9IiMwMDAwMDAiLz4KCQk8L2c+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
						</div>
				
				<span>&#64; 2016 Cổng thông tin thành phố Đà Nẵng<span>
			</footer>
		
		<!-- JS -->	
    
		<script type="text/javascript">
			$(function(){
			$(window).scroll(function () {
			if ($(this).scrollTop() > 100) $('#goTop').fadeIn();
			else $('#goTop').fadeOut();
			});
			$('#goTop').click(function () {
			$('body,html').animate({scrollTop: 0}, 'slow');
			});
			});
		</script>
		<script>
			var c=0;
			function _menu(){
				if (c==0){
							document.getElementById('sub_menu').style.display = 'block';
							c=1;
						}
						else{
							document.getElementById('sub_menu').style.display = 'none';
							c=0;
							}
						}
		</script>
		
	</body>
</html>
