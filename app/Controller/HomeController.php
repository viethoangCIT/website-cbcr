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
class HomeController extends AppController {

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

		$this->loadModel('Data',"data");
		$this->loadModel('Vuchay');
		$this->loadModel('Thongso');
		
		if(isset($_POST['data']))
		{
			//lấy dữ liệu từ browser sumit lên
			$data = $_POST['data'];
			$date = date('Y/m/d');
			$data['Thongso']['ngay']  = $date;
			


			$id_capdubao = $data['Thongso']['id_capdubao'];	
			$array_data_capdubao = null;
			$array_data_capdubao["fire"] = $id_capdubao;
			$array_data_capdubao["type"] = 0;
			//lấy ngày giời hiện tại, giờ phút giây hiện tại
			$array_data_capdubao["time"] = date("Y-m-d H:i:s");

			
			$this->Data->create();
			$this->Data->save($array_data_capdubao);



			



			//Lưu hướng gió vào bảng data
			//kiểm tra nếu có dữ liệu huonggio_13 thi lưu vào bảng data
			if($data["Thongso"]["huonggio_13"] != "")
			{
				$array_data13h = null;
				//lấy hướng gió lúc 13h
				$array_data13h["wind"] = $data["Thongso"]["huonggio_13"];
			
				//lấy giờ hiện tại
				$array_data13h["time"] = date("Y-m-d 13:00:00");
				$array_data13h["type"] = 0; 

				$this->Data->create();
				$this->Data->save($array_data13h);
			}
			
			

			//lưu dữ liệu hướng gió của giờ hiện tại
			
			//kiểm tra nếu có dữ liệu huonggio thi lưu vào bảng data
			if($data["Thongso"]["huonggio"] != "")
			{
				$array_data_giohientai = null;
				$array_data_giohientai["wind"] = $data["Thongso"]["huonggio"];
				$array_data_giohientai["type"] = 0; 
				//lấy ngày giời hiện tại, giờ phút giây hiện tại
				$array_data_giohientai["time"] = date("Y-m-d H:i:s");
				
				$this->Data->create();
				$this->Data->save($array_data_giohientai);
			}
			
						
			//$this->redirect("/giamsatmoitruong/index?trangthai=1");
		}

		$ngay_hientai = date("Y-m-d");
		$gio_batdau_13h = "13:00:00";
		$gio_ketthuc_13h = "13:59:59";

		$gio_batdau_moinhat = "00:00:00";
		$gio_ketthuc1_moinhat = "23:59:59";


		// lấy điều kiện 13h
		$dk_13h = "`time`>= '$ngay_hientai $gio_batdau_13h ' AND `time` <= '$ngay_hientai $gio_ketthuc_13h '";

		// $array_data_13h = $this->Data->find("all",array('conditions'=>array($dk),"order"=>"time DESC"));
		// $dk1 = "";

		//lấy nhiệt độ 13h
		$nhietdo_13h = "";
		$sql_nhietdo_13h =  "SELECT `tmp` FROM `data` WHERE `tmp` <> '' AND $dk_13h ORDER BY `time` DESC LIMIT 1 ";
		$array_nhietdo_13h = $this->Data->query($sql_nhietdo_13h);
		if($array_nhietdo_13h)	$nhietdo_13h = $array_nhietdo_13h[0]["data"]["tmp"];

		//lấy độ ẩm 13h
		$doam_13h = "";
		$sql_doam_13h =  "SELECT `hum` FROM `data` WHERE `hum` <> '' AND $dk_13h ORDER BY `time` DESC LIMIT 1 ";
		$array_doam_13h = $this->Data->query($sql_doam_13h);
		if($array_doam_13h)	$doam_13h = $array_doam_13h[0]["data"]["hum"];

		//lấy lượng mưa 13h
		$luongmua_13h = "";
		$sql_luongmua_13h =  "SELECT `rain` FROM `data` WHERE `rain` <> '' AND $dk_13h ORDER BY `time` DESC LIMIT 1 ";
		$array_luongmua_13h = $this->Data->query($sql_luongmua_13h);
		if($array_luongmua_13h)	$luongmua_13h = $array_luongmua_13h[0]["data"]["rain"];

