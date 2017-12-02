<?php ?>
<style type="text/css">
.ui-btn .ui-shadow .ui-btn-corner-all .ui-btn-icon-right .ui-btn-up-c{
  border: none;
}
select:focus{
  outline: none!important;
  box-shadow: none!important;
}
.ui-shadow{
  outline: none!important;
  box-shadow: none!important;
}

<style>
   ul.pagination {
    display: inline-block;
    padding: 0;
    margin: 0;
}

ul.pagination li {display: inline; list-style-type: none;
}

ul.pagination li a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}



</style>
<div class=" font_table div_char" > 

  <h4 class="select_bieudo_thongke">BIỂU ĐỒ THỐNG KÊ </h4>
  <form class="thongke" style="">
    <div>
      <select  id="select_thongke" onchange = "thongke()" >
        <option value="">Thống kê dữ liệu môi trường</option>
        <option  value="13h" <?php if($param == "13h") echo "selected"; ?>  >Thống kê dữ liệu môi trường lúc 13h</option>
      </select>
    </div>
  </form>

  <div style="color: #2f83ad; width: 100%;height: 380px; margin-top: 27px " id="" title="">
   <canvas id="bieudo_nhietdo"></canvas>

 </div>

 <span style="color: #2f83ad;text-align: center;width: 100%;display: block;font-weight: bold;    margin-bottom: 18px;font-size: 18px;margin-top: 6px;margin-left: 12px;">Biểu đồ nhiệt độ</span>

 <div  style="color: #2f83ad; width: 100%;height: 380px; ">
  <canvas id="bieudo_doam"></canvas>
</div>


<span style="color: #2f83ad;text-align: center;width: 100%;display: block;font-weight: bold;    margin-bottom: 18px;font-size: 18px;margin-top: 6px;margin-left: 12px;">Biểu đồ độ ẩm</span>

<div style="width: 100%;height: 380px;">
 <canvas id="bieudo_luongmua"></canvas>
 <span style="color: #2f83ad;text-align: center;width: 100%;display: block;font-weight: bold;    margin-bottom: 18px;font-size: 18px;margin-top: 6px;margin-left: 12px;">Biểu đồ lượng mưa</span>

</div>




</div>
<style type="text/css">

button:focus {
  outline: none!important;
}
.del{

  float: left;
  background-image: url(../img/icon/detele_icon.png);
  background-repeat: no-repeat;
  background-position: 18px center;
  padding-left: 22px;
  background-color: #ff631d !important;
  background-size: 11px;
  width: 75px;
  font-size: 11px;
  margin-left: 8px
}

</style>

<!-- bảng thông kê -->
<div class="table-responsive font_table btn_download_mt" style="" style="border: 0px;" >     

  <h4 class="title_tkmt">BẢNG THỐNG KÊ THÔNG SỐ MÔI TRƯỜNG</h4>
  <?php 
    if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
      {
  ?>
  <a href="/giamsatmoitruong/excel?tu_ngay=<?php echo $tu_ngay; ?>&den_ngay=<?php echo $den_ngay ?>">
    <button id="btn_download" class="btn btn-primary btn-md img-rounded">Tải xuống báo cáo thống kê (*.xlx)</button>
  </a> 
      <?php }?>
</div>


