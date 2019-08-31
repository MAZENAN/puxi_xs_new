<?php if(!defined('SAMAO_VERSION')) exit('no direct access allowed');

class PeriodicalPaperModel extends SmcmsModel {
    public function __construct($modeltype = self::MODEL_ADD) {
        $this->tbname = 'periodical_paper';
        $this->type = 1;
        $this->title = '期刊文章';
        $this->istab = true;
        $this->tabsplit = false;
        $this->tabs = array(
            'base' => '基本信息',
            'content' => '内容',
        );
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }

    public function fields() {
        return array(
            'title' => array(
                'label' => '标题',
                'label_width' => 150,
                'type' => 'textarea',
                'data_val' => array(
                    'required' => true
                ),
                'tab' => 'base'
            ),
            'abstract' => array(
                'label' => '摘要',
                'label_width' => 150,
                'type' => 'textarea',
                'tab' => 'base'
            ),
            'keywords' => array(
                'label' => '关键词',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'base'
            ),
            'platename' => array(
                'label' => '论文板块名',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
                'close' => true,
                'tab' => 'base'
            ),
            'authors' => array(
                'label' => '作者',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                    'required' => true
                ),
                'tab' => 'base'
            ),
            'doi' => array(
                'label' => '数字对象唯一标识符',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
                'close' > true
            ),
            'file' => array(
                'label' => '上传文档',
                'label_width' => 150,
                'type' => 'upfile',
                'extensions' => 'docx,doc,pdf',
                'data_val' => array(
                ),
                'tab' => 'content'
            ),
            'content' => array(
                'label' => '论文内容',
                'label_width' => 150,
                'type' => 'xheditor',
                'tab' => 'content'
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
                'tab' => 'base'
            ),
            'periodical_id' => array(
                'label' => '来源期刊',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
            ),
            'is_rm' => array(
                'label' => '是否删除1不删除2删除',
                'label_width' => 150,
                'type' => 'bool',
                'data_val' => array(
                ),
                'data_val_msg' => array(
                ),
                'close' => true
            ),
            'is_classic' => array(
                'label' => '是否为经典论文',
                'label_width' => 150,
                'type' => 'bool',
                'default' => '0',
                'tab' => 'base'
            ),
            'allow' => array(
                'label' => '是否启用',
                'label_width' => 150,
                'type' => 'bool',
                'default' => '1',
                'tab' => 'base'
            ),
            'source' => array(
                'label' => '文章来源',
                'label_width' => 150,
                'type' => 'text',
                'tab' => 'base'
            ),
            'add_time' => array(
                'label' => '期刊论文创建时间',
                'label_width' => 150,
                'type' => 'datetime',
                'close' => true,
                'tab' => 'base'
            ),
            'update_time' => array(
                'label' => '期刊论文更新时间',
                'label_width' => 150,
                'type' => 'datetime',
                'close' => true,
                'tab' => 'base'
            ),
            'images' => array(
                'label' => '论文预览图',
                'label_width' => 150,
                'type' => 'upimggroup',
                'extensions' => 'jpg,jpeg,gif,png',
                'tab' => 'content'
            ),
            'document_id' => array(
                'label' => '文档id',
                'label_width' => 150,
                'type' => 'hidden',
                'default' => IGet('document_id'),
                'tab' => 'base'
            ),
            'catalog_id' => array(
                'label' => '目录',
                'label_width' => 150,
                'type' => 'select',
                'header' => array(
                    '0' => '',
                    '1' => '选择目录'
                ),
                'options' => DB::getopts('@pf_periodical_catalog','id,name',0,'document_id=?',array(IGet('document_id'))),
                'tab' => 'base'
            ),

        );
    }
}