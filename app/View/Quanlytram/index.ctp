<?php 
            if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
            {
          ?>
<h2 class='title_page'>QUẢN LÝ TRẠM</h2>
					<form action="<?php echo $this->webroot;?>quanlytram" method="get" id="form_timkiem">
                        <div class="row tram_quanlytram" style="margin-left:0px; margin-right:0px">
                            <div class='loaixe tram_quanlytram' style="width:310px;">
                                  <div class='lbl_day ngay' style="width:95px">
                                      Tên trạm
                                  </div>
                             <?php
								  echo $this->Form->input("ten_tram",array('onchange'=>'SubmitForm()','default'=>"$ten_tram",'label' => false,'type'=>'select','options'=>$array_option_tram,'class'=>'form-control input_txt_loaixe tram_dangbang','name'=>'data[ten_tram]','style'=>'width:200px'));?>
							</div>
						</div>                        
					</form>
                    <div style="width:100%;text-align:right; padding-right:15px" class="them_dulieu">
                    	<a href="<?php echo $this->webroot; ?>quanlytram/nhap.html" style="font-size:16px; font-weight:bold"><img src="<?php echo $this->webroot; ?>img/icon/edit_icon.png" />Thêm trạm</a><br />
                    </div>
					<div class="table-responsive font_table"> 
						<div  class='tbl_r'>
							  
						
						<table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>
						
						  <thead>
							<tr class='v_mid'>
							  <th  width='5%'>STT</th>
                               <th   width='15%'>Tên trạm </th>
                               <th   width='10%'>Điện thoại</th>
                               <th  width='20%'>Địa chỉ</th>
							  <th  width='15%'>Tọa độ</th>
							  <th  width='10%'>Chỉ Số</th>
                              <th>Người Quản Lý</th>
							  <th  width='12%'>Tùy chọn</th>
                              
							</tr>
						  </thead>
						  <tbody class='body_mid'>
                           <?php 
						 if($array_dulieu)
						 {
							$stt = 0;
							foreach($array_dulieu as $dulieu)
							{
								$ten_tram = $dulieu["Tram"]["ten"];	
								$quan = $dulieu["Tram"]["quan"];	
								$phuong = $dulieu["Tram"]["phuong"];	
								$chiso = str_replace("\n","<br>",$dulieu["Tram"]["chi_so"]);
								$diachi = $dulieu["Tram"]["dia_chi"];
								$thanhpho = $dulieu["Tram"]["thanh_pho"];
								$toado = $dulieu["Tram"]["toa_do"];
								$tuychon = $dulieu["Tram"]["trangthai"];
								$id = $dulieu["Tram"]["id"];
								$sodienthoai = $dulieu["Tram"]["sodienthoai"];
								$danhsach_nguoi_quanly = $dulieu["Tram"]["phone_manager"];
								$stt++;	
								
								$array_nguoi_quanli = NULL;
								$sdt_nguoi_quanly = $nguoi_quanly = "";
								
								//lấy danh sách người quản lý
								if($danhsach_nguoi_quanly != "")
								{
									$danhsach_nguoi_quanly = substr($danhsach_nguoi_quanly, 1, -1);
									$array_nguoi_quanli = explode(",",$danhsach_nguoi_quanly);
									for($i = 0; $i < count($array_nguoi_quanli); $i++)
									{
										$sdt_nguoi_quanly = $array_nguoi_quanli[$i];
										if(isset($array_user[$sdt_nguoi_quanly]))
										{
											if($nguoi_quanly != "") $nguoi_quanly .= "<br>";
											$nguoi_quanly .= $array_user[$sdt_nguoi_quanly];
										}
									}
								}
						?>
							<tr>
							  <th><?php echo $stt; ?></th>
                              <td class='mid'><?php echo $ten_tram; ?></td>
                              <td class='mid'><?php echo $sodienthoai; ?></td>
                              <td>
							  	<div class="chiso_phone">
									<?php echo $diachi; ?>, <?php echo $phuong; ?>, <?php echo $quan; ?>, <?php echo $thanhpho; ?>
               					</div>
                              </td>
                              <td class='mid'><div class="chiso_phone"><?php echo $toado; ?></div></td>
							  <td class='mid'><div class="chiso_phone"><?php echo $chiso; ?></div></td>
                              <td><?php echo $nguoi_quanly; ?></td>
								 <td>
                                 <ul class="pager btn_tt ql_mar">
                                 	<?php
								 if($tuychon == "0")
								 {
								  ?>
                                 	<li ><a href="<?php echo $this->webroot; ?>quanlytram/duyet/<?php echo $id; ?>" style="background-color:green !important;margin-bottom: 4px;">Hoạt động</a></li>
                                <?php }else
								{ ?>    
                                    <li ><a href="<?php echo $this->webroot; ?>quanlytram/thuhoi/<?php echo $id; ?>" class="btn_thuhoi ui-link" style="width:83px;margin-bottom: 4px; padding:6px">Bảo trì</a></li>
                                <?php 
								} ?>  
                                 	<li ><a href="<?php echo $this->webroot; ?>quanlytram/nhap/<?php echo $id; ?>" class='btn_sua candeu' style="width:82px;margin-bottom: 4px;">Sửa&nbsp; </a></li>
                                    <li ><a href="<?php echo $this->webroot; ?>quanlytram/xoa/<?php echo $id; ?>" class='btn_xoa'  style="width:82px">Xóa &nbsp;</a></li>
                                 </ul>
                                
                                 </td>
                                 
							</tr>
						 <?php 
							}
						 }else
						 {?>
						   <tr>
							 <th colspan="10">Không có dữ liệu</th> 
						  </tr>
						  <?php } ?> 
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
	function SubmitForm()
	{
		document.getElementById("form_timkiem").submit();	
	}
	document.getElementById('quanlytram').className='active2';	
</script> 

<?php }?>                