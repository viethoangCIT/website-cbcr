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
class GiamsatmoitruongController extends AppController
{

	/**
	 * This controller does not use a model
	 *
	 * @var array
	 * 
	 */

	public $uses = array();

	var $helpers = array('Paginator','Html');
	var $paginate = array();
	

	/**
	 * Displays a view
	 *
	 * @return void
	 * @throws NotFoundException When the view file could not be found
	 *	or MissingViewException in debug mode.
	 */
	public function index($param = "") 
	{
		$this->loadModel('Data',"data");
		$this->loadModel('Thongso');
		
		$tu_ngay = "";
		$den_ngay = "";

		$gio_batdau = "00:00:00";
		$gio_ketthuc = "23:59:59";

		
		// kiểm tra nếu có tham số $param = "13h" thì đổi lại giá trị  $gio_batdau và $gio_ketthuc
		if($param == "13h")
		{
			
			$gio_batdau = "13:00:00";
			$gio_ketthuc = "13:59:59";
			

		}
		if(isset($_GET["tu_ngay"]))
		{
			$tu_ngay = $_GET["tu_ngay"];
			$den_ngay = $_GET["den_ngay"];

			$tu_ngay = date("Y-m-d",strtotime($tu_ngay));
			$den_ngay = date("Y-m-d",strtotime($den_ngay));	
		}


		else
		{
			if(isset ($_POST['data']))
			{
			$data = $_POST["data"];
			// print_r($date);
			$tu_ngay = $data['tu_ngay'];
			$den_ngay = $data['den_ngay'];
			$tu_ngay = date("Y-m-d",strtotime($tu_ngay));
			$den_ngay = date("Y-m-d",strtotime($den_ngay));	
			}
			//kiểm tra có tham sô date_form không, để lọc dữ liệu
			else
			{

				$tu_ngay = date("Y-m-d");
				$den_ngay = date("Y-m-d");
			}

		}


		// lấy điều kiện 13h
		$dk = "`time`>= '$tu_ngay $gio_batdau ' AND `time` <= '$den_ngay $gio_ketthuc '";


		

		
		  
			$page = 0;
			if(isset($_GET['page']))
			{
			 $page = $_GET['page'];
			}
			if(is_numeric($page) == false) $page = 1;
			
			//lấy số dòng trên 1 trang
			$sodong_1trang = 15 ;
			
			//lấy tống số dòng
			$num_row = $this->Data->find("all",(array('fields'=>array('COUNT(id) as num_row'),"conditions"=>array($dk))));

			//print_r($num_row);

			$num = $num_row[0][0]['num_row'];
			
			//lấy tổng số trang và làm tròn
			$tongso_trang = ceil($num/$sodong_1trang);
			

			if($page > $tongso_trang) $page = $tongso_trang;
			
			if($page < 1) $page = 1;
			
			
			
			//tính vị trí bắt đầu và kết thúc
			$start = ($page-1)*$sodong_1trang ;
			$end =  ($start + $sodong_1trang)-1;
		
			
			//truy vaasn tat ca du lieu
			$sql = "SELECT * FROM data  WHERE $dk  ORDER BY 'time' DESC  LIMIT $start,$sodong_1trang ";
			
			
			$array_data1 = $this->Data->query($sql);
		
		
		//print_r($array_data1);
	  		
	  		if(isset ($_GET["trangthai"]))
	  		{
	  			$trangthai = $_GET["trangthai"];
	  			$array_thongso = $this->Thongso->find("all",array("order"=>"id DESC"));
	  			$this->set('array_thongso',$array_thongso);
	  			$this->set('trangthai',$trangthai);	
	  		}
		

		//
		$sql_bieudo = "SELECT * FROM data  WHERE $dk  ORDER BY 'time' ASC  ";
	  	$array_data_bieudo = $this->Data->query($sql_bieudo);
	  	
	  	// BEGIN:  lấy dữ liệu nhiệt độ lớn nhất 
	  	$max_tmp = "";
	  	$sql_max_nhietdo = "SELECT * FROM data  WHERE $dk  ORDER BY 'time' DESC   ";
	  	$sql_max_nhietdo = "SELECT MAX(`tmp`) AS max_tmp FROM ($sql_max_nhietdo) AS nhietdo";
	  	$array_max_nhietdo = $this->Data->query($sql_max_nhietdo);
	  	if($array_max_nhietdo != null)
	  	{
	  		 $max_tmp = $array_max_nhietdo[0][0]["max_tmp"];
	  		
	  		
	  	}
	  	// END:  lấy dữ liệu nhiệt độ lớn nhất

	  	// BEGIN:  lấy dữ liệu nhiệt độ nhỏ nhất 
	  	$min_tmp = "";
	  	$dk_min_tmp = "(`tmp` IS NOT NULL) AND (`tmp` <> '') AND `type` = '0'";
	  	if($dk != "") $dk_min_tmp = $dk." AND $dk_min_tmp";
	  	$sql_min_nhietdo = "SELECT * FROM data  WHERE $dk_min_tmp ORDER BY 'time' DESC ";
	  	$sql_min_nhietdo = "SELECT MIN(`tmp`) AS min_tmp FROM ($sql_min_nhietdo) AS nhietdo";
	  	$array_min_nhietdo = $this->Data->query($sql_min_nhietdo);
	  	if($array_min_nhietdo != null)
	  	{
	  		 $min_tmp = $array_min_nhietdo[0][0]["min_tmp"];
	  		 if($min_tmp == "") $min_tmp = 0;
	  		
	  	}
	  	// END:  lấy dữ liệu nhiệt độ nhỏ nhất

	  	// BEGIN:  lấy dữ liệu lượng mưa lớn nhất 
	  	$max_rain = "";
	  	$sql_max_luongmua = "SELECT * FROM data  WHERE $dk  ORDER BY 'time' DESC ";
	  	$sql_max_luongmua = "SELECT MAX(`rain`) AS max_rain FROM ($sql_max_luongmua) AS luongmua";
	  	$array_max_luongmua = $this->Data->query($sql_max_luongmua);

	  	if($array_max_luongmua != null)
	  	{
	  		 $max_rain = $array_max_luongmua[0][0]["max_rain"];
	  		
	  		
	  	}
	  	// END:  lấy dữ liệu lượng mưa lớn nhất

	  	// BEGIN:  lấy dữ liệu lượng mưa nhỏ nhất 
	  	$min_rain = "";
	  	$dk_min_rain = "(`rain` IS NOT NULL) AND (`rain` <> '') AND `type` = '1'";
	  	if($dk != "") $dk_min_rain = $dk." AND $dk_min_rain";
	  	$sql_min_luongmua = "SELECT * FROM data  WHERE $dk_min_rain ORDER BY 'time' DESC";
	  	$sql_min_luongmua = "SELECT MIN(`rain`) AS min_rain FROM ($sql_min_luongmua) AS luongmua";
	  	$array_min_luongmua = $this->Data->query($sql_min_luongmua);
	  	if($array_min_luongmua != null)
	  	{
	  		 $min_rain = $array_min_luongmua[0][0]["min_rain"];
	  		 if($min_rain == "") $min_rain = 0;
	  		 
	  		
	  	}
	  	// END:  lấy dữ liệu lượng mưa nhỏ nhất

	  	// BEGIN:  lấy dữ liệu độ ẩm lớn nhất 
	  	$max_hum = "";
	  	$sql_max_doam = "SELECT * FROM data  WHERE $dk  ORDER BY 'time' DESC ";
	  	$sql_max_doam = "SELECT MAX(`hum`) AS max_hum FROM ($sql_max_doam) AS doam";
	  	$array_max_doam = $this->Data->query($sql_max_doam);
	  	if($array_max_doam != null)
	  	{
	  		 $max_hum = $array_max_doam[0][0]["max_hum"];
	  		
	  		
	  	}
	  	// END:  lấy dữ liệu độ ẩm lớn nhất

	  	// BEGIN:  lấy dữ liệu độ ẩm nhỏ nhất 
	  	$min_hum = "";
	  	$dk_min_hum = "(`hum` IS NOT NULL) AND (`hum` <> '') AND `type` = '0'";
	  	if($dk != "") $dk_min_hum = $dk." AND $dk_min_hum";

	  	$sql_min_doam = "SELECT *  FROM data  WHERE $dk_min_hum ORDER BY 'time' DESC ";
	  	$sql_min_doam = "SELECT MIN(`hum`) AS min_hum FROM ($sql_min_doam) AS doam";
	  	
	  	$array_min_doam = $this->Data->query($sql_min_doam);
	  	if($array_min_doam != null)
	  	{
	  		 $min_hum = $array_min_doam[0][0]["min_hum"];
	  		 if($min_hum == "") $min_hum = 0;
	  		
	  		
	  	}
	  	// END:  lấy dữ liệu độ ẩm nhỏ nhất


	  	$this->set('page', $page);
	  	$this->set('tongso_trang', $tongso_trang);
	  	$this->set('min_tmp', $min_tmp);
	  	$this->set('max_tmp', $max_tmp);
	  	$this->set('min_rain', $min_rain);
	  	$this->set('max_rain', $max_rain);
	  	$this->set('min_hum', $min_hum);
	  	$this->set('max_hum', $max_hum);
	  
		$this->set('array_data1',$array_data1);
		$this->set('tu_ngay',$tu_ngay);
		$this->set('den_ngay',$den_ngay);
		$this->set('array_data_bieudo',$array_data_bieudo);
		$this->set('param',$param);	
	}

