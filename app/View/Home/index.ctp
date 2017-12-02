<title>HỆ THỐNG CAMERA GIÁM SÁT CHÁY RỪNG</title>
<style type="text/css">
   ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline; list-style-type: none;
}

ul.pagination li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}


</style>
<h2 class="title_page" style="font-size: 19px; margin: 25px 0 -4px 0;  ">BẢNG THỐNG KÊ CÁC VỤ CHÁY RỪNG</h2>
<div class="table-responsive font_table" id="tb_thongke_chayrung"  >
	<div  class='tbl_r' id="home_div">
		<table  id="movie-table"  class="ui-responsive table table-bordered table-striped table-hover" >
			<thead>
				<tr class='v_mid'>
					<th style="width: 5%">STT</th>
					<th style="width: 1%">Ngày/tháng/năm</th>
					<th style="width: 11%">Địa điểm </th>
					<th style="width: 10%">Thiệt hại </th>

					<th style="width: 10%">Video</th>
					<th style="width: 1%">Chi tiết</th>

				</tr>
			</thead>
			<tbody class='body_mid'>
				<?php 

				$stt = 0;
				$video = "";
				$link = "http://49.156.54.221/video/";
				foreach ($array_hotro as $vuchay) 
				{

					$stt++ ;
					$id = $vuchay["Vuchay"]["id"];
					$video = $vuchay["Vuchay"]["video"];
					?>

					<tr>
						<td class='mid'><?php echo $stt; ?></td>
						<td class='mid'><?php 
							$date = $vuchay["Vuchay"]["ngay"];
							$date = date("d-m-Y H:i:s", strtotime($date));
							echo $date; ?>

						</td>
						<td class='mid'> 
							<?php 
							$diachi = $vuchay["Vuchay"]["xa"].",".$vuchay["Vuchay"]["huyen"].","."thành phố Đà Nẵng";
							echo  $diachi;?></td>
						<td class='mid'><?php echo "Thiệt hại gần ". $vuchay[0]["tong"]."hecta rừng"; ?> </td>

						<td class='mid'>
						
						
						<video width="200" height="100" controls>
						    <source src="<?php echo $link.$video;?>" type="video/avi">
						</video> 
						
														
							</td>
							<td class= 'mid'> <ul class="pager btn_tt ql_mar" style="float: left">
								<li>
									<a href="/home/chitiet/<?php echo $id ?>.html"  class="chitiet">Chi tiết&nbsp; </a>
								</li>
							</ul></td>


						</tr>
						<?php } ?>
					</tbody>

				</table>
				
				<div class="clear"></div>
				<div style="float: right">
				<!-- BEGIN PAGINATOR-->
			<?php
				$html  = '<ul class="pagination">';

						$so_phantu = 3;
						//previous link button
						$link = "/home/index";
						if($page>1){
						$html.= "<li><a href='$link?page=".($page-1)."'>Trước</a></li>";
						}      

						//do ranged pagination only when total pages is greater than the range
						if($tong_sotrang >$so_phantu){               
							$start = ($page <= $so_phantu)?1:($page - $so_phantu);
							$end   = ($tong_sotrang - $page >= $so_phantu)?($page+$so_phantu): $tong_sotrang;
						}else{
							$start = 1;
							$end   =  $tong_sotrang;
						}   
						//loop through page numbers
						for($i = $start; $i <= $end; $i++){
								$html.= '<li><a href="'.$link .'?page='.$i.'"';
								if($i==$page) $html .= "class='active'";
								$html .= '>'.$i.'</a></li>';
						}     

						//next link button
						if($page<$tong_sotrang){
						$html .= "<li><a href='$link?page=".($page+1)."'>Sau</a></li>";
					}      
						$html .= '</ul>';
						echo $html;
					?>
				<!-- END PAGINATOR -->
			</div>
			</div>
		</div>
		<br>

		<div style="width: 100%; float: left;" >
			<div  class="table-responsive table_home_left " >    
				<div  class='tbl_r' id="table_capcb">
					<table class="data table-responsive table table-hover table-bordered  table-hover bangdo" style="width:100%">
						<thead>

							<tr class="v_mid" id="tb_head">
								<th class="title_info" id="capdb" >Cấp dự báo <br /> cháy rừng</th>
								<th  class="title_info" id="dactrung" >Đặc trưng</th>
								<th  class="title_info" id="mota" >Mô tả</th>
								<th  class="title_info"  id="capht" >Cấp dự báo <br /> hiện tại</th>  
							</tr>

						</thead>
						<tbody>
					
							<tr>
								<td style="text-align: center;">I</td>
								<td style="; text-align: left; font-weight: bold; color: black" class="cap_du_bao" ><div>Thấp <div class="hinhtron" style="background-color: #0063a6"></div></div></td>
								<td class="desc_canhbao" >Ít có khả năng cháy rừng</td>
								<td id = "cap_1" onclick="capnhat_cap_chayrung(1)"></td>
							</tr>
							<tr>
								<td style="text-align: center;">II</td>
								<td  class="cap_du_bao" ><div>Trung bình	 <div class="hinhtron" style="background-color:#00923f "></div></td>
								<td  class="desc_canhbao" >Có khả năng cháy rừng</td>
								<td id = "cap_2" onclick="capnhat_cap_chayrung(2)"></td>

							</tr>
							<tr>
								<td style="text-align: center;">III</td>
								<td  class="cap_du_bao" ><div>Cao <div class="hinhtron" style="background-color:#fff500 "></div></td>
								<td class="desc_canhbao" >Có khả năng dễ cháy</td>
								<td id = "cap_3" onclick="capnhat_cap_chayrung(3)"></td>

							</tr>
							<tr>
								<td style="text-align: center;">IV</td>
								<td class="cap_du_bao" ><div>Nguy hiểm <div class="hinhtron" style="background-color: #e67717"></div></td>
								<td class="desc_canhbao" >Có khả năng cháy lớn</td>
								<td id = "cap_4" onclick="capnhat_cap_chayrung(4)" ></td>
							</tr>
							<tr>
								<td style="text-align: center;">V</td>
								<td class="cap_du_bao" >
									<div style="width:100%;">Rất nguy hiểm <div class="hinhtron" style="background-color:#d8251d "></div>
								</td>
								<td class="desc_canhbao" >Có khả năng cháy lớn <br /> và lan tràn nhanh</td>
								<td id = "cap_5" onclick="capnhat_cap_chayrung(5)"></td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>

			<style type="text/css">

				.thongso table tr{
					height: 43px

				}

			</style>
				<!--  <div  class="thongso table_home_right table-responsive col-sm-3">    
				<table  class="data table-responsive table table-hover table-bordered col-sm-3 table-hover" style="width:100%"> -->
					<div  class=" thongso table-responsive table_home_right " style="padding:0px">  
						<div>  
							<form class="form-horizontal" id="form_nhap" action="/home" method="post">
								<table class="data table-responsive table table-hover table-bordered  table-hover" style="width:100%; padding-left: 0px!important">
									<thead>
										<tr class="v_mid" id="tb_head">
											<th class="title_info" style="width: 15%">STT</th>
											<th  class="title_info" style="width: 25%" >Thông số môi trường</th>
											<th  class="title_info"  style="width: 20%" >Dữ liệu lúc 13h</th>

											<th  class="title_info"  style="width: 20%">Dữ liệu mới nhất</th>
											<th  class="title_info"  style="width: 20%">Đơn vị</th>

										</tr>


									</thead>
									<tbody>

										<?php 
										$tmp = "";
										$tmp_13 = "";
										$hum = "";
										$hum_13 = "";
										$rain ="";
										$rain_13 = "";
										$day ="";
										$day_13 = "";
										?>
										<tr >
											<td class="desc_canhbao">1</td>
											<td class="desc_canhbao" style="font-weight: bold">Nhiệt độ</td>
											<td class="desc_canhbao"><?php echo $nhietdo_13h; ?></td>
											<td class="desc_canhbao"><?php echo $nhietdo_moinhat; ?>
												<input class="form-control" type="hidden" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value= "<?php echo $tmp; ?>" id = "tmp" name = "data[Thongso][tmp]" >

												<input class="form-control" type="hidden" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value= "<?php echo $day; ?>" id = "day" name = "data[Thongso][day]" >
											</td>

											<td class="desc_canhbao" style="font-weight: bold"> ⁰C</td>

										</tr>
										<tr >
											<td class="desc_canhbao">2</td>

											<td class="desc_canhbao" style="font-weight: bold">Độ ẩm</td>
											<td class="desc_canhbao" ><?php echo $doam_13h; ?>

												<input class="form-control" type="hidden" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value= "<?php echo $hum_13; ?>" id = "hum_13" name = "data[Thongso][hum_13]" >

											</td>
											<td class="desc_canhbao"><?php echo $doam_moinhat; ?>

												<input class="form-control" type="hidden" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value= "<?php echo $hum; ?>" id = "hum" name = "data[Thongso][hum]" >
											</td>
											<td class="desc_canhbao" style="font-weight: bold"> %</td>

										</tr>
										<tr>
											<td class="desc_canhbao">3</td>

											<td class="desc_canhbao" style="font-weight: bold">Lượng mưa</td>
											<td class="desc_canhbao"> <?php echo $luongmua_13h; ?>
												<input class="form-control" type="hidden" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value= "<?php echo $rain_13; ?>" id = "rain_13" name = "data[Thongso][rain_13]" >
											</td>
											<td class="desc_canhbao"> <?php echo $luongmua_moinhat ; ?>

												<input class="form-control" type="hidden" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value= "<?php echo $rain; ?>" id = "rain" name = "data[Thongso][rain]">

											</td>
											<td class="desc_canhbao" style="font-weight: bold"> mm</td>
										</tr>
										<tr >
											<td class="desc_canhbao">4</td>
											<td class="desc_canhbao" style="font-weight: bold">Hướng gió</td>
											
											<td> <input type="text" id = "huonggio_13" name="data[Thongso][huonggio_13]" style="width: 100%" value ="<?php echo $huonggio_13h;?>"></td>
											<td> <input type="text" id = "huonggio" name="data[Thongso][huonggio]" style="width:100%" value ="<?php echo $huonggio_moinhat;?>">

												<input type="hidden" id="hidden" name="data[Thongso][id_capdubao]" style="width:100%" value="">
											</td>
											<td style="font-weight: bold">
											<?php 
												if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
												{
											?>
												<input  name="" type="submit" style=" width:70%; margin-left:15px;" class="btn-table  ui-btn-hidden a_save " id="id_save_tram" value="Lưu" >  </td>
											<?php }?>
											</tr>



										</tbody>
									</table>
								</form>
							</div>	
							<div class="div_button">
								<?php 
								if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen'))
									{
								?>
								<div class="div_download">
									<span style="" class="title_lietke">LIỆT KÊ THÔNG TIN CÁC VỤ CHÁY </span>
									<a href="/home/excel">
										<button style="" class="btn btn-primary btn-md img-rounded tai_index">Tải xuống (*.xlx)</button>
									</a>
								</div>
								<?php
									}
								?>
								<?php 
								if($this->Session->read('id_phanquyen') == "1" )
									{
								?>
								<div class="div_phatlenh">
									<span  class="phat_lenh">PHÁT LỆNH CẢNH BÁO</span>
									<a href="/home/phatlenh" target="_blank"  class="btn btn-primary btn-md img-rounded btn_phatlenh">Phát lệnh SMS</a>
								</div>
									<?php }?>

							</div>
						</div>
						<div class="div_button_mobile">
							<div class="div_download">
								<span style="" class="title_lietke">LIỆT KÊ THÔNG TIN CÁC VỤ CHÁY </span>
								<a href="/home/excel">
									<button style="" class="btn btn-primary btn-md img-rounded tai_index">Tải xuống (*.xlxs)</button>
								</a>
							</div>
							<div class="div_phatlenh">
								<span  class="title_lietke">PHÁT LỆNH CẢNH BÁO</span>
								<button target="_blank"  onclick="phatlenh()" class="btn btn-primary btn-md img-rounded btn_phatlenh">Phát lệnh SMS</button>
							</div>

						</div>	

						<div class='clear'></div>

