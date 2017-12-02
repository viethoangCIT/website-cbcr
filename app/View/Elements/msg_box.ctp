                    <!-- ALERT MSG -->
                	<?php $flh_msg = $this->Session->flash();
						if($flh_msg != ""){
							switch($flh_msg){
								case 'ACCESS_DENIED':{
									$msg_cls = "alert-error";
									$status = "Lỗi !";
									$msg = "Tài khoản không được cấp quyền này.";
									break;
								}
								case 'SAVE_OK':{
									$msg_cls = "alert-success";
									$status = "Thành công !";
									$msg = "Đã lưu thông tin.";
									break;
								}
								case 'SAVE_FAIL':{
									$msg_cls = "alert-error";
									$status = "Lỗi !";
									$msg = "Thông tin chưa được lưu.";
									break;
								}
								case 'DELETE_OK':{
									$msg_cls = "alert-success";
									$status = "Thành công !";
									$msg = "Đã xoá thông tin.";
									break;
								}
								case 'DELETE_FAIL':{
									$msg_cls = "alert-error";
									$status = "Lỗi !";
									$msg = "Thông tin chưa được xoá.";
									break;
								}
								case 'SAVEPW_OK':{
									$msg_cls = "alert-success";
									$status = "Thành công !";
									$msg = "Đã lưu thông tin thay đổi mật khẩu.";
									break;
								}
								case 'SAVEPW_FAIL':{
									$msg_cls = "alert-error";
									$status = "Lỗi !";
									$msg = "Thông tin mật khẩu chưa được lưu. Mật khẩu cũ không đúng.";
									break;
								}
								
								default: {}
							}
						}
						?>
                    <? if($flh_msg != ""){?>
                    	<span class="<? echo $msg_cls;?>">
                        	<strong><? echo $status;?></strong>
							<? echo $msg;?>
                        </span>
					<? }?>
                    <!-- END ALERT MSG -->