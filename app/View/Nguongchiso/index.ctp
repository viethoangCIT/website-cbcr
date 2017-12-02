<h2 class='title_page'>NGƯỠNG CHỈ SỐ</h2>
    <form action="<?php echo $this->webroot;?>nguongchiso" method="get" id="form_timkiem">
        <div class="row tram_quanlytram" style="margin-left:0px; margin-right:0px">
            <div class='loaixe tram_quanlytram' style="width:30%;">
                <div class='lbl_day ngay' style="width:110px;">
                    Tên chỉ số
                </div>
             <?php
                  echo $this->Form->input("ten",array('onchange'=>'SubmitForm()','default'=>"$ten",'label' => false,'type'=>'select','options'=>$array_cambien,'class'=>'form-control input_txt_loaixe tram_dangbang','name'=>'chiso','style'=>'width:241px'));?>
            </div>
        </div>
    </form>
					
                    <div style="width:100%;text-align:right; padding-right:15px" class="them_dulieu">
                    <?php
						$ten_dautien = "";
						$ten_dautien = key($array_cambien);
						if($ten != "") $ten_dautien = $ten;
					 ?>
                    	<a href="<?php echo $this->webroot; ?>nguongchiso/nhap/<?php echo $ten_dautien; ?>.html" style="font-size:16px; font-weight:bold"><img src="<?php echo $this->webroot; ?>img/icon/edit_icon.png" />Thêm ngưỡng chỉ số</a><br />
                    </div>
					<div class="table-responsive font_table" > 
						<div  class='tbl_r'>
							  
						
						<table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>
						
						  <thead>
							<tr class='v_mid'>
							  <th  width='5%'>STT</th>
                               <th   width='10%'>Tên chỉ số </th>
                               <th   width='9%'>Chỉ số dưới</th>
                               <th  width='9%'>Chỉ số trên </th>
							  <th width='8%'>Màu sắc</th>
							  <th width='15%'>Mô tả</th>
                               <th width='28%'>Chú thích</th>
							  <th  width='15%'>Tùy chọn</th>
                              
							</tr>
						  </thead>
						  <tbody class='body_mid'>
                           <?php 
						 if($array_nguong)
						 {
							$stt = 0;
							foreach($array_nguong as $nguong)
							{
								$ten = $nguong["Nguongchiso"]["ten_chiso"];	
								$chiso_tren = $nguong["Nguongchiso"]["chiso_tren"];	
								$chiso_duoi = $nguong["Nguongchiso"]["chiso_duoi"];	
								$mausac = $nguong["Nguongchiso"]["mausac"];	
								$mota = $nguong["Nguongchiso"]["mota"];
								$chuthich = $nguong["Nguongchiso"]["chuthich"];
								$id = $nguong["Nguongchiso"]["id"];
								
								$stt++;	
											
						?>
							<tr>
							  <th><?php echo $stt; ?></th>
                              <td class='mid'><?php echo $ten; ?></td>
                              <td class='mid'><?php echo $chiso_duoi; ?></td>
                              <td class='mid'><?php echo $chiso_tren; ?></td>
							  <td class='mid'><?php echo $mausac; ?></td>
							  <td class='mid'><?php echo $mota; ?></td>
                              <td><div class="chiso_phone"><?php echo $chuthich; ?></div></td>
								 <td>
                                 <ul class="pager btn_tt ql_mar">
                                
                                 	<li class="tuychon_sua"><a href="<?php echo $this->webroot; ?>nguongchiso/nhap/<?php echo $ten."/".$id; ?>" class='btn_sua' style="width:82px;margin-bottom: 4px;">Sửa&nbsp; </a></li>
                                    <li class="tuychon_xoa"><a href="<?php echo $this->webroot; ?>nguongchiso/xoa/<?php echo $id; ?>" class='btn_xoa'  style="width:82px">Xóa &nbsp;</a></li>
                                 </ul>
                                
                                 </td>
                                 
							</tr>
						 <?php 
							}
						 }else
						 {?>
						   <tr>
							 <th colspan="8">Không có dữ liệu</th> 
						  </tr>
						  <?php } ?> 
						  </tbody>
						</table>
					
					</div>
					
				</div>
				
					</div>
				</div>
<script>
	function SubmitForm()
	{
		document.getElementById("form_timkiem").submit();	
	}
	document.getElementById('nguongchiso').className='active2';	
</script>                 