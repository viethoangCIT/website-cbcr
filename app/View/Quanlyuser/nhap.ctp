<?php 
		$id= "";	
		$username= "";	
		$password= "";	
		$fullname= "";	
		$email= "";	
		$phone = "84";
	if($array_sua)
	{
		$id= $array_sua[0]["User"]["id"];	
		$username= $array_sua[0]["User"]["username"];	
		$password= $array_sua[0]["User"]["password"];	
		$fullname= $array_sua[0]["User"]["fullname"];	
		$email= $array_sua[0]["User"]["email"];	
		$phone= $array_sua[0]["User"]["phone"];
		if($phone == "") $phone = "84";
	}

?>
				
					<h2 class="title_page title_nhap">CHỈNH SỬA TÀI KHOẢN</h2>
					<div class="row" style="width:100%;margin: auto;">
					<div class="table-responsive nhaptram" style="width: 800px;margin: auto;"> 
							<table class="table table-bordered table-striped lg_code" style="font-size:15px"> 
								<colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
								<thead class="bg_title"> 
									<tr> 
										<th colspan="2" style="padding:13px 10px; text-align:center">THÔNG TIN TÀI KHOẢN</th> 
									</tr> 
								</thead>
								<tbody> 
									<tr> 
                                    	<td colspan="2">
										 <div class="row row4" style="width:100%">
                                            <form class="form-horizontal" action="<?php echo $this->webroot; ?>quanlyuser/nhap" method="post"  onsubmit="return checkSubmit()">
                                              <div class="form-group nhap_input">
                                                <label class="col-sm-3 control-label">Tên đăng nhập</label>
                                                <div class="col-sm-9 ">
                                                 <input class="form-control ui-input-text ui-body-c" value="<?php echo $username; ?>"  type="text" name="data[user][username]" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" required="required" pattern=".{6,15}" title="Tên đăng nhập từ 6-15 kí tự.">
                                                </div>
                                              </div>
                                              <?php 
                                              if($array_sua == NULL)
											  {
											  ?>
                                              <div class="form-group nhap_input">
                                                <label class="col-sm-3 control-label">Mật khẩu</label>
                                                <div class="col-sm-9 ">
                                                 <input class="form-control ui-input-text ui-body-c" type="password" name="data[user][password]" id="pass" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" required="required" pattern=".{8,15}" title="Mật khẩu từ 8-15 kí tự.">
                                                </div>
                                              </div>
                                              
                                               <div class="form-group nhap_input">
                                                <label class="col-sm-3 control-label">Nhập Lại Mật khẩu</label>
                                                <div class="col-sm-9 ">
                                                 <input class="form-control ui-input-text ui-body-c" type="password" name="data[user][re_pass]" id="re_pass" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" required="required" pattern=".{8,15}" title="Mật khẩu từ 8-15 kí tự." onchange="kiemtra_mk()">
                                                  <div style="width:100%; margin-top:10px;" id="thongbao_loi"></div> 
                                                </div>
                                              </div>
                                              <?php } ?> 
                                              <div class="form-group nhap_input">
                                                <label class="col-sm-3 control-label">Họ tên</label>
                                                <div class="col-sm-9 ">
                                                  <input class="form-control ui-input-text ui-body-c" value="<?php echo $fullname; ?>" name="data[user][fullname]" type="text" style="width:100%;border: 1px solid #CCC !important">
                                                </div>
                                              </div>
                                              
                                              <div class="form-group nhap_input">
                                                <label class="col-sm-3 control-label">Số điện thoại</label>
                                                <div class="col-sm-9 ">
                                                  <input class="form-control ui-input-text ui-body-c" value="<?php echo $phone; ?>" name="data[user][phone]" type="text" style="width:100%;border: 1px solid #CCC !important">
                                                </div>
                                              </div>
                                              
                                               <div class="form-group nhap_input">
                                                <label class="col-sm-3 control-label">Email</label>
                                                <div class="col-sm-9 ">
                                                  <input class="form-control ui-input-text ui-body-c" value="<?php echo $email; ?>" name="data[user][email]" type="text" style="width:100%;border: 1px solid #CCC !important">
                                                </div>
                                              </div>
                                               <input value="<?php echo $id; ?>" name="data[user][id]" type="hidden" >
                                               
                                             
                                                <div class="row row2" style="margin-left:auto; margin-right:auto; width:29%">
                                                    <button type="submit" class="btn-table btn_icon_sua ui-btn-hidden" style="float:left;background-position: 9px center;width:90px;color:white">Lưu</button>
                                                     <a href="<?php echo $this->webroot; ?>quanlyuser" style="float:left;background-position: 9px center;width:90px;color:white;margin-left:30px" class="btn-table btn_icon_xoa ui-btn-hidden nut_huy">
                                        <span style="padding-left:25px;">Hủy</span>
                                    				 </a>  
                                              	</div>
                                              </form>
                                           </div>
                                        </td>
									</tr>
								</tbody> 
							</table>
					</div>

					
					
				</div>
<script>
document.getElementById('quanlyuser').className='active2';	
function kiemtra_mk()
	{
		var pass = document.getElementById("pass").value;
		var re_pass = document.getElementById("re_pass").value;
		if(pass == re_pass)
		{
			document.getElementById("thongbao_loi").innerHTML=' <b style="color:green"><img src="<?php echo $this->webroot; ?>img/icon/check2.png" />  Nhập lại mật khẩu đúng!!</b>';
		}else
		{ 
			document.getElementById("thongbao_loi").innerHTML=' <b style="color:red"><img src="<?php echo $this->webroot; ?>img/icon/icon-canel.png" /> Vui lòng nhập giống mật khẩu mới !!</b>';
		}
	}
	function checkSubmit()
	{
		if(document.getElementById("pass").value == document.getElementById("re_pass").value)
		{
			return true; 	
		}else
		{
			return false; 	
		}	
	}
</script>				
			