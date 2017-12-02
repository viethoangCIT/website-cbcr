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
<h4 style="color: #2f83b7;text-align: center; width: 100% ;  margin-bottom: 9px; margin-top: 100px; font-size: 19px; font-weight: bold;  " class="title_history">QUẢN LÝ FIRMWARE</h4>
  <form action="  " method="get" id="form_timkiem">
        <div class="row tram_quanlytram" style="margin-left:0px; margin-right:0px">
            <div class='loaixe tram_quanlytram' style="width:30%; margin-right:41px !important">
                
             
                <div class='clear'></div>
            </div>
        </div>
    </form>
                   
    

    <div class="row" style="width:100%;margin: auto;">
    <div class="table-responsive nhaptram" style="width: 100%;margin: auto;"> 
            <table class="table table-bordered table-striped lg_code"> 
                <colgroup> <col class="col-xs-2 col-sm-2 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
                <thead class='bg_title'> 
                    <tr> 
                         <th class="input_firmware" colspan='2' style=''>Nhập thông tin firmware</th>  
                    </tr> 
                </thead>
                <tbody> 
                    <tr> 
                        <td colspan="2">
                         <div class="row row4" style="width:100%">
                            <form class="form-horizontal" action="" method="post">
                              
                               <div class="form-group nhap_input">
                                <label class="col-sm-2 control-label">Tên fimware</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="">
                                </div>
                              </div>
                               <div class="form-group nhap_input">
                                <label  class="col-sm-2 control-label">Phiên bản</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="">
                                </div>
                              </div>
                                <div class="form-group nhap_input">
                                <label  class="col-sm-2 control-label">Ngày</label>
                                <div class="col-sm-9 " >
                                    <input class="form-control " type="date" style="width:100%;border: 1px solid #CCC !important"  value="">
                                  
                                </div>
                                </div>
                               
                                
                                <div class="form-group nhap_input">
                                <label  class="col-sm-2 control-label">Mô tả</label>
                                <div class="col-sm-9 " >                      
                                  <textarea class="form-control" style="width:100%;border: 1px solid #CCC !important;border-radius:0px" name="data[cambien][mota]"></textarea>                 
                                </div>
                                </div>
                                <div class="form-group nhap_input">
                                <label  class="col-sm-2 control-label">File</label>
                                <div class="col-sm-9 " >
                                    <input class="form-control tep_file" type="file"  style="width:100%;border: 1px solid #CCC !important"  value="">
                                  
                                </div>
                                </div>
                               <input value="" name="data[cambien][id]" type="hidden" >
                             
                               <div class="row row2 btn_tram" >
                                    <a type="submit" class="btn-table  ui-btn-hidden a_save " id="id_save_tram" href="" >Lưu</a>
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
 <h4 style="color: #2f83b7;text-align: center; width: 100% ;  margin-bottom: 9px; margin-top: 20px; font-size: 19px; font-weight: bold;  ">DANH SÁCH FIRMWARE</h4>
                    <div style="width:100%;text-align:right; padding-right:15px" class="them_dulieu">
                    <!--  <a href="nhap.html" style="font-size:16px; font-weight:bold">Thêm</a><br /> -->
                    </div>
          <div class="table-responsive font_table" > 
            <div  class='tbl_r'>
                
            
            <table id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>
            
              <thead>
              <tr class='v_mid' style="width: 100%">
                <th  width='15%'>STT</th>
               <th   width='20%'>Tên Firmware</th>
               <th   width='20%'>Phiên bản</th>
               <th  width='25%'>Ngày tạo</th>
               <th  width='1%'>Dowload</th>                  
              </tr>
              </thead>
              <tbody class='body_mid'>
                          
              <tr>
                <th>1</th>
                              <td class='mid'>Fimrware 1</td>
                              <td class='mid'>7.25</td>
                              <td class='mid'>21/02/2017</td>
                                <td class= 'mid'> <ul class="pager btn_tt ql_mar" style="float: left">
                                 
                                <ul class="pager btn_tt ql_mar" style="float: left">
                                  
                                    
                                 <li>
                                    <a href="/giamsatchayrung/edit"  style="float: left;
                                      background-image: url(../img/icon/btn_download.png);
                                      background-repeat: no-repeat;
                                      background-position: 3px center;
                                      padding-left: 14px;
                                      background-color: #2f83b7 !important;
                                      background-size: 11px;
                                      width: 82px;
                                      font-size: 11px;">Tải xuống&nbsp; </a>
                                  </li>
                                 
                                 </td>
              
                                 
              </tr>
              <tr>
                <th>2</th>
                              <td class='mid'>Fimrware 2</td>
                              <td class='mid'>7.00</td>
                              <td class='mid'>19/01/2017</td>
                               <td class= 'mid'> <ul class="pager btn_tt ql_mar" style="float: left">
                                 
                                <ul class="pager btn_tt ql_mar" style="float: left">
                                  
                                    
                                 <li>
                                    <a href="/giamsatchayrung/edit"  style="float: left;
                                      background-image: url(../img/icon/btn_download.png);
                                      background-repeat: no-repeat;
                                      background-position: 3px center;
                                      padding-left: 14px;
                                      background-color: #2f83b7 !important;
                                      background-size: 11px;
                                      width: 82px;
                                      font-size: 11px;">Tải xuống&nbsp; </a>
                                  </li>
                                 
                                 </td>
              
                                 
              </tr>
               <th>3</th>
                              <td class='mid'>Fimrware 2</td>
                              <td class='mid'>6.75</td>
                              <td class='mid'>22/12/2016</td>
                                 <td class= 'mid'> <ul class="pager btn_tt ql_mar" style="float: left">
                                 
                                <ul class="pager btn_tt ql_mar" style="float: left">
                                  
                                    
                                 <li>
                                    <a href="/giamsatchayrung/edit"  style="float: left;
                                      background-image: url(../img/icon/btn_download.png);
                                      background-repeat: no-repeat;
                                      background-position: 3px center;
                                      padding-left: 14px;
                                      background-color: #2f83b7 !important;
                                      background-size: 11px;
                                      width: 82px;
                                      font-size: 11px;">Tải xuống&nbsp; </a>
                                  </li>
                                 
                                 </td>
              
                                 
              </tr>
            
              
             
              </tbody>
            </table>
          
          </div>
          
        </div>
        <div class='dieuhuong_trang'>
          
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