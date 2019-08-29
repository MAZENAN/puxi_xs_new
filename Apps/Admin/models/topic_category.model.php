<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class TopicCategoryModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'topic_category';
        $this->type = 1;
        $this->title = '专题分类列表';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
     
    }

    public function fields() {
        return array(
                     
            'category' => array(
                'label' => '分类标题',
                'label_width' => 50,
                'type' => 'text',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '标题不能为空',
                ),
            ),
            
            'sort' => array(
                'label' => '排序',
                'label_width' => 50,
                 'type' => 'text',
            ),

            'camp_id' => array(
                'label' => '分类产品',
                'label_width' => 150,
                'row_hide'=>true,
            ),
            
             'topic_id' => array(
                'label' => '专题id',
                'label_width' => 150,
                'row_hide'=>true,
            ),
            'cid' => array(
                'label' => '分类id',
                'label_width' => 150,
                'row_hide'=>true,
            ),
                                   
        );
    }

}
