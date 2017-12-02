                    <!-- MSG LOGIN -->
                	<?php 
                	$flh_msg = $this->Session->flash();
                        $status ="";
                        $msg = "";
                        
						if($flh_msg != ""){
							switch($flh_msg){
								case 'NOT_LOGIN':{
									$msg_cls = "alert-error";
									$status = "Lỗi !";
									$msg = "Xin vui lòng đăng nhập để sử dụng hệ thống.";
									break;
								} // end case NOTLOGIN

								case 'LOGIN_FAIL':{
									$msg_cls = "alert-error";
									$status = "Lỗi !";
									$msg = "Tên đăng nhập hoặc mật khẩu không đúng.";
									break;
								} // end case LOGIN FAIL

								case 'PERMISSION_NULL':{
									$msg_cls = "alert-error";
									$status = "Lỗi !";
									$msg = "Tài khoản này hiện chưa được phân quyền.";
									break;
								} // end case PERMISSION NULL
								default:{}
							}
						}// end if $flh_msg
						else {
							$status = 'Yêu cầu !';
							$msg = 'Đăng Nhập Hệ Thống';
							echo $this->Html->div('red',$msg);
						}
						?>
                    <?php if($flh_msg != ""){
						echo $this->Html->div('red',$status.$msg);
					}?>
                    <!-- END MSG LOGIN -->
