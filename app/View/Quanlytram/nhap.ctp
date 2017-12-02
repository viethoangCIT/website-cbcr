<script type="text/javascript" src="<?php echo $this->webroot;?>js/plupload/plupload.full.min.js"></script>
<?php 
		$id = $ten = $diachi = $phuong = $quan = $thanhpho = $toado = $chiso = $sodienthoai = $hinhanh = $tan_suat_gui = "";	
	$list_phone_manager = "";
	
	if($array_sua != NULL)
	{
		$id= $array_sua[0]["Tram"]["id"];	
		$ten= $array_sua[0]["Tram"]["ten"];	
		$diachi= $array_sua[0]["Tram"]["dia_chi"];	
		$phuong= $array_sua[0]["Tram"]["phuong"];	
		$quan= $array_sua[0]["Tram"]["quan"];
		$hinhanh= $array_sua[0]["Tram"]["hinhanh"];	
		$thanhpho= $array_sua[0]["Tram"]["thanh_pho"];	
		$toado= $array_sua[0]["Tram"]["toa_do"];	
		$chiso= $array_sua[0]["Tram"]["chi_so"];	
		$sodienthoai= $array_sua[0]["Tram"]["sodienthoai"];	
		$tan_suat_gui= $array_sua[0]["Tram"]["tan_suat_gui"];	
		$list_phone_manager = $array_sua[0]["Tram"]["phone_manager"];	
		//if($phone_manager != "") $array_luachon = explode(",",$phone_manager);
	}
	//$chiso = htmlentities($chiso);
	
?>
				
