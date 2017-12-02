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
class CanhbaoController extends AppController {

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
	public function index($id = "") 
	{
		$this->loadModel('Vuchay');
		$this->loadModel('Syncui',"syncuis");
		if(isset($_POST['data']))
		{
			//lấy dữ liệu từ browser sumit lên
			$data = $_POST['data'];
			// $date = date('Y/m/d' );

			$date = date('Y-m-d H:i:s');
			$data['ngay']  = $date;

			
			if($data["smoke status"]==0) $sql_smoke_status = "UPDATE `syncuis` SET `value1`= 0  WHERE `id` = 4";
			$this->Syncui->query($sql_smoke_status);
			

			$this->Vuchay->save($data);
			// $this->redirect(array("action"=>"/home"));
			 //print_r($data);
		}



		// sửa
		$array_edit_canhbao = null;
		if($id !="")
		{
			$array_edit_canhbao = $this->Vuchay->find("all",array("conditions"=>array("id = '$id'")));
		}


		//lấy tọa độ vụ cháy
		$toado_x = "";
		$toado_y = "";

		//đọc dữ liệu video từ bảng syncuis
		$sql_toado = "SELECT value1,value2 FROM syncuis WHERE var_name = 'smoke_real_coor'";
		$array_taodo = $this->Vuchay->query($sql_toado);

		// lấy đường link video
		$toado_x = $array_taodo[0]["syncuis"]["value1"];
		$toado_y = $array_taodo[0]["syncuis"]["value2"];

		//truy vẫn dữ liệu vuchays theo trường status để hiển thị ra from lưu thông tin vụ cháy
		$sql_thongtin_vuchay="";
		$sql_thongtin_vuchay = "SELECT * FROM `vuchays` WHERE status = 0";
		$array_thongtin_vuchay = $this->Vuchay->query($sql_thongtin_vuchay);

		//lấy thông tin video từ bảng syncuis, trường value2
		$link_video = "";
		$sql_video = "";
		$sql_video = "SELECT value2 FROM `syncuis` WHERE var_name='smoke status'";
		$array_link_video = $this->Vuchay->query($sql_video);
		$link_video = $array_link_video[0]["syncuis"]["value2"];
		$this->set('link_video',$link_video);


		$this->set('array_thongtin_vuchay',$array_thongtin_vuchay);
		$this->set('array_edit_canhbao',$array_edit_canhbao);
		$this->set('toado_x',$toado_x);
		$this->set('toado_y',$toado_y);
		 // $array_vuchay = $this->Vuchay->find("all");

	}
	public function phatlenh() 
	{
			
	}
	public function kiemtra() 
	{
		$this->loadModel('Syncui',"syncui");

		//lấy giá trị value của từ khóa fire trong bảng config
		$array_config = $this->Syncui->find("all",array("conditions"=>array("`var_name` = 'smoke status'")));
		$value = "";

		
		if ($array_config != NULL) {
			$value = $array_config["0"]["Syncui"]["value1"];
		}
		
		echo $value;
		$this->autoRender = false;
	}
	
}
	
	
