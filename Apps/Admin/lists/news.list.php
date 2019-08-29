<?php
$type = SGet('type');
$this->assign("type", $type);
$seachAry = array(
    0 => array(
        'name' => 'type',
        'label' => 'type',
        'boxname' => 'type',
        'type' => 'text',
        'schtp' => '2',
        'style' => '',
        'css' => '',
    ),
    1=> array(
        'name' => 'title',
        'label' => 'title',
        'boxname' => 'title',
        'type' => 'hidden',
        'schtp' => '0',
        'style' => '',
        'css' => '',
    ),

);
return array (
    'model' => 'News',
    'search' => $seachAry,
    'usesql' => '0',
    'sql' => NULL,
    'sqlargs' => NULL,
    'usingfy' => '1',
    'orderby' => 'sort desc',
);