<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class PeriodicalCatalogModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'periodical_catalog';
        $this->type = 1;
        $this->title = '目录管理';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
            'name' => array(
                'label' => '目录名',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                    'required' => true
                )
            ),
            'sort' => array(
                'label' => '排序',
                'label_width' => 150,
                'type' => 'amountdigits',
                'default' => $this->getNextSort(),
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '排序不能为空',
                ),
            ),
            'from' => array(
                'label' => '开始页码',
                'label_width' => 150,
                'type' => 'amountdigits',
                'default' => 0
            ),
            'to' => array(
                'label' => '结束页码',
                'label_width' => 150,
                'type' => 'amountdigits',
                'default' => 0
            ),
            'add_time' => array(
                'label' => '添加时间',
                'label_width' => 150,
                'type' => 'datetime',
                'close' => true
            ),
            'document_id' => array(
                'label' => '文档id',
                'label_width' => 150,
                'type' => 'hidden',
                'value' => IGet('document_id'),
                'row_hide' => true
            ),

        );
    }
}