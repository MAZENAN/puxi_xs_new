<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class PartnerModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        
        $this->tbname = 'partner';
        $this->type = 1;
        $this->title = '合作伙伴';
        $this->istab = false;
        $this->tabsplit = false;
        $this->basecontroler = 'SmcmsController';
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
'url' => array (
'label' => '链接地址',
'label_width' => 200,
'type' => 'text',
'default' => 'http://',
'data_val' => array (
  'required' => true,
  'regex' => '^(http|https)://[a-z0-9-]+(\\.[a-z0-9-]+)+.*$',
),
'data_val_msg' => array (
  'required' => '链接地址不能为空',
  'regex' => '链接地址格式不正确',
),
),
'sort' => array (
'label' => '排序',
'label_width' => 200,
'type' => 'digits',
'default' => $this->getNextSort(),
'tip_back' => '越小越靠前',
'data_val' => array (
  'required' => true,
  'digits' => true,
),
'data_val_msg' => array (
  'required' => '排序不能为空',
  'digits' => '排序必须是整数形式',
),
),
'type' => array (
'label' => '类型',
'label_width' => 200,
'type' => 'radiogroup',
'options' => array (
  0 => 
  array (
    0 => '1',
    1 => '友情链接',
  ),
  1 => 
  array (
    0 => '2',
    1 => '合作支持',
  ),
),
'data_val' => array (
  'required' => true,
),
'data_val_msg' => array (
  'required' => '请选择类型',
),
),

        );
    }
}