<!-- BEGIN: NỘI DUNG BÊN PHẢI -->
<div class="table-responsive font_table bang " style="border: 0px;"> 



  <script src="/js/Chart.js/dist/Chart.bundle.js"></script>
  <script src="/js/Chart.js/samples/utils.js"></script>
  <style>
  canvas{
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
</style>

<!-- BEGIN: TÌM KIẾM -->
<div class="" style="border:0px solid red; margin-bottom:10px; ">
  <form  id="form_nhap" action="/giamsatmoitruong/index " method="POST">
    <div class="ngay1" >
      <label >Từ ngày</label>
      <div class="ngay2">

        <?php 
        $tu_ngay = date("d-m-Y",strtotime($tu_ngay)) ;
        $den_ngay = date("d-m-Y",strtotime($den_ngay)); 
        ?>
        <input class="form-control" type="text" style="width:100%; border: 0px solid #CCC !important"  value="<?php echo $tu_ngay; ?>" name = "data[tu_ngay]" id = "tu_ngay" >
      </div>
    </div>
    <div class="ngay1" >
      <label > đến ngày</label>
      <div class="ngay2"  >
        <input class="form-control" type="text" style="width:100%;border: 0px solid #CCC !important"  value="<?php echo $den_ngay; ?>" name = "data[den_ngay]" id = "den_ngay">
      </div>
    </div>
    <div class="row row2 btn_tram"  id="tim_kiem">
      <button type="submit" class="btn-table  ui-btn-hidden  " id="tim_kiem1"  >Tìm Kiếm</button>
    </div>
  </form>
</div>
<!-- END: TÌM KIẾM -->


<!-- BEGIN: TABLE THÔNG SỐ MÔI TRƯỜNG -->
<div class="">
  <table id="table_thongke"  class="thongkevideo ui-responsive table table-bordered " style="margin-top: 10px; width: 500px">

    <!-- BEGIN: TABLE HEADER -->
    <thead>
      <tr class='v_mid'>
        <th  style="width: 10px">STT</th>
        <th  style="width: 200px">Ngày giờ</th>
        <th  style="width: 100px">Thông số</th>
        <th  style="width: 50px">Giá trị</th>
        <th  style="width: 50px"> Đơn vị đo</th>
        <th  style="width: 70px">Chức năng</th>
      </tr>
    </thead>
    <!-- BEGIN: TABLE HEADER -->

    <!-- END: TABLE CONTENT -->
    <tbody class='body_mid'>
      <?php 
      $stt = 0;
      $label_time = "" ;

      foreach ($array_data1 as $key => $data)
      {

        $stt++;
        $ngay = date("d-m-Y",strtotime($data["data"]["time"]));
        $gio = date("H:i",strtotime($data["data"]["time"]));

        $type = $data["data"]["type"];

        // BEGIN: NẾU DÒNG HIỆN TẠI LÀ NHIỆT ĐỘ, ĐỘ ẨM, HƯỚNG GIÓ

          if ($data["data"]["tmp"] !="" || $data["data"]["hum"] != "" || $data["data"]["wind"] != "" || $data["data"]["fire"] != "") 
          {

            ?>
            <tr>
              <td><?php echo $stt; ?></td>
              <td class='mid'><?php echo $ngay."</br>".$gio; ?></td>

              <!-- BEGIN: NHIỆT ĐỘ, ĐỘ ẤM, HƯỚNG GIÓ-->
              <td class='mid' colspan ="3" style="padding: 0px !important;">
                <table style="width: 200px;  margin: 0px; height:90px; border-collapse: collapse; border-color: #ddd; border-top:  0px; border-bottom: 0px; border-left: 0px; border-right: 0px" border="1">

                  <!-- BEGIN: NHIỆT ĐỘ -->
                  <?php
                  if($data["data"]["tmp"] != "") 
                  {
                    ?>
                    <tr style="border-bottom: 0px solid;  border-color: #ddd;">
                      <td  style="width: 100px;" valign="middle">Nhiệt độ</td>
                      <td style="width: 50px; " valign="middle"  >
                       <?php echo $data["data"]["tmp"]; ?>
                     </td>
                     <td ><sup>o</sup>C</td>
                   </tr>
                   <?php 
                 }
                 ?>
                 <!-- END: NHIỆT ĐỘ -->


                 <!-- BEGIN: ĐỘ ẨM -->
                 <?php
                 if($data["data"]["hum"] != "") 
                 {

                   $label_time .= "\"". $data['data']['time']. "\",";

                   ?>
                   <tr style="border-bottom: 1px solid;  border-color: #ddd;">
                    <td valign="middle" style="width: 100px">Độ ẩm</td>
                    <td style="width: 50px"><?php echo $data["data"]["hum"]; ?></td>
                    <td style="width: 50px">%</td>
                  </tr>
                  <?php 
                }
                ?>
                <!-- END: ĐỘ ẨM-->

                <!-- BEGIN: HƯỚNG GIÓ -->
                <?php
                if($data["data"]["wind"] != "") 
                {


                 ?>
                 <tr style="border-bottom: 1px solid;  border-color: #ddd;">
                  <td valign="middle" style="width: 100px">Hướng gió</td>
                  <td style="width: 50px"><?php echo $data["data"]["wind"]; ?></td>
                  <td style="width: 50px"></td>
                </tr>
                <?php 
              }
              ?>
              <!-- END: HƯỚNG GIÓ-->

              
                <!-- BEGIN: CẤP DỰ BÁO -->
                <?php
                if($data["data"]["fire"] != "") 
                {

                  $array_capdubao = array("1"=>"Thấp","2"=>"Trung bình","3"=>"Cao","4"=>"Nguy hiểm","5"=>"Rất nguy hiểm");
                  $cap_dubao = $data["data"]["fire"];

                 ?>
                 <tr style="border-bottom: 1px solid;  border-color: #ddd;">
                  <td valign="middle" style="width: 100px">Cấp dự báo</td>
                  <td style="width: 50px"><?php echo $cap_dubao." - ".$array_capdubao[$cap_dubao];?></td>
                  <td style="width: 50px"></td>
                </tr>
                <?php 
              }
              ?>
              <!-- END: CẤP DỰ BÁO-->


            </table>
          </td>
          <!-- END: NHIỆT ĐỘ, ĐỘ ẤM, HƯỚNG GIÓ -->
          
          <td>
          <?php 
            if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
            {
          ?>
            <ul class="pager btn_tt ql_mar" style="float: left">
              <li>
              
                <a href="/giamsatchayrung/edit" class="del"  style="">Xóa </a>
              </li>
            </ul>
          <?php 
            } 
          ?>
          </td>
        </tr>

        <?php 
            } //end if ($data["data"]["tmp"] !="" || $data["data"]["hum"] != "" || $data["data"]["wind"] != "") 
      
          // END: NẾU DÒNG HIỆN TẠI LÀ NHIỆT ĐỘ, ĐỘ ẨM, HƯỚNG GIÓ

          // BEGIN: NẾU DÒNG HIỆN TẠI LÀ LƯỢNG MƯA
 
            $luongmua = $data["data"]["rain"];
            if( $luongmua != "") 
            { 
              $ngay_gio_kt = $data["data"]["time_r2"];
              $ngay_gio_kt = date("d-m-Y H:i",strtotime($ngay_gio_kt));
              ?>
              <tr>

                <td><?php echo $stt; ?></td>
                <td class='mid'><?php echo $ngay." ".$gio."</br>".$ngay_gio_kt; ?></td>

                <!-- BEGIN:LƯỢNG MƯA -->
                <td class='mid' colspan ="3" style="padding: 0px !important;">
                  <table style="width: 200px;  margin: 0px; height:90px;  border-collapse: collapse; border-color: #ddd; border-top: 0px; border-bottom: 0px; border-left: 0px; border-right: 0px" border="1">
                    <tr>
                      <td valign="middle" style="width: 100px">Lượng mưa</td>
                      <td style="width: 50px"><?php echo $luongmua; ?></td>
                      <td style="width: 50px">mm</td>
                    </tr>
                  </table>
                </td>
                <!-- END:LƯỢNG MƯA -->

                <td>
                <?php 
                  if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
                  {
                ?>
                  <ul class="pager btn_tt ql_mar" style="float: left">
                    <li>
                      <a href="/giamsatchayrung/edit" class="del"  style="">Xóa </a>
                    </li>
                  </ul>
                <?php 
                  }
                ?>
                </td>
              </tr>


              <?php
           
          } //end 
        } //end   foreach ($array_data1 as $key => $data)

        ?>
      </tbody>
      <!-- END: TABLE CONTENT -->

    </table>

  </div>
  <!-- END: TABLE THÔNG SỐ MÔI TRƯỜNG -->


  <!-- BEGIN: PHÂN TRANG -->
  <div class="pagination">
  <?php
    $html  = '<ul class="pagination">';

            $so_phantu = 3;
            //previous link button
            $link = "/giamsatmoitruong/index";
            $str_param = "&tu_ngay=".$tu_ngay."&den_ngay=".$den_ngay;
            if($page>1){
              $html.= "<li><a href='$link?page=".($page-1).''.$str_param."'>Trước</a></li>";
            }      

            //do ranged pagination only when total pages is greater than the range
            if($tongso_trang >$so_phantu){               
                $start = ($page <= $so_phantu)?1:($page - $so_phantu);
                $end   = ($tongso_trang - $page >= $so_phantu)?($page+$so_phantu): $tongso_trang;
            }else{
                $start = 1;
                $end   =  $tongso_trang;
            }   
            //loop through page numbers
            for($i = $start; $i <= $end; $i++){
                    $html.= '<li><a href="'.$link .'?page='.$i.''.$str_param.'"';
                    if($i==$page) $html .= "class='active'";
                    $html .= '>'.$i.'</a></li>';
            }     

            //next link button
            if($page<$tongso_trang){
              $html .= "<li><a href='$link?page=".($page+1).''.$str_param."'>Sau</a></li>";
          }      
            $html .= '</ul>';
            echo $html;
        ?>
  </div>
  <!--END: PHÂN TRANG-->

</div>
<!-- END: NỘI DUNG BÊN PHẢI -->

<style type="text/css">
h6{
  text-align: center;
  float: left;
  margin-left: 30.5%;
  width:44%; 
  margin-top: 2px
}
.page {
  display: inline-block;
  color: #717171;
  padding: 0px 9px;
  margin-right: 1px;
  border-radius: 3px;
  border: solid 1px #c0c0c0;
  background: #e9e9e9;
  font-size: 15px;
  text-decoration: none;
}
.pagination{
  margin-left: 40px;
  padding: 20px;
  margin-bottom: 20px;
}
</style>

<div class='clear'></div>

<script type="text/javascript">
 function page(i){

  window.location.href = "/giamsatmoitruong/index?page="+i+"&tu_ngay=<?php echo $tu_ngay;?>&den_ngay=<?php echo $den_ngay;?>" ;

}
function previous(previous){

  window.location.href = "/giamsatmoitruong/index?page="+previous+"&tu_ngay=<?php echo $tu_ngay;?>&den_ngay=<?php echo $den_ngay;?>" ;

}
function previous(next){

  window.location.href = "/giamsatmoitruong/index?page="+next+"&tu_ngay=<?php echo $tu_ngay;?>&den_ngay=<?php echo $den_ngay;?>" ;

}

</script>
<script>
  function thongke()
  {
    //lấy giá trị của selectbox
    giatri = document.getElementById("select_thongke").value;

    if(giatri == "13h")  window.location.href = "/giamsatmoitruong/index/13h.html?tu_ngay=<?php echo $tu_ngay;?>&den_ngay=<?php echo $den_ngay;?>";
    else window.location.href = "/giamsatmoitruong.html";
    
  }


</script>
<script type="text/javascript">
  $( function() {
    $( "#tu_ngay" ).datepicker({dateFormat: "dd-mm-yy"});
  } );
  $( function() {
    $( "#den_ngay" ).datepicker({dateFormat: "dd-mm-yy"});
  } );
</script>


<script>
    //kiểm tra nếu di động thì ẩn label thời gian ngược lại để nguyên
    var an_hien = true;
    if($( window ).width() < 767)
    {
      an_hien = false;  
    }
    









    <?php 
     // lấy dữ liệu đưa vào biến


     $label_time_nhietdo = "";
     $str_data_nhietdo = "";

    $label_time_doam ="";
    $str_data_doam = "";

    $label_time_mua = "" ;
    $str_data_luongmua = "";

    foreach ($array_data_bieudo as $key => $data_bieudo)
    {
      if($data_bieudo['data']['tmp'] != "")
      {
        $str_data_nhietdo .= "\"". $data_bieudo['data']['tmp']. "\",";
        $label_time_nhietdo .= "\"". $data_bieudo['data']['time']. "\",";
      }
      
      
      if($data_bieudo['data']['hum'] != "")
      {
        $label_time_doam .= "\"". $data_bieudo['data']['time']. "\",";
        $str_data_doam .= "\"". $data_bieudo['data']['hum']. "\",";
      } 

      if($data_bieudo['data']['rain'] != "")
      {
        $str_data_luongmua .= "\"". $data_bieudo['data']['rain']. "\",";
        $label_time_mua .= "\"". $data_bieudo['data']['time']. "\",";
      } 
      

    }
    ?>


<?php

    //giá trị nhiệt độ nhỏ nhất trên trục tung = giá trị nhỏ nhất - 1
    $min_nhietdo = $min_tmp-1;

    //đảm bảo giá trị trục tung lớn hơn 0
    if($min_nhietdo < 0) $min_nhietdo = 0;

    //giá trị nhiệt độ lớn nhất trên trục tung = giá trị lớn nhất + 1
    $max_nhietdo = $max_tmp + 1;

    //đảm bảo giá trị trục tung lớn hơn 0
    if($max_nhietdo <0) $max_nhietdo = 0;

    //giá trị độ ẩm nhỏ nhất trên trục tung  = giá trị độ ẩm nhỏ nhất -1
    $min_doam = $min_hum -3;

    //đảm bảo giá trị trục tung lớn hơn 0
    if($min_doam <0) $min_doam = 0;

    //giá trị độ ẩm lớn nhất trên trục tung = giá trị độ ẩm lớn nhất + 1
    $max_doam = $max_hum +3;

    //đảm bảo giá trị trục tung lớn hơn 0
    if($max_doam < 0) $max_doam = 0; 

    //giá trị lượng mưa nhỏ nhất trên trục tung = giá trị lượng mưa nhỏ nhất - 5
    $min_luongmua = $min_rain - 5;

    //giá trị lượng mưa lớn nhất trên trục tung = giá trị lượng mưa lớn nhất + 5
    $max_luongmua = $max_rain + 5;
    //đảm bảo giá trị trục tung lớn hơn 0
    if($min_luongmua < 0) $min_luongmua = 0;
    if($max_luongmua <0) $max_luongmua = 0;
?>
 //begin vi du
 var config_nhietdo = {
  type: 'line',
  data: {
    labels: [<?php echo $label_time_nhietdo ; ?>],
    datasets: [{
      label: "nhiệt độ",
      borderColor: "blue",
      pointBorderColor: "black",
      pointBackgroundColor: "yellow",
      backgroundColor: "blue",
      data: [ <?php echo $str_data_nhietdo; ?>],
      fill: false,
    }]
  },
  options: {
    responsive: true,
    title:{
      display:true,
      text:''
    },
    legend: {
        display: false
    },
    scales: {
      yAxes: [{
        ticks: {
          min: <?php echo $min_nhietdo; ?>,
          max: <?php echo $max_nhietdo; ?>
        }
      }]
    }
  }
};

        //config biêu đồ độ ẩm
        var config_do_am = {
          type: 'line',
          data: {
            labels: [<?php echo $label_time_doam; ?>],
            datasets: [{
              label: "Độ ẩm (%)",
              data: [ <?php echo $str_data_doam; ?>],
              borderColor: "blue",
              pointBorderColor: "black",
              pointBackgroundColor: "yellow",
              backgroundColor: "blue",
              fill: false,
            }]
          },
          options: {
            responsive: true,
            title:{
              display:true,
              text:''
            },
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                ticks: {
                  min: <?php echo $min_doam; ?>,
                  max: <?php echo $max_doam; ?>
                }
              }]
            }
          }
        };

      
  //config biêu đồ lượng mưa
  var config_luongmua = {
          type: 'line',
          data: {
            labels: [<?php echo $label_time_mua; ?>],
            datasets: [{
              label: "lượng mưa (mm)",
              data: [ <?php echo $str_data_luongmua; ?>],
              borderColor: "blue",
              pointBorderColor: "black",
              pointBackgroundColor: "yellow",
              backgroundColor: "blue",
              fill: false,
            }]
          },
          options: {
            responsive: true,
            title:{
              display:true,
              text:''
            },
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                ticks: {
                  min: <?php echo $min_luongmua; ?>,
                  max: <?php echo $max_luongmua; ?>
                }
              }]
            }
          }
        };

        window.onload = function() 
        {
            // gọi hàm vẽ biểu đồ nhiệt độ
            var doituong_nhietdo = document.getElementById("bieudo_nhietdo").getContext("2d");
            window.bieudo_nhietdo = new Chart(doituong_nhietdo, config_nhietdo);

            // gọi hàm vẽ biểu đồ nhiệt độ
            var doituong_do_am = document.getElementById("bieudo_doam").getContext("2d");
            window.bieudo_doam = new Chart(doituong_do_am, config_do_am);

             // gọi hàm vẽ biểu đồ lương mưa
             var doituong_luongmua = document.getElementById("bieudo_luongmua").getContext("2d");
             window.bieudo_luongmua = new Chart(doituong_luongmua, config_luongmua);
           };

  //end vidu

</script>   
<?php ?>
