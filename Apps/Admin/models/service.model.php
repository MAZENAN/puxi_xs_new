<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class ServiceModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'service';
        $this->title = '流程服务';
        $this->type = 1;
        $this->istab = false;
        $this->tabsplit = false;
        $this->basecontroler = 'SamaoToolController';
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }

    public function fields() {
        return array(
            'title' => array(
                'label' => '标题',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '标题不能为空',
                ),
            ),
            'eng_name' => array(
                'label' => '英文名',
                'label_width' => 150,
                'type' => 'text',
            ),
            'icon' => array(
                'label' => '图标',
                'label_width' => 150,
                'type' => 'upimg',
                'img_width' => 300,
                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
            ),
            'bg_img' => array(
                'label' => '背景图',
                'label_width' => 150,
                'type' => 'upimg',
                'img_width' => 300,
                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
            ),

            'desc' => array(
                'label' => '描述',
                'label_width' => 150,
                'type' => 'text',
            ),

        );
    }

}
