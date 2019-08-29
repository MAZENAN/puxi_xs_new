<?php
$type = SGet('type');
$title=$type == 3?'供应商跟进记录':'会员跟进记录';
$this->assign("title", $title);
$this->assign('type',$type);
return array(
    'model' => 'ClientRecord',
    'search' =>
    array(
        0 => array(
              'name' => 'client_id',
              'label' => 'client_id',
              'boxname' => 'client_id',
              'type' => 'hidden',
              'schtp' => '1',
              'style' => '',
              'css' => '',
        ),
        1 => array(
              'name' => 'type',
              'label' => 'type',
              'boxname' => 'type',
              'type' => 'hidden',
              'schtp' => '1',
              'style' => '',
              'css' => '',
        ),
    ),
    'usesql' => '0',
    'sql' => '',
    'sqlargs' => NULL,
    'usingfy' => '1',
    'orderby' => 'add_time desc',
);
