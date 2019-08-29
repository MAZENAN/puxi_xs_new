<?php

if (!defined('SAMAO_VERSION')){
    exit('no direct access allowed');
}
    

class FormNodeModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'form_node';
        $this->type = 1;
        $this->title = '报名表节点';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;

        parent::__construct($modeltype);
    }

    public function fields() {
        return array(
            'belong' => array(
                'label' => '组别',
                'label_width' => 120,
                'type' => 'select',
                'tab' => 'base',
                'options' => array(
                    0 =>
                    array(
                        0 => '2',
                        1 => '其他',
                    ),
                ),
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '请选择组别',
                ),
                'default'=>2,
                'header' => array(
                    0 => '',
                    1 => '选择组别',
                ),
            ),
             'pid' => array(
                'label' => '二级分组名称',
                'label_width' => 120,
                'type' => 'select',
                'tab' => 'base',
                'default' =>44,
                'options' =>DB::getopts('@pf_form_node',null,0,"pid = 0 and belong=2"),
                  'header' => array(
                    0 => '',
                    1 => '选择二级分组',
                ),
                  'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '二级分组不能为空',
                ),
            ),
            'name'=>array(
                'label'=>'名称',
                'label_width'=>120,
                'type'=>'text',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '名称不能为空',
                ),
            ),
            'field'=>array(
                'label'=>'字段英文',
                'label_width'=>120,
                'type'=>'text',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '字段英文不能为空',
                ),
                'tip_back' => '请保证“字段英文”唯一，且无空格，如“valid_date”',
            ),
            'type' => array(
                'label' => '字段类型',
                'label_width' => 120,
                'type' => 'select',
                'tab' => 'base',
                'options' => array(
                    0 =>
                    array(
                        0 => 'text',
                        1 => '文本',
                    ),
                    1 =>
                    array(
                        0 => 'radiogroup',
                        1 => '单选',
                    ),
                    2 =>
                    array(
                        0 => 'checkgroup',
                        1 => '多选',
                    ),
                    3 =>
                    array(
                        0 => 'textarea',
                        1 => '长文本',
                    ),
                     4 =>
                    array(
                        0 => 'date',
                        1 => '日期',
                    ),
                    5 =>
                    array(
                        0 => 'linkage',
                        1 => '省市',
                    ),
                    6 =>
                    array(
                        0 => 'select',
                        1 => '国籍',
                    ),
                    
                ),
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '请选择字段类型',
                ),
                'header' => array(
                    0 => '',
                    1 => '选择字段类型',
                ),
                'default'=>'',
                'default' => '0',
                'dynamic' => array (
                  0 => 
                  array (
                    'val' => 'text',
                    'hide' => 'values',
                    
                  ),
                   1 => 
                  array (
                    'val' => 'radiogroup',
                    'show' => 'values',
                    
                  ),
                   2 => 
                  array (
                    'val' => 'checkgroup',
                    'show' => 'values',
                    
                  ),
                  3 => 
                  array (
                    'val' => 'textarea',
                    'hide' => 'values',
                  ),
                  4 => 
                  array (
                    'val' => 'date',
                    'hide' => 'values',
                  ),
                  5=> 
                  array (
                    'val' => 'linkage',
                    'hide' => 'values',
                  ),
                  6 => 
                  array (
                    'val' => 'select',
                    'hide' => 'values',
                  ),
                  7 => 
                  array (
                    'val' => '',
                    'hide' => 'values',
                  ),
              
            ),
            ),
            'values'=>array(
                'label'=>'预选项',
                'label_width'=>120,
                'type'=>'textarea',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '预选项信息不能为空',
                ),
                'tip_back' => '请填写！以"|"隔开,如"男|女"',
            ),
            'required' => array(
                'label' => '必填',
                'label_width' => 120,
                'type' => 'bool',
                'default'=>true,
            ),
           
            'sort' => array(
                'label' => '排序',
                'label_width' => 120,
                'type' => 'digits',
                'default' => $this->getNextSort(),
            ),
        );
    }
}
