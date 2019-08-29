<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class TopicModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'topic';
        $this->type = 1;
        $this->title = '专题列表';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
     
    }

    public function fields() {
        return array(
                    
            'name' => array(
                'label' => '专题标题',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '标题不能为空',
                ),
            ),
           'lead' => array(
                'label' => '导语',
                'label_width' => 150,
                 'type' => 'textarea',
            ),
            'image' => array(
                'label' => '专题头图',
                'label_width' => 150,
                'type' => 'upimg',
//                'img_width' => 300,
//                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
                'tip_back' => '750*400',
            ),
             'recommend_img' => array(
                'label' => '首页推荐图',
                'label_width' => 150,
                'type' => 'upimg',
//                'img_width' => 300,
//                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
                'tip_back' => '325*325',
            ),
           
               'share_title' => array(
                'label' => '分享标题',
                'label_width' => 150,
                'type' => 'text',
              
            ), 
              'share_content' => array(
                'label' => '分享内容',
                'label_width' => 150,
                'type' => 'textarea',
            ),
                'share_img' => array(
                'label' => '分享图片',
                'label_width' => 150,
                'type' => 'upimg',
//                'img_width' => 300,
//                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
                'tip_back' => '300*300',
            ),


     
          
//            'related_img' => array(
//                'label' => '关联图片',
//                'label_width' => 150,
//                'type' => 'upimg',
////                'img_width' => 300,
////                'img_height' => 200,
//                'extensions' => 'jpg,jpeg,gif,png',
//            ),
            'related_topic_1' => array(
                'label' => '关联专题1',
                'label_width' => 150,
                'type' => 'text',
                'placeholder'=>'粘贴专题ID',
                'data_val' => array(
                     'digits' => true,
                 ),
              'data_val_msg' => array(
                     'digits' => '专题ID必须是整数形式',
                 ),
            ),
            'related_topic_2' => array(
                'label' => '关联专题2',
                'label_width' => 150,
                'type' => 'text',
                'placeholder'=>'粘贴专题ID',
                'data_val' => array(
                     'digits' => true,
                 ),
              'data_val_msg' => array(
                     'digits' => '专题ID必须是整数形式',
                 ),
              
            ),
            'related_topic_3' => array(
                'label' => '关联专题3',
                'label_width' => 150,
                'type' => 'text',
                'placeholder'=>'粘贴专题ID',
                'data_val' => array(
                     'digits' => true,
                 ),
              'data_val_msg' => array(
                     'digits' => '专题ID必须是整数形式',
                 ),
              
            ),
           'related_topic_4' => array(
                'label' => '关联专题4',
                'label_width' => 150,
                'type' => 'text',
               'placeholder'=>'粘贴专题ID',
               'data_val' => array(
                     'digits' => true,
                 ),
              'data_val_msg' => array(
                     'digits' => '专题ID必须是整数形式',
                 ),
              
            ),
            'related_topic_5' => array(
                'label' => '关联专题5',
                'label_width' => 150,
                'type' => 'text',
                'placeholder'=>'粘贴专题ID',
                'data_val' => array(
                     'digits' => true,
                 ),
              'data_val_msg' => array(
                     'digits' => '专题ID必须是整数形式',
                 ),
              
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
            ),
        );
    }

}