		//lấy hướng gió 13h
		$huonggio_13h = "";
		$sql_huonggio_13h =  "SELECT `wind` FROM `data` WHERE `wind` <> '' AND $dk_13h ORDER BY `time` DESC LIMIT 1 ";
		$array_huonggio_13h = $this->Data->query($sql_huonggio_13h);
		if($array_huonggio_13h)	$huonggio_13h = $array_huonggio_13h[0]["data"]["wind"];


			// truy vấn theo thời gian lớn nhất hiện tại
		//$dk1 = "(`time`>= '$ngay_hientai $gio_batdau_moinhat 'AND `time`< '$ngay_hientai $gio_batdau_moinhat ') OR (`time` > '$ngay_hientai $gio_ketthuc ' AND `time` <= '$ngay_hientai $gio_ketthuc1 ') ";
		
		//lấy nhiệt độ mới nhất
		$nhietdo_moinhat = "";
		$sql_nhietdo_moinhat =  "SELECT `tmp` FROM `data` WHERE `tmp` <> '' ORDER BY `time` DESC LIMIT 1 ";
		$array_nhietdo_moinhat = $this->Data->query($sql_nhietdo_moinhat);
		if($array_nhietdo_moinhat)	$nhietdo_moinhat = $array_nhietdo_moinhat[0]["data"]["tmp"];
		
		//lấy độ ẩm mới nhất
		$doam_moinhat = "";
		$sql_doam_moinhat =  "SELECT `hum` FROM `data` WHERE `hum` <> '' ORDER BY `time` DESC LIMIT 1 ";
		$array_doam_moinhat = $this->Data->query($sql_doam_moinhat);
		if($array_doam_moinhat) $doam_moinhat = $array_doam_moinhat[0]["data"]["hum"];

		//lấy lượng mưa mới nhất
		$luongmua_moinhat = "";
		$sql_luongmua_moinhat =  "SELECT `rain` FROM `data` WHERE `rain` <> '' ORDER BY `time` DESC LIMIT 1 ";
		$array_luongmua_moinhat = $this->Data->query($sql_luongmua_moinhat);
		if($array_luongmua_moinhat)	$luongmua_moinhat = $array_luongmua_moinhat[0]["data"]["rain"];

		//lấy hướng gió mơi nhất
		$huonggio_moinhat = "";
		$sql_huonggio_moinhat =  "SELECT `wind` FROM `data` WHERE `wind` <> '' ORDER BY `time` DESC LIMIT 1 ";
		$array_huonggio_moinhat = $this->Data->query($sql_huonggio_moinhat);
		if($array_huonggio_moinhat) $huonggio_moinhat = $array_huonggio_moinhat[0]["data"]["wind"];

		 //print_r($array_results);
			
		//tính tổng diện tích thiệt hại 
		// $sql_tong = "SELECT id,ngay,xa,huyen,video, (dientich_rungtrong+dientich_rungtrong+dientich_rungtrong+dientich_rungtrong) as tong FROM vuchays ORDER BY id DESC LIMIT 3";
		// $array_vuchay = $this->Vuchay->query($sql_tong);
		//print_r($array_vuchay);

		//lấy cấp đô dự báo cháy rừng bản thongsos với ngày hiện tại
		$ngay = date("Y-m-d");

		$dk2  = "`ngay`= '$ngay'";
		$sql_capbao_chayrung_moinhat = "SELECT `fire` FROM `data` WHERE `fire` <> '' ORDER BY id DESC LIMIT 1";
		$array_capdubao_chayrung = $this->Data->query($sql_capbao_chayrung_moinhat);
		 //print_r($array_capdubao_chayrung);


		$sodong_1trang = 3;

		//Begin: truy vấn dữ liệu trang hiện tại theo số dòng một trang
		 //lấy tham số page
		$page = "";
		if(isset($_GET["page"])) $page = $_GET["page"];
		 
