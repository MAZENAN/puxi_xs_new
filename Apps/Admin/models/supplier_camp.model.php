<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class SupplierCampModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'camp';
        $this->type = 1;
        $this->title = '';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;

        parent::__construct($modeltype);
    }

    public function fields() {
        return array(
                    
            'title' => array(
                'label' => '标题',
                'label_width' => 150,
                'type' => 'text',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '标题不能为空',
                ),
            ),
             'tags' => array(
                'label' => '简介',
                'label_width' => 150,
                'type' => 'textarea',
                 'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '简介不能为空',
                ),
            ),
            
            'boarding' => array (
                'label' => '项目类型',
                'label_width' => 150,
                'type' => 'radiogroup',
                'options' => array (
                  0 => 
                  array (
                    0 => '0',
                    1 => '日营',
                  ),
                  1 => 
                  array (
                    0 => '1',
                    1 => '寄宿营',
                  ),
                  2 => 
                  array (
                    0 => '2',
                    1 => '游学',
                  ),
                ),
              
            ),
            'theme' => array(
                'label' => '项目主题',
                'label_width' => 150,
                'type' => 'checkgroup',
                'tab' => 'base',
                'options' => DB::getOpts('@pf_theme'),
                'style' => 'width:auto; margin-right:15px;',
//                'data_val' => array(
//                    'required' => true,
//                ),
//                'data_val_msg' => array(
//                    'required' => '请选择项目主题',
//                ),
                'header' => array(
                    0 => '',
                    1 => '选择项目主题',
                ),
            ),
            'camp_category' => array (
                'label' => '项目主题',
                'label_width' => 150,
                'type' => 'checkgroup',
                'options' => DB::getOpts('@pf_camp_category'),
                'style' => 'width:auto; margin-right:15px;',
//                'data_val' => array(
//                    'required' => true,
//                ),
//                'data_val_msg' => array (
//                  'required' => '请选择项目主题',
//                ),
                'header' => array (
                  0 => '',
                  1 => '选择项目主题',
                ),
            ),
           
            'destination' => array(
                'label' => '目的地',
                'label_width' => 150,
                'type' => 'select',
                'options' => DB::getOpts('@pf_destination'),
//                'data_val' => array(
//                    'required' => true,
//                ),
//                'data_val_msg' => array(
//                    'required' => '请选择国内目的地',
//                ),
                'header' => array(
                    0 => '',
                    1 => '选择国内目的地',
                ),
            ),
            
            'camp_country' => array (
                'label' => '目的地',
                'label_width' => 150,
                'type' => 'select',
                'options' => DB::getOpts('@pf_camp_country'),
//                'data_val' => array(
//                    'required' => true,
//                ),
//                'data_val_msg' => array(
//                    'required' => '请选择目的地',
//                ),
                'header' => array (
                  0 => '',
                  1 => '选择目的地',
                ),
            ),

           
            'camp_type' => array(
                'label' => '是否亲子',
                'label_width' => 150,
                'type' => 'radiogroup',
                'options' => DB::getOpts('@pf_camp_type'),
                'header' => array(
                    0 => '',
                    1 => '选择是否亲子',
                ),
            ),

            'agefrom' => array(
                'label' => '适合年龄',
                'label_width' => 150,
                'type' => 'amountdigits',
                'tab' => 'base',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                'data_val_msg' => array(
                    'required' => '适合年龄不能为空',
                    'digits' => '适合年龄必须是整数形式',
                ),
                '@minititle' => '从：',
            ),
            'ageto' => array(
                'label' => '到',
                'label_width' => 150,
                'type' => 'amountdigits',
                'merge' => true,
                'merge_type' => '1',
                'data_val' => array(
                    'required' => true,
                    'digits' => true,
                ),
                 'data_val_msg' => array(
                    'required' => ' ',
                    'digits' => '适合年龄必须是整数形式',
                ),
                'follow_text' => '岁',
                '@minititle' => '到',
            ),
           
            'camp_holiday' => array (
                'label' => '活动时间',
                'label_width' => 150,
                'type' => 'checkgroup',
                'options' => DB::getOpts('@pf_camp_holiday'),
                'style' => 'width:80px;',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '活动时间不能为空',
                ),
            ),
              'fate_min' => array(
                'label' => '为期天数',
                'label_width' => 150,
                'style'=>'width:100px',
                'type' => 'text',
//                'data_val' => array(
//                    'required' => true,
//                    'digits' => true,
//                ),
//                'data_val_msg' => array(
//                    'required' => '为期天数不能为空',
//                    'digits' => '为期天数必须是整数形式',
//                ),
            ),
            'fate_max' => array(
                'label' => '到',
                'label_width' => 150,
                'style'=>'width:100px',
                'type' => 'text',
                'merge' => true,
                'merge_type' => '1',
//                'data_val' => array(
//                    'required' => true,
//                    'digits' => true,
//                ),
//                'data_val_msg' => array(
//                    'required' => '适合年龄不能为空',
//                    'digits' => '适合年龄必须是整数形式',
//                ),
                'follow_text' => '天',
              
            ),
		
            'sort' => array(
                'label' => '权重值',
                'label_width' => 150,
                'type' => 'digits',
                'row_hide'=>true,
                'default' => $this->getNextSort(),
                'close_html' => true,
                'offedit' => true,
                
            ),        
            'content' => array(
                'label' => '项目介绍及日程安排',
                'label_width' => 150,
                'type' => 'xheditor',
                'tab' => 'intro',
            ),
             'level_id' => array(
                'label' => '产品等级',
                'label_width' => 150,
                'type' => 'select',
                'tab' => 'base',
                'options' => DB::getopts('@pf_camp_level'),
                'header' => array(
                    0 => '',
                    1 => '选择产品等级',
                ),
            ),

            'seller_id' => array(
                'label' => '所属供应商',
                'label_width' => 150,
                'type' => 'select',
                'options' => DB::getopts('@pf_member','id,nickname',0,"type in(3,4) and status=2"),
                'valtype' => 'int',
                'header' => array(
                    0 => '',
                    1 => '选择供应商',
                ),
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '供应商不能为空',
                ),
            ),
           
             'price_min' => array(
                'label' => '价格',
                'label_width' => 150,
                'style'=>'width:100px',
                'type' => 'text',
//                'data_val' => array(
//                    'required' => true,
//                    'digits' => true,
//                ),
//                'data_val_msg' => array(
//                    'required' => '适合年龄不能为空',
//                    'digits' => '适合年龄必须是整数形式',
//                ),
            ),
            'price_max' => array(
                'label' => '到',
                'label_width' => 150,
                'style'=>'width:100px',
                'type' => 'text',
                'merge' => true,
                'merge_type' => '1',
//                'data_val' => array(
//                    'required' => true,
//                    'digits' => true,
//                ),
//                'data_val_msg' => array(
//                    'required' => '适合年龄不能为空',
//                    'digits' => '适合年龄必须是整数形式',
//                ),
                'follow_text' => '元',
              
            ),
             'remark' => array(
                'label' => '备注',
                'label_width' => 150,
                'type' => 'textarea',
//                'data_val' => array(
//                    'required' => true,
//                    'digits' => true,
//                ),
//                'data_val_msg' => array(
//                    'required' => '适合年龄不能为空',
//                    'digits' => '适合年龄必须是整数形式',
//                ),
            ),
             'disabled' => array(
                'label' => '失效',
                'label_width' => 150,
                'type' => 'bool',
                'offedit' => false,
            ),
              'type' => array(
                'label' => '国内营，国际营',
                'type' => 'text',
                'row_hide'=>true,
               
            ),
           
        );
    }

}
