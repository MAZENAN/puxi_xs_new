<?php
//接收GET参数
  $state=SGet('state');
  if($state == '0'){
    $this->assign('state',$state);
  }
 
$withdraws=  array (
      'name' => 'mobile',
      'label' => '手机号',
      'boxname' => 'mobile',
      'type' => 'text',
      'schtp' => '9',
      'style' => '',
      'css' => '',
    );
$stateAry=array(
  'name' => 'state',
  'label' => '审核状态',
  'boxname' => 'state',
  'type' => 'text',
  'schtp' => '2',
  'style' => '',
  'css' => '',
  );
if($state == '0'){
  $search = array(
        0=>$withdraws,
        1=>$stateAry,
    );
}else{
  $search = array(

        0=>$withdraws,
  );
}
return array (
  'model' => 'apply',
  'search' => $search,
  'usesql' => '0',
  'sql' => '',
  'sqlargs' => NULL,
  'usingfy' => '1',
  'orderby' => '',
);