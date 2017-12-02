<h2 class='title_page'>CHỈNH SỬA THÔNG TIN SỰ KIỆN</h2>
<?php 
	$array_type_vehicle = array("0"=>"Xe máy","1"=>"Xe Ôtô");
	$array_type         = array("0"=>"Vượt đèn đỏ","1"=>"Lấn làn","0,1"=>"Vượt đèn đỏ, lấn làn","1,0"=>"Lấn làn, vượt đèn đỏ");

?>
					<div class="row" style="width:100%;margin: auto;">
					<div class="table-responsive" style="width: 800px;margin: auto;"> 
							<table class="table table-bordered table-striped lg_code"> 
								<colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
								<thead class='bg_title'> 
									<tr> 
										<th colspan='2' style='padding:13px 10px;'>THÔNG TIN SỰ KIỆN</th> 
									</tr> 
								</thead>
								<tbody> 
									<tr> 
                                    <?php
										$id = "";
										$str_type = "";
										$date = "";
										$time = "";
										$address = "";
										$desc = "";
										$status = "";
										$vehicle = "";
										$vehicle_number = "";
										$str_img = "";
										$str_video = "";
										if($array_event) 
										{
											$id         	 = $array_event[0]["Event"]["id"];
											$str_type   	   = $array_event[0]["Event"]["str_type"];
											$date 	   	   = date("d-m-Y", strtotime($array_event[0]["Event"]["date"]));
											$time 	       = $array_event[0]["Event"]["time"];
											$address    	= $array_event[0]["Event"]["address"];
											$desc       	   = $array_event[0]["Event"]["description"];
											$status    	 = $array_event[0]["Event"]["status"];
											$vehicle    	= $array_event[0]["Event"]["vehicle"];
											$vehicle_number = $array_event[0]["Event"]["vehicle_number"];
											$str_img    	= $array_event[0]["Event"]["str_img"];
											
											$link_media     = $array_event[0]["Event"]["link_media"];
											$str_video_xem  = $link_media.$array_event[0]["Event"]["str_video"];
											$str_video  	 = $array_event[0]["Event"]["str_video"];
										}
									
										//print_r($array_event);
									
									?>
                                    	<td colspan="2">
										 <div class="row" style="width:100%">
                                            <form class="form-horizontal" action="<?php echo $this->webroot."quanly/edit" ?>" method="post">
                                              <div class="form-group">
                                                <label class="col-sm-3 control-label">Loại vi phạm</label>
                                                <div class="col-sm-9 " >
                               <?php
													echo $this->Form->input("loaivipham",array('default'=>"$str_type",
																							   'label' => false,
																							   'type'=>'select',
																							   'options'=>$array_type,
																							   'class'=>'form-control',
																							   'name'=>'data[Event][str_type]',
																							   'style'=>'width:100%'));
								?>
                                                </div>
                                              </div>
                                               <div class="form-group">
                                                <label  class="col-sm-3 control-label">Địa điểm</label>
                                                <div class="col-sm-9 " >
                                                  <input class="form-control"  value="<?php echo $id ?>" name="data[Event][id]"  type="hidden"  style="width:100%;border: 1px solid #CCC !important">
                                                  <input class="form-control"  value="<?php echo $tranghientai ?>" name="data[Event][tranghientai]"  type="hidden"  style="width:100%;border: 1px solid #CCC !important">
                                                  <input class="form-control"  value="<?php echo $address ?>" name="data[Event][address]" type="text"  style="width:100%;border: 1px solid #CCC !important">
                                                </div>
                                              </div>
                                               <div class="form-group">
                                                <label  class="col-sm-3 control-label">Loại xe</label>
                                                <div class="col-sm-9 " >
                                                 <?php
													echo $this->Form->input("loaivipham",array('default'=>"$vehicle",
																							   'label' => false,
																							   'type'=>'select',
																							   'options'=>$array_type_vehicle,
																							   'class'=>'form-control',
																							   'name'=>'data[Event][vehicle]',
																							   'style'=>'width:100%'));
								?>
                                                
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label  class="col-sm-3 control-label">Biển số xe</label>
                                                <div class="col-sm-9 " >
                                                  <input class="form-control" value="<?php echo $vehicle_number ?>" name="data[Event][vehicle_number]" type="text" style="width:100%;border: 1px solid #CCC !important">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label  class="col-sm-3 control-label">Ngày</label>
                                                <div class="col-sm-9 " >
                                                  <input class="form-control"  id="date" value="<?php echo $date ?>" name="data[Event][date]" style="width:100%;border: 1px solid #CCC !important">
                                                </div>
                                              </div>
                                               <div class="form-group">
                                                <label  class="col-sm-3 control-label">Giờ</label>
                                                <div class="col-sm-9 " >
                                                  <input class="form-control" value="<?php echo $time ?>" name="data[Event][time]"  type="text" style="width:100%;border: 1px solid #CCC !important">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label  class="col-sm-3 control-label">Mô tả</label>
                                                <div class="col-sm-9 " style="text-align:left !important" >
                                                  <input class="form-control" value="<?php echo $desc ?>" name="data[Event][description]" type="text" style="width:100%;border: 1px solid #CCC !important">
                                                </div>
                                              </div>
                                               <div class="form-group">
                                                <label  class="col-sm-3 control-label">Hình ảnh</label>
                                                <div class="col-sm-9 " style="padding: 0;" >
                                                 <?php 
											$array_img      = explode(";",$str_img );
											$img            = $link_media.$array_img[0];
											$j = 0;
											foreach($array_img as $hinh)
											{
												$j++;
												$img            = $link_media.$hinh;
												if($hinh != "")
												{
										?>
                                       				 <div class="col-sm-4">
                                                     	<a onclick="XoaAnh('<?php echo "hinh-".$j; ?>','<?php echo "thexoa-".$j; ?>')" id='<?php echo "thexoa-".$j; ?>' class="btn-table btn_icon_xoa ui-btn-hidden" style="float:left;background-position: 9px center;width:100%;color:white;"></a>
                                                     	<img src="<?php echo $this->webroot.$img;?>" width="100%" id="<?php echo "hinh-".$j; ?>" name="<?php echo $hinh; ?>">
                                                     </div>
												<?php 
												}
											}
											?>	
                                                     <div class="col-sm-12" style="margin-top:5px">
                                                     	<input type="hidden" name="data[Event][str_img]" value="<?php echo $str_img; ?>" id="luu-hinh"/>
                                                        <input type="hidden" name="data[Event][str_video]" value="<?php echo $str_video; ?>" id="luu-video"/>
                                                     </div>
                                                </div>
                                              </div>
                                               <div class="form-group">
                                                <label  class="col-sm-3 control-label">Video</label>
                                                <div class="col-sm-9 " >
                                                <?php 
													if($str_video != "")
													{
												?>
                                                <a onclick="XoaVideo('myvideo','thexoa-video')" id='thexoa-video' class="btn-table btn_icon_xoa ui-btn-hidden" style="float:left;background-position: 9px center;width:100%;color:white;"></a>
                                                    <style type="text/css">
    /* make the video stretch to fill the screen in WebKit */
    :-webkit-full-screen #myvideo {
      width: 100%;
      height: 100%;
    }
  </style>
                                                      <video controls src="<?php echo $this->webroot.$str_video_xem;?>" width="100%" height="290px" id="myvideo">
                                                      
                                                      <script>
  var videoElement = document.getElementById("myvideo");
    
  function toggleFullScreen() {
    if (!document.mozFullScreen && !document.webkitFullScreen) {
      if (videoElement.mozRequestFullScreen) {
        videoElement.mozRequestFullScreen();
      } else {
        videoElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
      }
    } else {
      if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else {
        document.webkitCancelFullScreen();
      }
    }
  }
  
  document.addEventListener("keydown", function(e) {
    if (e.keyCode == 13) {
      toggleFullScreen();
    }
  }, false);
