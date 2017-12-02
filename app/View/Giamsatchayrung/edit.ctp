<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- nhập thông tin vu cháy-->
<div class="row" id = "nhap_vuchay" style="width:100%;margin: auto;">
  <div class="table-responsive nhaptram form_info" > 
    <table class="table table-bordered table-striped lg_code"> 
      <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
      <thead class='bg_title'> 
        <tr> 

          <th colspan='2' style='padding:10px 10px; text-align:center; font-size: 20px'>Sửa thông tin vụ cháy</th>  
        </tr> 
      </thead>
      <tbody> 
          <?php 

          $id = "";
          $huyen = "";
          $xa = "";
          $tieukhu = "";
          $diadanh = "";
          $toadox = "";
          $toadoy = "";
          $chisoH = "";
          $chisoP = "";
          $thoigian_batdau = "";
          $thoigian_ketthuc = "";
          $dientich_rungtunhien = "";
          $dientich_rungtrong = "";
          $dientich_khac = "";
          $dientich_cayco = "";
          $churung = "";
          // print_r($array_edit_firmware);

          if( $array_edit_vuchay != NULL){

            $id = $array_edit_vuchay[0]["Vuchay"]["id"];
            $huyen = $array_edit_vuchay[0]["Vuchay"]["huyen"];
            $xa = $array_edit_vuchay[0]["Vuchay"]["xa"];
            $tieukhu = $array_edit_vuchay[0]["Vuchay"]["tieukhu"];
            $diadanh = $array_edit_vuchay[0]["Vuchay"]["diadanh"];
            $toadox = $array_edit_vuchay[0]["Vuchay"]["toadox"];
            $toadoy = $array_edit_vuchay[0]["Vuchay"]["toadoy"];
            $chisoH = $array_edit_vuchay[0]["Vuchay"]["chisoH"];
            $chisoP = $array_edit_vuchay[0]["Vuchay"]["chisoP"];
            $thoigian_batdau = $array_edit_vuchay[0]["Vuchay"]["thoigian_batdau"];
            $thoigian_ketthuc = $array_edit_vuchay[0]["Vuchay"]["thoigian_ketthuc"];
            $dientich_rungtunhien = $array_edit_vuchay[0]["Vuchay"]["dientich_rungtunhien"];
            $dientich_rungtrong = $array_edit_vuchay[0]["Vuchay"]["dientich_rungtrong"];
            $dientich_khac = $array_edit_vuchay[0]["Vuchay"]["dientich_khac"];
            $churung = $array_edit_vuchay[0]["Vuchay"]["churung"];

            
          }

          // echo "name".$name;
       ?>
        <tr> 
          <td colspan="2">
           <div class="row row4" style="width:100%">
            <form class="form-horizontal" action="/home/chitiet" id ="form_nhap"  method="post">

             <div class="form-group nhap_input">
              <label class="col-sm-3 control-label">Huyện</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $huyen; ?>" name="data[Vuchay][huyen]">
                 <input class="form-control" type="hidden" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $id; ?>" name="data[Vuchay][id]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Xã</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $xa; ?>" name="data[Vuchay][xa]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Tiểu khu</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $tieukhu; ?>" name="data[Vuchay][tieukhu]">

              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Địa danh</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $diadanh; ?>" name="data[Vuchay][diadanh]">

              </div>
            </div>
            <div class="form-group nhap_input">
              <label class="col-sm-3 control-label">Tọa độ X</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $toadox; ?>" name="data[Vuchay][toadox]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label class="col-sm-3 control-label">Tọa độ Y</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $toadoy; ?>" name="data[Vuchay][toadoy]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label class="col-sm-3 control-label">Chỉ số H</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $chisoH; ?>" name="data[Vuchay][chisoH]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label class="col-sm-3 control-label">Chỉ số P</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $chisoP; ?>" name="data[Vuchay][chisoH]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Thời điểm bắt đầu</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $thoigian_batdau; ?>" name="data[Vuchay][thoigian_batdau]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Thời điểm kết thúc</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $thoigian_ketthuc; ?>" name="data[Vuchay][thoigian_ketthuc]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Diện tích cháy rừng tự nhiên</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $dientich_rungtunhien; ?>" name="data[Vuchay][dientich_rungtunhien]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Diện tích cháy rừng trồng</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $dientich_rungtrong; ?>" name="data[Vuchay][dientich_rungtrong]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Diện tích cháy các loại khác</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $dientich_khac; ?>" name="data[Vuchay][dientich_khac]">
              </div>
            </div>

            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Diện tích cháy cây, bụi cỏ </label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $dientich_cayco; ?>" name="data[Vuchay][dientich_cayco]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-3 control-label">Chủ rừng</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $churung; ?>" name="data[Vuchay][churung]">
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
</table>
</div>
</div>
<!-- end nhập thông tin vu cháy-->
<script>
    function huy() {
      document.getElementById("form_nhap").reset();
    }
  </script> 
  