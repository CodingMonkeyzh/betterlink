<?php
// 本类由系统自动生成，仅供测试用途
class AboutAction extends Action {
    public function about(){
    	if($_GET['id']=='2'){
			if(!isset($_SESSION['named']) || $_SESSION['named']==''){
	            $this->redirect('RegisterLogin/login');
	            return false;
		    }
    	}
		$this->display();
    }
}
?>