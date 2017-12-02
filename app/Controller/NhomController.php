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
class NhomController extends AppController {

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
	public function index($id="",$id_group="") 
	{
		//tạo model Group liên kết với bảng Groups
		$this->loadModel('Group');
		$this->loadModel('Thanhvien');

		if(isset($_POST['data1']["Group"]))
		{
			//lấy dữ liệu từ browser sumit lên
			$data1 = $_POST['data1']["Group"];
			 
			//lưu dữ liệu vào bảng Groups
			$this->Group->save($data1);
		}
		// print_r($data1);

		if(isset($_POST['data2']))
		{
			//lấy dữ liệu từ browser sumit lên
			$data2 = $_POST['data2'];
			$data = $_POST['data2']['Thanhvien']['id_group'];
			// echo "dkhong".$data;
			//lưu dữ liệu vào bảng Groups
			$this->Thanhvien->save($data2);
		}


		//dùng hàm find của đối tượng Group để truy vấn dữ liệu, nếu có điều kiện thì sử dụng phần tử conditions phần tử array đựng string 
		// $array_data = $this->Group->find("all",array('conditions'=>array($dk),"order"=>"time DESC"));
		$dk =  "";
		$id_group = "";
		// $data = $_POST['data2']['Thanhvien']['id_group'];
		if(isset($data) && $data !="")
		{
			$id_group = $data;
			
			$dk .= " id_group = '$id_group'";
			
		}
		
		$array_group = $this->Group->find("all");
		$array_group1 = $this->Group->find("all",array("fields"=>"id,name"));
		$array_thanhvien = $this->Thanhvien->find("all",array("conditions"=>array("$dk")));

		
		// sửa
		//truy vấn dữ liệu sản phẩm hiện tại theo id để đưa vào form nhập 
		$array_edit_group = null;
		if($id !="")
		{
			$array_edit_group = $this->Group->find("all",array("conditions"=>array("id = '$id'")));
		}

		// sửa
		//truy vấn dữ liệu sản phẩm hiện tại theo id để đưa vào form nhập 
		$array_edit_thanhvien = null;
		if($id !="")
		{
			
		$array_edit_thanhvien = $this->Thanhvien->find("all",array("conditions"=>array("id = '$id'")));
		}


		$sql_count = "SELECT id_group, COUNT(*) AS dem FROM thanhviens GROUP BY id_group";
		$sql_leftjoin ="SELECT groups.*, T.`id_group`, T.`dem` 
		FROM groups 
		LEFT JOIN ($sql_count) AS T
		ON groups.`id` = T.`id_group` ";

		//print_r($sql_leftjoin);
		 
		  $array_results = $this->Thanhvien->query($sql_leftjoin);

		
		
		// đưa biến array_group qua view 
		$this->set('array_group',$array_group);
		$this->set('array_group1',$array_group1);
		$this->set('array_thanhvien',$array_thanhvien);
		$this->set('array_edit_group',$array_edit_group);
		$this->set('array_edit_thanhvien',$array_edit_thanhvien);
		$this->set('array_results',$array_results);
		

	}
	// xóa 
	 public function del($id="")
	 {
	 	if ($id != "")
	 	{
	 		// xóa  theo id
   			$this->loadModel('Group');
		
    		$this->Group->delete($id);

    		// chuyển về trang index
    		$this->redirect(array("action"=>"index"));
     		
		}
	 }
	 // xóa 
	 public function del1($id="")
	 {
	 	if ($id != "")
	 	{
	 		// xóa  theo id
   			$this->loadModel('Thanhvien');
    		$this->Thanhvien->delete($id);

    		// chuyển về trang index
    		$this->redirect(array("action"=>"index"));
     		
		}
	 }

	
	
}
	
	
