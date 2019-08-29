<?php 
return array (
  'model' => 'Report',
  'search' => 
  array (
    0 => 
    array (
      'name' => 'seller_id',
      'label' => '供应商',
      'boxname' => 'seller_id',
      'type' => 'select',
      'schtp' => '3',
      'style' => '',
      'css' => '',
      'options' => DB::getopts('@pf_member',"id,nickname",0,"type=3"),
    ),
    1 => 
    array (
      'name' => 'settle_time',
      'label' => '开始日期',
      'boxname' => 'settle_time',
      'type' => 'date',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    2 => 
    array (
      'name' => 'settle_time_to',
      'label' => '截至日期',
      'boxname' => 'settle_time_to',
      'type' => 'date',
      'schtp' => '9',
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