</script>
<?php 
													}
?>
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label  class="col-sm-3 control-label"></label>
                                                <div class="col-sm-9 " >
                                                <button type="submit" class="btn-table btn_icon_sua ui-btn-hidden" style="float:left;background-position: 9px center;width:90px;color:white">Lưu</button>
                                                <button type="submit" class="btn-table btn_icon_xoa ui-btn-hidden" style="float:left;background-position: 9px center;width:90px;color:white;margin-left:10px">Hủy</button>
                                                   
                                                </div>
                                              </div>
                                            
                                             
                                                  
                                              
                                                
                                              </div>
                                            </form>
										</div>
                                        </td>
									</tr>
								</tbody> 
							</table>
					</div>

					
					
				</div>
                <script type="text/javascript">
	
      $(document).ready(function() {
	  //danh cho popup
        $('.popup-gallery').magnificPopup({
          delegate: 'a',
          type: 'image',
          tLoading: 'Loading image #%curr%...',
          mainClass: 'mfp-img-mobile',
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
              return item.el.attr('title') + '<small></small>';
            }
          }
        });
	  ////////////////////////////////////	
	
	 //danh cho datepicker
		$( "#date" ).datepicker({ dateFormat: 'dd-mm-yy' });
      });
	  </script>
		 <script>
		 	function XoaAnh(id_anh,id_thexoa)
			{
				result = window.confirm("Bạn có muốn xóa hay không");
				if(result == true)
				{
					var ten_anh = document.getElementById(id_anh).name;
					document.getElementById("luu-hinh").value = document.getElementById("luu-hinh").value.replace(ten_anh, '');
	
					var image_x = document.getElementById(id_anh);
					image_x.parentNode.removeChild(image_x);
					
					var thexoa = document.getElementById(id_thexoa);
					thexoa.parentNode.removeChild(thexoa);
				}
				
				
			}
			function XoaVideo(id_video,id_thexoa)
			{
				result = window.confirm("Bạn có muốn xóa hay không");
				if(result == true)
				{
					document.getElementById("luu-video").value="";
					var video_x = document.getElementById(id_video);
					video_x.parentNode.removeChild(video_x);
					
					var thexoa = document.getElementById(id_thexoa);
					thexoa.parentNode.removeChild(thexoa);
				}
				
			}
	  		document.getElementById('quanly').className='active';
	  </script>
