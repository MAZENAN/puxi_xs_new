<?php 
 $schs = array('type','istop','state','key','disabled');
 foreach($schs as $val){
     $sch[$val] = SGet($val);
 }
 if($sch['key']){
     $tit = '预上架-';
 }
  $this->assign('sch',$sch);
 if($sch['type'] == '0' || $sch['key'] == 2){
    $this->assign('title',$tit.'国内营');
}elseif($sch['type'] == '1' || $sch['key'] == 1){
    $this->assign('title',$tit.'国际营');
    
 }elseif($sch['istop'] == '1'){
  $this->assign('title','精品推荐');
  //$this->assign('istop',$sch['istop']);
 }
return array (
  'model' => 'Camp',
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
      'schtp' => '3',
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
      'options' => DB::getopts('@pf_member',"id,nickname",0,"type in(3,4) and status=2"),
    ),
    5 => 
    array (
      'name' => 'order',
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
      'label' => '营地类型',
      'boxname' => 'type',
      'type' => 'text',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    //
     //ysq
     8 => 
    array (
      'name' => 'istop',
      'label' => '精品推荐',
      'boxname' => 'istop',
      'type' => 'text',
      'schtp' => '1',
      'style' => '',
      'css' => '',
    ),
    //
     9 => 
    array (
      'name' => 'state',
      'label' => '分销商产品列表',
      'boxname' => 'state',
      'type' => 'hidden',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
      10 => 
    array (
      'name' => 'camp_country',
      'label' => '国际营目的地',
      'boxname' => 'camp_country',
      'type' => 'select',
      'schtp' => '3',
      'style' => '',
      'css' => '',
    ),
     11 => 
    array (
      'name' => 'start',
      'label' => '出发日期',
      'boxname' => 'start',
      'type' => 'date',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
    12 => 
    array (
      'name' => 'start_to',
      'label' => '出发日期',
      'boxname' => 'start_to',
      'type' => 'date',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
      //ysq
      13 => 
    array (
      'name' => 'key',
      'label' => '预上架识别值',
      'boxname' => 'key',
      'type' => 'hidden',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
      //ysq
      14 => 
    array (
      'name' => 'camp_holiday',
      'label' => '活动时间',
      'boxname' => 'camp_holiday',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
        //ysq
      15 => 
    array (
      'name' => 'theme',
      'label' => '活动主题',
      'boxname' => 'theme',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
     ),
        //ysq
      16 => 
    array (
      'name' => 'parent_id',
      'label' => '所属人员',
      'boxname' => 'parent_id',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    ),
        //ysq
    17 => 
    array (
      'name' => 'agefrom',
      'label' => '开始年龄',
      'boxname' => 'agefrom',
      'type' => 'amountdigits',
      'schtp' => '6',
      'style' => '',
      'css' => '',
    ),
    18 => 
    array (
      'name' => 'ageto',
      'label' => '结束年龄',
      'boxname' => 'ageto',
      'type' => 'amountdigits',
      'schtp' => '7',
      'style' => '',
      'css' => '',
    ),
    19 => 
    array (
      'name' => 'camp_category',
      'label' => '活动主题',
      'boxname' => 'camp_category',
      'type' => 'select',
      'schtp' => '9',
      'style' => '',
      'css' => '',
     ),
    20 => 
    array (
      'name' => 'disabled',
      'label' => '有效\失效',
      'boxname' => 'disabled',
      'type' => 'select',
      'schtp' => '2',
      'style' => '',
      'css' => '',
     ),
     21 => 
    array (
      'name' => 'deadline',
      'label' => '活动时间',
      'boxname' => 'deadline',
      'type' => 'select',
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