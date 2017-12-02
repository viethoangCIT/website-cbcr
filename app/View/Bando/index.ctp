<style>
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
<div class="table-responsive font_table div_map"  > 
 <h4 style="color: #2f83b7;text-align: center; width: 100% ; margin-bottom: 6px;">BẢN ĐỒ CÁC ĐẦU MỐI HỖ TRỢ</h4>
 <div id = "hinh_map">
  <div id ="map"></div>
 </div>
</div>
<div class="danhsach">
 <h4>DANH SÁCH CÁC ĐẦU MỐI HỖ TRỢ</h4>
</div>
<div class="table-responsive font_table tbl_map" style="margin-top:-5px;" >     



  <table  id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table; margin-top: -5px'>
    <thead>
      <tr class='v_mid'>
        <th  style="width:7%">STT</th>
        <th   style="width: 15%">Tên</th>
        <th   style="width: 8%">Chức vụ</th>

        <th  style="width: 10%">Số điện thoại</th>
        <th  style="width: 15%">Thông tin khác</th>
        <th style="width: 10%"> Chức năng</th>                             
      </tr>
    </thead>
    <tbody class='body_mid'>
  <?php 
      $stt = 0;

      foreach ($array_hotro as $hotro)
      {

        $stt++;
        $id = $hotro["Hotro"]["id"];

        ?>

        <tr>
          <th><?php echo  $stt; ?></th>
          <td class='mid'><?php echo $hotro["Hotro"]["name"]; ?></td>
          <td class='mid'><?php echo $hotro["Hotro"]["position"]; ?></td> 
          <td class='mid'><?php echo $hotro["Hotro"]["phone"]; ?></td>
          <td class='mid'><?php echo $hotro["Hotro"]["thongtin_khac"]; ?></td>
          <td>
          <?php 
            if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
            {
          ?>
            <div class="row row2 btn_tram" >

                <button  class="btn-table  ui-btn-hidden a_save xoa" id="id_sua_tram" onclick="window.location.href = '/bando/add/'+ <?php echo $id; ?>"/>Sửa</button>
                 <br/>
                <button class=" btn-table  ui-btn-hidden a_huy  " id="id_xoa_tram" onclick="window.location.href = '/bando/del/'+ <?php echo $id; ?>" /> Xóa</button>   
              </div>
            <?php }?>
          </td>
        </tr>
    <?php } ?>
 
    </tbody>

  </table>
  <div>

    <!-- BEGIN PAGINATOR-->
  <?php
    $html  = '<ul class="pagination">';

            $so_phantu = 3;
            //previous link button
            $link = "/bando/index";
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
  <?php 
	if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
		{
	?>
  <a  id="btn_add_map" style="" class="btn btn-info" href="/bando/add">Thêm đầu mối hỗ trợ</a>
    <?php }?>
</div>
<div class='clear'></div>
<a id="btn_add_map_mobile" class="btn btn-info" href="/bando/add">Thêm đầu mối hỗ trợ</a>

<style type="text/css">
  #hinh_map{
    width: 100%;
    height: 409px;
    
  }
  #map {
        height: 100%;
      }

</style>


<!-- <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 16.045021, lng: 108.210138},
          zoom: 8
        });

        
      }
</script> -->
<script>
      
        //Tạo bản đồ.
   function initMap() 
  {
    // tạo vị trí đà nẵng
      var vitri_danang = {lat: 16.045021, lng: 108.210138};

      //tạo bản đồ với vị trí trung tâm đà nẵng với độ zoom 15
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: vitri_danang
      });
      
      var trangthai_chay = <?php echo $trangthai;?>;


      if(trangthai_chay == 1)
      {
        //vẽ tọa độ vụ cháy
      var vitri_vuchay1 = {lat: <?php echo $toado_x;?>, lng: <?php echo $toado_y;?>};
            var marker1 = new google.maps.Marker({
              position: vitri_vuchay1,
              map: map
            });
      }
      else
      {
        //vẽ ra tất cả các vụ cháy rừng trong lịch sử
        <?php 
          $stt = 0;
          foreach ($array_vuchay as $vuchay) {
            $stt ++;
               
            $toadox = $vuchay["Vuchay"]["toadox"];
            if($toadox=="") $toadox = 0 ;

            $toadoy = $vuchay["Vuchay"]["toadoy"];
            if($toadoy=="") $toadoy = 0 ;
        ?>

        // tạo tọa độ vụ cháy
        var  vitri_vuchay<?php echo $stt; ?> =  {lat: <?php echo $toadox; ?>, lng: <?php echo $toadoy; ?>};

        //tạo điểm có vị trí vụ cháy vào bản đồ 
        var marker<?php echo $stt; ?>  = new google.maps.Marker({
          position: vitri_vuchay<?php echo $stt; ?>,
          map: map
        });

        <?php } ?>
      }

      
    
}
     
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzoyQItseXr9gTt5DWEViBdqqnVVtyKkc&callback=initMap">
  </script>
