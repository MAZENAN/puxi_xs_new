<?php

class LoginController extends HomeController {

    public function indexAction() {
        $this->doact('*');
        if (!empty($this->userid) &&!empty($this->username)) {
            $this->success(NULL, __APPROOT__ . '/index.html');
        }

        
        $model = new LoginModel();
        $model->Fields['url']->default = SGet('url');
        $model->assignTo($this);
        $this->assign("url",SGet('url'));
        $this->display('login.tpl');
    }

    public function loginAjaxAction() {
        $vals = $_POST;
        if (preg_match('@^\d{11}$@', $vals['mobile'])) {
            $row = DB::getone('select * from @pf_member where mobile=? or username = ?', array($vals['mobile'],$vals['mobile']));
            
        } 
        if (!$row) {
            $this->returnJson(['msg'=>'账号不存在']);
        }
        if ($row['lock'] == 1) {
            $this->returnJson(['msg'=>'对不起，您的账号已被管理员锁定，请联系客服解锁！']);
            return;
        }
        if ($row['errtime'] == date('Y-m-d') && $row['errtice'] > 5) {
            $this->returnJson(['msg'=>'对不起，错误次数过多请隔天在试！']);
            return;
        }
        if ($row['pass'] != md5($vals['pass'])) {
            DB::update('@pf_member', array('errtime' => date('Y-m-d'), 'errtice' => $row['errtice'] + 1), $row['id']);
            $m = (5 - $row['errtice']);
            if ($m == 0) {
                $this->returnJson(['msg'=>'用户密码错误,请隔天在试']);
            } else {
                $this->returnJson(['msg'=>'用户密码错误,还可以尝试' . $m . '次']);
            }
        }
        $arr = array('last_login_time' => DB::sql('this_login_time'), 'this_login_time' => DB::sql('now()'), 'errtice' => 0);
        $_SESSION['userid'] = $row['id'];
        $_SESSION['username'] = empty($row['nickname']) ? $row['username'] : $row['nickname'];
        $_SESSION['usertype'] = 0;
        $_SESSION['auth'] = 0;
        DB::update('@pf_member', $arr, $row['id']);
        $url = $vals['url'];
        if ($url !='') {
           $this->returnJson(['url'=>$url]);
        }else{
            $this->returnJson(['url'=>"/user.html"]);
        }
    }

    public function outAction() {
        $this->userid =  0;
        $this->username = '';
        $_SESSION['userid'] = 0;
        $_SESSION['username'] = '';
        $this->success(NULL, '/index.html');
    }

    //发送短信
    function sendmbcodeAjaxPostAction() {
        $mobile = SPost('mobile');
//        $imgcode = SPost("imgcode");
//        if($imgcode != $_SESSION['rand_code'] || empty($imgcode) || empty($_SESSION['rand_code'])){
//            //$this->jsonError('图形验证码不正确！');
//            return;
//        }
//        $row = DB::getone('select id from @pf_member where mobile=? or username=?', array($mobile, $mobile));
//        if ($row) {
//            $this->jsonError('该手机号码已注册账号！');
//        }
        if (!preg_match('@^1[0-9]{10}$@', $mobile)) {
            $this->jsonError('手机号码格式不正确！');
        }
        $mbcode = Funcs::randNum(6);
        $_SESSION['mbcode'] = $mbcode;
        $_SESSION['mobile'] = $mobile;
        $ip = Funcs::getIP();
        $time = time();
        $row = DB::getone('select * from @pf_mbcodelog where ip=? order by id desc', array($ip));
        if ($row) {
            if ($row['addtime'] + 60 > $time) {
                $this->returnJson(['error'=>'发送太快，请稍后再试！']);
//                $this->jsonError('发送太快，请稍后再试！');
            }
        }

        $rs = SMS::sendMbCode($mobile,$mbcode);
        $msg = $rs->Message;
        DB::insert('@pf_mbcodelog', array('mobile' => $mobile, 'mbcode' => '    验证码：' . $mbcode . ' 结果:' . $msg, 'ip' => $ip, 'addtime' => $time));
        if($msg != 'OK'){
            $this->returnJson(['error'=>'发送失败，请稍后再试！']);
        }
        $this->jsonSuccess('短信发送成功');
    }
    
    /**
     * @手机快速登录
     * @author ysq
     * @2017-11-8
     */
    
    public function login_msgAjaxPostAction(){
        $vals = $_POST;
        if (empty($_SESSION['mobile']) || $_SESSION['mobile'] != $vals['mobile']) {
             $this->returnJson(['error'=>"手机号码与接收短信的不一致"]);
        }
        if (empty($_SESSION['mbcode']) || $_SESSION['mbcode'] != $vals['code']) {
            $this->returnJson(['error'=>"短信验证码不正确"]);
        }
        $row = DB::getone('select * from @pf_member where mobile=? or username=?', array($vals['mobile'], $vals['mobile']));
        if(!$row){
            $user = [];
            $user['username'] = $vals['mobile'];
            $user['mobile'] = $vals['mobile'];
            $user['pass'] = md5(substr($vals['mobile'],-4).'123');
            $user['auth_mobile'] = 1;
            DB::insert('@pf_member', $user);
            $uid = DB::lastId();
           //会员注册成功，同步到客户表
            $_SESSION['username'] = $vals['mobile'];
            $_SESSION['userid'] = $uid;
            $id = $uid;
        }else{
            $_SESSION['username'] = empty($row['nickname']) ? $row['username'] : $row['nickname'];
            $_SESSION['userid'] = $row['id'];
            $id = $row['id'];
        }
        $arr = array('last_login_time' => DB::sql('this_login_time'), 'this_login_time' => DB::sql('now()'), 'errtice' => 0);
        $_SESSION['usertype'] = 0;
        $_SESSION['auth'] = 0;
        DB::update('@pf_member', $arr,$id ); //更新用户登录信息
        $url = $vals['url'];
        if ($url !='') {
           $this->returnJson(['url'=>$url]);
        }else{
            $this->returnJson(['url'=>"/user.html"]);
        }
    }

    function chkmobileAjaxAction() {
        $mobile = SPost('mobile');
        $row = DB::getone('select id from @pf_member where mobile=? or username=?', array($mobile, $mobile));
        return $row == NULL;
    }
    
     function chkmbcodeAjaxAction() {
        $val = SPost('code');
        $code = isset($_SESSION['mbcode']) ? $_SESSION['mbcode'] : '';
        return $val != '' && strtolower($val) == strtolower($code);
    }
}
