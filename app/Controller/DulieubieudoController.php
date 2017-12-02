<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class DulieubieudoController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() 
	{
		$this->loadModel('Chiso');
		$this->loadModel('Tram');
		$this->loadModel('Dulieu');
		$this->loadModel('Nguongchiso');
		$this->loadModel('Cambien');
		$id = "";
		$array_bieudo = NULL;
		$array_dulieu = NULL;
		$ten_tram = $tu_ngay = $den_ngay = $str_dieukien = $tu_gio = $den_gio = "";
		
		//$thangtruoc = date("Y-m-d", mktime(0, 0, 0, date("m")-1, date("d"),   date("Y")));
		$thangtruoc = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")-1,   date("Y")));
		$ngayhientai = date("Y-m-d 23:59"); 
		
		$array_option_tram = $this->Tram->find("list",array("fields"=>"id,ten","order"=>"ten ASC"));
		
		$ten_dautien = key($array_option_tram);
		
		if(isset($_GET["data"]))
		{
			$ten_tram = $_GET["data"]["ten_tram"];
			$ten_tram =	str_replace("'","''",$ten_tram);
			
			if($ten_tram != "")
			{
				$str_dieukien = "Chiso.id_tram = '$ten_tram'";
			}
			
			//lấy dữ liệu ngày từ ng` dùng 
			$tu_ngay = $_GET["data"]["tu_ngay"];
			$tu_gio = $_GET["data"]["tu_gio"];
			$tu_gio =	str_replace("'","''",$tu_gio);
			$tu_ngay =	str_replace("'","''",$tu_ngay);
			
			if($tu_ngay != "")
			{
				$tu_ngay =	date("Y-m-d",strtotime($tu_ngay));
				
				$tu_gio =	date("H:i",strtotime($tu_gio));
				
				if($str_dieukien != "") $str_dieukien.= " AND ";
				$str_dieukien .= "Chiso.thoigian >= '$tu_ngay $tu_gio' ";
			}
			
			$den_ngay = $_GET["data"]["den_ngay"];
			$den_gio = $_GET["data"]["den_gio"];
			$den_ngay =	str_replace("'","''",$den_ngay);
			$den_gio =	str_replace("'","''",$den_gio);
			
			if($den_ngay != "")
			{
				
				$den_ngay =	date("Y-m-d",strtotime($den_ngay));
				$den_gio =	date("H:i",strtotime($den_gio));
				if($str_dieukien != "") $str_dieukien.= " AND ";
				$str_dieukien .= "Chiso.thoigian <= '$den_ngay $den_gio'";
			}
		}
		else $str_dieukien = "`thoigian` >= '$thangtruoc' AND `thoigian` <= '$ngayhientai' AND `id_tram` = '$ten_dautien'";
		
		$array_bieudo = $this->Chiso->find("all",array("order"=>"ten ASC,thoigian ASC ","conditions"=>"$str_dieukien"));
		
		$array_nguong = $this->Nguongchiso->find("all",array("fields"=>"ten_chiso,chiso_tren,mausac,mota,chiso_duoi","order"=>"ten_chiso ASC"));
		//print_r($array_nguong);
		
		$array_mota_chiso = $this->Cambien->find("list",array("fields"=>"ten,mota","order"=>"ten ASC"));
		$array_donvi_chiso = $this->Cambien->find("list",array("fields"=>"ten,donvi","order"=>"ten ASC"));
		
		
		
		$this->set('array_bieudo',$array_bieudo);
		$this->set('array_nguong',$array_nguong);
		$this->set('array_mota_chiso',$array_mota_chiso);
		$this->set('array_donvi_chiso',$array_donvi_chiso);
		$this->set('array_option_tram',$array_option_tram);
		$this->set('ten_tram',$ten_tram);
		$this->set('tu_ngay',$tu_ngay);
		$this->set('den_ngay',$den_ngay);
		$this->set('tu_gio',$tu_gio);
		$this->set('den_gio',$den_gio);
		$this->set('thangtruoc',$thangtruoc);
		$this->set('ngayhientai',$ngayhientai);
	}
	public function exel() 
	{
		//thiết lập để cakephp ko render ra view mặc định
		$this->autoRender = false;
		$str_current_date = date("d_m_Y_H_i_s");
		
		$tungay2 = $tugio2 = $denngay2 = $dengio2 = $tentram2 = $str_dieukien = "";
		if(isset($_GET["data"]))
		{
			$tungay2 =  $_GET["data"]["tu_ngay"];
			$tungay2 =	date("Y-m-d",strtotime($tungay2));
			$tugio2 =  $_GET["data"]["tu_gio"];
			$denngay2 =  $_GET["data"]["den_ngay"];
			$denngay2 =	date("Y-m-d",strtotime($denngay2));
			$dengio2 =  $_GET["data"]["den_gio"];
			$tentram2 =  $_GET["data"]["ten_tram"];
			$str_dieukien = "`ngay_gio` >= '$tungay2 $tugio2'  AND `ngay_gio` <= '$denngay2 $dengio2' AND `id_tram` = $tentram2";
			
		}
		
		$this->loadModel('Cambien');
		$array_mota_chiso = $this->Cambien->find("list",array("fields"=>"ten,mota","order"=>"ten ASC"));
		
		$array_donvi_chiso = $this->Cambien->find("list",array("fields"=>"ten,donvi","order"=>"ten ASC"));
		
		$this->loadModel('Dulieu');
		$array_dulieu = $this->Dulieu->find("all",array("order"=>"ngay_gio ASC","conditions"=>$str_dieukien));
		
		$this->loadModel('Nguongchiso');
		$array_nguong = $this->Nguongchiso->find("all",array("order"=>"ten_chiso,chiso_duoi ASC"));
		
		$str_chiso = "";
		//excel
		$file = "data_$str_current_date.xls";

				
					header('Content-Description: File Transfer');
					header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
					header('Content-Disposition: attachment; filename="'.basename($file).'"');
					header('Expires: 0');
					header('Cache-Control: must-revalidate');
					header('Pragma: public');

		$str_thoigian = "";
		
		foreach($array_dulieu as $dulieu)
		{
			
			$ten_tram = $dulieu["Dulieu"]["ten_tram"];	
			$quan = $dulieu["Dulieu"]["quan"];	
			$phuong = $dulieu["Dulieu"]["phuong"];	
			$thanh_pho = $dulieu["Dulieu"]["thanh_pho"];	
			$chiso = str_replace("\n","<br>",$dulieu["Dulieu"]["chi_so"]);
			$ngay = date("d-m-Y",strtotime($dulieu["Dulieu"]["ngay"]));
			$gio = date("H:i",strtotime($dulieu["Dulieu"]["gio"]));
			
			//cát chuỗi chỉ số thành mảng
			$array_chiso = explode("<br>", $chiso);
	
			$str_ten = "";
			$str_giatri = "";
			$str_giatri2 = count($array_chiso) - 1;
			$str_ten_chiso = "";
			$giatri_chiso = "";
			$str_mota_chiso = "";
			$str_donvi_chiso = "";
			
			//duyệt từng phần tử của mảng chí số để lấy giá trị và tên chỉ số
			for($i=0;$i<count($array_chiso);$i++)
			{
				$str_mota_chiso = "";
				$str_donvi_chiso = "";
				
				$str_ten_chiso = "";
				$giatri_chiso = "";
	
				$tmp_string = $array_chiso[$i];
				if($tmp_string != "")
				{
					//cát tmp_string để lấy chi so và giá trị chỉ số
					$tmp_array = explode(":", $tmp_string);
					
					//lấy tên chỉ số
					$str_ten_chiso = $tmp_array[0];
					$giatri_chiso = $tmp_array[1];
					//if($str_ten_chiso == "PH") $str_ten_chiso = "pH";
					
					if(isset($array_mota_chiso[$str_ten_chiso])) $str_mota_chiso = $array_mota_chiso[$str_ten_chiso];
					if(isset($array_donvi_chiso[$str_ten_chiso])) $str_donvi_chiso = $array_donvi_chiso[$str_ten_chiso];
					
					//so sánh với array_nguong để lấy màu ngưỡng
					$str_color = "";
					$str_mota = "";
					$str_chuthich_chiso = "";
					
					foreach($array_nguong as $nguong)
					{
						$ten_chiso = $nguong["Nguongchiso"]["ten_chiso"];
						$chiso_duoi = $nguong["Nguongchiso"]["chiso_duoi"];
						$chiso_tren = $nguong["Nguongchiso"]["chiso_tren"];
						$mota = $nguong["Nguongchiso"]["mota"];
						$mausac = $nguong["Nguongchiso"]["mausac"];	
						$chuthich = $nguong["Nguongchiso"]["chuthich"];	
						
						if(strtolower($str_ten_chiso) == strtolower($ten_chiso))
						{
							if(($giatri_chiso >= $chiso_duoi) && ($giatri_chiso < $chiso_tren)) 
							{
								$str_color = $mausac; 
								$str_mota = $mota; 
								$str_chuthich_chiso = $chuthich;	
							}
						}
					}
					if($str_color == "") $str_color = "blue";
					
					$str_ten .= "<th>$str_mota_chiso $str_donvi_chiso</th>";
					$str_giatri .= "<td style='text-align: center; color: $str_color;'>$giatri_chiso <span style='color: black'>($str_mota)</span></td>";
					//$str_canhbao .= "<td style='text-align: center;'>$str_mota</td>";
				}
			}
			$str_thoigian .= "<tr>
								<td style='text-align: left'>$ngay $gio</td>
								$str_giatri
							  </tr>";
		}
		$str_result = "<table border='1'  style='font-size: 17px'>
				<tr>
					<th>Tên trạm</th>
					<th style='text-align: center' colspan='$str_giatri2'>$ten_tram</th>
				</tr>
				<tr>	
					<th>Địa chỉ</th>
					<th style='text-align: center' colspan='$str_giatri2'>$phuong, $quan, $thanh_pho</th>
				</tr>
				
				<tr>	
					<th>Tên chỉ số</th>
					$str_ten
				</tr>	
					$str_thoigian
				</table>";
		
		echo $str_result;
	}	
	
}
