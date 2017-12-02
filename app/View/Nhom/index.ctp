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
<li  class="li_menu"><a href="<?php echo $this->webroot; ?>firmware" class="menuquantri" id="bando" style="height: 100%;    padding-top: 25px;    padding-top: 25px;" >Quản lý FIRMWARE</a></li>

</ul>
<ul class="nav navbar-nav menu_trang_quantri_mobile" id="mobile" style="width:100%; background-color: #2f83b7; margin-top: 10px;">

 <li  class="li_menu" ><a href="<?php echo $this->webroot;?>tram" class="menuquantri" id="trangchu"  >Quản lý trạm</a></li>
 <li  class="li_menu">
  <a href="<?php echo $this->webroot; ?>nguoidung/index" class="menuquantri"   >Quản lý người dùng</a>
</li>
<li  class="li_menu"><a href="<?php echo $this->webroot; ?>chukimoitruong" class="menuquantri_1" id="quanly">Quản lý chu kì cập nhật thông số môi trường</a></li>
<li class="li_menu"><a href="<?php echo $this->webroot; ?>nhom"  class="menuquantri" id="quanlynhom" style="height: 100%;    padding-top: 25px;">Quản lý nhóm chữa cháy</a></li>
<li  class="li_menu"><a href="<?php echo $this->webroot; ?>firmware" class="menuquantri" id="bando" style="height: 100%;    padding-top: 25px;    padding-top: 25px;" >Quản lý FIRMWARE</a></li>
<!-- <li style="display: none;">
  <embed with="0" height="0" src="../audio/canhbao.mp3" autostart="true" loop="true">                  
  </li> -->
</ul> 
<!-- end Thanh menu -->

<!-- Phần main -->
<!-- Phần nhập bảng tạo nhóm -->

<div class="row form_taonhom">
  <div class="table-responsive nhaptram form_taonhom1"> 
    <table class="table table-bordered table-striped lg_code"> 
      <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
      <thead class='bg_title'> 
        <tr> 
          <th colspan='2' style='padding:10px 10px; text-align:center; font-size: 20px'>Tạo nhóm</th>  
        </tr> 
      </thead>
      <?php 

      $id = "";
      $name = "";
      $nguoitao = "";
      $desc = "";

          // print_r($array_edit_Group);

      if( $array_edit_group != NULL){



        $id = $array_edit_group[0]["Group"]["id"];
        $name = $array_edit_group[0]["Group"]["name"];
        $nguoitao = $array_edit_group[0]["Group"]["nguoitao"];
        $desc = $array_edit_group[0]["Group"]["desc"];
      }

          // echo "name".$name;
      ?>
      <!-- form nhập tạo nhóm-->
      <tbody> 
        <tr> 
          <td colspan="2">
           <div class="row row4" style="width:100%">
            <form class="form-horizontal" id="form_nhap" action="/nhom/index " method="post">

             <div class="form-group nhap_input">
              <label class="col-sm-3 control-label">Tên nhóm</label>
              <div class="col-sm-9 " >
                <input class="form-control textbox_ql" type="text" value= "<?php echo $name; ?>" name = "data1[Group][name]" style="border: 1px solid gray!important">
                <input class="form-control textbox_ql" type="hidden" value= "<?php echo $id; ?>" name = "data1[Group][id]" >
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Người tạo</label>
              <div class="col-sm-9 " >
                <input class="form-control textbox_ql" type="text" value= "<?php echo $nguoitao; ?>" name = "data1[Group][nguoitao]" style="border: 1px solid gray!important">
              </div>
            </div>

            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Mô tả</label>
              <div class="col-sm-9 " >
                <input class="form-control textbox_ql" type="text" style="border: 1px solid gray!important"  value= "<?php echo $desc; ?>" name = "data1[Group][desc]">

              </div>
            </div>
            <div class="row row2 btn_tram" > 
              <button type="submit" style="width: 15%" class="btn-table  ui-btn-hidden a_save " id="id_save_tram" >Lưu</button>
              <button class=" btn-table  ui-btn-hidden a_huy  " style="width: 15%" onclick="huy()" id="id_huy_tram">Hủy</button>     
            </div>
          </form>
        </div>
      </td>
    </tr>
  </tbody> 
  <!-- end form nhập tạo nhóm-->
