<h4 style="color: #2f83b7;text-align: center; width: 100% ;  margin-bottom: 9px; margin-top: 20px; font-size: 19px; font-weight: bold;  ">THÊM ĐẦU MỐI HỖ TRỢ</h4>
<div class="row" style="width:100%;margin: auto;">
  <div class="table-responsive nhaptram" > 
    <table class="table table-bordered table-striped lg_code add_map" style="overflow: hidden;" > 
      <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
      <thead class='bg_title'> 
        <tr> 
          <th colspan='2' class="th_add" >Nhập thông tin đầu mối hỗ trợ</th> 
        </tr> 
      </thead>

      <?php 

      $id = "";
      $name = "";
      $position = "";
      $phone = "";
      $diachi = "" ;
      $thongtin_khac = "";

          // print_r($array_edit_Group);

      if( $array_edit_hotro != NULL){
        $id = $array_edit_hotro[0]["Hotro"]["id"];
        $name = $array_edit_hotro[0]["Hotro"]["name"];
        $position = $array_edit_hotro[0]["Hotro"]["position"];
        $phone = $array_edit_hotro[0]["Hotro"]["phone"];
        $diachi = $array_edit_hotro[0]["Hotro"]["diachi"];
        $thongtin_khac = $array_edit_hotro[0]["Hotro"]["thongtin_khac"];
      }

          // echo "name".$name;
      ?>
      <!-- form nhập tạo nhóm-->
      <tbody> 
        <tr> 
          <td colspan="2">
           <div class="row row4" style="width:100%">
            <form class="form-horizontal" action="/bando/add" method="post">
              <div class="form-group nhap_input">
                <label class="col-sm-3 control-label">Tên </label>
                <div class="col-sm-9 " >
                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $name; ?>" name = "data[Hotro][name]">
                  <input class="form-control" type="hidden" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $id; ?>" name = "data[Hotro][id]">
                </div>
              </div>
              <div class="form-group nhap_input">
                <label class="col-sm-3 control-label">Chức vụ</label>
                <div class="col-sm-9 " >
                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $position; ?>" name = "data[Hotro][position]">
                </div>
              </div>
              <div class="form-group nhap_input">
                <label  class="col-sm-3 control-label">Số điện thoại</label>
                <div class="col-sm-9 " >
                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $phone; ?>" name = "data[Hotro][phone]">
                </div>
              </div>
              <div class="form-group nhap_input">
                <label  class="col-sm-3 control-label">Địa chỉ</label>
                <div class="col-sm-9 " >
                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $diachi; ?>" name = "data[Hotro][diachi]">
                </div>
              </div>
              <div class="form-group nhap_input">
                <label  class="col-sm-3 control-label">Thông tin khác</label>
                <div class="col-sm-9 " >
                  <textarea class="form-control" style="width:100%;border: 1px solid #CCC !important;border-radius:0px" name = "data[Hotro][thongtin_khac]"><?php echo $thongtin_khac; ?></textarea>

                </div>
              </div>

              <div class="row row2 btn_tram" >
                 <button type="submit" class="btn-table  ui-btn-hidden a_save " id="id_save_tram" >Lưu</button>
                <button class=" btn-table  ui-btn-hidden a_huy  " onclick="huy()" id="id_huy_tram">Hủy</button>      
              </div>
            </form>
          </div>
        </td>
      </tr>
    </tbody> 
  </table>
</div>
</div>
<script>
  document.getElementById('quanlychiso').className='active2'; 
  
</script>       
<script>
    function huy() {
      document.getElementById("form_nhap").reset();
    }
  </script> 