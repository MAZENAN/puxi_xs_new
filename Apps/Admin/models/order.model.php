<?php

if (!defined('SAMAO_VERSION'))
    exit('no direct access allowed');

class OrderModel extends SmcmsModel {

    public function __construct($modeltype = self::MODEL_ADD) {

        $this->tbname = 'order';
        $this->type = 1;
        $this->title = '订单信息';
        $this->istab = false;
        $this->tabsplit = false;
        $this->btns_left = 0;
        parent::__construct($modeltype);
    }

    public function fields() {
        return array(
            'orderid' => array(
                'label' => '订单号',
                'label_width' => 200,
                'type' => 'text',
                'close' => true,
            ),
            'type' => array(
                'label' => '产品类型',
                'label_width' => 200,
                'type' => 'text',
                'close' => true,
            ),
            'campid' => array(
                'label' => '产品ID',
                'label_width' => 200,
                'type' => 'digits',
            ),
            'title' => array(
                'label' => '产品标题',
                'label_width' => 200,
                'type' => 'text',
                'close' => true,
                'data_val' => array(
                    'required' => true,
                ),
            ),
            'need_topay' => array(
                'label' => '需支付',
                'label_width' => 200,
                'type' => 'number',
                'data_val' => array(
                    'required' => true,
                    'number' => true,
                    'min' => '0.01',
                ),
            ),
            'deposit' => array(
                'label' => '订金',
                'label_width' => 200,
                'type' => 'number',
                'close' => true,
            ),
            'retainage' => array(
                'label' => '尾款',
                'label_width' => 200,
                'type' => 'number',
                'close' => true,
            ),
            'paid' => array(
                'label' => '已支付',
                'label_width' => 200,
                'type' => 'number',
                'close' => true,
            ),
            'mechanism' => array(
                'label' => '服务机构',
                'label_width' => 200,
                'type' => 'text',
            ),
            'start_date' => array(
                'label' => '出发日期',
                'label_width' => 200,
                'type' => 'date',
                'close' => true,
            ),
            'end_date' => array(
                'label' => '结束时间',
                'label_width' => 200,
                'type' => 'date',
                'close' => true,
            ),
            'tourists' => array(
                'label' => '学生人数',
                'label_width' => 200,
                'type' => 'digits',

            ),
            'parent' => array(
                'label' => '家长人数',
                'label_width' => 200,
                'type' => 'digits',
            ),
            'starting_city' => array(
                'label' => '出发城市',
                'label_width' => 200,
                'type' => 'text',
                'close' => true,
            ),
            'state' => array(
                'label' => '状态',
                'label_width' => 200,
                'type' => 'digits',
            ),
            'userid' => array(
                'label' => '用户ID',
                'label_width' => 200,
                'type' => 'digits',
            ),
            'addtime' => array(
                'label' => '下单时间',
                'label_width' => 200,
                'type' => 'datetime',
                'close' => true,
            ),
            'paytime1' => array(
                'label' => '预付款支付时间',
                'label_width' => 200,
                'type' => 'datetime',

            ),
            'paytime2' => array(
                'label' => '尾款支付时间',
                'label_width' => 200,
                'type' => 'datetime',
                'close' => true,
            ),
            'add_date' => array(
                'label' => '下单日期',
                'label_width' => 200,
                'type' => 'date',
                'close' => true,
            ),
            'departure_option' => array(
                'label' => '出发选项',
                'label_width' => 200,
                'type' => 'text',
            ),
            'paytype1' => array(
                'label' => '订金支付平台',
                'label_width' => 200,
                'type' => 'text',
            ),
            'paytype2' => array(
                'label' => '尾款支付平台',
                'label_width' => 200,
                'type' => 'text',
                'close' => true,
            ),
            'ct1_name' => array(
                'label' => '联系人',
                'label_width' => 200,
                'type' => 'text',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '联系人不能为空',
                ),
            ),
            'ct1_relat' => array(
                'label' => '联系人关系',
                'label_width' => 200,
                'type' => 'radiogroup',
                'options' => array(
                    0 =>
                    array(
                        0 => '父亲',
                        1 => '父亲',
                    ),
                    1 =>
                    array(
                        0 => '母亲',
                        1 => '母亲',
                    ),
                    2 =>
                    array(
                        0 => '其他',
                        1 => '其他监护人',
                    ),
                ),
                'style' => 'width:auto; margin-right:15px;',
                'close' => true,
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '请选择关系',
                ),
            ),
            'ct1_phone' => array(
                'label' => '联系电话',
                'label_width' => 200,
                'type' => 'text',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '联系电话不能为空',
                ),
            ),
            'ct1_email' => array(
                'label' => '联系人邮箱',
                'label_width' => 200,
                'type' => 'text',
                'data_val' => array(
                    'email' => true,
                ),
                'data_val_msg' => array(
                    'email' => '联系人邮箱格式不正确',
                ),
            ),
            'ct1_area' => array(
                'label' => '区域',
                'label_width' => 200,
                'type' => 'linkage',
                'close' => true,
                'headers' => array(
                    0 => '省份/区域',
                    1 => '城市/地区',
                ),
                'length' => 2,
                'data_url' => '__APPROOT__/account/getarea.html',
                'data_val_msg' => array(
                    'required' => '区域不能为空',
                ),
                'data_vals' => array(
                    0 =>
                    array(
                        'required' => true,
                    ),
                    1 =>
                    array(
                        'required' => true,
                    ),
                ),
                'data_val_msgs' => array(
                    0 =>
                    array(
                        'required' => '请选择省份/区域',
                    ),
                    1 =>
                    array(
                        'required' => '请选择城市/地区',
                    ),
                ),
            ),
            'ct1_address' => array(
                'label' => '地址信息',
                'label_width' => 200,
                'type' => 'text',
                'close' => true,
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '地址信息不能为空',
                ),
            ),
            'ct2_name' => array(
                'label' => '联系人',
                'label_width' => 200,
                'type' => 'text',
                'close' => true,
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '联系人不能为空',
                ),
            ),
            'ct2_relat' => array(
                'label' => '联系人关系',
                'label_width' => 200,
                'type' => 'radiogroup',
                'close' => true,
                'options' => array(
                    0 =>
                    array(
                        0 => '父亲',
                        1 => '父亲',
                    ),
                    1 =>
                    array(
                        0 => '母亲',
                        1 => '母亲',
                    ),
                    2 =>
                    array(
                        0 => '其他',
                        1 => '其他监护人',
                    ),
                ),
                'style' => 'width:auto; margin-right:15px;',
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '请选择关系',
                ),
            ),
            'ct2_phone' => array(
                'label' => '联系电话',
                'label_width' => 200,
                'type' => 'text',
                'close' => true,
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '联系电话不能为空',
                ),
            ),
            'ct2_email' => array(
                'label' => '联系人邮箱',
                'label_width' => 200,
                'type' => 'text',
                'close' => true,
                'data_val' => array(
                    'required' => true,
                    'email' => true,
                ),
                'data_val_msg' => array(
                    'required' => '联系人邮箱不能为空',
                    'email' => '联系人邮箱格式不正确',
                ),
            ),
            'ct2_area' => array(
                'label' => '区域',
                'label_width' => 200,
                'type' => 'linkage',
                'close' => true,
                'headers' => array(
                    0 => '省份/区域',
                    1 => '城市/地区',
                ),
                'length' => 2,
                'data_url' => '__APPROOT__/account/getarea.html',
                'data_val_msg' => array(
                    'required' => '区域不能为空',
                ),
                'data_vals' => array(
                    0 =>
                    array(
                        'required' => true,
                    ),
                    1 =>
                    array(
                        'required' => true,
                    ),
                ),
                'data_val_msgs' => array(
                    0 =>
                    array(
                        'required' => '请选择省份/区域',
                    ),
                    1 =>
                    array(
                        'required' => '请选择城市/地区',
                    ),
                ),
            ),
            'ct2_address' => array(
                'label' => '地址信息',
                'label_width' => 200,
                'type' => 'text',
                'close' => true,
                'data_val' => array(
                    'required' => true,
                ),
                'data_val_msg' => array(
                    'required' => '地址信息不能为空',
                ),
            ),
            'remarks' => array(
                'label' => '备注信息',
                'label_width' => 200,
                'type' => 'textarea',
            ),
            'payremark1' => array(
                'label' => '后台预付款审核备注',
                'label_width' => 200,
                'type' => 'textarea',
            ),
            'payremark2' => array(
                'label' => '后台尾款审核备注',
                'label_width' => 200,
                'type' => 'textarea',
                'close' => true,
            ),
            'contact_person' => array(
                'label' => '联系人',
                'label_width' => 200,
                'type' => 'text',
                'close' => true,
            ),
            'contact_phone' => array(
                'label' => '联系电话',
                'label_width' => 200,
                'type' => 'text',
                'close' => true,
            ),
            'refund_reasons' => array(
                'label' => '退款理由',
                'label_width' => 200,
                'type' => 'textarea',
                'close' => true,
            ),
            'refund' => array(
                'label' => '退款状态',
                'label_width' => 200,
                'type' => 'digits',
                'default' => '0',
                'close' => true,
                'close' => true,
            ),
            'refund_fees' => array(
                'label' => '退款金额',
                'label_width' => 200,
                'type' => 'number',
                'close' => true,
            ),
            'refund_remarks' => array(
                'label' => '退款备注',
                'label_width' => 200,
                'type' => 'textarea',
                'close' => true,
            ),
            'days' => array(
                'label' => '出发天数',
                'label_width' => 200,
                'type' => 'digits',
            ),
            'shuliang' => array(
                'label' => '数量',
                'label_width' => 200,
                'type' => 'number',
            ),
            'price' => array (
              'label' => '单价',
              'label_width' => 200,
              'type' => 'label',
              'dbfield' => false,
            ),
            'manage_id' => array(
                'label' => '课程顾问',
                'label_width' => 150,
                'type' => 'select',
                'options' => DB::getOpts('@pf_manage','id,name',0,"type in(7,12,13) and islock = 0"),
                'header' => array(
                    0 => '',
                    1 => '选择课程顾问',
                ),
                'data_val' => array(
                    'required' => true,
                ),
            ),
            'adddate' => array(
                'label' => '下单日期',
                'label_width' => 200,
                'type' => 'datetime',
                'close' => true,
                'data_val' => array(
                    'required' => true,
                ),
                 'data_val_msg' => array(
                  'required' => '下单日期不能为空',
                ),
                'default' =>date('Y-m-d H:i:s'),
            ),

        );
    }

}
