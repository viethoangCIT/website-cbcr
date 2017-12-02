<h4 style="color: #2f83b7;text-align: center; width: 100% ;  margin-bottom: 9px; margin-top: 20px; font-size: 19px; font-weight: bold;  ">QUẢN LÝ NGƯỜI DÙNG</h4>
  <form action="  " method="get" id="form_timkiem">
        <div class="row tram_quanlytram" style="margin-left:0px; margin-right:0px">
            <div class='loaixe tram_quanlytram' style="width:30%; margin-right:41px !important">
                
             
                <div class='clear'></div>
            </div>
        </div>
    </form>
                   
    

    <div class="row" style="width:100%;margin: auto;">
    <div class="table-responsive nhaptram" style="width: 96%;margin: auto;"> 
            <table class="table table-bordered table-striped lg_code"> 
                <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
                <thead class='bg_title'> 
                    <tr> 
                       
                        <th colspan='2' style='padding:10px 10px; text-align:center; font-size: 20px'>Nhập thông tin người dùng</th>  
                    </tr> 
                </thead>
                <tbody> 
                    <tr> 
                        <td colspan="2">
                         <div class="row row4" style="width:100%">
                            <form class="form-horizontal" action="" method="post">
                              
                               <div class="form-group nhap_input">
                                <label class="col-sm-3 control-label">Tên người dùng</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="">
                                </div>
                              </div>
                               <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Địa chỉ</label>
                                <div class="col-sm-9 " >
                                  <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="">
                                </div>
                              </div>
                                <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Số điện thoại</label>
                                <div class="col-sm-9 " >
                                    <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="">
                                  
                                </div>
                                </div>
                               <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9 " >
                                    <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="">
                                  
                                </div>
                                </div>
                                <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Chức vụ</label>
                                <div class="col-sm-9 " >
                                     <select id="selectError3" name="Gioitinh" class="form-control">                                              
                                          <option>Kế toán</option>
                                          <option>Trưởng phòng</option>           
                                          <option>Nhân viên</option>    
                                  </select>  
                                  
                                  
                                </div>
                                </div>
                                <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Quyền người dùng</label>
                                <div class="col-sm-9 " >                      
                                  <select id="selectError3" name="Gioitinh" class="form-control">                                              
                                          <option>Quyền quản trị</option>
                                          <option>Quyền sử dụng</option>           
                    
                                  </select>                    
                                </div>
                                </div>
                               <input value="" name="data[cambien][id]" type="hidden" >
                             
                                <div class="row row2" style="margin-left:50%; width:30%">
                                    <button type="submit" class="btn-table btn_icon_sua ui-btn-hidden" style="float:left;background-position: 9px center;width:90px;color:white">Lưu</button>
                                   <a href="" style="float:left;background-position: 9px center;width:90px;color:white;margin-left:30px" class="btn-table btn_icon_xoa ui-btn-hidden nut_huy">
                                        <span style="padding-left:25px;">Hủy</span>
                                   </a>     
                                </div>
                            </form>
                        </div>
                        </td>
                    </tr>
                </tbody> 
            </table>
    </div>
</div>
 <h4 style="color: #2f83b7;text-align: center; width: 100% ;  margin-bottom: 9px; margin-top: 20px; font-size: 19px; font-weight: bold;  ">DANH SÁCH NGƯỜI DÙNG</h4>
                    <div style="width:100%;text-align:right; padding-right:15px" class="them_dulieu">
                    <!--  <a href="nhap.html" style="font-size:16px; font-weight:bold">Thêm</a><br /> -->
                    </div>
          <div class="table-responsive font_table" > 
            <div  class='tbl_r'>
                
            
            <table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>
            
              <thead>
              <tr class='v_mid'>
                <th  width='5%'>STT</th>
                               <th   width='10%'>Tên người dùng</th>
                               <th   width='10%'>Địa chỉ</th>
                               <th  width='10%'>Email</th>
                               <th  width='10%'>Số điện thoại</th>
                <th width='10%'>Chức vụ</th>
                <th width='15%'>Nhóm</th>
                <th  width='20%'>Sửa/Xóa</th>
                              
              </tr>
              </thead>
              <tbody class='body_mid'>
                          
              <tr>
                <th>1</th>
                              <td class='mid'>Trạm Cơ khí</td>
                              <td class='mid'>21 Lê Duẩn</td>
                              <td class='mid'>Đây là mô tả</td>
                                <td >192.291</td>
                                <td >192.291</td>
                                <td >192.291</td>
                 <td>
                                 <ul class="pager btn_tt ql_mar">
                                
                                  <li class="tuychon_sua" style="margin-right:20px"><a href="" class='btn_sua' style="width:82px;margin-bottom: 4px;">Sửa&nbsp; </a></li>
                                    <li class="tuychon_xoa"><a href="" class='btn_xoa'  style="width:82px">Xóa &nbsp;</a></li>
                                 </ul>
                                
                                 </td>
                                 
              </tr>
            
               <tr>
               <th colspan="8">Không có dữ liệu</th> 
              </tr>
             
              </tbody>
            </table>
          
          </div>
          
        </div>
        <div class='dieuhuong_trang'>
          <nav aria-label="Page navigation ">
            <ul class="pagination">
                  <li>  
                        <a href="" currentlink="1" class="ui-link"> Trang1  </a>      

                    </li>
                    <li>  
                        <a href="" currentlink="1" class="ui-link"> Trang2  </a>      

                    </li>
                                        <li>  
                        <a href="" currentlink="1" class="ui-link"> Trang3  </a>      

                    </li>
             
          </ul>
          </nav>
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