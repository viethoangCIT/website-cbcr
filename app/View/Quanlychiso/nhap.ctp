<?php 
		$id = $ten = $ma = $donvi = $mota = "";	
	
	if($array_sua)
	{
		$id= $array_sua[0]["Cambien"]["id"];	
		$ten= $array_sua[0]["Cambien"]["ten"];	
		$ma= $array_sua[0]["Cambien"]["ma"];	
		$donvi= $array_sua[0]["Cambien"]["donvi"];	
		$mota= $array_sua[0]["Cambien"]["mota"];	
		
		
	}
	//$chiso = htmlentities($chiso);
	
?>
				
<h2 class='title_page title_nhap'>CHỈNH SỬA THÔNG TIN CHỈ SỐ</h2>
    <div class="row" style="width:100%;margin: auto;">
    <div class="table-responsive nhaptram" style="width: 800px;margin: auto;"> 
            <table class="table table-bordered table-striped lg_code"> 
                <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
                <thead class='bg_title'> 
                    <tr> 
                        <th colspan='2' style='padding:13px 10px; text-align:center'>THÔNG TIN CHỈ SỐ</th> 
                    </tr> 
                </thead>
                <tbody> 
                    <tr> 
                        <td colspan="2">
                         <div class="row row4" style="width:100%">
                            <form class="form-horizontal" action="<?php echo $this->webroot; ?>quanlychiso/nhap" method="post">
                              <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Tên chỉ số</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $ten; ?>" name="data[cambien][ten]">
                                </div>
                              </div>
                               <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Mã chỉ số</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $ma; ?>" name="data[cambien][ma]">
                                </div>
                              </div>
                               <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Đơn vị</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $donvi; ?>" name="data[cambien][donvi]">
                                </div>
                              </div>
                                <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Mô tả</label>
                                <div class="col-sm-9 " >
                                    <textarea class="form-control" style="width:100%;border: 1px solid #CCC !important;border-radius:0px" name="data[cambien][mota]"><?php echo $mota; ?></textarea>
                                  
                                </div>
                                </div>
                             
                               <input value="<?php echo $id; ?>" name="data[cambien][id]" type="hidden" >
                             
                                <div class="row row2" style="margin-left:auto; margin-right:auto; width:29%">
                                    <button type="submit" class="btn-table btn_icon_sua ui-btn-hidden" style="float:left;background-position: 9px center;width:90px;color:white">Lưu</button>
                                   <a href="<?php echo $this->webroot; ?>quanlychiso" style="float:left;background-position: 9px center;width:90px;color:white;margin-left:30px" class="btn-table btn_icon_xoa ui-btn-hidden nut_huy">
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
	document.getElementById('quanlychiso').className='active2';	
	
</script>				
			