<?php ?>
<script>
        /**
        * The window.onload function contains all of the code necessary
        */
        var video;
        window.onload = function (e)
        {
            /**
            * Some common variables
            */
            var canvas     = document.getElementById("cvs");
            var context    = canvas.getContext('2d');
            var canvas2    = document.getElementById("cvs2");
            var context2   = canvas2.getContext('2d');
            video      = document.getElementById("myVideo");
            var state      = null;
            var translated = false;
            var mousedown  = false;
            
            
            
            
            /**
            * Translate for antialiasing purpose
            */
            if (!translated) {
              context.translate(0.3,0.5);
              translated = true;
            }





            /**
            * The main draw function that renders each frame
            */
            function Draw()
            {
                /**
                * Start by clearing both canvas tags
                */
                context.clearRect(0,0,canvas.width,canvas.height);
                context2.clearRect(0,0,canvas2.width,canvas2.height);




                /**
                * Draw the "Loading..." placeholder. This is overwritten once the video has loaded
                */
                RGraph.Text2(context, {'font':'Arial',
                 'size':24,
                 'x':5,
                 'y':10,
                 'text':'...'});


                /**
                * Draw the video on the first canvas
                */
                context.drawImage(video,0,0,video.width,video.height);



                /**
                * Draw the selection on to the second canvas
                */
                if (state && state.x && state.y && state.w && state.h) {
                  context2.drawImage(canvas,state.x,state.y,state.w,state.h,
                    0,0,canvas2.width, canvas2.height);
                }



                /**
                * Draw the selection box if necessary
                */
                if (state) {
                  if (context.setLineDash) context.setLineDash([2,1]);
                  context.lineWidth = 1;
                  context.strokeStyle = 'red'
                  context.strokeRect(state.x, state.y, state.w, state.h);
                  if (context.setLineDash) context.setLineDash([1]);
                }

                setTimeout(Draw, 1000 / 60);
              }








            /**
            * The mousedown event initiates the selection process
            */
            canvas.onmousedown = function (e)
            {
              var mouseXY = RGraph.getMouseXY(e);

              state = {x: mouseXY[0], y:mouseXY[1]};
              mousedown = true;
            }
            
            
            
            /**
            * The mouseup event finishes the selection for zoom
            */
            window.onmouseup =
            canvas.onmouseup = function (e)
            {
              if (state) {
                var x = state.x;
                var y = state.y;
                var w = state.w;
                var h = state.h;
              }

              mousedown = false;
            }



            
            
            /**
            * The mousemove event updates the selection for zoom
            */
            canvas.onmousemove = function (e)
            {
              if (state && mousedown) {

                var mouseXY = RGraph.getMouseXY(e);

                state.w = mouseXY[0] - state.x;
                state.h = mouseXY[1] - state.y;
              }
            }




            /**
            * Call the Draw function at a frame rate of 60fps
            */
            setTimeout(Draw, 1000 / 60);

            video.autoplay = true;
            video.load();
            
            //địa điểm vụ cháy
            var diemchay     = document.getElementById("diemchay");
            <?php 
              if($toado_chay_x == "") $toado_chay_x = 0;
              if($toado_chay_y == "") $toado_chay_y = 0;
              $vungchay_x = $margin_left_vungchay;
              $vungchay_y = $margin_top_vungchay - 430;

              if($vungchay_x<0) $vungchay_x=0;
              $show = "";
              if($trang_thai==0) $show = "none";
              if($trang_thai==1) $show = "block"
            ?>
            
            //tọa độ cháy = 
            var vitri_chay_x = <?php echo $toado_chay_x ?>;
            var vitri_chay_y = <?php echo $toado_chay_y ?> - 430;


            
            diemchay.style.marginLeft = "" + vitri_chay_x + "px";
            diemchay.style.marginTop = "" + vitri_chay_y + "px";
            diemchay.style.display = "<?php echo $show?>";

            
            //hiển thị vị trí vùng cháy
            var vungchay     = document.getElementById("vungchay");
            var vitri_vungchay_x = <?php echo $vungchay_x?>;
            var vitri_vungchay_y = <?php echo $vungchay_y?>;

            vungchay.style.marginLeft = "" + vitri_vungchay_x + "px";
            vungchay.style.marginTop = "" + vitri_vungchay_y + "px";
            vungchay.style.display = "<?php echo $show;?>";

            
            //tính chiều dài, chiều rộng vùng cháy
            vungchay.style.width = "" + <?php echo $chieudai; ?> + "px";
            vungchay.style.height = "" + <?php echo $chieurong; ?> + "px";



          }


        </script>

        <!-- Needed for menuhints -->
        <script src="/js/jquery.min.js"></script>
        <script src="/js/RGraph.common.core.js"></script>
        <style>
        canvas
        {
          border: 1px solid gray;
        }
          

        </style>
        <div style="width: 100%;" >
         <div class="table-responsive font_table"  style="width:100%;margin-right:1%; float:left;margin-top: 15px;margin-bottom:15px;"> 
           <!-- video-->

           <!--  -->
            
            <!-- video root-->
            <div class="video1">
              <h4 style="color: #2f83b7;text-align: center; width: 100% ; font-size: 19px">CAMERA LIVE VIEW</h4>
              
              <video id="myVideo" autoplay = "true" loop style="display: none;" width="500" height="430">     
                <source style="" src="<?php echo $link_video?>" type="video/mp4">
              </video>
              <canvas id="cvs" style="border:solid 0px; cursor:crosshair" width="500" height="430">[No canvas support]
                
                </canvas>
                <div id="diemchay" style="color:red; position: absolute; margin-top: -440px; " >X</div>
                <div id="vungchay" style=" border:solid 5px yellow ; position: absolute;  "></div>
              
            
 
           </div>
           <!-- video zoom-->
           <div class="video1">
            <h4 style="color: #2f83b7;text-align: center; width: 100% ; font-size: 19px">CAMERA ZOOM</h4>
            <canvas id="cvs2" class="videozoom" style="width: 98%; float:right;height:425px ">[No canvas support]</canvas>
          </div>
          <br clear="all">

        </div>
      </div>
      <style type="text/css">
      html {
        min-height: 100%;
        position: relative;
      }

      body {
        margin: 0 0 150px;
      }
      body, h1, h2, h3, dt, dd {
        margin: 0 auto;
        padding: 0;
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
    <div>
      <h4 id="title_canhbaochayrung" >THỐNG KÊ CÁC VIDEO CÓ CẢNH BÁO CHÁY RỪNG</h4>
    </div>
    <div class="table-responsive font_table" style="width:100%;" >     
      <table  id="movie-table"  class="ui-responsive table table-bordered table-striped" style='border-top:1px solid #dcdcdc; width:100%; display:inline-table'>
        <thead>
          <tr class='v_mid'>
            <th  style = "width:1%">STT</th>
            <th  style = "width:5%">Thời gian</th>
            <th   style = "width:5%">Xác nhận</th>
            <th   style = "width:21%">Địa điểm</th>
            <th style = "width:24%">Thiệt hại</th>
            <th  style = "width:1%">Chi tiết</th>
            <th style = "width:1%">Chức năng</th>           
          </tr>
        </thead>
        <tbody class='body_mid'>
         <?php 
               // print_r($array_vuchay);
         $stt = 0;
         $id="";
         foreach ($array_vuchay as $vuchay) {
          $stt++ ;
          $id=$vuchay["vuchays"]["id"];

          ?>
          <tr>
            <th><?php echo $stt; ?></th>
            <td class='mid'>
              <?php 
              $date = $vuchay["vuchays"]["thoigian_batdau"];
              $date = date("d-m-Y H:i:s", strtotime($date));
              echo $date; ?>
            </td>
            <td class='mid'><?php echo $vuchay["vuchays"]["xacnhan"]; ?></td>
            <td class='mid'>
              <?php 
              $diachi = $vuchay["vuchays"]["xa"].",".$vuchay["vuchays"]["huyen"].","."thành phố Đà Nẵng";
              echo  $diachi;?>

            </td> 
            <?php 
              
              $dt = $vuchay[0]["tong"];
              
              if($dt == "") $dt = 0;
            ?>
            <td class='mid'><?php echo "Thiệt hại gần ".$dt." hecta rừng"; ?></td> 
            <td class= 'mid'> <ul class="pager btn_tt ql_mar" style="float: left">
              <li>
                <a href="/home/chitiet/<?php echo $id;?>"  class="chitiet">Chi tiết</a>
              </li>
            </ul></td>
            <!--<td class='mid'><img style="width: 111px; height: 75px" src="/files/chay1.jpg"> </td>-->
            <td>
              <ul class="pager btn_tt ql_mar" style="float: left">
              <?php 
                if($this->Session->read('id_phanquyen') == "1" || $this->Session->read('id_phanquyen') == "2")
                  {
              ?>
               <li>
                <a href="/video/<?php echo $vuchay["vuchays"]["video"] ?>"  class="taixuong" style="margin-left: 2px">Tải xuống</a>
              </li>
                  <?php }?>
              <br/>
              <li>
                <a href="/giamsatchayrung/video"  class="xemvideo" >Video</a>
              </li>
            </ul>
          </td>


        </tr>
        <?php } ?>


      </tbody>

    </table>





  </div>
  <div class='clear'></div>
</div>
