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
class QuanlyuserController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Diluulays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() 
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$tim = "";
		$this->loadModel('User');
		if(isset($_GET["tim"]))
		{
			$tim = $_GET["tim"];	
			$tim = str_replace("'","",$tim);
		}
		//$array_user = $this->User->find("all",array("order"=>"fullname ASC"));
		$this->paginate = array(
				'conditions' => array("(User.fullname LIKE '%$tim%') OR (User.username LIKE '%$tim%') OR (User.email LIKE '%$tim%')" ),	
			     'limit' => 10,
				 'order' => array('User.fullname' => 'ASC'),
				 
		     );
			// $this->paginate->options(array('url' => array('?' => http_build_query($urlParams))));
		$array_user = $this->paginate('User');
		$this->set(compact('array_user'));
		//$this->set('array_user',$array_user);
		
		
	}
	public function nhap($id = "") 
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$this->loadModel('User');
		if(isset($_POST["data"]))
		{
			//lấy dữ liệu từ ng` dùng đưa vào mẳng
			$array_luu = $_POST["data"]["user"];
			if(isset($array_luu["password"])) $array_luu["password"] = md5($array_luu["password"]);
			
			//luu du lieu vao database
			$this->User->save($array_luu);
			
			//chuyen ve lai trang danh sách
			$this->redirect(array("action"=>"index"));
			
			return;	
		}
		$array_sua = NULL;
		if($id != "")
		{
			$array_sua = $this->User->find("all",array("order"=>"fullname DESC","conditions"=>"id = '$id'"));	
		}
		$this->set('array_sua',$array_sua);
	}
	public function xoa($id = '')
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$this->loadModel('User');
		
		$this->User->delete($id);
		
		//chuyen ve lai trang xem thu
		$this->redirect(array("action"=>"index"));
	}
	public function doimatkhau($id = '')
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$pass = $userpass = $msg = "";
		$this->loadModel('User');
		$array_user = $this->User->find("all",array("conditions"=>"id = '$id'"));
		//print_r($array_user);
		$pass = $array_user[0]["User"]["password"];
		if(isset($_POST["passcu"]))
		{
			$userpass = md5($_POST["passcu"]);	
			if($pass == $userpass)
			{
				$array_luu["password"] = md5($_POST["repass"]);
				$array_luu["id"] = $id;
				$this->User->save($array_luu);
				$this->redirect(array("action"=>"index"));
			}else
			{
				$msg = "false";	
			}
		}
		//$array_kiemtra = NULL;
		
		//chuyen ve lai trang xem thu
		//$this->redirect(array("action"=>"index"));
		$this->set('msg',$msg);
		$this->set('id',$id);
	}
}
