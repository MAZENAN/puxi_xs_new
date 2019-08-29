<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class PeriodicalModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'periodical';
        $this->type = 1;
        $this->title = '期刊信息';
        $this->istab = true;
        $this->tabsplit = false;
        $this->tabs = array(
            'base' => '基本信息',
            'other' => '其他信息',
        );
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }
    public function fields() {
        return array(
            'title' => array(
                'label' => '期刊标题名',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'base',
                'data_val' => array(
                    'required' => true
                ),
                'data_val_msg' => array(
                ),
            ),
            'cate' => array(
                'label' => '期刊分类',
                'label_width' => 150,
                'type' => 'linkage',
                'headers' => array(
                    0 => '选择一级分类',
                    1 => '选择二级分类',
                ),
                'data_url' => '/admin/periodical_category/getCates',
                'data_val' => array(
                    'required' => true
                ),
                'tab' => 'base'
            ),
            'level_ids' => array(
                'label' => '期刊级别',
                'label_width' => 150,
                'type' => 'checkgroup',
                'options' => DB::getopts('@pf_database_level','id,name'),
                'tab' => 'base',
            ),
            'first_letter' => array(
                'label' => '期刊名首字母',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
                'close' => true
            ),

            'cover' => array (
                'label' => '封面',
                'label_width' => 150,
                'type' => 'upimg',
                'img_width' => 300,
                'img_height' => 200,
                'extensions' => 'jpg,jpeg,gif,png',
                'data_val' => array(
                    'required' => true
                ),
                'tab' => 'base',
            ),
            'cycle' => array(
                'label' => '出版周期',
                'label_width' => 150,
                'type' => 'select',
                'header' => array(
                    '0' => '',
                    '1' => '请选择'
                ),
                'options' => array(
                    array(
                        '0' => 1,
                        '1' => '旬刊'
                    ),
                    array(
                        '0' => 2,
                        '1' => '半月刊'
                    ),
                    array(
                        '0' => 3,
                        '1' => '月刊'
                    ),
                    array(
                        '0' => 4,
                        '1' => '双月刊'
                    ),
                    array(
                        '0' => 5,
                        '1' => '季刊'
                    ),
                    array(
                        '0' => 6,
                        '1' => '半年刊'
                    ),
                    array(
                        '0' => 7,
                        '1' => '年刊'
                    ),
                ),
                'data_val' => array(
                    'required' => true
                ),
                'tab' => 'base',
            ),
            'foreign_title' => array(
                'label' => '期刊外文名',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'base',
            ),
            'issn' => array(
                'label' => '国际标准刊号',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'base',
            ),
            'cn' => array(
                'label' => '国内统一刊号',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'base',
            ),
            'viewed' => array(
                'label' => '浏览量',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
                'close' => true
            ),
            'download' => array(
                'label' => '下载量',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
                'close' => true
            ),
            'lang' => array(
                'label' => '语种',
                'label_width' => 150,
                'type' => 'select',
                'options' =>array(
                    '0' => array('0'=>'1','1'=> '中文'),
                    '1' => array('0'=>'2','1'=> '英文'),
                ),
                'data_val' => array(
                    'required' => true,
                ),
                'tab' => 'base',
            ),
            'add_time' => array(
                'label' => '期刊数据添加时间',
                'label_width' => 150,
                'type' => 'datetime',
                'close' => true
            ),
            'updated_time' => array(
                'label' => '期刊数据更新时间',
                'label_width' => 150,
                'type' => 'datetime',
                'close' => true
            ),
            'establish_at' => array(
                'label' => '创刊时间',
                'label_width' => 150,
                'type' => 'date',
                'data_val' => array(
                    'required' => true
                ),
                'tab' => 'base',
            ),
            'postal_code' => array(
                'label' => '邮发代号',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'other',
            ),
            'price_info' => array(
                'label' => '定价信息',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'other',
            ),
            'description' => array(
                'label' => '期刊描述',
                'label_width' => 150,
                'type' => 'textarea',
                'tab' => 'base',
            ),
            'allow' => array(
                'label' => '是否启用',
                'label_width' => 150,
                'type' => 'bool',
                'default' => '1',
                'tab' => 'base',
            ),
            'address' => array(
                'label' => '期刊地址',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'other',
            ),
            'mobile' => array(
                'label' => '手机号',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                    'mobile' => true
                ),
                'data_val_msg' => array(
                ),
                'tab' => 'other',
            ),
            'email' => array(
                'label' => '期刊邮箱号',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                    'email' => true
                ),
                'tab' => 'other',
            ),
            'competent_unit' => array(
                'label' => '期刊主管单位',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'other',
            ),
            'sponsor_unit' => array(
                'label' => '期刊主办单位',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'other',
            ),
            'editorial_unit' => array(
                'label' => '期刊编辑单位',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'other',
            ),

        );
    }
}