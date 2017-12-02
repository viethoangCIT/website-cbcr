<script src="<?php echo $this->webroot; ?>js/dist/Chart.bundle.js"></script>
    <style>
    canvas{
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
    }
    </style>
<p></p>  
<div class='row row5' style="margin-left:0px; margin-right:0px">
	<form action="<?php echo $this->webroot;?>dulieubieudo" method="get" id="form_timkiem">
        	<div class='ngay_thang' style="width:340px;margin-right:15px !important">
            	<div class='lbl_day ngay' style="width:95px; border:0px solid red; float:left">Từ ngày</div>
				<?php
				if($tu_ngay != "") $tu_ngay = date("d-m-Y",strtotime($tu_ngay));
				else $tu_ngay = date("d-m-Y",strtotime($thangtruoc));
                ?>
               	<div class="nhap_tungay" style="border:0px solid black; float:left; width:120px">
                    <input type="text" class="form-control input_txt_serday o_nhap"  id="tungay" placeholder="Tất cả" name="data[tu_ngay]" value="<?php echo $tu_ngay; ?>" style="text-align:left !important; width:120px">
            	</div>
                <div style="border:0px solid blue; float:left; width:20px; margin-left:-24px; padding-top:7px">
                    <a href="#" class="ui-link " id="clear-button1" onclick="removeTuNgay()">
                        <img src="<?php echo $this->webroot;?>img/icon/close_input.png" class="close_input">
                    </a>
                </div>
            	<div class='lbl_day gio' style="width:60px; border:0px solid yellow">Giờ</div>
                <div class="nhap_tugio" style="border:0px solid black; float:left; width:65px; height:36px">  
                	<?php
					if($tu_gio == "")	$tu_gio = "00:00";
					?>            
                    <input type="text" class="form-control input_txt_serday o_nhap" name="data[tu_gio]" id="tugio" placeholder="Tất cả" style="width:100%;" value="<?php echo $tu_gio; ?>">
                    
                </div>    
        	</div>
			<div class='ngay_thang' style="width:340px;margin-right:15px !important">
                <div class='lbl_day ngay' style="width:95px; float:left">Đến ngày</div>
                <div class="nhap_tungay" style="width:120px; float:left">
					<?php
                    if($den_ngay != "") $den_ngay = date("d-m-Y",strtotime($den_ngay));
                    else 	$den_ngay = date("d-m-Y",strtotime($ngayhientai));
                    ?>
                    <input type="text" class="form-control input_txt_serday o_nhap"  id="denngay" placeholder="Tất cả" style="width:100%; text-align:left" name="data[den_ngay]" value="<?php echo $den_ngay; ?>">
               	</div> 
                <div style="border:0px solid; float:left; width:20px; margin-left:-24px; padding-top:7px">    
                    <a href="#" class="ui-link " id="clear-button2" onclick="removeDenNgay()">
                        <img src="<?php echo $this->webroot;?>img/icon/close_input.png" class="close_input">
                    </a>
                </div>
                <div class='lbl_day gio' style="width:60px; float:left">Giờ</div>
                <div class="nhap_tugio" style="width:65px; height:36px; float:left">  
                	<?php if($den_gio == "")	$den_gio = "23:59"; ?>
                	<input type="text" class="form-control input_txt_serday o_nhap" name="data[den_gio]" id="dengio" placeholder="Tất cả" style="width:100%;" value="<?php echo $den_gio; ?>">
            	</div>
			</div>
                    
        	<div class='loaixe' style="width:265px; margin-right:15px">
                <div class='lbl_day ngay' style="width:95px">Tên trạm</div>
                   
                
            <?php
              echo $this->Form->input("ten_tram",array('default'=>"$ten_tram",'label' => false,'type'=>'select','options'=>$array_option_tram,'class'=>'form-control input_txt_loaixe tram_dangbang','name'=>'data[ten_tram]','style'=>'width:170px','id'=>'tentram'));?>
            
           
        </div> 
        <div class='xem_bieudo nut_bieudo' style="width:170px; padding-top:7px; min-height:35px;">
              <input type="button" onclick="SubmitForm()" class="form-control input_txt_serday btn_xem" style="width:69px; margin:-7px 1px; background-color:#2f83b7; color:white; display:inline" value="Xem">   
              
            <input type="button" onclick="submit_form_exel()" class="form-control input_txt_serday btn_xuat" style="width:93px; margin:-7px 1px; background-color:#2f83b7; color:white; display:inline" value="Xuất Excel"> 
        </div>
</form>
<form  action="<?php echo $this->webroot;?>dulieubieudo/exel" method="get" id="xuat_excel">
   <input type="hidden"   id="tungay2" name="data[tu_ngay]"> 
	<input type="hidden"  name="data[tu_gio]" id="tugio2">
	<input type="hidden"   id="denngay2" name="data[den_ngay]">
	<input type="hidden"  name="data[den_gio]" id="dengio2" >
	<input type="hidden"  name="data[ten_tram]" id="tentram2">
