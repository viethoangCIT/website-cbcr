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
class GiamsatchayrungController extends AppController {

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
		$this->loadModel('Vuchay');
		
		//tính tổng diện tích thiệt hại 
		$sql_tong = "SELECT id,thoigian_batdau,xa,huyen,video,xacnhan, (dientich_rungtrong+dientich_rungtrong+dientich_rungtrong+dientich_rungtrong) as tong FROM vuchays";

		$array_vuchay = $this->Vuchay->query($sql_tong);

		$link_video = "";
		//đọc dữ liệu video từ bảng configuration
		$sql_link_video = "SELECT cf_value FROM configuration WHERE cf_name = 'LinkCamera'";
		$array_config = $this->Vuchay->query($sql_link_video);

		//lấy tọa độ điểm cháy từ bảng syncuis
		$toado_chay_x = "";
		$toado_chay_y = "";

		$sql_toado_chay = "SELECT value1,value2 FROM syncuis WHERE var_name = 'smoke_pixel_coor'";
		$array_toado_chay = $this->Vuchay->query($sql_toado_chay);

		$toado_chay_x = $array_toado_chay[0]["syncuis"]["value1"];
		$toado_chay_y = $array_toado_chay[0]["syncuis"]["value2"];

		$this->set('toado_chay_x',$toado_chay_x);
		$this->set('toado_chay_y',$toado_chay_y);

		//lấy tạo độ vùng cháy
		$chieudai = "";
		$chieurong = "";
		//lấy tọa độ góc trên bên trái
		$sql_vungchay_tren = "SELECT value1,value2 FROM syncuis WHERE var_name = 'smoke rect_lt'";
		$array_vungchay_tren = $this->Vuchay->query($sql_vungchay_tren);

		//lấy tọa độ góc dưới bên phải
		$sql_vungchay_duoi = "SELECT value1,value2 FROM syncuis WHERE var_name = 'smoke rect_rb'";
		$array_vungchay_duoi = $this->Vuchay->query($sql_vungchay_duoi);

		$chieudai = $array_vungchay_duoi[0]["syncuis"]["value1"] - $array_vungchay_tren[0]["syncuis"]["value1"] ;
		$chieurong = $array_vungchay_duoi[0]["syncuis"]["value2"] - $array_vungchay_tren[0]["syncuis"]["value2"];

		$margin_left_vungchay = $array_vungchay_tren[0]["syncuis"]["value1"];
		$margin_top_vungchay = $array_vungchay_tren[0]["syncuis"]["value2"];

		//lấy ra trang thái cảnh báo cháy
		$trang_thai = "";
		$sql_trangthai = "SELECT value1 FROM syncuis WHERE var_name = 'smoke status'";
		$array_trangthai = $this->Vuchay->query($sql_trangthai);
		$trang_thai=$array_trangthai[0]["syncuis"]["value1"];

		$this->set('chieudai',$chieudai);
		$this->set('chieurong',$chieurong);
		$this->set('margin_left_vungchay',$margin_left_vungchay);
		$this->set('margin_top_vungchay',$margin_top_vungchay);
		$this->set('trang_thai',$trang_thai);

		// lấy đường link video
		$link_video = $array_config[0]["configuration"]["cf_value"];
		//print_r($array_config);

		//print_r($array_vuchay);
		$this->set('array_vuchay',$array_vuchay);
		$this->set('link_video',$link_video);
	}
	public function chitiet() 
	{
		$this->loadModel('Thongso');
		$this->loadModel('Vuchay');
		
		// $sql_leftjoin ="SELECT vuchays.*, T.`ngay`, T.`tmp`,T.`hum`,T.`rain`,T.`huonggio`,T.`capdubao`FROM vuchays LEFT JOIN (SELECT tmp,hum,rain,huonggio,capdubao,ngay FROM thongsos) AS T ON vuchays.`ngay` = T.`ngay` ";
		$sql_leftjoin = "SELECT T.*,C.* FROM thongsos AS C JOIN (SELECT *,(dientich_rungtrong+dientich_rungtrong+dientich_rungtrong+dientich_rungtrong) as tong FROM vuchays) AS T ON C.`ngay` = T.`ngay` WHERE `id` = '$id'";



		//print_r($sql_leftjoin);
		 
		  $array_vuchay = $this->Vuchay->query($sql_leftjoin);
		 // print_r($array_results);
		  $this->set('array_vuchay',$array_vuchay);
	}
	public function del($id="")
	 {
	 	if ($id != "")
	 	{
	 		// xóa  theo id
   			$this->loadModel("Vuchay");
    		$this->Vuchay->delete($id);

    		// chuyển về trang index
    		$this->redirect(array("action"=>"/home/chitiet"));
     		// $this->redirect('/Firmware/index.html');
		}
	 }
	public function edit($id = "") 
	{

		$this->loadModel('Vuchay');
		
		if(isset($_POST['data']))
		{
			//lấy dữ liệu từ browser sumit lên
			$data = $_POST['data'];
			$date = date('Y/m/d');
			$data['Vuchay']['ngay']  = $date;
			//print_r($data);
			$this->Vuchay->save($data);
		}

		// sửa
		$array_edit_vuchay = null;
		if($id !="")
		{
			
		$array_edit_vuchay = $this->Vuchay->find("all",array("conditions"=>array("id = '$id'")));
		}
		//print_r($array_edit_vuchay);
		$this->set('array_edit_vuchay',$array_edit_vuchay);
	}
	public function video() 
	{
		$this->loadModel('Vuchay');
			
		$array_video = $this->Vuchay->find("all",array("fields"=>"id,video"));

		// print_r($array_video);
		$this->set('array_video',$array_video);
	}

}
	
	
