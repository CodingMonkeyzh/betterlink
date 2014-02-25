<?php
class CommonAction extends Action{
	public function _initialize(){
		if(!isset($_SESSION['admin_user']) || $_SESSION['admin_user']==''){
		             $this->redirect('User/login');
		}
	}
}
?>