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
class TiepnhandulieuController extends AppController {

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


	if(isset($_POST["data"]))	
	{
			//ko cho cakephp render ra view và layout
		$this->autoRender = false;

		

		$id = "";

		$sdt = "";
		$time = "";
		$time_r1 = "";
		$time_r2 = "";
		$bat = "";
		$sigq = "";
		$rain = "";
		$tmp = "";
		$hum = "";


			//lấy dữ liệu từ dữ liệu ng` dùng nhập vào
		$dulieu = $_POST["data"];


			//phân tích dữ liệu xml thành đối tượng, thuộc tính là tên thẻ và giá trị của tên thẻ
		try 
		{
			$xml = simplexml_load_string($dulieu) or die("<RESULT>
				<RESPOND>ERROR</RESPOND>
				<MESSAGE>INVALID ACCESS</MESSAGE>
				</RESULT>");

		} 
		catch (Exception $e) 
		{

		}

			//nếu xml bằng NULL thì trả về lỗi											  
		if($xml == NULL)
		{ 
			echo "<RESULT>
			<RESPOND>ERROR NULL</RESPOND>
			<MESSAGE>INVALID ACCESS</MESSAGE>
			</RESULT>";
			return;	
		}

	    	// kiểm tra có thẻ update firmware không
		if(isset($xml->UPDFW))
		{
			$this->loadModel('Firmware');

		// Đọc thông tin firmware từ ngày mới nhất từ csdl
			$array_firmware = $this->Firmware->find("all",array("conditions"=>array("Firmware.status"=>'1'),"limit"=>1));

			$file = "";

			if ($array_firmware) 
			{
				$file = $array_firmware[0]["Firmware"]["file"];
				if ($file !="") 
				{
					$url = "http://canhbaochayrung.centic.vn/files/".$file ;
					echo "<KQD><UPDFW>$url</UPDFW></KQD>";
				}
				else
				{
					echo "<KQD>
					<UPDFW>EMPTY FILE NAME</UPDFW>
					</KQD>
					";
				}

			}
			else
			{
				echo "<KQD>
				<UPDFW>NO ACTIVE FILE</UPDFW>
				</KQD>
				";
			}





			return;
		}

			//lấy giá trị số điện thoại 
		if(isset($xml->SDT)) $sdt = $xml->SDT;

			//nếu ko có sdt thì hiển thị lỗi và thoát hàm
		if($sdt == "")
		{
			echo "<RESULT>
			<RESPOND>ERROR</RESPOND>
			<MESSAGE>INVALID ACCESS: NO PHONE NUMBER</MESSAGE>
			</RESULT>";
			return;
		}

				// lấy thời gian cập nhật nhiệt độ và độ ẩm của đối tượng xml
		if(isset($xml->TIME)) $time = 	$xml->TIME;

				//nếu ko có time thì hiển thị lỗi và thoát hàm
			// if($time == "")
			// {
			// 	echo "<RESULT>
			// 	<RESPOND>ERROR</RESPOND>
			// 	<MESSAGE>INVALID ACCESS: NO TIME DATA</MESSAGE>
			// 	</RESULT>";

			// }

				//$time2 = str_replace("/","-",$time);

				//chuyển time thành dữ liệu kiểu ngày




				//kiểm tra ngày giờ có hợp lệ hay ko?
			// if($time == "1970-01-01 01:00:00")
			// {
			// 	echo "<RESULT>
			// 	<RESPOND>ERROR</RESPOND>
			// 	<MESSAGE>INVALID TIME: $time</MESSAGE>
			// 	</RESULT>";

			// }

			//lấy thời gian cập nhật luongj mưa từ lúc bắt đầu đo
		if(isset($xml->TIME_R1)) $time_r1 = 	$xml->TIME_R1;
			// if($time_r1 == "")
			// {
			// 	echo "<RESULT>
			// 	<RESPOND>ERROR</RESPOND>
			// 	<MESSAGE>INVALID ACCESS: NO TIME_R1 DATA</MESSAGE>
			// 	</RESULT>";

			// }



			//chuyển time thành dữ liệu kiểu ngày

		


				//kiểm tra ngày giờ có hợp lệ hay ko?
			// if($time_r1 == "1970-01-01 01:00:00")
			// {
			// 	echo "<RESULT>
			// 	<RESPOND>ERROR</RESPOND>
			// 	<MESSAGE>INVALID TIME_R1: $time_r1</MESSAGE>
			// </RESULT>";

			// }

			//lấy thời gian cập nhật luongj mưa từ lúc kết thúc  đo
		if(isset($xml->TIME_R2)) $time_r2 = 	$xml->TIME_R2;
			// if($time_r2 == "")
			// {
			// 	echo "<RESULT>
			// 	<RESPOND>ERROR</RESPOND>
			// 	<MESSAGE>INVALID ACCESS: NO TIME_R2 DATA</MESSAGE>
			// 	</RESULT>";

			// }

 			//chuyển thời gian đo về kiểu ngày
		


			//kiểm tra ngày giờ có hợp lệ hay ko?
			// if($time_r2 == "1970-01-01 01:00:00")
			// {
			// 	echo "<RESULT>
			// 	<RESPOND>ERROR</RESPOND>
			// 	<MESSAGE>INVALID TIME_R2: $time_r2</MESSAGE>
			// </RESULT>";

			// }

			// lấy dung lượng pin của Datalogger
		if(isset($xml->BAT)) $bat = $xml->BAT;
			// if($bat == "")
			// {
			// 	echo "<RESULT>
			// 	<RESPOND>ERROR</RESPOND>
			// 	<MESSAGE>INVALID ACCESS: NO BAT DATA</MESSAGE>
			// 	</RESULT>";

			// }

			// lấy chất lượng sóng tại trạm 
		if(isset($xml->SigQ)) $sigq = $xml->SigQ;
			// if($sigq == "")
			// {
			// 	echo "<RESULT>
			// 	<RESPOND>ERROR</RESPOND>
			// 	<MESSAGE>INVALID ACCESS: NO SigQ DATA</MESSAGE>
			// 	</RESULT>";

			// }

			// lây giá trị lượng mưa
		if(isset($xml->RAIN)) $rain = $xml->RAIN;
			// if($rain == "")
			// {
			// 	echo "<RESULT>
			// 	<RESPOND>ERROR</RESPOND>
			// 	<MESSAGE>INVALID ACCESS: NO RAIN DATA</MESSAGE>
			// 	</RESULT>";

			// }

			// lây giá trị nhiệt độ
		if(isset($xml->TMP)) $tmp = $xml->TMP;
			// if($tmp == "")
			// {
			// 	echo "<RESULT>
			// 	<RESPOND>ERROR</RESPOND>
			// 	<MESSAGE>INVALID ACCESS: NO TMP DATA</MESSAGE>
			// 	</RESULT>";

			// }

			// lây giá trị độ ẩm
		if(isset($xml->HUM)) $hum = $xml->HUM;
			// if($hum == "")
			// {
			// 	echo "<RESULT>
			// 	<RESPOND>ERROR</RESPOND>
			// 	<MESSAGE>INVALID ACCESS: NO HUM DATA</MESSAGE>
			// 	</RESULT>";

			// }





		$array_dulieu = NULL;
		$array_dulieu["sdt"] = "$sdt";
		
		
		$array_dulieu["bat"] = "$bat";
		$array_dulieu["sigq"] = "$sigq";
		$array_dulieu["rain"] = "$rain";
		$array_dulieu["tmp"] = "$tmp";
		$array_dulieu["hum"] = "$hum";

		//luu du lieu vao database
		$this->loadModel('Data',"data");
		$this->loadModel('Chuky');
		//Kiểm tra có thời gian nhiệt độ, độ ẩm hay không
		if($time != "")
		{
			$time = strtotime($time);

			// chuyển lại định dạng Y-m-d Giờ : phút: giây để lưu vào csdl
			$time = date("Y-m-d H:i:s",$time);
			$array_dulieu["time"] = $time;
			$array_dulieu["type"] = "0";
			if($this->Data->save($array_dulieu)) 	$save_result = "ok";
		}
		if($time_r1 != "")
		{
			$time_r1 = strtotime($time_r1);
			$time_r1 = date("Y-m-d H:i",$time_r1);

			$time_r2 = strtotime($time_r2);
			// chuyển lại định dạng Y-m-d Giờ : phút: giây để lưu vào csdl
			$time_r2 = date("Y-m-d H:i",$time_r2);

			$array_dulieu["time"] = $time_r1;
			$array_dulieu["time_r2"] = $time_r2;
			$array_dulieu["type"] = "1";
			if($this->Data->save($array_dulieu)) 	$save_result = "ok";

		}




		

		

		if($save_result == "ok")
		{
		
		//lấy dữ liệu chu kì cập nhật lượng mưa
				$array_chuki =  $this->Chuky->find("all");
				$mua = "";
				$moitruong = "";

				if($array_chuki != NULL)
				{
					$mua 		= $array_chuki[0]['Chuky']['mua'];
					$moitruong  = $array_chuki[0]['Chuky']['moitruong'];
				}
				echo "  
				<KQD>
				<STT>SUCCESS</STT>
				<R_T>$mua</R_T>  
				<T>$moitruong</T> 
				</KQD>";

		}
		else
		{
			echo "  
			<KQD>
			<STT>FAIL</STT>
			<R_T></R_T>  
			<T></T> 
			</KQD>";	
		}

	} //end if(isset($_POST["data"]))
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
