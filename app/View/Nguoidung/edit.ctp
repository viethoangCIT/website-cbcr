<h4 style="color: #2f83b7;text-align: center; width: 100% ;  margin-bottom: 9px; margin-top: 20px; font-size: 19px; font-weight: bold;  ">CẬP NHẬT NGƯỜI DÙNG</h4>
  <form action="  " method="get" id="form_timkiem">
        <div class="row tram_quanlytram" style="margin-left:0px; margin-right:0px">
            <div class='loaixe tram_quanlytram' style="width:30%; margin-right:41px !important">
                
             
                <div class='clear'></div>
            </div>
        </div>
    </form>
                   
    

    <div class="row" style="width:100%;margin: auto;">
    <div class="table-responsive nhaptram" style="width: 800px;margin: auto;"> 
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
                                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="">
                                </div>
                                </div>
                                <div class="form-group nhap_input">
                                <label  class="col-sm-3 control-label">Quyền người dùng</label>
                                <div class="col-sm-9 " >                      
                                  <select id="selectError3" name="Gioitinh" class="form-control">                                              
                                          <option>Quyền quản trị</option>
                                          <option>Quyền chức năng</option> 
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