<script >
	function capnhat_cap_chayrung(socap) 
		{
		//xóa hết nội dung tất cả các cấp 
		

		for(i=1; i<= 5; i++)
		{
			document.getElementById("cap_"+i).innerHTML="";

		}

		var array_color = ["","0063a6", "00923f", "fff500", "e67717", "d8251d"];
		//cập nhật cấp hiện tại
		document.getElementById("cap_"+socap).innerHTML="<div class='hinhtron' style='margin-right:32px; margin-top:7px; background-color:#"+ array_color[socap] + "'></div>";
		document.getElementById("hidden").value = socap;

	}


</script>
<script type="text/javascript">
<?php 
	$capbao = "";
	//print_r($array_capdubao_chayrung);
	if($array_capdubao_chayrung) $capbao = $array_capdubao_chayrung[0]["data"]["fire"];
	if($capbao == "") $capbao = "0";
			
?>
	socap = <?php echo $capbao; ?>;


	var array_color = ["","0063a6", "00923f", "fff500", "e67717", "d8251d"];
		//cập nhật cấp hiện tại
	document.getElementById("cap_"+socap).innerHTML="<div class='hinhtron' style='margin-right:32px; margin-top:7px; background-color:#"+ array_color[socap] + "'></div>";

</script>

<script type="text/javascript">
	function phatlenh()
	  {
		 document.getElementById("hidden1").value = "1";
	  }
  
</script>
<script type="text/javascript">
	function chuyen()
	{
		//window.location.href ="/giamsatchayrung?tmp_13=<?php echo $tmp_13;?>&tmp=<?php echo $tmp;?>&hum_13=<?php echo $hum_13;?>&hum=<?php echo $hum;?>&rain_13=<?php echo $rain_13; ?>&rain=<?php echo $rain; ?> ";
	}

</script>