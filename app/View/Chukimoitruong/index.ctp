<?php 
            if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
            {
          ?>
<!-- Thanh menu -->
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

<h4  class="title_history title_update_env" >QUẢN LÝ CHU KÌ CẬP NHẬT THÔNG SỐ MÔI TRƯỜNG</h4>
<div class="row "  id="cauhinh" style="width:100%;margin: auto;">
  <div class="table-responsive nhaptram" style="width: 80%;margin: auto;float: left; margin-left: 10%"> 
    <table class="table table-bordered table-striped lg_code"> 
      <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
      <thead class='bg_title'> 
        <tr> 
         <th  style='padding:10px 10px; text-align:center; font-size: 20px; width: 50%;'>Chu kì hiện hành</th> 
         <th  style='padding:10px 10px; text-align:center; font-size: 20px;width: 50%; '>Cấu hình chu kì mới</th> 
       </tr> 
     </thead>
     <tbody> 
      <tr> 
        <td style="width: 50%;">
         <div class="row row4" style="width:100%">
          <form class="form-horizontal" id = "form_nhap1" action="/chukimoitruong/index" method="post" style="padding-bottom: 60px">

           <div class="form-group nhap_input">
            <label class="col-sm-4 control-label">Thời gian: </label>
            <div class="col-sm-6 " >
              <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $moitruong; ?>" disabled="">
            </div>
            <label style="" class="col-sm-1 control-label">(Phút)</label>

          </div>                             
        </form>
      </div>
    </td>
    <td style="width: 50%;">
     <div class="row row4" style="width:100%">
      <form class="form-horizontal" id = "form_nhap1" action="/chukimoitruong/index" method="post" style="padding-bottom: 30px">

       <div class="form-group nhap_input">
        <label class="col-sm-4 control-label">Thời gian: </label>
        <div class="col-sm-6 " >
          <input class="form-control" type="text" value="" name = "data[Chuky][moitruong]" style="width:100%;border: 1px solid #CCC !important"  />
        </div>
        <label style="" class="col-sm-1 control-label">(Phút)</label>

      </div>  
      <div class="row row2" style="margin-left:auto; margin-right:auto; width:100%">
        <button type="submit" class=" btn_icon_sua ui-btn-hidden a_save" id="id_btn_xn"> &nbsp Xác nhận</button>

        <button class="   ui-btn-hidden a_huy " onclick="huy()" id="id_huy_tram">Hủy</button>        
      </div>                     
    </form>
  </div>
</td>
</tr>
</tbody> 
</table>
</div>

</div>

<!--  giao diện diện thoại -->
<div class="row "  id="cauhinh_mobile1" style="width:100%;margin: auto;">
  <div class="table-responsive nhaptram tbr_ckmt"> 
    <table class="table table-bordered table-striped lg_code"> 
      <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
      <thead class='bg_title'> 
        <tr> 
         <th  style='padding:10px 10px; text-align:center; font-size: 20px; width: 50%;'>Chu kì hiện hành</th> 

       </tr> 
     </thead>
     <tbody> 
      <tr> 
        <td style="width: 50%;">
         <div class="row row4" style="width:100%">
          <form class="form-horizontal" id = "form_nhap1" action="/chukimoitruong/index" method="post" style="padding-bottom: 60px">

           <div class="form-group nhap_input">
            <label class="col-sm-4 control-label">Thời gian: </label>
            <div class="col-sm-6 " >
              <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $moitruong; ?>" disabled="">
            </div>
            <label style="margin-left:-20px" class="col-sm-1 control-label lb_phut">(Phút)</label>

          </div>                             
        </form>
      </div>
    </td>

  </tr>
</tbody> 
</table>
</div>

</div>
<div class="row "  id="cauhinh_mobile2" style="width:100%;margin: auto;">
  <div class="table-responsive nhaptram tbr_ckmt" > 
    <table class="table table-bordered table-striped lg_code"> 
      <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
      <thead class='bg_title'> 
        <tr> 

         <th  style='padding:10px 10px; text-align:center; font-size: 20px; '>Cấu hình chu kì mới</th> 
       </tr> 
     </thead>
     <tbody> 

      <td colspan="2">
       <div class="row row4" style="width:100%">
        <form class="form-horizontal"  id = "form_nhap1" action="/chukimoitruong/index" method="post" style="padding-bottom: 30px">

         <div class="form-group nhap_input">
          <label class="col-sm-4 control-label">Thời gian: </label>
          <div class="col-sm-6 " >
            <input class="form-control" type="text" value="<?php echo $moitruong; ?>" name = "data[Chuky][moitruong]" style="width:100%;border: 1px solid #CCC !important"  value="">
          </div>
          <label style="margin-left:-20px" class="col-sm-1 control-label lb_phut">(Phút)</label>

        </div>  
        <div class="row row2" style="margin-left:auto; margin-right:auto; width:100%">
          <button type="submit" class=" btn_icon_sua ui-btn-hidden a_save" id="id_btn_xn"> &nbsp Xác nhận</button>

         <button class="  ui-btn-hidden a_huy " onclick="huy()" id="id_huy_tram">Hủy</button>         
        </div>                      
      </form>
    </div>
  </td>
</tr>
</tbody> 
</table>
</div>

</div>
<!-- end Thanh menu -->

<!-- Phần main -->
<!-- Phần quản lí lượng mưa -->

<h4 class="title_update_rain" >QUẢN LÝ CHU KÌ CẬP NHẬT LƯỢNG MƯA</h4>
<div class="row " id="chukimtr" style="width:100%;margin: auto;">
  <div class="table-responsive nhaptram" style="width: 80%;margin: auto;float: left; margin-left: 10%"> 
    <table class="table table-bordered table-striped lg_code"> 
      <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
      <thead class='bg_title'> 
        <tr> 
         <th  style='padding:10px 10px; text-align:center; font-size: 20px; width: 50%;'>Chu kì hiện hành</th>
         <th  style='padding:10px 10px; text-align:center; font-size: 20px;width: 50%'>Cấu hình chu kì mới</th> 
       </tr> 
     </thead>
     <tbody> 
      <tr> 
        <td style="width: 50%;">
         <div class="row row4" style="width:100%">
          <form class="form-horizontal" action="/chukimoitruong/index" method="post" style="padding-bottom: 60px">

           <div class="form-group nhap_input">
            <label class="col-sm-4 control-label">Thời gian: </label>
            <div class="col-sm-6 " >
              <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $mua; ?>" name = "data[Chuky][mua]" disabled="">
            </div>
            <label style="margin-left:-20px" class="col-sm-1 control-label">(Giờ)</label>

          </div>                             
        </form>
      </div>
    </td>
    <td style="width: 50%;">
     <div class="row row4" style="width:100%">
      <form class="form-horizontal" action="/chukimoitruong/index" method="post" style="padding-bottom: 30px">

       <div class="form-group nhap_input">
        <label class="col-sm-4 control-label">Thời gian: </label>
        <div class="col-sm-6 " >
         <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $mua; ?>" name = "data[Chuky][mua]"/>
      </div>
      <label style="margin-left:-20px" class="col-sm-1 control-label">(Giờ)</label>

    </div>  
    <div class="row row2" style="margin-left:auto; margin-right:auto; width:100%">
      <button type="submit" class=" btn_icon_sua ui-btn-hidden a_save" id="id_btn_xn"> &nbsp Xác nhận</button>

      <button class="  ui-btn-hidden a_huy " onclick="huy()" id="id_huy_tram">Hủy</button>       
    </div>               
  </form>
</div>
</td>
</tr>
</tbody> 
</table>
</div>
</div>
<!-- giao diện diện thoại -->
<div class="row "  id="cauhinh_mobile3" style="width:100%;margin: auto;">
  <div class="table-responsive nhaptram tbr_ckmt" > 
    <table class="table table-bordered table-striped lg_code"> 
      <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
      <thead class='bg_title'> 
        <tr> 
         <th colspan='2' style='padding:10px 10px; text-align:center; font-size: 20px'>Chu kì hiện hành</th> 

       </tr> 
     </thead>
     <tbody> 
      <tr> 
        <td colspan="2">
         <div class="row row4" style="width:100%">
          <form class="form-horizontal" action="/chukimoitruong/index" method="post" style="padding-bottom: 60px">

           <div class="form-group nhap_input">
            <label class="col-sm-4 control-label">Thời gian: </label>
            <div class="col-sm-6 " >
              <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $mua; ?>" disabled="">
            </div>
            <label style="margin-left:-20px" class="col-sm-1 control-label lb_phut">(Phút)</label>

          </div>                             
        </form>
      </div>
    </td>

  </tr>
</tbody> 
</table>
</div>

</div>
<div class="row "  id="cauhinh_mobile4" style="width:100%;margin: auto;">
  <div class="table-responsive nhaptram tbr_ckmt"> 
    <table class="table table-bordered table-striped lg_code"> 
      <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
      <thead class='bg_title'> 
        <tr> 

         <th colspan='2' style='padding:10px 10px; text-align:center; font-size: 20px'>Cấu hình chu kì mới</th> 
       </tr> 
     </thead>
     <tbody> 

      <td colspan="2">
       <div class="row row4" style="width:100%">
        <form class="form-horizontal"  action="/chukimoitruong/index" method="post" style="padding-bottom: 30px">

         <div class="form-group nhap_input">
          <label class="col-sm-4 control-label">Thời gian: </label>
          <div class="col-sm-6 " >
            <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $mua; ?>" name = "data[Chuky][mua]">
          </div>
          <label style="margin-left:-20px" class="col-sm-1 control-label lb_phut">(Phút)</label>

        </div>  
        <div class="row row2" style="margin-left:auto; margin-right:auto; width:100%">
          <button type="submit" class=" btn_icon_sua ui-btn-hidden a_save" id="id_btn_xn"> &nbsp Xác nhận</button>

          <a href=""  class=" a_huy ui-btn-hidden " id="id_btn_huy">Hủy  </a>     
        </div>                         
      </form>
    </div>
  </td>
</tr>
</tbody> 
</table>
</div>

</div>
<style type="text/css">
  @media only screen and (max-width: 768px){
    .form-horizontal .control-label {
      padding-top: 7px;
      margin-bottom: 0;
      text-align: right;
      margin-left: 0px;
    }
  }
</style>

   <script>

    function huy() {
      document.getElementById("form_nhap").reset();
    }

    function xacnhan(){
      document.getElementById("form_nhap").submit();
    }
  </script>
<?php }?>