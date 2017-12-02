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
class QuanlytramController extends AppController {

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
		$this->loadModel('Tram');
		if(isset($_GET["data"]))
		{
			$ten_tram = $_GET["data"]["ten_tram"];
			$ten_tram =	str_replace("'","",$ten_tram);
			if($ten_tram != 0)
			{
				$str_dieukien .= "Tram.id = '$ten_tram'";
			}
		}
			//echo $str_dieukien;
		$this->paginate = array(
				'conditions' => array($str_dieukien),	
			     'limit' => 10,
				 'order' => array('Tram.id' => 'DESC'),
				 
		     );
			// $this->paginate->options(array('url' => array('?' => http_build_query($urlParams))));
		$array_dulieu = $this->paginate('Tram');
		
		$array_combo_tram = $this->Tram->find("all",array("field"=>"id,ten","order"=>"ten ASC"));
		$array_option_tram = NULL;
		$array_option_tram[0] = "Tất cả";
		foreach($array_combo_tram as $combo_tram)
		{
		   $array_option_tram[$combo_tram["Tram"]["id"]] =  $combo_tram["Tram"]["ten"];
		}
		
		//lấy danh sách user
		$this->loadModel('User');
		$array_user = $this->User->find("list",array("fields"=>"phone,fullname","order"=>"fullname ASC"));
		
		$this->set(compact('array_dulieu'));	
		$this->set('ten_tram',$ten_tram);
		
		$this->set('array_option_tram',$array_option_tram);
		$this->set('array_user',$array_user);
		
	}
	public function nhap($id = "") 
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$this->loadModel('Tram');
		
		$array_sua = NULL;
		
		if(isset($_POST["data"]))
		{
			//lấy dữ liệu từ ng` dùng đưa vào mẳng
			$array_luu = $_POST["data"]["tram"];
			$array_luu["trangthai"] = "1";
			
			$array_nguoiquanli = NULL;
			if(isset($array_luu["nguoi_quan_li"])) $array_nguoiquanli = $array_luu["nguoi_quan_li"];
			$phone_nguoiquanli = "";
			if($array_nguoiquanli != NULL)
			{
				for($i = 0; $i < count($array_nguoiquanli); $i++)	
				{
					if($phone_nguoiquanli != "") $phone_nguoiquanli .= ",";
					$phone_nguoiquanli .= $array_nguoiquanli[$i];
				}
			}
			
			if($phone_nguoiquanli != "") $array_luu["phone_manager"] = ",".$phone_nguoiquanli.",";
			else $array_luu["phone_manager"] = "";
			
			//luu du lieu vao database
			$this->Tram->save($array_luu);
			
			//chuyen ve lai trang danh sách
			$this->redirect(array("action"=>"index"));
			
			return;	
		}
		
		$this->loadModel('User');
		$array_user = $this->User->find("all",array("field"=>"fullname,phone","order"=>"fullname ASC"));	
		
		if($id != "")
		{
			$array_sua = $this->Tram->find("all",array("order"=>"id DESC","conditions"=>"id = '$id'"));	
		}
		
		$this->set('array_sua',$array_sua);
		$this->set('array_user',$array_user);
	}
	public function xoa($id = '')
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$this->loadModel('Tram');
		
		$this->Tram->delete($id);
		
		//chuyen ve lai trang xem thu
		$this->redirect(array("action"=>"index"));
	}
	public function duyet($id = '')
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$this->loadModel('Tram');
		
		$this->Tram->updateAll(array('trangthai'=>1), array('Tram.id'=>$id));
		
		$this->redirect(array('action'=>'index'));
	}
	public function thuhoi($id = '')
	{
		//nếu chưa đăng nhập chuyển về trang login
		if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		$this->loadModel('Tram');
		
		$this->Tram->updateAll(array('trangthai'=>0), array('Tram.id'=>$id));
		
		$this->redirect(array('action'=>'index'));
	}
}
	
	
