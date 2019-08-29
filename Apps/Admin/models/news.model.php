<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class NewsModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'news';
        $this->title = IGet('type')==1 ? '行业动态':'公司新闻';
        $this->type = 1;
        $this->istab = false;
        $this->tabsplit = false;
        $this->basecontroler = 'SmcmsController';
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

            'intro' => array(
                'label' => '简介',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '简介不能为空',
                ),
            ),

            'img' => array(
                'label' => '图片',
                'label_width' => 150,
                'type' => 'upimg',
                'img_width' => 300,
                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
            ),


            'content' => array (
                'label' => '内容',
                'label_width' => 200,
                'type' => 'xheditor',
                'data_val' => array (
                    'required' => true,
                ),
                'data_val_msg' => array (
                    'required' => '内容不能为空',
                ),
            ),

            'sort' => array (
                'label' => '排序',
                'label_width' => 200,
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
            'type' => array(
                'label' => '新闻类型',
                'label_width' => 150,
                'type' => 'text',
                'row_hide'=>TRUE,
                'default'=>IGet('type'),
            ),

        );
    }

}
