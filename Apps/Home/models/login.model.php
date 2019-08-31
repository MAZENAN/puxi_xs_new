<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class LoginModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        
        $this->tbname = 'member';
        $this->type = 1;
        $this->title = '用户登录';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
          'mobile' => array(
                'label' => '手机号码',
                'label_width' => 200,
                'type' => 'text',
//                'tab' => 'sjzc',
                'data_val' => array(
                    'mobile' => true,
                    'required' => true,
//                    'remote' =>
//                    array(
//                        0 => '__APPROOT__/login/chkmobile.html',
//                        1 => 'POST',
//                    ),
                ),
                'data_val_msg' => array(
                    'mobile' => '错误提示：手机号码格式不正确',
                    'required' => '错误提示：手机号码不能为空',
//                    'remote' => '错误提示：手机号码已经存在，请更换其他手机号码',
                ),
                'data_valmsg_for' => '#mobile_err',
                'placeholder' => '请输入手机号',
            ),
//            'mpass' => array(
//                'label' => '用户密码',
//                'label_width' => 200,
//                'type' => 'password',
//                'tab' => 'sjzc',
//                'data_val' => array(
//                    'required' => true,
//                    'minlength' => 6,
//                ),
//                'data_val_msg' => array(
//                    'required' => '错误提示：用户密码不能为空',
//                    'minlength' => '错误提示：用户密码最小长度不能低于{0}位',
//                ),
//                'data_valmsg_for' => '#mpass_err',
//                'placeholder' => '请输入密码',
//            ),
//            'mcfgpass' => array(
//                'label' => '用户密码',
//                'label_width' => 200,
//                'type' => 'password',
//                'tab' => 'sjzc',
//                'data_val' => array(
//                    'equalTo' => '#mpass',
//                    'required' => true,
//                ),
//                'data_val_msg' => array(
//                    'equalTo' => '错误提示：两次输入的用户密码不一致',
//                    'required' => '错误提示：请再次输入密码',
//                ),
//                'data_valmsg_for' => '#mcfgpass_err',
//                'placeholder' => '请再次输入密码',
//            ),
//        'mobile' => array (
//          'label' => '手机号',
//          'label_width' => 200,
//          'type' => 'text',
//          'data_val' => array (
//            'mobile' => true,
//            'required' => true,
//          ),
//          'data_val_msg' => array (
//            'mobile' => '错误提示：手机号码格式不正确',
//            'required' => '错误提示：手机号不能为空',
//          ),
//          'data_valmsg_for' => '#mobile_err',
//          'placeholder' => '请输入您注册时的手机号码',
//          ),
//          'pass' => array (
//          'label' => '密码',
//          'label_width' => 200,
//          'type' => 'password',
//          'data_val' => array (
//            'required' => true,
//            'minlength' => 6,
//          ),
//          'data_val_msg' => array (
//            'required' => '错误提示：密码不能为空',
//            'minlength' => '错误提示：用户密码最小长度不能低于{0}位',
//          ),
//          'data_valmsg_for' => '#pass_err',
//          'placeholder' => '请确认您的密码',
//          ),
            'code' => array(
                'label' => '验证码',
                'label_width' => 200,
                'type' => 'text',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '错误提示：验证码不能为空',
                ),
                'placeholder' => '验证码',
            ),
          'url' => array (
              'label' => 'url',
              'label_width' => 200,
              'type' => 'hidden',
              'row_hide' => true,
          ),
        );
    }
}
