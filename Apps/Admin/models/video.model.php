<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class VideoModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'video';
        $this->type = 1;
        $this->title = '视频';
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
            'lesson_id' => array(
                'label' => 'lesson_id',
                'label_width' => 150,
                'type' => 'digits',
                'default' => IGet('lesson_id'),
                'close_html' => true,
            ),
            'title' => array(
                'label' => '标题',
                'label_width' => 150,
                'type' => 'text',
            ),
            'cover' => array(
                'label' => '封面图片',
                'label_width' => 150,
                'type' => 'upimg',
                'extensions' => 'jpg,jpeg,gif,png',
            ),
            'link' => array (
                'label' => '视频',
                'label_width' => 150,
                'type' => 'textarea',
            ),
            'content' => array(
                'label' => '介绍',
                'label_width' => 150,
                'type' => 'textarea',
            ),
            'sort' => array (
                'label' => '排序',
                'label_width' => 150,
                'type' => 'digits',
                'default' => $this->getNextSort(),
                'data_val' => array (
                  'required' => true,
                  'digits' => true,
                ),
                'data_val_msg' => array (
                  'required' => '排序不能为空',
                  'digits' => '排序必须是整数形式',
                ),
            ),
        );
    }

}
