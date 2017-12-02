<?php 
$array_type_vehicle = array("2"=>"Tất cả","0"=>"Xe máy","1"=>"Xe Ô tô");
$array_type_event         = array("2"=>"Tất cả","0"=>"Vượt đèn đỏ","1"=>"Lấn làn","0,1"=>"Vượt đèn đỏ, lấn làn","1,0"=>"Lấn làn, vượt đèn đỏ");
$array_type_option         = array("2"=>"Tất cả","0"=>"Vượt đèn đỏ","1"=>"Lấn làn");
if($ngaythang != "") $ngaythang = date("d-m-Y",strtotime($ngaythang));
//print_r($array_type);
//echo $this->element('sql_dump');
?>
<h2 class='title_page'>QUẢN LÝ SỰ KIỆN VI PHẠM GIAO THÔNG</h2>
    <div class='row' align="center">
        <form action="<?php echo $this->webroot."quanly" ?>" method="get" id="formtim">
        <div class="row" style="padding-left: 31px;padding-right: 16px;">
                            <div class='ngay_thang' style="width:220px;margin-right:5px !important">
                                <div class='lbl_day' >
                                    Theo ngày
                                </div>
                                <input type="text" class="form-control input_txt_serday"  id="ngaythang" placeholder="Tất cả" style="width:135px;    padding-left: 0px;" name="ngaythang" value="<?php echo $ngaythang; ?>" onchange="timKiem()" >
                                <a href="#" class="ui-link" id="clear-button" onclick="removeNgay()">
                                	<img src="<?php echo $this->webroot;?>img/icon/close_input.png" class="close_input" style="position: absolute;margin-top: 10px;margin-left: -22px;" >
                                </a>
                                <div class='clear'></div>
                            </div>
                           <div class='loaixe' style="width:190px;">
                                <div class='lbl_day' >
                                    Loại xe
                                </div>
                            	<?php
								//$this->data['loaixe'] = $loaixe;
								  echo $this->Form->input("loaixe",array('onchange'=>'timKiem()','default'=>"$loaixe",'label' => false,'type'=>'select','options'=>$array_type_vehicle,'class'=>'form-control input_txt_loaixe','name'=>'loaixe','style'=>'width:125px'));?>
                                
                                <div class='clear'></div>
                            </div>
                            <div class='loaivipham' style="width:328px">
                                <div class='lbl_day'>
                                    Loại vi phạm
                                </div>
                                <?php
                                echo $this->Form->input("loaivipham",array('onchange'=>'timKiem()','default'=>"$loaivipham",'label' => false,'type'=>'select','options'=>$array_type_option,'class'=>'form-control input_txt_loaivipham','name'=>'loaivipham','style'=>'width:125px'));?>
                               
                            </div>
                             <div class='bienso' style="width:361px;margin-right: 0px !important;">
                                <div class='lbl_day' style="width:86px;background-color:#ff631d">
                                    Tìm kiếm 
                                </div>
                                <input type="text" class="form-control input_txt_camera" name="timkiem" id="timkiem" placeholder="Nhập biển số hoặc địa chỉ " style="font-size:12px;text-align:left;width:275px;border: 1px solid #ff631d !important" value="<?php echo $timkiem ?>">
                                <div class='clear'></div>
                            </div>
                            <div class='box_btn_tk' style="float:left;width:45px">
                                 <button type="submit" class="btn btn-default btn_tk" style="height:35px">
                                 	<img src="<?php echo $this->webroot;?>img/icon/icon-search.png">
                                 </button>
                            </div>
                             <div class='clear'></div>
						</div>
                        <div class="row" style="padding-left: 16px;padding-right: 16px;">
                        	 
                            
                        </div>
		</form>
	 </div>
	<div class="table-responsive" > 
		<div  class='tbl_r'>
            <table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc;'>
                <thead>
                    <tr class='v_mid'>
                        <th data-priority="1" width='50px'>STT</th>
                               <th data-priority="6"  width='90px'>Biển số </th>
                               <th data-priority="5" width='80px'>Loại xe</th>
							  <th data-priority="2"  width='110px'>Loại vi phạm</th>
							  <th data-priority="3"  width='91px'>Ngày - giờ</th>
							  <th data-priority="4"  width='200px'>Địa điểm</th>
							  <th data-priority="9" width='200px'>Mô tả</th>
                               <th data-priority="7" width='100px'>Hình ảnh</th>
							  <th data-priority="9" width='150px'>Video</th>
							  <th data-priority="9" width='100px'>Tùy chọn</th>
                    </tr>
                </thead>
              	<tbody class='body_mid'>