		if(!is_numeric($page)) $page = 1;

		if($page <1) $page = 1;
		$vitri_batdau = ($page -1)*$sodong_1trang;
		//$sql_hotro = "SELECT * FROM vuchays as Vuchay ORDER BY `id` DESC LIMIT $vitri_batdau, $sodong_1trang";
		//End: truy vấn dữ liệu trang hiện tại theo số dòng một trang

		$sql_tong = "SELECT id,ngay,xa,huyen,video, (dientich_rungtrong+dientich_rungtrong+dientich_rungtrong+dientich_rungtrong) as tong FROM vuchays as Vuchay ORDER BY `id` DESC LIMIT $vitri_batdau, $sodong_1trang";
		//$array_vuchay = $this->Vuchay->query($sql_tong);

		//Lấy tổng số dòng, tính tổng số trang để tạo thanh paginator
		$sql_tongsodong = "SELECT COUNT(id) as tong_sodong FROM vuchays as Vuchay";
		$array_tong_sodong = $this->Vuchay->query($sql_tongsodong);

		$tong_sodong ="";
		if($array_tong_sodong)	$tong_sodong = $array_tong_sodong[0][0]["tong_sodong"];
		
		//tính tổng số trang
		$tong_sotrang = ceil($tong_sodong/$sodong_1trang);


		$array_hotro = $this->Vuchay->query($sql_tong);
		$this->set('array_hotro',$array_hotro);
		$this->set("tong_sotrang",$tong_sotrang);
		$this->set('page',$page);

		//truyền sang view nhiệt độ lúc 13h
		$this->set('nhietdo_13h',$nhietdo_13h);
		$this->set('doam_13h',$doam_13h);
		$this->set('luongmua_13h',$luongmua_13h);
		$this->set('huonggio_13h',$huonggio_13h);
		
		$this->set('nhietdo_moinhat',$nhietdo_moinhat);
		$this->set('doam_moinhat',$doam_moinhat);
		$this->set('luongmua_moinhat',$luongmua_moinhat);
		$this->set('huonggio_moinhat',$huonggio_moinhat);


