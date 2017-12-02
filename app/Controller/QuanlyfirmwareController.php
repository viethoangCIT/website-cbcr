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
class QuanlyfirmwareController extends AppController {

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
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$ten_tram = $quan = $phuong = $diachi = $thanhpho = $toado = "";
		$str_dieukien = "";
		$this->loadModel('Firmware');
		
			//echo $str_dieukien;
		$this->paginate = array(
				'conditions' => array($str_dieukien),	
			     'limit' => 10,
				 'order' => array('Firmware.id' => 'DESC'),
				 
		     );
			// $this->paginate->options(array('url' => array('?' => http_build_query($urlParams))));
		$array_firmware = $this->paginate('Firmware');
		
		
		
		$this->set(compact('array_firmware'));	
		
		
	}
	public function nhap($id = "") 
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$this->loadModel('Firmware');
		
		if(isset($_POST["data"]))
		{
			//lấy dữ liệu từ ng` dùng đưa vào mẳng
			$array_luu = $_POST["data"]["firmware"];
			$array_luu["firmware_date"] = date("Y-m-d",strtotime($array_luu["firmware_date"]));
			
			$this->Firmware->updateAll(array('status'=>0));
			
			//luu du lieu vao database
			$this->Firmware->save($array_luu);
			
			//chuyen ve lai trang danh sách
			$this->redirect(array("action"=>"index"));
			
			return;	
		}
		$array_sua = NULL;
		if($id != "")
		{
			$array_sua = $this->Firmware->find("all",array("order"=>"id DESC","conditions"=>"id = '$id'"));	
		}
		$this->set('array_sua',$array_sua);
	}
	public function xoa($id = '')
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$this->loadModel('Firmware');
		
		$array_sua = $this->Firmware->find("all",array("order"=>"id DESC","conditions"=>"id = '$id'"));	
		$url2 =  "files/".$array_sua[0]["Firmware"]["url"];
		if(file_exists($url2))
		{
			unlink($url2);
		}
		
		$this->Firmware->delete($id);
		
		//chuyen ve lai trang xem thu
		$this->redirect(array("action"=>"index"));
	}
	
}
	
	