</table>
</div>
</div>
<!-- End Phần nhập bảng tạo nhóm -->



<!-- Phần  bảng nhập thêm liên lạc -->
<div class="row form_themlienlac">
  <div class="table-responsive nhaptram form_themlienlac2" > 
    <table class="table table-bordered table-striped lg_code"> 
      <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
      <thead class='bg_title'> 
        <tr> 
          <th colspan='2' style='padding:10px 10px; text-align:center; font-size: 20px'>Thêm liên lạc</th>  
        </tr> 
      </thead>

      <!-- form nhập thêm liên hệ-->
      <?php 

      $id = "";
      $name1 = "";
      $phone = "";
      $id_group = "";
      $email = "";
      $thongtin_khac = "";
          // print_r($array_edit_thanhvien);

      if( $array_edit_thanhvien != NULL){

        $id = $array_edit_thanhvien[0]["Thanhvien"]["id"];
        $name1 = $array_edit_thanhvien[0]["Thanhvien"]["name"];
        $phone = $array_edit_thanhvien[0]["Thanhvien"]["phone"];
        $id_group = $array_edit_thanhvien[0]["Thanhvien"]["id_group"];
        $email = $array_edit_thanhvien[0]["Thanhvien"]["email"];
        $thongtin_khac = $array_edit_thanhvien[0]["Thanhvien"]["thongtin_khac"];
      }

          // echo "name".$name;
      ?>
      <tbody> 
        <tr> 
          <td colspan="2">

           <div class="row row4" style="width:100%">
            <form class="form-horizontal" action="/nhom/index " method="post">
              <div class="form-group nhap_input">
                <label class="col-sm-3 control-label">Nhóm</label>
                <div class="col-sm-9 " >
                  <select class="textbox_ql select_group" name="data2[Thanhvien][id_group]" >
                    <?php 

                    foreach ($array_group1 as $group1) 
                      {?>
                      <option  <?php if($id_group == $group1["Group"]["id"]) echo "selected"; ?> value="<?php echo $group1["Group"]["id"]; ?>" >
                      <?php echo $group1["Group"]["name"]; ?>
                    </option>
                    <?php
                  }
                  ?>

                </select>
              </div>
            </div>
            <div class="form-group nhap_input">
              <label class="col-sm-3 control-label">Họ và tên</label>
              <div class="col-sm-9 " >
                <input class="form-control textbox_ql bu" style="border: 1px solid gray!important" type="text" value="<?php echo $name1; ?>" name = "data2[Thanhvien][name]">
                <input class="form-control textbox_ql bu" style="border: 1px solid gray!important" type="hidden" value="<?php echo $id; ?>" name = "data2[Thanhvien][id]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label ">Số điện thoại</label>
              <div class="col-sm-9 " >
                <input class="form-control textbox_ql bu" style="border: 1px solid gray!important" type="text"   value="<?php echo $phone; ?>" name = "data2[Thanhvien][phone]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Email</label>
              <div class="col-sm-9 " >
                <input class="form-control textbox_ql" style="border: 1px solid gray!important" type="text"   value="<?php echo $email; ?>" name = "data2[Thanhvien][email]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label ">Thông tin khác</label>
              <div class="col-sm-9 " >
                <input class="form-control textbox_ql bu" style="border: 1px solid gray!important" type="text"   value="<?php echo $thongtin_khac; ?>" name = "data2[Thanhvien][thongtin_khac]">

              </div>
            </div>
            <div class="row row2 btn_tram" > 
              <button type="submit" style="width: 15%" class="btn-table  ui-btn-hidden a_save " id="id_save_tram" >Lưu</button>
              <button class=" btn-table  ui-btn-hidden a_huy "  style="width: 15%" onclick="huy()" id="id_huy_tram">Hủy</button>     
            </div>     


          </form>
        </div>
      </td>
    </tr>
  </tbody> 
  <!-- ènd form nhập thêm liên hệ-->
</table>
</div>
</div>
<!-- End Phần  bảng nhập thêm liên lạc -->

<div class="clear"></div>

<!-- Phần danh sách quản lí nhóm -->

