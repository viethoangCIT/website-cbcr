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
class NhandulieuController extends AppController {

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
			
		
	}//end function
	
	
	public function nhantin($so_dien_thoai = "",$noidung = "") 
	{
		//ko cho cakephp render ra view và layout
		$this->autoRender = false;
		
		if($so_dien_thoai != "" && $noidung != "")
		{
			ini_set("soap.wsdl_cache_enabled", "0");
			$soapclient = new SoapClient('http://49.156.52.24:5995/SmsService.asmx?WSDL'); 
			
			$params = array('userID' => 'centic1',  
							'password' => 'ks984jhvnyhd8ki',  
							'phoneNo' => $so_dien_thoai,  
							'content' => $noidung
							); 
					
			$response = $soapclient->sendSMS($params); 
			/*echo '<pre>'; 
			var_dump($response); 
			echo '</pre>';*/ 
		}
	}
	
	public function chuyenChuoi($str = "") 
	{
		// In thường
		 $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		 $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		 $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		 $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		 $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		 $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		 $str = preg_replace("/(đ)/", 'd', $str);   
		  
		// In đậm
		 $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		 $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		 $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		 $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		 $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		 $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		 $str = preg_replace("/(Đ)/", 'D', $str);
		 
		 return $str; // Trả về chuỗi đã chuyển
	}  
	
//end controller	
}
