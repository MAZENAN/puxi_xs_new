<?php

if (!defined('SAMAO_VERSION')){
    exit('no direct access allowed');
}
    

class FormModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'form_base';
        $this->type = 1;
        $this->title = '报名表';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;

        parent::__construct($modeltype);
    }

    public function fields() {
        return array(
            'title'=>array(
                'label'=>'报名表名称',
                'label_width'=>120,
                'type'=>'text',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '报名表名称不能为空',
                ),
            ),
             'img'=>array(
                'label'=>'标题图片',
                'label_width'=>120,
                'type' => 'upimg',
                //'img_width' => 300,
                //'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',   
            ),
            'info'=>array(
                'label'=>'表头信息',
                'label_width'=>120,
                'type'=>'textarea',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '表头信息不能为空',
                ),
            ),
        );
    }
}
