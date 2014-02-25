<?php

class CompanyAction extends Action {
    public function newsPublish($newsInfo){//添加新闻
      if($newsInfo->id){
        $data['n_id'] = $newsInfo->id;
      }
	    $data['n_title'] = $newsInfo->title;
      //var_dump($this->js_unescape($newsInfo->content));exit();
	    $data['n_content'] = htmlentities($this->js_unescape($newsInfo->content));
	    $data['n_time']=date("Y-m-d H:i:s",strtotime('now'));

      $news = M("news"); // 实例化User对象
      $result = $newsInfo->opt ? $news->save($data) : $news->add($data);      //根据opt判断是添加还是更新
	    if($result){
          echo '操作成功';
	    }else{
	    	  echo $news->getError();
	    }
    }

    //解析javascript中escape的编码字符串
    private function js_unescape($str){
      $ret = '';
      $len = strlen($str);
      for ($i = 0; $i < $len; $i++)
      {
          if ($str[$i] == '%' && $str[$i+1] == 'u')
          {
              $val = hexdec(substr($str, $i+2, 4));
              if ($val < 0x7f) $ret .= chr($val);
              else if($val < 0x800) $ret .= chr(0xc0|($val>>6)).chr(0x80|($val&0x3f));
              else $ret .= chr(0xe0|($val>>12)).chr(0x80|(($val>>6)&0x3f)).chr(0x80|($val&0x3f));
              $i += 5;
          }
          else if ($str[$i] == '%')
          {
              $ret .= urldecode(substr($str, $i, 3));
              $i += 2;
          }
          else $ret .= $str[$i];
      }
      return $ret;
    }

    public function cpy_intro(){
        $intro = M('news');

        $content = $intro->find(1);
        $this->content = html_entity_decode($content['n_content']);
        echo $this->fetch();
    }        
}