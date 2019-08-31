<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class DocumentModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'document';
        $this->type = 1;
        $this->title = '期刊文档';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
//         $this->script = '
//        $(function() {$("#year").timepicker({timeFormat: \'yyyy\'});});
//        ';
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
            'year' => array(
                'label' => '期刊年份',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                    'required' =>true
                )
            ),
            'phase' => array(
                'label' => '期刊期数',
                'label_width' => 150,
                'type' => 'amountdigits',
                'data_val' => array(
                    'required' =>true
                ),
                'default' => '1'
            ),
            'code' => array(
                'label' => '文档唯一编号',
                'label_width' => 150,
                'type' => 'text',
                'close' => true
            ),
            'file' => array(
                'label' => '期刊文件',
                'label_width' => 150,
                'type' => 'upfile',
                'extensions' => 'docx,doc,pdf',
//                'data_val' => array(
//                    'required' =>true
//                )
            ),
            'images' => array(
                'label' => '期刊预览图',
                'label_width' => 150,
                'type' => 'upimggroup',
                'extensions' => 'jpg,jpeg,gif,png',
//                'data_val' => array(
//                    'required' =>true
//                )
            ),
            'note' => array(
                'label' => '文档备注',
                'label_width' => 150,
                'type' => 'textarea',
            ),
            'allow' => array(
                'label' => '是否启用',
                'label_width' => 150,
                'type' => 'bool',
                'default' => '1',
            ),
            'periodical_id' => array(
                'label' => '关联的期刊编号',
                'label_width' => 150,
                'type' => 'hidden',
                'options' => DB::getopts("@pf_periodical",'id,title'),
                'value' => IGet('periodical_id'),
                'row_hide' => true
            ),

        );
    }
}