		//$this->set('array_vuchay',$array_vuchay);
		$this->set('array_capdubao_chayrung',$array_capdubao_chayrung);

		 
	}
	public function nhap() 
	{
		
	}
	public function edit($id = "") 
	{

		$this->loadModel('Vuchay');

		// sửa
		$array_edit_vuchay = null;
		if($id !="")
		{
			
		$array_edit_vuchay = $this->Vuchay->find("all",array("conditions"=>array("id = '$id'")));
		}
		//print_r($array_edit_vuchay);
		$this->set('array_edit_vuchay',$array_edit_vuchay);
	}

	public function phatlenh() 
	{
		$this->loadModel('Group');
		$this->loadModel('Thanhvien');

		if(isset($_POST['data']))
		{
			//lấy dữ liệu từ browser sumit lên
			$data = $_POST['data'];
			$id_group1 = $_POST['data']['id_group'];
			$this->set('data',$data);
		//print_r($data);
		}

			$dk =  "";
			$id_group = "";
			// $data = $_POST['data']['Thanhvien']['id_group'];
			if(isset($id_group1) && $id_group1 !="")
			{
				$id_group = $id_group1;
				
				$dk .= " id_group = '$id_group'";
				
			}

			
			$array_thanhvien = $this->Thanhvien->find("all",array("fields"=>"id,phone","conditions"=>array("$dk")));
		

		$array_group1 = $this->Group->find("all",array("fields"=>"id,name"));
		$this->set('array_group1',$array_group1);
		$this->set('array_thanhvien',$array_thanhvien);
		
		//print_r($array_thanhvien);
	}
	public function chitiet($param = "") 
	{
		$this->loadModel('Thongso');
		$this->loadModel('Vuchay');
		$this->loadModel('Syncui',"syncuis");
		
		if(isset($_POST['data']))
		{
			//lấy dữ liệu từ browser sumit lên
			$data = $_POST['data'];
			$date = date('Y-m-d H:i:s');
			$data['ngay']  = $date;
			//print_r($data);

			$smoke_status = null;
			$smoke_status["id"] = 4;
			$smoke_status["var_name"] = "smoke status";
			$smoke_status["value1"] = $data["smoke status"];
			$smoke_status["value2"] = $data["video"];

			if($smoke_status != null)
			{
				$this->Syncui->create();
				$this->Syncui->save($smoke_status);
			}

			$this->Vuchay->create();
			$this->Vuchay->save($data);
		}
		$dk = "";
		if($param != "") $dk = "WHERE `id`=$param";
		
		$sql_leftjoin = "SELECT * FROM vuchays $dk ORDER BY ngay DESC ";
		$array_vuchay = $this->Vuchay->query($sql_leftjoin);
		// print_r($array_vuchay);
		$this->set('array_vuchay',$array_vuchay);
	}
	public function del($id="")
	{
	 	if ($id != "")
	 	{
	 		// xóa  theo id
   			$this->loadModel("Vuchay");
    		$this->Vuchay->delete($id);

    		// chuyển về trang index
    		$this->redirect(array("action"=>"chitiet"));
     		// $this->redirect('/Firmware/index.html');
		}
	 }
	 public function excel()
	 {

	 	// ép dữ liệu để trình duyệt tải xuống máy không dữ liệu hiển thị ra máy
		$file_url = "dulieu_thongtin_vuchay.xls";
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");

		
		$this->loadModel('Thongso');
		$this->loadModel('Vuchay');
		
		// $sql_leftjoin ="SELECT vuchays.*, T.`ngay`, T.`tmp`,T.`hum`,T.`rain`,T.`huonggio`,T.`capdubao`FROM vuchays LEFT JOIN (SELECT tmp,hum,rain,huonggio,capdubao,ngay FROM thongsos) AS T ON vuchays.`ngay` = T.`ngay` ";
		$sql_leftjoin = "SELECT * from `vuchays` ORDER BY `id` DESC ";



		//print_r($sql_leftjoin);
		 
		  $array_vuchay = $this->Vuchay->query($sql_leftjoin);
		  
		 // print_r($array_results);
		  $this->set('array_vuchay',$array_vuchay);

		// không cho hiển thị các code html trong layout
		$this->layout = false;
	}

	public function status()
	{
		$this->loadModel('Vuchay');
		$this->loadModel('Syncui',"syncuis");
		

		//truy van du lieu toadox, toadoy, video tu bang syncuis de luu khi xac nhan vu chay = 0
		$sql_toado = "SELECT value1,value2 FROM syncuis WHERE var_name = 'smoke_real_coor'";
		$array_toado = $this->Syncui->query($sql_toado);

		$sql_video = "SELECT value2 FROM syncuis WHERE var_name = 'smoke status'";
		$array_video = $this->Syncui->query($sql_video);

		$toado_x ="";
		$toado_y = "";
		$name_video = "";

		if($array_toado)
		{
			$toado_x = $array_toado[0]["syncuis"]["value1"];
			$toado_y = $array_toado[0]["syncuis"]["value2"];
		}
		
		if($array_video)
		{
			$name_video = $array_video[0]["syncuis"]["value2"];
		}


		$array_vuchay = null;
		$array_vuchay["toadox"] = $toado_x;
		$array_vuchay["toadoy"] = $toado_y;
		$array_vuchay["video"] = $name_video;
		$array_vuchay["ngay"] = date("Y-m-d H:i:s");
		$array_vuchay["status"] = 1;

		if($array_vuchay != null)
		{
			$this->Vuchay->create();
			$this->Vuchay->save($array_vuchay);
		}



			$smoke_status = null;
			$smoke_status["id"] = 4;
			$smoke_status["var_name"] = "smoke status";
			$smoke_status["value1"] = 0;
			
			$this->Syncui->save($smoke_status);
			$this->redirect('/home');
	}
}
	
	
