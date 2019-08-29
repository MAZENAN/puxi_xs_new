<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class OdepDateModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'odep_date';
        $this->type = 1;
        $this->title = '出发日期';
        $this->istab = false;
        $this->tabsplit = false;
        $this->basecontroler = 'SamaoToolController';
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }

    public function fields() {
        return array(
            'periods' => array(
                'label' => '期数',
                'label_width' => 150,
                'type' => 'digits',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '期数不能为空',
                    'digits' => '期数必须是整数形式',
                ),
            ),
            'campid' => array(
                'label' => 'campid',
                'label_width' => 150,
                'type' => 'digits',
                'default' => IGet('campid'),
                'close_html' => true,
            ),
            'start' => array(
                'label' => '起始日期',
                'label_width' => 150,
                'type' => 'date',
                'data_val' => array(
                    'required' => true,
                    'date' => true,
                ),
                'data_val_msg' => array(
                    'required' => '起始日期不能为空',
                    'date' => '起始日期格式不正确',
                ),
            ),
            'end' => array(
                'label' => '结束日期',
                'label_width' => 150,
                'type' => 'date',
                'close' => true,
                'data_val' => array(
                    'required' => true,
                    'date' => true,
                ),
                'data_val_msg' => array(
                    'required' => '结束日期不能为空',
                    'date' => '结束日期格式不正确',
                ),
            ),
            'days' => array(
                'label' => '出发天数',
                'label_width' => 150,
                'type' => 'amountdigits',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '出发天数不能为空',
                    'digits' => '出发天数必须是整数形式',
                ),
                'follow_text' => '天',
            ),
            'cost' => array(
                'label' => '费用',
                'label_width' => 150,
                'type' => 'digits',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '费用不能为空',
                    'digits' => '费用必须是整数形式',
                ),
                'follow_text' => '元',
                'data_valmsg_for' => '#cost_info',
            ),
            'deposit' => array(
                'label' => '预付订金',
                'label_width' => 150,
                'type' => 'digits',
                'merge' => true,
                'merge_type' => '1',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '预付订金不能为空',
                    'digits' => '预付订金必须是整数形式',
                ),
                'follow_text' => '元',
                'data_valmsg_for' => '#cost_info',
            ),
            'agefrom' => array(
                'label' => '适合年龄',
                'label_width' => 150,
                'type' => 'amountdigits',
                'close' => true,
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '适合年龄不能为空',
                    'digits' => '适合年龄必须是整数形式',
                ),
                'data_valmsg_for' => '#agefrom_info',
                '@minititle' => '从：',
            ),
            'ageto' => array(
                'label' => '到',
                'label_width' => 150,
                'type' => 'amountdigits',
                'merge' => true,
                'merge_type' => '1',
                'close' => true,
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '适合年龄不能为空',
                    'digits' => '适合年龄必须是整数形式',
                ),
                'follow_text' => '岁',
                'data_valmsg_for' => '#agefrom_info',
                '@minititle' => '到',
            ),
            'summary' => array(
                'label' => '备注',
                'label_width' => 150,
                'type' => 'textarea',
                'close' => true,
            ),
             'tourists' => array(
                'label' => '参游人数',
                'label_width' => 150,
                'type' => 'amountdigits',
                'tab' => 'base',
                'default' => '1',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '参游人数不能为空',
                    'digits' => '参游人数必须是整数形式',
                ),
                'follow_text' => '人',
                '@minititle' => '学生：',
            ),
            'parent' => array(
                'label' => '家长',
                'label_width' => 200,
                'type' => 'amountdigits',
                'tab' => 'base',
                'merge' => true,
                'merge_type' => '1',
                'default' => '0',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '参游人数不能为空',
                    'digits' => '参游人数必须是整数形式',
                ),
                'follow_text' => '人',
            ),
            'remark' => array(
                'label' => '备注',
                'label_width' => 150,
                'type' => 'text',
                'style' => 'width:120px;',
                'tip_back' => '简单备注，请控制字数',
            ),
        );
    }

}