<?php
					if($array_event)
					{
						$i = 0;
						$vehicle_number = "";
						$vehicle        = "";
						$str_type       = "";
						$id             = "";
						$img            = "";
						$date           = "";
						$time           = "";
						$address        = "";
						$desc           = "";
						$status         = "";
						foreach($array_event as $event)
						{
							$i++;	
							$vehicle_number = $event["Event"]["vehicle_number"];
							$vehicle        = trim($event["Event"]["vehicle"]);
							$desc       	   = $event["Event"]["description"];
							$str_type       = trim($event["Event"]["str_type"]);
							$date           = date("d-m-Y", strtotime($event["Event"]["date"]));
							$time           = $event["Event"]["time"];
							$id             = $event["Event"]["id"];
							$img            = $event["Event"]["id"];
							$address        = $event["Event"]["address"];
							$status         = $event["Event"]["status"];
							
							//lay link xu ly
							$tranghientai = "/".$this->Paginator->counter(array('format' => ('{:page}')));
							
							$link_recovery  = $this->webroot."quanly/recovery/".$id.$tranghientai;
							$link_approval  = $this->webroot."quanly/approval/".$id.$tranghientai;
							$link_sua       = $this->webroot."quanly/edit/".$id.$tranghientai;
							$link_xoa       = $this->webroot."quanly/delete/".$id.$tranghientai;
							
							//xu ly hinh - video
							$link_media     = $event["Event"]["link_media"];
							$array_img      = explode(";",$event["Event"]["str_img"]);
							$img            = $link_media.$array_img[0];
							$str_video      = $link_media.$event["Event"]["str_video"];
?>
                <tr >
                        <th><?php echo $i;?></th>
                        <td class='mid'><?php echo $vehicle_number;?></td>
                        <td class='mid'><?php echo $array_type_vehicle[$vehicle];?></td>
                        <td class='mid'><?php echo $array_type_event[$str_type];?></td>
                        <td class='mid'><?php echo $date." ".$time;?></td>
                        <td><?php echo $address;?></td>
                        <td><?php echo $desc;?></td>
                        <td><div class='popup-gallery size_thum'>
                                <a href='<?php echo $this->webroot.$img;?>' title='<?php echo $array_type_event[$str_type]." - ".$vehicle_number;?>'>
                               	 <img src='<?php echo $this->webroot.$img;?>' title='<?php echo $array_type_event[$str_type]." - ".$vehicle_number;?>' width='120px' height='120px'>
                                </a>
                            </div>
                        </td>
                        <td>
                    		<style type="text/css">
								/* make the video stretch to fill the screen in WebKit */
								:-webkit-full-screen #myvideo {
								  width: 100%;
								  height: 100%;
								}
							 </style>
                      		<video controls src="<?php echo $this->webroot.$str_video;?>" width="125px" height="125px" id="myvideo">
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
                                  
                                  /*document.addEventListener("keydown", function(e) {if (e.keyCode == 13) {toggleFullScreen();}}, false);*/
                                </script>
                    	</td>
                         <td >
                         <a  style="height:0px !important;visibility:hidden"></a>
                            <ul class="pager btn_tt ql_mar">
                              <li >
                              	
                              		<?php
									if($status == 0)
									{
									?>
                              			<a href=""  onclick="ConFirm('<?php echo $link_approval;?>','Duyệt')" class='btn_duyet' style="background-color:#2f83b7 !important;margin-bottom: 4px;width:83px">Duyệt</a>
									<?php 
									}else
									{
									?>
                                    	<a href="" onclick="ConFirm('<?php echo $link_recovery;?>','Thu hồi')" class="btn_thuhoi ui-link" style="width:83px;margin-bottom: 4px;">Thu hồi</a>
                                    <?php	
									}
									?>
                              </li>
                              <li ><a  href="<?php echo $link_sua;?>"  class='btn_sua' style="width:82px;margin-bottom: 4px;">Sửa&nbsp; </a></li>
                              <li ><a  href="" onclick="ConFirm('<?php echo $link_xoa;?>','Xóa')" class='btn_xoa' style="width:82px">Xóa &nbsp;</a></li>
                            </ul>
						</td>
					</tr>
                
                
                
                
                
                
                
<?php					}
					}
					else
					{
						echo "<tr><td class='mid' colspan='10' style='color:#ff631d;font-weight:bold'>Không có dữ liệu</td></tr>";
					}
?>
                    
                   
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
    <script>
	
	function hideClearButton()
	{
		if(document.getElementById("ngaythang").value == "")
		{
			document.getElementById("clear-button").style.visibility = "hidden";
		}else
		{
			document.getElementById("clear-button").style.visibility = "none";
		}
		
	}
	hideClearButton();
	function removeNgay()
	{
		 document.getElementById("ngaythang").value = "";
		 document.getElementById("formtim").submit();
		
	}
    function timKiem() {
    document.getElementById("formtim").submit();
}
    </script>
	<script>
		 	function ConFirm(duong_dan,kieu)
			{
				result = window.confirm("Bạn có muốn " +kieu+ " hay không");
				if(result == true)
				{
					window.location.href = duong_dan;
				}
				
			}
	  		document.getElementById('quanly').className='active';
			//window.onload = timVitri();
	  </script>
	<script type="text/javascript">
	
      $(document).ready(function() {
		  
		
	   //danh cho text tim kiem
	   $('#timkiem').focus(function(){
   			$(this).data('placeholder',$(this).attr('placeholder')).attr('placeholder','');
		}).blur(function(){
  			 $(this).attr('placeholder',$(this).data('placeholder'));
		});
	  
	  
	  
	  //danh cho popup
        $('.popup-gallery').magnificPopup({
          delegate: 'a',
          type: 'image',
          tLoading: 'Loading image #%curr%...',
          mainClass: 'mfp-img-mobile',
          gallery: {
            enabled: false,
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
	
	  //danh cho click row
		  $(".clickable-row").click(function() {
			window.document.location = $(this).data("href");
		});	
	 //danh cho datepicker
		$( "#ngaythang" ).datepicker({ dateFormat: 'dd-mm-yy' });
		
	 	
      });
	
	  </script>
		 
      
