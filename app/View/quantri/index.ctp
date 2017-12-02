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
                          <li style="display: none;">
                            <embed with="0" height="0" src="../audio/canhbao.mp3" autostart="true" loop="true">                  
                          </li>
                 </ul> 
           <h4 class="title_history" >LỊCH SỬ VIDEO GIÁM SÁT</h4>
            <div class="table-responsive font_table" style="border: none;" >
                <div  class='tbl_r' >
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
                          
              <tr>
                <th>1</th>
                              <td class='mid'>Trạm Bà Nà</td>
  
                              <td class='mid'>13/07/2017</td>        
                               <td class='mid'> 13:13:21</td>    
                               <td class='mid'> 20:22:21</td>                   
                               <td>
                                <ul class="pager btn_tt ql_mar" style="float: left">
                                  <li>
                                    <a href="/giamsatchayrung/edit" class="xemvideo">Video</a>
                                  </li>
                                 <li>
                                    <a href="/" class="taixuong">Tải xuống </a>
                                  </li>
                                  
                                </ul>
                                 </td>
              </tr>
                <tr>
                <th>2</th>
                              <td class='mid'>Trạm Liên Chiểu</td>
  
                              <td class='mid'>01/06/2017</td>        
                               <td class='mid'> 13:13:01</td>    
                                    <td class='mid'> 18:23:31</td>                   
                               
                                <td>
                                <ul class="pager btn_tt ql_mar" style="float: left">
                                  <li>
                                    <a href="/giamsatchayrung/edit" class="xemvideo">Video </a>
                                  </li>
                                 <li>
                                    <a href="/"  class="taixuong">Tải xuống </a>
                                  </li>
                                  
                                </ul>
                                 </td>
              </tr>
               <tr>
                <th>3</th>
                              <td class='mid'>Trạm Sơn Trà</td>
  
                              <td class='mid'>21/05/2017</td>        
                               <td class='mid'> 08:22:41</td>    
                                    <td class='mid'> 15:20:01</td>                   
                               
                                <td>
                                <ul class="pager btn_tt ql_mar" style="float: left">
                                  <li>
                                    <a href="/giamsatchayrung/edit" class="xemvideo">Video </a>
                                  </li>
                                 <li>
                                    <a href="/"  class="taixuong">Tải xuống </a>
                                  </li>
                                  
                                </ul>
                                 </td>
              </tr>
               <tr>
                <th>4</th>
                              <td class='mid'>Trạm Bà Nà</td>
  
                              <td class='mid'>12/05/2017</td>        
                               <td class='mid'> 13:11:22</td>    
                                    <td class='mid'> 17:23:30</td>                   
                               
                                <td>
                                <ul class="pager btn_tt ql_mar" style="float: left">
                                  <li>
                                    <a href="/giamsatchayrung/edit" class="xemvideo">Video </a>
                                  </li>
                                 <li>
                                    <a href="/" class="taixuong">Tải xuống </a>
                                  </li>
                                  
                                </ul>
                                 </td>
              </tr>
              </tbody>
            </table>
          
          </div>
          
       </div>
       
<style type="text/css">
  
</style>