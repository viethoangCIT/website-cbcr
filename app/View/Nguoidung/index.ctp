<?php 
if($this->Session->read('id_phanquyen') == "1" )
  {
?>
<!-- Thanh menu -->
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

</ul> 

<!-- end Thanh menu -->

<!-- Phần main -->
  <!-- Phần tiêu đề -->
<h4 style="color: #2f83b7;text-align: center; width: 100% ;  margin-bottom: 9px; margin-top: 100px; font-size: 19px; font-weight: bold;  " class="title_history">QUẢN LÝ NGƯỜI DÙNG</h4>
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

          <th colspan='2' class="input_info">Nhập thông tin người dùng</th>  
        </tr> 
      </thead>

      <?php 

          $id = "";
          $name = "";
          $username ="";
          $password = "";
          $diachi = "";
          $phone = "";
          $email = "";
          $position = "";
          $id_phanquyen = "";
          // print_r($array_edit_user);

          if( $array_edit_user != NULL){
 
            $id = $array_edit_user[0]["User"]["id"];
            $name = $array_edit_user[0]["User"]["name"];
            $username =$array_edit_user[0]["User"]["username"];
            $password = $array_edit_user[0]["User"]["password"];
            $diachi = $array_edit_user[0]["User"]["diachi"];
            $phone = $array_edit_user[0]["User"]["phone"];
            $email = $array_edit_user[0]["User"]["email"];
            $position = $array_edit_user[0]["User"]["position"];
            $id_phanquyen = $array_edit_user[0]["User"]["id_phanquyen"];
          }

          // echo "name".$name;
       ?>
      <!-- form nhập -->
      <tbody> 
        <tr> 
          <td colspan="2">
           <div class="row row4" style="width:100%">
            <form class="form-horizontal" id="form_nhap" action="/nguoidung/index " method="post">

             <div class="form-group nhap_input">
              <label class="col-sm-2 control-label">Tên người dùng</label>
              <div class="col-sm-9 " >
                <input class="form-control" id="fullname" type="text" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $name; ?>" name = "data[User][name]">
                <input class="form-control" type="hidden" style="width:100%;border: 1px solid #CCC !important;box-shadow:none !important" value="<?php echo $id; ?>" name = "data[User][id]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-2 control-label">Địa chỉ</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $diachi; ?>" name = "data[User][diachi]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-2 control-label">Số điện thoại</label>
              <div class="col-sm-9 " >
                <input class="form-control" id="phone" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $phone; ?>" name = "data[User][phone]">

              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-2 control-label">Email</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $email; ?>" name = "data[User][email]">

              </div>
            </div>
           
            <div class="form-group nhap_input">
              <label  class="col-sm-2 control-label">Username</label>
              <div class="col-sm-9 " >
                <input class="form-control" id="username" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $username; ?>" name = "data[User][username]">

              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-2 control-label">Password</label>
              <div class="col-sm-9 " >
                <input class="form-control" id="password" type="password" style="width:100%;border: 1px solid #CCC !important"  value="" name = "data[User][password]">

              </div>
               
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-2 control-label">Chức vụ</label>
              <div class="col-sm-9 " >
                <input class="form-control" type="text" style="width:100%;border: 1px solid #CCC !important"  value="<?php echo $position; ?>" name = "data[User][position]">
              </div>
            </div>
            <div class="form-group nhap_input">
              <label  class="col-sm-2 control-label">Quyền người dùng</label>
              <div class="col-sm-9 " >                      
                <select id="selectError3" name="data[User][id_phanquyen]" class="form-control">  

                  <option  <?php if($id_phanquyen ==1) echo "selected"; ?> value="1" >Quyền quản trị</option>
                  <option <?php if($id_phanquyen ==2) echo "selected"; ?> value="2">Quyền chức năng</option>
                  <option <?php if($id_phanquyen ==3) echo "selected"; ?> value="3">Quyền sử dụng</option>           
                </select>                    
              </div>
            </div>
              <div class="row row2 btn_tram" >
                <button type="button" class="btn-table  ui-btn-hidden a_save " id="id_save_tram" onclick="form_user()">Lưu</button>
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

<h4 style="color: #2f83b7;text-align: center; width: 100% ;  margin-bottom: 9px; margin-top: 20px; font-size: 19px; font-weight: bold;  ">DANH SÁCH NGƯỜI DÙNG</h4>
<div style="width:100%;text-align:right; padding-right:15px" class="them_dulieu">
  <!--  <a href="nhap.html" style="font-size:16px; font-weight:bold">Thêm</a><br /> -->
</div>
<style type="text/css">
  .userlist tbody td{
    text-align: center; 

  }
</style>
<div class="table-responsive font_table " style="overflow:hidden; " > 



  <table  id="movie-table" data-mode="reflow" class="ui-responsive table table-bordered table-striped userslist" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>

    <thead>
      <tr class='v_mid'>
        <th style="width: 5%">STT</th>
        <th  style="width: 10%">Tên người dùng</th>
        <th style="width: 20%">Địa chỉ</th>
        <th  style="width: 10%">Email</th>
        <th  style="width: 10%">Số điện thoại</th>
        <th style="width: 10%">Chức vụ</th>
        <th style="width: 10%">Nhóm</th>
        <th style="width: 10%">Chức năng</th>

      </tr>
    </thead>
    <tbody class='body_mid'>

      <?php 
        $stt = 0;
        

        foreach ($array_user as $user)
        {

          $stt++;
          $id = $user["User"]["id"];
     
          ?>
          <tr>
            <th><?php echo  $stt; ?></th>

            <td class='mid'><?php echo $user["User"]["name"]; ?></td>
            <td class='mid'><?php echo $user["User"]["diachi"]; ?></td>
            <td class='mid'><?php echo $user["User"]["email"]; ?></td>
            <td class='mid'><?php echo $user["User"]["phone"]; ?></td>
            <td class='mid'><?php echo $user["User"]["position"]; ?></td>
            <td class='mid'><?php echo $user["User"]["phanquyen"]; ?></td>
            <td class='mid'>
              <div class="row row2 btn_tram" >

                <button  class="btn-table  ui-btn-hidden a_save xoa" id="id_sua_tram" onclick="window.location.href = '/nguoidung/index/'+ <?php echo $id; ?>"/>Sửa</button>
                 <br/>
                <button class=" btn-table  ui-btn-hidden a_huy  " id="id_xoa_tram" onclick="window.location.href = '/nguoidung/del/'+ <?php echo $id; ?>" /> Xóa</button>   
              </div>

            </td>
         
           
          </tr>
          <?php } ?>

 </tbody>
</table>

</div>
<!--  end Phần danh sach -->


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
<script>
function huy() {
    document.getElementById("form_nhap").reset();
}
</script>

<script>
  function form_user()
  {

    if(document.getElementById("fullname").value=="")
		{
			alert("Xin vui lòng nhập 'Tên người dùng'!");	
			
			//gọi hàm focus của đối tượng tieude để đặt trỏ chuột vào đối tượng tieude
			document.getElementById("fullname").focus();

			return;
		}

    if(document.getElementById("phone").value=="")
		{
			alert("Xin vui lòng nhập 'Số điện thoai'!");	
			
			//gọi hàm focus của đối tượng tieude để đặt trỏ chuột vào đối tượng tieude
			document.getElementById("phone").focus();

			return;
		}

    if(document.getElementById("username").value=="")
		{
			alert("Xin vui lòng nhập 'Username'!");	
			
			//gọi hàm focus của đối tượng tieude để đặt trỏ chuột vào đối tượng tieude
			document.getElementById("username").focus();

			return;
		}

    if(document.getElementById("password").value=="")
		{
			alert("Xin vui lòng nhập 'Password'!");	
			
			//gọi hàm focus của đối tượng tieude để đặt trỏ chuột vào đối tượng tieude
			document.getElementById("password").focus();

			return;
		}
    document.getElementById("form_nhap").submit(); 
  }
</script>
<?php }?>