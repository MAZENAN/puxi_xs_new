<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class CamperModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'camper';
        $this->type = 1;
        $this->title = '营员信息';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;

        parent::__construct($modeltype);
    }

  public function fields() {
        return array(
           
            //子女信息
            'school_type' => array(
                'label' => '学校类型',
                'label_width' => 150,
                'type' => 'select',
                'options' => DB::getopts('@pf_school_type'),
                'valtype' => 'int',
              
            ),
             'c_name' => array(
                'label' => '营员姓名',
                'label_width' => 150,
                'type' => 'text',
                 ),
             'c_gender' => array(
                'label' => '性别',
                'label_width' => 150,
                'type' => 'radiogroup',
                'options' => array (
                    0 => 
                    array (
                      0 => '0',
                      1 => '女',
                    ),
                    1 => 
                    array (
                      0 => '1',
                      1 => '男',
                    ),
                  ),
                  'default' => '0',
                  ),
              'englishname' => array(
                'label' => '英文名',
                'label_width' => 150,
                'type' => 'text',
                
            ),
             'c_remark' => array(
                'label' => '备注',
                'label_width' => 150,
                'type' => 'textarea',
   
            ),
           
             'c_birthday' => array(
                'label' => '子女生日',
                'label_width' => 150,
                'type' => 'date',

            ),
             'school' => array(
                'label' => '就读学校',
                'label_width' => 150,
                'type' => 'text',

            ),
            'phone' => array(
                'label' => '联系电话',
                'label_width' => 150,
                'type' => 'text',

            ),
            
            //子女健康信息
             'height' => array(
                'label' => '身高',
                'label_width' => 150,
                'type' => 'text',
                
            ),
             'weight' => array(
                'label' => '体重',
                'label_width' => 150,
                'type' => 'text',

            ),
             'sickness' => array(
                'label' => '有无重大疾病',
                'label_width' => 150,
                'type' => 'textarea',
             
            ),
             'taboo_allergy' => array(
                'label' => '饮食禁忌及过敏情况',
                'label_width' => 150,
                'type' => 'textarea',
                
            ),

            'client_id' => array(
                'label' => '后台备注会员id',
                'label_width' => 150,
                'type' => 'text',
                'row_hide' => true,
                
            ),
            'user_id' => array(
                'label' => '会员id',
                'label_width' => 150,
                'type' => 'text',
                'row_hide' => true,
                
            ),
              'id' => array(
                'label' => '营员id',
                'label_width' => 150,
                'type' => 'text',
                'row_hide' => true,
                
            ),
                           
            //证件信息
             'IDcard' => array(
                'label' => '身份证号码',
                'label_width' => 150,
                'type' => 'text',
                'style' => 'width:300px',
                'close' => FALSE,
                 
               
            ),
            'passportNo' => array(
                'label' => '护照号码',
                'label_width' => 150,
                'type' => 'text',
                'style' => 'width:300px',
                'close' => FALSE,
               
            ),
            'Nationality' => array(
                'label' => '护照国籍',
                'label_width' => 150,
                'type' => 'select',
                'options' => DB::getopts('@pf_nationality'),
                'valtype' => 'int',
                'close' => FALSE,
               
            ),
            'valid_date' => array(
                'label' => '护照有效期',
                'label_width' => 150,
                'type' => 'date',
                'close' => FALSE,
               
            ),
          
        );
    }


}
