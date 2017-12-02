<?php 
		$id = $ma_chiso = $chiso_tren = $chiso_duoi = $mota = $mausac =  $chuthich = "";	
	
	if($array_sua != NULL)
	{
		$id= $array_sua[0]["Nguongchiso"]["id"];	
		$ten_chiso = $array_sua[0]["Nguongchiso"]["ten_chiso"];	
		$ma_chiso= $array_sua[0]["Nguongchiso"]["ma_chiso"];	
		$mota_chiso= $array_sua[0]["Nguongchiso"]["mota_chiso"];	
		$chiso_tren= $array_sua[0]["Nguongchiso"]["chiso_tren"];
		$chiso_duoi= $array_sua[0]["Nguongchiso"]["chiso_duoi"];	
		$mota= $array_sua[0]["Nguongchiso"]["mota"];	
		$mausac= $array_sua[0]["Nguongchiso"]["mausac"];
		$chuthich= $array_sua[0]["Nguongchiso"]["chuthich"];		
		//echo $ten_chiso;
		
	}
	//$chiso = htmlentities($chiso);
	
?>
				
<h2 class='title_page title_nhap'>CHỈNH SỬA NGƯỠNG CHỈ SỐ</h2>
    <div class="row" style="width:100%;margin: auto;">
    <div class="table-responsive nhaptram" style="width: 800px;margin: auto;"> 
            <table class="table table-bordered table-striped lg_code"> 
                <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
                <thead class='bg_title'> 
                    <tr> 
                        <th colspan='2' style='padding:13px 10px; text-align:center'>THÔNG TIN NGƯỠNG CHỈ SỐ</th> 
                    </tr> 
                </thead>
                <tbody> 
                    <tr> 
                        <td colspan="2">
                         <div class="row row4" style="width:100%">
                            <form class="form-horizontal" action="<?php echo $this->webroot; ?>nguongchiso/nhap/<?php echo $ten_chiso; ?>" method="post">
                              <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Tên chỉ số</label>
                                <div class="col-sm-9 " >
                                  <?php 
								  echo $this->Form->input(
										'nguong_chiso.ten_chiso',
										array('options' => $array_cambien,'label' => false, 'default' => 'm','style' => 'width:100%','id' => 'ten_chiso')
									);
									?>
                                </div>
                              </div>
                              <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Chỉ số dưới</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $chiso_duoi; ?>" name="data[nguong_chiso][chiso_duoi]">
                                </div>
                              </div>
                              <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Chỉ số trên</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $chiso_tren; ?>" name="data[nguong_chiso][chiso_tren]">
                                </div>
                              </div>
                               <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Màu sắc</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $mausac; ?>" name="data[nguong_chiso][mausac]">
                                </div>
                              </div>
                                <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Mô tả</label>
                                <div class="col-sm-9 " >
                                    <textarea class="form-control" style="width:100%;border: 1px solid #CCC !important;border-radius:0px" name="data[nguong_chiso][mota]"><?php echo $mota; ?></textarea>
                                  
                                </div>
                              </div>
                             <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Chú thích</label>
                                <div class="col-sm-9 " >
                                    <textarea class="form-control" style="width:100%;border: 1px solid #CCC !important;border-radius:0px" name="data[nguong_chiso][chuthich]"><?php echo $chuthich; ?></textarea>
                                  
                                </div>
                              </div>
                               <input value="<?php echo $id; ?>" name="data[nguong_chiso][id]" type="hidden" >
                               
                                <div class="row row2" style="margin-left:auto; margin-right:auto; width:29%">
                                    <button type="submit" class="btn-table btn_icon_sua ui-btn-hidden" style="float:left;background-position: 9px center;width:90px;color:white">Lưu</button>
                                    <a href="<?php echo $this->webroot; ?>nguongchiso?chiso=<?php echo $ten_chiso; ?>" style="float:left;background-position: 9px center;width:90px;color:white;margin-left:30px" class="btn-table btn_icon_xoa ui-btn-hidden nut_huy">
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
	document.getElementById('nguongchiso').className='active2';	
	document.getElementById('ten_chiso').value = '<?php echo $ten_chiso; ?>';
</script>				
			