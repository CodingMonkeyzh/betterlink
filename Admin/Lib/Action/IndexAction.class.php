<?php

class IndexAction extends CommonAction {
    public function index(){
		$this->display();
    }
    //获取页面
   /* public function templates(){
    	$actions = array('ict' => 'Ict','cpy' => 'Company','pic' => 'Gallery','idx' => 'Index','job' => 'Job','user' => 'User','web' => 'Web','ad'=>'User');

    	$getPams = $this->_param('params');
    	$Pams = explode(',', $getPams);
    	$arrPams = array();
    	foreach ($Pams as $p) {
    		$keyValue = explode(':', $p);
    		$arrPams[$keyValue[0]] = $keyValue[1];
    	}
    	$act_idx = explode('_', $arrPams['type']);
    	$url = $actions[$act_idx[0]].':'.$arrPams['type'];    //获取fetch的URL;
        
        $this->content = R($url);
    	$module = $this->fetch($url);
		echo $module;
    }
*/
    public function tmp_imgUpload(){
        //  var_dump($_FILES);
        ////////////
        //上传图片,缓存图片//
        import('ORG.Net.UploadFile');
        require_once '/Public/editor/php/JSON.php';
        $config['savePath'] = "./Public/Images/tmp/";
        $config['allowExts'] = explode(',', 'jpg,png,gif,jpeg');
        $config['saveRule'] = date('YmdHis');
        $upload = new UploadFile($config);          // 实例化上传类并传入参数
        if(!$upload->upload($_FILES['imageFile'])) {                    // 上传错误提示错误信息
            echo json_encode(array('error' => 1,'message' => $upload->getErrorMsg()));
            exit;
        }
        $uploadFileInfo = $upload->getUploadFileInfo();
        echo json_encode(array('error' => 0,'url' => __ROOT__.'/'.$uploadFileInfo[0]['savepath'] . $uploadFileInfo[0]['savename']));
        exit;
    }

    /*修改提交内容中的Img标签以及移动tmp中的目标图片至products目录*/
    private function moveImg($html, $tagFolder){
        $error = '';
        $img_pattern = "/%3Cimg%20src%3D%22(.*?)%22%20.*?%20\/%3E/";
        preg_match_all($img_pattern, $html, $img_result);   //匹配提交的图片信息
        foreach ($img_result[1] as $value) {
            $fileName = basename($value);
            if(!@rename('.'.$value , "./Public/Images/$tagFolder/$fileName")){//移动文件至目标文件夹
                $error = '图片上传失败';
            }else{
                //修改内容中的图片路径
                $tmp_pattern = "/%3Cimg%20src%3D%22\/Public\/Images\/tmp\/$fileName%22%20.*?%20\/%3E/";
                $img_replace = "%3Cimg%20src%3D%22/Public/Images/$tagFolder/$fileName%22/%3E";
                $html = preg_replace($tmp_pattern, $img_replace, $html);
            }
            @unlink('.'.$value); //删除缓存文件
        }
        if($error){
            $this->error($error);
        }
        return $html;
    }

    //页面存在编辑器的内容提交
    public function pageSubmit(){
        $links = array(
            'intro' => 'Company/newsPublish',
            'news' => 'Company/newsPublish',
        );
        $html = html_entity_decode($this->_post('content'));
        $html = $this->moveImg($html, 'products');
        $jsonHTML = json_decode($html);

        if($jsonHTML->type == 'intro'){
            //若修改企业简介，补全信息
            $jsonHTML->title = '企业简介';
            $jsonHTML->id = 1;
        }

        if(!empty($jsonHTML->title) && !empty($jsonHTML->content)){
            R($links[$jsonHTML->type], array($jsonHTML));        //调用目标操作方法
        }else{
            echo '信息内容不能为空！';
        }
    }
}