<?php

class HomeController extends Controller {

    public $userid = 0, $username = '';

    public function __construct() {
        session_start();
        $this->userid = isset($_SESSION['userid']) ? intval($_SESSION['userid']) : 0;
        $this->username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
        $this->addbook('user', ['id' => $this->userid, 'name' => $this->username]);
        $intro = IGet('intro');
        if ($intro != 0) {
            setcookie('intro', $intro);
        }

        $model = new LoginModel();
        $model->Fields['url']->default =urlencode($_SERVER['REQUEST_URI']);
        $model->assignTo($this);
        
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $_host = $_SERVER['HTTP_HOST'];
        $this->assign('_host',$_host);
       
//       if (Behavior::is_mobile_request()||strpos($user_agent, 'MicroMessenger')){
//
//           if (strpos($_host, "www.")!==false) {
//               header("location: http://".str_replace("www.","m.", $_host).$_SERVER['REQUEST_URI']);
//           }else{
//               header("location: http://m.".$_host.$_SERVER['REQUEST_URI']);
//           }
//
//           die;
//       }
        
        //获取网站配置信息
        $this->assign('config',DB::getone('select * from @pf_config order by id asc'));
        $this->assign('customer',DB::getone('select * from @pf_customer order by id asc'));
    }

    public function islogin() {
        if (empty($this->userid) || empty($this->username)) {
            $this->error(NULL, '/login.html?url=' . urlencode($_SERVER['REQUEST_URI']));
        }
    }

    public function returnJson($data) {
        header('Content-Type: text/json;charset=utf-8');
        die(json_encode($data, JSON_UNESCAPED_UNICODE));
    }

    public function jsonError($error, $url = NULL) {
        $rt = ['formError' => $error];
        if ($url !== NULL) {
            $rt['jumpurl'] = $url;
        }
        $this->returnJson($rt);
    }

    public function jsonSuccess($msg = NULL, $url = NULL, $data = null) {
        $rt = [];
        if (!empty($data)) {
            $rt['data'] = $data;
        }
        if ($msg) {
            $rt['success'] = $msg;
        }
        if ($url !== NULL) {
            $rt['jumpurl'] = $url;
        }
        $this->returnJson($rt);
    }

}
