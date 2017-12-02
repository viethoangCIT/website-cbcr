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
class BandoController extends AppController {

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
		$this->loadModel('Hotro');
		$this->loadModel('Vuchay');
		$this->loadModel('Config');

	
		// print_r($array_hotro);
		$array_vuchay = $this->Vuchay->find("all",array("fields"=>"id,toadox,toadoy","order"=>"id DESC"));
		$array_config = $this->Config->find("all",array("fields"=>"value","conditions"=>"code = 'fire'"));

		//lấy tọa độ vụ cháy
		$toado_x = "";
		$toado_y = "";
		$trangthai = "";

		//đọc dữ liệu video từ bảng syncuis
		$sql_toado = "SELECT value1,value2 FROM syncuis WHERE var_name = 'smoke_real_coor'";
		$array_toado = $this->Vuchay->query($sql_toado);

		//đọc dữ liệu smoke status từ bảng syncuis
		$sql_trangthai = "SELECT value1 FROM syncuis WHERE var_name = 'smoke status'";
		$array_trangthai = $this->Vuchay->query($sql_trangthai);

		// lấy đường link video
		$toado_x = $array_toado[0]["syncuis"]["value1"];
		$toado_y = $array_toado[0]["syncuis"]["value2"];
		$trangthai = $array_trangthai[0]["syncuis"]["value1"];

		$this->set('toado_x',$toado_x);
		$this->set('toado_y',$toado_y);
		$this->set('trangthai',$trangthai);
		
		$this->set('array_config',$array_config);
		$this->set('array_vuchay',$array_vuchay);
		 //print_r($array_vuchay);

		 $sodong_1trang = 20;

		//Begin: truy vấn dữ liệu trang hiện tại theo số dòng một trang
		 //lấy tham số page
		 $page = "";
		if(isset($_GET["page"])) $page = $_GET["page"];
		 
		if(!is_numeric($page)) $page = 1;

		if($page <1) $page = 1;
		$vitri_batdau = ($page -1)*$sodong_1trang;
		$sql_hotro = "SELECT * FROM hotros as Hotro ORDER BY `id` DESC LIMIT $vitri_batdau, $sodong_1trang";
		//End: truy vấn dữ liệu trang hiện tại theo số dòng một trang

		//Lấy tổng số dòng, tính tổng số trang để tạo thanh paginator
		$sql_tongsodong = "SELECT COUNT(id) as tong_sodong FROM hotros as Hotro";
		$array_tong_sodong = $this->Hotro->query($sql_tongsodong);

		$tong_sodong ="";
		if($array_tong_sodong)	$tong_sodong = $array_tong_sodong[0][0]["tong_sodong"];
		
		//tính tổng số trang
		$tong_sotrang = ceil($tong_sodong/$sodong_1trang);



		$array_hotro = $this->Hotro->query($sql_hotro);
		$this->set('array_hotro',$array_hotro);
		$this->set("tong_sotrang",$tong_sotrang);
		$this->set('page',$page);
	}
	public function add($id="") 
	{
		//tạo model Hotro liên kết với bảng firmwares
		$this->loadModel('Hotro');

		if(isset($_POST['data']))
		{
			//lấy dữ liệu từ browser sumit lên
			$data = $_POST['data'];

			  // print_r($data);
			//lưu dữ liệu vào bảng hotros
			 $this->Hotro->save($data);
		}


		// sửa
		//truy vấn dữ liệu sản phẩm hiện tại theo id để đưa vào form nhập 
		$array_edit_hotro = null;
		if($id !="")
		{
			$array_edit_hotro = $this->Hotro->find("all",array("conditions"=>array("id = '$id'")));
		}

		// đưa biến array_firmware qua view 
		
		$this->set('array_edit_hotro',$array_edit_hotro);

	}
	

	// xóa 
	 public function del($id="")
	 {
	 	if ($id != "")
	 	{
	 		// xóa  theo id
   			$this->loadModel("Hotro");
    		$this->Hotro->delete($id);

    		// chuyển về trang index
    		$this->redirect(array("action"=>"index"));
     		
		}
	}
	
}
	
	
