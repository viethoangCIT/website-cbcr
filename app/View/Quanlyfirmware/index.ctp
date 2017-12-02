<?php 
            if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
            {
          ?>
<h2 class='title_page'>QUẢN LÝ FIRMWARE</h2>
        
                    <div style="width:100%;text-align:right; padding-right:15px" class="them_dulieu">
                    	<a href="<?php echo $this->webroot; ?>quanlyfirmware/nhap.html" style="font-size:16px; font-weight:bold"><img src="<?php echo $this->webroot; ?>img/icon/edit_icon.png" />Thêm Firmware</a><br />
                    </div>
					<div class="table-responsive font_table"> 
						<div  class='tbl_r'>
							  
						
						<table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>
						
						  <thead>
							<tr class='v_mid'>
							  <th  width='5%'>STT</th>
                              <th  width='20%'>Tên Firmware</th>
							  <th width='20%'>Phiên bản</th>
							  <th   width='15%'>URL</th>
							  <th   width='15%'>Trạng thái</th>
							  <th  width='15%'>Ngày tạo</th>
							  <th  width='10%'>Tùy chọn</th>
                              
							</tr>
						  </thead>
						  <tbody class='body_mid'>
                           <?php 
						 if($array_firmware)
						 {
							$stt = 0;
							foreach($array_firmware as $dulieu)
							{
								$name = $dulieu["Firmware"]["name"];	
								$version = $dulieu["Firmware"]["version"];
								$firmware_date = date("d-m-Y",strtotime($dulieu["Firmware"]["firmware_date"]));
								$status = $dulieu["Firmware"]["status"];
								if($status == "0") $status = "Chưa hoạt động";
								else $status = "Hoạt động";
								$url = $this->webroot."files/".$dulieu["Firmware"]["url"];
								$id = $dulieu["Firmware"]["id"];
								$stt++;	
											
						?>
							<tr>
							  <th><?php echo $stt; ?></th>
                              <td class='mid'><div class="chiso_phone"><?php echo $name; ?></div></td>
							  <td class='mid'><?php echo $version; ?></td>
							  <td class='mid'><a href="<?php echo $url; ?>">Tải về</a></td>
							  <td class='mid'><?php echo $status; ?></td>
                              <td class='mid'><?php echo $firmware_date; ?></td>
								 <td>
                                 <ul class="pager btn_tt ql_mar">
                                 	
                                 	<li class="tuychon_sua"><a href="<?php echo $this->webroot; ?>quanlyfirmware/nhap/<?php echo $id; ?>" class='btn_sua' style="width:82px;margin-bottom: 4px;">Sửa&nbsp; </a></li>
                                    <li class="tuychon_xoa"><a href="<?php echo $this->webroot; ?>quanlyfirmware/xoa/<?php echo $id; ?>" class='btn_xoa'  style="width:82px" >Xóa &nbsp;</a></li>
                                 </ul>
                                
                                 </td>
                                 
							</tr>
						 <?php 
							}
						 }else
						 {?>
						   <tr>
							 <th colspan="7">Không có dữ liệu</th> 
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
	document.getElementById('quanlyfirmware').className='active2';	
</script>     

<?php }?>            