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
class QuanlyController extends AppController {

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
	public function index() {
		if ($this->Session->check('user_id') != true)
    	{
			$this->autoRender = false;
			$this->layout = 'login';
			$this->render('/login/index');
    	}
		//print_r($this->request->params);
		$this->loadModel('Item');
		$this->loadModel('Event');
		$this->loadModel('Config');
		$array_config = $this->Config->find("all",array("order"=>"ID DESC","conditions"=>"id = '1'"));
		$config_folder = $array_config[0]["Config"]["folder_code"];
		//kiem tra ngay lớn nhất trong database event
		$array_maxdate = $this->Event->query("SELECT MAX(`date`) AS `ngaythang` FROM `events` ");
		//print_r($array_maxdate);
		$max_date = date("Y-m-d");
		$max_date = ""; 
		$current_date = time(); 
		if($array_maxdate) $max_date = $array_maxdate[0][0]["ngaythang"];
		
		//tinh số ngày từ ngày lớn nhất trong CSDL tới ngày hiện tại
		$datediff = $current_date - strtotime($max_date);
		$so_ngay = floor($datediff / (60 * 60 * 24));
		
		//làm vòng for để lấy giá trị từng ngày, lấy file txt.
		$ngay_batdau = $max_date;
		for($i=0;$i<=$so_ngay;$i++)
		{
			$ngay_tieptheo = strtotime($ngay_batdau . " +$i day");
			$str_folder = $config_folder.date("Y/m/d",$ngay_tieptheo);
			//echo $str_folder."<br>";
			//kiem tra thu muc co bao nhieu file
			$so_file = 0;
			//kiem tra có folder
			if(file_exists($str_folder))
			{
				//đếm số file có trong folder
				$so_file = (count(scandir($str_folder)) - 2);
				//echo "Folder : ".$str_folder." - số file ".$so_file."<br>";
				for($j=1;$j<=$so_file;$j++)
				{
					//doc noi dung file J
					$link_file = $str_folder."/".$j.".txt";
					
					//kiem tra file da xoa hay chua, neu xoa roi thi khong doc nua
					$array_check = $this->Item->find("all",array("order"=>"ID DESC","conditions"=>"link = '$link_file'"));
					if($array_check == NULL)
					{
						//kiem tra có file hay không để insert
						if(file_exists($link_file))
						{
							//kiem tra file đã có trong csdl hay chua
							$array_kiemtra = $this->Event->find("all",array('conditions'=>"file_name = '$link_file'"));
							//print_r($array_kiemtra);
							if($array_kiemtra == NULL)
							{
								//bat dau luu file neu chua co trong csdl
								$file = file_get_contents($link_file, true);
								$array_file = explode("\n",$file);
								
								$array_save_event = NULL;
								if($array_file)
								{
									if($array_file[0]) $array_save_event["str_type"]   		= trim(preg_replace('/[^A-Za-z0-9,\-]/', '', $array_file[0]));
									if($array_file[1]) $array_save_event["date"]       		= date("Y-m-d",strtotime($array_file[1]));
									if($array_file[1]) $array_save_event["time"]       		= date("H:i:s",strtotime($array_file[1]));
									$array_save_event["vehicle"]    	 = intval(preg_replace('/[^0-9]+/', '', $array_file[2]), 10);
									if($array_file[3]) $array_save_event["vehicle_number"]  = trim(preg_replace( "/\r|\n/", "",$array_file[3]));
									if($array_file[4]) $array_save_event["address"]         = preg_replace( "/\r|\n/", "",$array_file[4]);
									if($array_file[5]) $array_save_event["str_img"]         = $array_file[5];
									if($array_file[6]) $array_save_event["str_video"]       = $array_file[6];
									if($array_file[9]) $array_save_event["link_media"]      = $str_folder."/".preg_replace( "/\r|\n/", "",$array_file[7])."/";
									$array_save_event["status"]          = intval(preg_replace('/[^0-9]+/', '', $array_file[8]), 10);
									if($array_file[9]) $array_save_event["camera_name"]     = preg_replace( "/\r|\n/", "",$array_file[9]);
									$array_save_event["file_name"]          = $link_file;
									
									
									$this->Event->create( );
									print_r($array_file);
									echo "<br>--".$array_file[2]."//";
									print_r($array_save_event);
									$this->Event->save($array_save_event);
									//unset( $this->data[ 'Invite' ] );
								}//end if aray file
							}//end if array_ kiemtra
						}//end if file ton tai
					}//end if check file
				}//end for so file
			}//end if folder ton tai
			
		}//end for ngay thang
			
			//echo $so_file;
	
		
		
		$ngaythang = "";
		$loaixe = "";
		$loaivipham = "";
		$timkiem = "";
		$dieukien_ngaythang = "";
		$dieukien_loaixe = "";
		
		if(isset($_GET["ngaythang"])) $ngaythang = $_GET["ngaythang"];
		if($ngaythang != "") 
		{
			$ngaythang = date("Y-m-d",strtotime($ngaythang));
			
			if($ngaythang == '01-01-1970') $ngaythang = date("Y-m-d");
			$dieukien_ngaythang = "AND (Event.date = '$ngaythang')";
		}
		if(isset($_GET["loaixe"])) $loaixe = $_GET["loaixe"];
		if($loaixe == "2") $loaixe = "";
		if($loaixe !="") $dieukien_loaixe = "AND (Event.vehicle = '$loaixe')";
		if(isset($_GET["loaivipham"])) $loaivipham = $_GET["loaivipham"];
		if($loaivipham == "2") $loaivipham = "";
		if(isset($_GET["timkiem"])) $timkiem = $_GET["timkiem"];


		//$urlParams = $this->params['url'];
		//unset($urlParams['url']);
		
		$this->paginate = array(
				'conditions'=> array("((Event.address LIKE '%$timkiem%') OR (Event.vehicle_number LIKE '%$timkiem%')) $dieukien_ngaythang $dieukien_loaixe  AND (Event.str_type LIKE '%$loaivipham%')" ),
			     'limit' => 10,
				 'order' => array('Event.id' => 'desc'),
				 
		     );
			// $this->paginate->options(array('url' => array('?' => http_build_query($urlParams))));
		$array_event = $this->paginate('Event');
		$this->set(compact('array_event'));
		$this->set('timkiem',$timkiem);
		$this->set('ngaythang',$ngaythang);
		$this->set('loaixe',$loaixe);
		$this->set('loaivipham',$loaivipham);
		//$this->set('vitri',$vitri);
		//$this->redirect('/quanly/index#161');
		
		//$array_event = $this->Event->find("all",array('order'=>"ID DESC"));
		//print_r($array_event);
		
		//$this->set('array_event',$array_event);
		
	}
	public function edit($id='',$tranghientai='') {
		if ($this->Session->check('user_id') != true)
    	{
			$this->autoRender = false;
			$this->layout = 'login';
			$this->render('/login/index');
    	}
		$this->loadModel('Event');
		$array_event = $this->Event->find("all",array("order"=>"ID DESC","conditions"=>"id = '$id'"));
		
		
		if(isset($this->data['Event']['id'])){
			$array_luu = $this->data['Event'];
			$array_luu['date'] = date("Y-m-d",strtotime($array_luu['date']));
			$array_luu['str_img'] = trim($array_luu['str_img'], ';');
			$array_luu['str_img'] = str_replace(";;",";",$array_luu['str_img']);
			//print_r($array_luu);
			//return;
			if($this->Event->save($array_luu)){
				
				$this->Session->setFlash("SAVE_OK", false);
				$tranghientai = $array_luu["tranghientai"];
				$this->redirect(array('action'=>'index/page:'.$tranghientai));
			}
			else
			{
				$this->Session->setFlash("SAVE_FAIL", false);
				$this->redirect(array('action'=>'add'));
			}
		}
		//print_r($array_event);
		$this->set('tranghientai',$tranghientai);
		$this->set('array_event',$array_event);
		
	}
	public function delete($id='',$tranghientai='')
	{
		if ($this->Session->check('user_id') != true)
    	{
			$this->autoRender = false;
			$this->layout = 'login';
			$this->render('/login/index');
    	}
		$this->loadModel('Event');
		$this->loadModel('Item');
		$this->autoRender = false;
		$array_event = $this->Event->find("all",array("order"=>"ID DESC","conditions"=>"id = '$id'"));
		if($array_event)
		{
			$array_luu["link"] = $array_event[0]["Event"]["file_name"];
			$this->Item->save($array_luu);
			if($this->Event->delete($id)) $this->Session->setFlash("DELETE_OK", false);
			else $this->Session->setFlash("DELETE_FAIL", false);	
		}
		
		$this->redirect(array('action'=>'index/page:'.$tranghientai));
	}
	public function approval($id='',$tranghientai='')
	{
		if ($this->Session->check('user_id') != true)
    	{
			$this->autoRender = false;
			$this->layout = 'login';
			$this->render('/login/index');
    	}
		$this->loadModel('Event');
		$this->autoRender = false;
		if($this->Event->updateAll(array('status'=>1), array('Event.id'=>$id))) $this->Session->setFlash("SAVE_OK", false);
		else $this->Session->setFlash("SAVE_FAIL", false);	
		
		$this->redirect(array('action'=>'index/page:'.$tranghientai));
	}
	public function recovery($id='',$tranghientai='')
	{
		if ($this->Session->check('user_id') != true)
    	{
			$this->autoRender = false;
			$this->layout = 'login';
			$this->render('/login/index');
    	}
		$this->loadModel('Event');
		$this->autoRender = false;
		if($this->Event->updateAll(array('status'=>0), array('Event.id'=>$id))) $this->Session->setFlash("SAVE_OK", false);
		else $this->Session->setFlash("SAVE_FAIL", false);	
		$this->redirect(array('action'=>'index/page:'.$tranghientai));
	}
}
