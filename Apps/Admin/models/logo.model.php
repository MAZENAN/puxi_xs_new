<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class LogoModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'logo';
        $this->type = 1;
        $this->title = 'logo图';
        $this->istab = false;
        $this->tabsplit = false;
        $this->basecontroler = 'SamaoToolController';
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
            'img' => array(
                'label' => 'logo图',
                'label_width' => 150,
                'type' => 'upimg',
                'img_width' => 300,
                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
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