</form>
</div>
<?php 
if($array_bieudo != NULL)
{
?>
<div class="row3" > 
<?php
$i = 0;
$str_mota_chiso = "";
$str_donvi_chiso = "";
$tmp_ten_chiso = "";
$ten_chiso = "";
$str_thoigian = "";
$array_thoigian = NULL;
$str_giatri = "";
$array_giatri = NULL;
$array_chiso_tren = NULL;
$array_mausac_nguong = NULL;
$min = "suggestedMin: 0";
$max = "suggestedMax: 8";

//asort($array_bieudo);

foreach($array_bieudo as $bieudo)
{
    $ten_chiso = $bieudo["Chiso"]["ten"];
	//if($ten_chiso == "PH") $ten_chiso = "pH";
	if(isset($array_mota_chiso[$ten_chiso]))
	{
		$str_mota_chiso = $array_mota_chiso[$ten_chiso];
		
		//lấy ra tên chỉ số để đưa vào chú thích khi chỉ chuột vào điểm tròn
		$array_mota[$i] = $str_mota_chiso;
	}
	if(isset($array_donvi_chiso[$ten_chiso]))
	{
		$str_donvi_chiso = $array_donvi_chiso[$ten_chiso];
		
		//lấy ra đơn vị chỉ số để đưa vào chú thích khi chỉ chuột vào điểm tròn
		$array_donvi[$i] = $str_donvi_chiso;
	}
	
    if($ten_chiso != $tmp_ten_chiso)
    {
        //Nếu qua chỉ số khác thì lưu chuỗi thời gian, chuỗi giá trị của chỉ số trước vào array
        if($i>0)
        {
            $array_thoigian[$i] = $str_thoigian;
            $array_giatri[$i] = $str_giatri;
			
        }
        //sang chỉ số khác
        $i++;
        
		//lấy ra giá trị, màu sắc chỉ số trên để vẽ ra đường ngang cảnh báo mức nguy hiểm, an toàn hay báo động
		$m = 0;
		foreach($array_nguong as $nguong)
		{
			$ten_chiso_nguong = $nguong["Nguongchiso"]["ten_chiso"];
			$giatri_chiso_nguong = $nguong["Nguongchiso"]["chiso_tren"];
			if($ten_chiso_nguong == $ten_chiso)
			{
				$array_chiso_tren[$i][$m] = $giatri_chiso_nguong.",";
				$array_chiso_duoi[$i][$m] = $nguong["Nguongchiso"]["chiso_duoi"];
				$array_mausac_nguong[$i][$m] = $nguong["Nguongchiso"]["mausac"];
				$array_mota_nguong[$i][$m] = $nguong["Nguongchiso"]["mota"];
				$m++;
			}
			
		}
		
		
        //gán các chuỗi thời gian, chuỗi giá trị = rỗng để chứa chuỗi thời gian, chuỗi giá trị của chỉ số mới.
        $str_thoigian = "";
        $str_giatri = "";
 ?>
 		<h4 style="text-align:center;">Biểu đồ:  <?php echo $str_mota_chiso; ?></h4>
        <canvas id="canvas_<?php echo $i ?>" style="margin-top:-20px"></canvas><br />
        <script>
		//kiểm tra nếu di động thì ẩn label thời gian ngược lại để nguyên
		var an_hien = true;
		if($( window ).width() < 767)
		{
			an_hien = false;	
		}
        var config_<?php echo $i; ?> = {
            type: 'line',
			
            data: {labels: [],datasets: [{label:"",data: [],fill: false,borderDash: [5, 5]}]},
            options: {
				//hiển thị chú thích ở trên biểu đồ
				legend: {display: true},
                responsive: true,title:{display:true,text:''},
                tooltips: {mode: 'label',callbacks: {}},
                hover: {mode: 'dataset'},
                scales: {xAxes: [{display: true,scaleLabel: {display: an_hien,labelString: 'Thời Gian'}}],
                        yAxes: [{display: true,scaleLabel: {display: true,labelString: '<?php echo "$str_donvi_chiso"; ?>'},ticks: {<?php echo $min ?>,<?php echo $max ?>,}}]
                        }
                }
        };

        </script>
        
        
        
<?php 
        //lưu tên chỉ số hiện tại vào $tmp_ten_chiso để so sánh với chỉ số tiếp theo
        $tmp_ten_chiso = $ten_chiso;
    }//end if
    
    //nối các giá trị và thời gian vào chuỗi để lưu vào array
    $str_thoigian .= "\"".date("H:i d-m-Y",strtotime($bieudo["Chiso"]["thoigian"]))."\",";
    $str_giatri .= $bieudo["Chiso"]["giatri"].",";
	
	
}//end for

//lấy ngày tháng của chỉ số cuối dùng đưa vào array thời gian
 $array_thoigian[$i] = $str_thoigian;
 $array_giatri[$i] = $str_giatri;

?>    
    
</div>
    
</div>

</div>

				
                
<script>
     
     

        window.onload = function() {
			 <?php 
		 for($j=1;$j<=$i;$j++)
		 {	
		 ?>
            var ctx = document.getElementById("canvas_<?php echo $j; ?>").getContext("2d");
            window.myLine_<?php echo $j; ?> = new Chart(ctx, config_<?php echo $j; ?>);
	<?php } ?>		
			draw_line();
        };
		function draw_line()
		{
		 <?php
		 for($j=1;$j<=$i;$j++)
		 {	
		 ?>
		  config_<?php echo $j; ?>.data = {
                labels: [<?php echo $array_thoigian[$j]; ?>],
                datasets: [{
                    label: "<?php echo $array_mota[$j-1]; ?> <?php echo $array_donvi[$j-1]; ?>",
                    data: [<?php echo $array_giatri[$j]; ?>],
                    fill: false,
					borderColor: "blue",
					pointBorderColor: "black",
					pointBackgroundColor: "yellow",
					backgroundColor: "blue",
                }<?php
				//lấy ra số lần thời gian để lấy số lần giá trị đường cảnh báo
				$array_solan_tg = explode(",",$array_thoigian[$j]);
				for($k = 0;$k < count($array_chiso_tren[$j]);$k++)
				{
					$chiso_tren = str_replace(",","",$array_chiso_tren[$j][$k]);
					$chiso_duoi = $array_chiso_duoi[$j][$k];
				 ?>,{ label: "<?php echo $array_mota_nguong[$j][$k]; ?> (<?php echo $chiso_duoi; ?> - <?php echo $chiso_tren; ?>) ",
				 	
                    data: [<?php 
							for($solan=0;$solan<(count($array_solan_tg)-1);$solan++)
							{
								echo $array_chiso_tren[$j][$k]; 
							}
					?>],
                    fill: false,
					borderColor: "<?php echo $array_mausac_nguong[$j][$k]; ?>",
					pointBorderColor: "<?php echo $array_mausac_nguong[$j][$k]; ?>",
					pointBackgroundColor: "<?php echo $array_mausac_nguong[$j][$k]; ?>",
					backgroundColor: "<?php echo $array_mausac_nguong[$j][$k]; ?>",
					pointRadius: 0,
					pointHoverRadius: 0,
}
				<?php
				}
				?>
				]
            };
			
		   $.each(config_<?php echo $j; ?>.data.datasets, function(i, dataset) {
					  
					  dataset.pointBorderWidth = 0;
				  });
				   // Update the chart
		  window.myLine_<?php echo $j; ?>.update();	
           <?php
		 }
		   ?>

           
		}
		
		
    </script>                
<?php }else
{
	
	echo "<h1 style='font-size: 20px;text-align: center;font-weight: bold'>Không có dữ liệu</h1>";
}
 ?>    
 <script>
	function SubmitForm()
	{
		//lấy dữ liệu từ ô ngày
		tu_ngay = document.getElementById("tungay").value; 
		if(tu_ngay == '')
		{
			alert('Xin vui lòng nhập từ ngày');
			return;
		}
		den_ngay = document.getElementById("denngay").value; 
		if(den_ngay == '')
		{
			alert('Xin vui lòng nhập đến ngày');
			return;	
		}
		
		
		document.getElementById("form_timkiem").submit();	
	}
	function submit_form_exel()
	{
		//lấy giá trị của từ ngày, từ giờ, đến ngày, đến giờ. tên trạm
		document.getElementById('tungay2').value = document.getElementById('tungay').value;
		document.getElementById('tugio2').value = document.getElementById('tugio').value;
		document.getElementById('denngay2').value = document.getElementById('denngay').value;
		document.getElementById('dengio2').value = document.getElementById('dengio').value;
		document.getElementById('tentram2').value = document.getElementById('tentram').value;
		
		
		
		document.getElementById('xuat_excel').submit();	
	}
	
	function removeTuNgay()
	{
		document.getElementById("tungay").value = "";
				
	}
	function removeDenNgay()
	{
		document.getElementById("denngay").value = "";
			
	}
	function hiddenButton()
	{
		if(document.getElementById("tungay").value == "")
		{
			document.getElementById("clear-button1").style.visibility = "hidden";
		}else
		{
			document.getElementById("clear-button1").style.visibility = "none";
		}	
		if(document.getElementById("denngay").value == "")
		{
			document.getElementById("clear-button2").style.visibility = "hidden";
		}else
		{
			document.getElementById("clear-button2").style.visibility = "none";
		}	
	}
	hiddenButton();
	 //danh cho datepicker
		$( "#tungay" ).datepicker({ dateFormat: 'dd-mm-yy', showButtonPanel: true});
		$( "#denngay" ).datepicker({ dateFormat: 'dd-mm-yy', showButtonPanel: true}); 
		
		$('#tugio').timepicker({timeFormat: 'H:i',minTime: '7',});	
		$('#dengio').timepicker({timeFormat: 'H:i',minTime: '7',});	
		
		document.getElementById('bieudo').className='active2';	
		
</script>
<?php //echo $this->element('sql_dump');?>
