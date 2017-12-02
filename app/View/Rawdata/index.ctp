<h2 class='title_page'>DỮ LIỆU DẠNG THÔ</h2>
  <div class='row' style="margin-left:0px; margin-right:0px">
    
      <form action="<?php echo $this->webroot;?>rawdata" method="get" id="form_timkiem">
         <div class='ngay_thang' style="width:375px;margin-right:62px !important">
              <div class='lbl_day ngay' style="width:95px; float:left">
                  Từ ngày
              </div>
              <?php
			  
			  if($tu_ngay != "") $tu_ngay = date("d-m-Y",strtotime($tu_ngay));
			  	
			   ?>
              <div class="nhap_tungay" style="float:left">
              	<input type="text" class="form-control input_txt_serday o_nhap"  id="tungay" placeholder="Tất cả" style="width:120px;" name="data[tu_ngay]" onchange="SubmitForm()" value="<?php echo $tu_ngay; ?>">
              </div>
              <div style="float:left">
              	<a href="#" class="ui-link " id="clear-button1" onclick="removeTuNgay()">
                                	<img src="<?php echo $this->webroot;?>img/icon/close_input.png" class="close_input" style="position: absolute;margin-top: 10px;margin-left: -22px;" >
                                </a>
              </div>                  
              <div class='lbl_day gio' style="width:60px; float:left">
                  Giờ
              </div>
              <div class="nhap_tugio" style="float:left; width:65px">
              	<input type="text" class="form-control input_txt_serday o_nhap" name="data[tu_gio]" id="tugio" placeholder="Tất cả" style="width:100%;" onchange="SubmitForm()" value="<?php echo $tu_gio; ?>">
              </div>
          </div>
         <div class='ngay_thang' style="width:375px;margin-right:62px !important">
              <div class='lbl_day ngay' style="width:95px; float:left">
                  Đến ngày
              </div>
              <?php
			  if($den_ngay != "") $den_ngay = date("d-m-Y",strtotime($den_ngay));
			  	
			   ?>
               <div class="nhap_tungay" style="float:left">
              		<input type="text" class="form-control input_txt_serday o_nhap" name="data[den_ngay]" id="denngay" placeholder="Tất cả" style="width:120px;" onchange="SubmitForm()" value="<?php echo $den_ngay; ?>">
              </div>
              <div style="float:left">
              		<a href="#" class="ui-link" id="clear-button2" onclick="removeDenNgay()">
                                	<img src="<?php echo $this->webroot;?>img/icon/close_input.png" class="close_input" style="position: absolute;margin-top: 10px;margin-left: -22px;" >
                                </a>
              </div>                  
              <div class='lbl_day gio' style="width:60px; float:left">
                  Giờ
              </div>
              <div class="nhap_tugio" style="float:left; width:65px">
             		 <input type="text" class="form-control input_txt_serday o_nhap" name="data[den_gio]" id="dengio" placeholder="Tất cả" style="width:100%;" onchange="SubmitForm()" value="<?php echo $den_gio; ?>">
              </div>
          </div>
          <div class='loaixe' style="width:295px; margin:0px">
              <div class='lbl_day ngay' style="width:95px; float:left">
                  Tên trạm
              </div>
              <?php
				echo $this->Form->input("ten_tram",array('onchange'=>'SubmitForm()','default'=>"$ten_tram",'label' => false,'type'=>'select','options'=>$array_option_tram,'class'=>'form-control input_txt_loaixe tram_dangbang','name'=>'data[ten_tram]','style'=>'width:200px'));?>
          </div>  
  </form>
  </div>
					<div class="table-responsive font_table" > 
						<div  class='tbl_r'>
						<table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>

						  <thead>
							<tr class='v_mid'>
							  <th width='5%'>STT</th>
                              <th  width='15%' >Tên trạm</th>
                              <th  width='10%'>Điện thoại</th>
                              <th  width='25%'>Địa chỉ</th>
                              <th  width='20%'>Nội dung</th>
                              <th  width='15%' class="ngay_table">Ngày</th>
							</tr>
						  </thead>
						  <tbody  class='body_mid'>
                          <?php 
						 if($array_dulieu)
						 {
							$stt = 0;
							foreach($array_dulieu as $dulieu)
							{
								$ten_tram = $dulieu["Dulieu"]["ten_tram"];	
								$diachi = $dulieu["Dulieu"]["dia_chi"];	
								$thanhpho = $dulieu["Dulieu"]["thanh_pho"];		
								$quan = $dulieu["Dulieu"]["quan"];	
								$phuong = $dulieu["Dulieu"]["phuong"];	
								$noidung = $dulieu["Dulieu"]["noi_dung"];
								$noidung = str_replace("<","&lt;",$noidung);
								$noidung = str_replace( ">","&gt;",$noidung);
								$noidung = str_replace("\n","<br>",$noidung);
								$ngay_gio = date("H:i d-m-Y",strtotime($dulieu["Dulieu"]["ngay_gio"]));
								$sodienthoai = $dulieu["Dulieu"]["sodienthoai"];
								//$tuychon = $dulieu["Dulieu"]["tuy_chon"];
								$stt++;	
											
						?>
							<tr class=' HoverTable' >
							   <th><?php echo $stt; ?></th>
                               <td class='mid ' ><?php echo $ten_tram; ?></td>
                               <td class='mid ' ><?php echo $sodienthoai; ?></td>
                               <td>
                               	<div class="chiso_phone">
									<?php echo $diachi; ?>, <?php echo $phuong; ?>, <?php echo $quan; ?>, <?php echo $thanhpho; ?>
               					</div>
                               </td>
                               <td class='mid ' ><div class="chiso_phone"><?php echo $noidung; ?></div></td>
							   <td class="mid">
                                	<?php echo $ngay_gio; ?>
                                </td>
                                
							</tr>
                            <?php 
							}
						 }else
						 {?>
						   <tr class=' HoverTable' >
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
	function removeTuNgay()
	{
		document.getElementById("tungay").value = "";
		SubmitForm();		
	}
	function removeDenNgay()
	{
		document.getElementById("denngay").value = "";
		SubmitForm();		
	}
	function hiddenButton()
	{
		if(document.getElementById("tungay").value == "")
		{
			document.getElementById("clear-button1").style.visibility = "hidden";
		}else
		{
			document.getElementById("clear-button1").style.visibility = "none";
		}	
		if(document.getElementById("denngay").value == "")
		{
			document.getElementById("clear-button2").style.visibility = "hidden";
		}else
		{
			document.getElementById("clear-button2").style.visibility = "none";
		}	
	}
	hiddenButton();
	 //danh cho datepicker
		$( "#tungay" ).datepicker({ dateFormat: 'dd-mm-yy', showButtonPanel: true});
		$( "#denngay" ).datepicker({ dateFormat: 'dd-mm-yy', showButtonPanel: true}); 
		
		$('#tugio').timepicker({timeFormat: 'H:i',minTime: '7',});	
		$('#dengio').timepicker({timeFormat: 'H:i',minTime: '7',});	
	document.getElementById('bieudo').className='active2';	
</script>                