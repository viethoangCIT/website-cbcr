<style>
.mau_chiso
{
	border-radius: 25px;
   	color:white; 
    padding: 5px 14px;
    margin-bottom: 5px;
    text-shadow: 0 0 0 #000;
	display: inline-block;
	width:100%;
	font-weight: bold;
	font-size:16px;
}
.font_chu
{
	font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;
	color: white;
}

body 
{
	font-family: Arial, Helvetica, sans-serif;
}
table
{
   font-size: 1em;
}

.ui-draggable, .ui-droppable 
{
	background-position: top;
}
.show-option
{
	text-decoration: none !important;	
}   
</style>
<p></p>  
  
  <div class="table-responsive font_table" > 
      <div  class='tbl_r popup-gallery'>
      <table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>

        <thead>
          <tr class='v_mid'>
            <th width='5%'>STT</th>
            <th  width='17%' >Tên trạm</th>
            <th  width='25%'>Hình ảnh</th>
            <th  width='35%' class="chiso_table">Chỉ số</th>
            <th width='18%'>Thời gian đo</th>
          </tr>
        </thead>
        <tbody  class='body_mid'>
         <?php 
		 if($array_dulieu)
		 {
			$stt = 0;
			foreach($array_dulieu as $dulieu)
			{
				$ten_tram = $dulieu["B"]["ten"];	
				$hinhanh = $this->webroot."files/".$dulieu["B"]["hinhanh"];	
				$dia_chi = $dulieu["B"]["dia_chi"];
				$chiso = str_replace("\n","<br>",$dulieu["A"]["chi_so"]);
				$ngay = date("H:i d-m-Y",strtotime($dulieu["A"]["ngay_gio"]));
				
				//cát chuỗi chỉ số thành mảng
				$array_chiso = explode("<br>", $chiso);
				
				
				$stt++;	
							
		?>
          <tr class=' HoverTable' >
             <th><span class="stt_phone"><?php echo $stt; ?></span></th>
             <td class='mid'>
             	<a href="bando.html" style="color:#333; font-size:15px; font-weight:bold" class="font_table"><?php echo $ten_tram; ?></a>
                <div>
                	<p class="diachi font_table" style="display:none">Địa chỉ</p>
                	<p class="diachi_phone font_table"><?php echo $dia_chi; ?></p>
                </div>
             </td>
             <td class='mid '><div class="popup-gallery"><a href="<?php echo $hinhanh; ?>" class="popup-image" title=""><img src="<?php echo $hinhanh; ?>"  width="100%" style="min-height:185px; max-height:185px"/></a></div></td>
             <td>
             	
                 <?php 
				 		$str_ten_chiso = "";
						$giatri_chiso = "";
						$str_mota_chiso = "";
						$str_donvi_chiso = "";
						
						//duyệt từng phần tử của mảng chí số để lấy giá trị và tên chỉ số
						for($i=0;$i<count($array_chiso);$i++)
						{
							$str_mota_chiso = "";
							$str_donvi_chiso = "";
				 			
							$str_ten_chiso = "";
							$giatri_chiso = "";
				
							$tmp_string = $array_chiso[$i];
							if($tmp_string != "")
							{
								//cát tmp_string để lấy chi so và giá trị chỉ số
								$tmp_array = explode(":", $tmp_string);
								
								//lấy tên chỉ số
								$str_ten_chiso = $tmp_array[0];
								$giatri_chiso = $tmp_array[1];
								//if($str_ten_chiso == "PH") $str_ten_chiso = "pH";
								
								
								if(isset($array_mota_chiso[$str_ten_chiso])) $str_mota_chiso = $array_mota_chiso[$str_ten_chiso];
								if(isset($array_donvi_chiso[$str_ten_chiso])) $str_donvi_chiso = $array_donvi_chiso[$str_ten_chiso];
								
								
								//so sánh với array_nguong để lấy màu ngưỡng
								$str_color = "";
								$str_mota = "";
								$str_chuthich_chiso = "";
								
								foreach($array_nguong as $nguong)
								{
									$ten_chiso = $nguong["Nguongchiso"]["ten_chiso"];
									$donvi = $nguong["Nguongchiso"]["donvi"];
									$mota_chiso = $nguong["Nguongchiso"]["mota_chiso"];
									$chiso_duoi = $nguong["Nguongchiso"]["chiso_duoi"];
									$chiso_tren = $nguong["Nguongchiso"]["chiso_tren"];
									$mota = $nguong["Nguongchiso"]["mota"];
									$mausac = $nguong["Nguongchiso"]["mausac"];	
									$chuthich = $nguong["Nguongchiso"]["chuthich"];	
									
									if(strtolower($str_ten_chiso) == strtolower($ten_chiso))
									{
										if(($giatri_chiso >= $chiso_duoi) && ($giatri_chiso < $chiso_tren)) 
										{
											$str_color = $mausac; 
											$str_mota = $mota; 
											$str_chuthich_chiso = $chuthich;	
										}
									}
								}
								if($str_color == "") $str_color = "blue";
								echo "
								<a class='show-option' title='$str_chuthich_chiso'>
								<div style='background-color:$str_color !important;' class='mau_chiso font_table'>
									<div style='width: 140px; float: left;' class='mota_chiso'>
										
											<span class='font_chu'>$str_mota_chiso</span>
											
									</div> 
									<div style='width: 140px; float: left;' class='giatri_chiso'>
										
											<span class='font_chu'>$giatri_chiso $str_donvi_chiso</span>
										
									</div> 
									
										<span class='font_chu'>$str_mota</span>
										
								</div></a>
								";
             
							}
						} 
						
				?>
                	
              </td>
              <td class='mid ' ><span style="font-size:15px; font-weight:bold;" class="font_table">
			  
			  <?php echo $ngay; ?></span>
              
              </td>
           </tr>
           <?php 
			}
		 }else
		 {?>
           <tr class=' HoverTable' >
             <th colspan="5">Không có dữ liệu</th> 
          </tr>
          <?php } ?>
        </tbody>
      </table>
  
  </div>
</div>

  </div>

</div>


<script>
  $( function() {
    $( ".show-option" ).tooltip({
      show: {
        effect: "slideDown",
        delay: 250
      }
    });
  } );
</script>
  
<script>
	function SubmitForm()
	{
		document.getElementById("form_timkiem").submit();	
	}
		
			
		
	//danh cho popup
	 $(document).ready(function() {
        $('.popup-gallery').magnificPopup({
          delegate: '.popup-image',
          type: 'image',
          tLoading: 'Loading image #%curr%...',
          mainClass: 'mfp-img-mobile',
          gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
          },
          image: {
            tError: 'Không có hình.',
            titleSrc: function(item) {
              return item.el.attr('title') + '<small></small>';
            }
          }
		})
        });
	  ////////////////////////////////////	
	  
	
	  
	  document.getElementById('trangchu').className='active2';
</script>

