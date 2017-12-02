<?php 
	$pass = $userpas = "";	

?>
				
					<h2 class="title_page title_nhap">ĐỔI MẬT KHẨU</h2>
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
                                            <form class="form-horizontal" action="<?php echo $this->webroot; ?>quanlyuser/doimatkhau/<?php echo $id; ?>" method="post" onsubmit="return checkSubmit()">
                                             
                                               <div class="form-group nhap_input">
                                                <label class="col-sm-3 control-label">Mật khẩu cũ</label>
                                                <div class="col-sm-9 ">
                                                  <input class="form-control ui-input-text ui-body-c" type="password" name="passcu" style="width:100%;border: 1px solid #CCC !important">
                                 <?php if($msg == "false")
								 { ?>                
                              <div style="width:100%; margin-top:10px">                    
                             <b style="color:red"><img src="<?php echo $this->webroot; ?>img/icon/icon-canel.png" /> Mật khẩu cũ không đúng !!</b></div>
                            <?php } ?>
                                                </div>
                                              </div>
                                               <div class="form-group nhap_input">
                                                <label class="col-sm-3 control-label">Mật khẩu mới</label>
                                                <div class="col-sm-9 ">
                                                  <input class="form-control ui-input-text ui-body-c" value="" name="pass" type="password" style="width:100%;border: 1px solid #CCC !important" id="newpass">
                                                </div>
                                              </div>
                                              <div class="form-group nhap_input">
                                                <label class="col-sm-3 control-label">Nhập lại mật khẩu mới</label>
                                                <div class="col-sm-9 ">
                                                  <input class="form-control ui-input-text ui-body-c" name="repass" value="" type="password" style="width:100%;border: 1px solid #CCC !important"  id="re_newpass" onchange="hamABC()">
                                                  
                                         <div style="width:100%; margin-top:10px;" id="thongbao_loi">                    
                            </div>
                                                </div>         
                                                </div>
                                              </div>
                                              
                                               <input value="" name="id" type="hidden" >
                                               
                                              <div class="form-group nhap_input">
                                                <label  class="col-sm-3 control-label"></label>
                                                <div class="col-sm-9 " >
                                                <button type="submit" class="btn-table btn_icon_sua ui-btn-hidden" style="float:left;background-position: 9px center;width:90px;color:white">Lưu</button>
                                                <a href="<?php echo $this->webroot; ?>quanlyuser" style="float:left;background-position: 9px center;width:90px;color:white;margin-left:30px" class="btn-table btn_icon_xoa ui-btn-hidden nut_huy">
                                        <span style="padding-left:25px;">Hủy</span>
                                                    </a>  
                                                </div>
                                              </div>
                                            
                                             
                                                  
                                              
                                                
                                              </form></div>
                                            
										
                                        </td>
									</tr>
								</tbody> 
							</table>
					</div>

					
					
				</div>
<script>
	function hamABC()
	{
		var newpass = document.getElementById("newpass").value;
		var re_newpass = document.getElementById("re_newpass").value;
		if(newpass == re_newpass)
		{
			document.getElementById("thongbao_loi").innerHTML=' <b style="color:green"><img src="<?php echo $this->webroot; ?>img/icon/check2.png" />  Nhập lại mật khẩu đúng!!</b>';
		}else
		{ 
			document.getElementById("thongbao_loi").innerHTML=' <b style="color:red"><img src="<?php echo $this->webroot; ?>img/icon/icon-canel.png" /> Vui lòng nhập giống mật khẩu mới !!</b>';
		}
	}
	function checkSubmit()
	{
		if(document.getElementById("newpass").value == document.getElementById("re_newpass").value)
		{
			return true; 	
		}else
		{
			return false; 	
		}	
	}
	
	document.getElementById('quanlyuser').className='active2';	
</script>				