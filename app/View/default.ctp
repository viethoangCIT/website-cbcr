
<!DOCTYPE html>
<html>
  <head>
	<title>HỆ THỐNG CAMERA GIÁM SÁT CHÁY RỪNG</title>
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Sat, 15 July 2017 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />


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
	<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/button.css" />
  <!--   <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/main.css" /> -->
	<link rel="stylesheet"  href="<?php echo $this->webroot;?>css/jquery.mobile-1.3.0-rc.1.css" />
	
	<link rel="stylesheet" href="<?php echo $this->webroot;?>css/magnific-popup.css">  
    <link rel="stylesheet" href="<?php echo $this->webroot;?>js/jquery-ui/jquery-ui.css">
    <script src="<?php echo $this->webroot;?>js/jquery-1.9.1.min.js"></script> 
  	<script src="<?php echo $this->webroot;?>js/jquery-ui/jquery-ui.js"></script>
    <script src="<?php echo $this->webroot;?>js/jquery.mobile-1.3.0-rc.1.js"></script>
	
	<script src="<?php echo $this->webroot;?>js/bootstrap3.min.js"></script>
	<script src="<?php echo $this->webroot;?>js/jquery.magnific-popup.js"></script>
    
    <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/multi-select.css"/>
    
	<!-- <link rel="stylesheet"  href="<?php echo $this->webroot;?>css/jquery.mobile-1.3.0-rc.1.js" /> -->
	<link rel="stylesheet" href="<?php echo $this->webroot;?>js/bootstrap-datepicker.css"/>
	<link rel="stylesheet" href="<?php echo $this->webroot;?>css/magnific-popup.css"/> 
  <link rel="stylesheet" href="<?php echo $this->webroot;?>js/jquery-ui/jquery-ui.css">
     <link rel="stylesheet" href="<?php echo $this->webroot;?>js/jquery.timepicker.min.css"/>
     <link rel="stylesheet" href="<?php echo $this->webroot;?>js/jquery.timepicker.css"/>
   
   <script src="<?php echo $this->webroot;?>js/jquery-1.9.1.min.js"></script> 
     	<script src="<?php echo $this->webroot;?>js/jquery-ui/jquery-ui.js"></script>
     <!--  <script src="<?php echo $this->webroot;?>js/jquery.mobile-1.3.0-rc.1.2.js"></script> -->
   	
   	<script src="<?php echo $this->webroot;?>js/bootstrap3.min.js"></script>
   	<script src="<?php echo $this->webroot;?>js/jquery.magnific-popup.js"></script>
   	
 
    
   <script src="<?php echo $this->webroot;?>js/jquery.multi-select.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://www.rgraph.net/blog/an-example-of-html5-canvas-video-zoom.html" />
<meta name="description" content="This page shows you an example of how you can use HTML5 canvas to show a video and select a portion of it to zoom in on" />

<meta name="google-site-verification" content="s8bvfR_0aMUePehdfWjaLDopT4oyoRO-XaOTfcjJhgY" />
<link rel="alternate" type="application/rss+xml" href="https://www.rgraph.net/news.xml">
<!-- <link rel="stylesheet" href="/css/styles.css" type="text/css" media="screen" /><link rel="icon" type="image/png" href="/images/favicon.png"> -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta property="og:title" content="An example of HTML5 canvas video zoom" />
<meta property="og:description" content="This page shows you an example of how you can use HTML5 canvas to show a video and select a portion of it to zoom in on" />
<meta property="og:image" content="https://www.rgraph.net/images/logo-250x250.png"/>
<meta property="og:type" content="website" />
<meta property="og:url" content="https://www.rgraph.net/blog/an-example-of-html5-canvas-video-zoom.html" />

<meta name="twitter:card" content="summary">
<meta name="twitter:url" content="https://www.rgraph.net/blog/an-example-of-html5-canvas-video-zoom.html">
<meta name="twitter:title" content="An example of HTML5 canvas video zoom">
<meta name="twitter:description" content="This page shows you an example of how you can use HTML5 canvas to show a video and select a portion of it to zoom in on">
<meta name="twitter:image" content="https://www.rgraph.net/images/logo-250x250.png">

<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120-precomposed.png" />
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152-precomposed.png" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
	<!-- Magnific Popup core JS file -->
	</head>
	
    <!-- CSS -->
	
   
	<!-- Magnific Popup core JS file -->
<style>
/* The Modal (background) */
.ui-focus {
 -moz-box-shadow: none !important;
 -webkit-box-shadow: none !important;
 box-shadow: none !important;
}
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 60px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 40%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: red;
    color: white;
}

.modal-body {
	padding: 2px 16px;
	padding-bottom: 15px;
	background-color: #f7f7f7;
	
	}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
