<h2 class='title_page'>QUẢN LÝ CHỈ SỐ</h2>
	<form action="<?php echo $this->webroot;?>quanlychiso" method="get" id="form_timkiem">
        <div class="row tram_quanlytram" style="margin-left:0px; margin-right:0px">
            <div class='loaixe tram_quanlytram' style="width:30%; margin-right:41px !important">
                <div class='lbl_day ngay' style="width:110px;">
                    Tên chỉ số
                </div>
             <?php
                  echo $this->Form->input("ten",array('onchange'=>'SubmitForm()','default'=>"$ten",'label' => false,'type'=>'select','options'=>$array_option_ten,'class'=>'form-control input_txt_loaixe tram_dangbang','name'=>'data[ten]','style'=>'width:200px'));?>
                <div class='clear'></div>
            </div>
        </div>
    </form>
                    <div style="width:100%;text-align:right; padding-right:15px" class="them_dulieu">
                    	<a href="<?php echo $this->webroot; ?>quanlychiso/nhap.html" style="font-size:16px; font-weight:bold"><img src="<?php echo $this->webroot; ?>img/icon/edit_icon.png" />Thêm chỉ số</a><br />
                    </div>
					<div class="table-responsive font_table" > 
						<div  class='tbl_r'>
							  
						
						<table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>
						
						  <thead>
							<tr class='v_mid'>
							  <th  width='5%'>STT</th>
                               <th   width='10%'>Tên chỉ số </th>
                               <th   width='10%'>Mã chỉ số</th>
                               <th  width='10%'>Đơn vị</th>
							  <th width='20%'>Mô tả</th>
							  
							  <th  width='15%'>Tùy chọn</th>
                              
							</tr>
						  </thead>
						  <tbody class='body_mid'>
                           <?php 
						 if($array_chiso)
						 {
							$stt = 0;
							foreach($array_chiso as $chiso)
							{
								$ten = $chiso["Cambien"]["ten"];	
								$ma = $chiso["Cambien"]["ma"];	
								$donvi = $chiso["Cambien"]["donvi"];	
								$mota = $chiso["Cambien"]["mota"];
								$chuthich = $chiso["Cambien"]["chuthich"];
								$id = $chiso["Cambien"]["id"];
								
								$stt++;	
											
						?>
							<tr>
							  <th><?php echo $stt; ?></th>
                              <td class='mid'><?php echo $ten; ?></td>
                              <td class='mid'><?php echo $ma; ?></td>
                              <td class='mid'><?php echo $donvi; ?></td>
							  <td ><?php echo $mota; ?></td>
							  
								 <td>
                                 <ul class="pager btn_tt ql_mar">
                                
                                 	<li class="tuychon_sua" style="margin-right:20px"><a href="<?php echo $this->webroot; ?>quanlychiso/nhap/<?php echo $id; ?>" class='btn_sua' style="width:82px;margin-bottom: 4px;">Sửa&nbsp; </a></li>
                                    <li class="tuychon_xoa"><a href="<?php echo $this->webroot; ?>quanlychiso/xoa/<?php echo $id; ?>" class='btn_xoa'  style="width:82px">Xóa &nbsp;</a></li>
                                 </ul>
                                
                                 </td>
                                 
							</tr>
						 <?php 
							}
						 }else
						 {?>
						   <tr>
							 <th colspan="6">Không có dữ liệu</th> 
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
	document.getElementById('quanlychiso').className='active2';	
</script>                 