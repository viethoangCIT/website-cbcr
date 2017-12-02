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
class FirmwareController extends AppController {

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
		//tạo model Firmware liên kết với bảng firmwares
		$this->loadModel('Firmware');

		if(isset($_POST['data']))
		{
			//lấy dữ liệu từ browser sumit lên
			$data = $_POST['data'];
			
			$date = $data['Firmware']['date'];
			
			$date = date("Y-m-d ",strtotime($date));
			$data['Firmware']['date'] = $date ;

			//nếu firmware hiện tại có giá trị = 1 thì cập nhật tất cả các dòng firmware trở về 0

			if($data['Firmware']['status'] == 1)
			{
				$sql = "UPDATE firmwares SET `status` = 0";
				$this->Firmware->query($sql);
			}
			

			//lưu dữ liệu vào bảng firmwares
			$this->Firmware->save($data);
		}

		//dùng hàm find của đối tượng Firmware để truy vấn dữ liệu, nếu có điều kiện thì sử dụng phần tử conditions phần tử array đựng string 
		// $array_data = $this->Firmware->find("all",array('conditions'=>array($dk),"order"=>"time DESC"));

		$array_firmware = $this->Firmware->find("all");

		// sửa
		//truy vấn dữ liệu sản phẩm hiện tại theo id để đưa vào form nhập 
		$array_edit_firmware = null;
		if($id !="")
		{
			
		$array_edit_firmware = $this->Firmware->find("all",array("conditions"=>array("id = '$id'")));
		}

		// đưa biến array_firmware qua view 
		$this->set('array_firmware',$array_firmware);
		$this->set('array_edit_firmware',$array_edit_firmware);

	}
	public function index2() 
	{


		// //nếu chưa đăng nhập chuyển về trang login
		// if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		// $ten_tram = $quan = $phuong = $diachi = $thanhpho = $toado = "";
		// $str_dieukien = "";
		// $this->loadModel('Firmware');
		
		// 	//echo $str_dieukien;
		// $this->paginate = array(
		// 		'conditions' => array($str_dieukien),	
		// 	     'limit' => 10,
		// 		 'order' => array('Firmware.id' => 'DESC'),
				 
		//      );
		// 	// $this->paginate->options(array('url' => array('?' => http_build_query($urlParams))));
		// $array_firmware = $this->paginate('Firmware');
		
		
		
		// $this->set(compact('array_firmware'));	
		
		
	}

	// xóa 
	 public function del($id="")
	 {
	 	if ($id != "")
	 	{
	 		// xóa  theo id
   			$this->loadModel("Firmware");
    		$this->Firmware->delete($id);

    		// chuyển về trang index
    		$this->redirect(array("action"=>"index"));
     		// $this->redirect('/Firmware/index.html');
		}
	 }

	public function nhap() 
	{
		// //nếu chưa đăng nhập chuyển về trang login
		// if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
		// $this->loadModel('Firmware');
		
		// if(isset($_POST["data"]))
		// {
		// 	//lấy dữ liệu từ ng` dùng đưa vào mẳng
		// 	$array_luu = $_POST["data"]["firmware"];
		// 	$array_luu["firmware_date"] = date("Y-m-d",strtotime($array_luu["firmware_date"]));
			
		// 	$this->Firmware->updateAll(array('status'=>0));
			
		// 	//luu du lieu vao database
		// 	$this->Firmware->save($array_luu);
			
		// 	//chuyen ve lai trang danh sách
		// 	$this->redirect(array("action"=>"index"));
			
		// 	return;	
		// }
		// $array_sua = NULL;
		// if($id != "")
		// {
		// 	$array_sua = $this->Firmware->find("all",array("order"=>"id DESC","conditions"=>"id = '$id'"));	
		// }
		// $this->set('array_sua',$array_sua);
	}
	// public function xoa($id = '')
	// {
	// 	//nếu chưa đăng nhập chuyển về trang login
	// 	if ($this->Session->check('user_id') != true) return $this->redirect(array('controller' => 'login', 'action' => 'index'));
	// 	$this->loadModel('Firmware');
		
	// 	$array_sua = $this->Firmware->find("all",array("order"=>"id DESC","conditions"=>"id = '$id'"));	
	// 	$url2 =  "files/".$array_sua[0]["Firmware"]["url"];
	// 	if(file_exists($url2))
	// 	{
	// 		unlink($url2);
	// 	}
		
	// 	$this->Firmware->delete($id);
		
	// 	//chuyen ve lai trang xem thu
	// 	$this->redirect(array("action"=>"index"));
	// }
	
}
	
	
