<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class ClientModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'member';
        $this->type = 1;
        $this->title = '用户信息';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;

        parent::__construct($modeltype);
    }

    public function fields() {
        return array(
          
            'mobile' => array(
                'label' => '手机号码',
                'label_width' => 150,
                'type' => 'text',               
            ),
            
            'name' => array(
                'label' => '姓名',
                'label_width' => 150,
                'type' => 'text',
            ),
            'telephone' => array(
                'label' => '联系电话',
                'label_width' => 150,
                'type' => 'text',
            ),
            'email' => array(
                'label' => '邮箱',
                'label_width' => 150,
                'type' => 'text',
               
            ),
            'webchat' => array(
                'label' => '微信号',
                'label_width' => 150,
                'type' => 'text',
            ),
           
            'remark' => array(
                'label' => '备注',
                'label_width' => 150,
                'type' => 'textarea',
            ),
            'area' => array(
                'label' => '区域',
                'label_width' => 150,
                'type' => 'linkage',
                'headers' => array(
                    0 => '选择城市',
                    1 => '选择城市',
                ),
                'data_url' => '/service/area.php',
            ),
            'address' => array(
                'label' => '地址信息',
                'label_width' => 150,
                'type' => 'textarea',
            ),
            'nickname' => array(
                'label' => '昵称',
                'label_width' => 150,
                'type' => 'text',
            ),
            
       
            'wname' => array(
                'label' => '微信昵称',
                'label_width' => 150,
                'type' => 'text',
               
            ),
           
              'parent_id' => array(
                'label' => '所属人员',
                'label_width' => 150,
                'type' => 'select',
                'close' => false,
                 'options' => DB::getopts('@pf_manage',null,0,"type in(7,12,13) and islock = 0"),
                  'valtype' => 'int',
                  'header' => array(
                    0 => '',
                    1 => '所属人员',
                ),
               
            ),
           
            'errtice' => array(
                'label' => '错误次数',
                'label_width' => 150,
                'type' => 'digits',
                'close' => true,
            ),
           
            'last_login_time' => array(
                'label' => '上次登陆',
                'label_width' => 150,
                'type' => 'datetime',
                'offedit' => true,
            ),
            'this_login_time' => array(
                'label' => '本次登录',
                'label_width' => 150,
                'type' => 'datetime',
                'offedit' => true,
            ),
         
            'gender' => array(
                'label' => '性别',
                'label_width' => 150,
                'type' => 'radiogroup',
                'tab' => 'base',
                'options' => array (
                    0 => 
                    array (
                      0 => '0',
                      1 => '女',
                    ),
                    1 => 
                    array (
                      0 => '1',
                      1 => '男',
                    ),
                  ),
                  'default' => '0',
                  ),
             'birthday' => array(
                'label' => '生日',
                'label_width' => 150,
                'type' => 'date',
                
            ),
             'QQ' => array(
                'label' => 'QQ',
                'label_width' => 150,
                'type' => 'text',
                
            ),
             'wname' => array(
                'label' => '微信昵称',
                'label_width' => 150,
                'type' => 'text',
                
            ),
             'alternate_contact' => array(
                'label' => '备用联系人',
                'label_width' => 150,
                'type' => 'text',
                
            ),
             'contact_phone' => array(
                'label' => '备用联系人电话',
                'label_width' => 150,
                'type' => 'text',
                
            ),
            'client_source' => array(
                'label' => '客户来源',
                'label_width' => 150,
                'type' => 'select',
                 'options' => DB::getopts('@pf_client_from'),
                  'valtype' => 'int',
                                
            ),
            'interest_camp' => array(
                'label' => '感兴趣的营期',
                'label_width' => 150,
                'type' => 'checkgroup',
                'tab' => 'base',
                'options' => DB::getOpts('@pf_camp_holiday'),
                'style' => 'width:auto; margin-right:15px;',
                
            ),
            'level' => array(
                'label' => '成熟度',
                'label_width' => 150,
                'type' => 'select',
                'options' => DB::getopts('@pf_client_intention'),
                  'valtype' => 'int'
                
            ),
            'bank_account' => array(
                'label' => '银行账号',
                'label_width' => 150,
                'type' => 'text',
                
            ),
            'bank_account_name' => array(
                'label' => '银行账户户名',
                'label_width' => 150,
                'type' => 'text',
                
            ),
            'bank' => array(
                'label' => '开户行',
                'label_width' => 150,
                'type' => 'text',
                
            ),
            'alipay' => array(
                'label' => '支付宝账号',
                'label_width' => 150,
                'type' => 'text',
                
            ),
            'user_id' => array(
                'label' => '会员id',
                'label_width' => 150,
                'type' => 'text',
                'row_hide' => true,
                
            ),
            
            //营员信息
            'school_type' => array(
                'label' => '学校类型',
                'label_width' => 150,
                'type' => 'select',
                'options' => DB::getopts('@pf_school_type'),
                'valtype' => 'int',
                'close' => FALSE,
            ),
             'c_name' => array(
                'label' => '营员姓名',
                'label_width' => 150,
                'type' => 'text',
                'close' => FALSE,
                
            ),
             'c_gender' => array(
                'label' => '性别',
                'label_width' => 150,
                'type' => 'radiogroup',
                'tab' => 'base',
                'options' => array (
                    0 => 
                    array (
                      0 => '0',
                      1 => '女',
                    ),
                    1 => 
                    array (
                      0 => '1',
                      1 => '男',
                    ),
                  ),
                  'default' => '0',
                 'close' => FALSE,
                  ),
              'englishname' => array(
                'label' => '英文名',
                'label_width' => 150,
                'type' => 'text',
                'close' => FALSE,
                
            ),
             'c_remark' => array(
                'label' => '备注',
                'label_width' => 150,
                'type' => 'textarea',
                 'close' => FALSE,
            ),
             'c_birthday' => array(
                'label' => '子女生日',
                'label_width' => 150,
                'type' => 'date',
               'close' => FALSE,
            ),
             'school' => array(
                'label' => '就读学校',
                'label_width' => 150,
                'type' => 'text',
                 'close' => FALSE,
            ),
               'phone' => array(
                'label' => '联系电话',
                'label_width' => 150,
                'type' => 'text',
                 'close' => FALSE,
            ),
            'camper_id' => array(
                'label' => '营员id',
                'label_width' => 150,
                'type' => 'text',
                'row_hide' => true,
                
            ),
            'client_id' => array(
                'label' => '后台会员id',
                'label_width' => 150,
                'type' => 'text',
                'row_hide' => true,
                
            ),
            
            //子女健康信息
             'height' => array(
                'label' => '身高',
                'label_width' => 150,
                'type' => 'text',
                 'close' => FALSE,
            ),
             'weight' => array(
                'label' => '体重',
                'label_width' => 150,
                'type' => 'text',
              'close' => FALSE,
            ),
             'sickness' => array(
                'label' => '有无重大疾病',
                'label_width' => 150,
                'type' => 'textarea',
             'close' => FALSE,
            ),
             'taboo_allergy' => array(
                'label' => '饮食禁忌及过敏情况',
                'label_width' => 150,
                'type' => 'textarea',
               'close' => FALSE,
            ),
            
            
            //证件信息
             'IDcard' => array(
                'label' => '身份证号码',
                'label_width' => 150,
                'type' => 'text',
                'style' => 'width:300px',
               'close' => FALSE,
            ),
            'passportNo' => array(
                'label' => '护照号码',
                'label_width' => 150,
                'type' => 'text',
                'style' => 'width:300px',
                'close' => FALSE,
            ),
            'Nationality' => array(
                'label' => '护照国籍',
                'label_width' => 150,
                'type' => 'select',
                'options' => DB::getopts('@pf_nationality'),
                'valtype' => 'int',
                'close' => FALSE,
            ),
            'valid_date' => array(
                'label' => '护照有效期',
                'label_width' => 150,
                'type' => 'date',
                'close' => FALSE,
            ),
           
        );
    }

}
