<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class MemberModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'member';
        $this->type = 1;
        $this->title = '';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
                    'username' => array(
                'label' => '用户名',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'pass' => array(
                'label' => '用户密码',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'email' => array(
                'label' => '邮箱',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'mobile' => array(
                'label' => '手机号码',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'errtice' => array(
                'label' => '错误次数',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'errtime' => array(
                'label' => '错误日期',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'lock' => array(
                'label' => '锁定',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'last_login_time' => array(
                'label' => '上次登陆',
                'label_width' => 150,
                'type' => 'datetime',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'this_login_time' => array(
                'label' => '本次登录',
                'label_width' => 150,
                'type' => 'datetime',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'name' => array(
                'label' => '姓名',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'telephone' => array(
                'label' => '联系电话',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'exp_address' => array(
                'label' => '快递地址',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'expsame' => array(
                'label' => '快递地址选项',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'remark' => array(
                'label' => '备注',
                'label_width' => 150,
                'type' => 'textarea',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'area' => array(
                'label' => '区域',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'address' => array(
                'label' => '地址信息',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'nickname' => array(
                'label' => '昵称',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'score' => array(
                'label' => '积分',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'auth_email' => array(
                'label' => '邮箱认证',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'auth_mobile' => array(
                'label' => '手机认证',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'express_address' => array(
                'label' => '快递地址',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'unionid' => array(
                'label' => '微信ID',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'gender' => array(
                'label' => '性别：1是男，0是女',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'webchat' => array(
                'label' => '微信号(联系方式)',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'addtime' => array(
                'label' => '客户添加时间',
                'label_width' => 150,
                'type' => 'datetime',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'img_head' => array(
                'label' => '用户头像',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),

        );
    }
}