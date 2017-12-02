		<!-- dang nhập-->
			<br />		
                    <div class='box_login'>
						<form class="form-horizontal" id="LoginForm" action="<?php echo $this->webroot;?>login" method="post">
                        
                        	<div id="alert_row" class="alert alert-info"><h4 style="text-align:center"><?php echo $this->element('msg_login'); ?></h4></div>
                      
						  <div class="form-group">
							<label for="inputEmail3" class="col-sm-3 control-label">Tên truy cập</label>
							<div class="col-sm-9">
							  <input type="text"  name="data[User][username]" id="UserUsername" class="form-control"   placeholder="Tên truy cập" style="border-radius: 0;box-shadow: 0 0 0 #000 !important;border: 1px solid #ccc !important;">
							</div>
						  </div>
						  <div class="form-group">
							<label for="inputPassword3" class="col-sm-3 control-label">Mật khẩu</label>
							<div class="col-sm-9">
							  <input type="password" name="data[User][password]" id="UserPassword" class="form-control"  placeholder="Mật khẩu" style="border-radius: 0;box-shadow: 0 0 0 #000 !important;border: 1px solid #ccc !important;">
							</div>
						  </div>
						 
						  <div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
							  <button type="submit" onClick="checkLoginForm()" class="btn btn-default">Đăng nhập</button>
							   <button type="reset" class="btn btn-default" style='margin-left:10px;'>Hủy</button>
							</div>
							
						  </div>
						</form>
                        <p><a href="dulieumoitruong.html">Quay về trang chủ</a></p>
					</div>
   





  <script language="javascript" type="text/javascript">
    
	var text = document.getElementById('alert_row').textContent;
	if(text == ''){
		document.getElementById('alert_row').textContent = 'Đăng nhập để sử dụng hệ thống';
	}
	function checkLoginForm() {
		if(document.getElementById("UserUsername").value=="") {
			document.getElementById("alert_row").innerHTML = "<span style='color:red'>Vui lòng nhập tên đăng nhập!</span>";
			document.getElementById("UserUsername").focus();
			return false;
		}
		if(document.getElementById("UserPassword").value=="") {
			document.getElementById("alert_row").innerHTML = "<span style='color:red'>Vui lòng nhập mật khẩu!</span>";
			document.getElementById("UserPassword").focus();
			return false;
		}
		document.getElementById("LoginForm").submit();
	}
	document.getElementById('login').className='active2';
  </script>