.btn-agree{
	width: 20%;
    padding: 1%;
    font-size: 15px;
    font-weight: bold;
    margin-left: 21%;
    text-align: center;
    color: white;
}
h2, h3{
	text-align: center;
	font-weight: bold;
}
#agree{
	background: red;
}
#disagree{
	background: #5cb85c;
}
#finish{
	width: 25%;
    padding: 1%;
    font-size: 15px;
    font-weight: bold;
    margin-left: 15%;
    text-align: center;
    color: white;
    background:#5cb85c;
}
#loading{
	width: 25%;
    padding: 1%;
    font-size: 15px;
    font-weight: bold;
    margin-left: 15%;
    text-align: center;
    color: white;
    background:red;
}.btn_xacnhan{
	background: green;
    font-weight: bold;
    font-size: 15px;
    color: white;
}


.nav li{
    height: 52px;
}


</style>


<body>
	<div id='page'>
		
			<!-- SLIDE -->
			<section class='header-container'> 
				<div style="width:100%">
					<div class='container' style="padding:0px !important">
                    	<div class="col-lg-12" style="padding:0px !important">
                            <h1 class="wrap-logo" style="width:50%; float:left">
                                <a href="http://egov.danang.gov.vn/" class="text-hide icon-ib icon-logo">Logo</a>
                            </h1>
                            <h1 class="tieude_hethong">
                            	HỆ THỐNG CAMERA GIÁM SÁT CHÁY RỪNG
                            </h1>
                            <div class="user_name_login">
                            <a href="<?php echo $this->webroot;?>login.html" class="log_out">&nbsp;  &nbsp; &nbsp; &nbsp;  Đăng Xuất </a>
                            <a href="" class="hello">&nbsp;  &nbsp; &nbsp; &nbsp;  Sơn Nguyễn </a>
                            </div>
                        </div>
                       
                       
					</div>
				</div>
			</section>
				<!-- TOP HEADER -->
			<div class='top_min'>
				<div class='title_min col-xs-7' onclick='_menu();'><img src="<?php echo $this->webroot;?>img/icon/menu-icon-11.png" style="width:45px;"/>
               </div>
				<h5 class='txt_min col-xs-5'>
                <div onclick='div_user();>
				<p' class="user_mobile dropbtn" style="text-decoration: none; margin-top: 13px; margin-right: -10px;font-weight: bold; 640font-size: 15px;">
					&nbsp; &nbsp; &nbsp; Sơn Nguyễn
				</p> </h5>
                <div id="logout">
                    <a href="">Đăng xuất</a>
                </div>
                 
				<div class='clear'></div>
			</div>
            <form>
            <div class="div_select">
                        <select id="tram_canh_bao_mobile" >
                                <option>Trạm Liên Chiểu</option>
                                <option>Trạm Bà Nà</option>
                                <option>Trạm Sơn Trà</option>
                            </select>
            </div>
            </form>
			<!-- MENU MOBILE -->
			<div id='menu_dt'>
				<ul id='sub_menu'>
                    	<a href='/home.html'>
						<li>Trang chủ</li>
                        </a>
                        <a href='/giamsatchayrung/index'>
                            <li>Giám sát rừng</li>
                        </a>
                        <a href='/giamsatmoitruong/index'>
                            <li>Giám sát môi trường</li>
                        </a>
                        <a href='/bando.html'>
                            <li>Bản đồ</li>
                        </a>
                        <a href='/trangquantri'>
                            <li>Trang quản trị</li>
                        </a>
                       
                    
					<div class='clear'></div>
				</ul>

			</div >
			<header class='company' >
				<div class='container' style="padding-left:0px; padding-right:0px">
				<div class='row' style="margin-left:0px; margin-right:0px">
				<nav class="navbar" style="font-size:20px; height:33px">
					
                <ul class="nav navbar-nav" style="width:100%;">
                            
                     
                <li style="border-right: 1px solid #d9d9d9;border-left: 1px solid #d9d9d9; font-size:16px"><a href="<?php echo $this->webroot;?>dulieumoitruong.html" class="mau_menu" id="trangchu">Trang chủ</a></li>
                <li style="border-right: 1px solid #d9d9d9; font-size:16px"><a href="<?php echo $this->webroot;?>giamsatchayrung.html" class="mau_menu" id="bieudo">Giám sát rừng</a></li>
                <li style="border-right: 1px solid #d9d9d9; font-size:16px"><a href="<?php echo $this->webroot;?>giamsatmoitruong.html" class="mau_menu" id="bando">Giám sát môi trường</a></li>
                  <li style="border-right: 1px solid #d9d9d9; font-size:16px"><a href="<?php echo $this->webroot;?>bando.html" class="mau_menu" id="bando">Bản đồ</a></li>
 				<li style="border-right: 1px solid #d9d9d9; font-size:16px"><a href="<?php echo $this->webroot;?>trangquantri" class="mau_menu" id="bando">Trang quản trị</a></li>
 				
 				
 				
				<li style="border-right: 1px solid #d9d9d9; font-size:16px; float:right;"><a href="<?php echo $this->webroot;?>login.html" class="mau_menu" id="login">Đăng nhập</a></li>	
                <style type="text/css">
                    #tram_canh_bao:focus{
                     outline: none!important;   
                    }
                    .ui-shadow{
                        box-shadow: none;
                    }
                </style>
				<li  id="li_tram">
					<select id="tram_canh_bao" >
						<option>Trạm Liên Chiểu</option>
						<option>Trạm Bà Nà</option>
						<option>Trạm Sơn Trà</option>

					</select>
				</li>	
					<li class ="end" style="display:none; font-size: 16px; background-color: green; font-weight: bold; height: 51px!important; margin-top: 0px; float:right; margin-right: 1px"><a href="/canhbao"  style="color:white; height: 51px;" target="_blank">Cảnh báo</a></li>
															 		
						
				
					</ul>	
				</nav>
				</div>
				</div>
			</header>
			<div style='clear:both;'></div>
			
			<section class='container container2'>
		

		<?php echo $content_for_layout; ?>
        
	<? //echo $permission;?>
   
   
    	</section>
       <br /><br /><br /><br />
	<footer style="text-shadow:none;letter-spacing:0px ;left: 0;right: 0;bottom: 0;position:absolute;background-color:#f1f1f1;z-index:10;padding:10px 20px 10px 20px;margin-top:0px !important;font-family:inherit;font-size:13px;line-height:17px !important">
				<div id="goTop" style="display: none">
							<img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQ3Ni43MzcgNDc2LjczNyIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNDc2LjczNyA0NzYuNzM3OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxnPgoJPGc+CgkJPGc+CgkJCTxwYXRoIGQ9Ik0yMzguMzY5LDBDMTA2LjcyNiwwLDAsMTA2LjcyNiwwLDIzOC4zNjljMCwxMzEuNjc1LDEwNi43MjYsMjM4LjM2OSwyMzguMzY5LDIzOC4zNjkgICAgIGMxMzEuNjc1LDAsMjM4LjM2OS0xMDYuNjk0LDIzOC4zNjktMjM4LjM2OUM0NzYuNzM3LDEwNi43MjYsMzcwLjA0MywwLDIzOC4zNjksMHogTTM1Mi43MjIsMjg5LjIyMSAgICAgYy02LjE5OCw2LjE5OC0xNi4yNzMsNi4xOTgtMjIuNDcsMGwtOTEuODgzLTkxLjg4M2wtOTEuODgzLDkxLjg4M2MtNi4xOTgsNi4xOTgtMTYuMjczLDYuMTk4LTIyLjQ3LDAgICAgIGMtNi4xOTgtNi4xNjYtNi4xOTgtMTYuMjczLDAtMjIuNDdMMjI3LjA4NiwxNjMuNjhjMy4xMTUtMy4xMTUsNy4xODMtNC42NCwxMS4yODMtNC42NHM4LjE2OCwxLjUyNiwxMS4yODMsNC42NEwzNTIuNzIyLDI2Ni43NSAgICAgQzM1OC45MiwyNzIuOTQ4LDM1OC45MiwyODIuOTkxLDM1Mi43MjIsMjg5LjIyMXoiIGZpbGw9IiMwMDAwMDAiLz4KCQk8L2c+Cgk8L2c+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPGc+CjwvZz4KPC9zdmc+Cg==" />
						</div>
				
				<span style="color:#000 !important;"><b>CHI CỤC KIỂM LÂM ĐÀ NẴNG</b><span><br />
                <span style="color:#000 !important;font-size:12px">Địa chỉ: 02 Trần Cao Vân, Quận Hải Châu, Đà Nẵng<span><br />
                <span style="color:#000 !important;font-size:13px">Đường dây nóng hỗ trợ: <b>(+84) 986 668 333</b><span>
			</footer>
		<script>
            jQuery(document).ready(function($) {
            
        });
        
            
            </script>
            <script type="text/javascript">
            
              $(document).ready(function() {
               //danh cho text tim kiem
               $('#timkiem').focus(function(){
                       $(this).data('placeholder',$(this).attr('placeholder')).attr('placeholder','');
        }).blur(function(){
                       $(this).attr('placeholder',$(this).data('placeholder'));
        });
              
              
            
              //danh cho click row
             
        
            
        
              });
              </script>
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
            var d=0;
            function _menu(){
                if (c==0){
                            document.getElementById('sub_menu').style.display = 'block';
                             //document.getElementById('').style.display = 'block';
                            c=1;
                        }
                        else{
                            document.getElementById('sub_menu').style.display = 'none';
                            c=0;
                            }
                        }

                function div_user(){
                if (d==0){
                            document.getElementById('logout').style.display = 'block';
                             //document.getElementById('').style.display = 'block';
                            d=1;
                        }
                        else{
                            document.getElementById('logout').style.display = 'none';
                            d=0;
                            }
                        }
        </script>
        
            </body>
        </html>
        
      <script type="text/javascript">
          // $('tram_canh_bao').selectmenu('disable');
           //$('select').selectmenu('enable');
       </script>  -->

