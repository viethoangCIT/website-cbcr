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
class DulieubangController extends AppController {

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
    	
		$ten_tram = $quan = $phuong = $tu_ngay = $den_ngay = $tu_gio = $den_gio = "";
		$str_dieukien = "";
		$this->loadModel('Dulieu');
		$this->loadModel('Tram');
		if(isset($_GET["data"]))
		{
			$ten_tram = $_GET["data"]["ten_tram"];
			$ten_tram =	str_replace("'","",$ten_tram);
			if($ten_tram != 0)
			{
				$str_dieukien .= "Dulieu.id_tram = '$ten_tram'";
			}
			
			$tu_ngay = $_GET["data"]["tu_ngay"];
			if($tu_ngay != "")
			{
				$tu_ngay =	str_replace("'","",$tu_ngay);
				$tu_ngay =	date("Y-m-d",strtotime($tu_ngay));
				if($str_dieukien != "") $str_dieukien.= " AND ";
				$str_dieukien .= "Dulieu.ngay >= '$tu_ngay'";
			}
			
			$den_ngay = $_GET["data"]["den_ngay"];
			if($den_ngay != "")
			{
				$den_ngay =	str_replace("'","",$den_ngay);
				$den_ngay =	date("Y-m-d",strtotime($den_ngay));
				if($str_dieukien != "") $str_dieukien.= " AND ";
				$str_dieukien .= "Dulieu.ngay <= '$den_ngay'";
			}
			
			$tu_gio = $_GET["data"]["tu_gio"];
			if($tu_gio != "")
			{
				$tu_gio =	str_replace("'","",$tu_gio);
				$tu_gio =	date("H:i",strtotime($tu_gio));
				if($str_dieukien != "") $str_dieukien.= " AND ";
				$str_dieukien .= "Dulieu.gio >= '$tu_gio'";
			}
			
			$den_gio = $_GET["data"]["den_gio"];
			if($den_gio != "")
			{
				$den_gio =	str_replace("'","",$den_gio);
				$den_gio =	date("H:i",strtotime($den_gio));
				if($str_dieukien != "") $str_dieukien.= " AND ";
				$str_dieukien .= "Dulieu.gio <= '$den_gio'";
			}
		}
		//if($str_dieukien != "") $str_dieukien .= " AND tuy_chon = '1'";
		//else $str_dieukien = "tuy_chon = '1'";
			//echo $str_dieukien;
		$this->paginate = array(
				'conditions' => array($str_dieukien),	
			     'limit' => 10,
				 'order' => array('Dulieu.id' => 'DESC'),
				 
		     );
			// $this->paginate->options(array('url' => array('?' => http_build_query($urlParams))));
		$array_dulieu = $this->paginate('Dulieu');
		
		$array_combo_tram = $this->Tram->find("all",array("field"=>"id,ten","order"=>"ten ASC"));
		$array_option_tram = NULL;
		$array_option_tram[0] = "Tất cả";
		foreach($array_combo_tram as $combo_tram)
		{
		   $array_option_tram[$combo_tram["Tram"]["id"]] =  $combo_tram["Tram"]["ten"];
		}
		
		
		
		$this->set(compact('array_dulieu'));	
		$this->set('ten_tram',$ten_tram);
		
		$this->set('tu_ngay',$tu_ngay);
		$this->set('den_ngay',$den_ngay);
		$this->set('tu_gio',$tu_gio);
		$this->set('den_gio',$den_gio);
		$this->set('array_option_tram',$array_option_tram);
		
	}
	
	
}