	public function excel($param = "") 
	{

		//ép dữ liệu để tải file  về máy.
		$file_url = "dulieu_moitruong.xls";
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
		$this->loadModel('Data',"data");
		
		
		$gio_batdau = "00:00:00";
		$gio_ketthuc = "23:59:59";

		
		// kiểm tra nếu có tham số $param = "13h" thì đổi lại giá trị  $gio_batdau và $gio_ketthuc
		if($param == "13h")
		{
			$gio_batdau = "13:00:00";
			$gio_ketthuc = "13:59:59";
		}


		

		$tu_ngay = "";
		$den_ngay = "";

		if(isset($_GET["tu_ngay"]))
		{
			$tu_ngay = $_GET["tu_ngay"];
			$den_ngay = $_GET["den_ngay"];
			$tu_ngay = date("Y-m-d",strtotime($tu_ngay));
			$den_ngay = date("Y-m-d",strtotime($den_ngay));	
		}
		//kiểm tra có tham sô date_form không, để lọc dữ liệu
		else{

			$tu_ngay = date("Y-m-d");
			$den_ngay = date("Y-m-d");
		}



		// lấy điều kiện 13h
		$dk = "`time`>= '$tu_ngay $gio_batdau ' AND `time` <= '$den_ngay $gio_ketthuc '";


		
 		$array_data = $this->Data->find("all",array('conditions'=>array($dk),"order"=>"time DESC"));

		$this->set('tu_ngay',$tu_ngay);
		$this->set('den_ngay',$den_ngay);
		$this->set('array_data',$array_data);
		
		$this->set('param',$param);

		// không cho hiển thị các code html trong layout
		$this->layout = false;
	}

}


