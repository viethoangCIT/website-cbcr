<script type="text/javascript" src="<?php echo $this->webroot;?>js/plupload/plupload.full.min.js"></script>
<?php 
		$id = $name = $version = $firmware_date = $status = $url = "";	
	
	if($array_sua)
	{
		$id= $array_sua[0]["Firmware"]["id"];	
		$name= $array_sua[0]["Firmware"]["name"];	
		$version= $array_sua[0]["Firmware"]["version"];
		$firmware_date= date("d-m-Y",strtotime($array_sua[0]["Firmware"]["firmware_date"]));	
		$status= $array_sua[0]["Firmware"]["status"];	
		$url= $array_sua[0]["Firmware"]["url"];	
	}
	//$chiso = htmlentities($chiso);
	
?>
				
<h2 class='title_page title_nhap'>CHỈNH SỬA THÔNG TIN FIRMWARE</h2>
    <div class="row" style="width:100%;margin: auto;">
    <div class="table-responsive nhaptram" style="width: 800px;margin: auto;"> 
            <table class="table table-bordered table-striped lg_code"> 
                <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
                <thead class='bg_title'> 
                    <tr> 
                        <th colspan='2' style='padding:13px 10px; text-align:center'>THÔNG TIN FIRMWARE</th> 
                    </tr> 
                </thead>
                <tbody> 
                    <tr> 
                        <td colspan="2">
                         <div class="row row4" style="width:100%">
                            <form class="form-horizontal" action="<?php echo $this->webroot; ?>quanlyfirmware/nhap" method="post">
                             
                               <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Tên Firmware</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $name; ?>" name="data[firmware][name]">
                                </div>
                              </div>
                               <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Phiên bản</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $version; ?>" name="data[firmware][version]">
                                </div>
                              </div>
                              <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Upload</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $url; ?>" name="data[firmware][url]" id="img_up">
                                	
                                    <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
                                    <br />
                                    
                                    <div id="container">
                                        <a href="javascript:;" class="btn_thuhoi ui-link" id="pickfiles" style="width:83px;margin-bottom: 4px; padding:10px; border-radius: 15px; color: white; text-decoration: none; background-color:#2f83b7 !important; margin-right:15px">Chọn file</a>
                                        <a href="javascript:;" class="btn_thuhoi ui-link" id="uploadfiles" style="width:83px;margin-bottom: 4px; padding:10px; border-radius: 15px; color: white; text-decoration: none; background-color:#ff631d !important">Tải lên</a>
                                    </div>
                                    
                                    <br />
                                </div>
                              </div>
                              
                               <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Ngày tạo</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important" value="<?php echo $firmware_date; ?>" name="data[firmware][firmware_date]" id="tungay">
                                </div>
                              </div>
                              <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Trạng thái</label>
                                <div class="col-sm-9 " >
                                  <?php 
								  $array_status = array("0"=>"Chưa hoạt động","1"=>"Hoạt động");
								  echo $this->Form->input(
										'firmware.status',
										array('options' => $array_status,'label' => false, 'default' => 'm','style' => 'width:100%','id' => 'status')
									);
									?>
                                </div>
                              </div>
                              
                               <input value="<?php echo $id; ?>" name="data[firmware][id]" type="hidden" >
                             
                                <div class="row row2" style="margin-left:auto; margin-right:auto; width:29%">
                                    <button type="submit" class="btn-table btn_icon_sua ui-btn-hidden" style="float:left;background-position: 9px center;width:90px;color:white">Lưu</button>
                                     <a href="<?php echo $this->webroot; ?>quanlyfirmware" style="float:left;background-position: 9px center;width:90px;color:white;margin-left:30px" class="btn-table btn_icon_xoa ui-btn-hidden nut_huy">
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
$( "#tungay" ).datepicker({ dateFormat: 'dd-mm-yy', showButtonPanel: true});
	document.getElementById('quanlyfirmware').className='active2';	
	document.getElementById('status').value = '<?php echo $status; ?>';
	
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
			{title : "Zip files", extensions : "zip"},
			{title : "Xls files", extensions : "xls"},
			{title : "Bin files", extensions : "bin"}
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