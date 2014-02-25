<?php
	class PublicAction extends Action{
	 	public function verify(){
	        import('ORG.Util.Image');
	        ob_end_clean();
	        Image::buildImageVerify(4,1,png,48,22,'code');
	    }	
	}
?>