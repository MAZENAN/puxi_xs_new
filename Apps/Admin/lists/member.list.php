<?php
$seachAry = array(
    1 => array(
        'name' => 'mobile',
        'label' => 'mobile',
        'boxname' => 'mobile',
        'type' => 'text',
        'schtp' => '0',
        'style' => '',
        'css' => '',
    )
);

return array(
    'model' => 'Member',
    'search' => $seachAry,
    'usesql' => '0',
    'sql' => '',
    'sqlargs' => NULL,
    'usingfy' => '1',
    'orderby' => '@pf_member.id desc',
);
