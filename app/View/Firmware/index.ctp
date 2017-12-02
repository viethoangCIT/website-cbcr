<?php ?>
<script type="text/javascript" src="<?php echo $this->webroot;?>js/plupload/plupload.full.min.js"></script>

<!-- Thanh menu -->
<ul class="nav navbar-nav menu_trang_quantri" id="destop" style="width:100%; background-color: #2f83b7; margin-top: 10px;">

   <li  class="li_menu" >
    <a href="<?php echo $this->webroot;?>tram" class="menuquantri" id="trangchu"  >Quản lý trạm</a>
  </li>
  <li  class="li_menu">
    <a href="<?php echo $this->webroot; ?>nguoidung/index" class="menuquantri"   >Quản lý người dùng</a>
  </li>
  <li  class="li_menu">
    <a href="<?php echo $this->webroot; ?>chukimoitruong" class="menuquantri_1" id="quanly">Quản lý chu kì cập nhật thông số môi trường</a>
  </li>
  <li class="li_menu">
    <a href="<?php echo $this->webroot; ?>nhom"  class="menuquantri" id="quanlynhom" style="height: 100%;    padding-top: 25px;">Quản lý nhóm chữa cháy</a>
  </li>
  <li  class="li_menu">
    <a href="<?php echo $this->webroot; ?>Firmware" class="menuquantri" id="bando" style="height: 100%;    padding-top: 25px;    padding-top: 25px;" >Quản lý Firmware</a>
  </li>

</ul>



<ul class="nav navbar-nav menu_trang_quantri_mobile" id="mobile" style="width:100%; background-color: #2f83b7; margin-top: 10px;">

 <li  class="li_menu" ><a href="<?php echo $this->webroot;?>tram" class="menuquantri" id="trangchu"  >Quản lý trạm</a></li>
 <li  class="li_menu">
  <a href="<?php echo $this->webroot; ?>nguoidung/index" class="menuquantri"   >Quản lý người dùng</a>
</li>
<li  class="li_menu"><a href="<?php echo $this->webroot; ?>chukimoitruong" class="menuquantri_1" id="quanly">Quản lý chu kì cập nhật thông số môi trường</a></li>
<li class="li_menu"><a href="<?php echo $this->webroot; ?>nhom"  class="menuquantri" id="quanlynhom" style="height: 100%;    padding-top: 25px;">Quản lý nhóm chữa cháy</a></li>
<li  class="li_menu"><a href="<?php echo $this->webroot; ?>Firmware" class="menuquantri" id="bando" style="height: 100%;    padding-top: 25px;    padding-top: 25px;" >Quản lý Firmware</a></li>

</ul> 

<!-- end Thanh menu -->

<!-- Phần main -->
  <!-- Phần tiêu đề -->
<h4 style="color: #2f83b7;text-align: center; width: 100% ;  margin-bottom: 9px; margin-top: 100px; font-size: 19px; font-weight: bold;  " class="title_history">QUẢN LÝ FIRMWARE</h4>

<form action="  " method="get" id="form_timkiem">
  <div class="row tram_quanlytram" style="margin-left:0px; margin-right:0px">
    <div class='loaixe tram_quanlytram' style="width:30%; margin-right:41px !important">


      <div class='clear'></div>
    </div>
  </div>
</form>
<!--  end Phần tiêu đề -->

