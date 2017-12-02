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
class NguoidungController extends AppController {

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
	public function index($id="") 
	{
		//tạo model User liên kết với bảng Users
		$this->loadModel('User');

		if(isset($_POST['data']))
		{
			//lấy dữ liệu từ browser sumit lên
			$data = $_POST['data'];
			$pass = $data["User"]['password'];

			$data["User"]['password'] = md5($pass);
			$id_phanquyen = $data["User"]['id_phanquyen'];

			$array_phanquyen = array("1"=>"Quyền quản trị", "2"=>"Quyền chức năng", "3"=>"Quyền sử dụng");

			$data["User"]['phanquyen']= $array_phanquyen[$id_phanquyen];

			 // print_r($data);
			//lưu dữ liệu vào bảng Users
			$this->User->save($data);
		}

		//dùng hàm find của đối tượng User để truy vấn dữ liệu, nếu có điều kiện thì sử dụng phần tử conditions phần tử array đựng string 
		// $array_data = $this->User->find("all",array('conditions'=>array($dk),"order"=>"time DESC"));

		$array_user = $this->User->find("all");

		// sửa
		//truy vấn dữ liệu sản phẩm hiện tại theo id để đưa vào form nhập 
		$array_edit_user = null;
		if($id !="")
		{
			
		$array_edit_user = $this->User->find("all",array("conditions"=>array("id = '$id'")));
		}

		// đưa biến array_user qua view 
		$this->set('array_user',$array_user);
		$this->set('array_edit_user',$array_edit_user);
		
		
	}
	// xóa 
	 public function del($id="")
	 {
	 	if ($id != "")
	 	{
	 		// xóa  theo id
   			$this->loadModel("User");
    		$this->User->delete($id);

    		// chuyển về trang index
    		$this->redirect(array("action"=>"index"));
     		
		}
	 }
	public function nhap() 
	{
		
		
	}
	
}
