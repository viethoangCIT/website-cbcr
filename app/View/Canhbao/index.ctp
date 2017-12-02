
<style type="text/css">
.input_vuchay {
  width:100%;
  border: 1px solid #CCC !important;
  box-shadow:none !important;
}
</style>
    

              <!-- 888888888888888888888888888888**********************************************************1312 -->
        <div class="row" style="width:100%;margin-top: 20px; " id="form_xacnhan_co_khong">
          <div class="table-responsive nhaptram form_xacnhan" >
            <table class="table table-bordered table-striped lg_code">
              <colgroup>
                <col class="col-xs-2 col-sm-3 col-md-4">
                  <col class="col-xs-10 col-sm-9 col-md-8">
                  </colgroup>
                  <thead style="color: white; background-color: red">
                    <tr>
                      <th colspan='2' style='padding:10px 10px; text-align:center; font-size: 20px'>CẢNH BÁO CHÁY RỪNG 
                      </br > Trạm: Bà Nà
                    </th>
                  </tr>
                </thead>
                <tbody style="background-color: #dddfe2" >
                  <tr>
                    <td colspan="2">
                      <div class="row row4" style="width:100%">
                        <form class="form-horizontal" action="" method="post" style="padding-bottom: 60px">
                          <div class="form-group nhap_input">
                            <label class="title_form_wr title_form_cb" >Xác nhận cháy rừng</label>
                            <div class="left_canhbao_form" >
                              <input type="button"  class="btn_xn size_chu" id="co" value="Có" onclick="xacnhan()">
                              <script>
                                function xacnhan(){
                                  document.getElementById("form_dien_bien").style.display = "block";
                                  document.getElementById("form_nhap").style.display = "block";
                                  document.getElementById("form_xacnhan_co_khong").style.display = "none";
                                }
                              </script>
                                
                              </div>
                                <div class="right_canhbao_form">
                                 <input type="button" class="btn_xn size_chu" id="khong" value="Không" onclick="go_home()">
                                <script>
                                  function go_home(){
                                    window.location="/home/status"
                                  }
                                </script>
                                </div>
                               
                                </div>
                              </form>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


        <div class="row" style="width:100%;margin-top: 20px; display:none" id="form_dien_bien">
          <div class="table-responsive nhaptram form_xacnhan">
            <table class="table table-bordered table-striped lg_code">
              <colgroup>
                <col class="col-xs-2 col-sm-3 col-md-4">
                  <col class="col-xs-10 col-sm-9 col-md-8">
                  </colgroup>
                  <thead style="color: white; background-color: red">
                    <tr>
                      <th colspan='2' style='padding:10px 10px; text-align:center; font-size: 20px'>CẢNH BÁO CHÁY RỪNG 
                      </br > Trạm: Bà Nà
                    </th>
                  </tr>
                </thead>
                <tbody style="background-color: #dddfe2" >
                  <tr>
                    <td colspan="2">
                      <div class="row row4" style="width:100%">
                        <form class="form-horizontal" action="" method="post" style="padding-bottom: 60px">
                          <div class="form-group nhap_input">
                            <label class="title_form_wr title_form_cb" >Diễn biến vụ cháy</label>
                            <div class="left_canhbao_form" >
                                <input type="button"  class="btn_xn size_chu" id="khong_db" value="Đã xử lý xong" style="background-color: red">
                              </div>
                                <div class="right_canhbao_form">
                                  <input type="button"  class="btn_xn size_chu" id="xacnhan" value="Xác Nhận" onclick="xacnhac_vuchay()" >
                                  <script>
                                    function xacnhac_vuchay()
                                    {
                                      document.getElementById("sts").value="1";
                                      document.getElementById("smoke_status").value="0";
                                      document.forms['form_action'].submit();
                                      
                                    }
                                  </script>
                                </div>
                               
                                </div>
                              </form>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

             <div class="row" style="width:100%;margin: auto; display:none" id="form_nhap">
    <div class="table-responsive nhaptram form_info" > 
            <table class="table table-bordered table-striped lg_code"> 
                <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
                <thead class='bg_title'> 
                    <tr>
                        <th colspan='2' style='padding:10px 10px; text-align:center; font-size: 20px'>Nhập thông tin vụ cháy</th>  
                    </tr> 
                </thead>
                <tbody> 
                    <?php 
                      $id = "";
                      $xacnhan = "";
                      $huyen = "";
                      $xa = "";
                      $tieukhu = "";
                      $diadanh = "";
                      $toadox = "";
                      $toadoy = "";
                      $thoigian_batdau = "";
                      $thoigian_ketthuc = "";
                      $dientich_rungtunhien = "";
                      $dientich_trong = "";
                      $dientich_khac = "";
                      $dientich_cayco = "";
                      $video = "";
                      $churung = "";
                      $nhiet_do = "";
                      $do_am = "";
                      $luong_mua = "";
                      $huong_gio = "";
                      $cap_dubao = "";
                      $status = "";
                      
                      if($array_thongtin_vuchay)
                      {
                        $id = $array_thongtin_vuchay[0]["vuchays"]["id"];
                        $huyen = $array_thongtin_vuchay[0]["vuchays"]["huyen"];
                        $xa = $array_thongtin_vuchay[0]["vuchays"]["xa"];
                        $tieukhu = $array_thongtin_vuchay[0]["vuchays"]["tieukhu"];
                        $diadanh = $array_thongtin_vuchay[0]["vuchays"]["diadanh"];
                        $toadox = $array_thongtin_vuchay[0]["vuchays"]["toadox"];
                        $toadoy = $array_thongtin_vuchay[0]["vuchays"]["toadoy"];
                        $thoigian_batdau = $array_thongtin_vuchay[0]["vuchays"]["thoigian_batdau"];
                        $thoigian_ketthuc = $array_thongtin_vuchay[0]["vuchays"]["thoigian_ketthuc"];
                        $dientich_rungtunhien = $array_thongtin_vuchay[0]["vuchays"]["dientich_rungtunhien"];
                        $dientich_trong = $array_thongtin_vuchay[0]["vuchays"]["dientich_rungtrong"];
                        $dientich_khac = $array_thongtin_vuchay[0]["vuchays"]["dientich_khac"];
                        $dientich_cayco = $array_thongtin_vuchay[0]["vuchays"]["dientich_cayco"];
                        $churung = $array_thongtin_vuchay[0]["vuchays"]["churung"];
                        $nhiet_do = $array_thongtin_vuchay[0]["vuchays"]["nhiet_do"];
                        $do_am = $array_thongtin_vuchay[0]["vuchays"]["do_am"];
                        $luong_mua = $array_thongtin_vuchay[0]["vuchays"]["luong_mua"];
                        $huong_gio = $array_thongtin_vuchay[0]["vuchays"]["huong_gio"];
                        $cap_dubao = $array_thongtin_vuchay[0]["vuchays"]["cap_dubao"];
                        $status = $array_thongtin_vuchay[0]["vuchays"]["status"];
                      }
                    ?>
                    <tr> 
                        <td colspan="2">
                         <div class="row row4" style="width:100%">
                            <form class="form-horizontal" action="/home/chitiet" method="post" id="form_action">
                            <div class="form-group nhap_input" style="display:none">
                                <label class="col-sm-3 control-label">ID</label>
                                <div class="col-sm-9 " >
                                <input class="input_vuchay" name="data[id]" type="text" value="<?php echo $id;?>">
                                </div>
                              </div>
                              <div class="form-group nhap_input" style="display:none">
                                <label class="col-sm-3 control-label">Xac nhan</label>
                                <div class="col-sm-9 " >
                                <input class="input_vuchay"  name="data[xacnhan]" type="text" value="Có">
                                </div>
                              </div>
                              <div class="form-group nhap_input" style="display:none">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-9 " >
                                <input class="input_vuchay" id="sts" name="data[status]" type="text" value="0">
                                </div>
                              </div>

                              <div class="form-group nhap_input" style="display:none">
                                <label class="col-sm-3 control-label">Status</label>
                                <div class="col-sm-9 " >
                                <input class="input_vuchay" id="smoke_status" name="data[smoke status]" value="1" type="text" >
                                </div>
                              </div>

                              <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Huyện</label>
                                <div class="col-sm-9 " >
                                  <input class="input_vuchay" name="data[huyen]" type="text" value="<?php echo $huyen;?>">
                                </div>
                              </div>

                               <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Xã</label>
                                <div class="col-sm-9 " >
                                  <input class="input_vuchay" name="data[xa]" type="text" value="<?php echo $xa;?>">
                                </div>
                              </div>

                                <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Tiểu khu</label>
                                <div class="col-sm-9 " >
                                    <input class="input_vuchay" name="data[tieukhu]" type="text" value="<?php echo $tieukhu;?>">
                                  
                                </div>
                                </div>
                               <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Địa danh</label>
                                <div class="col-sm-9 " >
                                    <input class="input_vuchay" name="data[diadanh]" type="text" value="<?php echo $diadanh;?>">
                                  
                                </div>
                                </div>
                                <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Tọa độ X</label>
                                <div class="col-sm-9 " >
                                  <input class="input_vuchay" name="data[toadox]" type="text" value="<?php echo $toado_x; ?>">
                                </div>
                              </div>
                               <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Tọa độ Y</label>
                                <div class="col-sm-9 " >
                                  <input class="input_vuchay" name="data[toadoy]" type="text" value="<?php echo $toado_y; ?>">
                                </div>
                              </div>
                                <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Thời điểm kết thúc</label>
                                <div class="col-sm-9 " >
                                <input class="input_vuchay" name="data[thoigian_kethuc]" type="text" value="<?php echo $thoigian_ketthuc;?>">
                                </div>
                                </div>
                                 <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Diện tích cháy rừng tự nhiên</label>
                                <div class="col-sm-9 " >
                                <input class="input_vuchay" name="data[dientich_rungtunhien]" type="text" value="<?php echo $dientich_rungtunhien;?>">
                                </div>
                                </div>
                                <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Diện tích cháy rừng trồng</label>
                                <div class="col-sm-9 " >
                                <input class="input_vuchay" name="data[dientich_rungtrong]" type="text" value="<?php echo $dientich_trong;?>">
                                </div>
                                </div>
                                <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Diện tích cháy các loại khác</label>
                                <div class="col-sm-9 " >
                                <input class="input_vuchay" name="data[dientich_khac]" v type="text" value="<?php echo $dientich_khac;?>">
                                </div>
                                </div>
                              
                                <div class="form-group nhap_input">
                                  <label  class="col-sm-3 control-label">Diện tích cháy cây, bụi cỏ </label>
                                  <div class="col-sm-9 " >
                                    <input class="input_vuchay" name="data[dientich_cayco]" type="text" value="<?php echo $dientich_cayco;?>">
                                  </div>
                                </div>
                                
                                <div class="form-group nhap_input">
                                  <label  class="col-sm-3 control-label">Chủ rừng</label>
                                  <div class="col-sm-9 " >
                                    <input class="input_vuchay" name="data[churung]" type="text" value="<?php echo $churung;?>">
                                  </div>
                                </div>

                                <div class="form-group nhap_input">
                                  <label  class="col-sm-3 control-label">video</label>
                                  <div class="col-sm-9 " >
                                    <input class="input_vuchay" name="data[video]" type="text" value="<?php echo $link_video;?>">
                                  </div>
                                </div>

                                <div class="form-group nhap_input">
                                  <label  class="col-sm-3 control-label">Nhiệt độ</label>
                                  <div class="col-sm-9 " >
                                    <input class="input_vuchay" name="data[nhiet_do]" type="text" value="<?php echo $nhiet_do;?>">
                                  </div>
                                </div>

                                <div class="form-group nhap_input">
                                  <label  class="col-sm-3 control-label">Độ ẩm</label>
                                  <div class="col-sm-9 " >
                                    <input class="input_vuchay" name="data[do_am]" type="text" value="<?php echo $do_am;?>">
                                  </div>
                                </div>

                                <div class="form-group nhap_input">
                                  <label  class="col-sm-3 control-label">Lượng mưa</label>
                                  <div class="col-sm-9 " >
                                    <input class="input_vuchay" name="data[luong_mua]" type="text" value="<?php echo $luong_mua;?>">
                                  </div>
                                </div>

                                <div class="form-group nhap_input">
                                  <label  class="col-sm-3 control-label">Hướng gió</label>
                                  <div class="col-sm-9 " >
                                    <input class="input_vuchay" name="data[huong_gio]" type="text" value="<?php echo $huong_gio;?>">
                                  </div>
                                </div>

                                <div class="row row2 btn_tram" >
                                    <button type="submit" class="btn-table  ui-btn-hidden a_save " id="id_save_tram" >Lưu</button>    
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


</style>