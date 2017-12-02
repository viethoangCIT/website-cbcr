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
class QuanlychisoController extends AppController {

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
		$this->loadModel('Cambien');
		if(isset($_GET["data"]))
		{
			$ten = $_GET["data"]["ten"];
			$ten =	str_replace("'","",$ten);
			if($ten != 0)
			{
				$str_dieukien .= "Cambien.id = '$ten'";
			}
		}
		
		$this->paginate = array(
				'conditions' => array($str_dieukien),	
			     'limit' => 10,
				 'order' => array('Cambien.id' => 'ASC'),
				 
		     );
			
		$array_chiso = $this->paginate('Cambien');
		
		$array_combo_ten = $this->Cambien->find("all",array("field"=>"id,ten","order"=>"ten ASC"));
		$array_option_ten = NULL;
		$array_option_ten[0] = "Tất cả";
		foreach($array_combo_ten as $combo_ten)
		{
		   $array_option_ten[$combo_ten["Cambien"]["id"]] =  $combo_ten["Cambien"]["ten"];
		}
		
		$this->set(compact('array_chiso'));	
		$this->set('ten',$ten);
		$this->set('array_option_ten',$array_option_ten);
	}
	public function nhap($id = "") 
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$this->loadModel('Cambien');
		if(isset($_POST["data"]))
		{
			//lấy dữ liệu từ ng` dùng đưa vào mẳng
			$array_luu = $_POST["data"]["cambien"];
			
			
			//luu du lieu vao database
			$this->Cambien->save($array_luu);
			
			//chuyen ve lai trang danh sách
			$this->redirect(array("action"=>"index"));
			
			return;	
		}
		$array_sua = NULL;
		if($id != "")
		{
			$array_sua = $this->Cambien->find("all",array("order"=>"id DESC","conditions"=>"id = '$id'"));	
		}
		$this->set('array_sua',$array_sua);
	}
	public function xoa($id = '')
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$this->loadModel('Cambien');
		
		$this->Cambien->delete($id);
		
		//chuyen ve lai trang xem thu
		$this->redirect(array("action"=>"index"));
	}
}
	
	
