<?php 
 $type=SGet('type');
 $this->assign('type',$type);
return array (
  'model' => 'SubCamp',
  'search' => 
  array (
    0 => 
    array (
      'name' => 'title',
      'label' => '标题',
      'boxname' => 'title',
      'type' => 'text',
      'schtp' => '0',
      'style' => '',
      'css' => '',
    ),
    1 => 
    array (
      'name' => 'destination',
      'label' => '目的地',
      'boxname' => 'destination',
      'type' => 'select',
      'schtp' => '3',
      'style' => '',
      'css' => '',
    ),
    2 => 
    array (
      'name' => 'camp_days',
      'label' => '时间长短',
      'boxname' => 'camp_days',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    3 => 
    array (
      'name' => 'camp_type',
      'label' => '是否亲子',
      'boxname' => 'camp_type',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    4 => 
    array (
      'name' => 'seller_id',
      'label' => '供应商',
      'boxname' => 'seller_id',
      'type' => 'select',
      'schtp' => '3',
      'style' => '',
      'css' => '',
      'options' => DB::getopts('@pf_member',"id,nickname",0,"type=3 and status=2"),
    ),
    5 => 
    array (
      'name' => '',
      'label' => '排序',
      'boxname' => 'order',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    6 => 
    array (
      'name' => 'allow',
      'label' => '是否上架',
      'boxname' => 'allow',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    //ysq
     7 => 
    array (
      'name' => 'type',
      'label' => '分销商产品列表',
      'boxname' => 'type',
      'type' => 'text',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    //
  ),
  'usesql' => '0',
  'sql' => '',
  'sqlargs' => NULL,
  'usingfy' => '1',
  'orderby' => '',
);