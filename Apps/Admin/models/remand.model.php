<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class RemandModel extends SmcmsModel
{

    public function __construct($modeltype = self::MODEL_ADD)
    {

        $this->tbname = 'remand';
        $this->title = '需求列表';
        $this->type = 1;
        $this->istab = false;
        $this->tabsplit = false;
        $this->basecontroler = 'SamaoToolController';
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
}