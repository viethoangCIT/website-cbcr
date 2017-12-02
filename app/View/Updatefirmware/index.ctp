		
<h2 class='title_page'>Update Firmware</h2>
    <div class="row" style="width:100%;margin: auto;">
    <div class="table-responsive" style="width: 800px;margin: auto;"> 
            <table class="table table-bordered table-striped lg_code"> 
                <colgroup> <col class="col-xs-2 col-sm-3 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 
                <thead class='bg_title'> 
                    <tr> 
                        <th colspan='2' style='padding:13px 10px;'>THÔNG TIN TRẠM</th> 
                    </tr> 
                </thead>
                <tbody> 
                    <tr> 
                        <td colspan="2">
                         <div class="row" style="width:100%">
                            <form class="form-horizontal" action="<?php echo $this->webroot; ?>updatefirmware.html" method="post">
                              
                              <div class="form-group">
                                <label  class="col-sm-3 control-label">Dữ liệu</label>
                                <div class="col-sm-9 " >
                                    <textarea rows="20" class="form-control" style="width:100%;border: 1px solid #CCC !important;border-radius:0px" name="data"></textarea>
                                  
                                </div>
                              </div>
                              
                              <div class="form-group">
                                <label  class="col-sm-3 control-label"></label>
                                <div class="col-sm-9 " >
                                <button type="submit" class="btn-table btn_icon_sua ui-btn-hidden" style="float:left;background-position: 9px center;width:90px;color:white">Lưu</button>
                                <button type="submit" class="btn-table btn_icon_xoa ui-btn-hidden" style="float:left;background-position: 9px center;width:90px;color:white;margin-left:10px">Hủy</button>
                                   
                                </div>
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
<?php echo $this->element('sql_dump');?>

<script>
document.getElementById('quanlytram').className='active2';	
</script>				
			