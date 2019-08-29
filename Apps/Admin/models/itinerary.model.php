<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class ItineraryModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        
        $this->tbname = 'itinerary';
        $this->type = 1;
        $this->title = '行程安排';
        $this->istab = false;
        $this->tabsplit = false;
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

        );
    }
}
