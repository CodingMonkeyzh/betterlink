<?php

class UserAction extends Action {
    public function login(){
		$this->display();
    }
    public function doLogin(){
        $user=$_POST['user'];
        $password=$_POST['password'];
        $code=$_POST['verify'];

        if(md5($code)!=$_SESSION['verify']){
           $this->error('验证码不正确');
        }
        $admin=M('admin'); 
        $where['a_name']=$user;
        $where['a_password']=$password;
        $arr=$admin->field('a_id')->where($where)->find();
        if($arr){            
            $data['a_logTime']=date('Y-m-d H:i:s',strtotime('now'));
            $data['a_lastIP']=get_client_ip();
            
            $admin->where($where)->save($data);

        	$_SESSION['admin_user']=$user;   
            $this->success('用户登录成功',U('Index/index'));
        }else{
            $this->error('该用户不存在或者密码错误');
        }	    	
    }    
}