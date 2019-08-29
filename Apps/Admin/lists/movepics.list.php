<?php
$type = SGet('type');
$this->assign("type", $type);
$seachAry = array(
    1 => array(
        'name' => 'type',
        'label' => 'type',
        'boxname' => 'type',
        'type' => 'text',
        'schtp' => '2',
        'style' => '',
        'css' => '',
    ),
);
return array (
  'model' => 'Movepics',
  'search' => $seachAry,
  'usesql' => '0',
  'sql' => NULL,
  'sqlargs' => NULL,
  'usingfy' => '0',
  'orderby' => 'sort asc',
);