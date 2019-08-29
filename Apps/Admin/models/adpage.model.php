<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class AdpageModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        
        $this->tbname = 'adpage';
        $this->type = 1;
        $this->title = '广告单页';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
        'name' => array (
'label' => '广告名称',
'label_width' => 200,
'type' => 'text',
'data_val' => array (
  'required' => true,
),
'data_val_msg' => array (
  'required' => '广告名称不能为空',
),
),

        );
    }
}
