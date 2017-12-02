<?php

class LoginController extends AppController
{
	var $name 		= 'Login';
	var $uses 	 	= array('User');
	var $helpers 	= array('Session', 'Form', 'Html');
	
	function beforeFilter() {}
	function index() 
	{
		$this->layout = 'default';
		if(!empty($this->data))
		{
			$user = $this->User->find("first",array("conditions"=>array("username = '".$this->data['User']['username']."' AND password = '".md5($this->data['User']['password'])."'")));

			if(!empty($user)){
				$this->Session->write('user_id', $user['User']['id'], array('timeout' => '720'));
				$this->Session->write('username', $user['User']['username'], array('timeout' => '720'));
				$this->Session->write('name', $user['User']['name'], array('timeout' => '720'));
				$this->Session->write('id_phanquyen', $user['User']['id_phanquyen'], array('timeout' => '720'));
				$this->redirect(array('controller' => 'home', 'action'=>'index'));
			}else{
				$this->Session->setFlash('LOGIN_FAIL',false);
				$this->redirect(array('controller' => 'login', 'action' => 'index'));
			}
		}
		// Kiem tra neu ton tai session thi vao truc tiep
		if($this->Session->read('user_id')){
			$this->User->recursive = -1;
		}
	}
	function logout()
	{
		$this->autoRender = false;
		$this->Session->delete('user_id');
		$this->Session->delete('username');
		$this->Session->delete('name');
		$this->Session->delete('id_phanquyen');
       	$this->redirect(array('controller'=>'login', 'action'=>'index'));
    }
}
?>