<?php 
$user_type=SGet('user_type');
$this->assign('user_type',$user_type);
return array (
  'model' => 'Order',
  'search' => 
  array (
    0 => 
    array (
      'name' => 'orderid',
      'label' => '订单号',
      'boxname' => 'orderid',
      'type' => 'text',
      'schtp' => '1',
      'style' => 'width:120px',
      'css' => '',
    ),
    //ysq
    1 => 
    array (
      'name' => 'type',
      'label' => '产品类型',
      'boxname' => 'type',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    2 => 
    array (
      'name' => 'state',
      'label' => '状态',
      'boxname' => 'state',
      'type' => 'hidden',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    3 => 
    array (
      'name' => 'manage_id',
      'label' => '课程顾问',
      'boxname' => 'manage_id',
      'type' => 'select',
      'schtp' => '3',
      'style' => '',
      'css' => '',
      'options' => DB::getopts('@pf_manage',"id,name",0,"type in (7,12,13) and islock = 0"),
    ),
    4 => 
    array (
      'name' => 'crm_state',
      'label' => '流转状态',
      'boxname' => 'crm_state',
      'type' => 'select',
      'schtp' => '1',
      'style' => '',
      'css' => '',
    ),
    5=>
    array (
      'name' => 'screen',
      'label' => '订单列表',
      'boxname' => 'screen',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
      ),
    6=> array (
      'name' => 'content',
      'label' => '订单列表',
      'boxname' => 'content',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
      ),
    //ysq

  ),
  'usesql' => '0',
  'sql' => '',
  'sqlargs' => NULL,
  'usingfy' => '1',
  'orderby' => '',
);