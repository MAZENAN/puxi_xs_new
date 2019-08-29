<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class SchoolTypeModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        
        $this->tbname = 'school_type';
        $this->type = 1;
        $this->title = '营地周期';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
        'name' => array (
'label' => '名称',
'label_width' => 200,
'type' => 'text',
'data_val' => array (
  'required' => true,
),
'data_val_msg' => array (
  'required' => '名称不能为空',
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

        );
    }
}
