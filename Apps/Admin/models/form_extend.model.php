<?php

if (!defined('SAMAO_VERSION')){
    exit('no direct access allowed');
}
    

class FormExtendModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'form_extend';
        $this->type = 1;
        $this->title = '';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;

        parent::__construct($modeltype);
    }


}
