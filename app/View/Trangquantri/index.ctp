<?php 
  if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
  {
?>
 <script type="text/javascript" src="<?php echo $this->webroot;?>js/plupload/plupload.full.min.js"></script>

 <style>
   .manager li{

    float:left;


  }
  .manager li a{
    text-align: center;

  }
  .manager li a:hover{

  }

  .xemvideo{
    float: left;
    background-image: url(../img/icon/video.png);
    background-repeat: no-repeat;
    background-position: 12px center;
    padding-left: 22px;
    background-color: #2f83b7 !important;
    background-size: 11px;
    width: 82px;
    font-size: 11px;
  }


</style>




<ul class="nav navbar-nav menu_trang_quantri" id="destop" style="width:100%; background-color: #2f83b7; margin-top: 10px;">

<li  class="li_menu" ><a href="<?php echo $this->webroot;?>tram" class="menuquantri" id="trangchu"  >Quản lý trạm</a></li>
<li  class="li_menu">
  <a href="<?php echo $this->webroot; ?>nguoidung/index" class="menuquantri"   >Quản lý người dùng</a>
</li>
<li  class="li_menu"><a href="<?php echo $this->webroot; ?>chukimoitruong" class="menuquantri_1" id="quanly">Quản lý chu kì cập nhật thông số môi trường</a></li>
<li class="li_menu"><a href="<?php echo $this->webroot; ?>nhom"  class="menuquantri" id="quanlynhom" style="height: 100%;    padding-top: 25px;">Quản lý nhóm chữa cháy</a></li>
<li  class="li_menu"><a href="<?php echo $this->webroot; ?>Firmware" class="menuquantri" id="bando" style="height: 100%;    padding-top: 25px;    padding-top: 25px;" >Quản lý Firmware</a></li>

</ul>
<ul class="nav navbar-nav menu_trang_quantri_mobile" id="mobile" style="width:100%; background-color: #2f83b7; margin-top: 10px;">

 <li  class="li_menu" ><a href="<?php echo $this->webroot;?>tram" class="menuquantri" id="trangchu"  >Quản lý trạm</a></li>
 <li  class="li_menu">
  <a href="<?php echo $this->webroot; ?>nguoidung/index" class="menuquantri"   >Quản lý người dùng</a>
</li>
<li  class="li_menu"><a href="<?php echo $this->webroot; ?>chukimoitruong" class="menuquantri_1" id="quanly">Quản lý chu kì cập nhật thông số môi trường</a></li>
<li class="li_menu"><a href="<?php echo $this->webroot; ?>nhom"  class="menuquantri" id="quanlynhom" style="height: 100%;    padding-top: 25px;">Quản lý nhóm chữa cháy</a></li>
<li  class="li_menu"><a href="<?php echo $this->webroot; ?>Firmware" class="menuquantri" id="bando" style="height: 100%;    padding-top: 25px;    padding-top: 25px;" >Quản lý Firmware</a></li>

</ul> 
<h4 class="title_history" >LỊCH SỬ VIDEO GIÁM SÁT</h4>
<div class="table-responsive font_table" style="border: none;" >
  <div  class='tbl_r' id="tbl_trangquantri">
    <table  data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>

      <thead>
        <tr class='v_mid'>
          <th  width='3%'>STT</th>
          <th    style ="width:15%">Tên trạm</th>
          <th    style ="width:15%">Ngày</th>
          <th   style ="width:20%">T/gian quay</th>
          <th   style ="width:20%">T/gian kết thúc</th>
          <th   style ="width:1%">Chức năng</th>


        </tr>
      </thead>
      <tbody class='body_mid'>
      <?php 
           $stt = 0;
          foreach ($array_video as $video) {
            $stt++;

            $date = $video["Vuchay"]["ngay"];
            $date = date("d-m-Y", strtotime($date));
       ?>
        <tr>
          <th><?php echo  $stt; ?></th>
          <td class='mid'><?php echo  $video["Vuchay"]["tentram"] ; ?></td>

          <td class='mid'><?php echo  $date; ?></td>        
          <td class='mid'> <?php echo  $video["Vuchay"]["thoigian_batdau"] ; ?></td>    
          <td class='mid'> <?php echo  $video["Vuchay"]["thoigian_ketthuc"] ; ?></td>                   
          <td>
            <ul class="pager btn_tt ql_mar" style="float: left">
              <li>
                <a href="/trangquantri/video" class="xemvideo">Video</a>
              </li>
              <li>
                <a href="/files/<?php echo $video["Vuchay"]["video"];?>" class="taixuong" >Tải xuống </a>
              </li>

            </ul>
          </td>
        </tr>
        <?php } ?>
        
      </tbody>
    </table>

  </div>

</div>
          <?php }?>
