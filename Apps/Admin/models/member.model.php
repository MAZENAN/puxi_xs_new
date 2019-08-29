<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class MemberModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'member';
        $this->type = 1;
        $this->title = IGet('type')==1 ? '会员信息':'讲师信息';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;

   /*     $this->script = '$(function(){
        var selectfun=function(){
        var val=$(\'#status\').val();
        if(val==3){
             $(\'#row_ref_mark\').show();
        }else{
             $(\'#row_ref_mark\').hide();
        }
   }
    selectfun();
    $(\'#status\').change(selectfun);
});';*/

        parent::__construct($modeltype);
    }

    public function fields() {
        return array(
            'mobile' => array(
                'label' => '手机号码',
                'label_width' => 150,
                'type' => 'text',
                'offedit' => true,
                'data_val' => array(
                    'mobile' => true,
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'mobile' => '手机号码格式不正确',
                    'required' => '手机号码不能为空',
                ),
            ),
            'pass' => array(
                'label' => '用户密码',
                'label_width' => 150,
                'type' => 'password',
                'close' => true,
            ),
             'nickname' => array(
                'label' => '昵称',
                'label_width' => 150,
                'type' => 'text',
            ),
            'area' => array(
                'label' => '区域',
                'label_width' => 150,
                'type' => 'linkage',
                'headers' => array(
                    0 => '选择城市',
                    1 => '选择城市',
                    2 => '选择城市',
                ),
                'data_url' => '/service/area.php',
            ),
            'remark' => array(
                'label' => '备注',
                'label_width' => 150,
                'type' => 'textarea',
            ),
            'status' => array(
                'label' => '审核状态',
                'label_width' => 150,
                'type' => 'select',
                'close' => false,
                'options' => array(
                    0 =>
                    array(
                        0 => '0',
                        1 => '未认证  ',
                    ),
                    1 =>
                    array(
                        0 => '1',
                        1 => '认证中  ',
                    ),
                    2 =>
                    array(
                        0 => '2',
                        1 => '已认证  ',
                    ),
                   3 =>
                    array(
                        0 => '3',
                        1 => '认证失败  ',
                    ),
                ),
            //ysq
            'default' => '0',
            'dynamic' => array (
              0 => 
              array (
                'val' => '0',
                'hide' => 'ref_mark',
                
              ),
               1 => 
              array (
                'val' => '1',
                'hide' => 'ref_mark',
                
              ),
               2 => 
              array (
                'val' => '2',
                'hide' => 'ref_mark',
                
              ),
              3 => 
              array (
                'val' => '3',
                'show' => 'ref_mark',
              ),
              
            ),
            //
            ),
            'ref_mark' => array(
                'label' => '拒绝原因',
                'close' => false,
                'label_width' => 150,
                'type' => 'textarea',
            ),
            'errtice' => array(
                'label' => '错误次数',
                'label_width' => 150,
                'type' => 'digits',
            ),
            'errtime' => array(
                'label' => '错误日期',
                'label_width' => 150,
                'type' => 'date',
            ),
            'lock' => array(
                'label' => '锁定',
                'label_width' => 150,
                'type' => 'bool',
            ),
            'last_login_time' => array(
                'label' => '上次登陆',
                'label_width' => 150,
                'type' => 'datetime',
                'offedit' => true,
            ),
            'this_login_time' => array(
                'label' => '本次登录',
                'label_width' => 150,
                'type' => 'datetime',
                'offedit' => true,
            ),
            'type' => array(
                'label' => '会员类型',
                'label_width' => 150,
                'type' => 'text',
                'row_hide'=>TRUE,
                'default'=>IGet('type'),
            ),
        );
    }

}
