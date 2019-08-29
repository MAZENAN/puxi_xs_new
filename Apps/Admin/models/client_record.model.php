<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class ClientRecordModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'client_record';
        $this->type = 1;
        $this->title = '客户跟进记录';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);

    }

    public function fields() {
        return array(
            'client_id' => array(
                'label' => 'client_id',
                'label_width' => 150,
                'type' => 'digits',
                'default' => IGet('client_id'),
                'close_html' => true,
            ),
            'add_time' => array(
                'label' => '跟进时间',
                'label_width' => 150,
                'type' => 'datetime',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '跟进时间不能为空',
                ),
                'default'=>date('Y-m-d H:i:s'),
            ),
            'manage_id' => array(
                'label' => '跟进人',
                'label_width' => 150,
                'type' => 'select',
                //'options' => DB::getopts('@pf_manage',null,0,"type in(7,13) and islock = 0"),
                'header' => array(
                    0 => '',
                    1 => '课程顾问',
                ),
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '跟进人不能为空',
                ),
                'style' => 'width:120px;',
            ),
            'contact' => array(
                'label' => '联系方式',
                'label_width' => 150,
                'type' => 'select',
                'options' => array(
                    0 =>
                    array(
                        0 => '电话',
                        1 => '电话',
                    ),
                    1 =>
                    array(
                        0 => '微信',
                        1 => '微信',
                    ),
                    2 =>
                    array(
                        0 => 'QQ',
                        1 => 'QQ',
                    ),
                    3 =>
                    array(
                        0 => '邮件',
                        1 => '邮件',
                    ),
                    4 =>
                    array(
                        0 => '短信',
                        1 => '短信',
                    ),
                ),
                'header' => array(
                    0 => '',
                    1 => '跟进方式',
                ),
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '跟进方式不能为空',
                ),
                'style' => 'width:120px;',
            ),
            'content' => array(
                'label' => '跟进结果',
                'label_width' => 150,
                'type' => 'textarea',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '跟进结果不能为空',
                ),
            ),

            'type'=>array(
                'label' => '客户类型',
                'row_hide'=>true,

            ),
            'flag'=>array(
                'label' => '标志',
                'row_hide'=>true,
                'close' => true,

            ),
        );
    }

}
