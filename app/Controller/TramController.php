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
class TramController extends AppController {

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
	public function index($id="") 
	{
			//tạo model Tram liên kết với bảng trams
		$this->loadModel('Tram');
		
		if(isset($_POST['data']))
		{
			//lấy dữ liệu từ browser sumit lên
			$data = $_POST['data']["Tram"];

			$this->Tram->save($data);
		}
		// print_r($data);
		//dùng hàm find của đối tượng Tram để truy vấn dữ liệu, nếu có điều kiện thì sử dụng phần tử conditions phần tử array đựng string 
		// $array_data = $this->Tram->find("all",array('conditions'=>array($dk),"order"=>"time DESC"));

		$array_tram = $this->Tram->find("all");
		//truy vấn dữ liệu sản phẩm hiện tại theo id để đưa vào form nhập 
		$array_edit_tram = null;
		if($id !="")
		{
			$array_edit_tram = $this->Tram->find("all",array("conditions"=>array("id = '$id'")));
		}

		// đưa biến array_tram qua view 
		$this->set('array_tram',$array_tram);
		$this->set('array_edit_tram',$array_edit_tram);


	}
	// xóa 
	public function del($id="")
	 {
	 	if ($id != "")
	 	{
	 		// xóa  theo id
   			$this->loadModel("Tram");
    		$this->Tram->delete($id);

    		// chuyển về trang index
    		$this->redirect(array("action"=>"index"));
     		
		}
	 }

	public function nhap()
	{
		
	}
}
	
	
