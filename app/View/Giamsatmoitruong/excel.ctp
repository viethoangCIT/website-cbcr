<?php ?>
 <meta charset="utf-8">

  <!--bảng dữ liệu  -->
  <style type="text/css">
    .mid{
      
    }
    .v_mid{
      
    } 
    

  </style>

  <div class="">
    <table  style="margin-top: 10px; border:1px solid black;" border="1">

      <thead>
        <tr>
          <th colspan="5" style="font-size: 18px;font-weight: 10px;">
             BẢNG THỐNG KÊ THÔNG SỐ MÔI TRƯỜNG
          </th>
        </tr>
        <tr>
          <?php 
            $tu_ngay = date("d-m-Y",strtotime($tu_ngay)) ;
            $den_ngay = date("d-m-Y",strtotime($den_ngay)); 
          ?>
          <td colspan="2">Từ ngày:</td>
          <td><?php echo $tu_ngay; ?></td>
          <td>đến ngày:</td>
          <td><?php echo $den_ngay; ?></td>
        </tr>
        <tr >
          <th >STT</th>
          <th>Ngày giờ</th>
          <th>Thông số</th>
          <th>Giá trị</th>
          <th> Đơn vị đo</th>
        </tr>
      </thead>

      <tbodystyle="border: 1px solid #ddd; ">
        <?php 
        $stt = 0;

        foreach ($array_data as $key => $data)
        {

          $stt++;
          $ngay = date("d-m-Y",strtotime($data["Data"]["time"]));
          $gio = date("H:i:s",strtotime($data["Data"]["time"]));
          $giomua = date("H:i:s",strtotime($data["Data"]["time"]));

          ?>
          <tr >
            <td ><?php echo $stt; ?></td>
            <td><?php echo $ngay."</br>".$gio; ?></td>
            <td  colspan ="3" style="padding: 0px !important;">
              <table style="width: 320px;  margin: 0px; height:90px" border="0">
                <tr  style="border-bottom: 1px solid;  border-color: #ddd;">
                  <td  style="width: 105px;" valign="middle">Nhiệt độ</td>
                  <td   style="width: 105px; " valign="middle"  >
                   <?php echo $data["Data"]["tmp"]; ?>
                 </td>
                 <td  ><sup>o</sup>C</td>
               </tr>

               <tr style="border-bottom: 1px solid;  border-color: #ddd;">
                <td    valign="middle">Độ ẩm</td>
                <td  ><?php echo $data["Data"]["hum"]; ?></td>
                <td >%</td>
              </tr>
              <tr  style="border-bottom: 1px solid;  border-color: #ddd;">
                <td   valign="middle">Lượng mưa</td>
                <td  ><?php echo $data["Data"]["rain"]; ?></td>
                <td  >mm</td>
              </tr>
            </table>
          </td>


          
        </tr>
       
    <?php } ?>



    </tbody>

    </table>
  </div>