<div class="row tbl_group" id="destop">
  <h4  class="title_table" style="margin-top: -10px">QUẢN LÝ NHÓM</h4>
  <div class="table-responsive nhaptram tbl_group1" > 
    <div class="table-responsive font_table" style="width:100%; float:left;" >
      <table  id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped table-hover" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>
        <thead>
          <tr class='v_mid' id="tit_tb">
            <th style="width: 1%">STT</th>
            <th style="width: 10%">Tên nhóm</th>
            <th style="width: 10%">Người tạo</th>
            <th style="width: 13%">Số thành viên</th>
            <th style="width: 15%">Mô tả </th>
            <th style="width: 1%">Chức năng</th>

          </tr>
        </thead>

        <tbody class='body_mid'>

          <?php 
          $stt = 0;
          

          foreach ($array_results as $group)
          {

            $stt++;
            $id = $group["groups"]["id"];
            $dem = $group["T"]["dem"];
            if($dem == "") $dem = 0;
            ?>
            <tr>
              <th><?php echo  $stt; ?></th>

              <td class='mid'><?php echo $group["groups"]["name"]; ?></td>
              <td class='mid'><?php echo $group["groups"]["nguoitao"]; ?></td>
              <td class='mid'><?php echo $dem; ?></td>

              <td class='mid'><?php echo $group["groups"]["desc"]; ?></td>

              <td class='mid'>
                <div class="row row2 btn_tram" >

                  <button  class="btn-table  ui-btn-hidden a_save " id="id_sua_tram" style="margin-left: 20%;" onclick="window.location.href = '/nhom/index/'+ <?php echo $id; ?>">Sửa</button>
                  <br/>
                  <button class=" btn-table  ui-btn-hidden a_huy  " id="id_xoa_tram" style="margin-left: 20%;" onclick="window.location.href = '/nhom/del/'+ <?php echo $id; ?>" > Xóa</button>   
                </div>
              </td>
            </tr>
            <?php 
          }
             ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- End Phần danh sách quản lí nhóm -->



  <!-- Phần  danh sách chi tiết quản lí nhóm -->

  <div class="row tbl_memb">
    <h4  class="title_table" style="margin-top: -10px">DANH SÁCH CHI TIẾT NHÓM</h4>
    <div class="table-responsive nhaptram" style="width: 100%;margin: auto;"> 
     <div class="table-responsive font_table tbl_memb1"  >

      <table  id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped table-hover" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>
        <thead>
          <tr class='v_mid'>
            <th style="width: 10%">STT</th>
            <th style="width: 20%">Tên</th>
            <th style="width: 14%">Số điện thoại</th>
            <th style="width: 10%">Email</th>
            <th style="width: 20%">Thông tin khác</th>
            <th style="width: 14%">Chức năng</th>

          </tr>
        </thead>
        <tbody class='body_mid'>
          <?php 
          $stt = 0;
          

          foreach ($array_thanhvien as $thanhvien)
          {

            $stt++;
            $id = $thanhvien["Thanhvien"]["id"];

            ?>

            <tr>
              <th><?php echo  $stt; ?></th>
              <td class='mid'><?php echo $thanhvien["Thanhvien"]["name"]; ?></td>
              <td class='mid'><?php echo $thanhvien["Thanhvien"]["phone"]; ?></td>
              <td class='mid'><?php echo $thanhvien["Thanhvien"]["email"]; ?></td>
              <td class='mid'><?php echo $thanhvien["Thanhvien"]["thongtin_khac"]; ?></td>

              <td class='mid'>
                <div class="row row2 btn_tram" >

                  <button  class="btn-table  ui-btn-hidden a_save btn_suanhom" id="id_sua_tram" style="margin-left: 20%;" onclick="window.location.href = '/nhom/index/'+ <?php echo $id; ?>"/>Sửa</button>
                  <br/>
                  <button class=" btn-table  ui-btn-hidden a_huy btn_suanhom " id="id_sua_tram" style="margin-left: 20%;"  onclick="window.location.href = '/nhom/del1/'+ <?php echo $id; ?>" /> Xóa</button>   
                </div>
              </td>

            </tr>
            <?php 
          }
             ?>
          </tbody>

        </table>


      </div>
    </div>
  </div>
  <!--End Phần  danh sách chi tiết quản lí nhóm -->




  <div class="clear"></div>
  <style type="text/css">

    .title_table{
      color: #2f83b7;
      text-align: center;
    }
  </style>

  <script>
    function huy() {
      document.getElementById("form_nhap").reset();
    }
  </script> 
<?php }?>