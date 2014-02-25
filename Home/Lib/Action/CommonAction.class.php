<?php
class CommonAction extends Action{
	public function _initialize(){
		if(!isset($_SESSION['named']) || $_SESSION['named']==''){
		             $this->redirect('RegisterLogin/login');
		}
	}
}
?>