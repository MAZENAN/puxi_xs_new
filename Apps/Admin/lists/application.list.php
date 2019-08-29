<?php 
$user_type=SGet('user_type');
$this->assign('user_type',$user_type);
return array (
  'model' => 'Order',
  'search' => 
  array (
    0   => 
    array (
      'name' => 'crm_state',
      'label' => '流转状态',
      'boxname' => 'crm_state',
      'type' => 'select',
      'schtp' => '1',
      'style' => '',
      'css' => '',
    ),
    1=>
    array (
      'name' => 'screen',
      'label' => '搜索类型',
      'boxname' => 'screen',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
      ),
     2=>array (
      'name' => 'content',
      'label' => '内容',
      'boxname' => 'content',
      'type' => 'text',
      'schtp' => '9',
      'style' => '',
      'css' => '',
      ),
     3 => 
    array (
      'name' => 'start_date',
      'label' => '出发日期',
      'boxname' => 'start_date',
      'type' => 'date',
      'schtp' => '6',
      'style' => '',
      'css' => '',
    ),
    4 => 
    array (
      'name' => 'start_date_to',
      'label' => '出发日期',
      'boxname' => 'start_date_to',
      'type' => 'date',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    5 => 
    array (
      'name' => 'crm_state',
      'label' => '流转状态',
      'boxname' => 'crm_state',
      'type' => 'select',
      'schtp' => '1',
      'style' => '',
      'css' => '',
    ),

  ),
  'usesql' => '0',
  'sql' => '',
  'sqlargs' => NULL,
  'usingfy' => '1',
  'orderby' => '',
);