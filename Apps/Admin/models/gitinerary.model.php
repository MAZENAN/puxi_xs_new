<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class GitineraryModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        
        $this->tbname = 'gitinerary';
        $this->type = 1;
        $this->title = '全球行程安排';
        $this->istab = false;
        $this->tabsplit = false;
        $this->basecontroler = 'SamaoToolController';
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
        'name' => array (
'label' => '日期名称',
'label_width' => 100,
'type' => 'text',
'tip_back' => '如 Day 1',
'data_val' => array (
  'required' => true,
),
'data_val_msg' => array (
  'required' => '日期名称不能为空',
),
),
'tic' => array (
'label' => '行程标题',
'label_width' => 100,
'type' => 'text',
'data_val' => array (
  'required' => true,
),
'data_val_msg' => array (
  'required' => '行程标题不能为空',
),
),
'content' => array (
'label' => '内容安排',
'label_width' => 100,
'type' => 'textarea',
'data_val' => array (
  'required' => true,
),
'data_val_msg' => array (
  'required' => '内容安排不能为空',
),
),
'img' => array (
'label' => '行程插图',
'label_width' => 100,
'type' => 'upimg',
'img_width' => 200,
'img_height' => 200,
'extensions' => 'jpg,jpeg,gif,png',
),

        );
    }
}
