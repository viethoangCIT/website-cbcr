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
class BandoController extends AppController {

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
		$this->loadModel('Dulieu');
		
		$sql_dulieu = "SELECT A.*, B.`chi_so` FROM (SELECT MAX(`ngay_gio`) `ngay_gio`, `id_tram` FROM `dulieus` GROUP By `id_tram`) AS A, `dulieus` AS B WHERE A.`ngay_gio` = B.`ngay_gio`";
		$sql = "SELECT Dulieu.*,trams.ten, trams.hinhanh, trams.dia_chi, trams.phuong, trams.toa_do FROM ($sql_dulieu) AS Dulieu, trams WHERE Dulieu.id_tram = trams.id";
		
		$array_bando = $this->Dulieu->query($sql);
		
		$this->loadModel('Nguongchiso');
		
		$this->loadModel('Cambien');
		$array_mota_chiso = $this->Cambien->find("list",array("fields"=>"ten,mota","order"=>"ten ASC"));
		$array_donvi_chiso = $this->Cambien->find("list",array("fields"=>"ten,donvi","order"=>"ten ASC"));
		
		$array_nguong = $this->Nguongchiso->find("all",array("order"=>"ten_chiso,chiso_duoi ASC"));
		
		$this->set('array_mota_chiso',$array_mota_chiso);
		$this->set('array_donvi_chiso',$array_donvi_chiso);
		$this->set('array_bando',$array_bando);
		$this->set('array_nguong',$array_nguong);
	}
	
	
}
