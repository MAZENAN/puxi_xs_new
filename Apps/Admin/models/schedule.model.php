<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class ScheduleModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        
        $this->tbname = 'schedule';
        $this->type = 1;
        $this->title = '模块';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
          'title' => array (
          'label' => '标题',
          'label_width' => 150,
          'type' => 'text',
          'data_val' => array (
            'required' => true,
          ),
          'data_val_msg' => array (
            'required' => '标题不能为空',
          ),
          ),
          'content' => array (
          'label' => '内容',
          'label_width' => 150,
          'type' => 'xheditor',
          'style' => 'height:260px;',
          'data_val' => array (
            'required' => true,
          ),
          'data_val_msg' => array (
            'required' => '内容不能为空',
          ),
          ),
          'lesson_id' => array(
                'label' => 'lesson_id',
                'label_width' => 150,
                'type' => 'digits',
                'default' => IGet('lesson_id'),
                'close_html' => true,
            ),
          'sort' => array (
          'label' => '权重排序',
          'label_width' => 150,
          'type' => 'digits',
          'default' => $this->getNextSort(),
          'tip_back' => '越小越靠前',
          'data_val' => array (
            'required' => true,
            'digits' => true,
          ),
          'data_val_msg' => array (
            'required' => '权重排序不能为空',
            'digits' => '权重排序必须是整数形式',
          ),
          ),

        );
    }
}
