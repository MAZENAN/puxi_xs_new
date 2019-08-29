<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class HotdealswapModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'hotdealswap';
        $this->type = 1;
        $this->title = '热卖特惠';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }

    public function fields() {
        return array(
            'title' => array(
                'label' => '广告名称',
                'label_width' => 200,
                'type' => 'text',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '广告名称不能为空',
                ),
            ),
            'thumb' => array(
                'label' => '缩略图',
                'label_width' => 200,
                'type' => 'thumbnail',
                'img_width' => 300,
                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '缩略图不能为空',
                ),
            ),
            'info' => array(
                'label' => '简介',
                'label_width' => 200,
                'type' => 'textarea',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '简介不能为空',
                ),
            ),
            'links' => array(
                'label' => '连接地址',
                'label_width' => 200,
                'type' => 'text',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '连接地址不能为空',
                ),
            ),
            'sort' => array(
                'label' => '排序',
                'label_width' => 200,
                'type' => 'amountdigits',
                'default' => $this->getNextSort(),
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '排序不能为空',
                ),
            ),
        );
    }

}
