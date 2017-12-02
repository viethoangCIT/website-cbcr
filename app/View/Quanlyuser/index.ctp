<h2 class='title_page'>QUẢN LÝ TÀI KHOẢN</h2>

					<div class='row tram_quanlytram'>
						<form action="<?php echo $this->webroot;?>quanlyuser" method="get">
                            <div class='bienso row timkiem_tk' style="width:421px;margin-right: 0px !important; padding-left: 15px;">
                                <div class='lbl_day tim' style="width:86px;background-color:#ff631d; float:left">
                                    Tìm kiếm 
                                </div>
                                <div class="nhap_tim" style="float:left">
                                	<input type="text" class="form-control input_txt_camera taikhoan" id="timkiem"  placeholder="Nhập họ tên..." style="font-size:12px;text-align:left;width:275px;border: 1px solid #ff631d !important" name="tim">
                                </div>
                                <div class='box_btn_tk nut_tim' style="float:left;width:45px">
                                     <button type="submit" class="btn btn-default btn_tk" style="height:35px">
                                        <img src="<?php echo $this->webroot;?>img/icon/icon-search.png">
                                     </button>
                            	</div>
                            </div>
						</form>
                    </div>
                    <div style="width:100%;text-align:right; padding-right:15px" class="them_dulieu">
                    	<a href="<?php echo $this->webroot; ?>quanlyuser/nhap.html" style="font-size:16px; font-weight:bold"><img src="<?php echo $this->webroot; ?>img/icon/edit_icon.png" />Tạo tài khoản</a><br />
                    </div>
					<div class="table-responsive font_table" > 
						<div  class='tbl_r'>
						 		  
						
						<table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc;width:100%; display:inline-table'>
						
						  <thead>
							<tr class='v_mid'>
							  <th data-priority="1" width='5%'>STT</th>
                               <th data-priority="6"  width='20%'>Tên truy cập</th>
                               <th data-priority="5" width='15%'>Mật khẩu</th>
							  <th data-priority="2"  width='20%'>Họ tên</th>
                              <th data-priority="2"  width='20%'>Điện thoại</th>
							  <th data-priority="3"  width='20%'>Email</th>
                              <th data-priority="3"  width='20%'>Tùy chọn</th>
							</tr>
						  </thead>
						  <tbody class='body_mid'>
                          <?php 
						  if($array_user)
						  {
						  	$stt = 0;
						  	foreach($array_user as $user)
							{
								$username = $user["User"]["username"];	
								$password = $user["User"]["password"];	
								$fullname = $user["User"]["fullname"];	
								$email = $user["User"]["email"];
								$phone = $user["User"]["phone"];
								$id = $user["User"]["id"];
								$stt++;	
							
						  ?>
							<tr>
							  <th><?php echo $stt; ?></th>
                              <td class='mid'><div class="chiso_phone"><?php echo $username; ?></div></td>
                              <td class='mid'>********</td>
							  <td class='mid'><?php echo $fullname; ?></td>
                              <td class='mid'><?php echo $phone; ?></td>
							  <td><?php echo $email; ?></td>
								 <td>
                                 <ul class="pager btn_tt ql_mar">
                                 	
                                 	<li><a href="<?php echo $this->webroot; ?>quanlyuser/nhap/<?php echo $id; ?>" class='btn_sua tuychon' style="width:140px;margin-bottom: 4px;">Sửa&nbsp; </a></li>
                                    <li><a href="<?php echo $this->webroot; ?>quanlyuser/xoa/<?php echo $id; ?>" class='btn_xoa tuychon'  style="width:140px">Xóa &nbsp;</a></li>
                                    <li><a href="<?php echo $this->webroot; ?>quanlyuser/doimatkhau/<?php echo $id; ?>" class='btn_thuhoi tuychon_pass' style="width:140px;margin-top: 4px;">Đổi mật khẩu </a></li>
                                 </ul>
                                
                                 </td>
                                 
							</tr>
						<?php
							}
						  }else
						  {
							?>
							<tr >
                                 <th colspan="6">Không có dữ liệu</th> 
                              </tr>
                       <?php 
					   	   } ?>     
						  </tbody>
						</table>
					
					</div>
					
				</div>
				<div class='dieuhuong_trang'>
					<nav aria-label="Page navigation ">
					  <ul class="pagination">
           <li>  
                      	<a href="" currentlink="1" class="ui-link"> Trang <?php echo $this->Paginator->counter(array('separator' => ' / '));?> </a>           
            		</li>
            
              <li>
                <?php //echo $this->Paginator->prev('«', null, null, array('class' => 'disabled','aria-hidden'=>'Previous','currentTag' => 'a')); 
					   echo $this->Paginator->prev(__('«'), array('tag' => false));
				?>
                
              </li>
            
            <?php 
				$tongsotrang = $this->Paginator->numbers();
				 echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentLink' => true, 'currentClass' => 'active', 'currentTag' => 'a'));
			
			?>
            <li>
                <?php 
				 	 echo $this->Paginator->next(__('»'), array('tag' => false));
				?>
            </li>
          </ul>
					</nav>
				</div>
					</div>
				</div>
<script>
document.getElementById('quanlyuser').className='active2';	
</script>                