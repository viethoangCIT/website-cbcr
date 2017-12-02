<?php 
            if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
            {
          ?>
<style>
              .manager li{

                float:left;
              

              }
              .manager li a{
                text-align: center;
                  
              }
              .manager li a:hover{
                
              }
              .menuquantri{
                color: white;
                font-weight: bold;

              }
              #chucnang-sua{
                background-image: url(../img/icon/edit_icon.png);
                background-repeat: no-repeat;
                background-position: 18px center;
                padding-left: 22px;
                background-color: #2f83b7 !important;
                background-size: 11px;
                width: 80px;
                font-size: 11px;margin-left: 15px;
              }
              #chucnang-xoa{
                background-image: url(../img/icon/detele_icon.png));
                background-repeat: no-repeat;
                background-position: 18px center;
                padding-left: 22px;
                background-color: #ff631d !important;
                background-size: 11px;
                width: 80px;
                font-size: 11px;margin-left: 15px;
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
                            <li style="display: none;">
                              <embed with="0" height="0" src="../audio/canhbao.mp3" autostart="true" loop="true">                  
                            </li>
                  </ul> 
  <h4 style="color: #2f83b7;text-align: center; width: 100% ;  margin-bottom: 9px; margin-top: 100px; font-size: 19px; font-weight: bold;  " class="title_history">QUẢN LÝ TRẠM</h4>
    <form action="	" method="get" id="form_timkiem">
          <div class="row tram_quanlytram" style="margin-left:0px; margin-right:0px">
              <div class='loaixe tram_quanlytram' style="width:30%; margin-right:41px !important">
                  
              
                  <div class='clear'></div>
              </div>
          </div>
      </form>
      
      <?php
        $id = "";
        $thongtin_tram = "";
        $name = "";
        $phone = "";
        $diachi = "";
        $desc = "";
        $toado = "";
        if($array_edit_tram){
          $id = $array_edit_tram[0]["Tram"]["id"];
          $thongtin_tram = $array_edit_tram[0]["Tram"]["thongtin_tram"];
          $name = $array_edit_tram[0]["Tram"]["name"];
          $phone = $array_edit_tram[0]["Tram"]["phone"];
          $diachi = $array_edit_tram[0]["Tram"]["diachi"];
          $desc = $array_edit_tram[0]["Tram"]["desc"];
          $toado = $array_edit_tram[0]["Tram"]["toado"];
        }

      ?>

      <div class="row" style="width:100%;margin: auto;">
      <div class="table-responsive nhaptram" style="width: 100%;margin: auto;"> 
              <table class="table table-bordered table-striped lg_code"> 
                  <colgroup> <col class="col-xs-2 col-sm-2 col-md-4"> <col class="col-xs-10 col-sm-10 col-md-8"> </colgroup> 
                  <thead class='bg_title'> 
                      <tr> 
                          <th colspan='2' style='padding:10px 10px; text-align:center; font-size: 20px'>Nhập thông tin trạm</th> 
                      </tr> 
                  </thead>
                  <tbody> 
                      <tr> 
                          <td colspan="2">
                          <div class="row row4" style="width:100%">
                              <form class="form-horizontal" action="/tram/index" method="post">
                                <div class="form-group nhap_input">
                                  <label class="col-sm-2 control-label ">Thông tin trạm</label>
                                  <div class="col-sm-10 " >
                                    <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" name="data[Tram][thongtin_tram]" value="<?php echo $thongtin_tram;?>">
                                  </div>
                                </div>
                                <div class="form-group nhap_input">
                                  <label class="col-sm-2 control-label">Tên trạm</label>
                                  <div class="col-sm-10 " >
                                    <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" name="data[Tram][name]" value="<?php echo $name;?>">
                                  </div>
                                </div>
                                <div class="form-group nhap_input">
                                  <label class="col-sm-2 control-label">Số điện thoại</label>
                                  <div class="col-sm-10 " >
                                    <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" name="data[Tram][phone]" value="<?php echo $phone;?>">
                                  </div>
                                </div>
                                <div class="form-group nhap_input">
                                  <label  class="col-sm-2 control-label">Địa chỉ</label>
                                  <div class="col-sm-10 " >
                                    <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  name="data[Tram][diachi]" value="<?php echo $diachi;?>">
                                  </div>
                                </div>
                                  <div class="form-group nhap_input">
                                  <label  class="col-sm-2 control-label">Mô tả</label>
                                  <div class="col-sm-10 " >
                                      <textarea class="form-control" style="width:100%;border: 1px solid #CCC !important;border-radius:0px" name="data[Tram][desc]" value="<?php echo $desc;?>"></textarea>
                                    
                                  </div>
                                  </div>
                                <div class="form-group nhap_input">
                                  <label  class="col-sm-2 control-label">Tọa độ</label>
                                  <div class="col-sm-10 " >
                                      <textarea class="form-control" style="width:100%;border: 1px solid #CCC !important;border-radius:0px" name="data[Tram][toado]" value="<?php echo $toado;?>"></textarea>
                                    
                                  </div>
                                  </div>
                                  <input value="<?php echo $id?>" name="data[Tram][id]" type="hidden" >

                                  <div class="row row2 btn_tram" >
                                      <input type="submit" class="btn-table  ui-btn-hidden a_save " id="id_save_tram" value="Lưu"/>
                                    <a href="" class=" btn-table  ui-btn-hidden a_huy  " id="id_huy_tram">Hủy</a>     
                                  </div>
                              </form>
                          </div>
                          </td>
                      </tr>
                  </tbody> 
              </table>
      </div>
  </div>
  <h4 style="color: #2f83b7;text-align: center; width: 100% ;  margin-bottom: 9px; margin-top: 70px; font-size: 19px; font-weight: bold;  ">DANH SÁCH TRẠM</h4>
                      <div style="width:100%;text-align:right; padding-right:15px" class="them_dulieu">
                      <!--  <a href="nhap.html" style="font-size:16px; font-weight:bold">Thêm</a><br /> -->
                      </div>
            <div class="table-responsive font_table"  style="border: none!important;"> 
              <div  class='tbl_r' id="tbr_tram">
                  
              
              <table id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>
              
                <thead>
                <tr class='v_mid'>
                  <th   style="width: 1%">STT</th>
                                <th   style="width: 7%">Tên trạm</th>
                                <th    style="width: 10%">Địa chỉ</th>
                                <th   style="width: 10%">Mô tả</th>
                  <th style="width: 6%">Tọa độ</th>
                  
                  <th style="width: 1%">Chức năng</th>
                                
                </tr>
                </thead>
                <tbody class='body_mid'> 
                <?php
                  $stt = 0;
                  
                    foreach ($array_tram as $tram)
                    {
                  
                      $stt++;
                      $id = $tram["Tram"]["id"];
                ?> 
                <tr>
                  <th><?php echo $stt;?></th>
                  <td class='mid'><?php echo $tram["Tram"]["name"];?></td>
                  <td class='mid'><?php echo $tram["Tram"]["diachi"];?></td>
                  <td class='mid'><?php echo $tram["Tram"]["desc"];?></td>
                  <td class='mid'><?php echo $tram["Tram"]["toado"];?></td>
                  <td class='mid'>
                    <div class="row row2 btn_tram" >

                    <button  class="btn-table  ui-btn-hidden a_save xoa" id="id_sua_tram" onclick="window.location.href = '/tram/index/'+ <?php echo $id; ?>"/>Sửa</button>
                    <br/>
                   <button class=" btn-table  ui-btn-hidden a_huy  " id="id_xoa_tram" onclick="window.location.href = '/tram/del/'+ <?php echo $id; ?>" /> Xóa</button>  
                    </div>
                  </td>
                </tr>
                <?php } ?>
                </tbody>
              </table>
            
            </div>
            
          </div>
            </div>
          </div>

      
  <script>
    document.getElementById('quanlychiso').className='active2';	
    
  </script>				
        
  <script>
    function SubmitForm()
    {
      document.getElementById("form_timkiem").submit();	
    }
    document.getElementById('quanlychiso').className='active2';	
  </script> 
  <?php }?>                