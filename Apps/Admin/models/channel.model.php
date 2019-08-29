<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class ChannelModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        
        $this->tbname = 'channel';
        $this->type = 1;
        $this->title = '频道列表';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
       
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
        'name' => array (
            'label' => '频道名称',
            'label_width' => 150,
            'type' => 'text',
            'data_val' => array (
              'required' => true,
            ),
            'data_val_msg' => array (
              'required' => '频道名称不能为空',
            ),
        ),
         'icon' => array(
                'label' => '图标',
                'label_width' => 150,
                'type' => 'upimg',
                'img_width' => 200,
                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
                'data_val' => array (
                    'required' => true,
                  ),
                'data_val_msg' => array (
                  'required' => '图标不能为空',
                ),
             'tip_back' => '建议尺寸130*174 (24号字；#333333)',
            ),
            
            'type' => array (
                'label' => '频道类型',
                'label_width' => 150,
                'type' => 'radiogroup',
                  'options' => array (
                    0 => 
                    array (
                      0 => '0',
                      1 => '专题',
                    ),
                    1 => 
                    array (
                      0 => '1',
                      1 => '关联营期',
                    ),
                    2 => 
                    array (
                      0 => '2',
                      1 => '自定义产品列表',
                    ),
                  ),
                 'data_val' => array (
                    'required' => true,
                  ),
                'data_val_msg' => array (
                  'required' => '请选择频道类型',
                ),
                'dynamic' => array (
                0 => 
                array (
                    'val' => '0',
                    'hide' => 'related_camp',
                    'show' =>'topic_id',

                ),
                1 => 
                array (
                    'val' => '0',
                    'hide' =>'img',

                ),
                2 => 
                array (
                    'val' => '1',
                    'show' => 'related_camp',
                    'hide' =>'topic_id',

                ), 
                3 => 
                array (
                    'val' => '1',
                    'hide' =>'img',

                ),
                4 => 
                array (
                    'val' => '2',
                    'hide' =>'topic_id',
                    'show' => 'img',
                ),
                5 => 
                array (
                    'val' => '2',
                    'hide' =>'related_camp',

                ),
              ),
            ),
              'topic_id' => array (
                'label' => '专题ID',
                'label_width' => 150,
                'type' => 'text',
                'tip_back' => '只能填一个',
            ),
              'related_camp' => array (
                'label' => '关联营期',
                'label_width' => 150,
                'type' => 'radiogroup',
                'options' => DB::getOpts('@pf_camp_holiday'),
            ),
            'img' => array(
                'label' => '头图',
                'label_width' => 150,
                'type' => 'upimg',
                'img_width' => 600,
                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
                'tip_back' => '建议尺寸宽750,高度不限',
            ),
             'uptime' => array(
                'label' => '上架时间',
                'label_width' => 150,
                'type' => 'datetime',
            ),
             'downtime' => array(
                'label' => '下架时间',
                'label_width' => 150,
                'type' => 'datetime',
            ),
       
        );
    }
}
