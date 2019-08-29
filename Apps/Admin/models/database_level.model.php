<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class DatabaseLevelModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        $this->tbname = 'database_level';
        $this->type = 1;
        $this->title = '期刊级别';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
            'name' => array(
                'label' => '级别名',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                    'required' => true,
                )
            ),
            'alias' => array(
                'label' => '别名',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                    'required' => true,
                )
            ),

        );
    }
}