<h2 class='title_page title_nhap'>CHỈNH SỬA THÔNG TIN TRẠM</h2>
    <div class="row" style="width:100%;margin: auto;">
    <div class="table-responsive nhaptram" style="width: 800px;margin: auto;"> 
            <table class="table table-bordered table-striped lg_code"> 
                <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
                <thead class='bg_title'> 
                    <tr> 
                        <th colspan='2' style='padding:13px 10px; text-align:center'>THÔNG TIN TRẠM</th> 
                    </tr> 
                </thead>
                <tbody> 
                    <tr> 
                        <td colspan="2">
                         <div class="row row4" style="width:100%">
                            <form class="form-horizontal" action="<?php echo $this->webroot; ?>quanlytram/nhap" method="post">
                              <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Tên trạm</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $ten; ?>" name="data[tram][ten]">
                                </div>
                              </div>
                              <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Hình ảnh</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $hinhanh; ?>" name="data[tram][hinhanh]" id="img_up">
                                	
                                    <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
                                    <br />
                                    
                                    <div id="container">
                                        <a href="javascript:;" class="btn_thuhoi ui-link" id="pickfiles" style="width:83px;margin-bottom: 4px; padding:10px; border-radius: 15px; color: white; text-decoration: none; background-color:#2f83b7 !important; margin-right:15px">Chọn hình ảnh</a>
                                        <a href="javascript:;" class="btn_thuhoi ui-link" id="uploadfiles" style="width:83px;margin-bottom: 4px; padding:10px; border-radius: 15px; color: white; text-decoration: none; background-color:#ff631d !important">Tải lên</a>
                                    </div>
                                    
                                    <br />
                                </div>
                              </div>
                               <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Số điện thoại</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $sodienthoai; ?>" name="data[tram][sodienthoai]">
                                </div>
                              </div>
                               <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Địa chỉ</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $diachi; ?>" name="data[tram][dia_chi]">
                                </div>
                              </div>
                               <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Phường xã</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important" value="<?php echo $phuong; ?>" name="data[tram][phuong]">
                                </div>
                              </div>
                              <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Quận huyện</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important" value="<?php echo $quan; ?>" name="data[tram][quan]">
                                </div>
                              </div>
                              <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Thành phố</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important" value="<?php echo $thanhpho; ?>" name="data[tram][thanh_pho]">
                                </div>
                              </div>
                               <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Tọa độ bản đồ</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important" value="<?php echo $toado; ?>" name="data[tram][toa_do]">
                                </div>
                              </div>
                              <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Chỉ số</label>
                                <div class="col-sm-9 " >
                                    <textarea class="form-control" style="width:100%;border: 1px solid #CCC !important;border-radius:0px" name="data[tram][chi_so]"><?php echo $chiso; ?></textarea>
                                  
                                </div>
                              </div>
                              <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Tần suất gửi</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important" value="<?php echo $tan_suat_gui; ?>" name="data[tram][tan_suat_gui]">
                                </div>
                              </div>
                              
                              <!--Người quản lý chính -->
                              <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Người quản lý</label>
                                <div class="col-sm-9 " >
                                  <select id='pre-selected-options' multiple='multiple' name="data[tram][nguoi_quan_li][]">
                                  <?php
								  if($array_user != NULL)
								  {
									  foreach($array_user as $user)
									  {
										  $fullname = $user["User"]["fullname"];
										  $phone = $user["User"]["phone"];
										  if($phone != "")
										  {
										   	  $phone_manager_luachon = "";
											  $phone_user = ",".$phone.",";
											
											  if(strpos($list_phone_manager, $phone_user) !== false) $phone_manager_luachon = "selected";
											  
								  ?>
                                        <option value='<?php echo $phone; ?>' <?php echo $phone_manager_luachon; ?>><?php echo $fullname; ?></option>
                                    <?php
										  }
									  }
								  }
								  ?>
                                  </select>
                              	</div>
                              </div>
                              <!--END Người quản lý chính -->
                              
                               <input value="<?php echo $id; ?>" name="data[tram][id]" type="hidden" >
                                
                                <div class="row row2" style="margin-left:auto; margin-right:auto; width:29%">
                                    <button type="submit" class="btn-table btn_icon_sua ui-btn-hidden" style="float:left;background-position: 9px center;width:90px;color:white">Lưu</button>
                                    <a href="<?php echo $this->webroot; ?>quanlytram" style="float:left;background-position: 9px center;width:90px;color:white;margin-left:30px" class="btn-table btn_icon_xoa ui-btn-hidden nut_huy">
                                        <span style="padding-left:25px;">Hủy</span>
                                        <!--<button class="btn-table btn_icon_xoa ui-btn-hidden" style="float:left;background-position: 9px center;width:90px;color:white;margin-left:10px">Hủy</button>-->
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
document.getElementById('quanlytram').className='active2';	
</script>
<script type="text/javascript">
  // run pre selected options
  $('#pre-selected-options').multiSelect(
  {
	selectableHeader: "<div class='custom-header'>Thành viên</div>",
  	selectionHeader: "<div class='custom-header'>Người quản lý</div>",  
  }
  );
  </script>				
<script type="text/javascript">
// Custom example logic

var uploader = new plupload.Uploader({
	runtimes : 'html5,flash,silverlight,html4',
	browse_button : 'pickfiles', // you can pass an id...
	container: document.getElementById('container'), // ... or DOM Element itself
	url : '<?php echo $this->webroot;?>upload.php',
	flash_swf_url : '../js/Moxie.swf',
	silverlight_xap_url : '../js/Moxie.xap',
	
	filters : {
		max_file_size : '10mb',
		mime_types: [
			{title : "Image files", extensions : "jpg,gif,png"},
			{title : "Zip files", extensions : "zip"}
		]
	},

	init: {
		PostInit: function() {
			document.getElementById('filelist').innerHTML = '';

			document.getElementById('uploadfiles').onclick = function() {
				uploader.start();
				return false;
			};
		},

		FilesAdded: function(up, files) {
			plupload.each(files, function(file) {
				document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
				
			});
		},

		UploadProgress: function(up, file) {
			document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
			document.getElementById('img_up').value = file.name;
			//document.getElementById('img_hienthi').src = "files/" + file.name;
		},

		Error: function(up, err) {
			//document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
		}
		//document.getElementById('img_up').value = file.name;
	}
});

uploader.init();
</script>			