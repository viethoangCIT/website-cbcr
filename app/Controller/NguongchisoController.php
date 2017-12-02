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
class NguongchisoController extends AppController {

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
		$ten = "";
		$str_dieukien = "";
		$this->loadModel('Nguongchiso');
		$this->loadModel('Cambien');
		
		$array_cambien = NULL;
		$array_cambien = $this->Cambien->find("list",array("order"=>"ten ASC","fields"=>"ten,ten"));
		
		//kiểm tra có chỉ số không để tìm kiếm ngưỡng chỉ sô theo tên chỉ số
		if(isset($_GET["chiso"]))
		{
			$ten = $_GET["chiso"];
			$ten =	str_replace("'","",$ten);
			if($ten != "")
			{
				$str_dieukien = "Nguongchiso.ten_chiso = '$ten'";
			}
		}else
		{
			if($array_cambien != NULL)
			{
				//lấy key của phần tử đầu tiên của array_cambien
				$ten_dautien = key($array_cambien);
				$str_dieukien = "Nguongchiso.ten_chiso = '$ten_dautien'";	
			}
		}
		
		$array_nguong = $this->Nguongchiso->find("all",array("order"=>"id ASC","conditions"=>$str_dieukien));
		
		$this->set('array_nguong',$array_nguong);
		$this->set('array_cambien',$array_cambien);
		$this->set('ten',$ten);
	}
	public function nhap($ten_chiso = "",$id = "") 
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		
		$this->loadModel('Nguongchiso');
		$this->loadModel('Cambien');
		$array_cambien = $this->Cambien->find("list",array("order"=>"id DESC","fields"=>"ten,ten"));	
		
		$ten = $ma = $mota = $donvi = "";
		$array_chiso = NULL;
		
		if(isset($_POST["data"]))
		{
			//lấy dữ liệu từ ng` dùng đưa vào mẳng
			$array_luu = $_POST["data"]["nguong_chiso"];
			
			$ten = $array_luu["ten_chiso"];
			
			$array_chiso = $this->Cambien->find("all",array("order"=>"id DESC","conditions"=>"`ten` = '$ten'"));
			$ma = $array_chiso[0]["Cambien"]["ma"];
			$mota = $array_chiso[0]["Cambien"]["mota"];
			$donvi = $array_chiso[0]["Cambien"]["donvi"];
			
			$array_luu["ma_chiso"] = $ma;
			$array_luu["mota_chiso"] = $mota;
			$array_luu["donvi"] = $donvi;
			
			//luu du lieu vao database
			$this->Nguongchiso->save($array_luu);
			
			//chuyen ve lai trang danh sách
			$this->redirect(array("action"=>"index?chiso=$ten"));
			
			return;	
		}
		$array_sua = NULL;
		if($id != "")
		{
			$array_sua = $this->Nguongchiso->find("all",array("order"=>"id DESC","conditions"=>"id = '$id'"));	
		}
		$this->set('array_sua',$array_sua);
		$this->set('array_cambien',$array_cambien);
		$this->set('ten_chiso',$ten_chiso);
	}
	public function xoa($id = '')
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$this->loadModel('Nguongchiso');
		
		$this->Nguongchiso->delete($id);
		
		//chuyen ve lai trang xem thu
		$this->redirect(array("action"=>"index"));
	}
}
	
	
