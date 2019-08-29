<?php
if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class ApplyModel extends SmcmsModel{

	public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'withdraws_cash';
        $this->type = 1;
        $this->title = '提现信息';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }


     public function fields() {
        return array(
           
            'mobile' => array(
                'label' => '手机号',
                'label_width' => 200,
                'type' => 'text',
            ),
            
         );   
    }
}