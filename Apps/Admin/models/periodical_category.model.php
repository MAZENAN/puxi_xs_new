<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class PeriodicalCategoryModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        $this->tbname = 'periodical_category';
        $this->type = 1;
        $this->title = '期刊分类';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
            'title' => array(
                'label' => '期刊分类名',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                    'required' => true
                )
            ),
            'pid' => array(
                'label' => '期刊分类',
                'label_width' => 150,
                'type' => 'select',
                'options' =>DB::getopts('@pf_periodical_category','id,title',0,"pid = 0 "),
                'header' => array(
                    0 => '0',
                    1 => '顶级分类',
                ),
                'data_val' => array(
                    'required' => true,
                ),
            ),
            'description' => array(
                'label' => '期刊分类描述',
                'label_width' => 150,
                'type' => 'textarea',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'allow' => array(
                'label' => '是否启用',
                'label_width' => 150,
                'type' => 'bool',
                'default' => '1',

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

        );
    }
}