<?php
// 本类由系统自动生成，仅供测试用途
class RegisterLoginAction extends Action {
    public function register(){
		$this->display();
    }
    public function login(){
		$this->display();
    }
    public function doLogin(){
        $named=$_POST['named'];
        $password=$_POST['password'];
        if($named==''){
        	$this->error('用户名不能为空！');
        }
        if($password==''){
        	$this->error('密码不能为空！');
        }
        $user=M('user');

        $where['u_named']=$named;
        $where['u_password']=$password;
        $arr=$user->field('u_id')->where($where)->find();
        if($arr){
        	$_SESSION['named']=$named;
            $this->success('用户登录成功!',U('Index/index'));
        }else{
            $this->error('该用户不存在或者密码错误!');
        }	    	        	
    }
    public function doRegister(){
        $rules = array(
            array('u_name','require','用户名必须！'), //默认情况下用正则进行验证
            array('u_named','require','用户昵称必须！'), //默认情况下用正则进行验证
            array('u_password','require','密码必须！'), //默认情况下用正则进行验证
            array('repassword','require','确认密码必须！'), //默认情况下用正则进行验证
            array('u_company','require','公司名必须！'), //默认情况下用正则进行验证
            array('u_telephone','require','电话号码必须！'), //默认情况下用正则进行验证
            array('code','require','验证码必须！'), //默认情况下用正则进行验证
            array('u_name','','用户名已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
            array('u_named','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证named字段是否唯一
            array('repassword','u_password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
        );
        $data['u_name']=$_POST['u_name'];
        $data['u_named']=$_POST['u_named'];
        $data['u_password']=$_POST['u_password'];
        $data['u_company']=$_POST['u_company'];
        $data['u_telephone']=$_POST['u_telephone'];

        if(md5($_POST['code'])!=$_SESSION['code']){
            $this->error('验证码不正确!');
        }
        $user=M('user');
        if(!$user->validate($rules)->create()){
            $this->error($user->getError());
        }else{
            $result=$user->add($data);
            if($result){
                $this->success('用户注册成功!');
            }else{
                $this->error('用户注册失败!');
            }
        }
    }
}
?>