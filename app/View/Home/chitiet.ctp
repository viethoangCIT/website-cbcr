<?php ?>
<title>HỆ THỐNG CAMERA GIÁM SÁT CHÁY RỪNG</title>
<style type="text/css">
	table tbody td img{
		width: 100px;
		height: 50px;
	}

</style>
<h2 class="title_page" style="font-size: 19px; margin: 25px 0 -4px 0;  ">BẢNG THỐNG KÊ CÁC VỤ CHÁY RỪNG</h2>
<div class="table-responsive font_table" style="width:100%; float:left; margin-top: 15px" >
	<div  class='tbl_r' style="width: 150%">
		

			<table  id="movie-table" data-mode="reflow" class=" ui-responsive table table-bordered " style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>
				<thead>
					<tr class='v_mid'>
						<th style="width: 20px">STT</th>
						<th style="width: 30px">Ngày/tháng/năm</th>
						<th style="width: 1px">Nhiệt độ (⁰C)</th>
						<th style="width:  1px">Độ ẩm (px)</th>
						<th style="width:  1px">Lượng mưa(mm)</th>
						<th style="width:  3px">Hướng gió</th>
						<th style="width:  3px">Chỉ số P</th>
						<th style="width:  3px">Chỉ số H</th>
						<th style="width: 3px">Cấp dự báo</th>
						<th style="width: 3px">Xác nhận</th>
						<th style="width:  13px">Huyện</th>

						<th style="width:  13px">Xã</th>

						<th style="width:  13px">Tiêu khu</th>
						<th style="width:  13px">Địa danh</th>
						<th style="width: 5px">Tọa độ X</th>
						<th style="width:  5px">Tọa độ Y</th>
						<th style="width:  3px">Thời điểm phát lửa(giờ/phút)</th>
						<th style="width:  3px">Thời điểm kết thúc(giờ/phút)</th>

						<th style="width:  3px">Rừng tự nhiên(ha)</th>								
						<th style="width: 3px">Rừng trồng(ha)</th>
						<th style="width: 3px">Cây bụi cỏ(ha)</th>								
						<th style="width: 3px">Loại khác(ha)</th>
						<th style="width:  3px">Tổng diện tích cháy(ha)</th>								
						<th style="width: 7px">Chủ rừng</th>
						<th style="width: 3px">Chức năng</th>

					</tr>

				</thead>
				<tbody class='body_mid'>


					<?php 
					$stt = 0;


					foreach ($array_vuchay as $chitiet)
					{
						//print_r($array_vuchay);
						$stt++;
						$id = $chitiet["vuchays"]["id"];
						$date = $chitiet["vuchays"]["ngay"];
						$date = date("d-m-Y", strtotime($date));
       
						$tong = $chitiet["vuchays"]["dientich_rungtunhien"] + $chitiet["vuchays"]["dientich_rungtrong"] + $chitiet["vuchays"]["dientich_khac"] + $chitiet["vuchays"]["dientich_cayco"];
							

						?>
						<tr>
							<td class='mid'><?php echo $stt; ?></td>
							<td class='mid'><?php echo $date; ?></td>
							<td class='mid'> <?php echo $chitiet["vuchays"]["nhiet_do"]; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["do_am"]; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["luong_mua"]; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["huong_gio"]; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["chisoP"]; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["chisoH"];?></td>
							<td class='mid'><?php ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["xacnhan"]; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["huyen"]; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["xa"]; ?></td>

							<td class='mid'><?php echo $chitiet["vuchays"]["tieukhu"]; ?></td>

							<td class='mid'><?php echo $chitiet["vuchays"]["diadanh"]; ?></td>
							
							<td class='mid'><?php echo $chitiet["vuchays"]["toadox"]; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["toadoy"]; ?></td>

							<td class='mid'><?php echo $chitiet["vuchays"]["thoigian_batdau"]; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["thoigian_ketthuc"]; ?></td>


							<td class='mid'><?php echo $chitiet["vuchays"]["dientich_rungtunhien"]; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["dientich_rungtrong"]; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["dientich_khac"]; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["dientich_cayco"]; ?></td>
							<td class='mid'><?php echo $tong; ?></td>
							<td class='mid'><?php echo $chitiet["vuchays"]["churung"]; ?></td>
							<td>
							<?php 
									if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
									{
								?>
									<div class="row row2 btn_tram" >

					                <button  class="btn-table  ui-btn-hidden a_save " id="id_sua_tram" onclick="window.location.href = '/home/edit/'+ <?php echo $id; ?>"/>Sửa</button>
					                 <br/>

					                <button class=" btn-table  ui-btn-hidden a_huy  " id="id_xoa_tram" onclick="window.location.href = '/home/del/'+ <?php echo $id; ?>" /> Xóa</button>  
					                
					              </div>
								<?php } ?>
							</td>
						</tr>
						
						<?php } ?>
					</tbody>

				</table>
			
			<div class="clear"></div>

		</div>
	</div>
	<style type="text/css">
		.mid input{
			text-align: center;
			width: auto;
		}
	</style>