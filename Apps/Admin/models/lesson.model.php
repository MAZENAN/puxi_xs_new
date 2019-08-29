<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class LessonModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'lesson';
        $this->title = '案例信息';
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
            'title2' => array(
                'label' => '副标题',
                'label_width' => 150,
                'type' => 'text',
            ),
            'cover' => array(
                'label' => '封面图片',
                'label_width' => 150,
                'type' => 'upimg',
                'img_width' => 300,
                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
            ),
            'img' => array(
                'label' => '案例图',
                'label_width' => 150,
                'type' => 'upimg',
                'img_width' => 300,
                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
            ),
             'type' => array(
                'label' => '案例类型',
                'label_width' => 150,
                'type' => 'radiogroup',
                'options' => DB::getOpts('@pf_lesson_type'),
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '请选择案例类型',
                ),
                'header' => array(
                    0 => '',
                    1 => '选择案例类型',
                ),
            ),
              'class' => array(
                'label' => '案例分类',
                'label_width' => 150,
                'type' => 'select',
                'options' => DB::getOpts('@pf_lesson_class'),
            ),
            'link' => array(
                'label' => '网站链接',
                'label_width' => 150,
                'type' => 'text',
            ),
              'features' => array(
                'label' => '特色介绍',
                'label_width' => 150,
                'type' => 'textarea',
            ),
            'content' => array(
                'label' => '内容',
                'label_width' => 150,
                'type' => 'xheditor',
            ),
       
            'sort' => array(
                'label' => '权重值',
                'label_width' => 150,
                'type' => 'digits',
                'tab' => 'base',
                'default' => $this->getNextSort(),
                'close_html' => true,
                'offedit' => true,
                'tip_back' => '越大越靠前',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '权重值不能为空',
                    'digits' => '权重值必须是整数形式',
                ),
            ),
        );
    }

}