<!-- Phần form nhập dữ liệu-->
<div class="row" style="width:100%;margin: auto;">
  <div class="table-responsive nhaptram" style="width: 100%;margin: auto;"> 
    <table class="table table-bordered table-striped lg_code"> 
      <colgroup> <col class="col-xs-2 col-sm-2 col-md-4"> <col class="col-xs-10 col-sm-9 col-md-8"> </colgroup> 

      <thead class='bg_title'> 
        <tr> 
         <th class="input_firmware" colspan='2' style=''>Nhập thông tin firmware</th>  
       </tr> 
      </thead>

      <?php 

          $id = "";
          $name = "";
          $version = "";
          $created = "";
          $date = "";
          $desc = "";
          $file = "";
          $status = "";
          // print_r($array_edit_firmware);

          if( $array_edit_firmware != NULL){

            
            
            $id = $array_edit_firmware[0]["Firmware"]["id"];
            $name = $array_edit_firmware[0]["Firmware"]["name"];
            $version = $array_edit_firmware[0]["Firmware"]["version"];
            $date = $array_edit_firmware[0]["Firmware"]["date"];
            $status = $array_edit_firmware[0]["Firmware"]["status"];
            // đổi giá trị ngày y-m-d sang d-m-y
            $date = date("d-m-Y", strtotime($date));
            $desc = $array_edit_firmware[0]["Firmware"]["desc"];
            $file = $array_edit_firmware[0]["Firmware"]["file"];
          }

          // echo "name".$name;
       ?>
     
      <!-- form nhập -->
      <tbody> 
        <tr> 
          <td colspan="2">
            <div class="row row4" style="width:100%">
              <form class="form-horizontal" id="form_nhap" action="/Firmware/index " method="post">

                <div class="form-group nhap_input">
                  <label class="col-sm-2 control-label">Tên fimware</label>
                  <div class="col-sm-9 " >
                    <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value= "<?php echo $name; ?>" name = "data[Firmware][name]" >
                    <input class="form-control" type="hidden" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $id; ?>" name = "data[Firmware][id]" >
                  </div>
                </div>
                <div class="form-group nhap_input">
                  <label  class="col-sm-2 control-label">Phiên bản</label>
                  <div class="col-sm-9 " >
                    <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $version; ?>" name = "data[Firmware][version]">
                  </div>
                </div>
                <div class="form-group nhap_input">
                  <label  class="col-sm-2 control-label">Ngày</label>
                  <div class="col-sm-9 " >
                    <input class="form-control " id="ngay" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $date; ?>" name = "data[Firmware][date]">

                  </div>
                </div>


                <div class="form-group nhap_input">
                  <label  class="col-sm-2 control-label">Mô tả</label>
                  <div class="col-sm-9 " >                      
                    <textarea class="form-control" style="width:100%;border: 1px solid #CCC !important;border-radius:0px" name="data[Firmware][desc]"><?php echo $desc; ?></textarea>                 
                  </div>
                </div>
                 <div class="form-group nhap_input">
                  <label  class="col-sm-2 control-label">Trạng thái</label>
                  <div class="col-sm-9 " >
                  <select name="data[Firmware][status]" style="width: 16%;">
                      <option value="1" <?php if($status == 1) echo "selected"; ?>> Kích hoạt</option>
                      <option value="0" <?php if($status == 0) echo "selected"; ?>> Khóa</option>
                  </select>
                    

                  </div>
                </div>

                <div class="form-group nhap_input">
                  <label  class="col-sm-2 control-label">File</label>
                  <div class="col-sm-9 " >
                    <input class="form-control tep_file" type="text"  style="width:100%;border: 1px solid #CCC !important"  id="file" value="<?php echo $file; ?>"  name = "data[Firmware][file]">

                    <!-- BEGIN: UPLOAD FILE-->

                    <div id="filelist">Your browser doesn't have Flash, Silverlight or HTML5 support.</div>
                    <br />

                    <div id="container">
                    <a href="javascript:;"  id="pickfiles" >Chọn file</a>
                      <a href="javascript:;" id="uploadfiles" >Tải lên</a>
                    </div>

                    <!-- END: UPLOAD FILE-->
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
      <!-- end form nhập -->
    </table>
  </div>
</div>

<!--  end Phần form nhâp -->

<!-- Phần danh sách -->

<h4 style="color: #2f83b7;text-align: center; width: 100% ;  margin-bottom: 9px; margin-top: 20px; font-size: 19px; font-weight: bold;  ">DANH SÁCH FIRMWARE</h4>
<div style="width:100%;text-align:right; padding-right:15px" class="them_dulieu">
  <!--  <a href="nhap.html" style="font-size:16px; font-weight:bold">Thêm</a><br /> -->
