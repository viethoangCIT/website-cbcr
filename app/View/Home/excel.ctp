<table border = "1">
<thead>
  <tr>
    <th style="width: 50px">STT</th>
    <th style="width: 100px">Ngày/tháng/năm</th>
    <th style="width: 100px">Nhiệt độ (⁰C)</th>
    <th style="width:  100px">Độ ẩm (px)</th>
    <th style="width:  100px">Lượng mưa(mm)</th>
    <th style="width:  100px">Hướng gió</th>
    <th style="width:  100px">Chỉ số P</th>
    <th style="width:  100px">Chỉ số H</th>
    <th style="width: 100px">Cấp dự báo</th>
    <th style="width: 100px">Xác nhận</th>
    <th style="width: 150px">Huyện</th>

    <th style="width:  150px">Xã</th>

    <th style="width:  150px">Tiêu khu</th>
    <th style="width:  150px">Địa danh</th>
    <th style="width: 100px">Tọa độ X</th>
    <th style="width:  100px">Tọa độ Y</th>
    <th style="width:  100px">Thời điểm phát lửa(giờ/phút)</th>
    <th style="width:  100px">Thời điểm kết thúc(giờ/phút)</th>

    <th style="width:  100px">Rừng tự nhiên(ha)</th>								
    <th style="width: 100px">Rừng trồng(ha)</th>
    <th style="width: 100px">Cây bụi cỏ(ha)</th>								
    <th style="width: 100px">Loại khác(ha)</th>
    <th style="width:  100px">Tổng diện tích cháy(ha)</th>								
    <th style="width: 150px">Chủ rừng</th>

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
      <td><?php echo $stt; ?></td>
      <td><?php echo $date; ?></td>
      <td><?php echo $chitiet["vuchays"]["nhiet_do"]; ?></td>
      <td><?php echo $chitiet["vuchays"]["do_am"]; ?></td>
      <td><?php echo $chitiet["vuchays"]["luong_mua"]; ?></td>
      <td><?php echo $chitiet["vuchays"]["huong_gio"]; ?></td>
      <td><?php echo $chitiet["vuchays"]["chisoP"]; ?></td>
      <td><?php echo $chitiet["vuchays"]["chisoH"];?></td>
      <td><?php ?></td>
      <td><?php echo $chitiet["vuchays"]["xacnhan"]; ?></td>
      <td><?php echo $chitiet["vuchays"]["huyen"]; ?></td>
      <td><?php echo $chitiet["vuchays"]["xa"]; ?></td>

      <td><?php echo $chitiet["vuchays"]["tieukhu"]; ?></td>

      <td><?php echo $chitiet["vuchays"]["diadanh"]; ?></td>
      
      <td><?php echo $chitiet["vuchays"]["toadox"]; ?></td>
      <td><?php echo $chitiet["vuchays"]["toadoy"]; ?></td>

      <td><?php echo $chitiet["vuchays"]["thoigian_batdau"]; ?></td>
      <td><?php echo $chitiet["vuchays"]["thoigian_ketthuc"]; ?></td>


      <td><?php echo $chitiet["vuchays"]["dientich_rungtunhien"]; ?></td>
      <td><?php echo $chitiet["vuchays"]["dientich_rungtrong"]; ?></td>
      <td><?php echo $chitiet["vuchays"]["dientich_khac"]; ?></td>
      <td><?php echo $chitiet["vuchays"]["dientich_cayco"]; ?></td>
      <td><?php echo $tong; ?></td>
      <td><?php echo $chitiet["vuchays"]["churung"]; ?></td>
    </tr>
    
    <?php } ?>
  </tbody>

</table>