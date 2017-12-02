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
class UpdatefirmwareController extends AppController {

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
		/*if(empty($_POST["data"]))
		{ 
			echo   "<RESULT>
						<RESPOND>ERROR</RESPOND>
						<RESEND>8</RESEND>
						<MESSAGE>INVALID ACCESS</MESSAGE>
					</RESULT>";
					return;	
		}*/

		if(isset($_POST["data"]))	
		{
			//ko cho cakephp render ra view và layout
			$this->autoRender = false;
			
			$this->loadModel('Firmware');
			$this->loadModel('Dulieu');
			$this->loadModel('Chiso');
			
			$id = "";
			$noi_dung = "";		
			$sdt = "";
			$time = "";
			$name = "";
			$id_firmware = "";
			$version = "";
			$status = "";
			$url = "";
			$created = "";
			$ngay = "";
			$gio = "";
			$ngay_gio = "";
			$time2 = "";
			
			//lấy dữ liệu từ dữ liệu ng` dùng nhập vào
			$dulieu = $_POST["data"];
			
			//tạo biến period
			$period = 8;
			
			//phân tích dữ liệu xml thành đối tượng, thuộc tính là tên thẻ và giá trị của tên thẻ
			try 
			{
				$xml = simplexml_load_string($dulieu) or die("<RESULT>
															  <RESPOND>ERROR</RESPOND>
															  <MESSAGE>INVALID ACCESS</MESSAGE>
														  	</RESULT>");
    
			} catch (Exception $e) {
				
			}
			
			//nếu xml bằng NULL thì trả về lỗi											  
			if($xml == NULL)
			{ 
				echo "<RESULT>
						  <RESPOND>ERROR</RESPOND>
						  <MESSAGE>INVALID ACCESS</MESSAGE>
					  </RESULT>";
				return;	
			}
			
			//nếu đối tượng xml có dữ liệu
			if($xml != NULL)
			{
				//lấy giá trị số điện thoại và time của đối tượng xml
				if(isset($xml->ID)) $sdt = 	$xml->ID;
				
				//nếu ko có sdt thì hiển thị lỗi và thoát hàm
				if($sdt == "")
				{
					 echo "<RESULT>
								<RESPOND>ERROR</RESPOND>
								<MESSAGE>INVALID ACCESS: NO PHONE NUMBER</MESSAGE>
						   </RESULT>";
					return;
				}
				if(isset($xml->TIME)) $time = 	$xml->TIME;
				
				//nếu ko có time thì hiển thị lỗi và thoát hàm
				if($time == "")
				{
					 echo "<RESULT>
								<RESPOND>ERROR</RESPOND>
								<MESSAGE>INVALID ACCESS: NO TIME DATA</MESSAGE>
						   </RESULT>";
					return;
				}
				
				//$time2 = str_replace("/","-",$time);
				
				//chuyển time thành dữ liệu kiểu ngày
				$ngay_gio = strtotime($time);
				
				//lấy giá trị ngày
				$ngay = date("Y-m-d",$ngay_gio);
				
				//lấy giá trị giờ
				$gio = date("H:i",$ngay_gio);
				$str_ngay_gio = date("Y-m-d H:i:s",$ngay_gio);		
				
				//kiểm tra ngày giờ có hợp lệ hay ko?
				if($str_ngay_gio == "1970-01-01 01:00:00")
				{
					 echo "<RESULT>
								<RESPOND>ERROR</RESPOND>
								<MESSAGE>INVALID TIME: $time</MESSAGE>
						   </RESULT>";
					return;
				}
				
				//lấy thông tin trạm từ số điện thoại
				$array_firmware = $this->Firmware->find("all",array("conditions"=>"phone = '$sdt' AND `status` = '1'"));
				
				if($array_firmware != NULL)
				{
					$id_firmware = $array_firmware[0]["Firmware"]["id"];
					$name = $array_firmware[0]["Firmware"]["name"];
					$version = $array_firmware[0]["Firmware"]["version"];
					$status = $array_firmware[0]["Firmware"]["status"];
					$url =  "http://$_SERVER[HTTP_HOST]/files/".$array_firmware[0]["Firmware"]["url"];
					
					if($url != "")
					{
						
						 echo "<RESULT>
									<RESPONSE>SUCCESS</RESPONSE>
									<LINKFIRMWARE>$url</LINKFIRMWARE>
							  </RESULT>";
					}else
					{
						echo "<RESULT>
									<RESPONSE>ERROR</RESPONSE>
									<MESSAGE>FIRMWARE URL NOT FOUND</MESSAGE>
							  </RESULT>";	
					}
					
					
					
				}else
				{
					echo "<RESULT>
								<RESPOND>ERROR</RESPOND>
								
								<MESSAGE>PHONE NUMBER NOT FOUND: $sdt</MESSAGE>
						   </RESULT>";
					return;	
				}
				
				
						
			}//end 	if($xml != NULL)
		}//end if(isset($_POST["data"]))	
		
	}//end function
	
//end controller	
}
