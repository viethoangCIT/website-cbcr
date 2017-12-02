<?php ?>
<style type="text/css">
 .btn:focus {
  outline: none!important;
}
.btn_xn{


  font-weight: bold;
  width: 20%;
  margin-left: 20%;
  margin-top: 10px;
  color: white;
}
#co{
  background-color: red;
}
#khong{
  background-color: green;
}

.title_canhbao{
 width: 100%;
 color: white;
 background-color: #2f83b7;
 font-weight: bold;
 height: 35px;
 font-size: 20px;
 text-align: center;
 padding-top: 3px;
}
p{
  display: inline;
  color: #2f83b7;
  text-align: center;
  width: auto;
  margin-bottom: 9px;
  font-size: 19px;
  float: left;
  margin-top: 10px;
  text-transform: uppercase;
}

</style>
<div class="row" style="width:100%;margin-left:0.1%">

  <div class="title_canhbao">PHÁT LỆNH CHỮA CHÁY (SMS)</div>
  <form action="/home/phatlenh" method="post">
    <div class="left_canhbao">
      <p  style="width: 100%; text-align: center;">Nội dung lệnh</p>
      <textarea placeholder="Nhập nội dung" class="text_area" style="width: 100% ; height: 83px;margin-left:4px" name="data[desc]" ></textarea>
    </div>

    <div class="right_canhbao"> 
      <div>
        <p style="width: 100%; text-align: center;">Nhóm người nhận</p>
      </div>
      <div style="margin-top: 50px">

       <select class="textbox_ql select_group select_cc" name="data[id_group]" >
         <?php 

         $id_group = $array_edit_thanhvien[0]["Thanhvien"]["id_group"];
         foreach ($array_group1 as $group1) 
          {?>

        <option   value="<?php echo $group1["Group"]["id"]; ?>" >
          <?php echo $group1["Group"]["name"];?>
        </option>
        <?php
      }
      ?>

    </select>

  </div>

  <div class="col-sm-6">
    <input   type="submit" name="submit" value="Gửi"  class="btn btn-primary btn-md img-rounded btn_phatlenh_canhbao"/>
  </div>
</div>

<div class="clear"></div>
            <!-- <a href="/home/phatlenh" target="_blank" style="width: 80%;border-radius: 15px;padding-left: 15px;margin-top: 2px;
            background-color: #337ab7!important;margin-left:13%;" class="btn btn-primary btn-md img-rounded">Phát lệnh SMS</a> -->

    </form>  

  </div>