</div>
<div class="table-responsive font_table" > 
  <div  class='tbl_r'>


    <table id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>


      <thead>
        <tr class='v_mid' style="width: 100%">
          <th  width='3%'>STT</th>
          <th   width='15%'>Tên Firmware</th>
          <th   width='10%'>Phiên bản</th>
          <th  width='10%'>Ngày tạo</th>
          <th  width='10%'>Trạng thái</th>
          <th  width='7%'>Chức năng</th>
          <th  width='4%'>Dowload</th> 
         <!--  <th  width='4%'>Dữ liệu </th> -->             
        </tr>
      </thead>
      <tbody class='body_mid'>

        <?php 
        $stt = 0;
        

        foreach ($array_firmware as $firmware)
        {

          $stt++;
          $id = $firmware["Firmware"]["id"];
          $status = $firmware["Firmware"]["status"];
          if($status == 1){
            $trangthai = "Kích hoạt";
          }
          else{$trangthai = "Khóa";}
     
          ?>
          <tr>
            <th><?php echo  $stt; ?></th>

            <td class='mid'><?php echo $firmware["Firmware"]["name"]; ?></td>
            <td class='mid'><?php echo $firmware["Firmware"]["version"]; ?></td>
            <td class='mid'><?php echo $firmware["Firmware"]["date"]; ?></td>
            <td class='mid'><?php echo $trangthai; ?></td>
            <td class='mid'>
              <div class="row row2 btn_tram" >

                <button  class="btn-table  ui-btn-hidden a_save " id="id_sua_tram" onclick="window.location.href = '/Firmware/index/'+ <?php echo $id; ?>"/>Sửa</button>
                 <br/>
                <button class=" btn-table  ui-btn-hidden a_huy  " id="id_xoa_tram" onclick="window.location.href = '/Firmware/del/'+ <?php echo $id; ?>" /> Xóa</button>   
              </div>

            </td>
            <td class= 'mid'> 
              <ul class="pager btn_tt ql_mar" >
                <li class="download">
                  <a href="/files/<?php echo $firmware["Firmware"]["file"];?>"  style="">Tải xuống&nbsp; </a>
                </li>
              </ul>
            </td>
            <!-- <td class= 'mid'> 
              <ul class="pager btn_tt ql_mar" >
                <li class="download">
                  <a href="/giamsatmoitruong/excel"  style="">Tải dữ liệu xuống&nbsp; </a>
                </li>
              </ul>
            </td> -->
          </tr>
          <?php } ?>
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
<script type="text/javascript">
 $( function() {
  $( "#ngay" ).datepicker({dateFormat: "dd-mm-yy"});
} );
</script>
<script>
  function SubmitForm()
  {
    document.getElementById("form_timkiem").submit(); 
  }
  document.getElementById('quanlychiso').className='active2'; 
</script>  
<script>
function huy() {
    document.getElementById("form_nhap").reset();
}
</script>    
<script type="text/javascript">
// Custom example logic

var uploader = new plupload.Uploader({
  runtimes : 'html5,flash,silverlight,html4',
  browse_button : 'pickfiles', // you can pass an id...
  container: document.getElementById('container'), // ... or DOM Element itself
  url : '<?php echo $this->webroot;?>upload.php',
  flash_swf_url : '../js/Moxie.swf',
  silverlight_xap_url : '../js/Moxie.xap',
  
  filters : {
    max_file_size : '10mb',
    mime_types: [
      {title : "Image files", extensions : "jpg,gif,png"},
      {title : "Zip files", extensions : "zip"},
      {title : "Xls files", extensions : "xls"},
      {title : "Bin files", extensions : "bin"},
      {title : "Doc files", extensions : "doc,docx"}
    ]
  },

  init: {
    PostInit: function() {
      document.getElementById('filelist').innerHTML = '';

      document.getElementById('uploadfiles').onclick = function() {
        uploader.start();
        return false;
      };
    },

    FilesAdded: function(up, files) {
      plupload.each(files, function(file) {
        document.getElementById('filelist').innerHTML += '<div id="' + file.id + '">' + ' (' + plupload.formatSize(file.size) + ') <b></b></div>';
        
      });
    },

    UploadProgress: function(up, file) {
      document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";
      //document.getElementById('file').value = file.name;
      //document.getElementById('img_hienthi').src = "files/" + file.name;
    },


    fileUploaded: function(up, file,info) 
    {
      var res = info.response;
       document.getElementById('file').value = res;
    },

    Error: function(up, err) {
      //document.getElementById('console').appendChild(document.createTextNode("\nError #" + err.code + ": " + err.message));
    }
    //document.getElementById('img_up').value = file.name;
  }
});

uploader.init();
</script>              